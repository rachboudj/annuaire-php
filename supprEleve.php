<?php

require_once "./utils/pdo.php";
require_once "./utils/functions.php";


$id = $_GET['id'];
requeteSuppr($id, $pdo);