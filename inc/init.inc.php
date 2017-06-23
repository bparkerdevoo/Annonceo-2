<?php





try {
  $bdd = new PDO('mysql:host=localhost;dbname=annonceo;charset=utf8','root','');
} catch (PDOException $e) {
  echo 'Connexion échouée : ' . $e;
}

session_start();

require_once('fonction.inc.php');

 ?>
