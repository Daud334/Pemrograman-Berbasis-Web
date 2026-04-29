<?php
$conn = new mysqli('localhost', 'root', '', 'db_toko_buah');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>