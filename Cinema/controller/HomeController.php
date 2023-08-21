<?php
require_once 'app/DAO.php';

class HomeController
{
    // function permettant d'afficher les 5 films les plus récents ainsi que les 5 films les mieux notés
    public function homePage()
    {
        $dao = new DAO();

        $sql = 'SELECT id_film, titre, date_format(date_sortie, "%Y") year, duree, synopsis, note, affiche 
                FROM film
                ORDER BY date_sortie DESC
                LIMIT 5';

        $sql2 = 'SELECT id_film, titre, date_format(date_sortie, "%Y") year, duree, synopsis, note, affiche
                FROM film f
                WHERE f.note > (SELECT AVG(f.note) FROM film f)
                LIMIT 5';

        $films = $dao->executeRequest($sql);
        $filmsUpNote = $dao->executeRequest($sql2);
        $orders1 = $films->fetchAll(PDO::FETCH_ASSOC);
        $orders2 = $filmsUpNote->fetchAll(PDO::FETCH_ASSOC);

        $test = $dao->getUser();
        require 'view/home/home.php';
    }
}
