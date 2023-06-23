<?php
require 'function.php';


$konten = query("SELECT * FROM konten WHERE keterangan = 'kopi toba'");
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="../customer side/images/hutanta.png" type="" />

  <title>Kopi Toba</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!-- data aos -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class>
  <script>
    AOS.init();
  </script>
  <div class="hero_area coffee">
    <div class="bg-box">
      <video class="w-100" autoplay loop muted>
        <source src="../customer side/videos/hero.mp4" type="video/mp4" />
      </video>
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container sticky-top fixed-top top-nav">
          <a class="navbar-brand" href="index.php">
            <img src="../customer side/images/hutanta.png" width="60px" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto menu">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="coffee.php">Kopi Toba</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Tentang</a>
              </li>
            </ul>
            <div class="user_option">
              <div class="space200px"></div>
              <a class="user_link" href="" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="nav-item"></span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="login.php">
                  <i class="fa fa-sign-in"></i>
                  Login
                </a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6">
                  <div class="detail-box">
                    <h1>Kopi Toba Hutanta</h1>
                    <p>
                      Jalani hari anda dengan kesejukan dan kenikmatan kopi yang memikat dalam setiap tegukan. Kopi, aroma yang menenangkan, menari di dalam cangkir dengan sentuhan elegan yang membangkitkan indera Anda. Rasakan sentuhan keajaiban di setiap seduhan dengan varietas biji kopi pilihan kami yang disangrai dengan sempurna. Dari aroma harum yang memikat hingga rasa yang menghanyutkan, kopinya menjadi simfoni yang memanjakan lidah dan menyapa jiwa.
                    </p>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6">
                  <div class="detail-box">
                    <h1>Mulai Hari Anda Dengan Kopi</h1>
                    <p>
                      Kehangatan yang memeluk, aroma yang menggoda, dan rasa yang memukau - produk kopi kami membawa Anda dalam perjalanan sensorik yang tak terlupakan, menghidupkan kembali semangat dan memanjakan lidah Anda setiap saat.
                    </p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- end slider section -->
  </div>




  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row space">
        <div class="col-md-4">
          <div class="img-box">
            <video class="w-100 about_video" autoplay loop muted>
              <source src="videos/kopi.mp4" type="video/mp4" />
            </video>
          </div>
        </div>
        <div class="col-md-2">
          <!-- space -->
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Cita Rasa Kopi</h2>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000">
              <p>
                Mari kita merasakan kenikmatan yang tiada tara dengan secangkir kopi di Hutanta Coffee. Rasakan sentuhan lembut aroma kopi yang menguar, memikat indera dan menenangkan jiwa. Nikmati setiap tegukan, dengan hati yang terbuka untuk merasakan perpaduan sempurna antara kekayaan rasa dan kehangatan yang melintasi bibir. Biarkan diri Anda terhanyut dalam keindahan setiap seduhan, sambil menghargai karya seni yang tercipta dari proses penggilingan dan penyeduhan dengan penuh keahlian. Di Hutanta Coffee, setiap cangkir adalah sebuah pengalaman yang memanjakan selera dan mengajak kita untuk melambat sejenak, menikmati kelezatan kopi dan menghadirkan kebahagiaan dalam setiap tegukan. </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row space">

        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Robusta & Empresso</h2>
            </div>
            <div data-aos="fade-right" data-aos-duration="1000">
              <p>
                Kopi Robusta: Rasakan kekuatan dan keberanian dalam setiap tegukan kopi Robusta ini. Dengan karakteristik yang kuat dan kafein yang menggelora, kopi Robusta menghadirkan kelebihannya yang khas dengan aroma yang menggoda dan rasa yang penuh badai. Kopi Empreso: Temukan kemewahan dan keanggunan dalam setiap tetes kopi Empreso. Dibudidayakan dengan penuh perhatian, kopi Empreso menawarkan cita rasa yang halus dan elegan, dengan aroma yang memikat dan kelembutan yang memanjakan lidah.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <!-- space            -->
        </div>
        <div class="col-md-4">
          <div class="img-box">
            <img src="../customer side/images/kopi1.jpg" alt="" class="img-circle" />
          </div>
        </div>

      </div>

      <div class="row space">
        <div class="col-md-4">
          <div class="img-box">
            <img src="../customer side/images/unnamed.jpg" alt="" />
          </div>
        </div>
        <div class="col-md-2">
          <!-- space -->
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Arabica & Blend</h2>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000">
              <p>
                Kopi Arabica: Biarkan diri Anda terbawa dalam keindahan dan kelembutan kopi Arabica. Dikenal dengan cita rasa yang halus dan kompleks, kopi Arabica menawarkan kelezatan yang lembut dengan aroma yang memesona. Setiap tegukan merupakan sebuah petualangan rasa yang tak terlupakan. Kopi Blend: Merasakan harmoni dalam setiap tetes kopi blend yang diciptakan dengan cinta dan ketelitian. Melalui perpaduan kopi pilihan terbaik, kopi blend menghasilkan cita rasa yang seimbang dan unik, menghadirkan kelezatan yang memikat dengan karakter yang unik dan komplementer. Nikmati pengalaman yang menggabungkan keunggulan dari berbagai varietas kopi dalam satu cangkir yang menyenangkan.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>




  <!-- offer section -->
  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>Kopi Spesial Untuk Mu</h2>
        </div>
        <div class="row" id="carouselExample" class="">
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="../customer side/images/Kopi Toba Robusta.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5 style="font-family: Georgia">Kopi Toba Robusta</h5>
                <h6><span>Rp</span> 48.000</h6>
                <a href="whatsapp://send?text=Hallo%20Hutanta%20Coffee%2C%20saya%20ingin%20melakukan%20pemesanan%20produk.%0ANama%3A%20(Diisi%20nama%20lengkap)%0AAlamat%3A%20(Jalan%2C%20No%2C%20Gang%2C%20RT%2FRW%2FDusun%2C%20Kel%2C%20Kec%2C%20Kab%2FKota%2C%20Provinsi%2C%20Kode%20Pos)%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20No%20Telepon%3A%20(No%20aktif%20yang%20bisa%20dihubungi)%0AOrder%20%3A%20Kopi%20Toba%20Robusta%0AHarga%C2%A0%3A%C2%A0Rp%C2%A048.000&phone=+6285783303761">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i> Pesan Sekarang
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="../customer side/images/Kopi Toba Arabica.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5 style="font-family: Georgia">Kopi Toba Arabica</h5>
                <h6><span>Rp</span> 56.000</h6>
                <a href="whatsapp://send?text=Hallo%20Hutanta%20Coffee%2C%20saya%20ingin%20melakukan%20pemesanan%20produk.%0ANama%3A%20(Diisi%20nama%20lengkap)%0AAlamat%3A%20(Jalan%2C%20No%2C%20Gang%2C%20RT%2FRW%2FDusun%2C%20Kel%2C%20Kec%2C%20Kab%2FKota%2C%20Provinsi%2C%20Kode%20Pos)%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20No%20Telepon%3A%20(No%20aktif%20yang%20bisa%20dihubungi)%0AOrder%20%3A%20Kopi%20Toba%20Arabica%0AHarga%C2%A0%3A%C2%A0Rp%C2%A056.000&phone=+6285783303761">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i> Pesan Sekarang
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="../customer side/images/Kopi Toba Empresso.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5 style="font-family: Georgia">Kopi Toba Empresso</h5>
                <h6><span>Rp</span> 56.000</h6>
                <a href="whatsapp://send?text=Hallo%20Hutanta%20Coffee%2C%20saya%20ingin%20melakukan%20pemesanan%20produk.%0ANama%3A%20(Diisi%20nama%20lengkap)%0AAlamat%3A%20(Jalan%2C%20No%2C%20Gang%2C%20RT%2FRW%2FDusun%2C%20Kel%2C%20Kec%2C%20Kab%2FKota%2C%20Provinsi%2C%20Kode%20Pos)%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20No%20Telepon%3A%20(No%20aktif%20yang%20bisa%20dihubungi)%0AOrder%20%3A%20Kopi%20Toba%20Empresso%0AHarga%C2%A0%3A%C2%A0Rp%C2%A056.000&phone=+6285783303761">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i> Pesan Sekarang
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="../customer side/images/Kopi Toba Blend.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5 style="font-family: Georgia">Kopi Toba Blend</h5>
                <h6><span>Rp</span> 50.000</h6>
                <a href="whatsapp://send?text=Hallo%20Hutanta%20Coffee%2C%20saya%20ingin%20melakukan%20pemesanan%20produk.%0ANama%3A%20(Diisi%20nama%20lengkap)%0AAlamat%3A%20(Jalan%2C%20No%2C%20Gang%2C%20RT%2FRW%2FDusun%2C%20Kel%2C%20Kec%2C%20Kab%2FKota%2C%20Provinsi%2C%20Kode%20Pos)%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20No%20Telepon%3A%20(No%20aktif%20yang%20bisa%20dihubungi)%0AOrder%20%3A%20Kopi%20Toba%20Blend%0AHarga%C2%A0%3A%C2%A0Rp%C2%A050.000&phone=+6285783303761">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i> Pesan Sekarang
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->


  <!-- Gallery -->
  <div class="heading_container heading_center">
    <h2>Our Sweet Coffee Galery</h2>
  </div>


  <section class="gallery min-vh-100">
    <div class="container-lg">
      <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
        <?php foreach ($konten as $row) : ?>
          <div class="col">
            <img src="../img/<?= $row["gambar"]; ?>" class="gallery-item" alt="gallery">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="logout.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>


  <!-- footer section -->
  <footer class="footer_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-col">
            <div class="footer_detail">
              <a href="" class="footer-logo"> <img src="../customer side/images/hutanta.png" /><br /> </a>
            <p>Jl. P. Siantar No.KM 2, Sibola Hotangsas, Kec.Balige, Toba, Sumatera Utara</p>
            <div class="footer_social">
              <a href="https://www.facebook.com/hutantacom">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://www.youtube.com/@hutantacoffee">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
              <a href="https://www.instagram.com/hutantacoffee/">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>Contact Us</h4>
            <div class="contact_link_box">
              <a href="https://www.google.com/maps/dir/2.9502843,99.0681676/hutanta+cofee/@2.645528,98.7676355,10z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x302e057e268a211d:0x8a2c3d5bd45ef7ee!2m2!1d99.0812991!2d2.3382527?entry=ttu">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Location </span>
              </a>
              <a href="whatsapp://send?phone=+628113921607&text=Halo%20Admin%20Hutanta">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                <span> WhatsApp </span>
              </a>
              <a href="mailto:hutantacafe@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> hutantacafe@gmail.com </span>
              </a>
            </div>
          </div>
        </div>

        <div class="col-md-4 footer-col">
          <h4>Opening Hours</h4>
          <p>Week-Days</p>
          <p>11.45 -23.00 </p>
          <p>Week-End</p>
          <p>11.45 -00.00 </p>
        </div>
      </div>
      <div class="footer-info">
        <p>&copy; <span id="displayYear"></span> All Rights Reserved By Hutanta Coffee</a><br /><br /></p>
      </div>
    </div>
  </footer>
  <!-- footer section -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script src="js/swiper-bundle.min.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
  <script type="text/javascript">
    var nav = document.querySelector("nav");

    window.addEventListener("scroll", function() {
      if (window.pageYOffset > 100) {
        nav.classList.add("bg-dark", "shadow");
      } else {
        nav.classList.remove("bg-dark", "shadow");
      }
    });
  </script>
</body>

</html>