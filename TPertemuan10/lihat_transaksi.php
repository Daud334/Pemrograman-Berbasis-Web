<?php
include 'koneksi.php';
include 'nav.php';

$sql = "select p.*, pel.nama as nama_pelanggan 
        from pesanan p 
        join pelanggan pel on p.pelanggan_id = pel.id 
        order by p.id desc";
$result = $conn->query($sql);

$message = "";
if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
    $message = '<div class="alert alert-success">pesanan berhasil dibuat!</div>';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lihat pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h3>daftar pesanan</h3>
        </div>
        <div class="card-body">
            <?php echo $message; ?>
            
            <table class="table table-bordered table-striped">
                <thead class="table-info">
                    <tr>
                        <th>id pesanan</th>
                        <th>tanggal</th>
                        <th>pelanggan</th>
                        <th>total harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['tanggal_pesanan']; ?></td>
                            <td><?php echo htmlspecialchars($row['nama_pelanggan']); ?></td>
                            <td><?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">belum ada pesanan</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <a href="index.php" class="btn btn-secondary">kembali</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>