<?php

    Class Acteur extends Personne{

        public array $films;
        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            parent::__construct($nom, $prenom, $sexe, $date_naissance);
            $this->films = [];
        }

        /**
         * This function adds a film object to an actor's list of films.
         * 
         * @param Film film The parameter "film" is an instance of the "Film" class, which represents a movie
         * or a film. The "addFilmToActor" function adds this film to an array of films associated with an
         * actor.
         */
        public function addFilmToActor(Film $film){
            $this->films[] = $film;
        }

        /**
         * This function displays a list of films in which a person has acted, along with their ratings.
         */
        public function showFilms(){
            echo "<h3>Films auquel " . $this->prenom . " " . $this->nom . " jouent : </h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->films as $value) {
                echo "<p class='card-text'>" . $value->titre . " / Notes : " . $value->note . "</p>";
            }
            echo " </div></div>";

        }

    }

?>