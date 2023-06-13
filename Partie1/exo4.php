<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 4</h1>

    <p>Soit la phrase «Engage le jeu que je le gagne» .<br>
    Ecrire un algorithme permettant de savoir si une phrase est palindrome.</p>

    <h2>Résultat</h2>

    <?php
        $phrase = "Engage le jeu que je le gagne";
        $phraseWithoutSpace = str_replace(' ', '', strtolower($phrase));
        if ($phraseWithoutSpace == strrev($phraseWithoutSpace)){
            echo "La phrase : $phrase est palindrome.\n";
        } else {
            echo "La phrase : << $phrase >> n'est pas un palindrome.\n";
        }
    ?>
    
</body>
</html>