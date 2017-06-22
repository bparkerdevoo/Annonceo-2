<?php

function debug($var, $mode = 1){

$trace = debug_backtrace();

echo "<strong>debug demandé dans le fichier " . $trace[0]['file'] . " en ligne : " . $trace[0]['line'] . "</strong>";

if ($mode == 1){
  echo '<pre>'; var_dump($var); echo '</pre>' ;
}
else {
  echo '<pre>'; print_r($var); echo '</pre>' ;
}
}



function internauteEstConnecte() // cette fonction m'indique si le membre est connecté
{
	if(!isset($_SESSION['membre']))// si la session "membre" est non définie(elle ne peut être que définie si nous sommes passés par la page de connexion avec le bon mot de passe)
	{
		return false;
	}
	else
	{
		return true;
	}
}
//-------------------------------------------------------
function internauteEstConnecteEtEstAdmin()// cette fonction m'indique si le mebre est admin
{
	if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1)// si la session du membre est definie , nous regardons si il est admin, si c'est le cas, nous retournons true
	{
		return true;
	}
	else
	{
		return false;
	}
}



 ?>



