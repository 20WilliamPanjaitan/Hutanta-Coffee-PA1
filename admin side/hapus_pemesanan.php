<?php 
require 'function.php';


$id_konten = $_GET["id"];
if(hapus_pemesanan ($id_konten) > 0 ){
    echo " 
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'pemesanan.php';
    </script>";
}else{
    echo " 
    <script>
        alert('Data Gagal Dihapus');
        document.location.href = 'pemesanan.php';
    </script>";
}
?>