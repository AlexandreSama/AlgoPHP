<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 5</h1>

    <p> Ecrire un algorithme qui déclare une valeur en francs et qui la convertit en euros. Attention, la valeur générée devra être arrondie à 2 décimales</p>

    <h2>Résultat</h2>

    <?php
        $montantFrancs = 10000000000;
        $temp = $montantFrancs;
        $eurosBase = 6.55957;
        $montantConvertis = 0;

        $montantConvertis = $montantFrancs / $eurosBase;

        echo "Montant en francs : " . $montantFrancs . " <br>";
        echo $montantFrancs . " francs = " . round($montantConvertis, 2) . " €";
        echo $montantFrancs . " francs = " . number_format($montantConvertis, 2, ",", " ") . " €";
    ?>
    
</body>
</html>