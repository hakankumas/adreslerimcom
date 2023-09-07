<?php

$query = $db->prepare('SELECT * FROM admin ORDER BY admin_id ASC');
$query->execute();
$admin_list = $query->fetchAll(PDO::FETCH_OBJ);

?>