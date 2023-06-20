<?php

    Class Genre{
        public string $nom;
        public array $films;

        public function __construct(string $nom)
        {
            $this->nom = $nom;
            $this->films = [];
        }

        public function addFilms(Film $film){
            $this->films[] = $film;
        }

        public function showFilmsByGenre(){
            echo "<h3>Films dans le genre " . $this->nom . " : </h3><br>";
            foreach ($this->films as $value) {
                echo $value->titre . " / Notes : " . $value->note . "<br>";
            }
        }

        public function showActorsWithSameRole(string $role){
            echo "<h3>Acteurs ayant joué le role de $role : </h3><br>";
            foreach ($this->films as $key => $value) {
                // print_r($value->casting[0]);
                if($value->casting[0]->nom_personnage == $role){
                    echo $value->casting[0]->acteur->prenom . " " . $value->casting[0]->acteur->nom . "<br>"; 
                }
            }
        }
    }

?>