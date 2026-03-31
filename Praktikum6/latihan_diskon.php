<html>
<head>
    <title>Tugas Praktikum 6B_Latihan Diskon</title>
</head>
    <body>
<form method="post" action="">
    NPM: <input type="number" name="npm" require>
    Nama: <input type="text" name="nama" require><br>
    Prodi: <input type="text" name="prodi" require>
    Semester : <input type="number" name="semester"><br>
    Biaya UKT : <input type="number" name="ukt"><br>
    <input type="submit" name="submit" value="Proses"><br>
    <hr>
</form>
<?php
if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $semester = $_POST['semester'];
    $biayaUKT = $_POST['biayaUKT'];

    if ($biayaUKT >= 5000000) {
        $total = $biayaUKT - ($biayaUKT * 0.10);

        if ($semester > 8) {
            $total = $total - ($total * 0.05);
            $diskon = "10% + 5%";
        } else {
            $diskon = "10%";
        }
    } else {
        $total = $biayaUKT;
        $diskon = "0%";
    }

    echo "<b>Biodata dan UKT</b><br>";
    echo "NPM : $npm <br>";
    echo "Nama : $nama <br>";
    echo "Prodi : $prodi <br>";
    echo "Semester : $semester <br>";
    echo "Biaya UKT : $biayaUKT <br>";
    echo "Diskon : $diskon <br>";
    echo "Total Harga : $total <br>";
}
?>
<br>
<hr>