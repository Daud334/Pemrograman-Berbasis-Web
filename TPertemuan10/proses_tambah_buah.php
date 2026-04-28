<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_buah = $_POST['nama_buah'];
    $jenis_buah = $_POST['jenis_buah'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    $stmt = $conn->prepare("insert into buah (nama_buah, jenis_buah, harga, stok) values (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $nama_buah, $jenis_buah, $harga, $stok);
    
    if ($stmt->execute()) {
        header("location: index.php?msg=added");
    } else {
        header("location: index.php?msg=error");
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("location: tambah_buah.php");
}
?>