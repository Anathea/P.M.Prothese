<?php

require 'requetes.php';
require 'tools.php';


$id = $_GET['id'] ?? NULL;

if($id === NULL){
    header('Location: medecin.php');
}

$db = new DB();
$one_patient = $db->get_one_patient($id);

require 'header.php';
?>

<main>
		<div class="info-client">
			<h2><span class="capi"><?=$one_patient['prenom']?></span><?=$one_patient['nom']?></h2>
			<p>Né(e) le 09/12/1976</p>
			<p><?=$one_patient['secu']?></p>
		</div>
		<div class="cta clearfix">
			<a href="#" class="bouton-cta">CONTACTER MON MEDECIN</a>
			<a href="#" class="bouton-cta">Commander une prothèse</a>
			<a href="#" class="bouton-cta">ACCÉDER AU CATALOGUE</a>
			<a href="#" class="link-black">Changer mon mot de passe</a>
		</div>
		<div class="prescription clearfix">
			<h2>PRESCRIPTION DE VOTRE MEDECIN</h2>
			<p>Type de prothèse : prothèse <?=$one_patient['type']?></p>
                        <p>Caractéristique de la prothèse : <?=caracteristiques($one_patient['caracteristique'])?></p>
			<p>Matière de la prothèse : fibre de carbonne</p>
			<p>Longueur totale de la prothèse (cm) : <?=$one_patient['longueur']?></p>
			<p>Largeur de la prothèse (cm) : <?=$one_patient['largeur']?></p>
			<p>Allergie ou intolérance : <?=allergieOuPas($one_patient['allergie'])?></p>
                        <p>Détachable : <?=detach($one_patient['detachable'])?></p>
		</div>
		<div class="materiel clearfix">
			<h2>VOTRE MATERIEL</h2>
			<ul>
				<li>
					<article>
						<h3>Prothèse</h3>
						<figure>
							<img src="img-layout/picto-matos.png">
						</figure>
					</article>
				</li>
				<li>
					<article>
						<h3>Accessoire 1</h3>
						<figure>
							<img src="img-layout/picto-matos.png">
						</figure>
					</article>
				</li>
				<li>
					<article>
						<h3>Accessoire 2</h3>
						<figure>
							<img src="img-layout/picto-matos.png">
						</figure>
					</article>
				</li>
				<li>
					<article>
						<h3>Accessoire 3</h3>
						<figure>
							<img src="img-layout/picto-matos.png">
						</figure>
					</article>
				</li>
			</ul>
			<div class="atout clearfix">
				<a href="#" class="link-black">Remplacer ma prothèse</a>
				<a href="#" class="link-black">Entretenir ma prothèse</a>
				<a href="#" class="link-black">Certificat d’authenticité</a>
			</div>
		</div>
	</main>

<?php require 'footer.php';
