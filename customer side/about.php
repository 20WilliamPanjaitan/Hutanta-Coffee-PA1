<?php
session_start();
if (!isset($_SESSION["auth"])) {
  header("Location: login.php");
  exit;
}

require 'function.php';
$konten = query("SELECT * FROM konten");


// simpan id pelanggan
$idAkun = $_SESSION['id_akun'];
$query = mysqli_query($conn, "SELECT * FROM pelanggan INNER JOIN akun ON akun.id_akun = pelanggan.id_akun WHERE pelanggan.id_akun = $idAkun");
$resultIdAkun = mysqli_fetch_assoc($query);



$ulasan = query("SELECT * FROM ulasan INNER JOIN pelanggan ON ulasan.id_pelanggan = pelanggan.id_pelanggan WHERE status = 'Tampilkan'");
$total_ulasan = count($ulasan);


if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
  $disabled = ''; // Tombol diaktifkan
} else {
  $disabled = 'disabled'; // Tombol dinonaktifkan
}


if (isset($_POST["submit"])) {
  //cek apakah data berhasil ditambahkan atau tidak
  if (tambah_ulasan($_POST) > 0) {
    echo "
      <script>
      alert('Ulasan Berhasil Ditambahkan');
      document.location.href = 'index.php';
      </script>
  ";
  } else {
    echo " <script>
  alert('Data Gagal Ditambahkan');
  document.location.href = 'about.php';
  </script>
  ";
  }
}

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

  <link rel="shortcut icon" href="images/hutanta.png" type="image/png" />


  <title>Tentang</title>

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
  <div class="hero_area">
    <div class="bg-box">
      <img src="images/6.png" alt="" />
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
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu Restoran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="coffee.php">Kopi Toba</a>
              </li>
              <li class="nav-item active">
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
                  Logout
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
                    <div class="btn-box">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container">
            </ol>
          </div>
        </div>
    </section>
  </div>
  <br></br>
  <br></br>

  <!-- content -->

  <div class="container">
    <div data-aos="zoom-in" data-aos-duration="1000" class="heading_container heading_center" id="desc">
      <h2>Perjalanan Kami</h2>
      <h6>Hutanta Coffee merupakan salah satu UMKM yang terletak di kecamatan Balige Kabupaten Toba. UMKM ini didirikan pada tahun 2018 oleh Bapak Eko Pardede, Meskipun UMKM ini terbilang belum lama didirikan namun UMKM ini sangat menarik perhatian dari kalangan masyarakat lokal maupun wisatawan. Hutanta Cofffe selain sebagai café yang menyediakan berbagai menu makanan dan minuman juga memiliki bisnis Kopi yang banyak diminati oleh banyak orang. Kopi ini banyak di kirim dari luar kota maupun dalam kota. Promosi yang dilakukan pada Hutanta Coffee ini biasanya dilakukan melalui media sosial seperti Instagram dan Facebook.</h6>
    </div>
  </div>
  <br><br>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img class="mt-5" src="images/eko.jpg" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Pendiri Hutanta</h2>
            </div>
            <p data-aos="fade-left" data-aos-duration="1000">
              Hutanta Coffee merupakan sebuah usaha mikro, kecil, dan menengah (UMKM) yang berlokasi di kecamatan Balige, Kabupaten Toba. Didirikan pada tahun 2018 oleh Bapak Eko Pardede, kafe ini telah menjadi tujuan favorit bagi pecinta kopi di daerah tersebut. Salah satu keunikan Hutanta Coffee adalah komitmennya untuk menyajikan kopi asli yang berasal langsung dari daerah Toba. Dengan mengutamakan kualitas dan keaslian, Hutanta Coffee berusaha untuk memberikan pengalaman kopi yang autentik kepada setiap pelanggan yang datang. Dalam suasana yang nyaman dan hangat, Hutanta Coffee menawarkan berbagai varian kopi yang menggugah selera. Mulai dari kopi hitam yang klasik hingga kopi spesial dengan campuran bahan-bahan unik, setiap sajian kopi Hutanta Coffee memancarkan aroma yang memikat dan rasa yang lezat.
            </p>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Sertifikat CHSE </h2>
            </div>
            <p data-aos="fade-right" data-aos-duration="1000">
              Para pelaku UMKM dan usaha lainnya menghadapi perjalanan sulit akibat Covid-19 yang masuk ke Indonesia pada Maret 2020. Situasi ini masih berlanjut dan beberapa pelaku usaha memutuskan untuk berhenti dan mencari peluang baru. Hutanta Coffee and Resto tetap bertahan di sektor Food and Beverage dengan fokus pada pelayanan, rasa, dan mematuhi standar CHSE. CHSE adalah singkatan dari Cleanliness, Health, Safety, and Environment Sustainability, yang merupakan sertifikasi bagi usaha pariwisata dan destinasi yang memenuhi standar SNI 9042:2021. Hutanta Coffee adalah UMKM pertama yang menerapkan standar ini untuk memastikan kenyamanan dan kepuasan para tamu (#parhuta). Meskipun situasi telah membaik dan orang-orang sudah kembali beraktivitas tanpa masker, Hutanta Coffee tetap memprioritaskan standar CHSE bagi para bafarista dan stafnya.
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img class="py-5" src="https://asset.jalaindo.com/uploads/article/large/Hutanta-428-1547-Taste-of-Toba,-Brings-you-Home..png" alt="" />
          </div>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img class="mb-5" src="images/unnamed.jpg" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>Kami Hutanta</h2>
            </div>
            <p data-aos="fade-left" data-aos-duration="1000">
              Hutanta Cafe adalah destinasi yang tidak boleh dilewatkan. Terletak di kecamatan Balige, Kabupaten Toba, kafe ini menjadikan kopi asli dari daerah Toba sebagai bintang utama menu mereka. Setiap tegukan akan membawa Anda dalam perjalanan rasa yang memikat, dengan aroma kopi yang menggoda dan rasa yang memanjakan lidah. Hutanta Cafe tidak hanya menawarkan kopi berkualitas tinggi, tetapi juga menciptakan suasana yang hangat dan ramah. Begitu Anda melangkah ke dalam kafe, Anda akan disambut dengan senyum dari tim yang berdedikasi untuk memberikan pelayanan terbaik kepada setiap pengunjung. Jadi, jangan lewatkan kesempatan untuk mengunjungi Hutanta Cafe dan merasakan kelezatan kopi asli dari Toba. Nikmati pengalaman yang memikat, atmosfer yang hangat, dan kenikmatan yang tak terlupakan dalam setiap tegukan kopi yang mereka sajikan.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Galery -->
  <div class="heading_container heading_center tulisan-galeri">
    <h2>Our Sweet Coffee Galery</h2>
  </div>
  <section class="gallery min-vh-100">
    <div class="container">
      <div class="row gy-4">
        <?php foreach ($konten as $row) : ?>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <img src="../img/<?= $row["gambar"]; ?>" class="gallery-item" alt="gallery">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Ulasan  -->

  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Berikan Kami Ulasan Anda</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
              <div>
                <input type="hidden" class="form-control" name="id_ulasan" />
                <input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo $resultIdAkun['id_akun']; ?>" />
                <label for="nama">Nama :</label>
                <input type="text" class="form-control" value="<?php echo $resultIdAkun['nama_lengkap']; ?>" name="nama" />
              </div>
              <div>
                <label for="email">Email :</label>
                <input type="email" class="form-control" value="<?php echo $resultIdAkun['email']; ?>" name="email" />
              </div>
              <div>
                <label for="pesan">Pesan :</label>
                <textarea style="height: 200px;" class="form-control input" placeholder="Masukkan pesan anda..." name="pesan" id="myTextarea"></textarea>
                <input type="hidden" class="form-control" name="status" value="Tampilkan" name="" />
              </div>
              <div class="btn_box">
                <button type="submit" name="submit" id="submit">Kirim</button>
              </div>
            </form>
            <script>
              function validateForm() {
                var textareaValue = document.getElementById("myTextarea").value;
                if (textareaValue === "") {
                  alert("Pesan harus diisi!");
                  return false;
                }
                return true;
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


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