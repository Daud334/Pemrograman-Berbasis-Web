<html>
<head>
    <title>Tugas Praktikum 6B_Latihan Diskon</title>
</head>
    <body>
<form method="post" action="">
    NPM: <input type="text" name="npm" required><br>
    Nama: <input type="text" name="nama" required><br>
    Prodi: <input type="text" name="prodi" required><br>
    Semester : <input type="number" name="semester" required><br>
    Biaya UKT : <input type="number" name="ukt" required><br>
    <input type="submit" name="submit" value="Proses" required><br>
    <hr>
</form>
<?php
if (isset($_POST['submit'])) {
    $npm = htmlspecialchars($_POST['npm']);
    $nama = htmlspecialchars($_POST['nama']);
    $prodi = htmlspecialchars($_POST['prodi']);
    $semester = $_POST['semester'];
    $biayaUKT = $_POST['ukt'];

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
    echo "Yang harus dibayar : $total <br>";
}
?>
<br>
<hr>