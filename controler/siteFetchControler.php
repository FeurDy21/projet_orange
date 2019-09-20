<?php
 include('../utilitaire/init.php');
 include('../utilitaire/base_donnee.php');
//action qui se troue fans post a ete fabrique dans la focntion ajax

 if($_POST['action']=="chargerSite"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select


 
     
   $fetch=new Site_impl($conn);  

      $table='<option value="0">Select...</option>';
     if($fetch->findAllSite()!=NULL){
     
                
       foreach ($fetch->findAllSite() as $value) {
      $table.= '<option id="'.$value["ID_SITE"] .'" value="'.$value["ID_SITE"] .''.' '. ''.$value["NOM"].'">'. $value["NOM"].'</option>';
       }

       echo $table;     
    }
}

if($_POST['action']=="chargerSalleCheckbox"){
//retrouver tous les sites pour ensuite les charger dans dans le groupe select


  $table='';
$salle=new Salle(Array());

    $searchSall=new Salle_impl($conn);
     $salle=$searchSall->findAllSalleOfOneSite($_POST['id']);
     if($salle!=null){
     foreach ($salle as $value) {
      
      $table.= '<label class="checkbox-inline" style="font-weight: bold; margin-left: 2px; font-size:1em; ">
                <input type="checkbox" class="salleBox" value="'.$value["NOM"].'"/>'.$value["NOM"].'</label> ';
       }

       echo $table;     
    }
}



if($_POST['action']=="chargerSalle"){
   $table='<option value="0">Select...</option>';
  $salle=new Salle(Array());

      $searchSall=new Salle_impl($conn);
     
     if($searchSall->findAllSalleOfOneSite($_POST['id'])!=null){
     foreach ($searchSall->findAllSalleOfOneSite($_POST['id']) as $value) {
      
      $table.= '<option value="'.$value["ID_SALLE"] . ''.' '. '' .$value["NOM"].'">'. $value["NOM"].'</option>';
       }

       echo $table; 
   }
}




 if($_POST['action']=="charger"){
//retrouver les donnees du site

 
     
   $fetch=new Site_impl($conn);  
   $table= '
                                        <thead>
                                            <tr>
                                            	<th></th>
                                                <th> Designation</th>
                                                <th> Situation geographique </th>
                                                <th> Description </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
     if($fetch->findAllSite()!=NULL){
       foreach ($fetch->findAllSite() as $value) {
           $table.='<tr class="odd gradeX">
                    <td class="patient-img">
                                 <img src="../../../imagesUploaded/imageSite/'.$value['PHOTO'].'" alt="">
                    </td>
                    <td>'.$value['NOM'].'</td>
                    <td>'.$value['LOCALISATION'].'
                         </td>
                    <td>'.$value['DESCRIPTION'].'</td>
                    <td>
                            <a  type="button" class="btn btn-primary btn-xs editer" id="'.$value['ID_SITE'].'">
                                    <i class="fa fa-pencil"></i>
                            </a>
                            <a type="button" class="btn btn-danger btn-xs supprimer" id="'.$value['ID_SITE'].'">
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
          $conn=new PDO('mysql:host=localhost;dbname=datacenter','root','');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
     
       $fetchOne=new Site_impl($conn);
       
      //  print_r( $fetchOne);
        
        if( $fetchOne->findOneSiteById($_POST['id'])!=NULL){
           $result=array(); 
             foreach ( $fetchOne->findOneSiteById($_POST['id']) as $value) {
                
                $result["nom"]=$value["NOM"];
                $result["description"]=$value["DESCRIPTION"];
                $result["localisation"]=$value["LOCALISATION"]; 
                $result["id_site"]=$value['ID_SITE'];
                 $result["photo"]=$value['PHOTO'];
                
                
             }
           //on affiche la valeur en format json
             $formulaire='
                                          
                                            <form  action="#" method="POST" id="form_sample_1" class="form-horizontal">
                                                                
                                        <span id="alert_succes"></span>                      

                                        <div class="form-body">
                                        <div class="form-group row">
                                                
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="nom" value="'.$result["nom"].'" data-required="1" placeholder="Entrer le nom  du site" class="form-control input-height nom" /> 
                                                    <span id="erreur_nom" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                               
                                                <div class=" offset-md-1  col-md-10">
                                                    <input type="text" name="localisation" data-required="1" value="'.$result["localisation"].'" placeholder="Lieu du site" class="form-control input-height localisation" /> 
                                                     <span id="erreur_localisation" class="text-danger"></span>
                                                </div>
                                            </div>
                                            
                                          
                                             <div class="form-group row">
                                                
                                                <div class="offset-md-1  col-md-10 ">
                                                    <textarea name="description"  placeholder="Une description" class="form-control-textarea description"> '.$result["description"].'  </textarea>
                                                    <span id="erreur_description" class="text-danger"></span>
                                                </div>
                                            </div>
                                               <input type="hidden" value="'.$result["id_site"].'" id="hidden_id">
                                            <div class="form-group row">
                                                
                                                <div class="compose-editor offset-md-1  col-md-10">
                                                    <input type="file" name="photo" class="default photo" multiple>
                                                     <img src="../../../imagesUploaded/imageSite/'.$result["photo"].'" width="20%" >
                                              </div>
                                            </div>
                                            
                                         	
					 
                                               
                      
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
    $site=new Site(array("nom"=>$_POST["nom"],"localisation"=>$_POST['localisation'],"description"=>$_POST["description"],"photo"=>"feurdy.jpg","id_site"=>$_POST['id']));
    
    //on prend une instance de la classe qui s'occupe de la d'etablie la connexion
    //
    //$con=new connexionDB();
    
    
     
      $updateSite=new Site_impl($conn);
     //// On
      if($updateSite->updateSite($site)){
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
    $conn=new PDO('mysql:host=localhost;dbname=datacenter','root','');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
     
      $updateSite=new Site_impl($conn);
     //// On
      if($updateSite->deleteSite($_POST['id'])){
          echo'Bien supprimé ';
      }else{
           echo'Suppression échouée';
      }
         
     }   
 
     