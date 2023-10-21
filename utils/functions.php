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
}

function requeteAjout($pdo, $nom, $prenom, $age, $diplome, $specialite, $email, $telephone) {
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

function trie(&$trieEleve) {
    if (isset($_GET['sort'])) {
        if ($_GET['sort'] === 'alphad') {
            $trieEleve = "ORDER BY nom DESC";
        } elseif($_GET['sort'] === 'alphac') {
            $trieEleve = "ORDER BY nom ASC";
        } elseif($_GET['sort'] === 'idd') {
            $trieEleve = "ORDER BY id DESC";
        } elseif($_GET['sort'] === 'idc') {
            $trieEleve = "ORDER BY id ASC";
        } elseif($_GET['sort'] === 'agec') {
            $trieEleve = "ORDER BY age ASC";
        } elseif($_GET['sort'] === 'aged') {
            $trieEleve = "ORDER BY age DESC";
        }
    }
}

function filtre(&$typeFiltre) {
    if(isset($_GET['filter'])) {
        if ($_GET['filter'] === 'commdigitale') {
            $typeFiltre = "WHERE specialite = 'Communication digitale'";
        } elseif($_GET['filter'] === 'commgraph') {
            $typeFiltre = "WHERE specialite = 'Communication graphique'";
        } elseif($_GET['filter'] === 'dev') {
            $typeFiltre = "WHERE specialite = 'Développement web'";
        } elseif($_GET['filter'] === 'market') {
            $typeFiltre = "WHERE specialite = 'Marketing digitale'";
        } elseif($_GET['filter'] === 'jsp') {
            $typeFiltre = "WHERE specialite = 'Je ne sais pas encore'";
        }
    }
}

function recherche(&$typeFiltre) {
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $termeRecherche = '%' . $_GET['search'] . '%';
        if($typeFiltre) {
            $typeFiltre = " WHERE nom LIKE '$termeRecherche' OR prenom LIKE '$termeRecherche'";
        
        } else {
            $typeFiltre = " WHERE nom LIKE '$termeRecherche' OR prenom LIKE '$termeRecherche'";
        }
        }
}