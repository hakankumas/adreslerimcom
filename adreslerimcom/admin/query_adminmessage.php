<?php

$query = $db->prepare('SELECT * FROM admin_message ORDER BY admin_message_id DESC');
$query->execute();
$message_list = $query->fetchAll(PDO::FETCH_OBJ);

?>