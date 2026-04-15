<?php include 'menu.php'; ?>
<html>
    <head>
        <title>Soal 4 - Ternary Operator</title>
    </head>
    <body>
        <h2>Soal 4: Menentukan Angka Genap atau Ganjil</h2>
        <form action="" method="post">
            <label for="angka">Masukan Angka :</label>
            <input type="number" name="angka" placeholder="Masukkan angka" required><br><br>
            <input type="submit" name="submit" value="Cek">
        </form>
        
        <?php
        if (isset($_POST['submit'])) {
            $angka = htmlspecialchars($_POST['angka']);
            $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
            
            echo "<br><b>Hasil:</b><br>";
            echo "Angka $angka adalah bilangan $status";
        }
        ?>
    </body>
</html>