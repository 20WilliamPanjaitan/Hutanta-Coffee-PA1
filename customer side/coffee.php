<?php
session_start();
require 'function.php';

// simpan id pelanggan
$idAkun = $_SESSION['id_akun'];
$query = mysqli_query($conn, "SELECT nama_lengkap FROM pelanggan WHERE id_akun = $idAkun");
$resultIdAkun = mysqli_fetch_assoc($query);

$konten = query("SELECT * FROM konten WHERE keterangan = 'kopi toba'");

if (!isset($_SESSION['chart']) || empty($_SESSION['chart'])) {
  // Tambahkan pesan umpan balik di sini
  // $_SESSION['chart'] = array();
  $error_message = "Anda belum memilih produk.";
  // Redirect ke halaman pemesanan.php dengan menyertakan parameter error
  // header('Location: coffee.php?error=' . urlencode($error_message));
  // exit; // Pastikan kode berhenti di sini setelah melakukan redirect
}
if (isset($_POST['page']) && $_POST['page'] == 'preview') {
  $pesan = 'Halo Hutanta Coffee

  Data diri saya: 
  Nama: *' . $_POST['nama'] . '*
  Alamat Pengiriman: *' . $_POST['alamat'] . '*
  Menu yang dipesan:
  [daftarbelanja]';
  if ($_POST['deskripsi'] != '') {
      $pesan .= '

  NOTES: *' . $_POST['deskripsi'] . '*

  Terimakasih';
  } else {
      $pesan .= '

  Terimakasih';
  }
  $belanja = '';
  foreach ($_SESSION['chart'] as $id => $value) {
      $query = "SELECT * FROM produk WHERE id_produk = $id";
      $result_set = $conn->query($query);
      while ($row = $result_set->fetch_assoc()) {
          $belanja .= '
         *-' . $row['nama_produk'] . ' : ' . $value . '*';
      }
  }
  $pesan = str_replace('[daftarbelanja]', $belanja, $pesan);
  unset($_SESSION['chart']);
  $query = 'SELECT * FROM admin';
  $result_set = $conn->query($query);
  $row = $result_set->fetch_assoc();
  $nomor_telepon =  $row['nomor_telepon_admin'];
  $url = 'https://wa.me/' . $nomor_telepon . '?text=' . rawurlencode($pesan);
  header('location:' . $url);
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
  <link rel="shortcut icon" href="images/hutanta.png" type="" />

  <title>Kopi Toba</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/kopi.css" />

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <source src="videos/hero.mp4" type="video/mp4" />
      </video>
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
                    <h1>Mulai Hari Anda Dengan Kopi
                    </h1>
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
          <!-- space -->
        </div>
        <div class="col-md-4">
          <div class="img-box">
            <img src="images/robusta.jpg" alt="" class="img-circle" />
          </div>
        </div>

      </div>

      <div class="row space">
        <div class="col-md-4">
          <div class="img-box">
            <img src="images/arabica blend.jpg" alt="" />
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
                <a href="?pilih=47&jumlah=1"><button onclick="pilih()" style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button>
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
                <a href="?pilih=48&jumlah=1"><button onclick="pilih()" style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button>
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
                <a href="?pilih=49&jumlah=1"><button onclick="pilih()" style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button>
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
                <a href="?pilih=50&jumlah=1"><button onclick="pilih()" style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end offer section -->


  <div class="heading_container heading_center">
    <h3><B>Form Pemesanan</B></h3>
  </div>
    <form class="whatsapp-form" action="" method="post"  id="kopikemasan">
      <div class="datainput">
      <input class="validate" id="wa_name" name="nama" required="" type="text" value=''/>
      <span class="highlight"></span><span class="bar"></span>
      <label>Nama</label>
      </div>
      <div class="datainput">
      <input class="validate" id="wa_email" name="alamat" required="" type="text" value=''/>
      <span class="highlight"></span><span class="bar"></span>
      <label>Alamat</label>
      </div>
      <!-- <div class="datainput">
        <select id="wa_select" multiple>
          <option hidden='hidden' selected='selected' value='default'>Select Option</option>
          <option value="1">Kopi Toba Robusta</option>
          <option value="2">Kopi toba capucino</option>
          <option value="3">kopi toba mokalate</option>
        </select>
      </div> -->

      <?php
				if (isset($_GET['pilih']) && is_numeric($_GET['pilih']) && isset($_GET['jumlah']) && is_numeric($_GET['jumlah'])) {
					if (isset($_SESSION['chart'][$_GET['pilih']])) {
						$_SESSION['chart'][$_GET['pilih']] = $_SESSION['chart'][$_GET['pilih']] + $_GET['jumlah'];
					} else {
						$_SESSION['chart'][$_GET['pilih']] = $_GET['jumlah'];
					}
				} elseif (isset($_GET['tambah']) && is_numeric($_GET['tambah'])) {
					if (isset($_SESSION['chart'][$_GET['tambah']]) && $_SESSION['chart'][$_GET['tambah']] > 0) {
						$_SESSION['chart'][$_GET['tambah']]++;
            echo "<script>alert('Produk berhasil ditambah')</script>";
            echo "<script>window.location.hash = '#kopikemasan' </script>"
            ;
					}
				} elseif (isset($_GET['kurangi']) && is_numeric($_GET['kurangi'])) {
					if (isset($_SESSION['chart'][$_GET['kurangi']])) {
						$_SESSION['chart'][$_GET['kurangi']]--;
            echo "<script>alert('Produk berhasil dikurangi')</script>";
            echo "<script>window.location.hash = '#kopikemasan' </script>";
						if ($_SESSION['chart'][$_GET['kurangi']] <= 0) {
							unset($_SESSION['chart'][$_GET['kurangi']]);

						}
					}
				} elseif (isset($_GET['hapus']) && is_numeric($_GET['hapus'])) {
					if (isset($_SESSION['chart'][$_GET['hapus']])) {
						unset($_SESSION['chart'][$_GET['hapus']]);
            echo "<script>alert('Produk berhasil dihapus')</script>";
            echo "<script>window.location.hash = '#kopikemasan' </script>";
					}
				} elseif (isset($_GET['hapusall']) && $_GET['hapusall'] == 'ya') {
					unset($_SESSION['chart']);
          echo "<script>alert('Produk berhasil dihapus')</script>";
          echo "<script>window.location.hash = '#kopikemasan' </script>";
				}

				if (isset($_SESSION['chart']) && count($_SESSION['chart']) > 0) {

          echo '
          <table class="table">
          <thead>
          <tr>
          <th>Nama Produk</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Aksi</th>
          </tr>
          </thead>
          <tbody>';
      $jumlah = 0;
      foreach ($_SESSION['chart'] as $id => $value) {
        $query = "SELECT * FROM produk WHERE id_produk = $id";
        $result_set = $conn->query($query);
        while ($row = $result_set->fetch_assoc()) {
          echo '<tr><td>' . $row['nama_produk'] . '</td>
            <td>' . $value . '</td>
            <td>Rp. ' . number_format($row['harga_produk'] * $value, 0, ',', '.') . '</td>
            <td>
          <a href="?tambah=' . $id . '" title="Tambah"><i class="fa-solid fa-circle-plus fa-xl"></i></a>
            <a href="?kurangi=' . $id . '" title="Kurangi"><i class="fa-solid fa-circle-minus fa-xl"></i></a>
            <a href="?hapus=' . $id . '" title="Hapus"><i class="fa-solid fa-circle-xmark fa-xl"></i></a>
            </td>
            </tr>';
          $jumlah = $jumlah + ($row['harga_produk'] * $value);
        }
      }
      echo '
            <tr><td colspan = "2" class="text-right"><b>Total Harga</b></td>
            <td>Rp. ' . number_format($jumlah, 0, ',', '.') . '</td>
          <td></td>

            </tr>
            </tbody>
            </table>
          <a href="?hapusall=ya"><button type="button" style="height:40px;width:auto;" class="btn btn-danger">Hapus Semua</button></a>
          ';
    }
    ?>

      <div class="jarak" style="height:50px;"></div>
      <!-- <div class="datainput">
      <input class="validate" id="wa_number" name="count" required="" type="number" value=''/>
      <span class="highlight"></span><span class="bar"></span>
      <label>Input Number</label>
      </div> -->
      <!-- <div class="datainput">
      <input class="validate" id="wa_url" name="url" required="" type="url" value=''/>
      <span class="highlight"></span><span class="bar"></span>
      <label>URL/Link</label>
      <p>Link blog Anda, gunakan http:// atau https://</p>
      </div> -->
      <div class="datainput">
      <textarea id='wa_textarea' placeholder='' maxlength='5000' row='1' required="" name="deskripsi"></textarea>
      <span class="highlight"></span><span class="bar"></span>
      <label>Deskripsi</label>
      </div>
      <input type="hidden" name="page" value="preview">
      <button name="kirim" class="btn btn-success" style=" height:35px; font-family:'Poppins';">Kirim</button>
      <div id="text-info"></div>
    </form><br><br><hr>


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
  <script>
    $(document).on('click','.send_form', function(){
    var input_blanter = document.getElementById('wa_email');

    /* Whatsapp Settings */
    var walink = 'https://web.whatsapp.com/send',
        phone = '6281370349867',
        walink2 = 'Halo saya ingin ',
        text_yes = 'Terkirim.',
        text_no = 'Isi semua Formulir lalu klik Send.';

    /* Smartphone Support */
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    var walink = 'whatsapp://send';
    }

    if("" != input_blanter.value){

    /* Call Input Form */
    var input_select1 = $("#wa_select :selected").text(),
        input_name1 = $("#wa_name").val(),
        input_email1 = $("#wa_email").val(),
        input_number1 = $("#wa_number").val(),
        input_url1 = $("#wa_url").val(),
        input_textarea1 = $("#wa_textarea").val();

    /* Final Whatsapp URL */
    var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
        '*Name* : ' + input_name1 + '%0A' +
        '*Email Address* : ' + input_email1 + '%0A' +
        '*Select Option* : ' + input_select1 + '%0A' +
        '*Input Number* : ' + input_number1 + '%0A' +
        '*URL/Link* : ' + input_url1 + '%0A' +
        '*Description* : ' + input_textarea1 + '%0A';

    /* Whatsapp Window Open */
    window.open(blanter_whatsapp,'_blank');
    document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>';
    } else {
    document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>';
    }
    });
function pilih(){
  alert('Produk berhasil ditambahkan ke form');
}
    </script>
</body>

</html>