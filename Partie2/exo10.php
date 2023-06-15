<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 10</h1>

    <p>En utilisant l’ensemble des fonctions personnalisées crées précédemment, créer un formulaire complet qui contient les informations
        suivantes: champs de texte avec nom, prénom, adresse e-mail, ville, sexe et une liste de choix parmi lesquels on pourra sélectionner un 
        intitulé de formation: «Développeur Logiciel», «Designer web», «Intégrateur» ou «Chef de projet». Le formulaire devra également comporter
        un bouton permettant de le soumettre à un traitement de validation (submit).</p>

    <h2>Résultat</h2>

    <?php
        $sexe = [
            "Monsieur",
            "Madame",
            "Mademoiselle"
        ];
        $formations = [
            "Développeur Logiciel",
            "Designer Web",
            "Intégrateur",
            "Chef de projet"
        ];
        $infos = [
            "nom",
            "prenom",
            "adresse-mail",
            "ville"
        ];
        $result = "<div>";

        function afficherSexe($sexe){
            $result = "";
            $result .= "<select name='genre'>";
            foreach ($sexe as $key) {
                $result .= "<option value='$key'>$key</option>";
            }
            return $result . "</select><br>";
        }
        function afficherInfos($infos){
            $result = "";
            foreach ($infos as $key) {
                $result .= "<label for='$key'>$key<br></label><input type='text' placeholder='$key' name='$key'></input><br>";
            }
            return $result;
        }
        function afficherFormation($formations){
            $result = "";
            foreach ($formations as $key) {
                $result .= "<label for='$key'>$key</label><input type='radio' name='formation'></input><br>";
            }
            $result .= "<button type='submit'>Valider";
            return $result . "<br>";
        }

        function afficherFormulaire($infos, $sexe, $formations, $result){
            $result .= afficherSexe($sexe);
            $result .= afficherInfos($infos);
            $result .= afficherFormation($formations);
            return $result . "</div>";
        }

        echo afficherFormulaire($infos, $sexe, $formations, $result);

    ?>
    
</body>
</html>