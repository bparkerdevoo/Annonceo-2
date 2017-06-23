<?php


require_once("inc/init.inc.php");

/*if(!internauteEstConnecte())// si le membre n'est pas connecté, il ne doit pas avoir accés à la page profil
{
	header("location:connexion.php"); // nous l'invitons à se connecter
}

*/


$content .= '<h1 class="">Bonjour' . $_SESSION['membre']['pseudo'] .'!<h1>';

//Information du profil de l'utilisateur
$content .= '<div><h2> Voici les informations de votre profil </h2>';
$content .= '<h3> Votre email est : '  . $_SESSION['membre']['email'].'<h3>';
$content .= '<h3> Votre prénom est : '  . $_SESSION['membre']['prenom'].'<h3>';
$content .= '<h3> Votre nom est : '  . $_SESSION['membre']['nom'].'<h3>';
$content .= '<h3> Votre téléphone est : '  . $_SESSION['membre']['telephone'].'<h3>';
if ($_SESSION['membre']['statut']==1){
	$content.='<h3>Vous êtes administrateur</h3>';
}
else{
	$content.='<h3>Vous êtes membre</h3>';
}






require_once("inc/haut.inc.php");


echo $content;

require_once("inc/bas.inc.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Profil</h1>
	
</body>
</html>