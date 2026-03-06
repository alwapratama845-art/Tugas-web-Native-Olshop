<?php

$koneksi = mysqli_connect("localhost","root","","native");

if(!$koneksi){
    die("Koneksi database gagal");
}

function query($query){
    global $koneksi;

    $result = mysqli_query($koneksi,$query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}


/* ================= TAMBAH ================= */

function tambah($data){

    global $koneksi;

    $nama  = htmlspecialchars($data["namaproduk"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok  = htmlspecialchars($data["stok"]);

    $foto = uploadFoto();

    if(!$foto){
        return false;
    }

    $query = "INSERT INTO produk
                VALUES
                ('','$nama','$harga','$stok','$foto')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}


/* ================= HAPUS ================= */

function hapus($id){

    global $koneksi;

    mysqli_query($koneksi,"DELETE FROM produk WHERE id=$id");

    return mysqli_affected_rows($koneksi);
}


/* ================= UBAH ================= */

function ubah($data){

    global $koneksi;

    $id    = $data["id"];
    $nama  = htmlspecialchars($data["namaproduk"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok  = htmlspecialchars($data["stok"]);

    $fotoLama = $data["fotoLama"];

    if($_FILES["foto"]["error"] === 4){
        $foto = $fotoLama;
    }else{
        $foto = uploadFoto();
    }

    $query = "UPDATE produk SET
                namaproduk = '$nama',
                harga = '$harga',
                stok = '$stok',
                foto = '$foto'
              WHERE id = $id";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}


/* ================= UPLOAD FOTO ================= */

function uploadFoto(){

    $namaFile = $_FILES["foto"]["name"];
    $tmpName  = $_FILES["foto"]["tmp_name"];
    $error    = $_FILES["foto"]["error"];

    if($error === 4){
        echo "<script>alert('Pilih gambar dulu');</script>";
        return false;
    }

    $extValid = ["jpg","jpeg","png"];
    $ext = strtolower(pathinfo($namaFile,PATHINFO_EXTENSION));

    if(!in_array($ext,$extValid)){
        echo "<script>alert('File harus gambar');</script>";
        return false;
    }

    $namaBaru = uniqid();
    $namaBaru .= ".";
    $namaBaru .= $ext;

    move_uploaded_file($tmpName,"img/".$namaBaru);

    return $namaBaru;

}

?>