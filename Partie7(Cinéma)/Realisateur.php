<?php

    Class Realisateur extends Personne{

        public array $films;

        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            parent::__construct($nom, $prenom, $sexe, $date_naissance);
        }

        /**
         * This function adds a Film object to an array of films in a Real object.
         * 
         * @param Film film The parameter "film" is an object of the class "Film". The function "addFilmToReal"
         * adds this object to an array called "films" which is a property of the current object.
         */
        public function addFilmToReal(Film $film){
            $this->films[] = $film;
        }

        /**
         * The function displays the films of a director with their titles and ratings.
         */
        public function showFilms(){
            echo "<h3>Films du réalisateur " . $this->prenom . " " . $this->nom . " :</h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->films as $value) {
                echo "<p class='card-text'>" . $value->titre . " / Note : " . $value->note . "</p>";
            }
            echo " </div></div>";
        }
    }
