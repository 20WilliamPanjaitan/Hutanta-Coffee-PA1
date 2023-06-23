<?php 
require 'function.php';

$id = $_GET["id"];
if(edit_pemesanan_batalkan ($id) > 0 ){
    echo " 
    <script>
        alert('Pemesanan Berhasil Dibatalkan');
        document.location.href = 'pemesanan.php';
    </script>";
}else{
    echo " 
    <script>
        alert('Pemesanan Telah Dibatalkan');
        document.location.href = 'pemesanan.php';
    </script>";
}

?>