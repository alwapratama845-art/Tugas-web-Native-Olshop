<?php
require 'functions.php';

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal tambah data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tambah Produk</title>

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* CARD */
.card {
    background: #111;
    padding: 50px;
    width: 650px;
    border-radius: 20px;
    box-shadow: 0 0 40px rgba(0, 170, 255, 0.4);
    color: white;
}

.card h2 {
    text-align: center;
    margin-bottom: 35px;
    font-size: 30px;
    color: #00bfff;
    letter-spacing: 2px;
}

/* INPUT */
.input-group {
    margin-bottom: 20px;
}

.input-group input {
    width: 100%;
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #333;
    background: #1c1c1c;
    color: white;
    font-size: 16px;
    transition: 0.3s;
}

.input-group input:focus {
    border-color: #00bfff;
    box-shadow: 0 0 10px #00bfff;
    outline: none;
}

/* BUTTON */
button {
    width: 100%;
    padding: 15px;
    background: #00bfff;
    border: none;
    border-radius: 12px;
    font-size: 18px;
    font-weight: bold;
    color: black;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #009acd;
    transform: scale(1.05);
    box-shadow: 0 0 20px #00bfff;
}

/* LINK */
.back {
    text-align: center;
    margin-top: 20px;
}

.back a {
    color: #00bfff;
    text-decoration: none;
}
</style>
</head>
<body>

<div class="card">
    <h2>✦ TAMBAH PRODUK ✦</h2>

    <form method="post" enctype="multipart/form-data">

        <div class="input-group">
            <input type="text" name="namaproduk" placeholder="Nama Produk" required>
        </div>

        <div class="input-group">
            <input type="number" name="harga" placeholder="Harga" required>
        </div>

        <div class="input-group">
            <input type="number" name="stok" placeholder="Stok" required>
        </div>

        <div class="input-group">
            <input type="file" name="foto" required>
        </div>

        <button type="submit" name="submit">Tambah Sekarang</button>
    </form>

    <div class="back">
        <a href="index.php">← Kembali</a>
    </div>
</div>

</body>
</html>