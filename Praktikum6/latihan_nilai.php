<html>
<head>
    <title>Tugas Praktikum 6A_Latihan Nilai</title>
</head>
<body>
<form method="post" action="">
    Nama: <input type="text" name="nama"><br>
    Nilai: <input type="number" name="nilai"><br>
    <input type="submit" name="submit" value="Proses">
</form>
<br>
<hr>


<?php
if (isset($_POST['submit'])) {
    $var_nama = $_POST['nama'];
    $var_nilai = $_POST['nilai'];

    echo "<h3>Konversi Nilai:</h3>";
    echo "Nama : $var_nama <br>";
    echo "Nilai : $var_nilai <br>";
    if ($var_nilai >= 85 && $var_nilai <= 100) {
        $predikat = "A";
        $status = "Lulus";
        $keterangan = "Wah, hebat sekali! Pertahankan prestasimu, Nak!";
    } elseif ($var_nilai >= 75 && $var_nilai <= 84) {
        $predikat = "B";
        $status = "Lulus";
        $keterangan = "Bagus, tapi masih bisa ditingkatkan lagi. Belajar lebih giat ya!";
    } elseif ($var_nilai >= 65 && $var_nilai <= 74) {
        $predikat = "C";
        $status = "Lulus";
        $keterangan = "Cukup, tetapi perlu belajar lebih rajin agar nilainya lebih baik.";
    } elseif ($var_nilai >= 50 && $var_nilai <= 64) {
        $predikat = "D";
        $status = "Lulus";
        $keterangan = "Kurang, harus lebih serius dalam belajar. Jangan menyerah!";
    } elseif ($var_nilai >= 0 && $var_nilai <= 49) {
        $predikat = "E";
        $status = "Tidak Lulus";
        $keterangan = "Maaf, kamu belum lulus. Harus belajar lebih giat dan berusaha lagi ya!";
    } else {
        $predikat = "Tidak Valid";
        $status = "-";
        $keterangan = "Nilai yang dimasukkan tidak sesuai (0-100). Coba periksa kembali!";
    }
    echo "Predikat : $predikat <br>";
    echo "Status : $status <br>";
    echo "Keterangan : $keterangan <br>";
    }
?>
</body>
</html>