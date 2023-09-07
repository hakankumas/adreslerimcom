<?php
session_start();
$user_username = $_SESSION["user_username"];
$user_password = $_SESSION["user_password"];

if(!isset($_SESSION["session"])){
    header("location: /adreslerimcom/index.php");
}

include("header.php");

?>
<link href="tools/footer.css" rel="stylesheet" />
<br><br><br>
    <div class="container">
        <div class="col-lg-6 mt-5 pt-5">
            <form action="process.php" method="post" class="form-signin">
                <h1>Şifre Güncelle</h1>
                <input type="text" name="post_user_password" class="form-control mt-3" placeholder="Mevcut Şifre" autofocus>
                <input type="text" name="new_user_password" class="form-control mt-3" placeholder="Yeni Şifre Belirleyin">
                <input type="text" name="new2_user_password" class="form-control mt-3" placeholder="Yeni Şifreyi Tekrarlayın">
                <button type="submit" name="user_password_update" class="btn btn-primary p-2 mt-3">GÜNCELLE</button>
            </form>
        </div>
    </div>
<br><br><br>
<?php

include("footer.php");

?>