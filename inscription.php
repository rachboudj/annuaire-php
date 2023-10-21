<?php
include_once "./includes/_header.php";
require_once "./utils/pdo.php";
require_once "./utils/functions.php";

$errors = array();

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
    $errors = validationTexte($errors, $diplome, 'diplome', 3, 150);
    $errors = validationTexte($errors, $email, 'email', 3, 150);
    $errors = validationTexte($errors, $telephone, 'telephone', 10, 15);

    if (count($errors) === 0) {
        requeteAjout($pdo, $nom, $prenom, $age, $diplome, $specialite, $email, $telephone);
        header('Location: /annuaire-php/listeEleve.php?');
    }
}

?>

<h1>Inscription</h1>


<div class="containerForm">
    <form method="POST">

        <div class="containerInput">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php
                                                    if (isset($_POST['nom'])) {
                                                        echo $_POST['nom'];
                                                    } ?>">
            <span class="error"><?php if (!empty($errors['nom'])) {
                                    echo $errors['nom'];
                                } ?></span>
        </div>

        <div class="containerInput">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?php
                                                    if (isset($_POST['prenom'])) {
                                                        echo $_POST['prenom'];
                                                    } ?>">
            <span class="error"><?php if (!empty($errors['prenom'])) {
                                    echo $errors['prenom'];
                                } ?></span>
        </div>

        <div class="containerInput">
            <label for="age">Âge</label>
            <input type="text" name="age" value="<?php
                                                    if (isset($_POST['age'])) {
                                                        echo $_POST['age'];
                                                    } ?>">
        </div>

        <div class="containerInput">
            <label for="diplome">Diplôme</label>
            <input type="text" name="diplome" value="<?php
                                                        if (isset($_POST['diplome'])) {
                                                            echo $_POST['diplome'];
                                                        } ?>">
            <span class="error"><?php if (!empty($errors['diplome'])) {
                                    echo $errors['diplome'];
                                } ?></span>
        </div>

        <div class="containerInput">
            <label for="specialite">Spécialité envisagé</label>
            <select name="specialite">
                <option value="">Choisir la spécialité</option>
                <option value="Communication digitale">Communication digitale</option>
                <option value="Communication graphique">Communication graphique</option>
                <option value="Développement web">Développement web</option>
                <option value="Marekting digitale">Marketing digitale</option>
                <option value="Je ne sais pas encore">Je ne sais pas encore</option>
            </select>
        </div>

        <div class="containerInput">
            <label for="email">E-mail</label>
            <input type="text" name="email" value="<?php
                                                    if (isset($_POST['email'])) {
                                                        echo $_POST['email'];
                                                    } ?>">
            <span class="error"><?php if (!empty($errors['email'])) {
                                    echo $errors['email'];
                                } ?></span>
        </div>

        <div class="containerInput">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" value="<?php
                                                        if (isset($_POST['telephone'])) {
                                                            echo $_POST['telephone'];
                                                        } ?>">
            <span class="error"><?php if (!empty($errors['telephone'])) {
                                    echo $errors['telephone'];
                                } ?></span>
        </div>

        <input class="btn" type="submit" value="Ajouter un nouvel élève" name="submited">


    </form>
    <?php
    include_once "./includes/_footer.php";
