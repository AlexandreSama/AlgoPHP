<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 9</h1>

    <p> Nous souhaitons savoir si une personne est imposable en fonction de son âge et de son sexe.Si la personne est une femme dont l’âge est compris entre 18 et 35 ans ou si c’est un homme de plus de 20 ans, alors celle-ci est imposable (sinon ce n’est pas le cas, «non imposable»).</p>

    <h2>Résultat</h2>

    <?php
        $age = 32;
        $sexe = "M";

        $condition1 = $age >= 18 && $age <= 35 && $sexe == "F";
        $condition2 = $age >= 20 && $sexe = "M";

        echo "Affichage : <br>";
        if($condition1 || $condition2){
            echo "Age: " . $age . " <br>";
            echo "Sexe: " . $sexe . " <br>";
            echo "La personne est imposable.";
        }else{
            echo "Age: " . $age . " <br>";
            echo "Sexe: " . $sexe . " <br>";
            echo "La personne n'est pas imposable.";
        }
    ?>
    
</body>
</html>