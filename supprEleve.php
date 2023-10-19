<?php

require_once "./utils/pdo.php";


$id = $_GET['id'];
$requeteSuppr = "DELETE FROM nouveaux_eleves WHERE id = :id";

$query = $pdo->prepare($requeteSuppr);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
