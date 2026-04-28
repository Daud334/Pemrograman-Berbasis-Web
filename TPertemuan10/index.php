<?php
include 'koneksi.php';
include 'nav.php';

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$search = isset($_GET['search']) ? $_GET['search'] : '';

$where = "";
if (!empty($search)) {
    $where = "where nama_buah like '%$search%' or jenis_buah like '%$search%'";
}

$total_result = $conn->query("select count(*) as total from buah $where");
$total_row = $total_result->fetch_assoc();
$total_data = $total_row['total'];
$total_pages = ceil($total_data / $limit);

$sql = "select * from buah $where order by id desc limit $start, $limit";
$result = $conn->query($sql);

$message = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'added') $message = '<div class="alert alert-success">buah berhasil ditambahkan!</div>';
    if ($_GET['msg'] == 'updated') $message = '<div class="alert alert-success">buah berhasil diupdate!</div>';
    if ($_GET['msg'] == 'deleted') $message = '<div class="alert alert-success">buah berhasil dihapus!</div>';
    if ($_GET['msg'] == 'error') $message = '<div class="alert alert-danger">terjadi kesalahan!</div>';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar buah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <?php echo $message; ?>
            
            <form method="GET" action="index.php" class="mb-3">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" placeholder="cari nama atau jenis buah..." value="<?php echo htmlspecialchars($search); ?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">cari</button>
                    </div>
                    <div class="col-md-2">
                        <a href="index.php" class="btn btn-secondary w-100">reset</a>
                    </div>
                </div>
            </form>
            
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr>
                        <th>id</th>
                        <th>nama buah</th>
                        <th>jenis buah</th>
                        <th>harga</th>
                        <th>stok</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['nama_buah']); ?></td>
                            <td><?php echo htmlspecialchars($row['jenis_buah']); ?></td>
                            <td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo $row['stok']; ?></td>
                            <td>
                                <a href="form_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">edit</a>
                                <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus?')">hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">tidak ada data buah</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <?php if ($total_pages > 1): ?>
            <nav>
                <ul class="pagination justify-content-center">
                    <?php if($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page-1; ?>&search=<?php echo urlencode($search); ?>">previous</a></li>
                    <?php endif; ?>
                    
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    
                    <?php if($page < $total_pages): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page+1; ?>&search=<?php echo urlencode($search); ?>">next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>