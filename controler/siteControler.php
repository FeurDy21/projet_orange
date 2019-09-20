<?php
   include('../../../utilitaire/base_donnee.php');
   
    spl_autoload_register(function($class){
         require_once"../../../Model/{$class}.php";
        
         
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
        
       

        
        
if (isset($_POST['action'])) {
  
   /// include('../.././utilitaire/base_donnee.php');
    if($_POST['action']=='Valider'){
    
    $nom=htmlspecialchars(trim($_POST["nom"]));
    $local=htmlspecialchars(trim($_POST["localisation"]));
    $desc=htmlspecialchars(trim($_POST["description"]));
    
      include('../../../utilitaire/file_upload.php');
    $filename;
    if($_FILES['photo']['name']!=''){
        
    $filename=uploafile($_FILES['photo'],"../../../imagesUploaded/imageSite/");
     

    }
    
    if ($filename ) {
        if ($filename!=null) {
            # code...
       
      $site=new Site(array("nom"=>$nom,"localisation"=>$local,"description"=>$desc,"photo"=>$filename));
    
    $conn=new PDO('mysql:host=localhost;dbname=datacenter','root','');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
     //// On
//émet une alerte à chaque fois qu'une requête a échoué.
     //puis on passe passe une instance de la connexion à la classe qui sert de midelware
     // $p= new BD($p);    
     $addsit=new Site_impl($conn); 
     
     if($addsit->addSite($site)){
        // header("location:../IHM/admin/light/add_site.php?site=ajouter");
        echo 'ajout reussi' ;
        
     } else {
         echo 'ECHEC. Verifier le serveur';
        
     }
      }
        
    }

    }
    //apres avoir controlé les données, on abeuve la classe
    
    } 
}


 
     
     