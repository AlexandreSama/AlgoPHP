<?php


    Class Role{
        public string $nom_personnage;

        public function __construct(string $nom_personnage, Film $film, Acteur $acteur)
        {
            $this->nom_personnage = $nom_personnage;
            $acteur->addFilmToActor($film);
            $film->casting += [$acteur->prenom . " " . $acteur->nom => $nom_personnage];
        }
    }

?>