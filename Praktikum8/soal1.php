<?php include 'menu.php';?>
<html>
    <head>
        <title>Soal 1 - Switch Statement</title>
    </head>
    <body>
        <h2>Soal 1: Menentukan Jenis Kendaraan Berdasarkan Jumlah Roda</h2>
        <form action="" method="post">
            <label for="roda">Masukan Jumlah Roda :</label>
            <input type="number" name="roda" placeholder="Jumlah Roda" required><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $roda = htmlspecialchars($_POST['roda']);
            echo "<br><strong>Hasil:</strong><br>";
            switch($roda){
                case "1":
                    echo "Roda-1 = Unicycle (sepeda roda satu)";
                    break;
                case "2":
                    echo "Roda-2 = Sepeda, sepeda motor, skuter.";
                    break;
                case "3":
                    echo "Roda-3 = Becak, bajay,Sepeda roda tiga.";
                    break;
                case "4":
                    echo "Roda-4 = Mobil, mobil pikap, sedan, jeep.";
                    break;
                case "6":
                    echo "Roda-6 = Truk (engkel/tronton, bus).";
                    break;
                case "8":
                    echo "Roda-8 = Tronton";
                    break;
                default:
                    echo "Tidak ada kendaraan dengan jumlah roda tersebut";
            }
        }
        ?>
    </body>
</html>