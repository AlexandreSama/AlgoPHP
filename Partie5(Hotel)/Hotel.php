<?php

    Class Hotel{
        public string $nom;
        public string $adresse;
        public string $ville;
        public string $code_postal;
        public array $chambre;
        public array $reservations;

        public function __construct(string $nom, string $adresse, string $ville, string $code_postal)
        {
            $this->nom = $nom;
            $this->adresse = $adresse;
            $this->ville = $ville;
            $this->code_postal = $code_postal;
            $this->chambre = [];
            $this->reservations = [];
        }

        /**
         * Set the value of nom
         *
         * @return  void
         */ 
        public function setNom($nom)
        {
            $this->nom = $nom;
        }

        /**
         * Set the value of adresse
         *
         * @return  void
         */ 
        public function setAdresse($adresse)
        {
            $this->adresse = $adresse;
        }

        /**
         * Set the value of ville
         *
         * @return  void
         */ 
        public function setVille($ville)
        {
            $this->ville = $ville;
        }

        /**
         * Set the value of code_postal
         *
         * @return  void
         */ 
        public function setCode_postal($code_postal)
        {
            $this->code_postal = $code_postal;
        }


        /**
         * Get the value of adresse
         */ 
        public function getAdresse()
        {
            return $this->adresse;
        }

        /**
         * Get the value of ville
         */ 
        public function getVille()
        {
            return $this->ville;
        }

        /**
         * Get the value of code_postal
         */ 
        public function getCode_postal()
        {
            return $this->code_postal;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
            return $this->nom;
        }

        public function showInfos(){
            $roomLeft = count($this->chambre) - count($this->reservations);
            echo "<h3>" . $this->getNom() . " **** " . $this->getVille() . "</h3>";
            echo $this->getAdresse() . " " . $this->getCode_postal() . " " . $this->getVille() . '<br>';
            echo "Nombre de chambres : " . count($this->chambre) . "<br>";
            echo "Nombre de chambres réservés : " . count($this->reservations) . "<br>";
            echo "Nombre de chambres disponibles : " . $roomLeft . "<br><br>";
        }

        public function showReservations(){
            echo "Réservations de l'hôtel " . $this->getNom() . " **** " . $this->getVille() . "<br>";
            if(count($this->reservations) >= 1){
                echo "<p style='background-color: green;'>" . count($this->reservations) . " réservations !</p>";
                foreach ($this->reservations as $reservation) {
                    echo $reservation->client->nom . " " . $reservation->client->prenom . " - Chambre " . $reservation->chambre->number . " - du " . $reservation->date_debut->format('d-m-Y') . " au " . $reservation->date_fin->format('d-m-Y') . "<br>";
                }
            }else{
                echo "Aucune réservation !<br>";
            }
        }

        public function showRooms(){
            echo "<table><thead><tr><th colspan='1'>CHAMBRE</th>";
            echo "<th colspan='1'>PRIX</th><th colspan='1'>WIFI</th>";
            echo "<th colspan='1'>ETAT</th></tr></thead>";
            echo "<tbody></tbody>";
            foreach ($this->chambre as $Chambre) {
                echo "<tr>";
                echo "<td>" . $Chambre->number . "</td>";
                echo "<td>" . $Chambre->price . "</td>";
                echo "<td>" . $Chambre->wifi . "</td>";
                if($Chambre->state == false){
                    echo "<td style='background-color: red;'>Réservé</td>";
                }else{
                    echo "<td>Disponible</td>";
                }
            }
            echo "</tr></tbody></table>";
        }

        public function calculerPrixChambre(Client $client){
            $result = 0;
            foreach ($this->reservations as $reservation) {
                if($reservation->client->getNom() == $client->getNom()){
                    $result = $result + intval(date_diff($reservation->date_debut, $reservation->date_fin)->format('%d')) * $reservation->chambre->price;
                }
            }
            echo "Total : " . $result;
        }

        public function checkReservation(){
            $temp1 = "";
            $temp2 = 0;
            foreach ($this->reservations as $key => $reservation) {
                if($temp1 == $reservation->date_debut->format('d-m-Y') || $temp2 == $reservation->chambre->number){
                    unset($this->reservations[$key]);
                    echo "Une réservation a été supprimé car elle chevauchait une autre réservation ! <br><br>";
                }else{
                    $temp1 = $reservation->date_fin->format('d-m-Y');
                    $temp2 = $reservation->chambre->number;
                }
            }
        }
    }

?>