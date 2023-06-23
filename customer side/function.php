<?php $conn = mysqli_connect("localhost", "root", "", "hutanta");



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}





function tambah_ulasan($data)
{
    global $conn;
    $status = htmlspecialchars($data["status"]);
    $tanggal = date('Y-m-d');
    $id_ulasan = htmlspecialchars($data["id_ulasan"]);
    $id_pelanggan = htmlspecialchars($data["id_pelanggan"]);
    $pesan = htmlspecialchars($data["pesan"]);

    //query insert data
    $query = "INSERT INTO ulasan
                VALUES
            ('$id_ulasan','$id_pelanggan', '$pesan','$status','$tanggal')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function upload()
{
    $namaFile = $_FILES['gambar_produk']['name'];
    $ukuranFile = $_FILES['gambar_produk']['size'];
    $error = $_FILES['gambar_produk']['error'];
    $tmpName = $_FILES['gambar_produk']['tmp_name'];

    // cek apakah tidak ada gambar yg di upload
    if ($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    // cek apakah yang di upload adalah benar gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Yang anda unggah bukan gambar valid');
        </script>";
        return false;
    }
    // cek jika ukuran ukuran terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar');
    </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // generate nmaa gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'PRAKTIKUM/' . $namaFileBaru);
    return $namaFileBaru;
}


function hapus($id_produk)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id_produk = $data["id_produk"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga_produk =  $data["harga_produk"];
    $tipe_produk = htmlspecialchars($data["tipe_produk"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar_produk']['error'] === 4) {
        $gambar_produk = $gambarLama;
    } else {
        $gambar_produk = upload();
    }

    //query insert data
    $query = "UPDATE produk SET
                    nama_produk = '$nama_produk',  
                    harga_produk = '$harga_produk',
                    tipe_produk = '$tipe_produk',
                    gambar_produk = '$gambar_produk'
                    WHERE id_produk = $id_produk
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telepon = htmlspecialchars($data["no_telepon"]);
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM akun WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('email sudah terdaftar');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }
    // enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan akun baru ke database
    mysqli_query($conn, "INSERT INTO akun VALUES('','$email','$password')");

    $take = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email'");
    $akun = mysqli_fetch_assoc($take);
    $akunId = $akun['id_akun'];

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO pelanggan VALUES('','','$nama_lengkap','$alamat','$no_telepon','$akunId')");
    return mysqli_affected_rows($conn);
}

function template_header($title)
{
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
            <header>
                <div class="content-wrapper">
                    <h1>Detail Produk</h1>
                    <div class="link-icons">
                        <a href="keranjang.php">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </header>
            <main>
    EOT;
}

function template_header_keranjang($title)
{
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
            <header>
                <div class="content-wrapper">
                    <h1>Keranjang Belanja</h1>
                    <div class="link-icons">
                    </div>
                </div>
            </header>
            <main>
    EOT;
}
