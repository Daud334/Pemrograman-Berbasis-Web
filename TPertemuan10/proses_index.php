<?php
include 'koneksi_db.php';

$search_nama = isset($_GET['nama_buah']) ? $_GET['nama_buah'] : '';
$search_jenis = isset($_GET['jenis_buah']) ? $_GET['jenis_buah'] : '';

$query = "select * from buah where 1=1";

if (!empty($search_nama)) {
    $query .= " and nama_buah like '%" . $conn->real_escape_string($search_nama) . "%'";
}

if (!empty($search_jenis)) {
    $query .= " and jenis_buah like '%" . $conn->real_escape_string($search_jenis) . "%'";
}

$result = $conn->query($query);
?>