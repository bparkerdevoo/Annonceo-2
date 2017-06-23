<?php


require_once("inc/init.inc.php");

if(!internauteEstConnecte())// si le membre n'est pas connecté, il ne doit pas avoir accés à la page profil
{
	header("location:connexion.php"); // nous l'invitons à se connecter
}

$content='';




$content .= '<h1 class="">Bonjour ' . $_SESSION['membre']['pseudo'] .'!<h1>';

//Information du profil de l'utilisateur
$content .= '<h2> Voici les informations de votre profil </h2>';
$content .= '<h3> Votre email est : '  . $_SESSION['membre']['email'].'<h3>';
$content .= '<h3> Votre prénom est : '  . $_SESSION['membre']['prenom'].'<h3>';
$content .= '<h3> Votre nom est : '  . $_SESSION['membre']['nom'].'<h3>';
$content .= '<h3> Votre téléphone est : '  . $_SESSION['membre']['telephone'].'<h3>';
$content .= '<h3> Vous êtes membre depuis : '  . $_SESSION['membre']['date_enregistrement'].'<h3>';

;




//------- SUPPRESSION des annonces --------//
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	// Executez une requete de suppression
	$bdd->query("DELETE FROM annonce WHERE id_annonce='$_GET[id_annonce]'");
	$content .= "<p class=\"alert alert-success\">L'annonce n° " . $_GET['id_annonce'] . " a été supprimée</p>";

	
}

//Affichage des annonces en cours



	$r =$bdd->query("   SELECT annonce.titre, annonce.prix, annonce.date_enregistrement,commentaire.commentaire,commentaire.membre_id    FROM annonce
    LEFT JOIN commentaire ON annonce.membre_id = commentaire.membre_id");


	$content .= "<h1 class=\"text-center\">Vous avez " . $r->rowCount() . " annonce(s)</h1>";
	$content .=  "<table class='table table-striped text-center'><tr>";
	for($i = 0; $i < $r->columnCount(); $i++)
	{
		$colonne = $r->getColumnMeta($i);
		$content .= "<th class=\"text-center\">$colonne[name]</th>";
	}
	$content .= "<th>actions</th>";
	$content .= "</tr>";
	while($ligne = $r->fetch(PDO::FETCH_ASSOC))
	{
		$content .= '<tr>';
		foreach($ligne as $indice => $valeur)
		{
			$content .= "<td>$valeur</td>";

		}
		$content .= "<td><a href=\"?action=modification&id_annonce=$ligne[id_annonce]\"><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a><a href=\"?action=suppression&id_annonce=$ligne[id_annonce]\"><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";


		$content .= '</tr>';
	}
	$content .= "</table>";


if(internauteEstConnecteEtEstAdmin())
{
	$content .= '<h1>Vous êtes ADMIN</h1>';
}
else
{
	$content .= '<h1>Vous êtes MEMBRE</h1>';
}





require_once("inc/haut.inc.php");


echo $content;






require_once("inc/bas.inc.php");


?>