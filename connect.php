<?php
// connect.php sert à lier le site avec la base de données.
$db = 'user_p.m.prothese';
$host = 'localhost';

// Éventuellement à modifier en 'root' et 'root'
$username = 'admin';
$password = 'admin';

try{
    return new PDO("mysql:dbname=$db;host=$host", $username, $password, [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);
} catch(PDOException $exception) {
    die($exception->getMessage());
}
$pdo->exec("SET NAMES UTF8");



