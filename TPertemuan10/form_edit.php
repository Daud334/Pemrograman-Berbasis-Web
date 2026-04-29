<?php
include 'koneksi_db.php';
include 'nav.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM buah WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Buah</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Buah</h2>
        <form method="post" action="proses_edit.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label for="nama_buah" class="form-label">Nama Buah</label>
                <input type="text" class="form-control" id="nama_buah" name="nama_buah" value="<?= htmlspecialchars($row['nama_buah']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenis_buah" class="form-label">Jenis Buah</label>
                <select class="form-select" id="jenis_buah" name="jenis_buah" required>
                    <option value="buah lokal" <?= ($row['jenis_buah'] == 'buah lokal') ? 'selected' : '' ?>>Buah Lokal</option>
                    <option value="buah impor" <?= ($row['jenis_buah'] == 'buah impor') ? 'selected' : '' ?>>Buah Impor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $row['harga'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?= $row['stok'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>