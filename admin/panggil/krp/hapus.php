<?php
require_once 'class.php';
$npm= $_GET['npm'];
$kd= $_GET['id'];
$conn = new db_class();
$data = $conn->delete($kd, $npm);
echo "<script>alert('Jadwal telah dibatalkan');</script>";
echo "<script> document.location.href='index.php?lihat=krp/index'; </script>";
?>