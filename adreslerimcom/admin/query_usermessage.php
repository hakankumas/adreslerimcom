<?php

$query = $db->prepare('SELECT * FROM usertoadmin ORDER BY usertoadmin_id ASC');
$query->execute();
$message_list = $query->fetchAll(PDO::FETCH_OBJ);

?>