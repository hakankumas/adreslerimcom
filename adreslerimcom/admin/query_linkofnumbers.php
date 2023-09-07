<?php

$query = $db->prepare('SELECT * FROM link_numbers');
$query->execute();
$link_numbers = $query->fetchAll(PDO::FETCH_OBJ);

?>