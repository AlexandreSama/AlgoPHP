<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 6</h1>

    <p> Ecrire un algorithme permettant de calculer un montant de facture à régler à partir de la quantité d’articles, son prix hors taxe et un taux de TVA (exprimé en décimal. Ex: 20 % -> 0.2)</p>

    <h2>Résultat</h2>

    <?php
        // * Prix HT de l'article
        $articlePrice = 9.99;
        // *Quantité de l'article
        $quantity = 5;
        // *Taux de la TVA
        $tva = 0.2;
        // *Prix Total TTC
        $fullPrice = 0;
       
        $fullPrice = $articlePrice * $quantity * (1 + $tva);
        

        echo "Prix unitaire de l’article: $articlePrice €<br>";
        echo "Quantité d'articles : $quantity <br>";
        echo "Taux de TVA : $tva <br>";
        echo "Le montant de la facture a régler est de : $fullPrice €";
    ?>
    
</body>
</html>