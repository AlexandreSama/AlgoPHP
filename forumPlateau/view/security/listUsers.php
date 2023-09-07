<?php

$users = $result["data"]['users'];

?>
<h3>Liste des utilisateurs</h3>

<?php

foreach ($users as $value) {
    echo $value->getUsername() . " " . $value->getEmail();
}
