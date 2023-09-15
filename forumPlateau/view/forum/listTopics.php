<?php
$topics = $result["data"]['topics'];
$userManager = $result["data"]['userManager'];
$messageManager = $result["data"]['message'];
$aimerManager = $result["data"]['aimerManager'];
if (isset($result["data"]['category'])) {
    $category = $result["data"]['category'];
}
?>
<link rel="stylesheet" href="./public/css/listTopics.css">
<table class="holder" cellspacing="0">
    <thead class="topicInfoHolder">
        <tr>
            <th colspan="2" class="holderTitle">
                <?php if (isset($result["data"]['category'])) {
                    echo $result["data"]['category']->getCategoryName();
                    echo '<button class="createTopicButton"><a href="index.php?ctrl=forum&action=addTopicForm&id=' . $result["data"]['category']->getId() . '">Créer un topic</a></button>';
                } else {
                    echo 'Liste de recherche : ';
                }
                ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($topics) {
            foreach ($topics as $topic) {
                $user = $userManager->findOneById($topic->getUser()->getId());
                $lastMessageUser = $messageManager->getLastMessageFromTopicId($topic->getId());
                echo '<tr class="infoHolder">
                <td class="titleTopic">
                    <a href="index.php?ctrl=forum&action=showTopic&id=' . $topic->getId() . '">' . $topic->getTitle() . '</a>
                    <p>De : <a href="index.php?ctrl=security&action=showProfile&id=' . $user->getId() . '">' . $user->getUsername() . '<a/></p>
                </td>';
                foreach ($lastMessageUser as $lastMessage) {
                    echo '<td class="infoLastMessage">
                    <p>Dernier message de : <a href="index.php?ctrl=security&action=showProfile&id=' . $lastMessage->getUser()->getId() . '">' . $lastMessage->getUser()->getUsername() . '</a></p>
                    <p>Le : ' . $lastMessage->getCreationDate() . '</p>';
                    if (App\Session::getUser()) {

                        if ($aimerManager->getLikesByTopicId($topic->getId())["likes"] !== null) {

                            $likes = $aimerManager->getLikesByTopicId($topic->getId())["likes"];
                            $userLikeId = $aimerManager->checkUserLike($topic->getId());
                            if (isset($userLikeId["user_id"])) {

                                if ($userLikeId["user_id"] == App\Session::getUser()->getId()) {

                                    echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=unlikeTopic&id=' . $topic->getId() . '&catid=' . $topic->getCategory()->getId() . '">Unlike ce topic</a></button></p>';
                                } else {

                                    echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic->getId() . '&catid=' . $topic->getCategory()->getId() . '">Liker ce topic</a></button></p>';
                                }
                            } else {

                                echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic->getId() . '&catid=' . $topic->getCategory()->getId() . '">Liker ce topic</a></button></p>';
                            }
                        } else {

                            echo '<p>Nombre de like : 0 <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic->getId() . '&catid=' . $topic->getCategory()->getId() . '">Liker ce topic</a></button></p>';
                        }
                    } else {

                        $likes = $aimerManager->getLikesByTopicId($topic->getId())["likes"];
                        echo '<p>Nombre de like : ' . $likes . ' </p>';
                    }
                    echo '</td>
                    </tr>';
                }
            }
        } else {
            echo '<td>Pas de topics pour le moment !</td>';
        }
        ?>
    </tbody>
</table>