<?php
$formType = $result['data']["formtype"];

switch ($formType) {
    case 'category':
        $data = $result['data']["category"];
        $title = 'Modifier une catégorie';
        break;
        case 'topic':
            $data = $result['data']["topics"];
            $title = 'Modifier un topic';
            break;
        case 'message':
            $data = $result['data']["message"];
            $title = 'Modifier un message';
            break;
        // default:
        //     # code...
        //     break;
}

?>

<link rel="stylesheet" href="./public/css/form.css">
<div class="login-box">
    <?php echo $title ?>
    <form method="post" action="index.php?ctrl=forum&action=modify&id=<?php echo $data->getId() ?>&type=<?php echo $formType ?>">
        <?php
        if($formType == 'category'){
            echo '<div class="user-box">
                <input type="text" name="categoryNameInput" required=true>
                <label>Inscrit le nouveau titre de cet catégorie</label>
            </div>';
        }else if($formType == 'topic'){
            echo '<div class="user-box">
                <input type="text" name="topicNameInput" required=true>
                <label>Inscrit le nouveau titre de ce topic</label>
            </div>';
        }else if($formType == 'message'){
            echo '<div class="user-box">
                <input type="text" name="messageTextInput" required=true>
                <label>Inscrit le nouveau message que tu souhaite</label>
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