<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $result["data"]['description'] ?>">
    <meta name="keywords" content="forum, the division 2, phenixmg, discord, jeux-vidéos">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- <meta name="robots" content="index, follow"> -->
    <link rel="stylesheet" href="./public/css/layout.css">
    <script src="https://kit.fontawesome.com/eec634434d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Phenix Division</title>
</head>

<body>
    <div class="content-wrapper">
        <nav class="navbar">
            <div class="navbar-logo">
                <img src="./public/img/td2logo.png" alt="Logo Phenix Division">
            </div>
            <div class="navbar-title">
                <h1><a href="index.php?ctrl=forum&action=home"><strong>Phenix Division</strong></a></h1>
            </div>
            <div class="navbar-dropdown">
                <button class="dropdown-button">
                    <i class="fa-solid fa-user"></i>
                </button>
                <div class="dropdown-content">
                    <?php
                    if (App\Session::getUser()) {
                    ?>
                        <a href="index.php?ctrl=security&action=profile" rel=“nofollow”>Profile</a>
                        <?php
                        if (App\Session::isAdmin()) {
                        ?>
                            <button class="subdropdown-button">Ajouter...
                                <div class="subdropdown-content">
                                    <a href="index.php?ctrl=forum&action=addCategoryForm">Ajouter une catégorie</a>
                                    <a href="index.php?ctrl=forum&action=addTopicForm">Ajouter un topic</a>
                                    <a href="index.php?ctrl=forum&action=deleteForm&type=category">Supprimer une catégorie</a>
                                    <a href="index.php?ctrl=forum&action=deleteForm&type=topic">Supprimer un topic</a>
                                </div>
                            <?php
                        }
                            ?>
                            <a href="index.php?ctrl=security&action=disconnect" rel=“nofollow”>Se déconnecter</a>
                            <a href="index.php?ctrl=security&action=deleteAccount" rel=“nofollow”>Supprimer mon compte</a>
                </div>
            <?php
                    } else {
            ?>
                <a href="index.php?ctrl=security&action=loginForm">Se connecter</a>
                <a href="index.php?ctrl=security&action=registerForm">S'inscrire</a>
            </div>
        <?php
                    }
        ?>
    </div>
    </nav>
    <main class="main-content">
        <?php
        if (App\Session::getFlash('success') || App\Session::getFlash('error')) {
            echo '<h3 class="flashMessage" style="color: red">' . App\Session::getFlash('error') .
                '</h3><h3 class="flashMessage" style="color: green">' . App\Session::getFlash('success') . '</h3>';
        }
        ?>
        <?= $page ?>
    </main>

    <footer class="footer">
        <div class="footer-left">
            <a href="#">Contact</a>
        </div>
        <div class="footer-center">
            <a href="#">Sitemap</a>
        </div>
        <div class="footer-right">
            <a href="#">Mentions Légales</a>
        </div>
    </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".flashMessage").each(function() {
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
</script>

</html>