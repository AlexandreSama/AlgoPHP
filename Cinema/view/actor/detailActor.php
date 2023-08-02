<?php
$url = '../../../AlgoPHP/cinema/public/uploads/';
$acteurUsed = $acteur->fetch();
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h3><?= $acteurUsed['nom'] . " " . $acteurUsed['prenom'] ?></h3>
        </div>
        <div class="col d-flex flex-row text-center">
            <div class="col-6">
                <p>Nom : <?= $acteurUsed['nom'] ?></p>
                <p>Prénom : <?= $acteurUsed['prenom'] ?></p>
                <p>Genre : <?= $acteurUsed['sexe'] ?></p>
                <p>Date de naissance : <?= $acteurUsed['date_naissance'] ?></p>
            </div>
            <div class="col-5">
                <p>Filmographie : </p>
                <ul>
                    <?php
                    foreach ($ordersFilms as $value) {
                        echo '<p>' . $value['titre'] .' <br><span>Dans le rôle de : ' . $value['nom'] .'</span></p>';
                    }
                    ?>
                </ul>
            </div>
            <div class="col-6">
                    <button type="button" class="btn btn-danger">
                        <?php
                            echo '<a href="index.php?action=modifyActorView&id=' . $id . '">Modifier cet acteur !</a>';
                        ?>
                    </button>
            </div>
        </div>
    </div>
</div>

<?php
$title = "Detail de l'acteur";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
