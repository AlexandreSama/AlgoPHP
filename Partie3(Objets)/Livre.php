<?php

    Class Livre{

        public string $titre;
        public int $annee;
        public int $nbPages;
        public int $price;
        public Auteur $auteur;

        public function __construct(string $titre, int $annee, int $nbPages, int $price, Auteur $auteur){
            $this->titre = $titre;
            $this->annee = $annee;
            $this->nbPages = $nbPages;
            $this->price = $price;
            $this->auteur = $auteur;
            //Ici, on appelle la class Auteur pour appeler
            //La method addLivre, et faire en sorte que ce soit
            //Fait automatiquement
            $this->auteur->addLivre($this);
        }

        public function getTitre(){
            return $this->titre;
        }

        public function getAnnee(){
            return $this->annee;
        }

        public function getNbPage(){
            return $this->nbPages;
        }

        public function getPrice() {
            return $this->price;
        }

        public function getAuteur(){
            return $this->auteur;
        }

        public function setTitre(string $titre){
            $this->titre = $titre;
        }

        public function setAnnee(int $annee){
            $this->annee = $annee;
        }

        public function setNbPage(int $nbPages){
            $this->nbPages = $nbPages;
        }

        public function setPrice(int $price){
            $this->price = $price;
        }

        public function setAuteur(string $auteur){
            $this->auteur = $auteur;
        }

        public function __toString(){
            return $this->getTitre().' '. $this->getAnnee().' '. $this->getNbPage().' '. $this->getPrice().' '. $this->getAuteur();
        }
    }

?>