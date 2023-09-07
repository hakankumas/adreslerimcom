<?php

$query = $db->prepare('SELECT * FROM platform_numbers');
$query->execute();
$platform_numbers = $query->fetchAll(PDO::FETCH_OBJ);

?>