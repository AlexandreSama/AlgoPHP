<?php
session_start();

/**
 * The function `saveProduct()` saves a product with its name, price, quantity, and image file to a
 * session variable.
 */
function saveProduct()
{
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if ($name && $price && $qtt && isset($_FILES['file'])) {
        //On créer un identifiant unique pour chaque fichier
        $uniqueName = uniqid('', true);
        $tmpName = $_FILES['file']['tmp_name'];
        //Ce qui donne par exemple : 64dsfb4684df4gd.test.png
        $nameFile = $uniqueName.".".$_FILES['file']['name'];
        move_uploaded_file($tmpName, './images/products/'.$nameFile);

        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "file" => $nameFile,
            "total" => $price * $qtt
        ];

        $_SESSION['products'][] = $product;
    }else{
        throw new Exception("Erreur ! N'oubliez pas de remplir le nom, le prix , la quantité et d'envoyer une image du produit !");
    }
}

/* This code block is checking if the form has been submitted. If the form has been submitted, it calls
the `saveProduct()` function to save the product details to a session variable. If the
`saveProduct()` function executes successfully, it adds a success message to the
`['success']` array and redirects the user to the `index.php` page. If an exception is
thrown during the execution of the `saveProduct()` function, it catches the exception, adds the
error message to the `['errors']` array, and redirects the user to the `index.php` page. */
if (isset($_POST['submit'])) {
    try {
        saveProduct();
        $_SESSION['success'][] = 'Le produit a bien été ajouté !';
        header("location:index.php");
    } catch (Exception $e) {
        //Si ca ne fonctionne pas, on donne une erreur quand l'on renvois a l'accueil
        $_SESSION['errors'][] = $e->getMessage();
        header("location:index.php");
    }
}
