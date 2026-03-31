<?php
$namabarang = ["Memori", "Komputer", "Keyboard", "Handphone", "Mouse"];
$hargasatuan = [550, 500, 150, 200, 50];
$jumlahbeli = 2;
$totalharga = $jumlahbeli * $hargasatuan[2];
define("PAJAK", 0.1);
$pajak = $totalharga * PAJAK ;


echo "<h2><b>Perhitungan Total Pembelian Barang (Dengan Array)</b> </h2>";
echo "<hr>";
echo "Nama Barang : " . $namabarang[2] . "<br>";
echo "Harga Satuan : Rp " . $hargasatuan[2] . ".000" . "<br>";
echo "Jumlah Beli : " . $jumlahbeli . "<br>";
echo "Total Harga (Sebelum Pajak) : Rp " . $totalharga . ".000" . "<br>";
echo "Pajak : Rp " . $pajak . ".000" . "<br>";
echo "<b>Total Bayar : RP </b>" . $totalharga +  $pajak . "<b>.000</b>" . "<br>";
echo "<a href='../Praktikum6/latihan_nilai.php'>Masuk ke Tugas Selanjutnya (Praktikum 6A) </a>"."<br>"; 
echo "<hr><h3><b>Opsional</b></h3>";
echo "<a href='../Praktikum6/latihan_diskon.php'>Masuk ke Tugas Selanjutnya (Praktikum 6B) </a>";
?>
