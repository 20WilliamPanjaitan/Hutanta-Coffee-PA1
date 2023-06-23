<?php
include('function.php');
$id_produk = $_GET['id'];
$select = "SELECT * FROM produk p  WHERE p.id_produk = '$id_produk'";
$query  = mysqli_query($conn, $select);
$produk     = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>detail produk</title>

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/hutanta.png" type="" />
    <link rel="shortcut icon" href="../customer side/images/hutanta.png" type="" />

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="navbar-brand" href="index.php">
                        <img src="../customer side/images/hutanta.png" alt="" width="50" class="d-inline-block align-text-top">

                    </a>
                </ul>
                <span class="navbar-text">
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-shopping-cart"  style="margin-right:35px; font-size:25px;"></i>

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
                    <li class="breadcrumb-item active" aria-current="page">
                        <a>Detail Produk</a>
                    </li>
                </ol>
            </nav>
            <div class="row">
                <h1 class="fst-italic">Detail Produk</h1>
                <hr>
                <div class="col-md-6" style="height:35rem; overflow:hidden; margin-bottom:-320px">
                    <center><img src="../img/<?php echo $produk['gambar_produk']; ?>" alt="" class="img-fluid rounded" ></center>
                </div>
                <div class=" col-md-6">
                    <h3 class="fw-bold mb-4"><?php echo $produk["nama_produk"] ?></h3>
                    <div class="harga-stok mb-4">
                        <h4 class="harga">Harga: Rp.<?php echo number_format($produk["harga_produk"]); ?></h4>
                    </div>
                    <div class="deskripsi mb-4">
                        <h5>Deskripsi:</h5>
                        <h5><?php echo $produk["deskripsi"]; ?></h5>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" min="1" class="form-control" value="1" name="jumlah" id="jumlah">
                            <div class="input-group-btn mt-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambahkan Ke Keranjang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <style>
        .kontent {
            margin-top: 50px;
        }

        .harga-stok {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .harga,
        .stok {
            font-weight: bold;
            margin-right: 10px;
        }

        .deskripsi {
            margin-top: 20px;
        }

        #beli-btn {
            background-color: #007bff;
            border: none;
        }

        #beli-btn:hover {
            background-color: #0069d9;
        }
    </style>

    <script>
        $(document).ready(function() {
            $("#beli-btn").click(function(event) {
                event.preventDefault(); // Mencegah form submit secara default
                var jumlah = $("#jumlah").val(); // Mendapatkan nilai jumlah

                if (jumlah < 1) { // Memastikan jumlah yang dimasukkan lebih besar dari 0
                    alert("Jumlah harus lebih besar dari 0.");
                    return;
                }

                // Mengirim form secara AJAX
                $.ajax({
                    type: "POST",
                    url: "beli.php",
                    data: {
                        jumlah: jumlah
                    },
                    success: function(data) {
                        alert(data); // Menampilkan pesan sukses
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Terjadi kesalahan: " +
                            textStatus); // Menampilkan pesan kesalahan
                    }
                });
            });
        });
    </script>




    <?php if (isset($_POST["beli"])) {
        //mendapat jumlah yang di input
        $jumlah = $_POST["jumlah"];
        //masukkan keranjang belanja
        $_SESSION["keranjang"][$id_produk] = $jumlah;

        echo "<script>alert('Data anda di simpan ke keranjang');</script>";
        echo "<script>location='keranjang.php';</script>";
    }

    ?>
    </div>
    </div>
    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda perlu login sebelum menambahkan produk ke keranjang
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>