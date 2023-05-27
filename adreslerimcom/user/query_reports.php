<?php

$query = $db->prepare('SELECT * FROM admin_report ORDER BY admin_report_id DESC');
$query->execute();
$reports_list = $query->fetchAll(PDO::FETCH_OBJ);

?>