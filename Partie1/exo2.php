<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 2</h1>

    <p>Soit la phrase «Notre formation commence aujourd'hui» .<br>
    A partir de la phrase de l’exercice 1, écrire l’instruction permettant de compter le nombre de mots contenus dans celle-ci.</p>

    <h2>Résultat</h2>

    <?php
        $phrase = "Notre formation DL commence aujourd'hui";
        $nbmots = str_word_count($phrase);

        echo "La phrase « $phrase » contient $nbmots mots.";
    ?>
    
</body>
</html>