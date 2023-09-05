<?php
$categories = $result["data"]['categories'];
$topicManager = $result["data"]['topics'];
$messagesManager = $result["data"]['messages'];
?>
<link rel="stylesheet" href="./public/css/home.css">
<?php
foreach ($categories as $valueCategory) {
    $topics = $topicManager->getTopicByCategoryId($valueCategory->getId());
    echo "<div class='main-inner'>
        <div class='build-info'>
        <a href='index.php?ctrl=forum&action=listTopics&id=" . $valueCategory->getId() .  "'>" .
        $valueCategory->getCategoryName()
        .
        "</a>
        <a class='modifyLink' href='index.php?ctrl=forum&action=modifyForm&id=" . $valueCategory->getId() .  "&type=category'><i class='fa-solid fa-pen'></i></a>
        </div>
        <div class='info-section'>";

    if($topics !== null){
        foreach ($topics as $valueTopic) {
            echo "<div class='build-details'><div class='build-name'><a href='index.php?ctrl=forum&action=showTopic&id=" . $valueTopic['id_topic'] . "'>" . $valueTopic['title'] . "</a></div>";
            $messages = $messagesManager->getTopicById($valueTopic["id_topic"]);
            if ($messages !== null) {
                $user = $messagesManager->getLastMessageFromTopicId($valueTopic["id_topic"]);
                 foreach ($messages as $valueMessage) {
                    foreach ($user as $valueUser) {
                        echo "<div class='build-lastMessage'>Dernier Message de : " . $valueUser['username'] . "</div><div class='build-date'>Le : " . $valueMessage['creationDate'] . "</div></div>";
                    }
                }
            }
        }
    }else{
        echo 'Pas de topics pour le moment !';
    }
    echo "</div>
    </div>";
}
?>