<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah buah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>tambah buah baru</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="proses_tambah_buah.php">
                <div class="mb-3">
                    <label class="form-label">nama buah</label>
                    <input type="text" name="nama_buah" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">jenis buah</label>
                    <select name="jenis_buah" class="form-select" required>
                        <option value="">pilih jenis</option>
                        <option value="buah lokal">buah lokal</option>
                        <option value="buah impor">buah impor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">simpan</button>
                <a href="index.php" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>