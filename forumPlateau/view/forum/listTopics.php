<?php
$topics = $result["data"]['topics'];
$categoryName = $result["data"]['categoryName'];
$userManager = $result["data"]['userManager'];
$messageManager = $result["data"]['message'];
?>
<link rel="stylesheet" href="./public/css/listTopics.css">
<div class="inner-div">
    <div class="categoryTitle">
        <h3><?php echo $categoryName->getCategoryName() ?></h3>
    </div>
    <?php
    if($topics){
        foreach ($topics as $topic) {
                $user = $userManager->findOneById($topic['user_id']);
                $lastMessageUser = $messageManager->getLastMessageFromTopicId($topic["id_topic"]);
                echo '<div class="topicHolder">
                <div class="linkHolder">
                    <a href="index.php?ctrl=forum&action=showTopic&id=' . $topic['id_topic'] . '">' . $topic['title'] .  '</a>
                    <p>De: ' . $user->getUsername() . '</p>
                </div>
                <div class="infoHolder">';
                foreach ($lastMessageUser as $lastMessage) {
                    echo '<p>Dernier message de : ' . $lastMessage['username'] . '</p>
                    <p>Le : ' . $lastMessage['creationDate'] .'</p>';
                }
            echo '</div>
            </div>';
        }
    }else{
        echo '<p>Pas de topics pour le moment !</p>';
    }
    ?>
</div>