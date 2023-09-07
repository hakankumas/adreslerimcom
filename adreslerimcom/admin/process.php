<title>adreslerim.com</title>
<link rel="icon" type="image/x-icon" href="tools/img/adreslerimcom.ico" />
<?php
include("connect.php");
session_start();
error_reporting(0);


// ADMİN GİRİŞ EKRANI //
if(isset($_POST["admin_login"])){
    if(empty($_POST["admin_username"]) || empty($_POST["admin_password"])){
        $message = '<label>All field is required</label>';
    }else{
        $query = "SELECT * FROM admin WHERE admin_username = :admin_username AND admin_password = :admin_password";
        $statement = $db->prepare($query);
        $statement->execute(
            array(
                'admin_username' => $_POST["admin_username"],
                'admin_password' => $_POST["admin_password"]
                )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $_SESSION["admin_username"] = $_POST["admin_username"];
            $_SESSION["admin_password"] = $_POST["admin_password"];
            $_SESSION["session"] = true;
            
            echo "Hoş Geldin "; echo $_SESSION["admin_username"];
            echo "</br>Yönlendiriliyorsunuz...";
            header('Refresh:3; index.php');
        }else{
            echo "Kimlik bilgileri doğru değil!<br>";
            echo "Tekrar deneyiniz...";
            header('Refresh:2; /adreslerimcom/adminlogin.php');
        }
    }
}


// ADMİN ŞİFRE GÜNCELLEME İŞLEMİ //
if(isset($_POST["admin_password_update"])){
    $admin_username = $_SESSION["admin_username"];
    $admin_password = $_SESSION["admin_password"];
    $post_admin_password = $_POST["post_admin_password"];
    $new_admin_password = $_POST["new_admin_password"];
    $new2_admin_password = $_POST["new2_admin_password"];

    if($admin_password == $post_admin_password){
        if($new_admin_password != $new2_admin_password){
            echo "Yeni şifreler örtüşmemektedir.";
            header('Refresh:2; password.php');
        }elseif($admin_password == $new_admin_password){
            echo "Şifreler zaten aynı!";
            header('Refresh:2; password.php');
        }else{
            $sorgu = $db->prepare("UPDATE admin SET admin_password =? 
            WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'");
            $ekle = $sorgu->execute([$new_admin_password]);
            if($ekle){
                $_SESSION["admin_password"] = $new_admin_password;
                echo "Şifreniz Başarıyla Güncellendi!";
                header('Refresh:2; password.php');
            }
        }
    }elseif($admin_password != $post_admin_password){
        echo "Mevcut şifreniz doğru değil!";
        header('Refresh:2; password.php');
    }
}


// ADMİN EKLEME İŞLEMİ //
if(isset($_POST['admin_add'])){
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    $sorgu = $db->prepare('INSERT INTO admin SET admin_username =?, admin_password =?');
    $ekle = $sorgu->execute([$admin_username, $admin_password]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; admin_add.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; admin_add.php');
    }
}

// DUYURU EKLEME İŞLEMİ //
if(isset($_POST['post_report'])){
    $report_text = $_POST["report_text"];

    $sorgu = $db->prepare('INSERT INTO admin_report SET report_text =?');
    $ekle = $sorgu->execute([$report_text]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; post_report.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; post_report.php');
    }
}


// ADMİNİN MESAJ GÖNDERME İŞLEMİ //
if(isset($_POST['create_message'])){
    $user_username = $_POST["user_username"];
    $message_text = $_POST["message_text"];

    $sorgu = $db->prepare('INSERT INTO admin_message SET user_username =?, message_text =?');
    $ekle = $sorgu->execute([$user_username, $message_text]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; create_message.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; create_message.php');
    }
}


// PLATFORM EKLEME İŞLEMİ //
if(isset($_POST["add_platform"])){
    $platform_name = $_POST["platform_name"];

    $platform_name = Transliterator::create('tr-title')->transliterate($platform_name);
    $platform_name_path = Transliterator::create('tr-lower')->transliterate($platform_name);

    require_once("tools/class.upload.php");
    $foo = new Upload($_FILES["platform_img"]);
    $foo->file_new_name_body = $platform_name_path;
    $foo->Process('upload/platform/');
    if($foo->processed){
        $path = "/adreslerimcom/admin/upload/platform/".$foo->file_dst_name;
    }
    
    $sorgu = $db->prepare("INSERT INTO platform SET platform_name =?, platform_img =?");
    $ekle = $sorgu->execute([$platform_name, $path]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; add_platform.php");
    }
    else{
        echo "hata";
    }
}





?>