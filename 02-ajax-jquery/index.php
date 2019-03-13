<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function(){
            //Exécuter une requête ajax avec jquery
            $.get('./worker.php').done(function (response){
                alert (response);
            }).fail(function(xhr){
                alert('La requête a échoué avec un status : '+xhr.status);
            })
            
            // Exécuter une requête AJAX (en POST)
            // worker.php?sentence=Salut les gens
            $.ajax({
                type: 'POST',
                data: {sentence : 'Salut les gens'},
                url: "./worker.php"
            }).done(function (response){
                console.log(response);
            });
        });
            </script>
</body>
</html>