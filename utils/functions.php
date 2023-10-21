<?php

function validationTexte($er, $data, $key, $min, $max)
{
    if(!empty($data)) {
        if(mb_strlen($data) < $min) {
            $er[$key] = 'Il faut minimum '.$min.' caractères.';
        } elseif(mb_strlen($data) >= $max) {
            $er[$key] = 'Il faut maximum '.$max.' caractères.';
        }
    } else{
        $er[$key] = 'Veuillez renseigner ce champ.';
    }
    return $er;
}

function requeteSuppr($id, $pdo) {
    if (!empty($_GET['id']) && ctype_digit($_GET['id'])) 
    {
    $requeteSuppr = "DELETE FROM nouveaux_eleves WHERE id = :id";
    
    $query = $pdo->prepare($requeteSuppr);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    header('Location: /annuaire-php/index.php?');
    }
}