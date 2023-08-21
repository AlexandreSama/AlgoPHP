<?php
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 holderCarouselFiveRecent flex-column text-center align-items-center mt-1">
            <h3>Films a l'affiche </h3>
            <div id="carouselFiveRecent" class="carousel slide">
                <div class="carousel-indicators">
                    <?php
                    $i = 0;
                    $j = 1;
                    foreach ($orders1 as $value) {
                        if ($i == 0) {
                            echo '<button type="button" data-bs-target="#carouselFiveRecent" data-bs-slide-to="' . $i . '" class="active" aria-current="true" aria-label="Slide' . $j . '"></button>';
                            $i++;
                            $j++;
                        } else {
                            echo '<button type="button" data-bs-target="#carouselFiveRecent" data-bs-slide-to="' . $i . '" aria-label="Slide' . $j . '"></button>';
                            $i++;
                            $j++;
                        }
                    }
                    ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    $j = 0;
                    foreach ($orders1 as $value) {
                        if ($j == 0) {
                            echo '<div class="carousel-item active">
                                    <img src="' . $url . $value['affiche'] . '" class="d-block w-100 imgCarouselRecent" alt="testasasas">
                                </div>';
                            $j++;
                        } else {
                            echo '<div class="carousel-item">
                                    <img src="' . $url . $value['affiche'] . '" class="d-block w-100 imgCarouselRecent" alt="testasasas">
                                </div>';
                        }
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselFiveRecent" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselFiveRecent" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-12 holderCarouselFiveRecent flex-column text-center align-items-center mt-5">
            <h3>Films les mieux notés </h3>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-indicators">
                    <?php
                    $i = 0;
                    $j = 1;
                    foreach ($orders2 as $value) {
                        if ($i == 0) {
                            echo '<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="' . $i . '" class="active" aria-current="true" aria-label="Slide' . $j . '"></button>';
                            $i++;
                            $j++;
                        } else {
                            echo '<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="' . $i . '" aria-label="Slide' . $j . '"></button>';
                            $i++;
                            $j++;
                        }
                    }
                    ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    $j = 0;
                    foreach ($orders2 as $value) {
                        if ($j == 0) {
                            echo '<div class="carousel-item active">
                                    <img src="' . $url . $value['affiche'] . '" class="d-block w-100 imgCarouselRecent" alt="testasasas">
                                </div>';
                            $j++;
                        } else {
                            echo '<div class="carousel-item">
                                    <img src="' . $url . $value['affiche'] . '" class="d-block w-100 imgCarouselRecent" alt="testasasas">
                                </div>';
                        }
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<?php
$title = "Home Page";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
