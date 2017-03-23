<?php

require 'requetes.php';
require 'tools.php';


$id = $_GET['id'] ?? NULL;

if($id === NULL){
    header('Location: index.php');
}

$db = new DB();
$one_patient = $db->get_one_patient($id);

require 'header.php';

    echo '<div class="info_patients"><h3>' . $one_patient['prenom']. ' ' . $one_patient['nom'] . '</h3>';
    echo '<p>Numéro de sécurité sociale : ' . $one_patient['secu'] . '</p>';
    echo '<p>Allergie(s) : ' . allergieOuPas($one_patient['allergie']) . '</p>';
    echo '<p>Type : ' . $one_patient['type'] . '</p>';
    echo '<p>Caractéristique : ' . caracteristiques($one_patient['caracteristique']) . '</p>';
    echo '<p>Détachable : ' . detach($one_patient['detachable']) . '</p>';
    echo '<p>Taille : ' . $one_patient['longueur'] . ' x ' . $one_patient['largeur'] . '</p>';
    echo '</div>';


require 'footer.php';