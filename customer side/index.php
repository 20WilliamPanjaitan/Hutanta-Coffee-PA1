<?php
session_start();
if (!isset($_SESSION["auth"])) {
  header("Location: login.php");
  exit;
}

require 'function.php';


// simpan id pelanggan
$idAkun = $_SESSION['id_akun'];
$query = mysqli_query($conn, "SELECT nama_lengkap FROM pelanggan WHERE id_akun = $idAkun");
$resultIdAkun = mysqli_fetch_assoc($query);

$ulasan = query("SELECT * FROM ulasan  INNER JOIN pelanggan ON ulasan.id_pelanggan = pelanggan.id_pelanggan WHERE status = 'Tampilkan'");
$total_ulasan = count($ulasan);



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
  <link rel="shortcut icon" href="images/hutanta.png" type="" />

  <title>Hutanta Coffee</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />


  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/style2.css" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class>
  <div class="hero_area">
    <div class="bg-box">
      <img src="images/back.jpg" alt="" />
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container sticky-top fixed-top top-nav">
          <a class="navbar-brand" href="index.php">
            <img src="images/hutanta.png" width="60px" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto menu">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu Restoran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="coffee.php">Kopi Toba</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Tentang</a>
              </li>
            </ul>
            <div class="user_option">
              <div class="space200px"></div>
              <a class="user_link" href="" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="nav-item"><?php echo $resultIdAkun['nama_lengkap']; ?></span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="keranjang.php">
                  <i class="fa fa-shopping-cart"></i>
                  Keranjang
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fa fa-sign-out"></i>
                  Keluar
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
                    <h1>Hutanta Coffee</h1>
                    <p>
                      Nikmati Hutanta Coffee, nikmat alami terbaik untuk pagi yang sempurna. Aroma kopi segar, cita rasa lezat, dan kehangatan yang menggoda. Pilihan biji kopi terbaik, diproses dengan cinta. Rasakan kekayaan rasa Hutanta Coffee dalam setiap tegukan </p>

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
                    <h1>Produk Terbaik</h1>
                    <p>
                      Alami, Segar, Lezat. Pilihan Biji Terbaik. Rasakan Keunikan Rasa. Kopi Premium untuk Anda. Hidupkan Semangat dengan Hutanta. Aroma Memikat, Kenikmatan Tak Tergantikan.
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
                    <h1>Nikmati Sekarang!</h1>
                    <p>
                      Di Hutanta Coffee, kami bangga memberikan keunggulan. Kami percaya dalam memberikan yang terbaik kepada pelanggan kami, mulai dari bahan baku terbaik hingga keahlian kerajinan terampil
                    </p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- offer section -->


  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>Kopi Spesial Untuk Mu</h2>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="box">
              <div class="img-box gambar">
                <img class="kopi_bubuk" src="../customer side/images/Kopi Toba Robusta.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5 style="font-family: Georgia">Kopi Toba Robusta</h5>
                <h6><span>Rp</span> 48.000</h6>
                <a href="coffee.php">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i> Pesan Sekarang
                  <!-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background: new 0 0 456.029 456.029" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                  </svg> -->
                </a>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="box">
              <div class="img-box">
                <img src="../customer side/images/Kopi Toba Arabica.jpg" alt="" />
              </div>
              <div class="detail-box">
                <h5 style="font-family: Georgia">Kopi Toba Arabica</h5>
                <h6><span>Rp</span> 56.000</h6>
                <a href="coffee.php">
                  <i class="fa fa-whatsapp" aria-hidden="true"></i> Pesan Sekarang
                  <!-- <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background: new 0 0 456.029 456.029" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                  </svg> -->
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end offer section -->
  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6" data-aos="zoom-out-right" data-aos-delay="1000">
          <div class="img-box">
            <img src="images/unnamed.jpg" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Kami Hutanta</h2>
            </div>
            <p>
              Mari jelajahi petualangan tak terlupakan di Hutanta Coffee, tempat di mana keindahan alam memukau, rasa kopi memikat, dan hidangan lezat berpadu harmonis. Mari eksplorasi ruang indah, dengan sentuhan artistik dan cahaya mempesona yang menggugah hati. Nikmati aroma menggoda, hidangan kreatif, dan keahlian barista yang memanjakan. Rasakan cita rasa yang memukau, hanyut dalam kenikmatan tak terlupakan. Mari bersama menikmati keindahan, cita rasa kopi, dan hidangan yang menggugah selera di Hutanta Coffee.
            </p>
            <a href="about.php"> Lanjutkan Membaca </a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- book section -->
  <section class="book_section layout_padding"  style="margin-bottom:-100px">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>Detail Lokasi</h2>
      </div>
      <div class="row">

        <div class="col-md-12">
          <div class="map_container">
            <div id="" class="col-md-12"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d510298.04833093984!2d98.9631968370213!3d2.2641523661347858!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e057e268a211d%3A0x8a2c3d5bd45ef7ee!2sHutanta%20Cafe!5e0!3m2!1sid!2sid!4v1684676168605!5m2!1sid!2sid" width="1500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>Tour Virtual</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="map_container">
            <div id="" class="col-md-12"> <iframe src="https://www.google.com/maps/embed?pb=!4v1675388914473!6m8!1m7!1sCAoSLEFGMVFpcE50djBHVElid1NyYnd1R1pyNjRfVmxDWVdXQUFiNzNqUzhkOVQ1!2m2!1d2.3383282!2d99.0812811!3f279.61295577532684!4f-14.747228785011174!5f1.5202423629733701" width="1500" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end book section -->


  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>Ulasan (<?php echo $total_ulasan; ?>)</h2>
      </div>
      <div class="carousel-wrap row">
        <div class="owl-carousel client_owl-carousel">
          <?php foreach ($ulasan as $row) : ?>
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <p style="font-family: verdana;"> <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <?= $row["nama_lengkap"]; ?></p>
                  <p><?= $row["pesan"]; ?></p>
                  <p><?= $row["tanggal"]; ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo"> <img src="images/hutanta.png" /><br /> </a>
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