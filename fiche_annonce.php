<?php 
require_once("inc/init.inc.php");

$content = '';

$r =$bdd->query("

	SELECT annonce.titre, annonce.description_longue, annonce.categorie_id, annonce.prix, annonce.photo, annonce.ville, annonce.adresse, annonce.cp, annonce.date_enregistrement, membre.prenom, membre.telephone, membre.email, note.note, photo.photo1, photo.photo2, photo.photo3, photo.photo4, commentaire.commentaire, categorie.titre, annonce.id_annonce

	FROM annonce
	LEFT JOIN membre ON annonce.membre_id = membre.id_membre
	LEFT JOIN photo ON annonce.photo_id = photo.id_photo
	LEFT JOIN note ON annonce.membre_id = note.membre_id1
	LEFT JOIN commentaire ON annonce.id_annonce = commentaire.annonce_id
	LEFT JOIN categorie ON annonce.categorie_id = categorie.id_categorie


	WHERE annonce.id_annonce = $_GET[id_annonce]



	");

$annonce_actuel = $r->fetchAll(PDO::FETCH_ASSOC); 
debug($annonce_actuel);



require_once("inc/haut.inc.php");
echo $content;
foreach ($annonce_actuel as $key => $value): 
?>

	<div class="row">
		<div class="titre col-md-12" style="height:30px;">

			<div class="title col-md-6" style="height:100%;">
				<h2 style="margin: 0"><?= $value['titre']?></h2>
			</div>

			<div class="contact col-md-6 text-right"  style="height:100%;">
				<button class="btn btn-success">Contacter <?= $value['prenom']?></button>
			</div>
			
		</div>
		
	</div>


	<div class="row">
		<div class="main col-md-12">
			<hr>
			<div class="photo col-md-6">
				<img src="photo/stylo.jpg" alt="" width="500" height="500">
			</div>

			<div class="description col-md-6">
				<h3>Description</h3>
				<p><?= $value['description_longue']?></p>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="info col-md-12">
			<hr>
			<div class="date col-md-3">Date de publication : <?= $value['date_enregistrement']?></div>
			<div class="note col-md-3"><?= $value['prenom']?> <?= $value['note']?></div>
			<div class="prix col-md-3">€ <?= $value['prix']?></div>
			<div class="adresse col-md-3">Adresse : <?= $value['adresse']?>, <?= $value['cp']?>, <?= $value['ville']?></div>
		
		</div>

	</div>


	<div class="row">
		<div class="map col-md-12">
			<hr>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.1872829199374!2d2.354114115820651!3d48.85463900892465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671fd10fa77a9%3A0xb2bbd365849898f2!2sWebforce3!5e0!3m2!1sfr!2sfr!4v1498210168822" width="1150" height="350" frameborder="0" style="border:0"></iframe>
		</div>
	</div>


	<div class="row">
		<div class="photo col-md-12">

			<h2>Autres Annonces</h2>
			<hr>

			<?php 

					$d =$bdd->query("SELECT photo FROM annonce WHERE categorie_id = '$annonce_actuel[categorie_id]'");

					while($ligne = $d->fetch(PDO::FETCH_ASSOC))
					{
						
						foreach ($ligne as $indice => $valeur) 
						{
									
							echo "<div class=\"onephoto col-md-3\">
									<img src=\"$valeur\" height=\"200\" width=\"250\">
									</div>";
						}
						
					}

			?>
			

		</div>
	</div>


	<div class="row">
		<div class="liens col-md-12">

			<hr>
			<div class="row" style="height:40px;">

				<div class="link col-md-6">
					<a href="">Déposer un commentaire ou une note</a>
				</div>

				<div class="link col-md-6 text-right">
					<a href="accueil.php">Retour vers les annonces</a>
				</div>

			</div>	

			<div class="row">
				<div class="com col-md-12">
					
					<table class="table">
						
						<?php 

							$p =$bdd->query("SELECT commentaire FROM commentaire WHERE annonce_id = '$annonce_actuel[id_annonce]'");

							while($ligne = $p->fetch(PDO::FETCH_ASSOC))
							{
								echo'<tr>';
								foreach ($ligne as $indice => $valeur) 
								{
									
									echo "<td>$valeur</td>";

								}
								echo'</tr>';
							}

						 ?>

					</table>

				</div>
			</div>	
			
		</div>
	</div>



<?php 

endforeach;
require_once("inc/bas.inc.php");
?>