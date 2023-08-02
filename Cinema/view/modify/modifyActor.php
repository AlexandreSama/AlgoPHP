<?php
$url = '../../../AlgoPHP/cinema/public/uploads/';
ob_start(); //def : Enclenche la temporisation de sortie
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h3>Modification d'un acteur</h3>
        </div>
        <div class="col-12 d-flex flex-column align-items-center">
            <form action="index.php?action=modifyActor" method="POST" enctype="multipart/form-data" class="formModify">
                <input type='text' name='idActeur' style="display: none;" value='<?php echo $idActeur?>'></input>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputEmail1" class="form-label">Nom de l'acteur</label>
                    <?php
                    foreach ($orders as $value) {
                        echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom" value="' . $value['nom'] .'" required>';
                    }
                    ?>
                </div>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputPassword1" class="form-label">Prénom de l'acteur</label>
                    <?php
                    foreach ($orders as $value) {
                        echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="prenom" value="' . $value['prenom'] .'" required>';
                    }
                    ?>
                </div>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputPassword1" class="form-label">Genre de l'acteur</label>
                    <?php
                    foreach ($orders as $value) {
                        echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="sexe" value="' . $value['sexe'] .'" required>';
                    }
                    ?>
                </div>
                <div class="mb-3 holderInputModify">
                    <label for="exampleInputPassword1" class="form-label">Date de naissance de l'acteur</label>
                    <?php
                    foreach ($orders as $value) {
                        echo '<input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_naissance" value="' . $value['date_naissance'] .'" required>';
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<script>

</script>
<?php
$title = "Modifier un acteur";
$content = ob_get_clean(); //def : Exécute successivement ob_get_contents() et ob_end_clean(). Lit le contenu courant du tampon de sortie puis l'efface
require "view/template.php";
