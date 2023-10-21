<?php
include_once "./includes/_header.php";
require_once "./utils/pdo.php";
require_once "./utils/functions.php";

$trieEleve = "ORDER BY id DESC";
$filtreRechercheEleve = "";

trie($trieEleve);

filtre($filtreRechercheEleve);

recherche($filtreRechercheEleve);

$requeteAffichage = "SELECT * FROM nouveaux_eleves " . $filtreRechercheEleve . " " . $trieEleve;
$query = $pdo->prepare($requeteAffichage);
$query->execute();
$nouveauxEleves = $query->fetchAll();
?>

<h1>Liste des élèves</h1>

<form method="GET" action="">
    <input type="text" name="search" placeholder="Rechercher...">
    <input type="submit" value="Rechercher">
</form>

<span style="display:block;">Trier</span>
<a href="?sort=alphac">Nom A - Z</a>
<a href="?sort=alphad">Nom Z - A</a>
<a href="?sort=idd">Dernier élève ajouté</a>
<a href="?sort=idc">Premier élève ajouté</a>
<a href="?sort=agec">Âge croissant</a>
<a href="?sort=aged">Âge décroissant</a>

<span style="display:block;">Filtrer</span>
<a href="?filter=commdigitale">Communication digitale</a>
<a href="?filter=commgraph">Communication graphique</a>
<a href="?filter=dev">Développement web</a>
<a href="?filter=market">Marketing digitale</a>
<a href="?filter=jsp">Je ne sais pas encore</a>

<?php
echo "<p>" . count($nouveauxEleves) . " élève(s) trouvé(s)</p>";

?>

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
