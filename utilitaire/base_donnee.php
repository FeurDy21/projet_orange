<?php
        
      
	
        global $conn;           
      try {
			
         $conn=new PDO('mysql:host=localhost;dbname=datacenter','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 

		} catch (Exception $e) {
			echo '<script>alert("Connexion échouée")</script>';
			echo '<script>alert("'.$e->getMessage().'")</script>';
		}
               
                
	?>	
           
