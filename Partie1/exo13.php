<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 13</h1>

    <p> Calculer la moyenne générale d'un élève dont les notes sont renseignées dans un tableau (pas de coefficient). Elle devra être affichée avec 2 décimales.</p>

    <h2>Résultat</h2>

    <?php
        $notes = [10, 12, 8, 19, 3, 16, 11, 13, 9];
        echo "Les notes obtenues par l'élève sont : ";
        foreach ($notes as $value) {
            echo $value . " ";
        }
        echo "<br>";
        $moyenne = array_sum($notes); / count($notes);
        echo "Sa moyenne est donc de : " . round($moyenne,2)
    ?>
    
</body>
</html>