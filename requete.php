<?php
$bdd = new PDO('mysql:host=mariadb;dbname=application;charset=utf8','jdoe', 'secret');

$sql = 'SELECT * FROM `produits`';
$sql = 'SELECT * FROM `produits` WHERE solde=1';

foreach($bdd->query($sql) as $produits) {
    echo "<p>Produit ".$produits['id']."</p>";
    echo "<ul>";
    echo "<li>".$produits['nom']."</li>";
    echo "<li>".$produits['prix']."</li>";
    echo "<li>".$produits['description']."</li>";
    echo "</ul>";
}


$bdd->query("DELETE FROM produits WHERE nom='newShoes'");

echo "Done";

?>