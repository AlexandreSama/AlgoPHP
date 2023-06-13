<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 12</h1>

    <p> A partir d’une fonction personnalisée et à partir d’un tableau de prénoms et de langue associée (tableau  contenant  clé  et  valeur),  dire  bonjour  aux  différentes  personnes  dans  leur  langue respective (français ➔«Salut», anglais ➔«Hello», espagnol ➔«Hola»)</p>

    <h2>Résultat</h2>

    <?php

        // * Nos deux tableaux
        $array = array("Mickael" => "FRA", "Virgile" => "ESP", "Marie-Claire" => "ENG", "Jean" => "JPN");
        $array2 = array("FRA" => "Salut", "ESP" => "Hola", "ENG" => "Hello");
        // * trier par clé et en gardant l'index intact
        ksort($array);
        asort($array2);
        // * Pour chaque valeur dans le premier array, s'il existe dans le second array, est placé dans le echo, sinon on dit qu'il n'existe pas
        foreach ($array as $key => $value) {
            if(array_key_exists($value, $array2)){
                echo $array2[$value] . " " . $key . "<br>";
            }else{
                echo "La langue " . $value . " n'est pas prise en charge <br>";
            }
        }
    ?>
    
</body>
</html>