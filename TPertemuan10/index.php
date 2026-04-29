<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}

include 'proses_index.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Daftar Buah</title>
</head>

<body>

<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h2>Daftar Buah</h2>

    <form method="get" class="row g-3 mb-4">
        
        <div class="col-md-5">
            <label for="nama_buah" class="form-label">
                Cari Berdasarkan Nama Buah
            </label>
            <input 
                type="text" 
                class="form-control"
                id="nama_buah" 
                name="nama_buah" 
                placeholder="Masukkan nama buah"
                value="<?= htmlspecialchars($search_nama) ?>">
        </div>

        <div class="col-md-3">
            <label for="jenis_buah" class="form-label">
                Cari Berdasarkan Jenis Buah
            </label>
            <input 
                type="text" 
                class="form-control"
                id="jenis_buah" 
                name="jenis_buah"
                placeholder="Masukkan jenis buah" 
                value="<?= htmlspecialchars($search_jenis) ?>">
        </div>

        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-primary">
                Cari
            </button>
        </div>

        <div class="col-md-2 align-self-end">
            <a href="index.php" class="btn btn-secondary">
                Reset
            </a>
        </div>

    </form>

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
                    <a href="form_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <a href="proses_hapus.php?id=<?= $row['id'] ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin ingin menghapus?')">
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