<?php
// Koneksi ke database menggunakan mysqli
$connection = mysqli_connect('localhost', 'root', '', 'hutanta');

// Periksa apakah koneksi berhasil
if (!$connection) {
    die('Koneksi ke database gagal: ' . mysqli_connect_error());
}



// Ambil ID pemesanan dari URL
$idPemesanan = $_GET['id'];

// Query ke tabel detail_pesanan berdasarkan ID pemesanan
$query = "SELECT * FROM detail_pesanan WHERE id_pesanan = '$idPemesanan'";
$result = mysqli_query($connection, $query);

// Periksa apakah query berhasil
if (!$result) {
    die('Query error: ' . mysqli_error($connection));
}

// Ambil hasil query sebagai array
$detailPesanan = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Menutup koneksi
mysqli_close($connection);
?>

<!-- Tampilkan detail pesanan -->
<h2>Detail Pesanan</h2>
<table>
    <thead>
        <tr>
            <th>kuantitas</th>
            <th>subtotal</th>
            <th>id_produk</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detailPesanan as $detail) : ?>
            <tr>
                <td><?= $detail['kuantitas']; ?></td>
                <td><?= $detail['subtotal']; ?></td>
                <td><?= $detail['id_produk']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
