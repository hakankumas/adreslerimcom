<?php

$query = $db->prepare('SELECT * FROM platform ORDER BY platform_name ASC');
$query->execute();
$platform_names = $query->fetchAll(PDO::FETCH_OBJ);

?>