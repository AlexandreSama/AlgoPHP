<?php
$topic = $result["data"]['topic'];
$userManager = $result["data"]['userManager'];
$messages = $result["data"]['messages'];
$i = 0;
?>

<link rel="stylesheet" href="./public/css/topic.css">
<div class="container">
    <header class="header">
        <nav class="breadcrumb">
            <ol class="breadcrumb-product">
                <li class="breadcrumb-item"><a href="index.php?ctrl=forum&action=home">Forum ></a></li>
                <li class="breadcrumb-item"><a href="index.php?ctrl=forum&action=listTopics&id=<?php echo $topic->getCategory()->getId() ?>"><?php echo $topic->getCategory()->getCategoryName() ?> ></a></li>
                <li class="breadcrumb-item"> <?php echo $topic->getTitle() ?></li>
            </ol>
        </nav>
        <div class="titleTopic">
            <a href="#" class="categoryButton"><?php echo $topic->getCategory()->getCategoryName() ?></a>
            <h2 class="topicTitle"><?php echo $topic->getTitle() ?></h2>
        </div>
    </header>
    <div class="topic">
        <div class="holder">
            <!-- On commence ici le foreach des messages !-->
            <?php foreach ($messages as $key => $message) : ?>
            <div class="message">
                <div class="border">
                    <div class="messageInfos">
                        <span class="dateMessage"><?php echo $topic->getCreationDate() ?></span>
                        <span class="messageCount">#<?php $i = $i + 1; echo $i; ?></span>
                    </div>
                    <div class="messageComponents">
                        <div class="userInfo">
                            <div class="userInfoHolder">
                                <div class="infoUser">
                                    <?php 
                                    if($message->getUser()){
                                        echo '<a href="index.php?ctrl=security&action=showProfile&id=' . $message->getUser()->getId() . '" class="username">';
                                        echo $message->getUser()->getUsername();
                                        echo "</a>";
                                    }else{
                                        echo "Anonyme";
                                    }?>
                                </div>
                                <div class="infoUser">
                                    <img src="./public/uploads/<?php 
                                    if($message->getUser() && $message->getUser()->getProfilePicture() !== null){
                                        echo $message->getUser()->getProfilePicture();
                                    }else{
                                        echo "149071.png";
                                    }?>" alt="profilePicture" class="profilePicture">
                                </div>
                                <div class="userSecrets">
                                    <span class="dateJoinUser"><?php
                                    if($message->getUser()){
                                        echo "Rejoins le : " . $message->getUser()->getInscriptionDate();
                                    }else{
                                        echo "Rejoins le : ???";
                                    }?></span>
                                </div>
                            </div>
                        </div>
                        <div class="messageContents">
                            <div class="messageContentsHolder">
                                <div class="content">
                                    <p><?php echo $message->getMessageText() ?></p>
                                </div>
                                <div class="messageInfo">
                                    <span class="editedInfo">
                                        <?php
                                        if($message->getUser()){
                                            echo 'Le : ' . $message->getCreationDate();
                                        }else{
                                            echo "Le : " . $message->getCreationDate();
                                        }
                                        ?> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <!-- Et ca se finis ici -->
        </div>
    </div>
    <?php if(App\Session::getUser()) : ?>
        <div>
            <div class="responseTerms">
                <h4 class="respondTopic">Répondre a ce topic</h4>
                <span>Lorsque vous répondez, soyez certain que le contenu
                    ne viole pas nos Termes de Service
                </span>
            </div>
            <div class="messageBox">
                <form action="index.php?ctrl=forum&action=addMessage&id=<?php echo $topic->getId() ?>" class="input-transparent" method="post">
                    <div class="form-row">
                        <div class="firstGroup">
                            <img src="./public/uploads/<?php
                            if(App\Session::getUser()->getProfilePicture() !== null){
                                echo App\Session::getUser()->getProfilePicture();
                            }else{
                                echo "149071.png";
                            }
                            ?>" alt="" class="roundedImg">
                        </div>
                        <div class="secondGroup">
                            <div class="holderText">
                                <textarea name="messageContent" rows="4" class="form-messageContent" required></textarea>
                            </div>
                            <div class="holderButton">
                                <button class="btn" type="submit">Envoyer le message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif ?>
</div>