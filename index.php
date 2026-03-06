<?php
require 'functions.php';
$produk = query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>AL.STORE</title>

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    padding: 40px;
    color: white;
}

/* JUDUL */
h2 {
    text-align: center;
    font-size: 36px;
    letter-spacing: 3px;
    color: #00bfff;
    margin-bottom: 30px;
}

/* BUTTON TAMBAH */
.btn-tambah {
    display: inline-block;
    padding: 12px 25px;
    background: #00bfff;
    color: black;
    text-decoration: none;
    border-radius: 12px;
    font-weight: bold;
    margin-bottom: 20px;
    transition: 0.3s;
}

.btn-tambah:hover {
    background: #009acd;
    transform: scale(1.05);
    box-shadow: 0 0 15px #00bfff;
}

/* CARD TABLE */
.table-card {
    background: #111;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 0 40px rgba(0,191,255,0.3);
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
}

thead {
    background: #00bfff;
    color: black;
}

th, td {
    padding: 15px;
}

tbody tr {
    border-bottom: 1px solid #333;
    transition: 0.3s;
}

tbody tr:hover {
    background: #1c1c1c;
}

/* FOTO */
td img {
    width: 90px;
    border-radius: 15px;
    box-shadow: 0 0 15px #00bfff;
}

/* BUTTON AKSI */
.btn-edit {
    background: orange;
    color: white;
    padding: 8px 15px;
    border-radius: 8px;
    text-decoration: none;
    margin-right: 5px;
    transition: 0.3s;
}

.btn-edit:hover {
    background: darkorange;
    transform: scale(1.05);
}

.btn-hapus {
    background: red;
    color: white;
    padding: 8px 15px;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.3s;
}

.btn-hapus:hover {
    background: darkred;
    transform: scale(1.05);
}
</style>

</head>
<body>

<h2>AL.STORE</h2>

<a href="tambah.php" class="btn-tambah">+ Tambah Produk</a>

<div class="table-card">
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

<?php if(empty($produk)): ?>
<tr>
    <td colspan="6">Data belum ada</td>
</tr>
<?php endif; ?>

<?php $no=1; foreach($produk as $p): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= htmlspecialchars($p['namaproduk']); ?></td>
    <td>Rp <?= number_format($p['harga'],0,',','.'); ?></td>
    <td><?= $p['stok']; ?></td>
    <td>
        <?php if(!empty($p['foto'])): ?>
            <img src="img/<?= $p['foto']; ?>">
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
    <td>
        <a href="ubah.php?id=<?= $p['id']; ?>" class="btn-edit">Ubah</a>
        <a href="hapus.php?id=<?= $p['id']; ?>" 
        class="btn-hapus"
        onclick="return confirm('Yakin hapus data ini?');">
        Hapus
        </a>
    </td>
</tr>
<?php endforeach; ?>

    </tbody>
</table>
</div>

</body>
</html>