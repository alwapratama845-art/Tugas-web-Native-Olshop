<?php
include 'koneksi.php';

$query = mysqli_query($koneksi,"SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
<title>Keranjang Belanja</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(to right,#0f2027,#2c5364);
    padding:30px;
}

h2{
    text-align:center;
    color:white;
}

.btn{
    display:inline-block;
    background:#1da1f2;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    margin:5px;
    font-weight:bold;
}

.btn:hover{
    background:#0d6efd;
}

table{
    width:70%;
    margin:auto;
    margin-top:30px;
    border-collapse:collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#1f6feb;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
}

tr:nth-child(even){
    background:#f2f2f2;
}

.btn-bayar{
    background:#28a745;
    color:white;
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
    font-size:13px;
}

.btn-bayar:hover{
    background:#1e7e34;
}

.container{
    text-align:center;
}

</style>
</head>

<body>

<h2>🛒 Keranjang Belanja</h2>

<div class="container">
<a href="index.php" class="btn">⬅ Kembali Belanja</a>
</div>

<table>

<tr>
<th>No</th>
<th>Nama Produk</th>
<th>Harga</th>
<th>Bayar</th>
</tr>

<?php $no=1; ?>
<?php while($data = mysqli_fetch_assoc($query)) { ?>

<tr>
<td><?= $no++; ?></td>

<td><?= $data['namaproduk']; ?></td>

<td>Rp <?= number_format($data['harga'],0,',','.'); ?></td>

<td>
<a href="bayar.php?id=<?= $data['id']; ?>" class="btn-bayar">Bayar</a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>