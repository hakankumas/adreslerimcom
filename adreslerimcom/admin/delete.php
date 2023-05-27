<?php

include("connect.php");


// ADMİN SİL //
if(isset($_GET["adminlistid"])){
    $sorgu = $db->prepare('DELETE FROM admin WHERE admin_id=?');
    $sonuc = $sorgu->execute([$_GET['adminlistid']]);
    if($sonuc){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; admin_edit.php");
    }else{
        echo 0;
    }
}


// KULLANICI SİL //
if(isset($_GET["userlistid"])){
    $sorgu = $db->prepare('DELETE FROM user WHERE user_id=?');
    $sonuc = $sorgu->execute([$_GET['userlistid']]);
    if($sonuc){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; user_info.php");
    }else{
        echo 0;
    }
}


// DUYURU SİL //
if(isset($_GET["reportlistid"])){
    $sorgu = $db->prepare('DELETE FROM admin_report WHERE admin_report_id=?');
    $sonuc = $sorgu->execute([$_GET['reportlistid']]);
    if($sonuc){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; post_report.php");
    }else{
        echo 0;
    }
}


// KULLANICI MESAJINI SİL //
if(isset($_GET["usermessagelistid"])){
    $sorgu = $db->prepare('DELETE FROM usertoadmin WHERE usertoadmin_id=?');
    $sonuc = $sorgu->execute([$_GET['usermessagelistid']]);
    if($sonuc){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; user_messages.php");
    }else{
        echo 0;
    }
}

// ADMİN MESAJINI SİL //
if(isset($_GET["adminmessagelistid"])){
    $sorgu = $db->prepare('DELETE FROM admin_message WHERE admin_message_id=?');
    $sonuc = $sorgu->execute([$_GET['adminmessagelistid']]);
    if($sonuc){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; create_message.php");
    }else{
        echo 0;
    }
}

// PLATFORM SİL //
if(isset($_GET["platformlistid"])){
    $sorgu = $db->prepare('DELETE FROM platform WHERE platform_id=?');
    $sonuc = $sorgu->execute([$_GET['platformlistid']]);
    if($sonuc){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; add_platform.php");
    }else{
        echo 0;
    }
}











































?>
