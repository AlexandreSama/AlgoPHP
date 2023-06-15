<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require './Compte.php';
        require './Titulaire.php';

        $titulaire1 = new Titulaire("Doe", "John", "1980-07-20", "Selestat");

        $compte1 = new Compte('Livret A', "€", $titulaire1);
        $compte2 = new Compte('Livret B', "$", $titulaire1);

        //On ajoute un compte au titulaire
        $titulaire1->addAccount($compte1);
        $titulaire1->addAccount($compte2);

        //On montre les infos du titulaire
        $titulaire1->showInfos();

        //On ajoute de l'argent sur le compte
        $compte1->credit(45);
        $compte1->credit(45);
        echo "<br>";

        //On ajoute de l'argent sur le compte
        $compte2->credit(45);
        $compte2->credit(50);
        echo "<br>";

        //On envoie de la monnaie au compte 1 a partir du compte 2 et on retire de l'argent du compte 2
        $compte2->sendMoney($compte1, 45);
        $compte2->withDraw(80);
        echo "<br>";

        //On demande les infos du compte 1
        $compte1->showInfos();
    ?>
</body>
</html>