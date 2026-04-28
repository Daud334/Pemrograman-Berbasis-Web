<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal_pesanan = $_POST['tanggal_pesanan'];
    $pelanggan_id = $_POST['pelanggan_id'];
    $buah_list = $_POST['buah'];
    
    $total_harga = 0;
    
    $conn->begin_transaction();
    
    try {
        $stmt_pesanan = $conn->prepare("insert into pesanan (tanggal_pesanan, pelanggan_id, total_harga) values (?, ?, ?)");
        $stmt_pesanan->bind_param("sii", $tanggal_pesanan, $pelanggan_id, $total_harga);
        $stmt_pesanan->execute();
        $pesanan_id = $conn->insert_id;
        
        $stmt_detail = $conn->prepare("insert into detail_pesanan (pesanan_id, buah_id, kuantitas, harga_per_satuan) values (?, ?, ?, ?)");
        $stmt_cek_stok = $conn->prepare("select harga, stok from buah where id = ?");
        $stmt_update_stok = $conn->prepare("update buah set stok = stok - ? where id = ?");
        
        foreach ($buah_list as $buah) {
            $buah_id = $buah['id'];
            $kuantitas = $buah['kuantitas'];
            
            $stmt_cek_stok->bind_param("i", $buah_id);
            $stmt_cek_stok->execute();
            $result = $stmt_cek_stok->get_result();
            $row = $result->fetch_assoc();
            
            if ($row['stok'] < $kuantitas) {
                throw new Exception("stok buah tidak cukup");
            }
            
            $harga_satuan = $row['harga'];
            $subtotal = $kuantitas * $harga_satuan;
            $total_harga += $subtotal;
            
            $stmt_detail->bind_param("iiii", $pesanan_id, $buah_id, $kuantitas, $harga_satuan);
            $stmt_detail->execute();
            
            $stmt_update_stok->bind_param("ii", $kuantitas, $buah_id);
            $stmt_update_stok->execute();
        }
        
        $stmt_update_total = $conn->prepare("update pesanan set total_harga = ? where id = ?");
        $stmt_update_total->bind_param("ii", $total_harga, $pesanan_id);
        $stmt_update_total->execute();
        
        $conn->commit();
        
        header("location: lihat_transaksi.php?msg=success");
        
    } catch (Exception $e) {
        $conn->rollback();
        header("location: transaksi.php?message=gagal membuat pesanan");
    }
    
    $conn->close();
} else {
    header("location: transaksi.php");
}
?>