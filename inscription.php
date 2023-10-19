<?php
include_once "./includes/_header.php";
require_once "./utils/pdo.php";

if (!empty($_POST['submited'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $diplome = $_POST['diplome'];
    $specialite = $_POST['specialite'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $requeteNouvelEleve = "INSERT INTO nouveaux_eleves(nom, prenom, age, diplome, specialite, email, telephone) VALUES (:nom, :prenom, :age, :diplome, :specialite, :email, :telephone)";
    $query = $pdo->prepare($requeteNouvelEleve);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue(':age', $age, PDO::PARAM_STR);
    $query->bindValue(':diplome', $diplome, PDO::PARAM_STR);
    $query->bindValue(':specialite', $specialite, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
    $query->execute();
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
        </div>

        <div class="containerInput">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?php
                                                    if (isset($_POST['prenom'])) {
                                                        echo $_POST['prenom'];
                                                    } ?>">
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
        </div>

        <div class="containerInput">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" value="<?php
                                                        if (isset($_POST['telephone'])) {
                                                            echo $_POST['telephone'];
                                                        } ?>">
        </div>

        <input class="btn" type="submit" value="Ajouter un nouvel élève" name="submited">


    </form>
    <?php
    include_once "./includes/_footer.php";
