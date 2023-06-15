<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteurs et Livres</title>
</head>
<body>
    <h1>Auteurs et Livres</h1>

    
    <?php
        include "./Auteur.php";
        include "./Livre.php";

        $auteur = new Auteur("King", "Stephen");
        $livre1 = new Livre("Ca", 1986, 1138, 20, $auteur);
        $livre2 = new Livre("Simetierre", 1983, 374, 15, $auteur);
        $livre3 = new Livre("Le Fléau", 1978, 823, 14, $auteur);
        $livre4 = new Livre("Shining", 1977, 447, 16, $auteur);


        echo "Livres de " . $auteur . "<br><br>";

        echo $auteur->getBibliographie();
        
?>
    
</body>
</html>