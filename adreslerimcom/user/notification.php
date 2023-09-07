<?php
session_start();
$user_username = $_SESSION["user_username"];
$user_password = $_SESSION["user_password"];

if(!isset($_SESSION["session"])){
    header("location: /adreslerimcom/index.php");
}

include("header.php");
include("connect.php");
include("query_reports.php");
include("query_adminmessage.php");

?>

<!-- <link href="tools/footer.css" rel="stylesheet" /> -->
<br><br><br>
    <div class="container">
        <div class="col-lg-12 mt-5 pt-5">
            <h1 class="mb-4">Duyurular</h1>
            <table class="table table-bordered table-striped">
                <tr class="font-weight-bold">
                    <th hidden>Duyuru ID</th>
                    <th style="text-align: center;">Duyuru</th>
                    <th style="text-align: center;">Tarih</th>
                </tr>
                <?php foreach ($reports_list as $r_list){?>
                <tr>
                    <td hidden><?= $r_list->admin_report_id ?></td>
                    <td style="width: auto;"><?= $r_list->report_text ?></td>
                    <td style="width: auto;"><?= $r_list->report_date ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-lg-12 mt-5 pt-5">
            <h1 class="mb-4">Mesajlar</h1>
            <table class="table table-bordered table-striped">
                <tr class="font-weight-bold">
                    <th hidden>Mesaj ID</th>
                    <th style="text-align: center;">Mesaj</th>
                    <th style="text-align: center;">Tarih</th>
                </tr>
                <?php foreach ($message_list as $m_list){?>
                <tr>
                    <td hidden><?= $m_list->admin_message_id ?></td>
                    <td style="width: auto;"><?= $m_list->message_text ?></td>
                    <td style="width: auto;"><?= $m_list->message_date ?></td>
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