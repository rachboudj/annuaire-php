<?php

require_once "./utils/pdo.php";
require_once "./utils/functions.php";


if (!empty($_GET['id']) && ctype_digit($_GET['id'])) 
{
$id = $_GET['id'];
$requeteSuppr = "DELETE FROM nouveaux_eleves WHERE id = :id";

$query = $pdo->prepare($requeteSuppr);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
header('Location: /annuaire-php/index.php?');
}