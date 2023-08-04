<?php
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Modification d'un film</h3>
        </div>
        <div class="col-12 justify-content-center d-flex flex-column align-items-center">
            <form action="index.php?action=modifyFilm" method="POST" enctype="multipart/form-data" class="formModify">
                <input type='text' name='idFilm' style="display: none;" value='<?php echo $idFilm ?>'></input>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputEmail1" class="form-label">Titre du film</label>
                    <?php
                    foreach ($orders1 as $value) {
                        echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="titre" value="' . $value['titre'] . '" required>';
                    }
                    ?>
                </div>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputPassword1" class="form-label">Date de sortie du film</label>
                    <?php
                    foreach ($orders1 as $value) {
                        echo '<input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_sortie" value="' . $value['date_sortie'] . '" required>';
                    }
                    ?>
                </div>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputPassword1" class="form-label">Durée du film</label>
                    <?php
                    foreach ($orders1 as $value) {
                        echo '<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="duree" value="' . $value['duree'] . '" required>';
                    }
                    ?>
                </div>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputPassword1" class="form-label">Synopsis du film</label>
                    <?php
                    foreach ($orders1 as $value) {
                        echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="synopsis" value="' . $value['synopsis'] . '" required>';
                    }
                    ?>
                </div>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputPassword1" class="form-label">Note du film</label>
                    <?php
                    foreach ($orders1 as $value) {
                        echo '<input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="note" value="' . $value['note'] . '" required>';
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
$title = "Modifier un film";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
