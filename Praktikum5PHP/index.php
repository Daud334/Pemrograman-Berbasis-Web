<?php
$namabarang = ["Memori", "Komputer", "Keyboard", "Handphone", "Mouse"];
$hargasatuan = [550, 500, 150, 200, 50];
$jumlahbeli = 2;
$pajak = 0.1;
$totalharga = $jumlahbeli * $hargasatuan[2];

echo "<h2><b>Perhitungan Total Pembelian Barang (Dengan Array)</b> </h2>";
echo "<hr style='width:40%; border:2px solid black; margin-left:0;'>";
echo "Nama Barang : " . $namabarang[2] . "<br>";
echo "Harga Satuan : Rp " . $hargasatuan[2] . ".000" . "<br>";
echo "Jumlah Beli : " . $jumlahbeli . "<br>";
echo "Total Harga (Sebelum Pajak) : Rp " . $totalharga . ".000" . "<br>";
echo "Pajak : Rp " . $pajak * $totalharga . ".000" . "<br>";
echo "<b>Total Bayar : RP </b>" . $totalharga + $totalharga * $pajak . "<b>.000</b>" . "<br>";
?>