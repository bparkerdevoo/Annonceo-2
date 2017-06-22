<?php 
require_once("../inc/init.inc.php");

$content = '';
/***************  SECURITE ADMIN  *********************************************/

/*if(!internauteEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit(); // interrompt le script
}*/
/*******************************************************************************/   


// --------------------SUPRESSION ANNONCE --------------------------------------

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
	$bdd->query("DELETE FROM produit WHERE id_produit= '$_GET[id_produit]'");
	$content .="<div class ='validation'> Le produit n° ". $_GET['id_produit'] . " a été supprimé </div>";
}

/************ AFFICHAGE DES ANNONCES **************************************/

$r = $bdd->query ("SELECT * FROM annonce");
	$content .= "<h2>Affichage des " . $r->rowCount() . " annonce(s)</h2>";


	$content .= "<table style='border-collapse:collapse'><tr>.";



	for ($i=0; $i < $r->columnCount() ; $i++)
	{ 
		$colonne = $r->getColumnMeta($i);
		$content .= "<th>$colonne[name] </th>";
	}
	$content .= "<th>actions</th>";
	$content .= '</tr>';

	while($ligne = $r->fetch(PDO::FETCH_ASSOC))
	{
		$content .='<tr>';
		foreach ($ligne as $indice => $valeur) 
		{
			if($indice == 'photo')
			{
				$content .= "<td><img src='$valeur' width='70' height='70'></td>";
			}
			else
			{
				$content .= "<td>$valeur</td>";
			}

		}
		$content .= "<td><a href=\"?action=modification&id_annonce=$ligne[id_annonce]\"> M </a><a href=\"?action=supression&id_annonce=$ligne[id_annonce]\"> S </a><a href=\"?../fiche_annonce.php&action=affichage&id_annonce=$ligne[id_annonce]\"> A </a></td>";
		

		$content .= '<tr>';
	}
	$content .= '</table>';

// --------------------MODIFICATION ANNONCE --------------------------------------

if(isset($_GET['action']) == 'modification')
{

	if(isset($_GET['id_annonce']))
	{

		$resultat =$bdd->query("SELECT * FROM annonce WHERE id_annonce = $_GET[id_annonce]");

		$annonce_actuel = $resultat->fetch(PDO::FETCH_ASSOC); 

		$id_annonce = (isset($annonce_actuel['id_annoce'])) ? $annonce_actuel['id_annonce'] : '';
	

	$content .= "<h3>Formulaire de modification</h3>";
	$formulaire = '';
	$content .= $formulaire;

	}
}






require_once("../inc/haut.inc.php");

echo $content;

require_once("../inc/bas.inc.php");