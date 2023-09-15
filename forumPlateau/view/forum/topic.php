<?php
$topic = $result["data"]['topic'];
$userManager = $result["data"]['userManager'];
$messages = $result["data"]['messages'];
?>

<link rel="stylesheet" href="./public/css/topic.css">


<table class="holder" cellspacing="0">
    <thead class="topicInfoHolder">
        <tr>
            <th colspan="2" class="holderTitle">
                <p><?php echo $topic->getTitle() ?></p>
                <?php if (App\Session::isAdmin()) : ?>

                    <a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=<?php echo $topic->getId() ?>&type=topic"><i class="fa-solid fa-pen"></i></a>
                    <?php if ($topic->getClosed()) : ?>

                        <a class="modifyLink" href="index.php?ctrl=forum&action=unlockTopic&id=<?php echo $topic->getId() ?>"><i class="fa-solid fa-lock-open"></i></a>
                    <?php else : ?>

                        <a class="modifyLink" href="index.php?ctrl=forum&action=lockTopic&id=<?php echo $topic->getId() ?>"><i class="fa-solid fa-lock"></i></a>
                    <?php endif; ?>

                <?php endif; ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $message) : ?>
            <?php $users = $userManager->getUsersByMessages($message->getUser()->getId()); ?>
            <?php foreach ($users as $user) : ?>
                <tr class="infoHolder">
                    <td class="messageTopic">
                        <?php echo $message->getMessageText(); ?>
                    </td>
                    <td class="infoLastMessage">
                        <p>Dernier message de : <a href="index.php?ctrl=security&action=showProfile&id=<?php echo $user->getId() ?>"><?php echo $user->getUsername() ?></a></p>
                        <p>Le : <?php echo $message->getCreationDate() ?></p>
                        <?php if (App\Session::getUser() !== false && (App\Session::isAdmin() || $user['username'] == App\Session::getUser()->getUsername())) : ?>

                            <a class="modifyLink" href="index.php?ctrl=forum&action=modifyForm&id=<?php echo $message['id_message']; ?>&type=message"><i class="fa-solid fa-pen"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if (App\Session::getUser() && !$topic->getClosed()) : ?>

    <form method='post' action="index.php?ctrl=forum&action=addMessage&id=<?php echo $topic->getId(); ?>" class="addMessage">
        <textarea class="full-width-height" name='messageContent'></textarea>
        <button class="formButton">Envoyer</button>
    </form>
<?php endif; ?>