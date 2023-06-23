<?php 
require 'function.php';

$id = $_GET["id"];
if(edit_pemesanan_verifikasi ($id) > 0 ){
    $query = "SELECT * FROM detail_pesanan WHERE id_pesanan = $id";
    $result_set = $conn->query($query);
    while ($row = $result_set->fetch_assoc()) {
    $id_produk = $row['id_produk'];
    $kuantitas = $row['kuantitas'];
    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();
         // Mengurangi stok
        $stokBaru = $detail["kuantitas"] - $kuantitas;
        $conn->query("UPDATE produk SET kuantitas='$stokBaru' WHERE id_produk='$id_produk'");}
    echo " 
    <script>
        alert('Pemesanan Berhasil Diverifikasi');
        document.location.href = 'pemesanan.php';
    </script>";
}else{
    echo " 
    <script>
        alert('Pemesanan Telah Diverifikasi');
        document.location.href = 'pemesanan.php';
    </script>";
}

?>