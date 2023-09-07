<?php
$formType = $result['data']["formtype"];

switch ($formType) {
    case 'category':
        $data = $result['data']["category"];
        $title = 'Supprimer une catégorie';
        break;
    case 'topic':
        $data = $result['data']["topics"];
        $title = 'Supprimer un topic';
        break;
    case 'message':
        $data = $result['data']["message"];
        $title = 'Supprimer un message';
        break;
        // default:
        //     # code...
        //     break;
}

?>

<link rel="stylesheet" href="./public/css/form.css">
<div class="login-box">
    <?php echo $title ?>
    <form method="post" action="index.php?ctrl=forum&action=delete&type=<?php echo $formType ?>">
        <?php
        if ($formType == 'category') {
            echo '<div class="user-box">
                <select name="categoryInput">';
            foreach ($data as $value) {
                echo '<option value="' . $value->getId() . '">' . $value->getCategoryName() . '</option>';
            }
            echo '</select>
                    <label>Quel catégorie veut-tu supprimer ?</label>
                </div>';
        } else if ($formType == 'topic') {
            echo '<div class="user-box">
                <select name="topicInput">';
            foreach ($data as $value) {
                echo '<option value="' . $value->getId() . '">' . $value->getTitle() . '</option>';
            }
            echo '</select>
                    <label>Quel topic veut-tu supprimer ?</label>
                </div>';
        } else if ($formType == 'message') {
            echo '<div class="user-box">
                <input type="text" name="messageTextInput" required=true>
                <label>Quel message veut-tu supprimer ?</label>
            </div>';
        }
        ?>
        <button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Envoyer
        </button>
    </form>
</div>