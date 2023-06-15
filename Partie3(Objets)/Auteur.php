<?php

    Class Auteur{
        public string $nom;
        public string $prenom;
        public array $livres;

        public function __construct(string $nom, string $prenom)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->livres = [];
        }

        public function setNom(string $nom){
            $this->nom = $nom;
        }

        public function setPrenom(string $prenom){
            $this->prenom = $prenom;
        }

        public function getNom(){
            return $this->nom;
        }   

        public function getPrenom(){
            return $this->prenom;
        }

        //Cet method ajoute un livre dans le tableau livres
        //On l'appelle dans la class Livre pour le faire 
        //Automatiquement
        public function addLivre(Livre $livre){
            
            $this->livres[] = $livre;
        }

        //Pour chaque livre dans le tableau livres, on echo la method __toString()
        public function getBibliographie(){

            foreach ($this->livres as $livre) {
               echo $livre . '<br>';
            }
        }

        

        //Effectivement, l'auteur aura un tableau de livres, et dans Livres il faudra faire une fonction pour
        //ajouter un livre et il aura comme paramètre $this
        public function __toString(){
            return $this->getPrenom().' '. $this->getNom();
        }
    }

?>