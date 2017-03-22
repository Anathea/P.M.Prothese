<?php

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

require_once "connect.php";
$sql = "UPDATE 
`patients` 
SET 
  `nom`=:nom,
  `prenom`=:prenom,
  `secu`=:secu,
  `allergie`=:allergie,
  `type`=:type,
  `caracteristique`=:caracteristique,
  `detachable`=:detachable,
  `longueur`=:longueur,
  `largeur`=:largeur
WHERE 
id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => intval($cardId),
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

