<?php
sleep(1);
header('Content-Type: application/json');
// On vérifie que le formulaire a été soumis
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    // On récupère les champs du formulaire
    $name = $_POST['name'];
    $message = $_POST['message'];
    // On prépare le tableau avec les erreurs
    $errors = [];
    // On vérifie le champ name
    if (strlen($name) < 2) {
        $errors['name'] = 'Erreur name';
        // echo 'Erreur name';
    }
    // On vérifie le champ message
    if (strlen($message) < 2) {
        $errors['message'] = 'Erreur message';
        // echo 'Erreur message';
    }
    // On vérifie si le formulaire contient des erreurs
    if (empty($errors)) {
        echo json_encode(['success' => [
            'name' => $name,
            'message' => $message
        ]]);
    } else {
        echo json_encode(['errors' => $errors]);
    }
}