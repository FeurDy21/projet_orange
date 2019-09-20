<?php

    
         include("../utilitaire/base_donnee.php");
   
    spl_autoload_register(function($class){
         require_once"../Model/{$class}.php";
        
         
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
        
       

        
        
if (isset($_POST['action'])) {
  
   /// include('../.././utilitaire/base_donnee.php');
    if($_POST['action']=='ajouter'){
    
    $designation=htmlspecialchars(trim($_POST["designation"]));
    $contact=htmlspecialchars(trim($_POST["contact"]));
    $email=htmlspecialchars(trim($_POST["email"]));
    $type=htmlspecialchars(trim($_POST["type"]));
    
    
    
    //apres avoir controlé les données, on abeuve la classe
    $expl=new Client(array("designation"=>$designation,"contact"=>$contact,"email"=>$email,"type"=>$type));
        
     $addexpl=new Client_impl($conn); 
          
    if ($addexpl->findClientByNom($designation)==null) {

        if($addexpl->addClient($expl)){
        
        echo 'Client ajouté' ;
        
     } else {
         echo 'ajout echoué';
       }

    }else{
       echo "Deja enregistré"; 
     
    }
    }


if($_POST['action']=="charger"){
//retrouver les donnees du site

 
     
   $fetch=new Client_impl($conn);  
   $table= '
                                       ';
     if($fetch->findAllClient()!=NULL){
       foreach ($fetch->findAllClient() as $value) {
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
   
 $table.='';  
 
 echo $table;
}


if ($_POST['action']=="chercherUnSite") {
         
     
       $fetchOne=new Client_impl($conn);
       
      //  print_r( $fetchOne);
        
        if( $fetchOne->findOneClientById($_POST['id'])!=NULL){
           $result=array(); 
             foreach($fetchOne->findOneClientById($_POST['id']) as $value) {
                
                $result["designation"]=$value["DESIGNATION"];
                $result["type"]=$value["TYPE"];
                $result["contact"]=$value["CONTACT"];
                $result["email"]=$value["EMAIL"]; 
                $result["id_client"]=$value['ID_CLIENT'];
                 
                
                
             }
           //on affiche la valeur en format json
             $formulaire='
                                          
                                            <form  action="#" method="POST" id="form_sample_1" class="form-horizontal">
                                                                
                                        <span id="alert_succes"></span>                      

                                        <div class="form-body">
                                        <div class="form-group row">
                                                 <label class="offset-md-1">Client:</label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="designation" value="'.$result["designation"].'" data-required="1" placeholder="Entrer le nom  du site" class="form-control input-height designation" /> 
                                                    <span id="erreur_designation" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                 <label class="offset-md-1">Type:</label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="type" value="'.$result["type"].'" data-required="1" placeholder="Entrer le nom  du site" class="form-control input-height type" /> 
                                                    <span id="erreur_type" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="offset-md-1">Contact:</label>
                                                <div class=" offset-md-1  col-md-10">
                                                    <input type="text" name="contact" data-required="1" value="'.$result["contact"].'" placeholder="Lieu du site" class="form-control input-height contact"/> 
                                                     <span id="erreur_contact" class="text-danger"></span>
                                                </div>
                                            </div>
                                            
                                          
                                             <div class="form-group row">
                                                 <label class="offset-md-1">Email:</label>
                                                <div class="offset-md-1  col-md-10 ">
                                                    <input name="email" value="'.$result["email"].'" placeholder="Une description" class="form-control input-height email"/> 
                                                    <span id="erreur_email" class="text-danger"></span>
                                                </div>
                                            </div>
                                               <input type="hidden" value="'.$result["id_client"].'" id="hidden_id">
                                            
                                        
                                            
                     
                                               
                      
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
    $expl=new Client(array("designation"=>$_POST["designation"],"contact"=>$_POST['contact'],"email"=>$_POST["email"],"id_client"=>$_POST['id'],"type"=>$_POST["type"]));
    
    //on prend une instance de la classe qui s'occupe de la d'etablie la connexion
    //
    //$con=new connexionDB();
    
    
     
      $update=new Client_impl($conn);
     //// On
      if($update->updateClient($expl)){
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
    
     
      $delete=new Client_impl($conn);
     //// On
      if($delete->deleteClient($_POST['id'])){
          echo'Bien supprimé ';
      }else{
           echo'Suppression échouée';
      }
         
     }   


    if($_POST['action']=="chargerClient"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select


 
     
   $fetch=new Client_impl($conn);  

      $table='<option value="0">Select...</option>';
     if($fetch->findAllClient()!=NULL){
     
                
       foreach ($fetch->findAllClient() as $value) {
      $table.= '<option value="'.$value["ID_CLIENT"] .'">'. $value["DESIGNATION"].'</option>';
       }

       echo $table;     
    }
}

}else{
  echo "Aucune action effectuée";
    }



 