<?php
session_start();

function saveProduct()
{
    if (isset($_POST['submit'])) {
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if(isset($_FILES['file'])){
            $tmpName = $_FILES['file']['tmp_name'];
            $nameFile = $_FILES['file']['name'];
            move_uploaded_file($tmpName, './images/products/'.$nameFile);
        }

        if ($name && $price && $qtt) {
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "file" => $nameFile,
                "total" => $price * $qtt
            ];

            $_SESSION['products'][] = $product;
        }else{
            throw new Exception("Erreur ! N'oubliez pas de remplir le nom, le prix et la quantité du produit !");
        }
    } else {
        //On donne une nouvelle Exception
        throw new Exception("Erreur ! Veuillez enregistrer un produit et ne pas venir sur cet page de vous-même !");
    }
}

//On essaye la fonction, et si tout se passe bien, on renvoi a l'accueil avec un petit message
try {

    saveProduct();
    $_SESSION['success'][] = 'Le produit a bien été ajouté !';
    header("location:index.php");
} catch (Exception $e) {
    //Si ca ne fonctionne pas, on donne une erreur quand l'on renvois a l'accueil
    $_SESSION['errors'][] = $e->getMessage();
    header("location:index.php");
}

?>