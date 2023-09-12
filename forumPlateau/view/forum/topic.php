<?php
$topic = $result["data"]['topic'];
$userManager = $result["data"]['userManager'];
$messages = $result["data"]['messages'];
?>

<link rel="stylesheet" href="./public/css/topic.css">
<?php if ($topic->getClosed() || App\Session::getUser() == false) : ?>
    <div class="inner-div" style="justify-content: unset;">
    <?php else : ?>
        <div class="inner-div">
        <?php endif; ?>

        <div class="categoryTitle">
            <h3><?php echo $topic->getTitle() ?></h3>
            <div class="links">
                <?php if (App\Session::isAdmin()) : ?>

                    <a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=<?php echo $topic->getId() ?>&type=topic"><i class="fa-solid fa-pen"></i></a>
                    <?php if ($topic->getClosed()) : ?>

                        <a class="modifyLink" href="index.php?ctrl=forum&action=unlockTopic&id=<?php echo $topic->getId() ?>"><i class="fa-solid fa-lock-open"></i></a>
                    <?php else : ?>

                        <a class="modifyLink" href="index.php?ctrl=forum&action=lockTopic&id=<?php echo $topic->getId() ?>"><i class="fa-solid fa-lock"></i></a>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        </div>
        <div class="messagesHolder">
            <?php foreach ($messages as $message) : ?>

                <?php $users = $userManager->getUsersByMessages($message['user_id']); ?>
                <?php foreach ($users as $user) : ?>

                    <div class="topicHolder">
                        <div class="textHolder">
                            <p><?php echo $message['messageText']; ?></p>
                            <?php if (App\Session::isAdmin()) : ?>

                                <a class="modifyLink" href="index.php?ctrl=forum&action=deleteMessage&id=<?php echo $message['id_message']; ?>"><i class="fa-solid fa-x"></i></a>
                            <?php endif; ?>
                        </div>
                        <div class="infoHolder">
                            <p>De : <a class="test" href="index.php?ctrl=security&action=showProfile&id=<?php echo $user['id_user']; ?>"><?php echo $user['username']; ?></a></p>
                            <p>Le : <?php echo $message['creationDate']; ?></p>
                            <?php if (App\Session::getUser() !== false && (App\Session::isAdmin() || $user['username'] == App\Session::getUser()->getUsername())) : ?>

                                <a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=<?php echo $message['id_message']; ?>&type=message"><i class="fa-solid fa-pen"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
        <?php if ($result['data']["user"] && !$topic->getClosed()) : ?>
            
            <form method='post' action="index.php?ctrl=forum&action=addMessage" class="addMessage">
                <textarea class="full-width-height" name='messageContent'></textarea>
                <input type="text" name='topicId' style="display: none;" value="<?php echo $topic->getId(); ?>">
                <button>Envoyer</button>
            </form>
        <?php endif; ?>
        </div>