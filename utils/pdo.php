<?php

$configContent = file_get_contents('./utils/config.json');
$globalConfigs = json_decode($configContent, true);

try {
    $connection = 'mysql:host=' . $globalConfigs["database"]['host'] . ';dbname=' . $globalConfigs['database']["db_name"];
    $pdo = new PDO($connection, $globalConfigs['database']['user'], $globalConfigs['database']['password'], array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
