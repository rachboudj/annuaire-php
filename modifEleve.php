<?php

include_once "./includes/_header.php";
require_once "./utils/pdo.php";
require_once "./utils/functions.php";


$errors = array();
if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];

    $requeteAffichage = "SELECT * FROM nouveaux_eleves WHERE id = :id";
    $query = $pdo->prepare($requeteAffichage);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $eleve = $query->fetch(PDO::FETCH_ASSOC);

    if (!empty($_POST['submited'])) {
        $nom = trim(strip_tags($_POST['nom']));
        $prenom = trim(strip_tags($_POST['prenom']));
        $age = trim(strip_tags($_POST['age']));
        $diplome = trim(strip_tags($_POST['diplome']));
        $specialite = trim(strip_tags($_POST['specialite']));
        $email = trim(strip_tags($_POST['email']));
        $telephone = trim(strip_tags($_POST['telephone']));

        $errors = validationTexte($errors, $nom, 'nom', 3, 100);
        $errors = validationTexte($errors, $prenom, 'prenom', 3, 100);
        $errors = validationTexte($errors, $age, 'age', 2, 3);
        $errors = validationTexte($errors, $diplome, 'diplome', 3, 150);
        $errors = validationTexte($errors, $specialite, 'specialite', 3, 150);
        $errors = validationTexte($errors, $email, 'email', 3, 150);
        $errors = validationTexte($errors, $telephone, 'telephone', 9, 15);

        if (count($errors) === 0) {
            requeteModif($pdo, $nom, $prenom, $age, $diplome, $specialite, $email, $telephone, $id);
            header('Location: /annuaire-php/listeEleve.php?');
        }
    }
}

?>

<div class="container-form">
    <h1>Modifier <?php
                    if (isset($eleve['prenom'])) {
                        echo $eleve['prenom'];
                    } ?> <?php
                                                            if (isset($eleve['nom'])) {
                                                                echo $eleve['nom'];
                                                            } ?> </h1>
    <form class="form" method="POST">

        <div class="label-input">
            <label class="label" for="nom">Nom</label>
            <input class="input" type="text" name="nom" value="<?php
                                                    if (isset($eleve['nom'])) {
                                                        echo $eleve['nom'];
                                                    } ?>">
            <span class="error"><?php if (!empty($errors['nom'])) {
                                    echo $errors['nom'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="prenom">Prénom</label>
            <input class="input" type="text" name="prenom" value="<?php
                                                    if (isset($eleve['prenom'])) {
                                                        echo $eleve['prenom'];
                                                    } ?>">
            <span class="error"><?php if (!empty($errors['prenom'])) {
                                    echo $errors['prenom'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="age">Âge</label>
            <input class="input" type="text" name="age" value="<?php
                                                    if (isset($eleve['age'])) {
                                                        echo $eleve['age'];
                                                    } ?>">
            <span class="error"><?php if (!empty($errors['age'])) {
                                    echo $errors['age'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="diplome">Diplôme</label>
            <input class="input" type="text" name="diplome" value="<?php
                                                        if (isset($eleve['diplome'])) {
                                                            echo $eleve['diplome'];
                                                        } ?>">
            <span class="error"><?php if (!empty($errors['diplome'])) {
                                    echo $errors['diplome'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="specialite">Spécialité envisagé</label>
            <select name="specialite">
                <option value="">Choisir la spécialité</option>
                <option value="Communication digitale" <?php if ($eleve['specialite'] == "Communication digitale") echo "selected"; ?>>Communication digitale</option>
                <option value="Communication graphique" <?php if ($eleve['specialite'] == "Communication graphique") echo "selected"; ?>>Communication graphique</option>
                <option value="Développement web" <?php if ($eleve['specialite'] == "Développement web") echo "selected"; ?>>Développement web</option>
                <option value="Marketing digitale" <?php if ($eleve['specialite'] == "Marketing digitale") echo "selected"; ?>>Marketing digitale</option>
                <option value="Je ne sais pas encore" <?php if ($eleve['specialite'] == "Je ne sais pas encore") echo "selected"; ?>>Je ne sais pas encore</option>
            </select>
        </div>

        <div class="label-input">
            <label class="label" for="email">E-mail</label>
            <input class="input" type="text" name="email" value="<?php
                                                    if (isset($eleve['email'])) {
                                                        echo $eleve['email'];
                                                    } ?>">
            <span class="error"><?php if (!empty($errors['email'])) {
                                    echo $errors['email'];
                                } ?></span>
        </div>

        <div class="label-input">
            <label class="label" for="telephone">Téléphone</label>
            <input class="input" type="text" name="telephone" value="<?php
                                                        if (isset($eleve['telephone'])) {
                                                            echo $eleve['telephone'];
                                                        } ?>">
            <span class="error"><?php if (!empty($errors['telephone'])) {
                                    echo $errors['telephone'];
                                } ?></span>
        </div>

        <div class="buttons-input">

            <input class="btn-1" type="submit" value="Modifier l'utilisateur" name="submited">
        </div>