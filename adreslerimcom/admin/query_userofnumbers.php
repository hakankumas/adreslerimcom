<?php

$query = $db->prepare('SELECT * FROM user_numbers');
$query->execute();
$user_numbers = $query->fetchAll(PDO::FETCH_OBJ);

?>