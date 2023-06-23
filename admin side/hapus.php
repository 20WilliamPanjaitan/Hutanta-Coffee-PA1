<?php 
require 'function.php';

$id = $_GET["id"];
if(hapus ($id) > 0 ){
    echo " 
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'produk.php';
    </script>";
}else{
    echo " 
    <script>
        alert('Data Gagal Dihapus');
        document.location.href = 'produk.php';
    </script>";
}

?>