<?php
require 'functions.php';

$id = $_GET['id'];
$p = query("SELECT * FROM produk WHERE id=$id")[0];

if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal ubah data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Ubah Produk</title>

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
    width: 700px;
    border-radius: 25px;
    box-shadow: 0 0 50px rgba(0, 191, 255, 0.4);
    color: white;
}

.card h2 {
    text-align: center;
    margin-bottom: 35px;
    font-size: 32px;
    color: #00bfff;
    letter-spacing: 2px;
}

/* PREVIEW FOTO */
.preview {
    text-align: center;
    margin-bottom: 25px;
}

.preview img {
    width: 220px;
    border-radius: 20px;
    box-shadow: 0 0 25px #00bfff;
}

/* INPUT */
.input-group {
    margin-bottom: 20px;
}

.input-group input {
    width: 100%;
    padding: 15px;
    border-radius: 12px;
    border: 1px solid #333;
    background: #1c1c1c;
    color: white;
    font-size: 16px;
    transition: 0.3s;
}

.input-group input:focus {
    border-color: #00bfff;
    box-shadow: 0 0 12px #00bfff;
    outline: none;
}

/* BUTTON */
button {
    width: 100%;
    padding: 16px;
    background: #00bfff;
    border: none;
    border-radius: 15px;
    font-size: 18px;
    font-weight: bold;
    color: black;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #009acd;
    transform: scale(1.05);
    box-shadow: 0 0 25px #00bfff;
}

/* LINK */
.back {
    text-align: center;
    margin-top: 20px;
}

.back a {
    color: #00bfff;
    text-decoration: none;
    font-size: 15px;
}
</style>
</head>
<body>

<div class="card">
    <h2>✦ UBAH PRODUK ✦</h2>

    <form method="post" enctype="multipart/form-data">

        <!-- ID & FOTO LAMA -->
        <input type="hidden" name="id" value="<?= $p['id']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $p['foto']; ?>">

        <!-- Preview Foto Lama -->
        <?php if(!empty($p['foto'])): ?>
        <div class="preview">
            <img src="img/<?= $p['foto']; ?>">
        </div>
        <?php endif; ?>

        <div class="input-group">
            <input type="text" name="namaproduk"
                value="<?= htmlspecialchars($p['namaproduk']); ?>" required>
        </div>

        <div class="input-group">
            <input type="number" name="harga"
                value="<?= $p['harga']; ?>" required>
        </div>

        <div class="input-group">
            <input type="number" name="stok"
            value="<?= $p['stok']; ?>" required>
        </div>

        <div class="input-group">
            <input type="file" name="foto">
        </div>

        <button type="submit" name="submit">Update Sekarang</button>
    </form>

    <div class="back">
        <a href="index.php">← Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>