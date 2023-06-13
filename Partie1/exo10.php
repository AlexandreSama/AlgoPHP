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

        //Voir division Entière

        /* On récupère la somme a payer, la somme que l'on donne
        * Pour payer, et on initialise les variables contenant 
        * les billetsEt les pièces
        */
        $E = [572];
        $somdue = 0;
        $M = 800;
        $Reste = '';
        $Nb10E = 0;
        $Nb5E = 0;
        $Nb2E = 0;

        //Pour chaque valeur inscrite dans le tableau a payer, 
        //on insère La valeur dans la variable somdue
        foreach ($E as $key => $value) {
            if($value != 0){
                $somdue = $somdue + $value;
            }
        }

        //On retire ce que l'on doit par ce que l'on donne
        //Pour obtenir le reste
        $Reste = $M - $somdue;

        //Tant que Reste est supérieur ou égal a 10 pour les
        //Billets de 10
        while ($Reste >= 10) {
            $Nb10E = $Nb10E + 1;
            $Reste = $Reste - 10;
        }

        //Tant que Reste est supérieur ou égal a 5 pour les
        //Billets de 5
        while($Reste >= 5){
            $Nb5E = $Nb5E + 1;
            $Reste = $Reste - 5;
        }

        //Tant que Reste est supérieur ou égal a 2 pour les
        //pièces de 2
        if($Reste >= 2){
            $Nb2E = $Nb2E + 1;
            $Reste = $Reste - 2;
        }

        //Et le Reste est égal aux pièces de 1
        echo 'Billet de 10 E : ' . $Nb10E . ' <br>';
        echo 'Billet de 5 E : ' . $Nb5E . ' <br>';
        echo 'Pièces de 2 E : ' . $Nb2E . ' <br>';
        echo 'Pièces de 1 E : ' . $Reste . ' <br>';
    ?>
    
</body>
</html>