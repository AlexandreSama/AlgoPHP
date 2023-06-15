<?php

    Class Titulaire{
        public string $nom;
        public string $prenom;
        public DateTime $DateDeNaissance;
        public string $ville;
        public array $comptes;

        public function __construct(string $nom, string $prenom, string $DateDeNaissance, string $ville)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->DateDeNaissance = new DateTime($DateDeNaissance);
            $this->ville = $ville;
            $this->comptes = [];
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

        /**
         * Get the value of prenom
         */ 
        public function getPrenom()
        {
            return $this->prenom;
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
         * Get the value of DateDeNaissance
         */ 
        public function getDateDeNaissance()
        {
            return $this->DateDeNaissance;
        }

        /**
         * Set the value of DateDeNaissance
         *
         * @return  void
         */ 
        public function setDateDeNaissance($DateDeNaissance)
        {
            $this->DateDeNaissance = $DateDeNaissance;
        }

        public function calculerAge(){
            $now = new DateTime();
            return date_diff($this->DateDeNaissance, $now)->format('%y');
        }

        /**
         * Get the value of ville
         */ 
        public function getVille()
        {
            return $this->ville;
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
         * Add an account to a titulaire
         *
         * @return  void
         */ 
        public function addAccount(Compte $compte){
            $this->comptes[] = $compte;
            echo "Le compte a bien été ajouté ! <br><br>";
        }

        public function showInfos(){
            echo "Nom / Prenom : " . $this->getNom() . " / " . $this->getPrenom() . " <br>";
            echo "Date de naissance / Age : " . $this->getDateDeNaissance()->format('Y-m-d') . " / " . $this->calculerAge() . " ans <br>";
            echo "Ville : " . $this->getVille() . "<br><br>";
            $i = 1;
            foreach ($this->comptes as $compte) {
                echo "Etat du compte n°$i : <br>";
                echo "Type de compte : " . $compte->libelle . " <br>";
                echo "Solde du compte : " . $compte->solde . " €<br>";
                echo "Devise du compte : " . $compte->devise . " <br><br>";
                $i++;
            } 
        }

        public function __toString(){
            return $this->getPrenom().' '. $this->getNom();
        }
    }

?>