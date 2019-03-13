<?php

sleep(1);
// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=test_thomas;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // On récupère les données en associatifs par défaut
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

header('Content-Type: application/json');
// Si on a un paramètre id dans l'URL cars.php?id=1
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $car = $db->query('SELECT * FROM cars WHERE id = '.$id)->fetch();
    echo json_encode($car);
} else {
    // Récupérer toutes les voitures en JSON
    $cars = $db->query('SELECT * FROM cars')->fetchAll();
    // Transformer le tableau en JSON (json_encode)
    echo json_encode($cars);
}
