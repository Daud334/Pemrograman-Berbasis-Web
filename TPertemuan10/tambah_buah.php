<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Buah</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Buah Baru</h2>
        <form method="post" action="proses_tambah_buah.php">
            <div class="mb-3">
                <label for="nama_buah" class="form-label">Nama Buah</label>
                <input type="text" class="form-control" id="nama_buah" name="nama_buah" required>
            </div>
            <div class="mb-3">
                <label for="jenis_buah" class="form-label">Jenis Buah</label>
                <select class="form-select" id="jenis_buah" name="jenis_buah" required>
                    <option value="">Pilih Jenis</option>
                    <option value="buah lokal">Buah Lokal</option>
                    <option value="buah impor">Buah Impor</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Buah</button>
        </form>
    </div>
</body>
</html>