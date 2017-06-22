<?php

require_once('inc/init.inc.php');

$annonces = $bdd->query('SELECT
  annonce.titre, annonce.description_courte, annonce.prix, membre.pseudo, note.note
  FROM annonce
  LEFT JOIN membre ON membre.id_membre = annonce.membre_id
  LEFT JOIN note ON annonce.membre_id = note.membre_id1
  ');

//$results = $annonces->fetchAll(PDO::FETCH_ASSOC);

$results = $annonces->fetchAll(PDO::FETCH_ASSOC);


require_once('inc/haut.inc.php');

 ?>

<div class="row">
  <div class="col-sm-12 col-md-8">
    <!-- affichage des annonces -->

        <?php foreach ($results as $key => $value): ?>
          <div class="">
            <h3><?php echo $value['titre'] ?></h3>
            <img src="" alt="">
            <span><?php echo $value['description_courte'] ?></span>
            <span><?php echo $value['prix'] ?></span>
          </div>
        <?php endforeach; ?>


  </div>
  <div class="col-sm-12 col-md-8">
    <!-- affichage du form de gauche -->
    <form class="" action="index.html" method="post">

    </form>
  </div>

</div>
