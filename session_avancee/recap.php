<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/recap.css">
    <title>Récapitulatif des produits</title>
</head>

<body>
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle='dropdown' aria-haspopup="true" aria-expanded="false">
            Menu
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="./index.php">Ajout produit</a>
            <?php
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                echo "<p class='dropdown-item disabled '>Aucun produit en session !</p>";
            } else {
                echo "<p class='dropdown-item disabled '>" . count($_SESSION['products']) . " produits !</p>";
            }
            ?>
        </div>
    </div>
    <?php
    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session !</p>";
    } else {
        echo "<table class='table table-striped'>",
        "<thead>",
        "<tr>",
        "<th scope='col'>#</th>",
        "<th scope='col'>Nom</th>",
        "<th scope='col'>Prix</th>",
        "<th scope='col'>Quantité</th>",
        "<th scope='col'>Total</th>",
        "<th scope='col'><input type='checkbox' id='selectProducts' aria-label='Checkbox for following text input'></th>",
        "</tr>",
        "</thead>",
        "<tbody>";
        $totalGeneral  = 0;
        foreach ($_SESSION['products'] as $index => $product) {
            echo "<tr>",
            "<td>" . $index . "</td>",
            "<td>" . $product['name'] . "</td>",
            "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            "<td>" . $product['qtt'] . "</td>",
            "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
            "<td><input type='checkbox' class='Product' aria-label='Checkbox for following text input'></td>",
            "</tr>";
            $totalGeneral += $product['total'];
        }
        echo   "<tr>",
        "<td colspan=4>Total général : </td>",
        "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
        "<td><button type='button' class='btn btn-success'>Success</button>",
        "</tr>",
        "</tbody>",
        "</table>";
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./recap.js"></script>

</html>