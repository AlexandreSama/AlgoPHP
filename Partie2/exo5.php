<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 5</h1>

    <p>Créer  une  fonction  personnalisée  permettant  de créer  un  formulaire  de  champs  de  texte  en précisant le nom des champs associés.</p>

    <h2>Résultat</h2>

    <?php
        $nomsInput = ["Nom","Prénom","Ville"];

        function createTextInputs($array) {
            $result = "";
            foreach ($array as $key) {
                $result .= "<p>$key</p>";
                $result .= "<input type='text' placeholder='$key'>";
            }
            return $result;
        }

        echo createTextInputs($nomsInput);
    ?>
    
</body>
</html>