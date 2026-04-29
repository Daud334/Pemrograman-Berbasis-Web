<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->begin_transaction();

    try {
        $pelanggan_id = $_POST['pelanggan_id'];
        $tanggal_pesanan = date('Y-m-d');
        $total_harga = 0;

        $stmt = $conn->prepare("INSERT INTO pesanan (tanggal_pesanan, pelanggan_id, total_harga) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $tanggal_pesanan, $pelanggan_id, $total_harga);
        $stmt->execute();
        $pesanan_id = $conn->insert_id;

        foreach ($_POST['buah'] as $buah) {
            $buah_id = $buah['id'];
            $kuantitas = $buah['kuantitas'];

            $stmt = $conn->prepare("SELECT harga, stok FROM buah WHERE id = ?");
            $stmt->bind_param("i", $buah_id);
            $stmt->execute();
            $stmt->bind_result($harga_per_satuan, $stok);
            $stmt->fetch();
            $stmt->close();

            if ($stok < $kuantitas) {
                throw new Exception("Stok buah ID $buah_id tidak cukup.");
            }

            $stmt = $conn->prepare("INSERT INTO detail_pesanan (pesanan_id, buah_id, kuantitas, harga_per_satuan) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiii", $pesanan_id, $buah_id, $kuantitas, $harga_per_satuan);
            $stmt->execute();

            $total_harga += $kuantitas * $harga_per_satuan;

            $stmt = $conn->prepare("UPDATE buah SET stok = stok - ? WHERE id = ?");
            $stmt->bind_param("ii", $kuantitas, $buah_id);
            $stmt->execute();
        }

        $stmt = $conn->prepare("UPDATE pesanan SET total_harga = ? WHERE id = ?");
        $stmt->bind_param("ii", $total_harga, $pesanan_id);
        $stmt->execute();

        $conn->commit();

        header("Location: transaksi.php?message=" . urlencode("Pesanan berhasil dibuat."));
        exit;

    } catch (Exception $e) {
        $conn->rollback();

        header("Location: transaksi.php?message=" . urlencode("Gagal membuat pesanan: " . $e->getMessage()));
        exit;
    }
}
?>