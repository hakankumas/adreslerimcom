<?php
session_start();
$user_username = $_SESSION["user_username"];
$user_password = $_SESSION["user_password"];

if(!isset($_SESSION["session"])){
    header("location: /adreslerimcom/index.php");
}

include("header.php");
include("connect.php");
include("query_platforms.php");
include("query_platforminfo.php");

?>

<!-- <link href="tools/footer.css" rel="stylesheet" /> -->
<br><br><br>
    <div class="container">
        <div class="col-lg-6 mt-5 pt-5">
            <form action="process.php" method="post" class="form-signin">
                <h1 class="mb-4">Adres Ekle</h1>
                <select name="platform_id" class="form-control mt-3" required autofocus>
                    <option value="" disabled selected>Platform</option>
                    <?php foreach ($platforms as $platform){?>
                    <option value="<?= $platform->platform_id ?>">
                    <?= $platform->platform_name ?></option>
                    <?php } ?>
                </select>
                <div class="form-group mt-3" required>
                    <textarea class="form-control" placeholder="Link Adresi"
                        name="link_address" style="height: 100px;"></textarea>
                </div>
                <button type="submit" name="user_platform_add" class="btn btn-primary p-2 mt-3">ADRES EKLE</button>
            </form>
        </div>
        <div class="col-lg-6 mt-5 pt-5">
            <h1 class="mb-4">Adreslerim</h1>
            <table class="table table-bordered table-striped">
                <tr class="font-weight-bold">
                    <th hidden>Kullanıcı Platform ID</th>
                    <th hidden>Platform ID</th>
                    <th style="text-align: center;">Platform Ad</th>
                    <th style="text-align: center;">Adres Linki</th>
                    <th style="text-align: center;">Sil</th>
                </tr>
                <?php foreach ($platform_list as $p_list){?>
                <tr>
                    <td hidden><?= $p_list->user_platform_id ?></td>
                    <td hidden><?= $p_list->platform_id ?></td>
                    <td style="width: 200px; text-align: center;"><?= $p_list->platform_name ?></td>
                    <td style="width: 200px; text-align: center;"><?= $p_list->link_address ?></td>
                    <td style="width: 100px; text-align: center;"><a href="delete.php?user_platform_listid=<?= $p_list->user_platform_id ?>" class="btn btn-danger">Sil</a></td>
                </tr>
                <?php } ?>
            </table>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="tools/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>