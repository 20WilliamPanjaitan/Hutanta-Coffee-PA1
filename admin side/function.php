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


function tambah($data)
{
    global $conn;
    $id_produk = htmlspecialchars($data["id_produk"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $tipe_produk = htmlspecialchars($data["tipe_produk"]);
    $kuantitas = htmlspecialchars($data["kuantitas"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga_produk = htmlspecialchars($data["harga_produk"]);

    // upload gambar
    $gambar_produk = upload();
    if (!$gambar_produk) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO produk 
                VALUES
            ('$id_produk', '$nama_produk', '$deskripsi','$kuantitas', '$tipe_produk', '$harga_produk','$gambar_produk')
        ";

    try {
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
        if (strpos($error, "Duplicate entry") !== false && strpos($error, "nama_produk") !== false) {
            echo '<script>alert("Nama produk sudah ada dalam database!");</script>';
        } else {
            echo '<script>alert("Gagal menambahkan data!");</script>';
        }
        return false;
    }
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

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    return $namaFileBaru;
}




function tambah_konten($data)
{
    global $conn;
    $id_konten = htmlspecialchars($data["id_konten"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $judul = htmlspecialchars($data["judul"]);

    // upload gambar
    $gambar = upload_konten();
    if (!$gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO konten
                VALUES
            ('$id_konten', '$keterangan','$gambar','$judul')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload_konten()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

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
    if ($ukuranFile > 5000000) {
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

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    return $namaFileBaru;
}



// FUNCTION UNTUK MENGHAPUS PRODUK
function hapus($id_produk)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");
    return mysqli_affected_rows($conn);
}

// FUNCTION UNTUK MENGHAPUS KONTEN
function hapus_konten($id_konten)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM konten WHERE id_konten = $id_konten");
    return mysqli_affected_rows($conn);
}

// FUNCTION UNTUK MENGHAPUS ULASAN
function hapus_ulasan($id_ulasan)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM ulasan WHERE id_ulasan = $id_ulasan");
    return mysqli_affected_rows($conn);
}

// FUNCTION UNTUK MENGHAPUS PEMESANAN
function hapus_pemesanan($id_pemesanan)
{
    global $conn;

    // Hapus entri terkait dari tabel detail_pesanan
    mysqli_query($conn, "DELETE FROM detail_pesanan WHERE id_pesanan = $id_pemesanan");

    // Hapus entri dari tabel pemesanan
    $hapus_pemesanan = mysqli_prepare($conn, "DELETE FROM pemesanan WHERE id_pemesanan = ?");
    mysqli_stmt_bind_param($hapus_pemesanan, "i", $id_pemesanan);
    mysqli_stmt_execute($hapus_pemesanan);

    return mysqli_affected_rows($conn);
}

// FUNCTION UNTUK MENGEDIT PRODUK
function edit($data)
{
    global $conn;
    $id_produk = $data["id_produk"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $kuantitas = htmlspecialchars($data["kuantitas"]);
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
                    deskripsi = '$deskripsi',  
                    kuantitas = '$kuantitas',    
                    harga_produk = '$harga_produk',
                    tipe_produk = '$tipe_produk',
                    gambar_produk = '$gambar_produk'
                    WHERE id_produk = $id_produk
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// FUNCTION UNTUK MENGEDIT KONTEN
function edit_konten($data)
{
    global $conn;
    $id_konten = $data["id_konten"];
    $judul = htmlspecialchars($data["judul"]);
    $keterangan =  $data["keterangan"];
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    //query insert data
    $query = "UPDATE konten SET
                    judul = '$judul',  
                    keterangan = '$keterangan',
                    gambar = '$gambar'
                    WHERE id_konten = $id_konten
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// FUNCTION UNTUK MENGEDIT ULASAN AGAR DITAMPILKAN
function edit_ulasan_tampilkan($id_ulasan)
{
    global $conn;
    mysqli_query($conn, "UPDATE ulasan SET
    status = 'Tampilkan'  
    WHERE id_ulasan = $id_ulasan");
    return mysqli_affected_rows($conn);
}

// FUNCTION UNTUK MENGEDIT ULASAN AGAR DISEMBUNYIKAN
function edit_ulasan_sembunyikan($id_ulasan)
{
    global $conn;
    mysqli_query($conn, "UPDATE ulasan SET
    status = 'Sembunyikan'  
    WHERE id_ulasan = $id_ulasan");
    return mysqli_affected_rows($conn);
}

// FUNCTION UNTUK MENGEDIT PEMESANAN AGAR DIVERIFIKASI
function edit_pemesanan_verifikasi($id_pemesanan)
{
    global $conn;
    mysqli_query($conn, "UPDATE pemesanan SET
    status = 'Verifikasi'  
    WHERE id_pemesanan = $id_pemesanan");
    return mysqli_affected_rows($conn);
}

// FUNCTION UNTUK MENGEDIT PEMESANAN AGAR DIBATALKAN
function edit_pemesanan_batalkan($id_pemesanan)
{
    global $conn;
    mysqli_query($conn, "UPDATE pemesanan SET
    status = 'Batalkan'  
    WHERE id_pemesanan = $id_pemesanan");
    return mysqli_affected_rows($conn);
}