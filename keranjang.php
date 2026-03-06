<?php
session_start();
require 'functions.php';

$id = $_POST["id"];

$produk = query("SELECT * FROM produk WHERE id=$id")[0];

$item = [
"id" => $produk["id"],
"nama" => $produk["namaproduk"],
"harga" => $produk["harga"],
"foto" => $produk["foto"]
];

$_SESSION["keranjang"][] = $item;

header("Location: lihatkeranjang.php");
exit;
?>