<?php

$patientId = $_GET['id'] ?? -1;
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$secu = $_POST['secu'] ?? null;
$allergie = $_POST['allergie'] ?? null;
$type = $_POST['type'] ?? null;
$caracteristique = $_POST['caracteristique'] ?? null;
$detachable = $_POST['detachable'] ?? null;
$longueur = $_POST['longueur'] ?? null;
$largeur = $_POST['largeur'] ?? null;

        
$db = require 'connect.php';
require 'header.php';

echo '<h2>Ajouter un nouveau patient :</h2>
	<form method="post" action="">
		<div>
			<label for="nom">Nom du patient :</label>
			<input type="text" name="nom" id="nom" required>
		</div>
		<div>
			<label for="prenom">Prénom du patient :</label>
			<input type="text" name="prenom" id="prenom" required>
		</div>
                <div>
			<label for="secu">Numéro de sécurité sociale :</label>
			<input type="text" name="secu" id="secu" required>
		</div>
                <div>
			<label for="allergie">Allergie(s) :</label>
			<input type="text" name="allergie" id="allergie" >
		</div>
                <div>
			<label for="type">Type de prothèse :</label>
			<select name="type" id="type">
                                <option value="esthétique">Esthétique</option>
                                <option value="fonctionnelle">Fonctionnelle</option>
                                <option value="myoélectrique">Myoélectrique</option>
			</select>
		</div>
                <div>
			<label for="caracteristique">Caractéristique de la prothèse</label>
                        <p style="display: inline-block; padding-right: 50px;">Solidité</p><p style="display: inline-block; padding-left: 50px;">Légèreté</p>
                        <br>
                        <input type="range" min="0" max="2" step="1">
		</div>
                <div>
                    <input type="checkbox" name="detachable" id="detachable">
                    <label for="detachable">Prothèse amovible</label>
                </div>
		<div>
			<label for="longueur">Longueur :</label>
                        <input type="longueur" name="longueur" id="longueur">
		</div>
		<div>
			<label for="largeur">Largeur :</label>
                        <input type="largeur" name="largeur" id="largeur">
		</div>
		<div>
			<input type="submit" name="action" id="action" 
                        value="Ajouter">
		</div>
	</form>';

if($action == 'Ajouter') {
    if($nom !== null && $mana !== null && $description !== null) {
        $query = $db->prepare('INSERT 
            INTO patients (nom, prenom, secu, allergie, type, caracteristique, detachable, longueur, largeur)
            VALUES (:nom, :prenom, :secu, :allergie, :type, :caracteristique, :detachable, :longueur, :largeur)');
        $query->execute([':id' => intval($patientId),
            ':nom' => htmlentities($nom), 
            ':prenom' => htmlentities($prenom),
            ':secu' => intval($mana),
            ':allergie' => htmlentities($allergie), 
            ':type' => htmlentities($type),
            ':caracteristique' => intval($caracteristique),
            ':detachable' => intval($detachable),
            ':longueur' => intval($longueur),
            ':largeur' => intval($largeur)]);
        header('Location: index.php');
    }
}


require 'footer.php';