<?php

$serveur = "localhost";
$dbname = "annuairenws";
$login = "rachid";
$password = "rachidroot";

try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
    echo "Connexion établie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
