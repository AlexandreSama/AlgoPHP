<?php
$topic = $result["data"]['topic'];
$userManager = $result["data"]['userManager'];
$messages = $result["data"]['messages'];
?>

<link rel="stylesheet" href="./public/css/topic.css">
<div class="inner-div">
    <div class="categoryTitle">
        <h3><?php echo $topic->getTitle() ?></h3>
        <a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=<?php echo $topic->getId() ?>&type=topic"><i class="fa-solid fa-pen"></i></a>
    </div>
    <?php
    foreach ($messages as $message) {
        echo '<div class="topicHolder">
            <div class="textHolder">
            <p>' . $message['messageText'] . '</p>';
            if(App\Session::isAdmin()){
                echo '<a class="modifyLink" href="index.php?ctrl=forum&action=deleteMessage&id=' . $message['id_message'] . '"><i class="fa-solid fa-x"></i></a>';
            }
            echo '</div>';
        $users = $userManager->getUsersByMessages($message['user_id']);
        foreach ($users as $user) {
            echo '<div class="infoHolder">
                <p>De : ' . $user['username'] . '</p>
                <p>Le : ' . $message['creationDate'] . '</p>';
                if(App\Session::isAdmin()){
                    echo '<a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=' . $message['id_message'] . '&type=message"><i class="fa-solid fa-pen"></i></a>';
                }
                echo '</div>';
        }
        echo '</div>';
    }
    ?>
        <?php
        if($result['data']["user"]){   
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