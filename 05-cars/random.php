<?php

// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=test_thomas;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$cars = [
    ['brand' => 'Renault', 'model' => 'Mégane', 'price' => 2000, 'image' => 'megane.jpg'],
    ['brand' => 'Alpha Roméo', 'model' => 'Giulia', 'price' => 30000, 'image' => 'giulia.jpg'],
    ['brand' => 'Porsche', 'model' => 'Cayenne', 'price' => 80000, 'image' => 'cayenne.jpg']
];
// On reset la table
$db->query('TRUNCATE TABLE cars');
// On prépare la requête
$query = $db->prepare('INSERT INTO `cars` (brand, model, price, image) VALUES (:brand, :model, :price, :image)');
// On exécute 3 requêtes
foreach ($cars as $car) {
    $query->bindValue(':brand', $car['brand']);
    $query->bindValue(':model', $car['model']);
    $query->bindValue(':price', $car['price']);
    $query->bindValue(':image', $car['image']);
    $query->execute();
}
