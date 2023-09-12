<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <a href="index.php?ctrl=forum&action=home">Phenix Division</a>
                <form class="search" action="index.php?ctrl=search&action=index" method="post">
                    <input type="text" placeholder="Vous chercher un titre ?" name='searchInput' id="searchInput">
                    <button>Chercher</button>
                </form>
            </div>
            <div class="navbar-dropdown">
                <button class="dropdown-button">
                    <i class="fa-solid fa-user"></i>
                </button>
                <div class="dropdown-content">
                    <?php
                    if ($result['data']["user"] !== false) {
                    ?>
                        <a href="index.php?ctrl=security&action=profile">Profile</a>
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
                            <a href="index.php?ctrl=security&action=disconnect">Se déconnecter</a>
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
        if (isset($result["data"]['successMessage']) || isset($result["data"]['errorMessage'])) {
            echo '<h3 class="message" style="color: red">' . $result["data"]['errorMessage'] . '</h3>
                            <h3 class="message" style="color: green">' . $result["data"]['successMessage'] . '</h3>';
        }
        ?>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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