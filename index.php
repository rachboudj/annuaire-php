<?php
include_once "./includes/_header.php";
require_once "./utils/pdo.php";
?>

<div class="container">
    <div class="containerImg">
        <img src="./assets/img/abstrakt-design.png" alt="Image abstraite représentant une femme tapant sur un ordinateur et un personne en train de lever la main">
    </div>
    <div class="containerText">
        <h1>L'annuaire de la NWS</h1>
        <p>La liste de tous les potentiels futurs élèves de la Normandie Web School.</p>
        <button><a class="btn-1" href="/annuaire-php/listeEleve.php">Voir la liste des élèves</a></button>
    </div>
</div>

<?php

include_once "./includes/_footer.php";
