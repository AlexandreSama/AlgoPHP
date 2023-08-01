<?php
// var_dump($films);
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-row">
            <?php
            while ($film = $films->fetch()) { ?>
                <div class="card" style="width: 20rem; height: 30rem;">
                    <img src="<?= $url . $film['affiche']; ?>" class="card-img-top" alt="..." style="height: 55%;">
                    <div class="card-body" style="height: 45%;">
                        <h5 class="card-title"><?= $film["titre_film"]; ?></h5>
                        <p class="card-text" style="height: 45%; overflow: scroll;"><?= $film['synopsis'] ?></p>
                        <a href="index.php?action=detailFilm&id=<?= $film['id_film'] ?>" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>
<!-- <h1>Lists of films <span class="uk-badge"><?= $films->rowCount() ?></span></h1> -->






<?php
$title = "List of Films";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
