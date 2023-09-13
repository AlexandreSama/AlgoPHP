<?php
$categories = $result["data"]['categories'];
$topicManager = $result["data"]['topics'];
$messagesManager = $result["data"]['messages'];
?>
<link rel="stylesheet" href="./public/css/home.css">
<?php

    foreach ($categories as $valueCategory) {

        $topics = $topicManager->getTopicByCategoryId($valueCategory->getId());

        echo '<table class="holder" cellspacing="0">
                <thead class="topicInfoHolder">
                <tr>
                    <th colspan="2" class="holderTitle">
                    <a href="index.php?ctrl=forum&action=listTopics&id=' .
                    $valueCategory->getId() . '">'
                    . $valueCategory->getCategoryName()
                    . '</a>';
        if(App\Session::isAdmin()){
            
            echo "<a class='modifyLink' href='index.php?ctrl=forum&action=modifyForm&id=" . $valueCategory->getId() .  "&type=category'><i class='fa-solid fa-pen'></i></a>";
        }

        echo '</th></tr>
                </thead>
                <tbody>';

        if($topics){

            foreach ($topics as $topic) {

                echo '<tr class="infoHolder">
                <td class="titleTopic"><a href="index.php?ctrl=forum&action=showTopic&id=' . $topic['id_topic'] . '">' . $topic['title'] . '</a>
                </td>';
                $messages = $messagesManager->getTopicById($topic["id_topic"]);
                if ($messages) {

                    $users = $messagesManager->getLastMessageFromTopicId($topic["id_topic"]);
                    foreach ($messages as $message) {

                        foreach ($users as $user) {

                            echo '<td class="infoLastMessage">
                                <p>Dernier message de : <a href="index.php?ctrl=security&action=showProfile&id=' . $user['id_user'] . '">' . $user['username'] . '</a></p>
                                <p>Le : ' . $message['creationDate'] . '</p></td>';
                        }
                    }
                }
            }
        }else{

            echo '<td>Pas de topics pour le moment !</td>';
        }

        echo '</tr>
        </tbody>
        </table>';

    }
?>