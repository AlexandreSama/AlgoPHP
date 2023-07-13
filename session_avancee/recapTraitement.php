<?php

    session_start();

    if(isset($_GET['product'])){
        var_dump('tesdt');
        removeProduct();
        header("location:recap.php");
    }

    function removeProduct(){
        // if(isset($_GET['submit'])){
        //     print_r($_GET['submit']);
        // }
        $products = $_GET['product'];

        foreach ($products as $product) {
            unset($_SESSION['products'][$product]);
        }
    }

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case '+':
                insert();
                break;
            case '-':
                select();
                break;
        }
    }

    function select() {
        $_SESSION['products'][$_POST['index']]['qtt'] = $_SESSION['products'][$_POST['index']]['qtt'] - 1;
        exit;
    }

    function insert() {
        $_SESSION['products'][$_POST['index']]['qtt'] = $_SESSION['products'][$_POST['index']]['qtt'] + 1;
        exit;
    }
?>