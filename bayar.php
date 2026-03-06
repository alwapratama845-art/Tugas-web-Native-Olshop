<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT * FROM produk WHERE id='$id'");
$produk = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Pembayaran</title>

<style>

body{
font-family:Arial;
background:#0f2027;
color:white;
text-align:center;
padding-top:100px;
}

.box{
background:white;
color:black;
width:400px;
margin:auto;
padding:30px;
border-radius:10px;
}

</style>

</head>

<body>

<div class="box">

<h2>Pembayaran</h2>

<p>Produk : <b><?= $produk['namaproduk']; ?></b></p>

<p>Harga : <b>Rp <?= number_format($produk['harga'],0,',','.'); ?></b></p>

<br>

<h3>✅ Pembayaran Berhasil</h3>

<br>

<a href="lihatkeranjang.php">Kembali</a>

</div>

</body>
</html>