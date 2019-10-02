<?php
   session_start();
   include('../utilitaire/init.php');
   include('../utilitaire/file_upload.php');
   include('../utilitaire/base_donnee.php');
   
  


if ($_POST['action']) {
 
	# code...
if($_POST['action']=="valider"){

$_SESSION["code"]="";
 $int=new Intervention_impl($conn);

$departement=htmlspecialchars($_POST["departement"]);
$direction=htmlspecialchars($_POST["direction"]);
$heuredebut=htmlspecialchars($_POST["heuredebut"]);
$objet=htmlspecialchars($_POST['objet']);
$respo_travaux=htmlspecialchars($_POST['respo_travaux']);
$datedebut=htmlspecialchars($_POST['datedebut']);
$datefin=htmlspecialchars($_POST['datefin']); 
$service=htmlspecialchars($_POST['service']);
$respo_suivi=htmlspecialchars($_POST['respo_suivi']);
$heurefin=htmlspecialchars($_POST['heurefin']);
$tel_respo_suivi=htmlspecialchars($_POST['tel_respo_suivi']);
$tel_respo_travaux=htmlspecialchars($_POST['tel_respo_travaux']);
$ot="oui";
$site=(isset($_POST['site']) && $_POST['site']!=NULL)?$_POST["site"]:"";
//$code=($ot=="oui")?genererChaineAleatoire(5):"";
$code=$int->getLastId().'-'.substr($site,0,3).' du '.$datedebut;
$_SESSION["code"]=($code!="")?$code :"";
$equipement=(isset($_POST['equipement']) && $_POST['equipement']!=NULL)?$_POST['equipement']:array();
$salle=(isset($_POST['salle']) && $_POST['salle']!=NULL)?$_POST["salle"]:"";
$risque=(isset($_POST['risque']) && $_POST['risque']!=NULL)?$_POST["risque"]:"";
$raison=(isset($_POST['raison']) && $_POST['raison']!=NULL)?htmlspecialchars($_POST['raison']):"";

   
    
$Intervention=new Intervention(array('departement'=>$departement,'direction'=>$direction,'heure_debut'=>$heuredebut,'objet_travaux'=>$objet,'respo_travaux'=>$respo_travaux,"date_debut"=>$datedebut,'date_fin'=>$datefin,'service'=>$service,'respo_suivi'=>$respo_suivi,'heure_fin'=>$heurefin,'tel_respo_suivi'=>$tel_respo_suivi,'tel_respo_travaux'=>$tel_respo_travaux,'ot'=>$ot,"code"=>$code,"site"=>$site,"salle"=>$salle,"risque"=>$risque,"raison_sociale"=>$raison));

 $inter=new Intervention_impl($conn);

       
     $result=false;

  $client= array();
    if(count($equipement)>0) {
      # code...
    $idOT=$inter->addOT($Intervention);
    if($idOT>0){ 
  $cpt=0;
    foreach($equipement as $value) {
  
   $cpt++;
    $insert=$conn->prepare('INSERT INTO concener SET Id_ot=:ot, id_sous_equipement=:equipe');
    $insert->bindValue(':ot',$idOT);
    $insert->bindValue(':equipe',$value);
     if($insert->execute()){
      $result=true;
        }    
      }

      }
   }else{
        $idOT=$inter->addOT($Intervention);
        if($idOT>0){
       $result=true;
       $cpt=0;
          }
      }

 // echo ($result)?"Intervention enregistrée":"Enregistrement echoué";
  if($result && $ot=="oui") {
  echo'OK';
   
  }
  elseif ($result && $ot=="non"){echo("Intervention sans OT enregistrée");}
  else {echo("enregistrement echoué"); }
    # code...
}

if($_POST['action']=="interventionOfToday"){
$message="";
 $inter=new Intervention_impl($conn);
  $intervention=$inter->findAllOTofTheDay($_POST["today1"]);
if($intervention!=NULL){
   foreach($intervention as $value) { 
$message.='<li><a href="niveau_de_validationOT?codeOT='.$value["CODE"].'">
      <span class="time">'.$value["HEURE_DEBUT"].'</span>
      <span class="details">
      <span class="notification-icon circle deepPink-bgcolor"><i class="fa fa-danger"></i></span> site:'.$value["site"].', salle: '.$value["salle"].' </span>
  </a></li>';
   }
   echo($message);
 }else{ echo '<span class="text-info text-center">Aucune intevention n\'est programmée aujourd\'hui</span>';}
}

if($_POST['action']=="interventionOfToday2"){

 $inte=new Intervention_impl($conn);
$interven=0;
$interven=$inte->countAllOTofTheDay($_POST["today2"]);
$mess="";
if($interven!=0){
  
  $mess.=$interven; 
     echo($mess);
 }else{ echo('0');}

}


if($_POST['action']=="interventionUpdate"){

$inter=new Intervention_impl($conn);
$intervention=$inter->findOTById($_POST["id"]);
$table="";
//on fait la verification sit des information on été trouvée ou pas
if ($intervention!=NULL){
//on va chercher tous les site qui qui se trouve dans la base de données
  $fetch=new Site_impl($conn);  
$site=$fetch->findAllSite();
      $table.='<option id="0" value="0">Tous les sites</option>';
     if($site!=NULL){         
       foreach($site as $value){
      $table.='<option id="'.$value["ID_SITE"].'" value="'.$value["ID_SITE"] .''.' '. ''.$value["NOM"].'">'. $value["NOM"].'</option>';
       }
    }
//c'est le chargement de toutes les salles dans le combox de mise à jours
 /*$table2='<option value="0">Toutes les salles</option>';
      $searchSall=new Salle_impl($conn);
$salle=$searchSall->findAllSalle();
     if($salle!=null){
     foreach ($salle as $value){
      
      $table2.= '<option value="'.$value["ID_SALLE"] . ''.' '. '' .$value["NOM"].'">'. $value["NOM"].'</option>';
  }
}*/

  $form='';
foreach($intervention as $value) {

$form.='
 <div class="modal fade " id="modalUpdate"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg  modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header text-center">
                                            <h4 class="modal-title text-center" id="exampleModalLabel">Fiche de demande de OT à remplir</h4> 

                                            <button type="button" class="close" data-dismiss="modal" id="fermer" aria-hidden="true">&times;</button>
                             
                                        
                                        </div>
                                        <div class="modal-body  formAdd">  
                                            
                                         <form   method="POST" id="form_client" class="form-horizontal" style="opacity: 0.9;">
                                                         <style type="text/css">
                                                           label.offset-md-1{margin-left:55px; font-weight:bold;  }
                                                           table  label.offset-md-1{ font-weight:bold;  }
                                                         </style>       
                                        <span id="alert_succes"></span>                      
                                          
                                        <div class="form-body">

                                            <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <div class="form-group row">
                                                <label class="offset-md-1">Direction du demandeur: <span  class="text-danger">*</span></label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="direction_demandeur" value="'.$value["DIRECTION_DEMANDEUR"].'" data-required="1" placeholder="" class="form-control input-height direction" /> 
                                                    <span id="erreur_direction" class="text-danger">
                                                    
                                                    </span>
                                                </div>
                                        </div>  
                                        <div class="form-group row">
                                                <label class="offset-md-1">Departement du demandeur: <span  class="text-danger">*</span></label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="departement" value="'.$value["DEPARTEMENT_DEMANDEUR"].'" data-required="1" placeholder="" class="form-control input-height departement" /> 
                                                    <span id="erreur_departement" class="text-danger">
                                                    
                                                    </span>
                                                </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="offset-md-1">Service du demandeur: <span  class="text-danger">*</span></label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="Service" value="'.$value["SERVICE_DEMANDEUR"].'" data-required="1" placeholder="" class="form-control input-height service" /> 
                                                    <span id="erreur_service" class="text-danger"></span>
                                                </div>
                                            </div>
                                            
                                            
                                          
                                             <div class="form-group row">
                                                <label class="offset-md-1">Responsable de suivie: <span  class="text-danger">*</span></label>
                                                <div class="offset-md-1  col-md-10 ">
                                                    <input type="text" name="respo_suivi" data-required="1" value="'.$value["SERVICE_DEMANDEUR"].'" placeholder="" class="form-control input-height respo_suivi" /> 
                                                     <span id="erreur_respo_suivi" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="offset-md-1">Contact responsable de suivi: </label>
                                                <div class="offset-md-1  col-md-10 ">
                                                    <input type="text" name="tel_respo_suivi" data-required="1" value="'.$value['CONTACT_RESPO_SUIVI'].'" placeholder="" class="form-control input-height tel_respo_suivi" /> 
                                                     <span id="erreur_tel_respo_suivi" class="text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="offset-md-1">Responsable des travaux: <span  class="text-danger">*</span></label>
                                                <div class="offset-md-1  col-md-10 ">
                                                    <input type="text" name="respo_travaux" data-required="1" value="'.$value["NOM_RESPO_TRAVAUX"].'" placeholder="" class="form-control input-height  respo_travaux" /> 
                                                     <span id="erreur_respo_travaux" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="offset-md-1 control-label ">Contact du responsable des travaux: </label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="tel_respo_travaux" data-required="1" value="'.$value["CONTACT_RESPO_TRAVAUX"].'"placeholder="" class="form-control input-height tel_respo_travaux" /> 
                                                     <span id="erreur_tel_respo_travaux" class="text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <label class="offset-md-1  control-label">
                                                Objet des travaux  <span class="required" class="text-danger"> *</span>
                                            </label> 
                                                <div class="offset-md-1 col-md-10">                
                                                    <textarea name="description" value="" class="form-control-textarea objet">
                                                          '.$value["OBJET_TRAVAUX"].'
                                                       </textarea>
                                                    <span id="erreur_objet" class="text-danger"></span>
                                                </div>
                                            </div>
                                           
  
                                             </div><!--fin de la portion de la gauche-->

                                        <div class="form-group col-md-6" >  
                                          <!--  <div class="form-group row  ot">
                                                <br>
                                               <div class=" offset-md-1 col-md-10 ">
                                                   <label class="radio-inline ">
                                                  <input type="radio" name="intervention" value="oui"><b> AVEC OT</b></label>
                                                <label class="radio-inline offset-md-1">
                                                  <input type="radio" name="intervention"  value="non" checked> SANS OT
                                                </label>
                                            
                                               </div>
                                            </div>-->
                                             
                                            
                                            <div class="form-group row ">
                                                <label class="offset-md-1 control-label">Site concerné: <span  class="text-danger">*</span></label>
                                            <div class="offset-md-1  col-md-10 ">
                                                    <select name="site" id="site" class="form-control site">
                                                    <option  value="'.$value['site'].'">'.$value['site'].'</option>
                                                    '. $table.'   
                                                    </select>
                                                     <span id="erreur_site" class="text-danger"></span>
                                                    
                                            </div>
                                            <label class="offset-md-1" style="font-size: 0.9em;" id="siteSelctionnes"></label>
                                            </div>

                                            <div class="form-group row" >
                                              
                                                <div class=" offset-md-1  col-md-10"  id="salle">
                                                <select name="salle" class"salle" placeholder="" class="form-control site">
                                                    <option>'.$value['salle'].'
                                                    
                                                    </select>
                                                
                                                </div>
                                               <span id="erreur_salle col-md-2" class="text-danger offset-md-1"></span>
                                             </div>
                                             
                                             <span id="salle"></span>
                                           
                                            <div>
                                                
                                            </div>

                                             <div class="form-group row" >  
                                                <div class=" offset-md-1  col-md-10"  id="equipement">
                                                                                                   
                                                </div>
                                             </div>
                                               
                                              <div class="form-group row" >  
                                                <div class=" offset-md-1  col-md-10"  >
                                                   <label class="control-label control-label">Date Debut des travaux
                                                    <span class="required" class="text-danger">* </span>
                                                </label>
                                               
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
                                                        <input class="form-control input-height datedebut" name="date" size="16"  type="text" value="'.$value["DATE_DEBUT"].'">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        <span id="erreur_datedebut" class="text-danger"></span>
                                                    </div>
                                                    <input type="hidden" id="dtp_input2" value="" />
                                                
                                                
                                                </div>
                                             </div>

                                             <div class="form-group row" >  
                                                <div class=" offset-md-1  col-md-10" >
                                                   <label class="control-label ">Date Fin des travaux
                                                    <span class="required">  </span>
                                                </label>
                                               
                                                    <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="dd-mm-yyyy">
                                                        <input class="form-control input-height datefin" name="date" size="16"  type="text" value="'.$value["DATE_FIN"].'">
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                         
                                                    </div>
                                                    <span id="erreur_datefin" class="text-danger"></span>
                                                    <input type="hidden" id="dtp_input1" value="" />
                                                
                                                
                                                </div>
                                             </div>

                                              <div class="form-group row" >  
                                                <div class=" offset-md-1  col-md-10 "  >
                                                   <label class="control-label ">Heure debut des travaux
                                                    <span class="required">  </span>
                                                </label>      
                                                        <input type="time" class="form-control input-height heuredebut" name="heuredebut" size="16" placeholder="" type="text" value="'.$value["HEURE_DEBUT"].'"">
                                                        <span id="erreur_heur_debut" class="text-danger"></span>
                                                 
                                                </div>
                                                
                                             </div>

                                             <div class="form-group row" >  
                                                <div class=" offset-md-1  col-md-10" >
                                                   <label class="control-label ">Heure Fin des travaux
                                                    <span class="required">  </span>
                                                </label>      
                                                        <input type="time" class="form-control input-height heurefin" name="heurefin" size="16" placeholder="" type="text" value="'.$value["DATE_FIN"].'"">
                                                        <span id="erreur_heur_fin" class="text-danger"></span>
                                                </div>

                                             </div>
                                          <div class="form-group row">
                                                <label class="offset-md-1">Raison sociale: <span  class="text-danger">*</span></label>
                                                <div class="offset-md-1  col-md-10">
                                                    <input type="text" name="raison" value="'.$value["RAISON_SOCIALE"].'" data-required="1" placeholder="" class="form-control input-height raison" /> 
                                                    <span id="erreur_raison" class="text-danger">
                                                    
                                                    </span>
                                                </div>
                                          </div>  
                                             <div class="form-group row">
                                            <label class="offset-md-1  control-label">
                                                Risques probables  <span class="required" class="text-danger"> *</span>
                                            </label> 
                                                <div class="offset-md-1 col-md-10">                
                                                    <textarea name="description" value="'.$value["risque"].'" class="form-control-textarea risque">   </textarea>
                                                    <span id="erreur_risque" class="text-danger"></span>
                                                </div>
                                            </div>

                                            </div><!--fin coté gauche-->

                                        </div> <!--fin row form--> 


';
  
  }
  echo $form;
}else echo "<span>Un probleme s'est produit lors de l'affichage du formulaire</span>";
}

}