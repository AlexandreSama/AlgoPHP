<?php
$categories = $result["data"]['categories'];
$topicManager = $result["data"]['topics'];
$messagesManager = $result["data"]['messages'];
?>
<link rel="stylesheet" href="./public/css/home.css">
<div class="tableHolder">
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
        if (App\Session::isAdmin()) {

            echo "<a class='modifyLink' href='index.php?ctrl=forum&action=modifyForm&id=" . $valueCategory->getId() .  "&type=category'><i class='fa-solid fa-pen'></i></a>";
        }

        echo '</th></tr>
            </thead>
            <tbody>';

        if ($topics) {

            foreach ($topics as $topic) {

                echo '<tr class="infoHolder">
            <td class="titleTopic"><a href="index.php?ctrl=forum&action=showTopic&id=' . $topic->getId() . '">' . $topic->getTitle() . '</a>
            </td>';
                $messages = $messagesManager->getTopicById($topic->getId());
                if ($messages) {

                    $users = $messagesManager->getLastMessageFromTopicId($topic->getId());
                    foreach ($messages as $message) {

                        foreach ($users as $user) {

                            echo '<td class="infoLastMessage">
                            <p>Dernier message de : <a href="index.php?ctrl=security&action=showProfile&id=' . $user['id_user'] . '">' . $user['username'] . '</a></p>
                            <p>Le : ' . $message['creationDate'] . '</p></td>';
                        }
                    }
                }
            }
        } else {

            echo '<td>Pas de topics pour le moment !</td>';
        }

        echo '</tr>
    </tbody>
    </table>';
    }
    ?>
</div>
<div class="widgetHolder">
    <div class="firstBox">
        <p>Rechercher...</p>
        <form class="search" action="index.php?ctrl=search&action=index" method="post">
            <input type="text" placeholder="Taper votre recherche" name='searchInput' id="searchInput">
            <select name="typeInput" id="type-select">
                <option value="">--Choisissez un type--</option>
                <option value="category">Catégorie</option>
                <option value="topic">Topic</option>
            </select>
            <button class="searchButton">Chercher</button>
        </form>
    </div>
    <div class="discordWidget">
        <iframe class="discord" src="https://discord.com/widget?id=744159443046105138&theme=dark" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
    </div>
</div>