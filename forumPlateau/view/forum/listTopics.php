<?php

$topics = $result["data"]['topics'];
//    var_dump($topics);
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){
    // var_dump($topic);
    ?>
    <p><?=$topic->getTitle()?></p>
    <?php
}


  
