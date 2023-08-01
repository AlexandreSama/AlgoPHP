<?php
require_once 'app/DAO.php';

class HomeController
{
    // function permettant d'afficher les 5 films les plus récents ainsi que les 5 films les mieux notés
    public function homePage()
    {
        $dao = new DAO();

        $sql = "SELECT id_film, titre, DATE_FORMAT(date_sortie, '%Y') date_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') duree, note, affiche 
        FROM film
        ORDER BY date_sortie DESC
        LIMIT 5";

        $sql2 = "SELECT id_film, titre, DATE_FORMAT(date_sortie, '%Y') date_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') duree, note, affiche
        FROM film
        ORDER BY note DESC
        LIMIT 5";

        $films = $dao->executeRequest($sql);
        $notes = $dao->executeRequest($sql2);
        require 'view/home/home.php';
    }
}
