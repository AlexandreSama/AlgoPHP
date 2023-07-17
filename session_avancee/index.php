<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>Ajout Produit</title>
</head>

<body>
    <div class="container text-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Poppy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./recap.php">Récapitulatif</a>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                        <ul class="dropdown-menu text-center">
                            <?php
                            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                                echo "<li><p><strong>Aucun produit !</strong></p></li>";
                            } else {
                                foreach ($_SESSION['products'] as $index => $product) {
                                    echo "<li class='product_basket'><p>" . $product['name'] . " | " . $product['qtt'] . "x</p></li>";
                                }
                            }
                            ?>
                            <li><a class="dropdown-item" href="./recap.php">Voir le récapitulatif</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <?php
        //S'il y a une erreur ou un message de succès, on l'affiche puis on le supprime
        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            echo '<script type="text/javascript"> alert("' . end($_SESSION['errors']) . '");</script>';
            unset($_SESSION['errors'][0]);
        }
        if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
            echo '<script type="text/javascript"> alert("' . end($_SESSION['success']) . '");</script>';
            unset($_SESSION['success'][0]);
        }
        ?>
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Ajouter un produit !</h1>
                <form action="traitement.php" method="post">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1"><strong>Nom du produit</strong></label>
                        <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="Entrez le nom du produit" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1"><strong>Prix du produit</strong></label>
                        <input type="number" class="form-control" id="inputPrice" placeholder="Entrez le prix du produit" step="any" min='1' name="price">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1"><strong>Quantité désirée</strong></label>
                        <input type="number" class="form-control" id="inputQTT" placeholder="Entrez la quantité du produit" value="1" min='1' name="qtt">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Enregistrer le produit</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/eec634434d.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>