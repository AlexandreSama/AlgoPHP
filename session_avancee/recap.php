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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Poppy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./recap.php">Récapitulatif</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </button>
                    <ul class="dropdown-menu text-center">
                        <?php
                        if (!isset($_SESSION['products'])) {
                            echo "<li><p><strong>Aucun produit !</strong></p></li>";
                        } else {
                            foreach ($_SESSION['products'] as $index => $product) {
                                echo "<li class='product_basket'><a href='/AlgoPHP/session_avancee/images/products/" . $product['file'] . "'>" . $product['name'] . "</a> || " . $product['qtt'] . "</li>";
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
    if (isset($_SESSION['removed']) && !empty($_SESSION['removed'])) {
        echo '<script type="text/javascript"> alert("' . end($_SESSION['removed']) . '");</script>';
        unset($_SESSION['removed'][0]);
    }
    ?>
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Récapitulatif des produits !</h1>
                <?php
                if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                    echo "<p class='no-product'><strong>Aucun produit en session !</strong></p>";
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
                        "<td><a href='/AlgoPHP/session_avancee/images/products/" . $product['file'] . "'>" . $product['name'] . "</a></td>",
                        "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                        "<td class='qtt'> <button type='button' class='removeQTT btn btn-primary ' value='-'>-</button>" . $product['qtt'] . "<button type='button' class='addQTT btn btn-primary' value='+'>+</button></td>",
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
    </div>
</body>
<script src="https://kit.fontawesome.com/eec634434d.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/recap.js"></script>

</html>