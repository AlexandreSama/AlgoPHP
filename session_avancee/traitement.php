<?php
session_start();

function saveProduct(){
    if(isset($_POST['submit'])){
        session_destroy();
        // $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        // $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
    
        // if($name && $price && $qtt){
        //     $product = [
        //         "name" => $name,
        //         "price" => $price,
        //         "qtt" => $qtt,
        //         "total" => $price*$qtt
        //     ];
    
        //     $_SESSION['products'][] = $product;
        // }
    }else{
        throw new Exception("Erreur !");
    }
}

try {
    saveProduct();
} catch (Exception $e) {
    print_r($e);
}

header("location:index.php")

?>