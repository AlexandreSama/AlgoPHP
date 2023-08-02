<?php
require_once 'app/DAO.php';

class ModifyController
{

    public function modifyActorView($id){

        $dao = new DAO();

        $sql = 'SELECT p.id_personne AS idPersonne, nom, prenom, sexe, date_naissance
                FROM personne p
                INNER JOIN acteur a ON p.id_personne = a.id_personne
                WHERE a.id_acteur = ' . $id;

        $acteur = $dao->executeRequest($sql);
        $orders = $acteur->fetchAll(PDO::FETCH_ASSOC);

        $idActeur = $id;
        // var_dump($acteur);
        require 'view/modify/modifyActor.php';
    }

    public function modifyActor(){

        $dao = new DAO();

        $id = filter_input(INPUT_POST, "idActeur", FILTER_VALIDATE_INT);
        $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $genre = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $dateRaw = strtotime($_POST['date_naissance']);
        $date_naissance = date('Y-m-d', $dateRaw);
        
        $sql = "UPDATE personne p
                SET nom = '" . $nom . "', prenom = '" . $prenom . "', sexe = '" . $genre . "', date_naissance = '" . $date_naissance . "'
                WHERE p.id_personne = " . $id;

        $test = $dao->executeRequest($sql);
        $this->modifyActorView($id);
    }

    public function modifyRealView(){

        $dao = new DAO();

        $sql = 'SELECT p.id_personne, nom, prenom
                FROM personne p
                INNER JOIN realisateur r ON p.id_personne = r.id_personne';

        $realisateurs = $dao->executeRequest($sql);

        require 'view/modify/modifyReal.php';
    }
}