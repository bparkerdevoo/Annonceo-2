<?php

require_once('fonction.inc.php');

try {
  $bdd = new PDO('mysql:host=localhost;dbname=annonceo;charset=utf8','root','');
} catch (PDOException $e) {
  echo 'Connexion échouée : ' . $e;
}




 ?>
