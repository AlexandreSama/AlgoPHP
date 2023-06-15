<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 9</h1>

    <p>9Créer une fonction personnalisée permettant d’afficher des boutons radio avec un tableau de valeurs en paramètre ("Monsieur","Madame","Mademoiselle").</p>

    <h2>Résultat</h2>

    <?php
        $elements = [
            "Monsieur",
            "Madame",
            "Mademoiselle"
        ];

        function afficherRadio($elements){
            $result = "<div>";
            foreach ($elements as $key) {
                $result .= "<label for='radio'>$key<input type='radio' name='radio'></input>";
            }
            return $result . "</div>";
        }
        echo afficherRadio($elements);

    ?>
    
</body>
</html>