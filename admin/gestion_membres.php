<?php

require_once('../inc/init.inc.php');

require_once('../inc/haut.inc.php');

$req = $bdd->query('SELECT * FROM membre');

if (!empty($_POST)) {

  debug($_POST);
  // création de variables pour insertion du nouveau membre

  $pseudo = strip_tags($_POST['pseudo']);
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);
  $telephone = strip_tags($_POST['telephone']);
  $nom = strip_tags($_POST['nom']);
  $prenom = strip_tags($_POST['prenom']);
  $civilite = strip_tags($_POST['civilite']);
  $statut = strip_tags($_POST['statut']);
  $error = '';


  // contrôle de conformité pour les différents champs

  //champs pseudo : entre 3 et 20 caractères et - _
  if (!preg_match("/^[a-zA-Z0-9_-]{3,20}$/", $pseudo)) {
    $error .= 'Attention ! Votre pseudo doit contenir entre 3 et 20 caractères et seulement les caractères - (tiret) et _ (underscore) !<br />';
  };

  //champs email : email valide
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error .= 'Merci d\'indiquer une email valide !<br />';
  };

  //champs téléphone : numéro à 10 chiffres commençant par 0
  if (!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $telephone)) {
    $error .= 'Merci d\'indiquer un numéro de téléphone valide !<br />';
  };

  

  $insert = $bdd->prepare('INSERT INTO membre (pseudo, email, password, telephone, nom, prenom, civilite, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

  $insert->execute(array($pseudo, $email, $password, $telephone, $nom, $prenom, $civilite, $statut));

  echo $error;
}



?>

  <!-- ********************** Tableau affichage membres ******************************* -->

  <h1 class="text-center">Gestion des membres</h4>
  <div class="col-sm-12">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <?php for ($i=0; $i < $req->columnCount(); $i++) {
      $colonne = $req->getColumnMeta($i);
      if ($colonne['name'] == 'mdp'){
          // on cache la colonne mot de passe
      }else {
        echo '<th>' . $colonne['name'] . '</th>';
      }

    } ?>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          <?php while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
          echo '<tr>';
          foreach ($ligne as $key => $value) {
            if ($key == 'mdp') {
              // on cache la colonne mdp
            }else {
              echo '<td>' . $value . '</td>';
            }

          };
          echo '<td><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td></tr>';
        } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-sm-12">
    <form class="" method="post">

      <div class="col-sm-12 col-md-4">
        <div class="form-group">
          <label class="" for="pseudo">Pseudo</label>
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-4 col-md-offset-4">
        <div class="form-group">
          <label class="" for="email">Email</label>
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
            <input type="email" class="form-control" id="email" name="email" placeholder="email">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-4">
        <div class="form-group">
          <label class="" for="password">Mot de passe</label>
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
            <input type="password" class="form-control" id="password" name="password" placeholder="password">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-4 col-md-offset-4">
        <div class="form-group">
          <label class="" for="telephone">Téléphone</label>
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="telephone">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-4">
        <div class="form-group">
          <label class="" for="nom">Nom</label>
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-4 col-md-offset-4">
        <div class="form-group">
          <label class="" for="prenom">Prénom</label>
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-2">
        <div class="form-group">
          <label class="" for="civilite">Civilité</label>
            <select class="form-control" name="civilite">
              <option value="m">Homme</option>
              <option value="f">Femme</option>
            </select>
        </div>
      </div>

      <div class="col-sm-12 col-md-2 col-md-offset-6">
        <div class="form-group">
          <label class="" for="statut">Statut</label>
            <select class="form-control" name="statut">
              <option value="0">Membre</option>
              <option value="f">Admin</option>
            </select>
        </div>
      </div>

      <div class="col-sm-12 col-sm-offset-5 col-md-2 col-md-offset-5">
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Enregistrer</button>
        </div>
      </div>

    </form>
  </div>


<?php

require_once('../inc/bas.inc.php');

 ?>
