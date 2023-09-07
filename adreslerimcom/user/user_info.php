<?php
session_start();
$user_username = $_SESSION["user_username"];
$user_password = $_SESSION["user_password"];

if(!isset($_SESSION["session"])){
    header("location: /adreslerimcom/index.php");
}

include("header.php");
include("connect.php");
include("query_userinfo.php");


?>
<link rel="stylesheet" type="text/css" href="tools/jquery-ui.min.css">

<br><br>
    <div class="container">
        <div class="col-lg-6 mt-5 pt-5">
            <form action="process.php" method="post" class="form-signin" enctype="multipart/form-data">
                <h1>Profil Resmini Güncelle</h1>
                <input type="file" name="user_img" class="form-control mt-3" required>
                <button type="submit" name="user_pp_update" class="btn btn-primary p-2 mt-3">GÜNCELLE</button>
            </form>
        </div>
        <div class="col-lg-6 mt-5 pt-5">
            <form action="process.php" method="post" class="form-signin">
                <h1>Kişisel Bilgilerini Güncelle</h1>
                <?php foreach($user_list as $list){?>
                <div class="form-group mt-3">
                    <label for="user_name">Ad</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?= $list->user_name ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="user_surname">Soyad</label>
                    <input type="text" class="form-control" id="user_surname" name="user_surname" value="<?= $list->user_surname ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="gender_id">Cinsiyet</label>
                    <select name="gender_id" id="gender_id" class="form-control">
                        <option value="<?= $list->gender_id ?>" disabled selected><?= $list->gender_name ?></option>
                        <option value="1">Erkek</option>
                        <option value="2">Kadın</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="user_birthday">Doğum Tarihi</label>
                    <input type="datetime" class="form-control" id="user_birthday" name="user_birthday" value="<?= $list->user_birthday ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="user_tel">Telefon</label>
                    <input type="tel" class="form-control" maxlength="10" id="user_tel" name="user_tel" value="<?= $list->user_tel ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="user_mail">Mail</label>
                    <input type="email" class="form-control" id="user_mail" name="user_mail" value="<?= $list->user_mail ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="user_about">Biyografi</label>
                    <input type="text" class="form-control" id="user_about" name="user_about" value="<?= $list->user_about ?>">
                </div>
            <?php } ?>
                <button type="submit" name="user_info_update" class="btn btn-primary p-2 mt-3">GÜNCELLE</button>
            </form>
        </div>
    </div>
    <br><br><br><br><br>
    <footer class="footer text-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="mb-4">Social Media</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.linkedin.com/in/hakankumas/" target="_blank"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/hakankumas" target="_blank"><i class="fab fa-fw fa-github"></i></a>
                </div>
                <div class="col-lg-4">
                    <p class="lead mb-4">Designed & Distributed by</p>
                    <p class="lead mb-0"><a href="https://www.linkedin.com/in/hakankumas/" target="_blank">Hakan KUMAŞ</a></p>
                </div>
                <div class="col-lg-4">
                    <p class="lead mb-4">Copyright © adreslerim.com 2023</p>
                    <p class="lead mb-0">All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="tools/jquery-3.3.1.min.js"></script>  
    <script src="tools/jquery-ui.min.js"></script> 
    <script>
        $(document).ready(function(){
            $('#user_birthday').datepicker({
                dateFormat:"yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        })
    </script>


<?php

// include("footer.php");

?>