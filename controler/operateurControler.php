<?php

    
         include("../utilitaire/base_donnee.php");
   
    spl_autoload_register(function($class){
         require_once"../Model/{$class}.php";
        
         
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
        
       

        
        
if (isset($_POST['action'])) {
  
   /// include('../.././utilitaire/base_donnee.php');
    if($_POST['action']=='ajouter'){
    
    $nom=htmlspecialchars(trim($_POST["designation"]));
    $contact=htmlspecialchars(trim($_POST["contact"]));
    $email=htmlspecialchars(trim($_POST["email"]));
    
    
    
    //apres avoir controlé les données, on abeuve la classe
    $expl=new Operateur(array("nom"=>$nom,"contact"=>$contact,"email"=>$email));
        
     $addexpl=new Operateur_impl($conn); 
          
    if ($addexpl->findOperateurByNom($nom)==null) {

        if($addexpl->addOperateur($expl)){
        
        echo 'Operateur ajouté' ;
        
     } else {
         echo 'ajout echoué';
       }

    }else{
       echo "Deja enregistré"; 
     
    }
    }


if($_POST['action']=="charger"){
//retrouver les donnees du site

 
     
   $fetch=new Operateur_impl($conn);  
   $table= '
                                        <thead>
                                            <tr>
                                                
                                                <th> Operateur</th>
                                                
                                                <th> Contact </th>
                                                <th> Adresse electronique</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
     if($fetch->findAllOperateur()!=NULL){
       foreach ($fetch->findAllOperateur() as $value) {
           $table.='<tr class="odd gradeX">
                    
                    <td>'.$value['NOM'].'</td>
                    <td>'.$value['CONTACT'].'
                         </td>
                    <td>'.$value['EMAIL'].'</td>
                    <td>
                            <a  type="button" class="btn btn-primary btn-xs editer" id="'.$value['ID_OPERATEUR'].'">
                                    <i class="fa fa-pencil"></i>
                            </a>
                            <a type="button" class="btn btn-danger btn-xs supprimer" id="'.$value['ID_OPERATEUR'].'">
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
         
     
       $fetchOne=new Operateur_impl($conn);
       
      //  print_r( $fetchOne);
        
        if( $fetchOne->findOneOperateurById($_POST['id'])!=NULL){
           $result=array(); 
             foreach ( $fetchOne->findOneOperateurById($_POST['id']) as $value) {
                
                $result["nom"]=$value["NOM"];
               
                $result["contact"]=$value["CONTACT"];
                $result["email"]=$value["EMAIL"]; 
                $result["id_operateur"]=$value['ID_OPERATEUR'];
                 
                
                
             }
           //on affiche la valeur en format json
             $formulaire='
                                          
                                            <form  action="#" method="POST" id="form_sample_1" class="form-horizontal">
                                                                
                                        <span id="alert_succes"></span>                      

                                        <div class="form-body">
                                        <div class="form-group row">
                                                 <label class="offset-md-1">Operateur:</label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="designation" value="'.$result["nom"].'" data-required="1" placeholder="Entrer le nom  du site" class="form-control input-height designation" /> 
                                                    <span id="erreur_designation" class="text-danger"></span>
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
                                               <input type="hidden" value="'.$result["id_operateur"].'" id="hidden_id">
                                            
                                        
                                            
                     
                                               
                      
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
    $expl=new Operateur(array("nom"=>$_POST["designation"],"contact"=>$_POST['contact'],"email"=>$_POST["email"],"id_operateur"=>$_POST['id']));
    
    //on prend une instance de la classe qui s'occupe de la d'etablie la connexion
    //
    //$con=new connexionDB();
    
    
     
      $update=new Operateur_impl($conn);
     //// On
      if($update->updateOperateur($expl)){
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
    
     
      $delete=new Operateur_impl($conn);
     //// On
      if($delete->deleteOperateur(htmlspecialchars($_POST['id']))){
          echo'Bien supprimé ';
      }else{
           echo'Suppression échouée';
      }
         
     }   


    if($_POST['action']=="chargerOperateur"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select
     
   $fetch=new Operateur_impl($conn);  

      $table='<option value="">Aucun</option>';
     if($fetch->findAllOperateur()!=NULL){
     
                
       foreach ($fetch->findAllOperateur() as $value) {
      $table.= '<option value="'.$value["ID_OPERATEUR"] .'">'. $value["NOM"].'</option>';
       }

           
    }
     echo $table;
}

}else{
  echo "Aucune action effectuée";
    }



 