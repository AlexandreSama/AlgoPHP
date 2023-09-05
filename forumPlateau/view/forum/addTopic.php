<?php
$categories = $result["data"]['categories'];
?>

<link rel="stylesheet" href="./public/css/form.css">
<div class="login-box">
    <h2>Créer un topic</h2>
    <form method="post" action="index.php?ctrl=forum&action=addTopic">
        <div class="user-box">
            <input type="text" name="categoryNameInput" required=true>
            <label>Titre</label>
        </div>
        <div class="user-box">
            <label class="messageLabelBox">Message</label>

            <textarea name="messageInput" cols="30" rows="10"></textarea>
        </div>
        <div class="user-box">
            <label class="selectLabel">Catégorie</label>
            <select name="categoryInput">
                <?php
                foreach ($categories as $value) {
                    echo '<option value="' . $value->getId() . '">' . $value->getCategoryName() . '</option>';
                }
                ?>
            </select>
        </div>
        <button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Envoyer
        </button>
    </form>
</div>