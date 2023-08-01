<?php
require_once 'app/DAO.php';


class FilmController
{
    // function qui permet de récupérer la liste de tout les films ajoutés en BDD
    public function listFilms()
    {
        $dao = new DAO();

        $sql = 'SELECT id_film, titre, date_format(date_sortie, "%Y") year, duree, synopsis, note, affiche 
                FROM film
                ORDER BY date_sortie DESC';

        $films = $dao->executeRequest($sql);
        $orders = $films->fetchAll(PDO::FETCH_ASSOC);
        require 'view/film/listFilms.php';
    }

    public function detailFilm($id)
    {
        $dao = new DAO();

        $sql = 'SELECT id_film, titre, titre, date_format(date_sortie, "%Y") year, duree, synopsis, note, affiche, r.nom AS realNom, r.prenom AS realPrenom,
        a.nom AS actorNom, a.prenom AS actorPrenom
        FROM film f
        LEFT JOIN realisateur r ON r.id_realisateur = f.id_realisateur
        LEFT JOIN casting c ON c.film_id = f.id_film
        LEFT JOIN acteur a ON a.id_acteur = c.acteur_id
        WHERE f.id_film = ' . $id;

        $sql2 = 'SELECT g.libelle AS genreFilm
        FROM genre g
        LEFT JOIN posseder p ON p.genre_id = g.id_genre
        LEFT JOIN film f ON p.film_id = f.id_film
        WHERE f.id_film = ' . $id;

        $param = array('id' => $id);
        $film = $dao->executeRequest($sql, $param);
        $genreFilm = $dao->executeRequest($sql2, $param);
        require 'view/film/detailFilm.php';
    }

    public function showFormView()
    {
        $dao = new DAO();

        $sql = 'SELECT r.nom AS nomReal, r.prenom AS prenomReal, r.id_realisateur AS idReal
        FROM realisateur r, genre g, acteur a';
        $sql2 = 'SELECT a.id_acteur AS idActeur, a.nom AS acteurNom, a.prenom AS acteurPrenom
        FROM acteur a';
        $sql3 = 'SELECT g.id_genre AS genreID, g.libelle AS genreNom
        FROM genre g';
        $data = $dao->executeRequest($sql);
        $data2 = $dao->executeRequest($sql2);
        $data3 = $dao->executeRequest($sql3);
        require 'view/film/addFilm.php';
    }

    public function addFilm()
    {
        $dao = new DAO();

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $dateRaw = strtotime($_POST['date_sortie']);
        $date_sortie = date('y-m-d', $dateRaw);
        $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);
        $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $realisateur = filter_input(INPUT_POST, 'realisateur', FILTER_VALIDATE_INT);

        if ($title && $date_sortie && $duree && $synopsis && $note && $realisateur && isset($_FILES['affiche'])) {

            $uniqueName = uniqid('', true);
            $tmpName = $_FILES['affiche']['tmp_name'];
            //Ce qui donne par exemple : 64dsfb4684df4gd.test.png
            $nameFile = $uniqueName . "." . $_FILES['affiche']['name'];
            move_uploaded_file($tmpName, '././public/uploads/' . $nameFile);

            $sql = "INSERT INTO film (titre, date_sortie, duree, synopsis, note, affiche, id_realisateur) VALUES (:title, :date_sortie, :duree, :synopsis, :note, :namefile, :realisateur_id)";
            $params = array(':title' => $title, ':date_sortie' => $date_sortie, ':duree' => $duree, ':synopsis' => $synopsis, ':note' => $note, ':namefile' => $nameFile, ':realisateur_id' => $realisateur);
            $status = $dao->executeRequest($sql, $params);

            $this->listFilms();
        }
    }

    public function showFormDeleteFilm(){
        $dao = new DAO();

        $sql = 'SELECT f.titre AS titre, f.id_film AS id FROM film f';

        $films = $dao->executeRequest($sql);
        require 'view/film/deleteFilm.php';
    }

    public function deleteFilm(){
        $dao = new DAO();

        $film = filter_input(INPUT_POST, 'film', FILTER_VALIDATE_INT);

        if($film){
            $sql = 'SELECT f.affiche FROM film f WHERE id_film = ' . $film;
            $result = $dao->executeRequest($sql);

            $sql2 = 'DELETE FROM film WHERE id_film = ' . $film;

            foreach ($result as $affiche) {
                unlink('././public/uploads/' . $affiche['affiche']);
            }
            
            $status = $dao->executeRequest($sql2);
            require 'view/film/deleteFilm.php';
        }

    }
}
