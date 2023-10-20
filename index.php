<?php
include_once "./includes/_header.php";
require_once "./utils/pdo.php";

$trieEleve = "id DESC";

if (isset($_GET['sort'])) {
    if ($_GET['sort'] === 'alphad') {
        $trieEleve = "nom DESC";
    } elseif($_GET['sort'] === 'alphac') {
        $trieEleve = "nom ASC";
    } elseif($_GET['sort'] === 'idd') {
        $trieEleve = "id DESC";
    } elseif($_GET['sort'] === 'idc') {
        $trieEleve = "id ASC";
    } elseif($_GET['sort'] === 'agec') {
        $trieEleve = "age ASC";
    } elseif($_GET['sort'] === 'aged') {
        $trieEleve = "age DESC";
    }
}

$requeteAffichage = "SELECT * FROM nouveaux_eleves ORDER BY "  . $trieEleve;
$query = $pdo->prepare($requeteAffichage);
$query->execute();
$nouveauxEleves = $query->fetchAll();
?>

<h1>Annuaire NWS</h1>

<a href="?sort=alphac">Nom A - Z</a>
<a href="?sort=alphad">Nom Z - A</a>
<a href="?sort=idd">Dernier élève ajouté</a>
<a href="?sort=desc">Premier élève ajouté</a>
<a href="?sort=agec">Âge croissant</a>
<a href="?sort=aged">Âge décroissant</a>

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
