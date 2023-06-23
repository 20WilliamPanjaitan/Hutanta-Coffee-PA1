<?php 
require 'function.php';

$id = $_GET["id"];
if(edit_ulasan_sembunyikan ($id) > 0 ){
    echo " 
    <script>
        alert('Ulasan Berhasil Disembunyikan');
        document.location.href = 'ulasan.php';
    </script>";
}else{
    echo " 
    <script>
        alert('Ulasan Telah Disembunyikan');
        document.location.href = 'ulasan.php';
    </script>";
}

?>