<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 11</h1>

    <p>Ecrire une fonction personnalisée qui affiche une date en français (en toutes lettres) à partir d’une chaîne de caractère représentant une date.</p>

    <h2>Résultat</h2>

    <?php
        $date = "2018-02-23";

        function formaterDateFR($date){
            return date_create($date)->format('l j F Y');
        }
        echo formaterDateFR($date);
    ?>
    
</body>
</html>