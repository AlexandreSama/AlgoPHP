<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 14</h1>

    <p> Calculer l'âge exact d'une personne à partir de sa date de naissance (en années, mois, jours).</p>

    <h2>Résultat</h2>

    <?php
        echo "Affichage : <br>";
        $dateOfBirth = "17-01-1985";
        $today = "21-05-2018";
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        echo "Age de la personne : " . $diff->format('%y ans %m mois %d jours');
    ?>
    
</body>
</html>