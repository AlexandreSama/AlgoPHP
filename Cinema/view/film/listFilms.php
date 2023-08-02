<?php
// $film = $films->fetch();
// var_dump($film);
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container-fluid mt-5">
    <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
        <?php
        foreach ($orders as $value) {
            echo '<div class="col holderFilmCard">
                <div class="card filmCard">
                <a href="index.php?action=detailFilm&id=' . $value['id_film'] . '" class="linkDetail"><img src="' . $url . $value['affiche'] .'" class="card-img-top" alt="' . $value['titre'] . '"></img></a>
                    <div class="card-body">
                        <h5 class="card-title">' . $value['titre'] . '</h5>
                        <p class="card-text">' . $value['synopsis'] . '</p>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>

<?php
$title = "List of Films";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
