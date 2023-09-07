<?php

include("connect.php");


// KULLANICI ADRES LİNK BİLGİSİ SİL //
if(isset($_GET["user_platform_listid"])){
    $sorgu = $db->prepare('DELETE FROM user_platform WHERE user_platform_id=?');
    $sonuc = $sorgu->execute([$_GET['user_platform_listid']]);
    if($sonuc){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; user_link.php");
    }else{
        echo 0;
    }
}


?>
