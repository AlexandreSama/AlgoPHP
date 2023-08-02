<?php
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Modification d'un réalisateur</h3>
        </div>
        <div class="col-12 justify-content-center d-flex">
        <select class="form-select selectReal" aria-label="Default select example">
            <option selected>Quel film voulez-vous modifier</option>
        </select>
        </div>
    </div>
</div>

<?php
$title = "Modifier un réalisateur";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
