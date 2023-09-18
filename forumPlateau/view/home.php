<?php
$categories = $result["data"]['categories'];
$topicManager = $result["data"]['topics'];
$messagesManager = $result["data"]['messages'];
?>
<link rel="stylesheet" href="./public/css/home.css">
<div class="tableHolder" id="tableHolder">
    <?php

    foreach ($categories as $valueCategory) {

        $topics = $topicManager->getTopicByCategoryId($valueCategory->getId());
        echo '<table class="holder" cellspacing="0">
            <tr class="topicInfoHolder">
                <th colspan="2" class="holderTitle">
                <a href="index.php?ctrl=forum&action=listTopics&id=' .
            $valueCategory->getId() . '">'
            . $valueCategory->getCategoryName()
            . '</a>';
        if (App\Session::isAdmin()) {

            echo "<a class='modifyLink' href='index.php?ctrl=forum&action=modifyForm&id=" . $valueCategory->getId() .  "&type=category'><i class='fa-solid fa-pen'></i></a>";
        }

        echo '</th></tr>';

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

            echo '<td class="infoHolder">Pas de topics pour le moment !</td>';
        }

        echo '</tr>
    </table>';
    }
    ?>
</div>
<div class="widgetHolder">
    <div class="firstBox">
        <p>Rechercher...</p>
        <form class="search" action="" method="get" id="searchform">
            <input type="text" placeholder="Taper votre recherche" name='searchInput' id="searchInput" data-search>
            <select name="typeInput" id="type-select">
                <option data-type value="">--Choisissez un type--</option>
                <option data-type value="category">Catégorie</option>
                <option data-type value="topic">Topic</option>
            </select>
            <!-- <button type="submit" class="searchButton" id="search">Chercher</button> -->
            <button id="submitInput">Envoyer
        </form>
    </div>
    <div class="discordWidget">
        <iframe class="discord" src="https://discord.com/widget?id=744159443046105138&theme=dark" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
</script>
<script>
    $('#submitInput').on('click', function(e) {
        e.preventDefault();
        let searchValue = document.getElementById('searchInput').value;
        let typeValue = document.getElementById('type-select').value;

        $.get(
            "index.php?action=ajax", {
                search: searchValue,
                type: typeValue
            },
            function(data) {
                document.getElementById('tableHolder').innerHTML = '';
                document.getElementById('tableHolder').innerHTML = data
                console.log(data)
            }
        ).fail(function(xhr, textStatus, errorThrown) {
            console.error("Erreur AJAX : " + textStatus, errorThrown);
        });
    });
</script>