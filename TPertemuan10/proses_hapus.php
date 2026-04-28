<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    $stmt = $conn->prepare("delete from buah where id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("location: index.php?msg=deleted");
    } else {
        header("location: index.php?msg=error");
    }
    
    $stmt->close();
    $conn->close();
} else {
    header("location: index.php");
}
?>