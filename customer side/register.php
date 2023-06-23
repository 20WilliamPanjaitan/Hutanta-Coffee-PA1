<?php
require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
        
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/hutanta.png" type="" />

  <title>Hutanta Coffee</title>

  <!-- bootstrap css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
          <div class="card shadow-lg">
            <div class="card-body p-5">
              <h1 class="fs-4 card-title fw-bold mb-4 text">Daftar</h1>

              <form method="POST" action="" class="needs-validation"  autocomplete="off">
                <div class="mb-3">
                  <label class="mb-2 text-muted" for="nama_lengkap">Nama Lengkap</label>
                  <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="" required autofocus>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="alamat">Alamat</label>
                  <input id="alamat" type="text" class="form-control" name="alamat" value="" required autofocus>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="no_telepon">No Telepon</label>
                  <input id="no_telepon" type="text" class="form-control" name="no_telepon" value="" required autofocus>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="email">E-Mail</label>
                  <input id="email" type="text" class="form-control" name="email" value="" required autofocus>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="password">Password</label>
                  <input id="email" type="password" class="form-control" name="password" value="" required>
                </div>

                <div class="mb-3">
                  <label class="mb-2 text-muted" for="password2">Konfirmasi Password</label>
                  <input id="password2" type="password" class="form-control" name="password2" required>
                </div>
                <div class="align-items-center d-flex">
                  <button type="submit" name="register" class="btn btn-primary ms-auto">
                    Register
                  </button>
                </div>
              </form>
              <div class="card-footer py-3 border-0">
                <div class="text-center">
                  Sudah Punya Akun? <a href="login.php" class="text-primary">Login Disini</a>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
</body>

</html>