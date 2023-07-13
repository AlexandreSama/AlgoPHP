<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">.
    <link rel="stylesheet" href="./css/index.css">
    <title>Ajout Produit</title>
</head>

<body>
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle='dropdown' aria-haspopup="true" aria-expanded="false">
            Menu
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="./recap.php">Récapitulatif</a>
            <?php
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                echo "<p class='dropdown-item disabled '>Aucun produit en session !</p>";
            } else {
                echo "<p class='dropdown-item disabled '>" . count($_SESSION['products']) . " produits !</p>";
            }
            ?>
        </div>
    </div>
    <form action="traitement.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Nom du produit</label>
            <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="Entrez le nom du produit" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Prix du produit</label>
            <input type="number" class="form-control" id="inputPrice" placeholder="Entrez le prix du produit" step="any" name="price">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Quantité désirée</label>
            <input type="number" class="form-control" id="inputQTT" placeholder="Entrez la quantité du produit" value="1" name="qtt">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>