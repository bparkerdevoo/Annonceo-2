<?php

require_once('inc/init.inc.php');

// requete pour annonce

$annonces = $bdd->query('SELECT
  annonce.titre, annonce.description_courte, annonce.prix, membre.pseudo, note.note
  FROM annonce
  LEFT JOIN membre ON membre.id_membre = annonce.membre_id
  LEFT JOIN note ON annonce.membre_id = note.membre_id1
  LIMIT 0, 3
  ');

$results_annonces = $annonces->fetchAll(PDO::FETCH_ASSOC);

// requete pour categories

$categories = $bdd->query('SELECT * FROM categorie');

$results_categories = $categories->fetchALL(PDO::FETCH_ASSOC);


// requete pour région


// requete pour membres

$membres = $bdd->query('SELECT * FROM membre');

$results_membres = $membres->fetchAll(PDO::FETCH_ASSOC);

// requete pour prix

// affichage en fonction d'un post

if (!empty($_GET)) {
  debug($_GET);
}


require_once('inc/haut.inc.php');

 ?>

  <div class="row">
    <div class="col-sm-12 col-md-8">
      <!-- affichage des annonces -->

      <?php foreach ($results_annonces as $key => $value): ?>
      <div class="">
        <h3><?= $value['titre'] ?></h3>
        <img src="" alt="">
        <span><?= $value['description_courte'] ?></span>
        <span><?= $value['pseudo'] . ' ' . $value['note'] ?></span>
        <span><?= $value['prix'] ?></span>
      </div>
      <?php endforeach; ?>


    </div>
    <div class="col-sm-12 col-md-8">
      <!-- affichage du form de gauche -->
      <form class="" method="post" id="form_filtres_gauche">
        <select class="form-control" name="categorie" id="select_categorie">
        <option value="*">Toutes les catégories</option>
        <?php foreach ($results_categories as $key2 => $value2): ?>
          <option value="<?= $value2['id_categorie'] ?>"><?= $value2['titre'] ?></option>
        <?php endforeach; ?>
      </select>
        <select class="form-control" name="membre" id="select_membre">
          <option value="*">Tous les membres</option>
        <?php foreach ($results_membres as $key3 => $value3): ?>
          <option value="<?= $value3['id_membre'] ?>"><?= $value3['pseudo'] ?></option>
        <?php endforeach; ?>
      </select>
      </form>
    </div>

  </div>

<!--*************************** fin de page ************************************** -->

<?php require_once('./inc/bas.inc.php'); ?>
