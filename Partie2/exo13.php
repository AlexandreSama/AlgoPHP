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
            private string $modele;
            private int $nbPortes;
            private int $vitesseActuelle;
            private int $vehicleState;

            public function __construct(string $marque, string $modele, int $nbPortes) {
                $this->marque = $marque;
                $this->modele = $modele;
                $this->nbPortes = $nbPortes;
                $this->vitesseActuelle = 0;
                $this->vehicleState = 0;
            }

            public function getMarque(){
                return $this->marque;
            }

            public function getModele(){
                return $this->modele;
            }

            public function getNbPortes(){
                return $this->nbPortes;
            }

            public function getVitesseActuelle() {
                return "La vitesse du véhicule " . $this->getMarque() . " " . $this->getModele() . " est de : " . $this->vitesseActuelle . " Km / h";
            }
            public function getVehicleState(){
                return $this->vehicleState;
            }

            public function getVehicleInfos(){
                $infos = "";

                if($this->getVehicleState() == 1){

                    $infos = "Nom et modèle du véhicule : " . $this->getMarque() . " " . $this->getModele() . " <br> Nombre de porte : " . $this->getNbPortes() . " <br> Le véhicule " . $this->getMarque() . " est démarré <br> Sa vitesse actuelle est de : " . $this->getVitesseActuelle();
                    
                }else{

                    $infos = "Nom et modèle du véhicule : " . $this->getMarque() . " " . $this->getModele() . " <br> Nombre de porte : " . $this->getNbPortes() . " <br> Le véhicule " . $this->getMarque() . " est à l'arrêt <br> Sa vitesse actuelle est de : " . $this->getVitesseActuelle();
                }

                return $infos;
            }


            public function setMarque(string $marque){
                $this->marque = $marque;
            }
            public function setModele(string $modele){
                $this->modele = $modele;
            }
            public function setNbPortes(int $nbPortes){
                $this->nbPortes = $nbPortes;
            }
            public function setVehicleState(){
                $state = "";

                if($this->getVehicleState() == 1){

                    $this->vehicleState = 0;
                    $state = "Le véhicule " . $this->getMarque() . " " .  $this->getModele() . " est stoppé";

                }else{

                    $this->vehicleState = 1;
                    $state =  "Le véhicule " . $this->getMarque() . " " . $this->getModele() . " démarre";
                }

                return $state;
            }
            public function setAcceleration(int $newSpeed){
                $acceleration = "";

                if($this->getVehicleState() == 1){

                    $this->vitesseActuelle = $this->vitesseActuelle + $newSpeed;
                    $acceleration = "Le véhicule " . $this->getMarque() . " " . $this->getModele() . " accélére de " . $this->vitesseActuelle . " Km/h";

                }else{

                    $acceleration = "Le véhicule " . $this->getMarque() . " " .  $this->getModele() . " veut accélérer de " . $newSpeed . " Km/h mais le véhicule n'est pas démarré !";
                }

                return $acceleration;
            }
            public function setFrein(int $speedBrake){
                $currentSpeed = "";

                if($this->vitesseActuelle - $speedBrake >= 0){

                    $this->vitesseActuelle = $this->vitesseActuelle - $speedBrake;
                    $currentSpeed = "Le véhicule " . $this->getMarque() . " " . $this->getModele() . " veut freiner de " . $speedBrake . " Km/h";

                }else{

                    $currentSpeed = "Le véhicule " . $this->getMarque() . " " . $this->getModele() . " freine de " . $speedBrake . " et cale";
                }

                return $currentSpeed;
            }
            

            public function __toString(){
                return $this->getMarque().''. $this->getModele().''. $this->getNbPortes().''. $this->getVitesseActuelle();
            }
        }

        $vehicle1 = new Voiture('Peugeot', '408', 5);
        $vehicle2 = new Voiture('Citroen', 'C4', 3);
        echo $vehicle1->setVehicleState() . "<br>";
        echo $vehicle1->setAcceleration(50) . "<br>";

        echo $vehicle2->setVehicleState() . "<br>";
        echo $vehicle2->setVehicleState() . "<br>";
        echo $vehicle2->setAcceleration(20) . "<br>";

        echo $vehicle1->getVitesseActuelle() . "<br>";
        echo $vehicle2->getVitesseActuelle() . "<br>";
        echo $vehicle1->setFrein(19) . "<br>";
        echo $vehicle1->getVitesseActuelle() . "<br><br>";

        echo "Infos véhicule 1 <br> *************************************** <br>";
        echo $vehicle1->getVehicleInfos() . "<br><br>";
        echo "Infos véhicule 2 <br> *************************************** <br>";
        echo $vehicle2->getVehicleInfos();
    ?>
    
</body>
</html>