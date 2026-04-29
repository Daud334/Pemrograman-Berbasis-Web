<?php
include 'koneksi_db.php';

$query = "
SELECT pesanan.id AS pesanan_id, pelanggan.nama AS nama_pelanggan, pesanan.tanggal_pesanan, pesanan.total_harga
FROM pesanan
JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id
";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Daftar Pesanan</title>
</head>

<body>

<?php include 'nav.php' ?>

<div class="container mt-4">
    <h2>Daftar Pesanan</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Pesanan</th>
                <th>Total Harga</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['pesanan_id'] ?></td>
                <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                <td><?= $row['tanggal_pesanan'] ?></td>
                <td>Rp<?= number_format($row['total_harga'], 2) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>