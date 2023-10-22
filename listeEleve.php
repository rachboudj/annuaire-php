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

<div class="containerTitreSearch">
    <h1>Liste des élèves</h1>

    <form method="GET">
        <input class="inputSearch" type="text" name="search" placeholder="Rechercher un élève...">
        <input class="btn-1" type="submit" value="Rechercher">
    </form>
</div>

<div class="containerFiltreTrie">
    <h2>Filtrer, trier en fonction de vos envies</h2>
    <span>Trier</span>
    <div class="containerTrie">
        <a class="btnFiltre" href="?sort=alphac">Nom A - Z</a>
        <a class="btnFiltre" href="?sort=alphad">Nom Z - A</a>
        <a class="btnFiltre" href="?sort=idc">Élève ajouté croissant</a>
        <a class="btnFiltre" href="?sort=idd">Élève ajouté décroissant</a>
        <a class="btnFiltre" href="?sort=agec">Âge croissant</a>
        <a class="btnFiltre" href="?sort=aged">Âge décroissant</a>
    </div>

    <span>Filtrer</span>
    <div class="containerFiltre">
        <a class="btnFiltre" href="?filter=commdigitale">Communication digitale</a>
        <a class="btnFiltre" href="?filter=commgraph">Communication graphique</a>
        <a class="btnFiltre" href="?filter=dev">Développement web</a>
        <a class="btnFiltre" href="?filter=market">Marketing digitale</a>
        <a class="btnFiltre" href="?filter=jsp">Je ne sais pas encore</a>
    </div>

    <?php
    echo "<p>" . count($nouveauxEleves) . " élève(s) trouvé(s)</p>";

    ?>
</div>

<div class="containerCard">

    <?php foreach ($nouveauxEleves as $nouveauxEleve) { ?>
        <div class="card">
            <h3><span class="underline"><?= $nouveauxEleve['prenom']; ?> <?= $nouveauxEleve['nom']; ?>,</span> <span class="age"><?= $nouveauxEleve['age']; ?> ans</span> </h3>
            <p>Dernier diplôme : <?= $nouveauxEleve['diplome']; ?> | Spécialité envisagé : <?= $nouveauxEleve['specialite']; ?></p>
            <div class="btnContact">
                    <p><img src="./assets/img/email.png" alt="Icône d'un enveloppe"> <?= $nouveauxEleve['email']; ?></p>
                    <p><img src="./assets/img/telephone.png" alt="Icône d'un téléphone"> <?= $nouveauxEleve['telephone']; ?></p>
            </div>
            <div class="btnOperation">
                <a class="btnEdit" href="/annuaire-php/modifEleve.php?id=<?= $nouveauxEleve['id']; ?>">Éditer</a>
                <a class="btnSuppr" href="/annuaire-php/supprEleve.php?id=<?= $nouveauxEleve['id']; ?>">Supprimer</a>
            </div>
        </div>
    <?php } ?>
</div>




<?php
include_once "./includes/_footer.php";
