<?php
include_once "./includes/_header.php";
require_once "./utils/pdo.php";

$trieFiltreEleve = "ORDER BY id DESC";

if (isset($_GET['sort'])) {
    if ($_GET['sort'] === 'alphad') {
        $trieFiltreEleve = "ORDER BY nom DESC";
    } elseif($_GET['sort'] === 'alphac') {
        $trieFiltreEleve = "ORDER BY nom ASC";
    } elseif($_GET['sort'] === 'idd') {
        $trieFiltreEleve = "ORDER BY id DESC";
    } elseif($_GET['sort'] === 'idc') {
        $trieFiltreEleve = "ORDER BY id ASC";
    } elseif($_GET['sort'] === 'agec') {
        $trieFiltreEleve = "ORDER BY age ASC";
    } elseif($_GET['sort'] === 'aged') {
        $trieFiltreEleve = "ORDER BY age DESC";
    }
}


if(isset($_GET['filter'])) {
    if ($_GET['filter'] === 'jsp') {
        $trieFiltreEleve = "WHERE specialite = 'Je ne sais pas encore'";
    }
}

$requeteAffichage = "SELECT * FROM nouveaux_eleves " . $trieFiltreEleve;
$query = $pdo->prepare($requeteAffichage);
$query->execute();
$nouveauxEleves = $query->fetchAll();
?>

<h1>Annuaire NWS</h1>

<a href="?sort=alphac">Nom A - Z</a>
<a href="?sort=alphad">Nom Z - A</a>
<a href="?sort=idd">Dernier élève ajouté</a>
<a href="?sort=idc">Premier élève ajouté</a>
<a href="?sort=agec">Âge croissant</a>
<a href="?sort=aged">Âge décroissant</a>
<a href="?filter=jsp">Je ne sais pas encore</a>

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
    <a href="/annuaire-php/supprEleve.php?id=<?= $nouveauxEleve['id']; ?>">Supprimer</a>

<?php } ?>


<?php
include_once "./includes/_footer.php";
