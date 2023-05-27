<?php
session_start();
$user_username = $_SESSION["user_username"];
$user_password = $_SESSION["user_password"];

if(!isset($_SESSION["session"])){
    header("location: /adreslerimcom/index.php");
}

include("header.php");
include("connect.php");
include("query_usermessage.php");

?>


<br><br><br>
    <div class="container">
        <div class="col-lg-6 mt-5 pt-5">
            <form action="process.php" method="post" class="form-signin">
                <h1>Talep Mesajı Yaz</h1>
                <i>*Sisteme yeni bir platform ekleme önerisinde bulunabilirsiniz!*</i>
                <div class="form-group mt-3" required>
                    <textarea class="form-control" placeholder="Talep Metni"
                        name="user_message" style="height: 200px;" autofocus></textarea>
                </div>
                <button type="submit" name="user_offer" class="btn btn-primary p-2 mt-3">GÖNDER</button>
            </form>
        </div>
        <div class="col-lg-12 mt-5 pt-5">
            <h1 class="mb-4">Daha Önce Yazdığınız Mesajlar</h1>
            <table class="table table-bordered table-striped">
                <tr class="font-weight-bold">
                    <th hidden>Mesaj ID</th>
                    <th style="text-align: center;">Mesaj</th>
                    <th style="text-align: center;">Tarih</th>
                </tr>
                <?php foreach ($message_list as $list){?>
                <tr>
                    <td hidden><?= $list->usertoadmin_id ?></td>
                    <td style="width: auto;"><?= $list->user_message ?></td>
                    <td style="width: auto;"><?= $list->message_date ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <br><br><br>

    <footer class="footer text-center">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="tools/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>