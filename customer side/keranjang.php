<?php

session_start();

$koneksi = new mysqli("localhost", "root", "", "hutanta");
if (empty($_SESSION["keranjang"])) {
    echo "<script>alert('keranjang kosong, silahkan melakukan pemesanan');</script>";
}

$total_jumlah = 0; // variabel untuk menyimpan total jumlah
if(!isset($_SESSION['keranjang'])){
    $_SESSION['keranjang'] = array();
}
$_SESSION['swtd'] = $total_jumlah;

require 'function.php';
// simpan id pelanggan
$idAkun = $_SESSION['id_akun'];
$query = mysqli_query($conn, "SELECT nama_lengkap FROM pelanggan WHERE id_akun = $idAkun");
$resultIdAkun = mysqli_fetch_assoc($query);

$pemesanan = query("SELECT * FROM pemesanan pem INNER JOIN pelanggan pel ON pem.id_pelanggan = pel.id_pelanggan where pel.nama_lengkap = '$resultIdAkun[nama_lengkap]'");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/hutanta.png" type="" />
    <style>
        /* Atur tata letak kolom pada layar kecil */
        @media only screen and (max-width: 767px) {
            .sina {
                width: 100%;
                overflow: auto;
                font-size: smaller;
            }
            .header_section {
                width: 100%;
                font-size: smaller;
            }
        }
    </style>
</head>
<body>

    <!-- header section strats -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="navbar-brand" href="#">
                        <img src="../customer side/images/hutanta.png" alt="" width="50" class="d-inline-block align-text-top">
                    </a>
                </ul>
                <span class="navbar-text">
                    <a class="dropdown-item" href="keranjang.php">
                        <i class="fa fa-shopping-cart" style="margin-right:35px; font-size:25px;"></i>
                    </a>
                </span>
            </div>
        </div>
    </nav>
    <!-- end header section -->

    <!-- table keranjang -->
    <section class="konten" style="margin: 40px 30px 10px 30px;">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="menu.php">Menu</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a>Keranjang</a>
                    </li>
                </ol>
            </nav>
            <h1 class="fst-italic">Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead class="jere">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="sina">
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <!-- menampilkan produk yang sedang di perulangkan berdasarkan id_produk -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $pecah = $ambil->fetch_assoc();
                        $subharga = $pecah["harga_produk"] * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["nama_produk"]; ?></td>
                            <td><img src="../img/<?php echo $pecah['gambar_produk']; ?>" alt="" width="100px"></td>
                            <td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp.<?php echo number_format($subharga); ?></td>
                            <td><a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-outline-danger btn-xs">Hapus</a></td>
                        </tr>
                        <?php $nomor++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>

            <a href="menu.php" class="btn btn-secondary">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-success">Checkout</a><br><br><br>

            <h1 class="fst-italic">Riwayat Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead class="jere">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="sina">
                    <?php $nomor = 1; ?>
                    <?php foreach ($pemesanan as $row) : ?>
                        <!-- menampilkan produk yang sedang di perulangkan berdasarkan id_produk -->
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?= $row["nama_lengkap"]; ?></td>
                            <td><?= $row["tanggal"]; ?></td>
                            <td><?= "Rp.", number_format($row["total"], 0, ',', '.'); ?></td>
                            <td><?= $row["status"]; ?></td>
                        </tr>
                        <?php $nomor++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    
    
    
    
    
    
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <!-- responsive table  -->
        <style>
            @media only screen and (max-width: 736px) {
                .sina {
                    width: 640px;
                    max-width: 100%;
    
                    overflow: hidden;
                }
            }
    
            @media only screen and (max-width: 600px) {
                .sina {
                    width: 500px;
                    max-width: 100%;
    
                    overflow: hidden;
                }
            }
    
            @media only screen and (max-width: 494px) {
                .sina {
                    width: 400px;
                    max-width: 100%;
                    overflow: hidden;
                }
            }
    
            @media only screen and (max-width: 440px) {
                .sina {
                    width: 600px;
                    max-width: 100%;
                    font-size: smaller;
                    overflow: hidden;
    
                }
    
            }
    
            /* buat container */
            @media only screen and (max-width: 736px) {
                .header_section {
                    width: 740px;
                    max-width: 100%;
    
                    overflow: hidden;
                }
            }
    
            @media only screen and (max-width: 600px) {
                .header_section {
                    width: 700%;
    
    
                    overflow: hidden;
                }
            }
    
            @media only screen and (max-width: 494px) {
                .header_section {
                    width: 800%;
                    overflow: hidden;
                }
            }
    
            @media only screen and (max-width: 440px) {
                .header_section {
                    width: 100%;
    
                    font-size: smaller;
                    overflow: hidden;
    
                }
    
            }
        </style>
    </body>
</body>
</html>
