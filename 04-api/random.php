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

// Ajouter les téléphones suivants dans la base
//
// Apple iPhone XS
// Apple iPhone XR
// Apple iPhone X
// Apple iPhone 8
// Samsung Galaxy S10
// Samsung Galaxy S9

$smartphone = [
    [
        "brand"=> "Apple",
        "model"=>"iPhone XS",
        "price"=>899
    ],
    [
        "brand"=> "Apple",
        "model"=>"iPhone XR",
        "price"=>999
    ],
    [
        "brand"=>"Apple",
        "model"=>"iPhone X",
        "price"=>1199
    ],
    [
        "brand"=>"Apple",
        "model"=>"iPhone 8",
        "price"=>799
    ],
    [
        "brand"=>"Samsung",
        "model"=>"Galaxy S10",
        "price"=>999
    ],
    [
        "brand"=>"Samsung",
        "model"=>"Galaxy S9",
        "price"=>599
    ],
];

//Réinitialisation de la bdd pour éviter les doublons
$bdd->query('TRUNCATE TABLE `smartphone`');

$req = $bdd->prepare('INSERT INTO smartphone (brand, model, price) VALUES(?, ?, ?)');

foreach($smartphone as $smartphone){
    $req->execute(array($smartphone['brand'],$smartphone['model'],$smartphone['price']));
};