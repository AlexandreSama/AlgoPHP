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

        //Les Propriétés de la class. On peut soit les typés en private pour qu'elles
        //Restent utilisable uniquement dans cet classe, en public pour qu'elles
        //Soit utilisables hors de la class, ou en protected pour qu'elles soit
        //Utilisable uniquement dans la class et avec le bon parent !
        private string $nom;
        private string $prenom;
        private DateTime $dateDeNaissance;

        //Le Constructor est une method qui permet de construire l'Objet avec les propriétés cités plus haut. On les types 
        //Pour éviter de mauvaises surprises.
        public function __construct(string $nom, string $prenom, string $dateDeNaissance) {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateDeNaissance = new DateTime($dateDeNaissance);
        }

        //Les Setters permettent d'insérer ou de modifier les propriétés 
        //D'un Objet déjà crée sans devoir tout réecrire.
        function set_name(string $name){
            $this->nom = $name;
        }

        function set_prenom(string $prenom){
            $this->prenom = $prenom;
        }

        function set_dateDeNaissance(string $dateDeNaissance){
            $this->dateDeNaissance = $dateDeNaissance;
        }

        //Les Getters permettent de récupérer une information spécifique d'un Objet sans
        //Devoir récupérer toutes les informations de l'Objet.
        function get_name():string {
            return $this->nom;
        }

        function get_prenom():string {
            return $this->prenom;
        }

        function get_DateDeNaissance() {
            return $this->dateDeNaissance;
        }

        //la method get_age renvoi un nombre d'années. Elle fait la différence (graçe a date_diff) entre la date de naissance
        //Que l'on a donné lors de la création de l'Objet, et la date du jour (new DateTime()). Le résultat est ensuite
        //formaté pour ne rendre que le nombre d'année d'écart sous forme de string.
        function get_age() {
            $now = new DateTime();
            return date_diff($this->dateDeNaissance, $now)->format('%y');
        }

        //Cet method renvoi toutes les informations des Getters sous forme de string.
        //Utile si l'on veut récupérer toutes les informations d'un Objet sans devoir
        //Appeler chaque Getter.
        public function __toString()
        {
            return $this->get_name() . ' ' . $this->get_prenom() . ' a ' . $this->get_age() . ' ans <br>';
        }

        //Le Constructor et le __toString() sont appellés des methods magiques ! Car elles écrasent
        //l'action par défaut de PHP et la remplace par la notre quand certaines actions sont fait
        //sur un Objet !
    }

    $personne1 = new Personne('DUPONT', 'Michel', '1980-02-19');
    $personne2 = new Personne('DUCHEMIN', 'Alice', '1985-01-17');
    echo $personne1;
    echo $personne2;

    ?>
    
</body>
</html>