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

<?php require 'function.php';
// $pemesanan = query("SELECT * FROM pemesanan pem INNER JOIN pelanggan pel ON pem.id_pelanggan = pel.id_pelanggan ORDER BY id_pemesanan DESC");
$pemesanan = query("SELECT pem.id_pemesanan, pem.tanggal, pem.id_pelanggan, pem.status, pem.total, pel.id_pelanggan, pel.nama_lengkap, dp.id_produk, dp.kuantitas
                   FROM pemesanan pem 
                   INNER JOIN pelanggan pel ON pem.id_pelanggan = pel.id_pelanggan 
                   INNER JOIN detail_pesanan dp ON pem.id_pemesanan = dp.id_pesanan 
                   GROUP BY pem.id_pemesanan, pel.nama_lengkap 
                   ORDER BY pem.id_pemesanan DESC");

$detail_pesanan = query("SELECT DISTINCT p.nama_produk,dp.kuantitas
                         FROM produk p 
                         INNER JOIN detail_pesanan dp ON p.id_produk = dp.id_produk 
                         ORDER BY p.id_produk DESC");


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pemesanan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <li class="nav-item">
                <a class="nav-link" href="produk.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item active">
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
                <div class="container-fluid">

                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=index.php>Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a>Pemesanan</a>
                            </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Pemesanan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Pemesanan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Total Harga</th>
                                            <th>Status</th>
                                            <th>Detail pesanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Total Harga</th>
                                            <th>Status</th>
                                            <th>Detail pesanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pemesanan as $row) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["nama_lengkap"]; ?></td>
                                                <td><?= $row["tanggal"]; ?></td>
                                                <td><?= "Rp.", number_format($row["total"], 0, ',', '.'); ?></td>
                                                <td><?= $row["status"]; ?></td>
                                                <td>
                                                    
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal<?= $row['id_pemesanan']; ?>">Lihat Detail</button>

                                                </td>

                                                <td>
                                                    <a href="edit_pemesanan_verifikasi.php?id=<?= $row['id_pemesanan']; ?>" class="btn btn-success btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Verifikasi</span>
                                                    </a>

                                                    <a href="edit_pemesanan_batalkan.php?id=<?= $row["id_pemesanan"]; ?>" class="btn btn-warning btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-times"></i>
                                                        </span>
                                                        <span class="text">Batalkan</span>
                                                    </a>
                                                    <a href="hapus_pemesanan.php?id=<?= $row["id_pemesanan"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data?');" class="btn btn-danger btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </a>

                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
            <!-- Modal Detail Pesanan -->



        </div>
       <!-- Modal Detail Pesanan -->
         <!-- Modal Detail Pesanan -->
            <?php foreach ($pemesanan as $row) : ?>
                <div class="modal fade" id="detailModal<?= $row['id_pemesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $row['id_pemesanan']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailModalLabel<?= $row['id_pemesanan']; ?>">Detail Pesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6>Nama Pelanggan: <?= $row['nama_lengkap']; ?></h6>
                                <h6>Tanggal Pemesanan: <?= $row['tanggal']; ?></h6>
                                <h6>Total Harga: Rp. <?= number_format($row['total'], 0, ',', '.'); ?></h6>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Kuantitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $detail_pesanan = query("SELECT p.nama_produk,dp.kuantitas
                                        FROM produk p 
                                        INNER JOIN detail_pesanan dp ON p.id_produk = dp.id_produk 
                                        WHERE dp.id_pesanan = " . $row['id_pemesanan'] . "
                                        ORDER BY p.id_produk DESC");
                                        
                                        $no = 1;
                                        foreach ($detail_pesanan as $detail) :
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $detail['nama_produk']; ?></td>
                                                <td><?= $detail['kuantitas']; ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End of Modal Detail Pesanan -->



                    
                    <!-- Add more order details as needed -->
                </div>
                </div>
            </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</body>

</html>