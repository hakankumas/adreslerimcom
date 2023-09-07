<?php

$user_username = htmlspecialchars($_GET['user_username']);

include("connect.php");
include("query_userinfo.php");
include("query_platforminfo.php");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>adreslerim.com</title>
        <link rel="icon" type="image/x-icon" href="tools/img/adreslerimcom.ico" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="tools/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="user.php">adreslerim.com</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <?php foreach ($user_list as $list){?>
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <img style="width:300px; height:300px; border-radius: 100px; display: block; margin: auto;" src="<?= $list->user_img ?>">
                <h1 class="masthead-heading mt-5 mb-3"><?= "$list->user_name $list->user_surname" ?></h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <p class="masthead-subheading font-weight-light mb-0"><?= $list->user_about ?></p>
            </div>
        </header>
        <?php } ?>
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">ADRESLERİM</h2>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <?php foreach ($platform_list as $p_list){?>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="<?= $p_list->link_address ?>" target="_blank"><img class="img-fluid" style="width:100px; height:100px; border-radius: 100px; display: block; margin: auto;" src="<?= $p_list->platform_img ?>"/></a>                           
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
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
