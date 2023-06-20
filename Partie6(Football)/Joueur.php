<?php

    class Joueur{
        public string $nom;
        public string $prenom;
        public DateTime $dateDeNaissance;
        public string $age;
        public array $nationalites;
        public DateTime $debut_saison;
        public array $clubs;

        public function __construct(string $nom, string $prenom, string $dateDeNaissance, Nationalite $nationalite)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateDeNaissance = new DateTime($dateDeNaissance);
            $this->age = date_diff($this->dateDeNaissance, new DateTime())->format('%y');
            $this->nationalites[] = $nationalite;
        }

        public function showClubs(){
                echo "<div class='card' style='width: 18rem;'><div class='card-body'>";
                echo "<h5 class='card-title'>" . $this->prenom . " " . $this->nom . "</h5>";
                foreach ($this->nationalites as $nationalite) {
                        echo "<p class='card-text'>" .  $nationalite->nom . " - " . $this->age . " ans</p>";
                }
                foreach ($this->clubs as $value ) {
                        echo "<p class='card-text'>" .  $value->nomClub . " (" .  $value->getDebut_Saison($this->nom)->format('Y') . ")</p>";
                }
                echo "</div></div>";
        }

        public function addNationalite(Nationalite $nationalite){
            $this->nationalites[] = $nationalite;
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

        /**
         * Get the value of age
         */ 
        public function getAge()
        {
                return $this->age;
        }

        /**
         * Get the value of nationalite
         */ 
        public function getNationalite()
        {
                return $this->nationalites;
        }


        /**
         * Set the value of debut_saison
         *
         * @return  self
         */ 
        public function setDebut_saison($debut_saison)
        {
                $this->debut_saison = new DateTime($debut_saison);

                return $this;
        }
    }


?>