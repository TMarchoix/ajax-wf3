<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <!--
        Formulaire:
        1. Ajouter Bootstrap sur la page.
        2. Ajouter un formulaire en POST avec deux champs (Nom et message).
        3. Le formulaire sera traité sur le fichier worker.php (action).
        4. On va vérifier que le nom et le message fasse au moins 2 caractères.
        5. Si le formulaire est valide, on affiche "Succès".
        6. S'il y a des erreurs, on les affiche.
        7. AJAX en BONUS
    -->

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="./worker.php" method="post">
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message :</label>
                        <input type="text" name="message" id="message" class="form-control">
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

    <script>
    
        var form = $('form');
        form.on('submit', function (event) {
            // On n'exécute pas la requête POST directement
            event.preventDefault();
            var formData = form.serialize(); // On récupère les données du formulaire
            // On exécute la requête POST via AJAX
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                // On peut forcer le contenu en JSON si le serveur
                // ne renvoie pas la bonne en-tête
                // dataType: 'json'
                beforeSend: function () {
                    $('h1').html('Chargement en cours...');
                },
                complete: function () {
                    $('h1').html('');
                }
            }).done(function (response) {
                if (response.success) {
                    var message = response.success;
                    $('#success').append($('<li>'+message.name+' : '+message.message+'</li>'));
                }
                
                if (response.errors) {
                    console.log(response.errors);
                }
            });
        });
    
    </script>
  </body>
</html>