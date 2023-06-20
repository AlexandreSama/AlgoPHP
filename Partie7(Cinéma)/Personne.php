<?php

    Class Personne{
        public string $nom;
        public string $prenom;
        public bool $sexe;
        public DateTime $date_naissance;

        public function __construct(string $nom, string $prenom, bool $sexe, string $date_naissance)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->sexe = $sexe;
            $this->date_naissance = new DateTime($date_naissance);
        }
    }

?>