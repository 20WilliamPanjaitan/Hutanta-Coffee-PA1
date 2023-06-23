<?php
session_start();
// mendapatkan id produk dari url

$id_produk = $_GET['id'];

// jika udh ada produk di keranjang maka di plus 1
if(isset($_SESSION['keranjang'][$id_produk]))

{
    $_SESSION['keranjang'][$id_produk] +=1;
}
// kalo belum ada di keranjang maka beli 1
else
{
    $_SESSION['keranjang'][$id_produk] = 1;

}

// di arahkah ke keranjang
echo"<script>alert('Data anda di simpan ke keranjang');</script>";
echo"<script>location='keranjang.php';</script>";

?>