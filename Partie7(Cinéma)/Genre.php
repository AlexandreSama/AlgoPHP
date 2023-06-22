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
            echo "<h3>Acteurs ayant joué le role de $role : </h3>";
            foreach ($this->films as $value) {
                foreach ($value->casting as $key => $value) {
                    echo "Acteur : <br>";
                    echo $key . '<br><br>';
                }
            }
        }
    }

?>