<?php

function validationTexte($er, $data, $key, $min, $max)
{
    if (!empty($data)) {
        if (mb_strlen($data) < $min) {
            $er[$key] = 'Il faut minimum ' . $min . ' caractères.';
        } elseif (mb_strlen($data) >= $max) {
            $er[$key] = 'Il faut maximum ' . $max . ' caractères.';
        }
    } else {
        $er[$key] = 'Veuillez renseigner ce champ.';
    }
    return $er;
}

function requeteSuppr($id, $pdo)
{
    if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
        $requeteSuppr = "DELETE FROM nouveaux_eleves WHERE id = :id";

        $query = $pdo->prepare($requeteSuppr);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        header('Location: /annuaire-php/listEleve.php?');
    }
}

function requeteModif($pdo, $nom, $prenom, $age, $diplome, $specialite, $email, $telephone, $id)
{
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
    header('Location: /annuaire-php/listEleve.php?');
}

