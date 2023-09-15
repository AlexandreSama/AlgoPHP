<?php
$topics = $result["data"]['topics'];
$userManager = $result["data"]['userManager'];
$messageManager = $result["data"]['message'];
$aimerManager = $result["data"]['aimerManager'];
?>
<link rel="stylesheet" href="./public/css/listTopics.css">
<table class="holder" cellspacing="0">
    <thead class="topicInfoHolder">
        <tr>
            <th colspan="2" class="holderTitle">
                <?php if (isset($result["data"]['category'])) {
                    echo $result["data"]['category']->getCategoryName();
                } else {
                    echo 'Liste de recherche : ';
                }
                ?>
                <button><a href="index.php?ctrl=forum&action=addTopicForm&catid=<?php echo $result["data"]['category']->getId() ?>">Créer un topic</a></button>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($topics) {
            foreach ($topics as $topic) {

                $user = $userManager->findOneById($topic['user_id']);
                $lastMessageUser = $messageManager->getLastMessageFromTopicId($topic["id_topic"]);
                echo '<tr class="infoHolder">
                <td class="titleTopic">
                    <a href="index.php?ctrl=forum&action=showTopic&id=' . $topic['id_topic'] . '">' . $topic['title'] . '</a>
                    <p>De : <a href="index.php?ctrl=security&action=showProfile&id=' . $user->getId() . '">' . $user->getUsername() . '<a/></p>
                </td>';
                foreach ($lastMessageUser as $lastMessage) {
                    echo '<td class="infoLastMessage">
                    <p>Dernier message de : <a href="index.php?ctrl=security&action=showProfile&id=' . $lastMessage['id_user'] . '">' . $lastMessage['username'] . '</a></p>
                    <p>Le : ' . $lastMessage['creationDate'] . '</p>';
                    if (App\Session::getUser()) {

                        if ($aimerManager->getLikesByTopicId($topic['id_topic'])["likes"] !== null) {

                            $likes = $aimerManager->getLikesByTopicId($topic['id_topic'])["likes"];
                            $userLikeId = $aimerManager->checkUserLike($topic['id_topic']);
                            if (isset($userLikeId["user_id"])) {

                                if ($userLikeId["user_id"] == App\Session::getUser()->getId()) {

                                    echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=unlikeTopic&id=' . $topic['id_topic'] . '&catid=' . $result["data"]['category']->getId() . '">Unlike ce topic</a></button></p>';
                                } else {

                                    echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic['id_topic'] . '&catid=' . $result["data"]['category']->getId() . '">Liker ce topic</a></button></p>';
                                }
                            } else {

                                echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic['id_topic'] . '&catid=' . $result["data"]['category']->getId() . '">Liker ce topic</a></button></p>';
                            }
                        } else {

                            echo '<p>Nombre de like : 0 <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic['id_topic'] . '&catid=' . $result["data"]['category']->getId() . '">Liker ce topic</a></button></p>';
                        }
                    } else {

                        $likes = $aimerManager->getLikesByTopicId($topic['id_topic'])["likes"];
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