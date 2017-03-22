<?php

/*
 * Cette page est l'interface du médecin ('admin').
 * Elle lui permet de voir tout ses patients, d'accéder au détail du profil,
 * d'ajouter un nouveau profil de patient, de le modifier et de le supprimer.
 * On accède au détail du patient grâce à la page one_patient.php
 * qui récupère l'id avec la méthode GET
 */

//En cas de problème, retourner à 1.
//$page = intval($_GET['page'] ?? 1);
//$action = $_POST['action'] ?? NULL;
//$id = intval($_POST['id'] ?? NULL);

//Nombre de patients sur une page
$maxpatients = 20 ;

$db = require 'connect.php';
require 'header.php';

// Traitement des actions
// Supprimer
if($action == 'Supprimer') {
    $query = $db->prepare('DELETE
        FROM patients
        WHERE id = :id');
    $query->execute([':id' => $id]);
}

//Bloc récupération de données
$query = $db->prepare('SELECT id, nom, prenom, secu, allergie
        FROM patients
        LIMIT ' . $maxpatients * ($page - 1) . ', ' . ($maxpatients + 1)); //Hack page suivante
$query->execute();
$patients = $query->fetchAll();

//Code pour page suivante
$isLastPage = FALSE;
if (count($patients) <= $maxpatients) {
    $isLastPage = TRUE;
} else {
    array_pop($patients);
}



// Bloc traitement d'affichage
// Vérification de la page (sorte d'erreur 404)
if (!count($patients)) {
    echo '<div><p>Aucun patient à cette adresse !</p></div>';
}

// Fonctions pour l'affichage des informations du patient :
//Fonction allergie(s)
function allergieOuPas($patient_allergie): string { 
    if (!$patient_allergie) {
        return '/';
    }
    return $patient_allergie;
}

// Affichage de la liste des patients
foreach ($patients as $one_patient) {
    echo '<a href="one_patient.php?id="' . $one_patient['id'] . '"><div class="info_patients">';
    echo '<h3>' . $one_patient['prenom']. ' ' . $one_patient['nom'] . '</h3>';
    echo '<p>Numéro de sécurité sociale : ' . $one_patient['secu'] . '</p>';
    echo '<p>Allergie(s) : ' . allergieOuPas($one_patient['allergie']) . '</p>';
    echo '<p>Prothèse : En attente</p>';
    echo '</div></a><div class="gestion_patients">';
    echo '<a href="one_patient.php?id="' . $one_patient['id'] . '"><div class="zone_clic"><button>Détails</button></div></a>';
    echo '<a href="update_patient.php?id='. $one_patient['id'] . '"><div class="zone_clic"><button>Modifier</button></div></a>';
    echo '<input type="submit" name="action" id="action" value="Supprimer">';
    echo '</div>';
}

echo '<div class="fleches clearfix">';
if ($page > 1) {
    echo '<a href="index.php?page=' . ($page - 1) . '" class="precedent" >Page précédente</a>';
}

if (!$isLastPage) {
    echo '<a href="index.php?page=' . ($page + 1) . '" class="suivant" >Page suivante</a>';
}

require 'footer.php';

