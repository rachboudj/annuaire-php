<?php

include_once "./includes/_header.php";
require_once "./utils/pdo.php";

$id = $_GET['id'];

$requeteAffichage = "SELECT * FROM nouveaux_eleves WHERE id = :id";
$query = $pdo->prepare($requeteAffichage);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$eleve = $query->fetch(PDO::FETCH_ASSOC);

if (!empty($_POST['submited'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $diplome = $_POST['diplome'];
    $specialite = $_POST['specialite'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $sql = "UPDATE nouveaux_eleves SET nom= :nom, prenom= :prenom, age= :age, diplome= :diplome, specialite= :specialite, email= :email, telephone= :telephone WHERE id= :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue(':age', $age, PDO::PARAM_STR);
    $query->bindValue(':diplome', $diplome, PDO::PARAM_STR);
    $query->bindValue(':specialite', $specialite, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
}

?>

<div class="containerForm">
    <form method="POST">

        <div class="containerInput">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php
                                                    if (isset($eleve['nom'])) {
                                                        echo $eleve['nom'];
                                                    } ?>">
        </div>

        <div class="containerInput">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?php
                                                    if (isset($eleve['prenom'])) {
                                                        echo $eleve['prenom'];
                                                    } ?>">
        </div>

        <div class="containerInput">
            <label for="age">Âge</label>
            <input type="text" name="age" value="<?php
                                                    if (isset($eleve['age'])) {
                                                        echo $eleve['age'];
                                                    } ?>">
        </div>

        <div class="containerInput">
            <label for="diplome">Diplôme</label>
            <input type="text" name="diplome" value="<?php
                                                        if (isset($eleve['diplome'])) {
                                                            echo $eleve['diplome'];
                                                        } ?>">
        </div>

        <div class="containerInput">
            <label for="specialite">Spécialité envisagé</label>
            <select name="specialite">
                <option value="">Choisir la spécialité</option>
                <option value="Communication digitale" <?php if ($eleve['specialite'] == "Communication digitale") echo "selected"; ?>>Communication digitale</option>
                <option value="Communication graphique" <?php if ($eleve['specialite'] == "Communication graphique") echo "selected"; ?>>Communication graphique</option>
                <option value="Développement web" <?php if ($eleve['specialite'] == "Développement web") echo "selected"; ?>>Développement web</option>
                <option value="Marketing digitale" <?php if ($eleve['specialite'] == "Marketing digitale") echo "selected"; ?>>Marketing digitale</option>
                <option value="Je ne sais pas encore" <?php if ($eleve['specialite'] == "Je ne sais pas encore") echo "selected"; ?>>Je ne sais pas encore</option>
            </select>
        </div>

        <div class="containerInput">
            <label for="email">E-mail</label>
            <input type="text" name="email" value="<?php
                                                    if (isset($eleve['email'])) {
                                                        echo $eleve['email'];
                                                    } ?>">
        </div>

        <div class="containerInput">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" value="<?php
                                                        if (isset($eleve['telephone'])) {
                                                            echo $eleve['telephone'];
                                                        } ?>">
        </div>

        <input class="btn" type="submit" value="Modifier l'utilisateur" name="submited">