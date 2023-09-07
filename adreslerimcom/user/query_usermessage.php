<?php

$query = $db->prepare('SELECT * FROM usertoadmin WHERE user_username =? ORDER BY usertoadmin_id DESC');
$query->execute([$user_username]);
$message_list = $query->fetchAll(PDO::FETCH_OBJ);

?>