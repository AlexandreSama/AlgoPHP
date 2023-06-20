<?php

    Class Realisateur extends Personne{

        public array $films;

        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            parent::__construct($nom, $prenom, $sexe, $date_naissance);
        }

        public function addFilmToReal(Film $film){
            $this->films[] = $film;
        }

        public function showFilms(){
            echo "<h3>Films du réalisateur " . $this->prenom . " " . $this->nom . " :</h3>";
            foreach ($this->films as $value) {
                echo $value->titre . "<br>";
            }
        }
    }

?>