<?php
   session_start();
   include('../utilitaire/init.php');
   include('../utilitaire/file_upload.php');
   include('../utilitaire/base_donnee.php');
   
  


if ($_POST['action']) {
 
	# code...
if($_POST['action']="valider"){

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

if($_POST['action']="affichage"){

 $inter=new Intervention_impl($conn);

  $intervention=$inter->findAllOT();

   foreach ($Intervention as $value) {
     # 

   }


}


}