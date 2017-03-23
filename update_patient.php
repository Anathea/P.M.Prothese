<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'requetes.php';

$id = $_GET['id'] ?? NULL;

if($id === NULL){
    header('Location: medecin.php');
}

$id = (int) $id;

$db = new DB();
$one_patient = $db->get_one_patient($id);

require 'header.php';
?>

<h2>Modifier le profil patient :</h2>
<form method="post" action="do_update_patient.php?id=<?=$one_patient['id']?>">
		<div>
			<label for="nom">Nom du patient :</label>
			<input type="text" name="nom" id="nom" value="<?=$one_patient['nom']?>" required>
		</div>
		<div>
			<label for="prenom">Prénom du patient :</label>
			<input type="text" name="prenom" id="prenom" value="<?=$one_patient['prenom']?>" required>
		</div>
                <div>
			<label for="secu">Numéro de sécurité sociale :</label>
			<input type="text" name="secu" id="secu" value="<?=$one_patient['secu']?>" required>
		</div>
                <div>
			<label for="allergie">Allergie(s) :</label>
			<input type="text" name="allergie" id="allergie" value="<?=$one_patient['allergie']?>">
		</div>
                <div>
			<label for="type">Type de prothèse :</label>
			<select name="type" id="type">
                                <option value="esthétique"<?=($one_patient['type'] == 'esthétique' ? ' selected>' : '>')?>Esthétique</option>
                                <option value="fonctionnelle"<?=($one_patient['type'] == 'fonctionnelle' ? ' selected>' : '>')?>Fonctionnelle</option>
                                <option value="myoélectrique"<?=($one_patient['type'] == 'myoélectrique' ? ' selected>' : '>')?>Myoélectrique</option>
			</select>
		</div>
                <div>
			<label for="caracteristique">Caractéristique de la prothèse</label>
                        <p style="display: inline-block; padding-right: 50px;">Solidité</p><p style="display: inline-block; padding-left: 50px;">Légèreté</p>
                        <br>
                        <input type="range" min="0" max="2" step="1" value="<?=$one_patient['caracteristique']?>">
		</div>
                <div>
                    <input type="checkbox" name="detachable" id="detachable"<?=($one_patient['detachable'] ? ' checked>' : ' value="detachable">')?>
                    <label for="detachable">Prothèse amovible</label>
                </div>
		<div>
			<label for="longueur">Longueur :</label>
                        <input type="longueur" name="longueur" id="longueur" value="<?=$one_patient['longueur']?>">
		</div>
		<div>
			<label for="largeur">Largeur :</label>
                        <input type="largeur" name="largeur" id="largeur" value="<?=$one_patient['largeur']?>">
		</div>
		<div>
			<input type="submit" name="action" id="action" 
                        value="Modifier">
		</div>
	</form>
<?php require 'footer.php';