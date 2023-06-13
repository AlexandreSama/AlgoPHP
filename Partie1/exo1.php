<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 1</h1>

    <p>Soit la phrase «Notre formation commence aujourd'hui» .<br>
    Ecrire un algorithme permettant de compter le nombre de caractères contenus dans cet phrase</p>

    <h2>Résultat</h2>

    <?php
        $phrase = "Notre formation DL commence aujourd'hui";
        $longueur = strlen($phrase);
        echo "La phrase « $phrase » contient $longueur caractères <br>";
        echo "La phrase « $phrase » contient ". strlen($phrase). " caractères <br>";
    ?>
    
</body>
</html>