<?php
include_once "./includes/_header.php";
require_once "./utils/pdo.php";

$requeteAffichage = "SELECT * FROM nouveaux_eleves";
$query = $pdo->prepare($requeteAffichage);
$query->execute();
$nouveauxEleves = $query->fetchAll();
?>

<h1>Annuaire NWS</h1>

<?php foreach ($nouveauxEleves as $nouveauxEleve) { ?>
    <p><?= $nouveauxEleve['id']; ?></p>
    <p><?= $nouveauxEleve['nom']; ?></p>
    <p><?= $nouveauxEleve['prenom']; ?></p>
    <p><?= $nouveauxEleve['age']; ?></p>
    <p><?= $nouveauxEleve['diplome']; ?></p>
    <p><?= $nouveauxEleve['specialite']; ?></p>
    <p><?= $nouveauxEleve['email']; ?></p>
    <p><?= $nouveauxEleve['telephone']; ?></p>
    <a href="/annuaire-php/modifEleve.php?id=<?= $nouveauxEleve['id']; ?>">Éditer</a>

<?php } ?>


<?php
include_once "./includes/_footer.php";
