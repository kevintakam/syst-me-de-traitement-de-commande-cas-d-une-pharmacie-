<?php
session_start();
$dossier = 'upload';
$_FILES['avatar']['name'] = $_SESSION['image'];
$_FILES['avatar']['tmp_name']='../upload/cle.jpg';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 1000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.');
//D�but des v�rifications de s�curit�...
echo $_FILES['avatar']['tmp_name'];
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          '����������������������������������������������������', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);?>
     <?php 
     if(move_uploaded_file($_FILES['avatar']['tmp_name'],$dossier.$fichier)) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
     {
          echo 'Upload effectu� avec succ�s !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
?>
