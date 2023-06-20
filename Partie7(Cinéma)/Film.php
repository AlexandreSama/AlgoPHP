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

        // public function addGenre(Genre $genre){
        //     $this->genre[] = $genre;
        //     $genre->addFilms($this);
        // }

        public function addCasting(Role $role){
            $this->casting[] = $role;
        }

        public function showActors(){
            echo "<h3>Acteurs du film " . $this->titre . " :</h3>";
            foreach ($this->casting as $value) {
                // var_dump($value);
                echo "Personnage : <br>";
                echo $value->nom_personnage . '<br>';
                echo "Acteur : <br>";
                echo $value->acteur->prenom . " " . $value->acteur->nom . '<br><br>';

            }
        }

    }

?>