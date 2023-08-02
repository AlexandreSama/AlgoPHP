<?php

require_once "controller/FilmController.php";

require_once "controller/HomeController.php";
require_once "controller/ActorController.php";


// Appel de la function autoload pour charger automatiquement tout les controllers crées
spl_autoload_register(function ($class_name) {
    require_once 'controller/' . $class_name . '.php';
});

// variable declaration

$ctrFilm = new FilmController();
$ctrHome = new HomeController();
$ctrActor = new ActorController();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
            //insert here all the request to generate new page
        case "listFilms":
            $ctrFilm->listFilms();
            break;
        case "detailFilm":
            $id = $_GET['id'];
            $ctrFilm->detailFilm($id);
            break;
        case "showFormView":
            $ctrFilm->showFormView();
            break;
        case 'addFilm':
            $ctrFilm->addFilm();
            break;
        case 'showFormDeleteFilm':
            $ctrFilm->showFormDeleteFilm();
            break;
        case 'deleteFilm':
            $ctrFilm->deleteFilm();
            break;
        case 'detailActor':
            $id = $_GET['id'];
            $ctrActor->detailActor($id);
            break;
    }
} else {
    //Si l'url de contient pas d'action enregistrer, ont fait appel au constructeur homepage, pour afficher la page d'acceuil par défaut
    $ctrHome->homePage();
}

// if(isset($_POST['action'])){
//     switch ($_POST['action']) {
//         case 'addFilm':
//             $ctrFilm->addFilm();
//             break;
//     }
// }