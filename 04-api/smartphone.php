<?php

// Connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=smartphone;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On récupère les smartphones

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT id, brand, model, price FROM smartphone ORDER BY price asc');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo "<p>" .  htmlspecialchars($donnees["id"])."<br>". htmlspecialchars($donnees["brand"])."<br>".htmlspecialchars($donnees["model"])."<br>".htmlspecialchars($donnees["price"])."<hr></p>";
}