<?php

// Mise en temps illimité du Time Out
ini_set('max_execution_time', 0);
// Augmentation de la taille de la mémoire alloué à php pour le traitement des fichiers.
ini_set('memory_limit','320M'); // UPLOAD MULTIPLE OU GROS FICHIER

function genererChaineAleatoire($longueur =5)
{
 return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',ceil($longueur/strlen($x)) )),1,$longueur);
}
//Utilisation de la fonction
 

function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 100;
    $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}





	function uploafile($file,$path){
//le fichier à uploader et le chemin dans lequel il doit etre inseré

if ($file['tmp_name']) {
	$extenssion= explode(".", $file['name']);

$new_nom= genererChaineAleatoire().".".$extenssion[1];

$destination=$path.$new_nom;
   move_uploaded_file($file["tmp_name"], $destination);

    return $new_nom;
}

	/*$imageProcess = 0;
    if(isset($file)) {
        $fileName = $file["tmp_name"]; //on prend le nom original de l'image
        $sourceProperties = getimagesize($fileName); //on prend la hauteur, l'argeur et type de l'image
        $resizeFileName = genererChaineAleatoire();//on donne un nom qui nous vient d'une taille aleatoire à l'image
        $uploadPath = $path;//on donne le chemine q'on a infiqué en parametre
        $fileExt = pathinfo($file["name"], PATHINFO_EXTENSION); //on requepere l'extension de l'image
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagegif($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagepng($imageLayer,$uploadPath.$resizeFileName.'.'. $fileExt);
                break;
 
            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file["tmp_name"], $uploadPath.$resizeFileName. ".". $fileExt);
        $imageProcess = 1;


}*/

 return null;
}

	?>

