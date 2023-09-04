<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/layout.css">
    <script src="https://kit.fontawesome.com/eec634434d.js" crossorigin="anonymous"></script>
    <title>Phenix Division</title>
</head>

<body>
    <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
    <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
    <div class="content-wrapper">
        <nav class="navbar">
            <div class="navbar-logo">
                <img src="./public/img/td2logo.png" alt="Logo Phenix Division">
            </div>
            <div class="navbar-title">
                <a href="index.php">Phenix Division</a>
            </div>
            <div class="navbar-dropdown">
                <button class="dropdown-button">
                    <i class="fa-solid fa-user"></i>
                </button>
                <div class="dropdown-content">
                    <a href="index.php?ctrl=security&action=index">Se connecter</a>
                    <a href="index.php?ctrl=security&action=registerForm">S'inscrire</a>
                </div>
            </div>
        </nav>

        <main class="main-content">
            <?= $page ?>
        </main>

        <footer class="footer">
            <div class="footer-left">
                <a href="#">Contact</a>
            </div>
            <div class="footer-center">
                Made With Love By Alex
            </div>
            <div class="footer-right">
                <a href="#">Mentions Légales</a>
            </div>
        </footer>
    </div>
</body>
<script>
    $(document).ready(function() {
        $(".message").each(function() {
            if ($(this).text().length > 0) {
                $(this).slideDown(500, function() {
                    $(this).delay(3000).slideUp(500)
                })
            }
        })
        $(".delete-btn").on("click", function() {
            return confirm("Etes-vous sûr de vouloir supprimer?")
        })
        tinymce.init({
            selector: '.post',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    })



    /*
    $("#ajaxbtn").on("click", function(){
        $.get(
            "index.php?action=ajax",
            {
                nb : $("#nbajax").text()
            },
            function(result){
                $("#nbajax").html(result)
            }
        )
    })*/
</script>

</html>