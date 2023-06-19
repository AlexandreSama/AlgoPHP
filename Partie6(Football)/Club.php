<?php

    Class Club{
        public string $nom;
        public DateTime $date_creation;
        public array $joueurs;
        public Pays $pays;

        public function __construct(string $nom, string $date_creation, Pays $pays)
        {
            $this->nom = $nom;
            $this->date_creation = new DateTime($date_creation);
            $this->pays = $pays;
            $this->pays->clubs[] = $this;
            $this->joueurs = [];
        }

        public function showJoueurs(){
            echo "<div class='card' style='width: 18rem;'><div class='card-body'>";
            echo "<h5 class='card-title'>" . $this->nom . "</h5>";
            echo "<p class='card-text'>" . $this->pays->nom . " - " . $this->date_creation->format('Y') .  "</p>";
            if(count($this->joueurs) == 0){
                echo "<p class='card-text'>Aucun joueurs !</p>";
                echo "</div></div>";
            }else{
                $test = "";
                foreach ($this->joueurs as $key => $value) {
                    foreach ($value->debut_saison as $saison) {
                        $test = $saison->format('Y');
                    }
                    echo "<p class='card-text'>" .  $value->prenom . " " . $value->nom . " (" . $test . ") </p>";
                }
            }
            echo "</div></div>";
        }
    }

?>