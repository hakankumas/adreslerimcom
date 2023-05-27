<?php

include("tools/connect.php");
include("tools/query_linkofnumbers.php");
include("tools/query_userofnumbers.php");
include("tools/query_platformofnumbers.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>adreslerim.com</title>
  <meta content="Hakan KUMAŞ" name="description">
  <meta content="Hakan KUMAŞ, adreslerim" name="keywords">
  <link href="tools/img/adreslerimcom.ico" rel="icon">
  <link href="tools/img/adreslerimcom.ico" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="index.php"><span>adreslerim.com</span></a></h1>
        </div>
        <nav id="navbar" class="navbar pe-5">
          <ul>
            <li><a class="nav-link scrollto " href="#why-us">HAKKIMIZDA</a></li>
            <li><a class="nav-link scrollto" href="#footer">HİZMETLERİMİZ</a></li>
            <li><a class="nav-link scrollto pe-4" href="#footer">İLETİŞİM</a></li>
            <li><a class="nav-link scrollto bg-danger text-white rounded pe-4 me-4" href="register.php">KAYIT OL</a></li>
            <li class="dropdown bg-warning pe-4 rounded"><a href="#"><span>GİRİŞ YAP</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="userlogin.php">Kullanıcı</a></li>
                <li><a href="adminlogin.php">Yönetici</a></li>
              </ul>
            </li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      </div>
    </div>
  </header>
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Şimdi adreslerim.com ile tanış!</h1>
      <h2>TEK BİR LİNK ÜZERİNDEN TÜM ADRES BİLGİLERİNİ PAYLAŞ</h2>
      <a href="#counts" class="btn-get-started scrollto">KEŞFET</a>
    </div>
  </section>
  <main id="main">
    <section id="counts" class="counts">
      <div class="container">
        <div class="row counters">
          <div class="col-lg-4 col-4 text-center">
          <?php foreach ($user_numbers as $user_number) {?>
            <span data-purecounter-start="0" data-purecounter-end="<?= $user_number->user_number ?>" data-purecounter-duration="1" class="purecounter"></span>
          <?php } ?> 
            <p>Kullanıcı Sayısı</p>
          </div>
          <div class="col-lg-4 col-4 text-center">
          <?php foreach ($link_numbers as $link_number) {?>
            <span data-purecounter-start="0" data-purecounter-end="<?= $link_number->link_number ?>" data-purecounter-duration="1" class="purecounter"></span>
          <?php } ?> 
            <p>Paylaşılan Link Sayısı</p>
          </div>
          <div class="col-lg-4 col-4 text-center">
          <?php foreach ($platform_numbers as $platform_number) {?>
            <span data-purecounter-start="0" data-purecounter-end="<?= $platform_number->platform_number ?>" data-purecounter-duration="1" class="purecounter"></span>
          <?php } ?> 
            <p>Platform Sayısı</p>
          </div>
        </div>
      </div>
    </section>
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>adreslerim.com nedir?</h3>
              <p>
                Çeşitli sosyal medya platformlarındaki biyografi kısmında sadece bir medya adresi paylaşımına izin verilmektedir. Bu problemden yola çıkılarak adreslerim.com tasarlanmıştır.<br><br>adreslerim.com'a üye olarak profilinizi doldurabilir ve dilediğiniz kadar link paylaşımı yapabilirsiniz.<br><br>Unutmayın, adreslerim.com sizin adres defterinizdir. 
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-check-square"></i>
                    <h4>Üye Ol</h4>
                    <p>adreslerim.com'a üye olmak hızlı, basit ve ücretsizdir.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Profil Bilgilerini Doldur</h4>
                    <p>Profilini dilediğin gibi özelleştirebilirsin.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-link"></i>
                    <h4>Adres Bilgisi Paylaş</h4>
                    <p>Seninle iletişim kuracaklar için çeşitli platformlardaki adres bilgilerini paylaşabilirsin.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <!-- <div class="col-lg-5 col-md-6 footer-contact">
            <h3>İletişim</h3>
            <p>
              Hakan KUMAŞ <br>
              İzmir | Türkiye <br>
              hakankumas54@gmail.com<br><br>
            </p>
          </div> -->
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>İLETİŞİM</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hakan KUMAŞ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">İzmir | Türkiye</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">hakankumas54@gmail.com</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 footer-links">
            <h4>SİSTEM GİRİŞLERİ</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kullanıcı</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Yönetici</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>HİZMETLERİMİZ</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kişisel Portfolyo Oluşturma</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sosyal Medya Adres Paylaşımı</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>adreslerim.com</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://www.linkedin.com/in/hakankumas/" target="_blank">Hakan KUMAŞ</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://www.linkedin.com/in/hakankumas/" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
        <a href="https://github.com/hakankumas" class="github" target="_blank"><i class="bx bxl-github"></i></a>
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>