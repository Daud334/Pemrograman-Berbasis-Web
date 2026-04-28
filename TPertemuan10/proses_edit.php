<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_buah = $_POST['nama_buah'];
    $jenis_buah = $_POST['jenis_buah'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    
    $stmt = $conn->prepare("update buah set nama_buah=?, jenis_buah=?, harga=?, stok=? where id=?");
    $stmt->bind_param("ssiii", $nama_buah, $jenis_buah, $harga, $stok, $id);
    
    if ($stmt->execute()) {
        header("location: index.php?msg=updated");
    } else {
        header("location: index.php?msg=error");
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("location: index.php");
}
?>