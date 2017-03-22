<?php

/*
 * Cette page sert à modifier un profil patient.
 */

$db = require_once 'connect.php';
require_once 'header.php';

$id = $_POST['id'] ?? null;
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$secu = $_POST['secu'] ?? null;
$allergie = $_POST['allergie'] ?? null;
$type = $_POST['type'] ?? null;
$caracteristique = $_POST['caracteristique'] ?? null;
$detachable = $_POST['detachable'] ?? null;
$longueur = $_POST['longueur'] ?? null;
$largeur = $_POST['largeur'] ?? null;

//Bloc de modification
if($action == 'Modifier') {
    if($nom !== null && $mana !== null && $description !== null) {
        $query = $db->prepare('UPDATE patients
            SET 
              nom = :nom, 
              prenom = :prenom, 
              secu = :secu, 
              allergie = :allergie, 
              type = :type, 
              caracteristique = :caracteristique,
              detachable = :detachable, 
              longueur = :longueur, 
              largeur = :largeur
            WHERE id = :id');
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

//Bloc récupération de données
$query = $db->prepare('SELECT nom, prenom, secu, allergie, type, caracteristique, detachable, longueur, largeur
        FROM patients
        WHERE id = :id');
$query->execute( [':id' => $patientId]);
$patients = $query->fetchAll();


// Bloc traitement d'affichage
if (!count($patients)) {
    echo '<div><p>Aucun patient à cette adresse !</p></div>';
}

$one_patient = $patients[0]; 
echo '<h2>Modifier le profil patient :</h2>
	<form method="post" action="">
		<div>
			<label for="nom">Nom du patient :</label>
			<input type="text" name="nom" id="nom" value="' . $one_patient['nom'] . '" required>
		</div>
		<div>
			<label for="prenom">Prénom du patient :</label>
			<input type="text" name="prenom" id="prenom" value="' . $one_patient['prenom'] . '" required>
		</div>
                <div>
			<label for="secu">Numéro de sécurité sociale :</label>
			<input type="text" name="secu" id="secu" value="' . $one_patient['secu'] . '" required>
		</div>
                <div>
			<label for="allergie">Allergie(s) :</label>
			<input type="text" name="allergie" id="allergie" value="' . $one_patient['secu'] . '">
		</div>
                <div>
			<label for="type">Type de prothèse :</label>
			<select name="type" id="type">
                                <option value="esthétique"' . ($one_patient['type'] == 'esthétique' ? ' selected>' : '>') . 'Esthétique</option>
                                <option value="fonctionnelle"' . ($one_patient['type'] == 'fonctionnelle' ? ' selected>' : '>') . 'Fonctionnelle</option>
                                <option value="myoélectrique"' . ($one_patient['type'] == 'myoélectrique' ? ' selected>' : '>') . 'Myoélectrique</option>
			</select>
		</div>
                <div>
			<label for="caracteristique">Caractéristique de la prothèse</label>
                        <p style="display: inline-block; padding-right: 50px;">Solidité</p><p style="display: inline-block; padding-left: 50px;">Légèreté</p>
                        <br>
                        <input type="range" min="0" max="2" step="1">
		</div>
                <div>
                    <input type="checkbox" name="detachable" id="detachable"' . ($one_patient['detachable'] ? ' checked>' : ' value="detachable">') . '
                    <label for="detachable">Prothèse amovible</label>
                </div>
		<div>
			<label for="longueur">Longueur :</label>
                        <input type="longueur" name="longueur" id="longueur" value="' . $one_patient['longueur'] . '">
		</div>
		<div>
			<label for="largeur">Largeur :</label>
                        <input type="largeur" name="largeur" id="largeur" value="' . $one_patient['largeur'] . '">
		</div>
		<div>
			<input type="submit" name="action" id="action" 
                        value="Modifier">
		</div>
	</form>';


require_once 'footer.php';
