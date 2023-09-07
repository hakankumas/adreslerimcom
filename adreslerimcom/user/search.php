<?php

include("connect.php");


if(isset($_GET["user_username"])){
    $search = $_GET["user_username"];
    $search = Transliterator::create('tr-lower')->transliterate($search);
    $query = $db->prepare("SELECT * FROM user WHERE user_username = ?");
    $query->execute([$search]);
    $count = $query->rowCount();

    if($count>0){
        header("location: user-search.php?user_username=$search");
    }else{
        echo "<script>alert('Kullanıcı Bulunamadı!');</script>";
        header('Refresh:0; ../index.php');
    }





}






?>