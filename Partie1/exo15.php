<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 15</h1>

    <p> Créer une classe Personne (nom, prénom et date de naissance).Instancier 2 personnes et afficher leurs informations: nom, prénom et âge.</p>

    <h2>Résultat</h2>

    <?php
    echo "Affichage : <br>";
    class Personne {
        //Variables
        private string $nom;
        private string $prenom;
        private DateTime $dateDeNaissance;

        //Constructor
        public function __construct(string $nom, string $prenom, string $dateDeNaissance) {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateDeNaissance = new DateTime($dateDeNaissance);
        }

        //Setters
        function set_name(string $name){
            $this->nom = $name;
        }

        function set_prenom($prenom){
            $this->prenom = $prenom;
        }

        function set_dateDeNaissance($dateDeNaissance){
            $this->dateDeNaissance = $dateDeNaissance;
        }

        //Getters
        function get_name():string {
            return $this->nom;
        }
        function get_prenom() {
            return $this->prenom;
        }

        function get_DateDeNaissance() {
            return $this->dateDeNaissance;
        }

        function get_age() {
            $now = new DateTime();
            return date_diff($this->dateDeNaissance, $now)->format('%y');
        }

        //Renvoi le résultat complet
        public function __toString()
        {
            return $this->get_name() . ' ' . $this->get_prenom() . ' a ' . $this->get_age() . ' ans <br>';
        }
    }

    $personne1 = new Personne('DUPONT', 'Michel', '1980-02-19');
    $personne2 = new Personne('DUCHEMIN', 'Alice', '1985-01-17');
    echo $personne1;
    echo $personne2;

    ?>
    
</body>
</html>