<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 8</h1>

    <p> Ecrire un algorithme qui renvoie la table de multiplication d’un nombre passé en paramètre sous la forme:</p>

    <h2>Résultat</h2>

    <?php
        $nb = 8;
        $i = 1;
        $ii = 1;
        echo "Affichage (pour la table de " . $nb . ") : <br>";
        // for ($i = 1; $i <= 10; $i++) {
        //     echo $nb . " X " . $i . " = " . $nb * $i . ' <br>';
        // }
        while ($ii <= 10) {
            echo $nb . " X " . $ii . " = " . $nb * $ii . ' <br>';
            $ii = $ii + 1;
        }
    ?>
    
</body>
</html>