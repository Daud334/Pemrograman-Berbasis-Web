<?php include 'menu.php';?>
<html>
    <head>
        <title>Soal 2 - For Loop</title>
    </head>
    <body>
        <h2>Soal 2: Mencetak Bilangan Genap</h2>
        <form action="" method="post">
            <label for="awal">Nomor Awal :</label>
            <input type="number" name="awal" required><br><br>
            <label for="akhir">Nomor Akhir :</label>
            <input type="number" name="akhir" required><br><br>
            <input type="submit" name="submit" value="Cetak">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $awal = htmlspecialchars($_POST['awal']);
            $akhir = htmlspecialchars($_POST['akhir']);
            
            echo "<br><strong>Bilangan genap dari $awal sampai $akhir:</strong><br>";
            
            $ada_genap = false;
            for ($i = $awal; $i <= $akhir; $i++) {
                if ($i % 2 == 0) {
                    echo "$i<br>";
                    $ada_genap = true;
                }
            }
            
            if (!$ada_genap) {
                echo "Tidak ada bilangan genap dalam rentang tersebut.";
            }
        }
        ?>
    </body>
</html>