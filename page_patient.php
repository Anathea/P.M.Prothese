<?php

require 'connect.php';
require 'header.php';

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
} else {
    header('Location: index.php');
}

//Bloc récupération de données 
$query = $db->prepare('SELECT id, nom, prenom, secu, allergie, type, caracteristique, detachable, longueur, largeur
        FROM patients
        WHERE id = :id');
$query->execute();
$patients = $query->fetchAll();

$one_patient = $patients[0];
    echo '<div class="info_patients"><h3>' . $one_patient['prenom']. ' ' . $one_patient['nom'] . '</h3>';
    echo '<p>Numéro de sécurité sociale : ' . $one_patient['secu'] . '</p>';
    echo '<p>Allergie(s) : ' . allergieOuPas($one_patient['allergie']) . '</p>';
    echo '<p>Type : ' . $one_patient['type'] . '</p>';
    echo '<p>Caractéristique : ' . caracteristiques($one_patient['caracteristique']) . '</p>';
    echo '<p>Détachable : ' . detach($one_patient['detachable']) . '</p>';
    echo '<p>Taille : ' . $one_patient['longueur'] . ' x ' . $one_patient['largeur'] . '</p>';
    echo '</div>';


require 'footer.php';