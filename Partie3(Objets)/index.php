<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteurs et Livres</title>
</head>
<body>
    <?php
        include "./Auteur.php";
        include "./Livre.php";

        $auteur1 = new Auteur("King", "Stephen", "1947-09-21");
        $livreAuteur1 = new Livre("Ca", 1986, 1138, 20, $auteur1);
        $livreAuteur1 = new Livre("Simetierre", 1983, 374, 15, $auteur1);
        $livreAuteur1 = new Livre("Le Fléau", 1978, 823, 14, $auteur1);
        $livreAuteur1 = new Livre("Shining", 1977, 447, 16, $auteur1);

        $auteur2 = new Auteur("Lovecraft", "H.P", "1890-08-20");
        $livreAuteur2 = new Livre("L'Appel de Cthulhu", 1928, 96, 7, $auteur2);
        $livreAuteur2 = new Livre("Dagon", 1919, 448, 6, $auteur2);
        $livreAuteur2 = new Livre("L'Abomination de Dunwich", 1929, 256, 4, $auteur2);
        $livreAuteur2 = new Livre("La Cité sans nom", 1921, 240, 5, $auteur2);

        echo "<h3>Livres de $auteur1 </h3>";

        echo $auteur1->getBibliographie();
        echo "L'auteur a " . $auteur1->calculerAge() . ' ans <br>';
        echo "Prix total des livres : " . $auteur1->calculerPrix() . " € <br><br>";

        echo "<h3>Livres de $auteur2</h3>";

        echo $auteur2->getBibliographie();
        echo "l'auteur a " . $auteur2->calculerAge() . ' ans R.I.P<br>';
        echo "Prix total des livres : " . $auteur2->calculerPrix() . " € <br><br>"
?>
    
</body>
</html>