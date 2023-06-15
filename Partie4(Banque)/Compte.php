<?php

    Class Compte{
        public string $libelle;
        public int $solde;
        public string $devise;
        public Titulaire $titulaire;

        public function __construct(string $libelle, Titulaire $titulaire)
        {
            $this->libelle = $libelle;
            $this->solde = 0;
            $this->devise = "€";
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
         * Set the value of devise
         *
         * @return  void
         */ 
        public function setDevise($devise)
        {
                $this->devise = $devise;
        }

        /**
         * Get the value of titulaire
         */ 
        public function getTitulaire()
        {
                return $this->titulaire;
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

        public function sendMoney($compteTo, $moneyToSend){
            $compteTo->solde = $compteTo->solde + $moneyToSend;
            echo "Le compte " . $compteTo->libelle . " a reçu " . $moneyToSend . " € du compte " . $this->libelle . "<br>";
            echo "Solde du " . $this->libelle . " " . $this->solde . " €<br>";
            echo "Solde du " . $compteTo->libelle . " " . $compteTo->solde . " €<br><br>";
        }

        public function withDraw($moneyToWithdraw){
            $this->solde = $this->solde - $moneyToWithdraw;
            echo $this->titulaire . " a retiré " . $moneyToWithdraw . " € sur le compte " . $this->libelle . " <br>";
            echo "Nouveau solde du compte : " . $this->solde . " €<br>";
        }

        public function credit($moneyToCredit){
            $this->solde = $this->solde + $moneyToCredit;
            echo $this->titulaire . " a ajouté " . $moneyToCredit . " € sur le compte " . $this->libelle . " <br>";
            echo "Nouveau solde du compte : " . $this->solde . " €<br>";

        }

        public function showInfos(){
            echo "Type de compte : " . $this->libelle . " <br>";
            echo "Solde du compte : " . $this->solde . " €<br>";
            echo "Nom / Prénom du titulaire : " . $this->titulaire->getNom() . " / " . $this->titulaire->getPrenom();
        }
    }

?>