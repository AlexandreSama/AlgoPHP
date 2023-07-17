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
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Récapitulatif des produits !</h1>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle='dropdown' aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="./index.php">Ajout produit</a>
                        <?php
                        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                            echo "<p class='dropdown-item disabled'>Aucun produit en session !</p>";
                        } else {
                            echo "<p class='dropdown-item disabled'>" . count($_SESSION['products']) . " produits !</p>";
                        }
                        ?>
                    </div>
                </div>
                <?php
                if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                    echo "<p><strong>Aucun produit en session !</strong></p>";
                } else {
                    echo "<form action='recapTraitement.php' method='get'>",
                    "<table class='table table-striped'>",
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
                        "<td class='qtt'> <button type='button' class='removeQTT' value='-'>-</button>" . $product['qtt'] . "<button type='button' class='addQTT' value='+'>+</button></td>",
                        "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                        "<td><input type='checkbox' class='Product' aria-label='Checkbox for following text input' name='product[]' value='" . $index . "'></td>",
                        "</tr>";
                        $totalGeneral += $product['total'];
                    }
                    echo   "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
                    "<td><button type='submit' class='btn btn-danger'>Supprimer le(s) produit(s)</button>",
                    "</tr>",
                    "</tbody>",
                    "</table>",
                    "</form>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/recap.js"></script>

</html>