<?php

$query = $db->prepare('SELECT * FROM user_info WHERE user_username =?');
$query->execute([$user_username]);
$user_list = $query->fetchAll(PDO::FETCH_OBJ);

?>