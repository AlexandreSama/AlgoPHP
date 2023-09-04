<?php
$topic = $result["data"]['topic'];
$userManager = $result["data"]['userManager'];
$messages = $result["data"]['messages'];
?>

<link rel="stylesheet" href="./public/css/topic.css">
<div class="inner-div">
    <div class="categoryTitle">
        <h3><?php echo $topic->getTitle() ?></h3>
    </div>
    <?php
    foreach ($messages as $message) {
        echo '<div class="topicHolder">
            <div class="textHolder">
            <p>' . $message['messageText'] . '</p>
            </div>';
        $users = $userManager->getUsersByMessages($message['user_id']);
        foreach ($users as $user) {
            echo '<div class="infoHolder">
                <p>De : ' . $user['username'] . '</p>
                <p>Le : ' . $message['creationDate'] . '</p>
                </div>';
        }
        echo '</div>';
    }
    ?>
        <form method='post' action="index.php?ctrl=forum&action=addMessage" class="addMessage">
            <textarea class="full-width-height" name='messageContent'></textarea>
            <input type="text" name='topicId' style="display: none;" value="<?php echo $topic->getId() ?>">
            <button>Envoyer</button>
        </form>
    </div>
</div>