<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 2</h1>

    <p>Créer une fonction personnalisée convertirMajRouge()permettant de transformer une chaîne de caractère passée en argument en majuscules et en rouge.Vous devrez appeler la fonction comme suit: convertirMajRouge($texte);</p>

    <h2>Résultat</h2>

    <?php
        $capitales = [
            "France"=>"Paris",
            "Allemagne"=>"Berlin",
            "USA"=>"Washington",
            "Italie"=>"Rome"
        ];

        function afficherTableHTML($capitales){
            asort($capitales);
            $result = "<table>
                    <thead>
                        <tr>
                            <th>PAYS</th>
                            <th>CAPITALES</th>
                        </tr>
                    </thead><tbody>";
            foreach ($capitales as $key => $value) {
                $result .= "<tr>
                        <td>$key</td>
                        <td>$value</td>
                    </tr>";
            }
            $result .= "</tbody></table>";
            return $result;
        }
        echo afficherTableHTML($capitales)
    ?>
    
</body>
</html>