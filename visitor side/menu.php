<?php

require 'function.php';
$produk_makanan = query("SELECT * FROM produk WHERE tipe_produk = 'Makanan'");
$produk_minuman = query("SELECT * FROM produk WHERE tipe_produk = 'Minuman'");
$produk_toping = query("SELECT * FROM produk WHERE tipe_produk = 'Toping'");
$produk_snack = query("SELECT * FROM produk WHERE tipe_produk = 'Snack'");

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="../customer side/images/hutanta.png" type="" />

  <title>Menu</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

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


  <style>
    #konten {
      padding: 20px;
    }

    .cartbtn {
      color: #fff;
      position: relative;
      right: 40%;
      top: 100%;
      padding: 0.1px 0.1px;
      border-radius: 2px;
      font-size: 30px;
      transition: 0.1s;
    }

    .cartbtn:hover {
      color: #FFD93D;
      cursor: pointer;
    }

    .kotak img {
      -webkit-transition: 0.4s ease;
      transition: 0.4s ease;
      width: 700px;
    }

    #zoom-effect:hover .kotak img {
      -webkit-transform: scale(1.08);
      transform: scale(1.08);
    }
  </style>


</head>

<body class="sub_page">
  <div class="hero_area">
    <div class="bg-box">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container sticky-top fixed-top top-navm">
          <a class="navbar-brand" href="index.php">
            <img src="../customer side/images/hutanta.png" width="60px" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto menu">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
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
  </div>

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Menu</h2>
      </div>

      <ul class="filters_menu">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-makanan">Makanan</li>
        <li data-filter=".filter-minuman">Minuman</li>
        <li data-filter=".filter-toping">Toping</li>
        <li data-filter=".filter-snack">Snack</li>
      </ul>

      <div class="filters-content">
        <div class="row grid">
      <!-- style="height:250px" -->

          <?php foreach ($produk_makanan as $row) : ?>
            <a href="produk.php?id=<?= $row["id_produk"]; ?>">
              <div class="col-6 col-lg-3 all filter-makanan" >
                <div class="box card-produk" id="zoom-effect">
                  <div class="kotak">
                    <img src="../img/<?= $row["gambar_produk"]; ?>" class="img-fluid" alt="">
                  </div>
                  <div class="portfolio-info" id="konten">
                    <h6><?= $row["nama_produk"]; ?></h6>
                    <div class="spaceharga"></div>
                    <p><?= "Rp.", number_format($row["harga_produk"], 0, ',', '.'); ?></p>
                  </div>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
 
          <div class="produk">
            <?php foreach ($produk_minuman as $row) : ?>
              <a href="produk.php?id=<?= $row["id_produk"]; ?>">
                <div class="col-6 col-lg-3 all filter-minuman">
                  <div class="box card-produk" id="zoom-effect">
                    <div class="kotak">
                      <img src="../img/<?= $row["gambar_produk"]; ?>" class="img-fluid" alt="">
                    </div>
                    <div class="portfolio-info" id="konten">
                      <h6><?= $row["nama_produk"]; ?></h6>
                      <div class="spaceharga"></div>
                      <p><?= "Rp.", number_format($row["harga_produk"], 0, ',', '.'); ?></p>
                    </div>
                  </div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>

          <?php foreach ($produk_toping as $row) : ?>
            <a href="produk.php?id=<?= $row["id_produk"]; ?>">
              <div class="col-6 col-lg-3 all filter-toping">
                <div class="box card-produk" id="zoom-effect">
                  <div>
                    <img src="../img/<?= $row["gambar_produk"]; ?>" class="img-fluid" alt="">
                  </div class="kotak">
                  <div class="portfolio-info" id="konten">
                    <h6><?= $row["nama_produk"]; ?></h6>
                    <div class="spaceharga"></div>
                    <p><?= "Rp.", number_format($row["harga_produk"], 0, ',', '.'); ?></p>
                  </div>
                </div>
              </div>
            </a>
          <?php endforeach; ?>

          <?php foreach ($produk_snack as $row) : ?>
            <a href="produk.php?id=<?= $row["id_produk"]; ?>">
              <div class="col-6 col-lg-3 all filter-snack">
                <div class="box card-produk" id="zoom-effect">
                  <div>
                    <img src="../img/<?= $row["gambar_produk"]; ?>" class="img-fluid" alt="">
                  </div class="kotak">
                  <div class="portfolio-info" id="konten">
                    <h6><?= $row["nama_produk"]; ?></h6>
                    <div class="spaceharga"></div>
                    <p><?= "Rp.", number_format($row["harga_produk"], 0, ',', '.'); ?></p>
                  </div>
                </div>
              </div>
            </a>
          <?php endforeach; ?>


        </div>
      </div>
    </div>
  </section>

  <!-- end food section -->

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