<?php
// var_dump($films);
// if (isset($status)) {
//     var_dump($status);
// }
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-row">
            <form action="index.php?action=deleteFilm" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="realChoose" class="form-label">Quel film voulez-vous supprimer</label>
                    <select class="form-select" aria-label="Default select example" id="realChoose" name='film'>
                        <?php
                        while ($film = $films->fetch()) {
                            echo '<option value="' . $film['id'] . '">' . $film['titre'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>






<?php
$title = "Supprimer un film";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
