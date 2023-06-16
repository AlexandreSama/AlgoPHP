<?php

    Class Chambre{
        public int $number;
        public bool $state;
        public int $price;
        public bool $wifi;
        public Hotel $hotel;

        public function __construct(int $number, int $price, bool $wifi, Hotel $hotel)
        {
            $this->number = $number;
            $this->state = 1;
            $this->price = $price;
            $this->wifi = $wifi;
            $this->hotel = $hotel;
            $this->hotel->chambre[] = $this;
        }

        /**
         * Get the value of number
         */ 
        public function getNumber()
        {
            return $this->number;
        }

        /**
         * Get the value of state
         */ 
        public function getState()
        {
            return $this->state;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * Get the value of wifi
         */ 
        public function getWifi()
        {
            $output = "";
            if($this->wifi == true){
                $output = 'oui';
            }else{
                $output = 'non';
            }
            return $output;
        }

        /**
        * Get the value of id_hotel
        */ 
        public function getId_hotel()
        {
            return $this->hotel;
        }

        /**
         * Set the value of number
         *
         * @return  void
         */ 
        public function setNumber($number)
        {
            $this->number = $number;
        }

        /**
         * Set the value of state
         *
         * @return  void
         */ 
        public function setState($state)
        {
            $this->state = $state;
        }

        /**
         * Set the value of price
         *
         * @return  void
         */ 
        public function setPrice($price)
        {
            $this->price = $price;
        }

        /**
         * Set the value of wifi
         *
         * @return  void
         */ 
        public function setWifi($wifi)
        {
            $this->wifi = $wifi;
        }

        public function addReservation(Reserver $reserver){
            $this->hotel->reservations = $reserver;
        }
    }


?>