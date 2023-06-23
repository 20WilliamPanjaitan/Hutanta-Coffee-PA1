<?php
session_start();
if (!isset($_SESSION["auth"])) {
    header("Location: ../customer side/login.php");
    exit;
}

if ($_SESSION['id_akun'] !== '1') {
    // Jika pengguna bukan admin, arahkan ke halaman lain atau tampilkan pesan akses ditolak
    header('Location: ../customer side/index.php');
    exit;
}
?>

<?php
require 'function.php';
// koneksi ke DBMS
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");
// cek  apakah tombol submit sudah pernah di tekan
if (isset($_POST["submit"])) {
    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'produk.php';
        </script>
    ";
    } else {
        echo " <script>
    alert('Data Gagal Ditambahkan');
    document.location.href = 'produk.php';
    </script>
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Data Produk</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../customer side/images/hutanta.png" type="" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #222831;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="../customer side/images/hutanta.png" width="50px" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">HUTANTA COFFEE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DAFTAR
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="produk.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pemesanan.php">
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Pemesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                INFORMASI
            </div>

            <!-- Nav Item - Konten -->
            <li class="nav-item">
                <a class="nav-link" href="konten.php">
                    <i class="fas fa-fw fa-camera"></i>
                    <span>Konten</span></a>
            </li>

            <!-- Nav Item - Ulasan -->
            <li class="nav-item">
                <a class="nav-link" href="ulasan.php">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Ulasan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <main>
                                <div class="container-fluid">
                                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href=index.php>Beranda</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href=produk.php>Daftar Produk</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <a>Tambah Produk</a>
                                            </li>
                                        </ol>
                                    </nav>
                                    <!-- Basic Card Example -->
                                    <div class="card shadow col-xl-10 col-md-6 mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Tambah Daftar produk</h6>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" name="id_produk" id="id_produk">
                                                        <input type="hidden" name="id_admin" id="id_admin">
                                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="harga_produk" class="col-sm-2 col-form-label">Harga</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control " id="harga_produk" min="1" name="harga_produk" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tipe_produk" class="col-sm-2 col-form-label">Kategori</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select form-control" id="tipe_produk" name="tipe_produk" autofocus>
                                                            <option>Makanan</option>
                                                            <option>Minuman</option>
                                                            <option>Toping</option>
                                                            <option>Snack</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="kuantitas" class="col-sm-2 col-form-label">Kuantitas</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control " id="kuantitas" min="1" name="kuantitas" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control " id="deskripsi" name="deskripsi" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="gambar_produk" class="col-sm-2 col-form-label">Gambar</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" id="gambar_produk" name="gambar_produk">
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <div class="col-sm-10">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-success">Tambah</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>
                        <!-- /.container-fluid -->
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Hutanta Coffee 2023</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

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

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>