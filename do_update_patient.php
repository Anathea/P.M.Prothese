<?php

require_once "requetes.php";

$id = $_GET['id'] ?? NULL;
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$secu = $_POST['secu'] ?? '';
$allergie = $_POST['allergie'] ?? '';
$type = $_POST['type'] ?? '';
$caracteristique = $_POST['caracteristique'] ?? '';
$detachable = $_POST['detachable'] ?? '0';
$longueur = $_POST['longueur'] ?? '';
$largeur = $_POST['largeur'] ?? '';

if($id === NULL){
    header('Location: index.php');
}
if ($nom === '' || $prenom === '' || $secu === '') {
    header('Location: update_patient.php?id=' . $id);
}

$id = intval($id);
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
$db->update_one_patient($id, $nom, $prenom, $secu, $allergie, $type, $caracteristique, $detachable, $longueur, $largeur);

header('Location: index.php');
