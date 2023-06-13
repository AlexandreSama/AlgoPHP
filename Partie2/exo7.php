<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 7</h1>

    <p>7Créer une fonction personnalisée permettant de générer des cases à cocher. On pourra préciser dans le tableau associatif si la case est cochée ou non.</p>

    <h2>Résultat</h2>

    <?php
        $elements = [
            "choix 1"=>"non", 
            "choix 2"=>"oui",
            "choix 3"=>"oui"
        ];

        function genererCheckbox($elements){
            $result = "";
            foreach ($elements as $key => $value) {
                if($value == "oui"){
                    $result .= "<div><input type='checkbox' checked>$key</input>";
                }else{
                    $result .= "<input type='checkbox'>$key</input>";
                }
            }
            return $result . "</div>";
        }

        echo genererCheckbox($elements);
    ?>
    
</body>
</html>