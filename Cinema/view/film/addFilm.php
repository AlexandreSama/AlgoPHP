<?php
// var_dump($films);
$url = '../../../cinema/public/images/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-row">
            <form action="index.php?action=addFilm" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre du film</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='title'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">date de sortie du film</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name='date_sortie'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Duréer du film (en minutes)</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name='duree'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Synopsis du film</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name='synopsis'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Note du film</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name='note'>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Affiche du film</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name='affiche'>
                </div>
                <div class="mb-3">
                    <label for="realChoose" class="form-label">Réalisateur du film : </label>
                    <select class="form-select" aria-label="Default select example" id="realChoose" name='realisateur'>
                        <?php 
                            while($realisateur = $realisateurs->fetch()){
                                echo '<option value="'. $realisateur['id'] .'">'. $realisateur['prenom'] . " " . $realisateur['nom'] .'</option>';
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
$title = "List of Films";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
