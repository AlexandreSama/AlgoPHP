<?php

    Class Reserver{
        public DateTime $date_debut;
        public DateTime $date_fin;
        public Chambre $chambre;
        public Client $client;

        public function __construct(string $date_debut, string $date_fin, Chambre $chambre, Client $client)
        {
            $this->date_debut = new DateTime($date_debut);
            $this->date_fin = new DateTime($date_fin);
            $this->chambre = $chambre;
            $this->chambre->hotel->reservations[] = $this;
            $this->chambre->setState(0);
            $this->client = $client;
        }

        /**
         * Get the value of date_debut
         */ 
        public function getDate_debut()
        {
            return $this->date_debut;
        }

        /**
         * Get the value of date_fin
         */ 
        public function getDate_fin()
        {
            return $this->date_fin;
        }

        public function showInfosClient(){
            echo $this->client->getPrenom() . ' ' . $this->client->getNom()  . ' - Chambre ' . $this->chambre->getNumber() . ' - du ' . $this->date_debut->format('d-m-Y') . ' au ' . $this->date_fin->format('d-m-Y') . '<br>';
        }

        public function showInfos(){
            echo "Réservation de " . $this->client->getNom() . " " . $this->client->getPrenom() . "<br>";
            echo "Hotel : " . $this->chambre->hotel->getNom() . ' / Chambre : ' . $this->chambre->getNumber() . ' (2 lits - ' . $this->chambre->getPrice() . ' $ - Wifi : ' . $this->chambre->getWifi() . ') du : ' . $this->date_debut->format('d-m-Y') . ' au ' . $this->date_fin->format('d-m-Y') . ' <br>';
        }

        public function cancelReservation(){
            foreach ($this->chambre->hotel->reservations as $key => $reservation) {
                if($reservation->chambre->number == $this->chambre->number){
                    unset($this->chambre->hotel->reservations[$key]);
                }
            }
            echo "La réservation a bien été annulé";
        }

        
    }

?>