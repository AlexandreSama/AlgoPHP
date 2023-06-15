<?php

    Class Compte{
        public string $libelle;
        public int $solde;
        public string $devise;
        public Titulaire $titulaire;

        public function __construct(string $libelle, string $devise, Titulaire $titulaire)
        {
            $this->libelle = $libelle;
            $this->solde = 0;
            $this->devise = $devise;
            $this->titulaire = $titulaire;
        }

        /**
         * Set the value of libelle
         *
         * @return  void
         */ 
        public function setLibelle($libelle)
        {
                $this->libelle = $libelle;
        }

        /**
         * Set the value of titulaire
         *
         * @return  void
         */ 
        public function setTitulaire($titulaire)
        {
                $this->titulaire = $titulaire;
        }

        /**
         * Set the value of devise
         *
         * @return  void
         */ 
        public function setDevise($devise)
        {
                $this->devise = $devise;
        }

        /**
         * Get the value of libelle
         */ 
        public function getLibelle()
        {
                return $this->libelle;
        }

        /**
         * Get the value of solde
         */ 
        public function getSolde()
        {
                return $this->solde;
        }

        /**
         * Get the value of devise
         */ 
        public function getDevise()
        {
                return $this->devise;
        }

        /**
         * Get the value of titulaire
         */ 
        public function getTitulaire()
        {
                return $this->titulaire;
        }

        /**
         * Send money from a account to another
         *
         * @return  void
         */ 
        public function sendMoney($compteTo, $moneyToSend){
            $compteTo->solde = $compteTo->solde + $moneyToSend;
            echo "Le compte " . $compteTo->libelle . " a reçu " . $moneyToSend . " € du compte " . $this->libelle . "<br>";
            echo "Solde du " . $this->libelle . " " . $this->solde . " " . $this->devise . " <br>";
            echo "Solde du " . $compteTo->libelle . " " . $compteTo->solde . " " . $compteTo->devise . " <br><br>";
        }

        /**
         * Withdraw money from a account
         *
         * @return  void
         */ 
        public function withDraw($moneyToWithdraw){
            $this->solde = $this->solde - $moneyToWithdraw;
            echo $this->titulaire . " a retiré " . $moneyToWithdraw . " " . $this->devise . " sur le compte " . $this->libelle . " <br>";
            echo "Nouveau solde du compte : " . $this->solde . " " . $this->devise . "<br>";
        }
        /**
         * Credit money to an account
         *
         * @return  void
         */ 
        public function credit($moneyToCredit){
            $this->solde = $this->solde + $moneyToCredit;
            echo $this->titulaire . " a ajouté " . $moneyToCredit . " " . $this->devise . " sur le compte " . $this->libelle . " <br>";
            echo "Nouveau solde du compte : " . $this->solde . " " . $this->devise . "<br>";

        }
        /**
         * Show informations from an account
         *
         * @return  void
         */ 
        public function showInfos(){
            echo "Type de compte : " . $this->libelle . " <br>";
            echo "Solde du compte : " . $this->solde . " " . $this->devise . "<br>";
            echo "Nom / Prénom du titulaire : " . $this->titulaire->getNom() . " / " . $this->titulaire->getPrenom();
        }

        public function __toString(){
            return $this->getLibelle().' '. $this->getSolde().' '.$this->getDevise();
        }
    }

?>