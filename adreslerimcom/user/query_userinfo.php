<?php

$query = $db->prepare('SELECT * FROM user_info WHERE user_username =? AND user_password =?');
$query->execute([$user_username, $user_password]);
$user_list = $query->fetchAll(PDO::FETCH_OBJ);

?>