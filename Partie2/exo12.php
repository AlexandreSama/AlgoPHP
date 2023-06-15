<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 12</h1>

    <p>La fonction var_dump($variable) permet d’afficher les informations d’une variable. 
        Soit le tableau suivant : $tableauValeurs = array(true,"texte",10,25.369,array("valeur1","valeur2"));
        A l’aide d’une boucle, afficher les informations des variables contenues dans le tableau.</p>

    <h2>Résultat</h2>

    <?php
        $tableauValeurs= [
            true,
            "texte",
            10,25.369,
            [
                "valeur1",
                "valeur2"
            ]
        ];
        foreach ($tableauValeurs as $key => $value) {
            var_dump($key);
            echo "<br>";
            var_dump($value);
        }
    ?>
    
</body>
</html>