<?php
     session_start();

    
         include("../utilitaire/base_donnee.php");
   
    spl_autoload_register(function($class){
         require_once"../Model/{$class}.php";       
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
        
       

        
        
if (isset($_POST['action'])) {
  
   /// include('../.././utilitaire/base_donnee.php');
    if($_POST['action']=='ajouter'){
    
    $nom=htmlspecialchars(trim($_POST["nom"]));
    $marque=htmlspecialchars(trim($_POST["marque"]));
    $codification=htmlspecialchars(trim($_POST["code"]));
    $fonction=htmlspecialchars(trim($_POST["fonction"]));
    $projet=htmlspecialchars(trim($_POST["projet"]));
    $codeExploitant=htmlspecialchars(trim($_POST["codeExploitant"]));
    $backup= htmlspecialchars(trim($_POST["backup"]));
    $equipement_alimente=htmlspecialchars(trim($_POST["equipement_alimente"]));
    $marque=htmlspecialchars(trim($_POST["marque"]));
    $date=htmlspecialchars(trim($_POST["date"]));
    $source=htmlspecialchars(trim($_POST["source"]));
    $exploitant=(!empty(htmlspecialchars(trim($_POST["exploitant"]))))?htmlspecialchars(trim($_POST["exploitant"])):NULL;
  
    $operateur=(!empty(htmlspecialchars(trim($_POST["operateur"]))))?htmlspecialchars(trim($_POST["operateur"])):NULL; 
    /*if(htmlspecialchars(trim($_POST["exploitant"]))>0){ 
      $exploitant= htmlspecialchars(trim($_POST["exploitant"]));
  }else{$exploitant=null;}*/

   /* if(htmlspecialchars(trim($_POST["operateur"]))>0) {$operateur= htmlspecialchars(trim($_POST["operateur"])); }
    else{$operateur=null;} */
    
  
     $service=(isset($_POST["service"]) && $_POST["service"]!=NULL)?$_POST["service"]:NULL;
    
    //c'est une valeur qui sera stockée dans une variable de session  
     $equipement=$_SESSION["id_equipement"];
    
    
    //apres avoir controlé les données, on abeuve la classe
    $expl=new Sous_equipement(array("nom"=>$nom,"marque"=>$marque,"code"=>$codification,"fonction"=>$fonction,"id_exploitant"=>$exploitant,"id_equipement"=>$equipement,"id_operateur"=>$operateur,'dateArrive'=>$date,'source'=>$source,"equipement_alimente"=>$equipement_alimente,"backup"=>$backup,"projet"=>$projet,"codeExploitant"=>$codeExploitant));
        
     $addexpl=new Sous_equipement_impl($conn); 
          
    if ($addexpl->findSousEquipementByNom($nom)==null) {
        if ($exploitant!=null && $service!=NULL) {
          $idsousEq=$addexpl->addSousEquipement($expl);
          if($idsousEq>0){
          
           $result=false;
  $cpt=0;
  $client= array();
   
    foreach($service as $value) {
  
   $cpt++;
    $insert=$conn->prepare('INSERT INTO servir_1 SET Id_service=:service, id_sous_equipement=:equipe');
    $insert->bindValue(':service',$value);
    $insert->bindValue(':equipe',$idsousEq);
     if($insert->execute()){
      $result=true;
     }    
      }
    echo ($result)?'Equipement gérant '.$cpt.' service(s) enregistré':"Enregistrement echoué";
        
        } else {
         echo 'Enregistrement echoué';
         }
        }else{
          if($addexpl->addSousEquipement($expl)>0)
            echo "Equipement d'operateur externe enregistré";
          else echo "enregistrement echoué";
        }
        

    }else{
       echo "Deja enregistré"; 
     
    }
    }


if($_POST['action']=="charger"){
//retrouver les donnees du site

 
     
   $fetch=new Sous_equipement_impl($conn);  
   $table= '
                                        <thead>
                                            <tr>
                                                
                                                <th> Client</th>
                                                <th> Type de client</th>
                                                <th> Contact </th>
                                                <th> Adresse electronique</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
     if($fetch->findAllSousEquipement()!=NULL){
       foreach ($fetch->findAllSousEquipement() as $value) {
           $table.='<tr class="odd gradeX">
                    
                    <td>'.$value['DESIGNATION'].'</td>
                    <td>'.$value['TYPE'].'</td>
                    <td>'.$value['CONTACT'].'
                         </td>
                    <td>'.$value['EMAIL'].'</td>
                    <td>
                            <a  type="button" class="btn btn-primary btn-xs editer" id="'.$value['ID_CLIENT'].'">
                                    <i class="fa fa-pencil"></i>
                            </a>
                            <a type="button" class="btn btn-danger btn-xs supprimer" id="'.$value['ID_CLIENT'].'">
                                    <i class="fa fa-trash-o "></i>
                            </a>
                    </td>
            </tr>
            ';
       }  
   }
   
 $table.='</tbody>';  
 
 echo $table;
}


if ($_POST['action']=="chercherUnSite") {
         
     
       $fetchOne=new Sous_equipement_impl($conn);
       
      //  print_r( $fetchOne);
        
        if( $fetchOne->findOneSousEquipementById($_POST['id'])!=NULL){
           $result=array(); 
             foreach ( $fetchOne->findOneSousEquipementById($_POST['id']) as $value) {
                
                $result["nom"]=$value["NOM"];
                $result["fonction"]=$value["FONCTION"];
                $result["code"]=$value["CODE"];
                $result["id_equipement"]=$value["ID_EQUIPEMENT"]; 
                $result["id_client"]=$value['ID_CLIENT'];
                 $result["id_operateur"]=$value['ID_OPERATEUR'];
                 
                
                
             }
           //on affiche la valeur en format 
             $formulaire='
                                          
                                            <form  action="#" method="POST" id="form_sample_1" class="form-horizontal">
                                                                
                                        <span id="alert_succes"></span>                      

                                        <div class="form-body">
                                        <div class="form-group row">
                                                 <label class="offset-md-1">Equipement:</label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="designation" value="'.$result["nom"].'" data-required="1" placeholder="" class="form-control input-height designation" /> 
                                                    <span id="erreur_designation" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                 <label class="offset-md-1">Type:</label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="" value="'.$result["fonction"].'" data-required="1" placeholder="Entrer le nom  du site" class="form-control input-height type" /> 
                                                    <span id="erreur_type" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="offset-md-1">Code:</label>
                                                <div class=" offset-md-1  col-md-10">
                                                    <input type="text" name="code" data-required="1" value="'.$result["code"].'" placeholder="" class="form-control input-height code"/> 
                                                     <span id="erreur_contact" class="text-danger"></span>
                                                </div>
                                            </div>
                                            
                                          
                                             <div class="form-group row">
                                                 <label class="offset-md-1">Email:</label>
                                                <div class="offset-md-1  col-md-10 ">
                                                    <input name="equipement" value="'.$result["id_equipement"].'" placeholder="Une description" class="f²orm-control input-height email"/> 
                                                    <span id="erreur_email" class="text-danger"></span>
                                                </div>
                                            </div>
                                             <label class="control-label offset-md-1 ">Exploitant:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="offset-md-1 col-md-10">
                                                    <select class="form-control input-height" id="exploitant" name="exploitant">
                                                       
                                                    </select>
                                                </div>
                                            
                                           
                                                <label class="control-label offset-md-1  ">Oprateur:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="offset-md-1 col-md-10">
                                                    <select class="form-control input-height" id="operateur" name="operateur">
                                                       
                                                    </select>
                                                </div>
                                               <input type="hidden" value="'.$result["id_sous_equipement"].'" id="hidden_id">
                                            
                                        
                                            
                     
                                               
                      
                        <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-1 col-md-10">
                                                    <button type="button" name="modifier_site" class="btn btn-info m-r-20 modifier">Modifier</button>
                                                    <button type="reset" class="btn btn-default  vider">Cancel</button>
                                                </div>
                                                </div>
                                            </div>
                      </div>
                                    </form>
                                          
                                      ';
             
             //apres avoir abreuvé la variable d'un formulaire html, on la retoune à ajax qui va se charger de l'afficher
                echo $formulaire;
        } else {
            echo '<p>Les données sont introuvables.</p>';
        }
     }
     

if($_POST['action']=="modifierUnSite") {
    
      //apres avoir controlé les données, on abeuve la classe
    $expl=new Sous_equipement(array("nom"=>$_POST['nom'],"marque"=>$_POST['marque'],"code"=>$_POST['code'],"fonction"=>$_POST['fonction'],"id_exploitant"=>$_POST['exploitant'],"id_equipment"=>$_POST['equipement'],"id_operateur"=>$_POST['operateur'],"id_sous_equipement"=>$_POST['id']));
    
    //on prend une instance de la classe qui s'occupe de la d'etablie la connexion
    //
    //$con=new connexionDB();
    
      $update=new Sous_equipement_impl($conn);
     //// On
      if($update->updateSousEquipement($expl)){
          echo'modification reussie';
      }else{
           echo'Modification échouée';
      }
         
     } 


if($_POST['action']=="supprimerUnSite") {
    
     
      $delete=new Sous_equipement_impl($conn);
     //// On
      if($delete->deleteSousEquipement(htmlspecialchars($_POST['id']))){
          echo'Bien supprimé ';
      }else{
           echo'Suppression échouée';
      }
         
     }   


    if($_POST['action']=="chargerSousequipement"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select


 
     
   $fetch=new Sous_equipement_impl($conn);  

      $table='<option value="">Aucun</option>';
     if($fetch->findAllSousEquipement()!=NULL){
     
                
       foreach ($fetch->findAllSousEquipement() as $value) {
      $table.= '<option value="'.$value["ID_SOUS_EQUIPEMENT"].'">'. $value["NOM"].'</option>';
       }

       echo $table;     
    }
}

if($_POST['action']=="choixService"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select  
   $fetch=new Service_impl($conn);  

      $table='';
     if($fetch->findAllService()!=NULL){
                    
       foreach ($fetch->findAllService() as $value) {
      $table.= '
          <div class="form-check offset-md-1 col-md-10">  <label class="form-check-label checkbox-inline" for="'.$value["DESIGNATION"].'"><input type="checkbox" class="choix" value="'.$value["ID_SERVICE"].'" class="form-check-input   " id="'.$value["DESIGNATION"].'"> '.$value["DESIGNATION"].'</label>
          </div>';
       }
      
       echo $table;     
    }
}

}else{
  echo "Aucune action effectuée";
    }



 