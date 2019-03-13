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
        <div class="row" id="cars">
            Chargement en cours...
        </div>

        <div id="selected-car"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    
        $.get('./cars.php').done(function (cars) {
            $('#cars').html(''); // supprimer "Chargement en cours..."
            for (car of cars) {
                var div = $('<div class="col-md-4"></div>'); // On créé la div
                // Les backticks (alt gr 7) servent pour afficher un bloc html sur plusieurs lignes en JS
                div.html(`<div class="card">
                    <img class="card-img-top" src="./img/`+car.image+`" alt="`+car.brand+`">
                    <div class="card-body">
                        <h5 class="card-title">`+car.brand+` `+car.model+`</h5>
                        <a data-car="`+car.id+`" href="#" class="btn btn-primary">Voir la voiture</a>
                    </div>
                </div>`);
            
                $('#cars').append(div); // On ajoute la div dans la row
            }
        });
        // On écoute le clic sur un élément qui est chargé en AJAX
        $('body').on('click', '.card a', function (event) {
            event.preventDefault(); // Bloque la redirection du lien
            console.log('test');
            var id = $(this).attr('data-car'); // id de la voiture cliquée
            $.get('./cars.php?id='+id).done(function (car) {
                console.log(car);
                $('#selected-car').html(car.brand + ' ' + car.model + ' ' + car.price + '&euro;' + '<img width="500" src="./img/'+car.image+'">');
            });
        });
    </script>
  </body>
</html>