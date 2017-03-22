<?php
$db = require_once 'connect.php';
require_once 'header.php';

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

//Bloc de modification
if($action == 'Modifier') {
    if($nom !== null && $mana !== null && $description !== null) {
        $query = $db->prepare('UPDATE kerazancards
            SET 
              nom = :nom,
              classe = :classe,
              description = :description,
              rarete = :rarete,
              mana = :mana,
              visibilite = :visibilite
            WHERE id = :id');
        $query->execute([':id' => intval($patientId),
            ':nom' => htmlentities($nom), 
            ':classe' => htmlentities($classe), 
            ':mana' => intval($mana),
            ':description' => htmlentities($description), 
            ':rarete' => htmlentities($rarete),
            ':visibilite' => intval($visibilite)]);
        header('Location: index.php');
    }
}

//Bloc récupération de données
$query = $db->prepare('SELECT nom, classe, mana, description, rarete, img, visibilite
        FROM kerazancards
        WHERE id = :id');
$query->execute( [':id' => $patientId]);
$patients = $query->fetchAll();


// Bloc traitement d'affichage
// Vérification de la page (sorte d'erreur 404)
if (!count($patients)) {
    echo '<div><p>Aucun patient à cette adresse !</p></div>';
}

// Fonctions pour l'affichage des informations du patient :
//fonction allergie(s)
function allergieOuPas($patient_allergie): string { 
    if (!$patient_allergie) {
        return '/';
    }
    return $patient_allergie;
}

// fonction caractéristique de la prothèse
function caracteristiques($patient_caract): string {
    switch ($patient_caract) {
        case '0':
            return 'Solide';
            
        case '1':
            return 'Normale';
            
        case '2':
            return 'Légère';

        default:
            return 'Non renseignée';
    }
}

// fonction prothèse détachable
function detach($patient_detach): string {
    if (!$patient_detach) {
        return 'Non';
    }
    return 'Oui';
}

$one_patient = $patients[0];
    echo '<a href="one_patient.php?id="' . $one_patient['id'] . '"><div class="info_patients"><h3>' . $one_patient['prenom']. ' ' . $one_patient['nom'] . '</h3>';
    echo '<p>Numéro de sécurité sociale : ' . $one_patient['secu'] . '</p>';
    echo '<p>Allergie(s) : ' . allergieOuPas($one_patient['allergie']) . '</p>';
    echo '<p>Type : ' . $one_patient['type'] . '</p>';
    echo '<p>Caractéristique de la prothèse : ' . caracteristiques($one_patient['caracteristique']) . '</p>';
    echo '<p>Détachable : ' . detach($one_patient['detachable']) . '</p>';
    echo '<p>Taille : ' . $one_patient['longueur'] . ' x ' . $one_patient['largeur'] . '</p>';
    echo '</div></a><div class="gestion_patients">';
    echo '<a href=""><div class="zone_clic"><button>Détails</button></div></a>';
    echo '<a href="one_patient.php?id='. $one_patient['id'] . '"><div class="zone_clic"><button>Modifier</button></div></a>';
    echo '<a href="delete.php?id='. $one_patient['id'] . '"><div class="zone_clic"><button>Supprimer</button></div></a>';
    echo '</div>';
//echo '<h2>Modifier une carte :</h2>
//	<form method="post" action="">
//                <div class="cartes"><img src="../img-content/' . $one_patient['img'] . '" alt="' . $one_patient['nom'] . '" title="' . $one_patient['nom'] . '"></div>
//		</div>
//                <div class="champ">
//			<label for="nom">Nom de la carte :</label>
//			<input type="text" name="nom" id="nom" 
//                        value="' . $one_patient['nom'] . '" required>
//		</div>
//                <div>
//			<label for="nom">Rareté de la carte :</label>
//                        <select name="rarete" id="rarete">
//				<option value="commune" ' . ($one_patient['rarete'] == 'commune' ? ' selected>' : '>') . 'Commune</option>
//				<option value="rare"' . ($one_patient['rarete'] == 'rare' ? ' selected>' : '>') . 'Rare</option>
//				<option value="epique"' . ($one_patient['rarete'] == 'epique' ? ' selected>' : '>') . 'Épique</option>
//				<option value="legendaire"' . ($one_patient['rarete'] == 'legendaire' ? ' selected>' : '>') . 'Légendaire</option>
//			</select>
//		</div>
//                <div class="champ">
//			<label for="classe">Classe de la carte :</label>
//			<select name="classe" id="classe">
//                                <option value="demoniste"' . ($one_patient['classe'] == 'demoniste' ? ' selected>' : '>') . 'Démoniste</option>
//                                <option value="druide"' . ($one_patient['classe'] == 'druide' ? ' selected>' : '>') . 'Druide</option>
//				<option value="mage"' . ($one_patient['classe'] == 'mage' ? ' selected>' : '>') . 'Mage</option>
//                                <option value="pretre"' . ($one_patient['classe'] == 'pretre' ? ' selected>' : '>') . 'Prêtre</option>
//                                <option value="paladin"' . ($one_patient['classe'] == 'paladin' ? ' selected>' : '>') . 'Paladin</option>
//				<option value="voleur"' . ($one_patient['classe'] == 'voleur' ? ' selected>' : '>') . 'Voleur</option>
//				<option value="chasseur"' . ($one_patient['classe'] == 'chasseur' ? ' selected>' : '>') . 'Chasseur</option>
//                                <option value="guerrier"' . ($one_patient['classe'] == 'guerrier' ? ' selected>' : '>') . 'Guerrier</option>
//				<option value="shaman"' . ($one_patient['classe'] == 'shaman' ? ' selected>' : '>') . 'Shaman</option>
//                                <option value="neutre"' . ($one_patient['classe'] == 'neutre' ? ' selected>' : '>') . 'Neutre</option>
//			</select>
//		</div>
//		<div class="champ">
//			<label for="mana">points de Mana :</label>
//                        <input type="number" name="mana" id="mana"
//                        value="' . $one_patient['mana'] . '" required>
//		</div>
//		<div class="champ">
//			<textarea name="description">' . $one_patient['description'] . '</textarea>
//		</div>
//                <div>
//                    <input type="checkbox" name="visibilite" id="visibilite"' . ($one_patient['visibilite'] ? ' checked>' : ' value="visible">') . '<label 
//                        for="visibilite">Carte visible</label>
//                </div>
//
//		<div class="champ">
//			<input type="submit" name="action" id="action" 
//                        value="Modifier">
//		</div>
//	</form>';


require_once 'footer.php';
