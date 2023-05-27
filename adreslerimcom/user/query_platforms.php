<?php

$query = $db->prepare('SELECT * FROM platform');
$query->execute();
$platforms = $query->fetchAll(PDO::FETCH_OBJ);

?>