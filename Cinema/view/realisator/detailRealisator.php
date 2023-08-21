<?php
$url = '../../../AlgoPHP/cinema/public/uploads/';
$acteurUsed = $acteur->fetch();
ob_start(); //def : Enclenche la temporisation de sortie
?>

<link rel="stylesheet" href="../../AlgoPHP/cinema/public/css/detailPersonne.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                <img src="https://www.bootdey.com/img/Content/avatar/avatar6.png" alt="...">
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h4 mb-0"><?= $acteurUsed['nom'] . " " . $acteurUsed['prenom'] ?></h3>
                        <span class="text-primary">Acteur</span>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3"><a href="#!"><i class="fa-solid fa-signature display-25 me-3 text-secondary"></i>Nom : <?= $acteurUsed['nom'] ?></a></li>
                        <li class="mb-3"><a href="#!"><i class="fa-solid fa-signature display-25 me-3 text-secondary"></i>Prénom : <?= $acteurUsed['prenom'] ?></a></li>
                        <li class="mb-3"><a href="#!"><i class="fa-solid fa-signature display-25 me-3 text-secondary"></i>Genre : <?= $acteurUsed['sexe'] ?></a></li>
                        <li class="mb-3"><a href="#!"><i class="fa-solid fa-signature display-25 me-3 text-secondary"></i>Date de naissance : <?= $acteurUsed['date_naissance'] ?></a></li>
                    </ul>
                    <?php
                        foreach ($test as $value) {
                            if($value['id_role_staff'] == 1){
                                echo '<ul class="social-icon-style2 ps-0">
                                <li><a href="index.php?action=modifyRealView&id=' . $id . '" class="rounded-3"><i class="fa-solid fa-hammer"></i>Modifier</a></li>
                                </ul>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="h1 mb-0 text-primary">#Ses films</h2>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <?php
                        foreach ($ordersFilms as $value) {
                            echo '<li class="mb-3">' . $value['titre'] . '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$title = "Detail du réalisateur";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
