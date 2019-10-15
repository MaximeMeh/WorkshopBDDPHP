<?php

$bdd = new PDO('mysql:host=mariadb;dbname=application;charset=utf8', 'jdoe', 'secret');

$pseudo = $_POST['pseudo'];
$motDePasse = $_POST['motDePasse'];

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("SELECT pseudo FROM utilisateurs WHERE pseudo=:pseudo AND motDePasse=:motdepasse");
$requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$requete->bindValue(':motdepasse', $motDePasse, PDO::PARAM_STR);
$requete->execute();

if ($requete->fetch() == true){
    // TODO : si l'utilisateur n'existe pas le créer avec une requête INSERT INTO
    $requete2 = $bdd->prepare("INSERT INTO utilisateurs (pseudo, motDePasse) VALUES (:pseudo, :motDePasse)");
    $requete2->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $requete2->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);
    $requete2->execute();
    echo 'Connexion réussie';
    }
        else{
            echo "fail";
        }
    
    $requete->closeCursor();

?>
