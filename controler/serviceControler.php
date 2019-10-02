<?php

    session_start();

         include("../utilitaire/base_donnee.php");
   
    spl_autoload_register(function($class){
         require_once"../Model/{$class}.php";
        
         
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
        
       

      
   $se=new recuperer;  
if (isset($_POST['action'])) {
 
   /// include('../.././utilitaire/base_donnee.php');
    if($_POST['action']=='ajouter'){
    
    $nom=htmlspecialchars(trim($_POST["designation"]));
   
    
    
    
    //apres avoir controlé les données, on aliente la classe
    $expl=new Service(array("designation"=>$nom));
        
     $addexpl=new Service_impl($conn); 

          
    if ($addexpl->findServiceByNom($nom)==null) {    

      $id=$addexpl->addService($expl);    
      
      //on recupêre l'id dans une variable de session
      $_SESSION["id"]=$id;   

        if($id>0){
        
        echo 'Operateur ajoutée' ;
        
     } else {
         echo 'ajout echoué';
       }

    }else{
       echo "Deja enregistré"; 
     
    }
    }


if($_POST['action']=="charger"){
//retrouver les donnees du site

 
     
   $fetch=new Service_impl($conn);  
   $table= '
                                        <thead>
                                            <tr>
                                                
                                                <th> Operateur</th>
                                                
                                                
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
     if($fetch->findAllService()!=NULL){
       foreach ($fetch->findAllService() as $value) {
           $table.='<tr class="odd gradeX">
                    
                    <td>'.$value['DESIGNATION'].'</td>
                    
                    <td>
                            <a  type="button" class="btn btn-primary btn-xs editer" id="'.$value['ID_SERVICE'].'">
                                    <i class="fa fa-pencil"></i>
                            </a>
                            <a type="button" class="btn btn-danger btn-xs supprimer" id="'.$value['ID_SERVICE'].'">
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
         
     
       $fetchOne=new Service_impl($conn);
       
      //  print_r( $fetchOne);
        $one=$fetchOne->findOneServiceById(htmlspecialchars($_POST['id']));
        if( $one!=NULL){
           $result=array(); 
             foreach ($one as $value) {
                
                $result["designation"]=$value["DESIGNATION"];
               
                
                $result["id_service"]=$value['ID_SERVICE'];
                 
                
                
             }
           //on affiche la valeur en format
             $formulaire='
                                          
                                            <form  action="#" method="POST" id="form_sample_1" class="form-horizontal">
                                                                
                                        <span id="alert_succes"></span>                      

                                        <div class="form-body">
                                        <div class="form-group row">
                                                 <label class="offset-md-1">Operateur:</label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="designation" value="'.$result["designation"].'" data-required="1" placeholder="Entrer le nom  du site" class="form-control input-height designation" /> 
                                                    <span id="erreur_designation" class="text-danger"></span>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                          
                                             
                                               <input type="hidden" value="'.$result["id_service"].'" id="hidden_id">
                                            
                                        
                                            
                     
                                               
                      
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
            echo '<Les données sont introuvables.</p>';
        }
     }
     

if($_POST['action']=="modifierUnSite") {
    
      //apres avoir controlé les données, on abeuve la classe
    $expl=new Service(array("designation"=>$_POST["designation"],"id_service"=>$_POST['id']));
    
    //on prend une instance de la classe qui s'occupe de la d'etablie la connexion
    //
    //$con=new connexionDB();
    
    
     
      $update=new Service_impl($conn);
     //// On
      if($update->updateService($expl)){
          echo'modification reussie';
      }else{
           echo'Modification échouée';
      }
         
     } 


if($_POST['action']=="supprimerUnSite") {
    
      //apres avoir controlé les données, on abeuve la classe
    
    //on prend une instance de la classe qui s'occupe de la d'etablie la connexion
    //
    //$con=new connexionDB();
    
     //$p=$con->connect();
    
     
      $delete=new Service_impl($conn);
     //// On
      if($delete->deleteService($_POST['id'])){
          echo'Bien supprimé ';
      }else{
           echo'Suppression échouée';
      }
         
     }   

    if($_POST['action']=="chargerService"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select


 
     
   $fetch=new Service_impl($conn);  

      $table='<option value="0">Select...</option>';
     if($fetch->findAllService()!=NULL){
     
                
       foreach ($fetch->findAllService() as $value) {
      $table.= '<label class="checkbox-inline" style="font-weight: bold; margin-left: 2px; font-size:1em; "><option  value="'.$value["ID_SERVICE"] .'">'. $value["DESIGNATION"].'</option></label>';
       }

       echo $table;     
    }
}




if($_POST['action']=="choixClient"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select  
   $fetch=new Client_impl($conn);  

      $table='';
     if($fetch->findAllClient()!=NULL){
                    
       foreach ($fetch->findAllClient() as $value) {
      $table.= '
                                <div class="form-check offset-md-1"> <input type="checkbox" class="choix" value="'.$value["ID_CLIENT"].'" class="form-check-input" id="'.$value["DESIGNATION"].'"> <label class="form-check-label" for="'.$value["DESIGNATION"].'"> '.$value["DESIGNATION"].'</label>
                                </div>';
       }
      
      $table.='<div class="form-actions"><div class="row">
                                                <div class="offset-md-1 col-md-3">
                                                    <input type="submit" name="action" class="btn btn-info m-r-20 " style="background-color:orange!important;" value="Valider"/>
                                                    
                                                </div>
                                              </div></div>';

       echo $table;     
    }
}

if($_POST['action']=="Valider"){
  $result=false;
  $cpt=0;
  $client= array();
   
  foreach($_POST["choixClien"] as $value) {
  
   $cpt++;
    $insert=$conn->prepare('INSERT INTO offrir_2 SET id_client=:client, Id_service=:service ');
    $insert->bindValue(':client',$value);
    $insert->bindValue(':service',$_SESSION["id"]);
     if($insert->execute()){
      $result=true;
     }    
   }
     
    if ($result) {
      echo $cpt." Client(s) ajouté ";
    }else{
      echo "echec";
    }

}

}else{
  echo "Aucune action effectuée";
    }



 