<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form method="post">
                    <div class="form-group">
                        <label for="brand">Marque :</label>
                        <input type="text" name="brand" id="brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="model">Modèle :</label>
                        <input type="text" name="model" id="model" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Image :</label>
                        <input type="text" name="image" id="image" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-block">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

    <h1></h1>
    <ul id="success"></ul>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    
  </body>
</html>

<?php

$db = new PDO('mysql:host=localhost;dbname=test_thomas;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // On récupère les données en associatifs par défaut
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

    if ('POST' === $_SERVER['REQUEST_METHOD']) {
        // On récupère les champs du formulaire
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        // On prépare le tableau avec les erreurs
        $errors = [];
        // On vérifie le champ name
        if (strlen($brand) < 2) {
            $errors['brand'] = 'Erreur brand';
            // echo 'Erreur name';
        }
        // On vérifie le champ model
        if (strlen($model) < 2) {
            $errors['model'] = 'Erreur model';
            // echo 'Erreur model';
        }
        // On vérifie le champ price
        if (strlen($price) < 0) {
            $errors['price'] = 'Erreur price';
            // echo 'Erreur price';
        }
        // On vérifie le champ image
        if (strlen($image) < 2) {
            $errors['image'] = 'Erreur image';
            // echo 'Erreur image';
        }
        // On vérifie si le formulaire contient des erreurs
        if (empty($errors)) {
            $query = $db->prepare('INSERT INTO `cars` (brand, model, price, image) VALUES (:brand, :model, :price, :image)');
            $query->bindValue(':brand', $brand);
            $query->bindValue(':model', $model);
            $query->bindValue(':price', $price);
            $query->bindValue(':image', $image);
            $query->execute();
            header('location: ./index.php');
        } else {
            echo json_encode(['errors' => $errors]);
        }
    }
?>