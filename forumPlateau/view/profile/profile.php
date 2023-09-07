<link rel="stylesheet" href="./public/css/profile.css">
<div class="inner-div">
    <div class="titleHolder">
        <h3 class="title">Profile</h3>
    </div>
    <div class="profileInfo">
        <img src="./public/uploads/<?php echo $result['data']["user"]->getProfilePicture() ?>" alt="">

        <div class="info">
            <p>Pseudonyme : <?php echo $result['data']["user"]->getUsername() ?></p>
            <p>Date de création du compte : <?php echo $result['data']["user"]->getInscriptionDate() ?></p>
            <p>Rôle :
                <?php
                if ($result['data']["user"]->getRole() == '"ROLE_ADMIN"') {
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
                    <tr>
                        <th class="infoAdminValue">Pseudonyme</th>
                        <th class="infoAdminValue">Date de création de compte</th>
                    </tr>
                    <?php
                    foreach ($result["data"]['users'] as $value) {
                        echo "<tr>
                                    <td class='infoAdminValue'>" . $value->getUsername() . "</td>
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