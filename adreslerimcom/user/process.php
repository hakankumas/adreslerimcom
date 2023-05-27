<title>adreslerim.com</title>
<link rel="icon" type="image/x-icon" href="tools/img/adreslerimcom.ico" />
<?php
include("connect.php");
session_start();
error_reporting(0);


// KULLANICI GİRİŞ EKRANI //
if(isset($_POST["user_login"])){
    if(empty($_POST["user_username"]) || empty($_POST["user_password"])){
        $message = '<label>All field is required</label>';
    }else{
        $query = "SELECT * FROM user WHERE user_username = :user_username AND user_password = :user_password";
        $statement = $db->prepare($query);
        $statement->execute(
            array(
                'user_username' => $_POST["user_username"],
                'user_password' => $_POST["user_password"],

                )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $_SESSION["user_username"] = $_POST["user_username"];
            $_SESSION["user_password"] = $_POST["user_password"];
            $_SESSION["session"] = true;
            echo "Hoş Geldin "; echo $_SESSION["user_username"];
            echo "</br>Yönlendiriliyorsunuz...";
            header('Refresh:3; user.php');
        }else{
            echo "Kimlik bilgileri doğru değil!<br>";
            echo "Tekrar deneyiniz...";
            header('Refresh:2; /adreslerimcom/userlogin.php');
        }
    }
}


// KULLANICI ŞİFRE GÜNCELLEME EKRANI //
if(isset($_POST["user_password_update"])){
    $user_username = $_SESSION["user_username"];
    $user_password = $_SESSION["user_password"];
    $post_user_password = $_POST["post_user_password"];
    $new_user_password = $_POST["new_user_password"];
    $new2_user_password = $_POST["new2_user_password"];

    $sorgu = $db->prepare("SELECT * FROM user WHERE user_username = '$user_username' AND user_password = '$user_password'");
    $ekle = $sorgu->execute();
    if($user_password == $post_user_password){
        if($new_user_password != $new2_user_password){
            echo "Yeni şifreler örtüşmemektedir.";
            header('Refresh:2; user_password.php');
        }elseif($user_password == $new_user_password){
            echo "Şifreler zaten aynı!";
            header('Refresh:2; user_password.php');
        }else{
            $sorgu2 = $db->prepare("UPDATE user SET user_password =? 
            WHERE user_username = '$user_username' AND user_password = '$user_password'");
            $ekle = $sorgu2->execute([$new_user_password]);
            if($ekle){
                $_SESSION["user_password"] = $new_user_password;
                echo "Şifreniz Başarıyla Güncellendi!";
                header('Refresh:2; user_password.php');
            }
        }
    }elseif($user_password != $post_user_password){
        echo "Mevcut şifreniz doğru değil!";
        header('Refresh:2; user_password.php');
    }
}

// KULLANICI BİLGİ EKLEME EKRANI //
if(isset($_POST['user_info_update'])){
    $user_username = $_SESSION["user_username"];
    $user_password = $_SESSION["user_password"];
    $user_name = $_POST["user_name"];
    $user_surname = $_POST["user_surname"];
    $gender_id = $_POST["gender_id"];
    $user_birthday = $_POST["user_birthday"];
    $user_tel = $_POST["user_tel"];
    $user_mail = $_POST["user_mail"];
    $user_about = $_POST["user_about"];

    $user_name = Transliterator::create('tr-title')->transliterate($user_name);
    $user_surname = Transliterator::create('tr-upper')->transliterate($user_surname);

    if($user_name == NULL){$user_name = NULL;}
    if($user_surname == NULL){$user_surname = NULL;}
    if($gender_id == NULL){$gender_id = NULL;}
    if($user_birthday == NULL){$user_birthday = NULL;}
    if($user_tel == NULL){$user_tel = NULL;}
    if($user_mail == NULL){$user_mail = NULL;}
    if($user_about == NULL){$user_about = NULL;}

    $sorgu = $db->prepare("UPDATE user SET user_name =?, user_surname =?, gender_id =?, user_birthday =?, 
    user_tel =?, user_mail =?, user_about =?
    WHERE user_username = '$user_username' AND user_password = '$user_password'");
    $ekle = $sorgu->execute([$user_name, $user_surname, $gender_id, $user_birthday, 
    $user_tel, $user_mail, $user_about]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; user_info.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_info.php');
    }
}


// KULLANICI LİNK ADRESİ EKLEME İŞLEMİ //
if(isset($_POST['user_platform_add'])){
    $user_username = $_SESSION["user_username"];
    $platform_id = $_POST["platform_id"];
    $link_address = $_POST["link_address"];

    $sorgu = $db->prepare('INSERT INTO user_platform SET user_username =?, platform_id =?, link_address =?');
    $ekle = $sorgu->execute([$user_username, $platform_id, $link_address]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; user_link.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_link.php');
    }
}


// KULLANICI PROFİL FOTOĞRAFI GÜNCELLEME EKRANI //
if(isset($_POST["user_pp_update"])){
    $user_username = $_SESSION["user_username"];
    $user_password = $_SESSION["user_password"];

    require_once("tools/class.upload.php");
    $foo = new Upload($_FILES["user_img"]);
    $foo->file_new_name_body ='user_'.$user_username;
    $foo->Process('upload/');
    if($foo->processed){
        $path = "upload/".$foo->file_dst_name;
    }
    
    $sorgu = $db->prepare("UPDATE user SET user_img =? 
    WHERE user_username = '$user_username' AND user_password = '$user_password'");
    $ekle = $sorgu->execute([$path]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; user.php");
    }
    else{
        echo "hata";
    }
}


// KULLANICI ADMİNE MESAJ GÖNDERME İŞLEMİ //
if(isset($_POST['user_offer'])){
    $user_username = $_SESSION["user_username"];
    $user_message = $_POST["user_message"];

    $sorgu = $db->prepare('INSERT INTO usertoadmin SET user_username =?, user_message =?');
    $ekle = $sorgu->execute([$user_username, $user_message]);
    if($ekle){
        echo "İşleminiz gerçekleştirildi...<br>";
        echo "Yönlendiriliyorsunuz!";
        header("Refresh:2; user_offer.php");
    }else{
        echo "Bir Hata Oluştu. Tekrar Deneyiniz...";
        header('Refresh:2; user_offer.php');
    }
}




// KULLANICI KAYIT EKRANI //
if(isset($_POST["register"])){
    $user_username = $_POST["user_username"];
    $user_password = $_POST["user_password"];
    $user_password2 = $_POST["user_password2"];

    $query = $db->prepare('SELECT * FROM user WHERE user_username =?');
    $query->execute([$user_username]);
    $user_list = $query->fetchAll(PDO::FETCH_OBJ);
    foreach($user_list as $list){
        $returned = $list->user_username;
    }
    if($returned != NULL){
        echo "Kullanıcı adı kullanılmaktadır.</br>";
        echo "Lütfen başka bir kullanıcı adı seçiniz.</br>";
        echo "Yönlendiriliyorsunuz...";
        header('Refresh:2; /adreslerimcom/register.php');
    }elseif($user_list == NULL){
        if($user_password != $user_password2){
            echo "Yeni şifreler örtüşmemektedir.</br>";
            echo "Yönlendiriliyorsunuz...";
            header('Refresh:2; /adreslerimcom/register.php');
        }else{
            $sorgu2 = $db->prepare("INSERT INTO user SET user_username =?, user_password =?");
            $ekle2 = $sorgu2->execute([$user_username, $user_password]);
            echo "Kaydınız başarıyla oluşturuldu.</br>";
            echo "Yönlendiriliyorsunuz...";
            header('Refresh:3; /adreslerimcom/userlogin.php');
        }
    }
}








?>