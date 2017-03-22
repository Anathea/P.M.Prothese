<?php
//Connexion à la base de donnée + récupération du header
$db = require 'connect.php';
require 'header.php';


//Bloc récupération de données 
$query = $db->prepare('SELECT id, nom, prenom, secu, allergie, type, caracteristique, detachable, longueur, largeur
        FROM patients');
$query->execute();
$patients = $query->fetchAll();

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

//Affichage de tous les patients
foreach ($patients as $one_patient) {
    echo '<a href="one_patient.php"><div class="info_patients"><h3>' . $one_patient['prenom']. ' ' . $one_patient['nom'] . '</h3>';
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
}

require 'footer.php';

