<?php

    session_start();

    function removeProduct(){
        $products = $_GET['product'];

        if(count($products) == 1 ){

            foreach ($products as $product) {
                unset($_SESSION['products'][$product]);
            }
            $_SESSION['removed'][] = 'Le produit a bien été supprimé !';

        }else if (count($products) >= 2){

            foreach ($products as $product) {
                unset($_SESSION['products'][$product]);
            }

            $_SESSION['removed'][] = 'Les produits ont bien été supprimé ! ';
        }
    }

    if(isset($_GET['product'])){

        removeProduct();
        header("location:recap.php");

    }else{

        header("location:recap.php");

    }

    if (isset($_POST['action'])) {

        switch ($_POST['action']) {

            case '+':
                $_SESSION['products'][$_POST['index']]['qtt'] = $_SESSION['products'][$_POST['index']]['qtt'] + 1;
                $_SESSION['products'][$_POST['index']]['total'] = $_SESSION['products'][$_POST['index']]['total'] + $_SESSION['products'][$_POST['index']]['price'];
                break;

            case '-':
                if($_SESSION['products'][$_POST['index']]['qtt'] - 1 !== 0){
                    $_SESSION['products'][$_POST['index']]['qtt'] = $_SESSION['products'][$_POST['index']]['qtt'] - 1;
                    $_SESSION['products'][$_POST['index']]['total'] = $_SESSION['products'][$_POST['index']]['total'] - $_SESSION['products'][$_POST['index']]['price'];
                }
                break;

        }

    }