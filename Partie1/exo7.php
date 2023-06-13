<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 7</h1>

    <p> Ecrire un algorithme permettant de renvoyer la catégorie d’un enfant en fonction de son âge:</p>

    <h2>Résultat</h2>

    <?php
        // * On récupére l'age de l'enfant
        $kidAge = 10;
        
        // * On fais un switch sur les quatre différents cas et on met un default au cas ou
        switch (true) {
            case $kidAge >= 12:
                echo "l'enfant qui a " . $kidAge . " ans appartiens à la catégorie Cadet";
                break;
            case ($kidAge >= 10):
                echo "l'enfant qui a " . $kidAge . " ans appartiens à la catégorie Minime";
                break;
            case ($kidAge >= 8):
                echo "l'enfant qui a " . $kidAge . " ans appartiens à la catégorie Pupille";
                break;
            case ($kidAge >= 6):
                echo "l'enfant qui a " . $kidAge . " ans appartiens à la catégorie Poussin";
                break;
            default:
                echo "l'enfant qui a " . $kidAge . " ans n'appartiens a aucune catégorie";
                break;
        }
    ?>
    
</body>
</html>