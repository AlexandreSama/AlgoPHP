<link rel="stylesheet" href="./public/css/profile.css">
<div class="inner-div">
    <div class="titleHolder">
        <h3 class="title">Profile de <?php echo $result['data']["profileViewer"]->getUsername() ?></h3>
    </div>
    <div class="profileInfo">
        <img src="./public/uploads/<?php echo $result['data']["profileViewer"]->getProfilePicture() ?>" alt="">

        <div class="info">
            <p>Pseudonyme : <?php echo $result['data']["profileViewer"]->getUsername() ?></p>
            <p>Date de création du compte : <?php echo $result['data']["profileViewer"]->getInscriptionDate() ?></p>
            <p>Rôle :
                <?php
                if ($result['data']["profileViewer"]->getRole() == '"ROLE_ADMIN"') {

                    if(App\Session::isAdmin()){

                        echo "<a href='index.php?ctrl=security&action=changeRole&id=" . $result['data']["profileViewer"]->getId() . "'>Administrateur</a>";
                    }else{

                        echo "Administrateur";
                    }
                } else {

                    if(App\Session::isAdmin()){

                        echo "<a href='index.php?ctrl=security&action=changeRole&id=" . $result['data']["profileViewer"]->getId() . "'>Visiteur</a>";
                    }else{
                        
                        echo "Visiteur";
                    }
                }
                ?></p>
            <p>Nombre de messages : <?php echo $result['data']["messageCount"]['count'] ?></p>
            <p>Topics ouverts : <?php echo $result['data']["topicCount"]['count'] ?></p>
            <?php
                if($result['data']["profileViewer"]->getIsBanned() == "0"){
                    echo "<button class='actionBanOrUnban'><a href='index.php?ctrl=security&action=banUser&id=" . $result['data']["profileViewer"]->getId() . "'>Bannir</a></button>";
                }else{
                    echo "<button class='actionBanOrUnban'><a href='index.php?ctrl=security&action=unbanUser&id=" . $result['data']["profileViewer"]->getId() . "'>Débannir</a></button>";
                }
            ?>
        </div>
    </div>
</div>