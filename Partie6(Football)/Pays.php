<?php

    Class Pays{
        public string $nom;
        public array $clubs;
        public Nationalite $nationalite;

        public function __construct(string $nom, Nationalite $nationalite)
        {
            $this->nom = $nom;
            $this->nationalite = $nationalite;
        }

        public function showClubs(){
            echo "<div class='card' style='width: 18rem;'><div class='card-body'>";
            echo "<h5 class='card-title'>" . $this->nom . "</h5>";
            foreach ($this->clubs as $club) {
                echo "<p class='card-text'>" . $club->nomClub . "</p>";
            }
            echo "</div></div>";
        }
    }

?>