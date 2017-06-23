<?php 
require_once("inc/init.inc.php");

$content = '';

$r =$bdd->query("

	SELECT annonce.titre, annonce.description_longue, annonce.prix, annonce.photo, annonce.ville, annonce.adresse, annonce.cp, annonce.date_enregistrement, membre.prenom, membre.telephone, membre.email, note.note, photo.photo1, photo.photo2, photo.photo3, photo.photo4, commentaire.commentaire

	FROM annonce
	LEFT JOIN membre ON annonce.membre_id = membre.id_membre
	LEFT JOIN photo ON annonce.photo_id = photo.id_photo
	LEFT JOIN note ON annonce.membre_id = note.membre_id1
	LEFT JOIN commentaire ON annonce.id_annonce = commentaire.annonce_id


	and annonce.id_annonce = $_GET[id_annonce]



	");

//$annonce_actuel = $r->fetch(PDO::FETCH_ASSOC); 
debug($r);

require_once("inc/haut.inc.php");
echo $content;

?>

	<div class="row">
		<div class="titre col-md-12">

			<div class="title col-md-6" >
				<h1></h1>
			</div>

			<div class="contact col-md-6">
				<button class="btn btn-success"></button>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="main col-md-12">

			<div class="photo col-md-6">
				<img src="" alt="" width="600" height="600">
			</div>

			<div class="description col-md-6">
				<p></p>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="info col-md-12">
			<div class="date col-md-3"></div>
			<div class="note col-md-3"></div>
			<div class="prix col-md-3"></div>
			<div class="adresse col-md-3"></div>
		
		</div>
	</div>


	<div class="row">
		<div class="map col-md-12">
			
		</div>
	</div>


	<div class="row">
		<div class="photo col-md-12">

			<div class="onephoto col-md-3">
			<img src="" alt="" height="200" width="250">
			</div>

			<div class="onephoto col-md-3">
			<img src="" alt="" height="200" width="250">
			</div>

			<div class="onephoto col-md-3">
			<img src="" alt="" height="200" width="250">
			</div>

			<div class="onephoto col-md-3">
			<img src="" alt="" height="200" width="250">
			</div>

		</div>
	</div>


	<div class="row">
		<div class="liens col-md-12">

			<div class="row">

				<div class="link col-md-6">
					<a href=""></a>
				</div>

				<div class="link col-md-6">
					<a href=""></a>
				</div>

			</div>	

			<div class="row">
				<div class="annonce col-md-12">
					
				</div>
			</div>	

		</div>
	</div>



<?php 
require_once("inc/bas.inc.php");
?>