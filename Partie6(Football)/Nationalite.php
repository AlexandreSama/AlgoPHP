<?php

    Class Nationalite{
        public string $nom;

        public function __construct(string $nom)
        {
            $this->nom = $nom;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
            return $this->nom;
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
    }

?>