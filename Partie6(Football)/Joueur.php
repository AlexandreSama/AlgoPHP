<?php

    Class Joueur{
        public string $nom;
        public string $prenom;
        public DateTime $dateDeNaissance;
        public string $age;
        public Club $club;
        public DateTime $debut_saison;
        public array $nationalites;

        public function __construct(string $nom, string $prenom, string $dateDeNaissance, Nationalite $nationalite, array $clubs, array $debut_saison)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->dateDeNaissance = new DateTime($dateDeNaissance);
            $this->age = date_diff($this->dateDeNaissance, new DateTime())->format('%y');
            $this->nationalites[] = $nationalite;
            foreach ($debut_saison as $key => $value) {
                $this->debut_saison = new DateTime($value);
                print_r($this->debut_saison->format('y') . '<br><br>');
            }
            foreach ($clubs as $club) {
                $this->club = $club;
                $club->joueurs[] = $this;
                var_dump($this);
                print_r('<br><br>');
            }
        }

        public function showClubs(){
                echo "<div class='card' style='width: 18rem;'><div class='card-body'>";
                echo "<h5 class='card-title'>" . $this->prenom . " " . $this->nom . "</h5>";
                foreach ($this->nationalites as $nationalite) {
                        echo "<p class='card-text'>" .  $nationalite->nom . " - " . $this->age . " ans</p>";
                }
                foreach ($this->club as $key => $value ) {
                        echo "<p class='card-text'>" .  $value->nom . " (" .  $this->debut_saison[$key]->format('Y') . ")</p>";
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
         * Get the value of debut_saison
         */ 
        public function getDebut_saison()
        {
                return $this->debut_saison;
        }

        /**
         * Get the value of nationalite
         */ 
        public function getNationalite()
        {
                return $this->nationalites;
        }
    }

?>