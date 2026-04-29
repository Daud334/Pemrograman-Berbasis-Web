<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_buah = $_POST['nama_buah'];
    $jenis_buah = $_POST['jenis_buah'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO buah (nama_buah, jenis_buah, harga, stok) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $nama_buah, $jenis_buah, $harga, $stok);

    if ($stmt->execute()) {
        echo "<script>
        alert('Buah berhasil ditambahkan!');
        window.location.href = 'tambah_buah.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menambahkan buah: " . addslashes($stmt->error) . "');
        window.location.href = 'tambah_buah.php';
        </script>";
    }
    $stmt->close();
}
$conn->close();
?>