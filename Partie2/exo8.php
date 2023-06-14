<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 8</h1>

    <p>Soit l’URL suivante: http://my.mobirise.com/data/userpic/764.jpgCréer une fonction personnalisée permettant d’afficher l’image N fois à l’écran.</p>

    <h2>Résultat</h2>

    <?php
        $url = 'http://my.mobirise.com/data/userpic/764.jpg';
        $time = 4;

        function repeterImage($url, $time){
            $result = "";
            $i = 1;
            while ($i <= $time) {
                $result .= "<img src='$url'>";
                $i++;
            }
            return $result;
        }

        echo repeterImage($url, 4);

    ?>
    
</body>
</html>