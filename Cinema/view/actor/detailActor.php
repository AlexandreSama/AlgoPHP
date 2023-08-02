<?php
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Test</h3>
        </div>
        <div class="col d-flex flex-row">
            <div class="col-6">
                <p>skdfsdkfmds</p>
            </div>
            <div class="col-6">
                <p>sldkfmsdlfk</p>
            </div>
        </div>
    </div>
</div>

<?php
$title = "Detail du réalisateur";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
