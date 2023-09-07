<?php

$query = $db->prepare('SELECT * FROM admin_message WHERE user_username =? ORDER BY admin_message_id DESC');
$query->execute([$user_username]);
$message_list = $query->fetchAll(PDO::FETCH_OBJ);

?>