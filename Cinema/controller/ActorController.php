<?php
require_once 'app/DAO.php';


class ActorController
{

    public function detailActor($id){

        $dao = new DAO();

        $sqlActeur = 'SELECT * 
                FROM personne p
                INNER JOIN acteur a ON a.id_personne = p.id_personne
                WHERE a.id_acteur = :id';
        
        $sqlFilms = 'SELECT *, r.nom
                    FROM film f
                    INNER JOIN casting c ON f.id_film = c.id_film
                    INNER JOIN role r ON r.id_role = c.id_role
                    WHERE c.id_acteur = :id';

        $param = array(':id' => $id);

        $acteur = $dao->executeRequest($sqlActeur, $param);
        $films = $dao->executeRequest($sqlFilms, $param);
        $ordersFilms = $films->fetchAll(PDO::FETCH_ASSOC);
        $idActeur = $id;
        
        require 'view/actor/detailActor.php';
    }

    public function detailRealisator($id){

        $dao = new DAO();

        $sqlActeur = 'SELECT * 
                FROM personne p
                INNER JOIN realisateur r ON r.id_personne = p.id_personne
                WHERE r.id_realisateur = :id';
        
        $sqlFilms = 'SELECT *
                    FROM film f
                    WHERE f.id_realisateur = :id';

        $param = array(':id' => $id);

        $acteur = $dao->executeRequest($sqlActeur, $param);
        $films = $dao->executeRequest($sqlFilms, $param);
        $ordersFilms = $films->fetchAll(PDO::FETCH_ASSOC);
        
        require 'view/realisator/detailRealisator.php';
    }
}