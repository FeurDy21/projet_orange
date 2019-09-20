<?php
      /*ce fichier va se charger d'autocharger le classe qu'on aura  appelée dans un fichier. il faut donc inclure ce fichier dans ce fichier. puis 
      puis on pourra faire par exemple, user=new Admin_class(). user deviendra objet de type Admin_class
       */
       
      spl_autoload_register(function($class){
        require_once "../Model/{$class}.php";
        
        
         
        //ce chemin parce que toutes les ckasses se trouve dans le dossier modele selon l'architecture du projet
        });
 
        