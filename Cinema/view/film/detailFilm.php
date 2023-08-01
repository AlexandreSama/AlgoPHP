<?php
$filmUsed = $film->fetch();
$url = '../../../cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mainContent">
            <?php
                echo "<div class='col-12 holder'style='background-image:url(" . $url.$filmUsed['affiche'] ."); background-attachment: fixed;'></div>";
            ?>
            <div class="col-12 d-flex flex-column">
                <h1 class="centerText"><?= $filmUsed['titre_film']; ?></h1>
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
                        <p>Durée : <?= $filmUsed['duree_min'] ?>min</p>
                        <p>Date de sortie : <?= $filmUsed['year'] ?></p>
                        <p>Réalisé par : <?= $filmUsed['realPrenom'] . " " . $filmUsed['realNom'] ?></p>
                        <p>Avec : 
                        <?php
                        echo  $filmUsed['actorPrenom'] . " " . $filmUsed['actorNom'] . ", ";
                        while ($info = $film->fetch()) {
                            echo  $info['actorPrenom'] . " " . $info['actorNom'];
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
                </div>
            </div>
        </div>
    </div>
</div>






<?php
$title = "Detail du film";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
