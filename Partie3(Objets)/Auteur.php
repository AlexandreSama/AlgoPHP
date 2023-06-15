<?php

    Class Auteur{
        public string $nom;
        public string $prenom;
        public DateTime $dateDeNaissance;
        public array $livres;

        public function __construct(string $nom, string $prenom, $dateDeNaissance)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateDeNaissance = new DateTime($dateDeNaissance);
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

        //On récupère la date de naissance de l'auteur et on l'a compare a
        //Celle d'aujourd'hui
        public function calculerAge(){
            $now = new DateTime();
            return date_diff($this->dateDeNaissance, $now)->format('%y');
        }

        //Cet method ajoute un livre dans le tableau livres
        //On l'appelle dans la class Livre pour le faire 
        //Automatiquement
        public function addLivre(Livre $livre){
            
            $this->livres[] = $livre;
        }

        //Pour chaque livre dans le tableau livres, on echo la method __toString()
        public function getBibliographie(){
            $annee = [];
            $i = 0;

            //Un premier forEach pour récupérer les années
            //Et les trier de façon ascendante
            foreach ($this->livres as $livre) {
                array_push($annee, $livre->annee);
                sort($annee);
            }
            //Un deuxième forEach pour echo le résultat avec les années dans le bon ordre
            foreach ($this->livres as $livre) {
                echo $livre->getTitre().' ('. $annee[$i] .') : '. $livre->getNbPage().' pages / '. $livre->getPrice().' € <br>';
                $i++;
            }
        }

        //Pour chaque livre contenu dans le tableau, on récupére son prix
        //Et on le calcule en plus.
        public function calculerPrix(){
            $result = 0;
            foreach ($this->livres as $livre) {
                $result = $result + $livre->price;
            }
            return $result;
        }

        

        //Effectivement, l'auteur aura un tableau de livres, et dans Livres il faudra faire une fonction pour
        //ajouter un livre et il aura comme paramètre $this
        public function __toString(){
            return $this->getPrenom().' '. $this->getNom();
        }
    }

?>