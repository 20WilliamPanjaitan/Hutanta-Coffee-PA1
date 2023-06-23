<?php 
require 'function.php';

$id = $_GET["id"];
if(edit_ulasan_tampilkan ($id) > 0 ){
    echo " 
    <script>
        alert('Ulasan Berhasil Ditampilkan');
        document.location.href = 'ulasan.php';
    </script>";
}else{
    echo " 
    <script>
        alert('Ulasan Telah Ditampilkan');
        document.location.href = 'ulasan.php';
    </script>";
}

?>