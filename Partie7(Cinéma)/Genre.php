<?php

    Class Genre{
        public string $nom;
        public array $films;

        public function __construct(string $nom)
        {
            $this->nom = $nom;
            $this->films = [];
        }

        /**
         * This function adds a Film object to an array of films.
         * 
         * @param Film film The parameter `` is an instance of the `Film` class. The `addFilms` function
         * adds this instance to an array of films called ``.
         */
        public function addFilms(Film $film){
            $this->films[] = $film;
        }

        /**
         * This function displays a list of films by genre with their titles and ratings.
         */
        public function showFilmsByGenre(){
            echo "<h3>Films dans le genre " . $this->nom . " : </h3>";
            foreach ($this->films as $value) {
                echo $value->titre . " / Notes : " . $value->note . "<br>";
            }
        }

        /**
         * The function displays actors who have played a specific role in a list of films.
         * 
         * @param string role A string representing the role for which we want to find actors who have played
         * that role.
         */
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