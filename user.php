<?php
session_start(); // cukup satu kali
require 'functions.php'; // pastikan file ini ada dan berisi fungsi query()

// Ambil semua produk dari database
$produk = query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AL.STORE</title>

    <style>
        body {
            background: linear-gradient(#0f2027,#203a43,#2c5364);
            font-family: Arial, sans-serif;
            color: white;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #29b6f6;
            padding: 20px 0;
        }

        .keranjang {
            display: block;
            width: 200px;
            margin: 0 auto 20px auto;
            text-align: center;
            padding: 10px;
            background: #29b6f6;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background: #0b0b0b;
            width: 220px;
            margin: 20px;
            padding: 15px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 15px #00c6ff;
        }

        .card img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
        }

        .harga {
            color: #29b6f6;
            font-size: 18px;
            margin: 10px 0;
        }

        button {
            margin-top: 10px;
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            background: #00c6ff;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background: #0094cc;
        }
    </style>
</head>

<body>

<h1>AL.STORE</h1>

<a class="keranjang" href="lihatkeranjang.php">🛒 Lihat Keranjang</a>

<div class="container">
    <?php foreach($produk as $row) : ?>
        <div class="card">
            <img src="img/<?= htmlspecialchars($row["foto"]); ?>" alt="<?= htmlspecialchars($row["namaproduk"]); ?>">
            <h3><?= htmlspecialchars($row["namaproduk"]); ?></h3>
            <p class="harga">Rp <?= number_format($row["harga"], 0, ',', '.'); ?></p>

            <form action="keranjang.php" method="post">
                <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                <button type="submit">Masukkan Keranjang</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>