<?php
// $film = $films->fetch();
// var_dump($film);
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <?php
        $i = 1;
        foreach ($orders as $val) {
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>';
            $i++;
        }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        $j = 0;
        foreach ($orders as $value) {
            if ($j == 0) {
                echo '<div class="carousel-item active">
                <img src="' . $url . $value['affiche'] . '" class="d-block w-100" alt="testasasas">
                </div>';
                $j++;
            } else {
                echo '<div class="carousel-item">
                <img src="' . $url . $value['affiche'] . '" class="d-block w-100" alt="testasasas">
            </div>';
            }
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php
$title = "List of Films";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
