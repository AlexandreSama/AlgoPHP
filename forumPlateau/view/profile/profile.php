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
                    <form action="index.php?ctrl=security&action=banUser" method="post">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">Liste des utilisateurs</th>
                                </tr>
                            </thead>
                            <tr>
                                <th class="infoAdminValue">Pseudonyme</th>
                                <th class="infoAdminValue">Date de création de compte</th>
                                <th class="infoAdminValue">Bannir ?</th>
                            </tr>
                            <?php
                            foreach ($result["data"]['users'] as $value) {

                                echo "<tr>
                                    <td class='infoAdminValue'>" . $value->getUsername() . "</td>
                                    <td class='infoAdminValue'>" . $value->getInscriptionDate() . "</td>";
                                    if($value->getIsBanned() !== "1"){
                                        echo "<td class='infoAdminValue'><input type='radio' name='ban' value='" . $value->getId() . "' /></td>";
                                    }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                        <button >Valider</button>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>