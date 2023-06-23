<?php
// mengaktifkan session pada php
session_start();
if (isset($_SESSION["auth"])) {
  header("Location: index.php");
  exit;
}

// menghubungkan php dengan koneksi database
include 'function.php';

// menangkap data yang dikirim dari form login
if (isset($_POST["login"])) {

  $email = $_POST['email'];
  $password = $_POST['password'];
  // menyeleksi data user dengan username dan password yang sesuai
  $login = mysqli_query($conn, "SELECT * FROM akun WHERE email ='$email' AND password ='$password' limit 1");
  // menghitung jumlah data yang ditemukan
  $cek = mysqli_num_rows($login);

  // cek apakah username dan password di temukan pada database
  if ($cek > 0) {
    $_SESSION['auth'] = true;

    $data = mysqli_fetch_array($login);
    $id_akun = $data['id_akun'];
    $email = $data['email'];

    if (password_verify($password, $data['password']) == false) {
      $_SESSION['id_akun'] = $data['id_akun'];
      $_SESSION['auth'] = false;
      header("login.php", "Invalid Credentials");
    }

    $_SESSION['auth_user'] = [
      'id_akun' => $id_akun,
      'email' => $email
    ];

    // cek jika user login sebagai admin
    if ($data['id_akun'] == "1") {
      // alihkan ke halaman dashboard admin
      header("location: ../admin side/index.php");
    } else if ($data['id_akun'] != "1") {
      // alihkan ke halaman dashboard pelanggan
      header("location:../customer side/index.php");
    }
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
  <link rel="shortcut icon" href="images/hutanta.png" type="" />
  <link rel="shortcut icon" href="../customer side/images/hutanta.png" type="" />

  <title>Login</title>

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
</head>

<body class="sub_page">
  <div class="hero_area">
    <div class="bg-box bg-dark">




      <!-- login sextion -->
      <section class="h-100 layout_padding">
        <div class="container-mg h-100">
          <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
              <div class="card shadow-lg">
                <div class="card-body p-5">
                  <div class="heading_container heading_center psudo_white_primary mb_45">
                    <h3>Login</h3>
                  </div>
                  <form method="POST" action="" class="needs-validation">
                    <div class="mb-3">
                      <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                      <input id="email" type="email" class="form-control" name="email" value="" required>
                    </div>

                    <div class="mb-3">
                      <div class="mb-2 w-100">
                        <label class="text-muted" for="password">Password</label>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                      <button type="submit" class="btn btn-primary login" name="login" id="login">
                        Login
                      </button>
                    </div>
                  </form>
                </div>
                <div class="card-footer py-3 border-0">
                  <div class="text-center">
                    Belum Punya Akun? <a href="register.php" class="text-primary">Daftar Disini</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


</body>

</html>