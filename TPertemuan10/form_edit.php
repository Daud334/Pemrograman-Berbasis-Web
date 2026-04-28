<?php
include 'koneksi.php';
include 'nav.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $conn->prepare("select * from buah where id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit buah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h3>edit data buah</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="proses_edit.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label class="form-label">nama buah</label>
                    <input type="text" name="nama_buah" class="form-control" value="<?php echo htmlspecialchars($row['nama_buah']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">jenis buah</label>
                    <select name="jenis_buah" class="form-select" required>
                        <option value="buah lokal" <?php echo ($row['jenis_buah'] == 'buah lokal') ? 'selected' : ''; ?>>buah lokal</option>
                        <option value="buah impor" <?php echo ($row['jenis_buah'] == 'buah impor') ? 'selected' : ''; ?>>buah impor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">harga</label>
                    <input type="number" name="harga" class="form-control" value="<?php echo $row['harga']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">stok</label>
                    <input type="number" name="stok" class="form-control" value="<?php echo $row['stok']; ?>" required>
                </div>
                <button type="submit" class="btn btn-warning">update</button>
                <a href="index.php" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>