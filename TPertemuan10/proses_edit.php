<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_buah = $_POST['nama_buah'];
    $jenis_buah = $_POST['jenis_buah'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE buah SET nama_buah=?, jenis_buah=?, harga=?, stok=? WHERE id=?");
    $stmt->bind_param("ssiii", $nama_buah, $jenis_buah, $harga, $stok, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.location='index.php';</script>";
    }
    $stmt->close();
}
$conn->close();
?>