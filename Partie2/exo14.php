<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 14</h1>

    <p>Créer une classe Voiture possédant 2 propriétés (marque et modèle) ainsi qu’une classe VoitureElec
    qui hérite (extends) de la classe Voiture et qui a une propriété supplémentaire (autonomie).
    Instancier une voiture « classique » et une voiture « électrique » ayant les caractéristiques
    suivantes :
    Peugeot 408 : $v1 = new Voiture("Peugeot","408");
    BMW i3 150 : $ve1 = new VoitureElec("BMW","I3",100);
    Votre programme de test devra afficher les informations des 2 voitures de la façon suivante : </p>

    <h2>Résultat</h2>

    <?php
    
        class Voiture{

            private string $marque;
            private string $modele;

            public function __construct(string $marque, string $modele) {
                $this->marque = $marque;
                $this->modele = $modele;
            }

            public function getMarque(){
                return $this->marque;
            }

            public function getModele(){
                return $this->modele;
            }

            public function getInfos(){
                $output = "Marque et modèle du véhicule : " . $this->getMarque() . " " . $this->getModele();
                return $output;
            }


            public function setMarque(string $marque){
                $this->marque = $marque;
            }
            public function setModele(string $modele){
                $this->modele = $modele;
            }
            
        }

        /* The class VoitureElec extends the class Voiture and adds a private property for autonomy and methods
        to get and set it. */
        class VoitureElec extends Voiture{
            private int $autonomie;

            public function __construct(string $marque, string $modele, int $autonomie) {
                parent::__construct($marque, $modele);
                $this->autonomie = $autonomie;
            }

            public function getAutonomie(){
                return $this->autonomie;
            }
            public function getInfos(){
                $output = parent::getInfos() . ", Autonomie : " . $this->getAutonomie() . " Km / h";
                return $output;
            }


            public function setAutonomie(int $autonomie){
                $this->autonomie = $autonomie;
            }
        }

        $v1 = new Voiture('Peugeot', '408');
        $ve1 = new VoitureElec('BMW', 'I3', 100);
        echo $v1->getInfos() . "<br/>";
        echo $ve1->getInfos() . "<br/>";
    ?>
    
</body>
</html>