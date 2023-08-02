<?php
$filmUsed = $film->fetch();
$real = $realisateur->fetch();
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mainContent">
            <?php
                echo "<div class='col-12 holder'>
                    <img src='" . $url.$filmUsed['affiche'] ."' class='test'>
                </div>";
            ?>
            <div class="col-12 d-flex flex-column">
                <h1 class="centerText"><?= $filmUsed['titre']; ?></h1>
                <div class="col-12 d-flex flex-row">
                    <div class="col-6 text-center text-white">
                        <h3>Les infos : </h3>
                        <p>Genre : 
                            <?php
                                while ($genre = $genreFilm->fetch()) {
                                    echo $genre['genreFilm'] . " , ";
                                }
                            ?>
                        </p>
                        <p>Durée : <?= $filmUsed['duree'] ?>min</p>
                        <p>Date de sortie : <?= $filmUsed['year'] ?></p>
                        <!-- <p>Réalisé par : <?= $real['realPrenom'] . " " . $real['realNom'] ?></p> -->
                        <p>Realisé par : 
                            <?php
                            echo '<a href="index.php?action=detailRealisator&id=' . $real['realID'] . '">' . $real['realPrenom'] . " " . $real['realNom'] . '</a>'
                            ?>
                        </p>
                        <p>Avec : 
                        <?php
                        while($value = $acteurs->fetch()){
                            echo  '<a href="index.php?action=detailActor&id=' . $value['idActeur'] . '">'
                             . $value['acteurPrenom'] . " " . $value['acteurNom'] . '</a>';
                        }
                        ?>
                        </p>
                    </div>
                    <div class="col-6 text-center text-white">
                        <h3>Synopsis : </h3>
                        <?php
                            echo "<p>" . $filmUsed['synopsis'] . "</p>"
                        ?>
                    </div>
                    <button type="button" class="btn btn-danger">
                        <?php
                            echo '<a href="index.php?action=modifyFilmView&id=' . $idFilm . '">Modifier cet acteur !</a>';
                        ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>






<?php
$title = "Detail du film";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
