<?php
include 'koneksi_db.php';
include 'nav.php';

$buah_result = $conn->query("SELECT id, nama_buah FROM buah");
$pelanggan_result = $conn->query("SELECT id, nama FROM pelanggan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Buat Pesanan</title>
</head>

<body>

<div class="container mt-4">
    <h2>Buat Pesanan Baru</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info">
            <?= htmlspecialchars($_GET['message']) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="proses_transaksi.php">

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">
                Pilih Pelanggan
            </label>

            <select class="form-select" name="pelanggan_id" id="pelanggan_id" required>
                <option value="">Pilih Pelanggan</option>

                <?php while ($row = $pelanggan_result->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>">
                        <?= $row['nama'] ?>
                    </option>
                <?php endwhile; ?>

            </select>
        </div>

        <h3>Daftar Buah</h3>

        <div class="mb-3">
            <label for="buah_id" class="form-label">
                Pilih Buah
            </label>

            <select class="form-select" name="buah[1][id]" id="buah_id" required>
                <option value="">Pilih Buah</option>

                <?php while ($row = $buah_result->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>">
                        <?= $row['nama_buah'] ?>
                    </option>
                <?php endwhile; ?>

            </select>
        </div>

        <div class="mb-3">
            <label for="kuantitas" class="form-label">
                Jumlah Buah
            </label>

            <input 
                type="number" 
                class="form-control"
                id="kuantitas" 
                name="buah[1][kuantitas]" 
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Buat Pesanan
        </button>

    </form>
</div>

</body>
</html>