<link rel="stylesheet" href="./public/css/profile.css">
<div class="inner-div">
    <div class="titleHolder">
        <h3 class="title">Profile</h3>
    </div>
    <div class="profileInfo">
        <div class="info">
            <img src="#" alt="">
            <p>Pseudonyme : <?php echo $result['data']["user"]->getUsername() ?></p>
            <p>Date de création du compte : <?php echo $result['data']["user"]->getInscriptionDate() ?></p>
            <p>Rôle : <?php echo $result['data']["user"]->getRole() ?></p>
            <p>Nombre de messages : <?php echo $result['data']["messageCount"]['count'] ?></p>
            <p>Topics ouverts : <?php echo $result['data']["topicCount"]['count'] ?></p>
        </div>
        <?php
        
        
        if (App\Session::isAdmin()) {
        ?>
            <div class="infoAdmin">
                <table>
                    <tr>
                        <th>Pseudonyme</th>
                        <th>Date de création de compte</th>
                    </tr>
                    <?php
                    foreach ($result["data"]['users'] as $value) {
                        echo "<tr>
                                    <td>" . $value->getUsername() . "</td>
                                    <td>" . $value->getInscriptionDate() . "</td>
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