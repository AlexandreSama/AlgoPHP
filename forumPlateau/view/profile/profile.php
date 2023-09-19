<link rel="stylesheet" href="./public/css/profile.css">
<div class="inner-div">
    <div class="profileInfo">
        <h3 class="title">Profile</h3>
        <div class="imageHolder">
            <img src="./public/uploads/<?php echo App\Session::getUser()->getProfilePicture() ?>" alt="">
        </div>
        <div class="infoHolder">
            <div class="info">
                <p>Pseudonyme : <?php echo App\Session::getUser()->getUsername() ?></p>
                <p>Date de création du compte : <?php echo App\Session::getUser()->getInscriptionDate() ?></p>
                <p>Rôle :
                    <?php
                    if (App\Session::getUser()->hasRole("ROLE_ADMIN")) {
                        echo "Administrateur";
                    } else {
                        echo "Visiteur";
                    }
                    ?></p>
                <p>Nombre de messages : <?php echo $result['data']["messageCount"]['count'] ?></p>
                <p>Topics ouverts : <?php echo $result['data']["topicCount"]['count'] ?></p>
            </div>
            <?php
            if (App\Session::isAdmin()) {
            ?>
                <div class="infoAdmin">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">Liste des utilisateurs</th>
                            </tr>
                        </thead>
                        <tr>
                            <th class="infoAdminValue">Pseudonyme</th>
                            <th class="infoAdminValue">Date de création de compte</th>
                        </tr>
                        <?php
                        foreach ($result["data"]['users'] as $value) {

                            echo "<tr>
                                    <td class='infoAdminValue'><a href='index.php?ctrl=security&action=showProfile&id=" . $value->getId() . "'>" . $value->getUsername() . "</a></td>
                                    <td class='infoAdminValue'>" . $value->getInscriptionDate() . "</td>
                                </tr>";
                        }
                        ?>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>