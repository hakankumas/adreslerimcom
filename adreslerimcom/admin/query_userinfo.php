<?php

$query = $db->prepare('SELECT * FROM user_info ORDER BY user_id DESC');
$query->execute();
$user_list = $query->fetchAll(PDO::FETCH_OBJ);

?>