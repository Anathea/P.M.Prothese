<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "requetes.php";

$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$secu = $_POST['secu'] ?? '';
$allergie = $_POST['allergie'] ?? '';
$type = $_POST['type'] ?? '';
$caracteristique = $_POST['caracteristique'] ?? '';
$detachable = $_POST['detachable'] ?? '0';
$longueur = $_POST['longueur'] ?? '';
$largeur = $_POST['largeur'] ?? '';

if ($nom === '' || $prenom === '' || $secu === '') {
    header('Location: new_patient.php');
}

$nom = htmlentities($nom);
$prenom = htmlentities($prenom);
$secu = intval($secu);
$allergie = htmlentities($allergie);
$type = htmlentities($type);
$caracteristique = intval($caracteristique);
$detachable = intval($detachable);
$longueur = intval($longueur);
$largeur = intval($largeur);

$db = new DB();
$db->add_one_patient($nom, $prenom, $secu, $allergie, $type, $caracteristique, $detachable, $longueur, $largeur);

header('Location: index.php');
