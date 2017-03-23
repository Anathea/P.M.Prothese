<?php
// DONNÉES
//Connexion à la base de donnée + outils utiles
require 'requetes.php';
require 'tools.php';

//Bloc récupération de données (fait en objet ! :D )
$db = new DB();
$patients = $db->get_patients();



// AFFICHAGE
require 'header.php';

//Affichage de tous les patients
foreach ($patients as $one_patient) {
    echo '<a href="update_patient.php?id='. $one_patient['id'] . '"><div class="info_patients"><h3>' . $one_patient['prenom']. ' ' . $one_patient['nom'] . '</h3>';
    echo '<p>Numéro de sécurité sociale : ' . $one_patient['secu'] . '</p>';
    echo '<p>Allergie(s) : ' . allergieOuPas($one_patient['allergie']) . '</p>';
    echo '<p>Type : ' . $one_patient['type'] . '</p>';
    echo '<p>Caractéristique de la prothèse : ' . caracteristiques($one_patient['caracteristique']) . '</p>';
    echo '<p>Détachable : ' . detach($one_patient['detachable']) . '</p>';
    echo '<p>Taille : ' . $one_patient['longueur'] . ' x ' . $one_patient['largeur'] . '</p>';
    echo '</div></a><div class="gestion_patients">';
    echo '<a href="page_patient.php?id=' . $one_patient['id'] . '"><div class="zone_clic"><button>Détails</button></div></a>';
    echo '<a href="update_patient.php?id='. $one_patient['id'] . '"><div class="zone_clic"><button>Modifier</button></div></a>';
    echo '<a href="delete.php?id='. $one_patient['id'] . '"><div class="zone_clic"><button>Supprimer</button></div></a>';
    echo '</div>';
}

require 'footer.php';

