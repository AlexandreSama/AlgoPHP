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

        $sqlFilm = 'SELECT id_film, titre, titre, date_format(date_sortie, "%Y") year, duree, synopsis, note, affiche
        FROM film f
        WHERE f.id_film = ' . $id;

        $sqlActeurs = 'SELECT a.id_acteur AS idActeur, p.nom AS acteurNom, p.prenom AS acteurPrenom
        FROM film f
        INNER JOIN casting c ON c.id_film = f.id_film
        INNER JOIN acteur a ON a.id_acteur = c.id_acteur
        INNER JOIN personne p ON p.id_personne = a.id_personne
        WHERE f.id_film = ' . $id;

        $sqlReal = 'SELECT r.id_realisateur AS realID, p.nom AS realNom, p.prenom AS realPrenom
        FROM film f
        INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
        INNER JOIN personne p ON p.id_personne = r.id_personne
        WHERE f.id_film = ' . $id;

        $sqlGenre = 'SELECT g.libelle AS genreFilm
        FROM genre g
        LEFT JOIN posseder p ON p.genre_id = g.id_genre
        LEFT JOIN film f ON p.film_id = f.id_film
        WHERE f.id_film = ' . $id;

        $param = array('id' => $id);

        $film = $dao->executeRequest($sqlFilm, $param);
        $acteurs = $dao->executeRequest($sqlActeurs, $param);
        $realisateur = $dao->executeRequest($sqlReal, $param);
        $genreFilm = $dao->executeRequest($sqlGenre, $param);
        $idFilm = $id;
        
        require 'view/film/detailFilm.php';
    }

    public function showFormView()
    {
        $dao = new DAO();

        $sql = 'SELECT p.nom AS nomReal, p.prenom AS prenomReal, r.id_realisateur AS idReal
        FROM realisateur r
        LEFT JOIN personne p ON p.id_personne = r.id_personne';

        $sql2 = 'SELECT a.id_acteur AS idActeur, p.nom AS acteurNom, p.prenom AS acteurPrenom
        FROM acteur a
        LEFT JOIN personne p ON p.id_personne = a.id_personne';

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

    public function modifyFilmView($id){

        $dao = new DAO();

        $sql = 'SELECT f.id_film, titre, date_sortie, duree, synopsis, note, r.id_realisateur, p.nom, p.prenom
                FROM film f
                INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
                INNER JOIN personne p ON p.id_personne = r.id_personne
                WHERE f.id_film = ' . $id;

        $sql2 = 'SELECT p.nom, p.prenom, p.id_personne
                FROM personne p
                INNER JOIN realisateur r ON r.id_personne = p.id_personne';

        $film = $dao->executeRequest($sql);
        $orders1 = $film->fetchAll(PDO::FETCH_ASSOC);
        $realisateurs = $dao->executeRequest($sql2);
        $orders2 = $realisateurs->fetchAll(PDO::FETCH_ASSOC);
        $idFilm = $id;

        require 'view/modify/modifyFilm.php';
    }

    public function modifyFilm(){

        $dao = new DAO();

        $id = filter_input(INPUT_POST, "idFilm", FILTER_VALIDATE_INT);
        $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);
        $realisateur = filter_input(INPUT_POST, "realisateur", FILTER_VALIDATE_INT);
        $dateRaw = strtotime($_POST['date_sortie']);
        $date_sortie = date('Y-m-d', $dateRaw);
        
        var_dump($realisateur);
        // $sql = "UPDATE film SET titre = :titre, synopsis = :synopsis, note = :note, duree = :duree, id_realisateur = :id_realisateur WHERE id_film = " . $id;

        // $params = array(':titre' => $titre, ':synopsis' => $synopsis, ':note' => $note, ':duree' => $duree, ':id_realisateur' => $realisateur);

        // var_dump($params);
        // $test = $dao->executeRequest($sql, $params);
        // var_dump($test);
        // $this->detailFilm($id);
    }
}
