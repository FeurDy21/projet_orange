<?php
   session_start();

   
        
              
if (isset($_POST['action'])) {
  

   /// include('../.././utilitaire/base_donnee.php');
    if($_POST['action']=='valider'){
      
    $nom=htmlspecialchars(trim($_POST["nom"]));
    $code=htmlspecialchars(trim($_POST["codification"]));
    $description=htmlspecialchars(trim($_POST['description']));
    $salle;
   /* $projet=htmlspecialchars(trim($_POST["projet"]));
    $codeExploitant=htmlspecialchars(trim($_POST["codeExploitant"]));
    $backup= htmlspecialchars(trim($_POST["backup"]));
    $equipement_alimente=htmlspecialchars(trim($_POST["equipement_alimente"]));*/

    if (isset($_POST["salle"])) {
    $salle=htmlspecialchars(trim($_POST["salle"]));
    $salle=split(" ",$salle,2);
    }else {echo '<script> alert("Veuillez faire le choix de la salle");</script>';}
    
    $marque=htmlspecialchars(trim($_POST["marque"]));
    /*$date=htmlspecialchars(trim($_POST["date"]));
      $source=htmlspecialchars(trim($_POST["source"]));*/

    if($code&&$salle){  

     $image1=""; $image2=""; $image3=""; $image4="";
    if($_FILES['image1']['name']!=''){
        
    $image1=uploafile($_FILES['image1'],"../../../imagesUploaded/equipement/");
    
    }
    if($_FILES['image2']['name']!=''){
        
    $image2=uploafile($_FILES['image2'],"../../../imagesUploaded/equipement/");
    
    }
    if($_FILES['image3']['name']!=''){
        
    $image3=uploafile($_FILES['image3'],"../../../imagesUploaded/equipement/");
    
    }
    if($_FILES['image4']['name']!=''){
        
    $image4=uploafile($_FILES['image4'],"../../../imagesUploaded/equipement/");
    
    }
    
    
    //apres avoir controlé les données, on abeuve la classe
    $equipe=new Equipement(array("nom"=>$nom,"code"=>$code,"marque"=>$marque,"image1"=>$image1,"image2"=>$image2,"image3"=>$image3,"image4"=>$image4,"description"=>$description,"id_salle"=>$salle[0]));
    
    
     //// On
//émet une alerte à chaque fois qu'une requête a échoué.
     //puis on passe passe une instance de la connexion à la classe qui sert de midelware
     // $p= new BD($p);    
     $addEquipe=new Equipement_impl($conn); 
       $_SESSION["id_equipement"]=$addEquipe->addEquipement($equipe);
     if($_SESSION["id_equipement"]>0){
        // header("location:../IHM/admin/light/add_site.php?site=ajouter");
        echo '<script>alert("ajout reussi");</script>' ;
        header("location:gerer_sous_equipement.php");
        
     } else {
         echo '<script> alert("ECHEC. Verifier le serveur");</script>';
        
     }
 }else{
     echo '<script>alert("Les champs etoilés sont oblidatoires");</script>' ;
 }
    } 


if($_POST['action']=="chargerEquipementCheckbox"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select
  spl_autoload_register(function($class){
        require_once "../Model/{$class}.php";
        
        
         
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
 
   include('../utilitaire/file_upload.php');
   include('../utilitaire/base_donnee.php');

  $table='';
//$salle=new Equipeme(Array());

    $searchEquip=new Equipement_impl($conn);
     $equ=$searchEquip->findAllEquipementOfSalle($_POST['id']);
     if($equ!=null){
     foreach ($equ as $value) {
      
      $table.= '<label class="checkbox-inline" style="font-weight:bold; margin-left: 2px; font-size:1em; ">
                <input type="checkbox" class="equipementBox"  value="'.$value["ID_EQUIPEMENT"].'"/>'.$value["CODE"].'</label> ';
       }

       echo $table;     
    }
}

if($_POST['action']=="chargerSousEquipementCheckbox"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select
  spl_autoload_register(function($class){
        require_once "../Model/{$class}.php";
        
        
         
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
 
   include('../utilitaire/file_upload.php');
   include('../utilitaire/base_donnee.php');

  $table='';
//$salle=new Equipeme(Array());

    $searchEquip=new Sous_equipement_impl($conn);
     $equ=$searchEquip->findAllSousEquipementByIdEquipement($_POST['id']);
     if($equ!=null){
     foreach($equ as $value) {
      
      $table.= '<label class="checkbox-inline " style="font-weight:bold; margin-left: 2px; font-size:1em; ">
                <input type="checkbox" class="equipement"  value="'.$value["ID_SOUS_EQUIPEMENT"].'"/>'.$value["CODE"].' '.$value["NOM"].'</label> ';
       }

       echo $table;     
    }
}


if($_POST['action']=="info-equipement"){

   include('../utilitaire/init.php');
   include('../utilitaire/file_upload.php');
   include('../utilitaire/base_donnee.php');


       $info= '';

  $equipement=new Equipement_impl($conn);

$result=$equipement->findAllInfoEquipement(htmlspecialchars(trim($_POST["code"])));
if($result!=null){
   foreach($result as $value){
      $info.='

            <div class="modal-header"  style="background:#FF4500!important;">
                    <h5 class="hero-title text-center" style="text-align:center !important;">'.$value["CODE"].'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <div class="modal-body" style="background-color: black;">
                    
                                
                                
                                    
               <div class="photo-gallery">  
            <div class="container">        
              <div class="row photos">
              
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="../imagesUploaded/equipement/'.$value['IMAGE1'].'"  alt="Le haut de la face" title="Le haut de la face"data-lightbox="photos"><img  
                 src="../imagesUploaded/equipement/'.$value['IMAGE1'].'" class="img-fluid img-thumbnail"></a><br><em style="font-size:.9em;">Le haut de la face </em></div>

                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="../imagesUploaded/equipement/'.$value['IMAGE2'].'" alt="Le bas de la face" title="Le bas de la face" data-lightbox="photos"><img class="img-fluid img-thumbnail" src="../imagesUploaded/equipement/'.$value['IMAGE2'].'" ></a><br><em style="font-size:.9em;">Le bas de la face </em></div>
                
              <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="../imagesUploaded/equipement/'.$value['IMAGE3'].'" alt="Le  haut de l\'arriere" title="Le  haut de l\'arriere"  data-lightbox="photos"><img class="img-fluid img-thumbnail"  src="../imagesUploaded/equipement/'.$value['IMAGE3'].'" ></a><br><em style="font-size:.9em;">Le haut de l\'arriere </em></div>

                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="../imagesUploaded/equipement/'.$value['IMAGE4'].'" title="Le bas de  l\'arriere" data-lightbox="photos"><img class="img-fluid img-thumbnail " src="../imagesUploaded/equipement/'.$value['IMAGE4'].'"  title="Le bas de l\'arriere "></a><br><em style="font-size:.9em;">Le bas de l\'arriere </em></div>

              </div>  
            
            <div class="row">
            <div class="offset-col-2 col-md-12 text-sm table-responsive">
               <span style="font-weight: bold; font-family:times-roman;">
               <style> .eq td{text-align:center;color:black;}</style>
               <table class="tabl table-striped eq " width="100%">
                   <tr class="bg-succes">
                   <th>NOM DE L\'EQUIPEMENT :</th> <td>'.$value["NOM"].'</td>
                   </tr>
                   <tr class="bg-primar">
                   <th>MARQUE:</th> <td>'.$value["MARQUE"].'</td>
                   </tr>
                   <tr>
                   <th>DESCRIPTION:</th> <td>'.$value["DESCRIPTION"].'</td>
                   </tr>
                   
                   
               </table><hr width="100%"><br/>
               <h3 class="title">LISTE DES EQUIPEMENTS DU RACK:</h3>
               <ul class=" list-group">';
           $res=new Sous_equipement_impl($conn);          
            $sous=$res->findAllSousEquipementByIdEquipement($value["ID_EQUIPEMENT"]);
       
           foreach($sous as  $val) {
               $info.='<a  class="getService"  id="'.$val["ID_SOUS_EQUIPEMENT"].'" > <li style="font-family:times-roman;"  class="list-group-item "><span class="equipement" style="color:red; font-size:1.5em!important; ">'.$val["CODE"].'] '.' '.''. $val['NOM'].'</span> <span style="font-size:1.2em!important; float:right; color:blue!important;">Services et clients...</span>
                    <br>
                    </a>
                    <style > table{font-size:.8em!important;}</style>
                     <table width="100%" class="tabl table-striped">
                    
                     <tr>
                   <th class="bg-inf" style="background-color:;">FONCTION:</th> <td class="" style="">'.$val["FONCTION"].'</td>
                   </tr>
                   <tr class="bg-primar">
                      <th>IDENTIFIANT:</th> <td>'.$val["code_expoitant"].'</td> 
                   </tr>
                   <tr class="bg-primar">
                    <th>MARQUE:</th> <td>'.$val["MARQUE"].'</td>
                   </tr> 
                   <tr>
                   <th>BACKUP:</th> <td>'.$val["backup"].'</td>
                   </tr>
                   <tr class="bg-dange">
                   <th>SOURCE D\'ALIMENTATION:</th> <td>'.$val["alimentation"].'</td>
                   </tr>
                   <tr>
                   <th>RACCORD<span class="majiscule" style="text-transform: uppercase;">é à</span>:</th> <td>'.$val["equipement_alimente"].'</td>
                   </tr>
                   <tr class="">
                   <th class="text-center" colspan="2">Cycle de vie</th>
                   </tr>
                   <tr class="">
                   <th>DATE D\'ACQUISITION:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>DATE D\'INSTALLATION:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>DATE D\'INTEGRATION:</th> <td>'.$val["datearrivee"].'</td>
                   </tr>
                   <tr class="">
                   <th>DATE DE FIN DE VIE HADWARE:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>DATE DE FIN DE VIE SOFTWARE:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>DATE DE FIN DE VIE HARDWARE:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>DATE DE FIN DE COMMERCIALISATION:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>DATE DE  DESINVESTISSEMENT:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>DATE DE  DESINSTALLATION:</th> <td></td>
                   </tr>
                  <!-- <tr class="">
                   <th>DATE DE FIN DE D:</th> <td></td>
                   </tr>-->
                   <tr class="">
                   <th class="text-center" colspan="2">Porteur du projet</th>
                   </tr>
                   <tr class="">
                   <th>PROJET:</th> <td>'.$val["projet"].'</td>
                   </tr>
                   <tr class="">
                   <th>RESPONSABLE ETUDE:</th> <td>'.$val["projet"].'</td>
                   </tr>
                   <tr class="">
                   <th>DIR/DEP/SER DU RESPONSABLE D\'ETUDE:</th> <td></td>
                   </tr>
                   
                   <tr class="">
                   <th>CHEF DU PROJET:</th><td></td>
                   </tr>
                   <tr class="">
                   <th>DIR/DEP/SER DU CHEF DE PROJET:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th class="text-center" colspan="2">Configuration des cartes</th>
                   </tr>
                   <tr class="">
                   <th>TYPE DE CARTE:</th> <td></td>
                   </tr>
                   <tr class="">
                   <th>NOMBRE DE CARTE:</th><td></td>
                   </tr>
                   <tr class="">
                   <th>STATUT DE LA CARTE:</th><td></td>
                   </tr>
                   <tr class="">
                   <th>STATUT DE LA CARTE:</th><td></td>
                   </tr>
                   <tr class="">
                   <th>CARTE RACCORD<span class="majiscule" style="text-transform: uppercase;">é à</span>:</th> <td></td>
                   </tr>
                   </table>
                   <br>
                    </li>
                  
                   ';

                
           }

            
                                       
                                       
                
                
             $info.='</ul>
                </span>

                   </div>
                       
            ';
}
}

echo $info;
}


if ($_POST['action']=="info-service-equipement") {
   include('../utilitaire/init.php');
   include('../utilitaire/file_upload.php');
   include('../utilitaire/base_donnee.php');

       $serv=new Service_impl($conn);         
                  $service=$serv->findAllEquipementService(htmlspecialchars(trim($_POST["id"]))); 
                 $info='<ol class="list-group"> ';
                 if($service)
                foreach($service as $valu) {
                    $info.=' <li class="list-group-item "><b>'.' <span style="color:red;">SERVICE: </span>'.$valu['Service']. '</b>
                     <br/><span style="color:red;">CLIENT(S):</span><br> <ul>';

                      $clt=new client_impl($conn);
                      $client=$clt->findAllClientByService($valu['id_service']);
                      if($client)
                      foreach($client as  $va){
                         $info.=  '<li>'.$va["client"].'</li>';
                        }

                       $info.='</ul></li>';
                 }

     $info.='</ol>';


  echo $info;
}


if($_POST['action']=="imprimer"){

   include('../utilitaire/init.php');
   include('../utilitaire/file_upload.php');
   include('../utilitaire/base_donnee.php');


       

   $sal=new salle_impl($conn);
    $salle=$sal->findAllSalleOfSite(htmlspecialchars($_POST["id"]));
  //var_dump($salle);
   $inf='';
    if($salle)
   foreach ($salle as  $v) {
       $inf.='<tr>
      <td>'.$v['salle'].'</td>
      <td>'.$v['equipement'].'</td>
  <td>'.$v['code'].'</td>
  <td>'.$v['marque'].'</td>
  <td>'.$v['fonction'].'</td>
  <td>'.$v['description'].'</td>
  <td>'.$v['source'].'</td>
  <td>'.$v['dat'].'</td>
       </tr>';
  
 }
 echo($info);
 }

}