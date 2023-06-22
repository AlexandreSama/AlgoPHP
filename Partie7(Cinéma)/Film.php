<?php


    Class Film{
        public string $titre;
        public DateTime $date_sortie;
        public int $duree;
        public float $note;
        public Realisateur $realisateur;
        public array $genre;
        public array $casting;

        public function __construct(string $titre, string $date_sortie, int $duree, float $note, Realisateur $realisateur, array $genres)
        {
            $this->titre = $titre;
            $this->date_sortie = new DateTime($date_sortie);
            $this->duree = $duree;
            $this->note = $note;
            $this->realisateur = $realisateur;
            $realisateur->addFilmToReal($this);
            foreach ($genres as $value) {
                $this->genre[] = $value;
                $value->addFilms($this);
            }
            $this->casting = [];
        }

        /**
         * The function displays the actors and their corresponding characters in a movie.
         */
        public function showActors(){
            echo "<h3>Acteurs du film " . $this->titre . " :</h3>";
            echo "<div class='card' style='width: 24rem;'>";
            echo "<div class='card-body'>";
            foreach ($this->casting as $key => $value) {
                echo "Personnage : <br>";
                echo "<p class='card-text'>" . $value . '</p>';
                echo "Acteur : <br>";
                echo "<p class='card-text'>" . $key . '</p>';
            }
            echo " </div></div>";
        }

    }

?>