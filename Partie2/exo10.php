<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 10</h1>

    <p>10En utilisant l’ensemble des fonctions personnalisées crées précédemment,  créer  un  formulaire complet  qui  contient  les  informations  suivantes:  champs  de  texteavec  nom,  prénom,  adresse  e-mail, ville, sexe et une liste de choix parmi lesquels on pourra sélectionner un intitulé de formation: «Développeur Logiciel»,«Designer web», «Intégrateur» ou «Chef de projet».Le formulaire devra également comporter un bouton permettant de le soumettre à un traitement de validation (submit).</p>

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

        function afficherRadio($sexe, $formations, $infos){
            $result = "<div>";
            foreach ($infos as $key) {
                $result .= "<p>$key</p>";
                $result .= "<input type='text' placeholder='$key'>";
            }
            $result .= "<select name='genre'>";
            foreach ($sexe as $key) {
                $result .= "<option value='$key'>$key</option>";
            }
            foreach ($formations as $key) {
                $result .= "<input type='radio'>$key</input>";
            }
            $result .= "<button type='submit'>Valider
                            </div>";
            return $result;
        }

        echo afficherRadio($sexe, $formations, $infos);

    ?>
    
</body>
</html>