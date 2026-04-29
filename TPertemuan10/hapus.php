<?php
include 'koneksi_db.php';
include 'nav.php';

$result = $conn->query("SELECT * FROM buah");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Hapus Buah</title>
</head>

<body>

<div class="container mt-4">
    <h2>Hapus Buah</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Buah</th>
                <th>Jenis Buah</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nama_buah']) ?></td>
                <td><?= htmlspecialchars($row['jenis_buah']) ?></td>
                <td>Rp<?= number_format($row['harga'], 2) ?></td>
                <td><?= $row['stok'] ?></td>
                <td>
                    <a href="proses_hapus.php?id=<?= $row['id'] ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin ingin menghapus buah ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>