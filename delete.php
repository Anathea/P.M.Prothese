<?php

require_once "requetes.php";

$id = $_GET['id'] ?? NULL;

if($id === NULL){
    header('Location: index.php');
}

$id = (int) $id;

$db = new DB();
$db->del_one_patient($id);

header('Location: index.php');