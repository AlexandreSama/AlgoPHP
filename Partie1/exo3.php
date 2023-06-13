<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 3</h1>

    <p>Soit la phrase «Notre formation commence aujourd'hui» .<br>
    3A  partir  de  la  phrase  de  l’exercice  1,  écrire  l’instruction  permettant  de  remplacer  le  mot «aujourd’hui» par le mot «demain». Afficher l’ancienne et la nouvelle phrase.</p>

    <h2>Résultat</h2>

    <?php
        $phrase = "Notre formation DL commence aujourd'hui";
        $newPhrase = str_replace('aujourd\'hui', 'demain', $phrase);

        echo "Voici l'ancienne phrase : « $phrase » <br>";
        echo "Et voici la nouvelle phrase : << " . $newPhrase . " >>";
    ?>
    
</body>
</html>