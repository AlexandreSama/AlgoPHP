<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 10</h1>

    <p> A partir d’un montant à payer et d’une somme versée pour régler un achat, écrire l’algorithme qui affiche à un utilisateur un rendu de monnaie en nombre de billets de 10 € et 5 €, de pièces de 2 € et 1€.</p>

    <h2>Résultat</h2>

    <?php

        // * On récupère la somme a payer, la somme que l'on donne
        // * Pour payer, et on initialise les variables contenant 
        // * les billets et les pièces
        $E = 152;
        $M = 200;
        $Reste = $M - $E;

        echo "Montant à payer : $E <br>";
        echo "Montant versé : $M <br>";
        echo "Reste a payé :" . $Reste . "<br>";
        echo "*************************************************** <br>";
        echo "Rendu de monnaie : <br>";

        // !A vérifier
        $Nb10E = intdiv($Reste, 10);
        $Reste = $Reste - $Nb10E * 10;
        $Nb5E = intdiv($Reste, 5);
        $Reste = $Reste - $Nb5E * 5;
        $Nb2E = intdiv($Reste, 2);
        $Reste = $Reste - $Nb2E * 2;

        echo " $Nb10E Billets de 10€ -";
        echo " $Nb5E Billets de 5€ -";
        echo " $Nb2E Pièces de 2€ -";
        echo " $Reste Pièces de 1€";
    ?>
    
</body>
</html>