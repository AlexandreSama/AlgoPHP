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
                    <a href="#">Se connecter</a>
                    <a href="#">S'inscrire</a>
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

</html>