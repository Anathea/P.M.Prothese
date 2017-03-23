<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

