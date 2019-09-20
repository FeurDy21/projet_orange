<?php
   
    
    
        
       

    $succes="";$erreur_nom=""; $echec=""; $nom=""; $desc=""; $site;  

if (isset($_POST['action'])) {
  
   /// include('../.././utilitaire/base_donnee.php');
    if($_POST['action']=='Valider'){
    
    $nom=htmlspecialchars(trim($_POST["nom"]));
    $desc=htmlspecialchars(trim($_POST["description"]));
    $site=$_POST["site"];
    $site=explode(" ",$site);
    if ($nom&&$site[0] && $site[0]>0) {
      
         $salle=new Salle(array("nom"=>$nom,"id_site"=>$site[0],"description"=>$desc));
        
     //$p=$con->connect();
     $conn=new PDO('mysql:host=localhost;dbname=datacenter','root','');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
          $addsal=new Salle_impl($conn);
         
     if($addsal->addSalle($salle)){
        // header("location:../IHM/admin/light/add_site.php?site=ajouter");
        $succes=' ajout reussi' ;
        
     } else {
         $echec='ECHEC. Verifier le serveur';
        
     }

    }else{
       $erreur_nom="Entrez le nom de la salle"; 
    }


   
    
    //apres avoir controlé les données, on abeuve la classe
   
    
    //on prend une instance de la classe qui s'occupe de la d'etablie la connexion
    //
    //$con=new connexionDB();
    
     //// On
//émet une alerte à chaque fois qu'une requête a échoué.
     //puis on passe passe une instance de la connexion à la classe qui sert de midelware
 }    // $p= new BD($p);    
      
}
