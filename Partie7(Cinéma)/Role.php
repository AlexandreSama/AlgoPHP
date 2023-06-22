<?php


    Class Role{
        public string $nom_personnage;
        public Acteur $acteur;
        public Film $film;

        public function __construct(string $nom_personnage, Film $film, Acteur $acteur)
        {
            $this->nom_personnage = $nom_personnage;
            $this->film = $film;
            $this->acteur = $acteur;
            $acteur->addFilmToActor($this->film);
            $this->film->casting += [$acteur->prenom . " " . $acteur->nom => $nom_personnage];
        }
    }

?>