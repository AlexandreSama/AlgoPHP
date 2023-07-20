<?php

    session_start();

    /**
     * The function removes one or multiple products from the session and adds a message to the 'removed'
     * session variable.
     * 
     * @param $products an array of product IDs that need to be removed from the session.
     */
    function removeProduct($products){

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

        removeProduct($_GET['product']);
        header("location:recap.php");

    }else{

        header("location:recap.php");

    }

    /* This code block is checking if the `['action']` variable is set. If it is set, it performs
    different actions based on the value of `['action']`. */
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
