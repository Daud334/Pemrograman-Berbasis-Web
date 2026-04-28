<?php
include 'koneksi.php';
include 'nav.php';

$buah_result = $conn->query("select id, nama_buah, harga, stok from buah where stok > 0");
$pelanggan_result = $conn->query("select id, nama from pelanggan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buat pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>buat pesanan baru</h3>
        </div>
        <div class="card-body">
            <?php if (isset($_GET['message'])): ?>
                <div class="alert alert-info"><?php echo htmlspecialchars($_GET['message']); ?></div>
            <?php endif; ?>
            
            <form method="post" action="proses_transaksi.php">
                <div class="mb-3">
                    <label class="form-label">pilih pelanggan</label>
                    <select class="form-select" name="pelanggan_id" required>
                        <option value="">pilih pelanggan</option>
                        <?php while($row = $pelanggan_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <h4>daftar buah</h4>
                <div id="buah-container">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-select" name="buah[0][id]" required>
                                <option value="">pilih buah</option>
                                <?php
                                $buah_result->data_seek(0);
                                while($row = $buah_result->fetch_assoc()):
                                ?>
                                    <option value="<?php echo $row['id']; ?>" data-harga="<?php echo $row['harga']; ?>" data-stok="<?php echo $row['stok']; ?>">
                                        <?php echo $row['nama_buah']; ?> - stok: <?php echo $row['stok']; ?> - Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="buah[0][kuantitas]" class="form-control" placeholder="jumlah" min="1" required>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-danger hapus-buah">hapus</button>
                        </div>
                    </div>
                </div>
                
                <button type="button" id="tambah-buah" class="btn btn-secondary mb-3">+ tambah buah lagi</button>
                
                <div class="mb-3">
                    <label class="form-label">tanggal pesanan</label>
                    <input type="date" name="tanggal_pesanan" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                
                <button type="submit" class="btn btn-primary">simpan pesanan</button>
                <a href="index.php" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>
</div>

<script>
let buahIndex = 1;
document.getElementById('tambah-buah').addEventListener('click', function() {
    const container = document.getElementById('buah-container');
    const newRow = document.createElement('div');
    newRow.className = 'row mb-3';
    newRow.innerHTML = `
        <div class="col-md-6">
            <select class="form-select" name="buah[${buahIndex}][id]" required>
                <option value="">pilih buah</option>
                <?php
                $buah_result->data_seek(0);
                while($row = $buah_result->fetch_assoc()):
                ?>
                    <option value="<?php echo $row['id']; ?>" data-harga="<?php echo $row['harga']; ?>" data-stok="<?php echo $row['stok']; ?>">
                        <?php echo $row['nama_buah']; ?> - stok: <?php echo $row['stok']; ?> - Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-3">
            <input type="number" name="buah[${buahIndex}][kuantitas]" class="form-control" placeholder="jumlah" min="1" required>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-danger hapus-buah">hapus</button>
        </div>
    `;
    container.appendChild(newRow);
    buahIndex++;
    
    document.querySelectorAll('.hapus-buah').forEach(btn => {
        btn.removeEventListener('click', hapusBuah);
        btn.addEventListener('click', hapusBuah);
    });
});

function hapusBuah(e) {
    e.target.closest('.row').remove();
}

document.querySelectorAll('.hapus-buah').forEach(btn => {
    btn.addEventListener('click', hapusBuah);
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>