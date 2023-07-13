<?php
session_start();

// var_dump($_POST['submit']);
function saveProduct()
{
    if (isset($_POST['submit'])) {
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt){
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION['products'][] = $product;
        }
    } else {
        throw new Exception("Erreur ! Veuillez enregistrer un produit et ne pas venir sur cet page de vous-même !");
    }
}

function removeProduct(){
    if(isset($_GET['submit'])){
        var_dump($_GET['submit']);
    }
}

try {
    saveProduct();
    removeProduct();
    header("location:recap.php");
} catch (Exception $e) {
    // print_r($e->getMessage());
    $_SESSION['errors'] = $e->getMessage();
    header("location:index.php");
}
