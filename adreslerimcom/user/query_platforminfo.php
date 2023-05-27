<?php

$query = $db->prepare('SELECT * FROM user_platform_info WHERE user_username =?');
$query->execute([$user_username]);
$platform_list = $query->fetchAll(PDO::FETCH_OBJ);

?>