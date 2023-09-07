<?php
$topic = $result["data"]['topic'];
$userManager = $result["data"]['userManager'];
$messages = $result["data"]['messages'];
?>

<link rel="stylesheet" href="./public/css/topic.css">
<div class="inner-div">
    <div class="categoryTitle">
        <h3><?php echo $topic->getTitle() ?></h3>
        <?php
            if (App\Session::isAdmin()) {
        ?>
        <a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=<?php echo $topic->getId() ?>&type=topic"><i class="fa-solid fa-pen"></i></a>
        <?php
            }
        ?>
    </div>
    <div class="messagesHolder">
        <?php
        foreach ($messages as $message) {
            echo '<div class="topicHolder">
            <div class="textHolder">
            <p>' . $message['messageText'] . '</p>';
            if (App\Session::isAdmin()) {
                echo '<a class="modifyLink" href="index.php?ctrl=forum&action=deleteMessage&id=' . $message['id_message'] . '"><i class="fa-solid fa-x"></i></a>';
            }
            echo '</div>';
            $users = $userManager->getUsersByMessages($message['user_id']);
            foreach ($users as $user) {
                echo '<div class="infoHolder">
                <p>De : <a href="index.php?ctrl=security&action=showProfile&id=' . $user['id_user'] . '">' . $user['username'] . '<a/></p>
                <p>Le : ' . $message['creationDate'] . '</p>';
                if(App\Session::getUser() !== false){
                    if (App\Session::isAdmin() || $user['username'] == App\Session::getUser()->getUsername()) {
                        echo '<a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=' . $message['id_message'] . '&type=message"><i class="fa-solid fa-pen"></i></a>';
                    }
                }
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
    <?php
    if ($result['data']["user"]) {
    ?>
        <form method='post' action="index.php?ctrl=forum&action=addMessage" class="addMessage">
            <textarea class="full-width-height" name='messageContent'></textarea>
            <input type="text" name='topicId' style="display: none;" value="<?php echo $topic->getId() ?>">
            <button>Envoyer</button>
        </form>
    <?php
    }
    ?>
</div>
</div>