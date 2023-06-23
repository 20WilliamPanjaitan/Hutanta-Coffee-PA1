<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "hutanta");

$idAkun = $_SESSION['id_akun'];
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan INNER JOIN akun ON akun.id_akun = pelanggan.id_akun WHERE pelanggan.id_akun = $idAkun");
$resultIdAkun = mysqli_fetch_assoc($query);

if (isset($_POST["checkout"])) {
    $id_pelanggan =  $resultIdAkun['id_pelanggan'];
    $tanggal_pembelian = date("Y-m-d H:i:s");
    $status_pemesanan = 'Menunggu';
    $totalbelanja = $totalbelanja;

    // Menyimpan data ke tabel pemesanan
    $koneksi->query("INSERT INTO pemesanan VALUES ('$id_pemesanan', '$id_pelanggan','$status_pemesanan', '$tanggal_pembelian', '$totalbelanja')");
    echo "<script>
        alert('Produk Berhasil Dicheckout');
    </script>";
    echo "<meta http-equiv='refresh' content='2;url=menu.php'>";
}
?>


<!DOCTYPE html>
<html>

<head>

    <title>Check Out</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/hutanta.png" type="" />

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
            </div>
        </div>
    </nav>

    <section class="konten" style="margin: 40px 30px 10px 30px;">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=index.php>Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href=menu.php>Menu</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href=keranjang.php>Keranjang</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a>Checkout</a>
                    </li>
                </ol>
            </nav>
            <h1 class="fst-italic">Checkout</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>produk</th>
                        <th>harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
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
                            <td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp.<?php echo number_format($subharga); ?></td>
                        </tr>
                        <?php $nomor++ ?>
                        <?php $totalbelanja += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp.<?php echo number_format($totalbelanja) ?></th>
                    </tr>
                </tfoot>
            </table>
            <form method="post" action="">
                <div class="row">
                    <div class="col-md-4">
                        <p class="fst-italic">username:</p>
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $resultIdAkun['nama_lengkap']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <p class="fst-italic">email:</p>
                            <input type="text" readonly value="<?php echo $resultIdAkun['email']; ?>" class="form-control">
                        </div>
                    </div>
                    <!-- pesan melalui wa -->
                    <div class="col-md-3">
                        <div class="col-md-3">
                            <button id="checkout" class="btn btn-outline-success" name="checkout">
                                Check Out
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
