<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX - Les bases</title>


</head>

<body>
    <h1>Mon site</h1>
    <button>Phrase generator</button>
    <script>

    
        // On instancie le moteur AJAX
        var xhr = new XMLHttpRequest();

        // On veut suivre l'évolution de la requête AJAX
        xhr.addEventListener('readystatechange',function () {
            if (4 === xhr.readyState) { // La requête est terminée
                if (200 === xhr.status) { // La réponse a un status code 200
                    // On récupère la réponse HTTP
                    console.log(xhr.response);
                    document.getElementsByTagName('h1')[0].innerHTML = xhr.response;
                }
            }
        });

        // On prépare une requête HTTP
        xhr.open('GET', './worker.php');

        // On exécute la requête HTTP
        xhr.send();

        document.getElementsByTagName('button')[0].addEventListener("click", function(){

            document.getElementsByTagName('h1')[0].innerHTML = xhr.response;
        // On prépare une requête HTTP
        xhr.open('GET', './worker.php');

        // On exécute la requête HTTP
        xhr.send();
        });
        
        
        /**
        *   Exercice
        *   1. Ecouter l'évenement au clic sur le bouton
        *   2. A chaque clic, on execute une nouvelle requête AJAX sur le serveur
        *   pour récupérer une nouvelle phrase et modifier
         */
    </script>
</body>

</html>