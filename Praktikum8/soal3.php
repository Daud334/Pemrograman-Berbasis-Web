<?php include 'menu.php';?>
<html>
    <head>
        <title>Soal 3 - Array dan Foreach</title>
    </head>
    <body>
        <?php
        echo "<h3>Soal 3: Input & Tampilkan Daftar Hewan</h3>";
        ?>
        <p>Masukkan 5 nama hewan</p>
        <form method="POST" action="">
            <?php 
            for ($i = 1; $i <= 5; $i++) {
                echo "<label>Hewan ke-$i:</label> ";
                echo "<input type='text' name='hewan[]' required placeholder='Nama hewan...'><br><br>";
            }
            ?>
            <button type="submit" name="simpan">Masukan</button>
        </form>
        <hr>
        <?php
        if (isset($_POST['simpan'])) {
            $daftar_hewan = $_POST['hewan'];
            echo "<h4>Daftar Hewan yang Dimasukkan:</h4>";
            echo "<ul>";
            foreach ($daftar_hewan as $indeks => $nama) {
                echo "<li>Hewan ke-" . ($indeks + 1) . ": <b>" . htmlspecialchars($nama) . "</b></li>";
            }
            echo "</ul>";
            echo "<p>Total data di memori Array: " . count($daftar_hewan) . " nama hewan.</p>";
        }
        ?>
    </body>
</html>