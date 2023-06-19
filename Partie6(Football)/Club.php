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
                foreach ($this->joueurs as $value) {
                    print_r($value->club->nom . "<br>");
                    print_r($this->nom . "<br>");
                    if($value->club->nom == $this->nom){
                        echo "<p class='card-text'>" .  $value->prenom . " " . $value->nom . " (" . $value->debut_saison[0]->format('Y') . ") </p>";
                    }
                }
            }
            echo "</div></div>";
        }
    }

?>