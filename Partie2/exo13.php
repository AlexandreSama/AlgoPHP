<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 13</h1>

    <p>Créer  une  classe  Voiture  possédant  les  propriétés  suivantes: marque,  modèle,  nbPorteset vitesseActuelleainsi que les méthodes demarrer( ), accelerer( )et stopper( )en plus des  accesseurs  (get)  et  mutateurs  (set)  traditionnels.  La  vitesse  initiale  de  chaque  véhicule instancié est de 0. Une méthode personnalisée pourra afficher toutes les informations d’un véhicule. v1 ➔"Peugeot","408",5v2 ➔"Citroën","C4",3Coderl’ensemble des méthodes, accesseurs et mutateurs de la classe tout en réalisant des jeux de tests  pour  vérifier  la  cohérence  de  la  classe Voiture. Vous  devez  afficher  les  tests  et  les éléments suivants:</p>

    <h2>Résultat</h2>

    <?php
        class Voiture{
            private string $marque;
            private string $modèle;
            private int $nbPortes;
            private int $vitesseActuelle;

            public function __construct(string $marque, string $modèle, int $nbPortes, int $vitesseActuelle, int $vehicleState) {
                $this->marque = $marque;
                $this->modèle = $modèle;
                $this->nbPortes = $nbPortes;
                $this->vitesseActuelle = $vitesseActuelle;
                $this->vehicleState = $vehicleState
            }

            public function getMarque(): string {
                return $this->marque;
            }

            public function getModèle(): string {
                return $this->modèle;
            }

            public function getNbPortes(): int {
                return $this->nbPortes;
            }

            public function getVitesseActuelle(): int {
                return $this->vitesseActuelle;
            }

            public function setMarque(string $marque): string{
                $this->marque = $marque;
            }
            public function setModèle(string $modèle): string{
                $this->modèle = $modèle;
            }
            public function setNbPortes(int $nbPortes): int{
                $this->nbPortes = $nbPortes;
            }
            public function setVitesseActuelle(): int{
                $this->vitesseActuelle = 0;
            }

            

            public function __toString(){
                return $this->getMarque().''. $this->getModèle().''. $this->getNbPortes().''. $this->getVitesseActuel
            }
        }
    ?>
    
</body>
</html>