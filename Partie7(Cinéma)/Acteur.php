<?php

    Class Acteur extends Personne{

        public array $films;
        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            parent::__construct($nom, $prenom, $sexe, $date_naissance);
            $this->films = [];
        }

        public function addFilmToActor(Film $film){
            $this->films[] = $film;
        }

        public function showFilms(){
            echo "<h3>Films auquel " . $this->prenom . " " . $this->nom . " jouent : </h3>";
            foreach ($this->films as $value) {
                echo $value->titre . " / Notes : " . $value->note . "<br>";
            }
        }

    }

?>