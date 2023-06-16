<?php

    Class Client{
        public string $nom;
        public string $prenom;

        public function __construct(string $nom, string $prenom){
            $this->nom = $nom;
            $this->prenom = $prenom;
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
         * Set the value of prenom
         *
         * @return  void
         */ 
        public function setPrenom($prenom)
        {
            $this->prenom = $prenom;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom()
        {
            return $this->prenom;
        }

        public function __toString(){
            return $this->getPrenom().' '. $this->getNom();
        }

    }

?>