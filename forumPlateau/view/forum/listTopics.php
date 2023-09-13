<?php
$topics = $result["data"]['topics'];
$userManager = $result["data"]['userManager'];
$messageManager = $result["data"]['message'];
$aimerManager = $result["data"]['aimerManager']
?>
<link rel="stylesheet" href="./public/css/listTopics.css">
<div class="inner-div">
    <div class="categoryTitle">
        <?php if(isset($result["data"]['categoryName'])){
            echo '<h3>' . $result["data"]['categoryName']->getCategoryName() . '</h3>';
        }else{
           echo '<h3>Liste de recherche : </h3>';
        }
        ?>
    </div>
    <?php
    if ($topics) {

        echo '<div class="holder">';

        foreach ($topics as $topic) {

            $user = $userManager->findOneById($topic['user_id']);
            $lastMessageUser = $messageManager->getLastMessageFromTopicId($topic["id_topic"]);

            echo '<div class="topicHolder">
                <div class="linkHolder">
                    <a href="index.php?ctrl=forum&action=showTopic&id=' . $topic['id_topic'] . '">' . $topic['title'] .  '</a>
                    <p>De : <a href="index.php?ctrl=security&action=showProfile&id=' . $user->getId() . '">' . $user->getUsername() . '</a></p>
                </div>
                <div class="infoHolder">';

            foreach ($lastMessageUser as $lastMessage) {

                echo '<p>Dernier message de : ' . $lastMessage['username'] . '</p>
                    <p>Le : ' . $lastMessage['creationDate'] . '</p>';
                if (App\Session::getUser()) {

                    if ($aimerManager->getLikesByTopicId($topic['id_topic'])["likes"] !== null) {

                        $likes = $aimerManager->getLikesByTopicId($topic['id_topic'])["likes"];
                        $userLikeId = $aimerManager->checkUserLike($topic['id_topic']);
                        if (isset($userLikeId["user_id"])) {

                            if ($userLikeId["user_id"] == App\Session::getUser()->getId()) {

                                echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=unlikeTopic&id=' . $topic['id_topic'] . '">Unlike ce topic</a></button></p>';
                            } else {

                                echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic['id_topic'] . '">Liker ce topic</a></button></p>';
                            }

                        } else {

                            echo '<p>Nombre de like : ' . $likes . ' <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic['id_topic'] . '">Liker ce topic</a></button></p>';
                        }

                    } else {

                        echo '<p>Nombre de like : 0 <button class="button-1" role="button"><a href="index.php?ctrl=forum&action=likeTopic&id=' . $topic['id_topic'] . '">Liker ce topic</a></button></p>';
                    }

                }else{
                    
                    $likes = $aimerManager->getLikesByTopicId($topic['id_topic'])["likes"];
                    echo '<p>Nombre de like : ' . $likes . ' </p>';
                }
            }

            echo '</div>
            </div>';
        }

        echo '</div>';
    } else {

        echo '<p>Pas de topics pour le moment !</p>';
    }
    ?>
</div>