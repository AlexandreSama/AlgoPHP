<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 11</h1>

    <p> Initialiser  un  tableau  de  x  marques  de  voitures.  Ecrire  un  algorithme permettant  de  parcourir  ce tableau et d’en afficher le contenu (une marque de voiture par ligne). Il est également demandé d’afficher le nombre de marques de voitures présentes dans le tableau.</p>

    <h2>Résultat</h2>

    <?php
        $marquesVoiture = ["Peugeot", "Renault", "BMW", "Mercedes"];
        echo "Affichage : <br>";
        echo "Il y a ". count($marquesVoiture) . " marques de voitures dans le tableau : <br>";
        echo "<ul><li> " . implode('</li><li>', $marquesVoiture) . "</li></ul>";
    ?>
    
</body>
</html>