<?php

    Class Club{
        public string $nomClub;
        public DateTime $date_creation;
        public Pays $pays;
        public array $joueurs;

        public function __construct(string $nomClub , string $date_creation, Pays $pays)
        {
            $this->nomClub = $nomClub;
            $this->date_creation = new DateTime($date_creation);
            $this->pays = $pays;
            $this->pays->clubs[] = $this;
        }

        public function showJoueurs(){
            echo "<div class='card' style='width: 18rem;'><div class='card-body'>";
            echo "<h5 class='card-title'>" . $this->nomClub . "</h5>";
            echo "<p class='card-text'>" . $this->pays->nom . " - " . $this->date_creation->format('Y') .  "</p>";
            if(isset($this->joueurs)){
                // $i = 0; 
                foreach ($this->joueurs as $value) {
                    // var_dump($value);
                    echo "<p class='card-text'>" .  $value->prenom . " " . $value->nom . " (" . $value->debut_saison->format('Y') . ") </p>";
                }
                echo "</div></div>";
            }else{
                echo "<p class='card-text'>Aucun joueurs !</p>";
                echo "</div></div>";
            }
        }

        public function addJoueur(Joueur $joueur, string $debut_saison){
            $newJoueur = new Joueur($joueur->nom, $joueur->prenom, $joueur->dateDeNaissance->format('d-m-Y'), $joueur->nationalites[0]);
            $newJoueur->setDebut_saison($debut_saison);
            $this->joueurs[] = $newJoueur;
            $joueur->clubs[] = $this;
        }

        public function getDebut_Saison(string $nomJoueur){
            $result = "";
            foreach ($this->joueurs as $value) {
                if($value->nom == $nomJoueur){
                    $result= $value->debut_saison;
                }
            }
            return $result;
        }
    }


?>