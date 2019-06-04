<?php
require_once 'class.php';
$kode_mp	= $_REQUEST['kode_mp'];
$conn 		= new db_class();
$conn->delete($kode_mp);
echo "<script>alert('Data Telah Terhapus');</script>";
echo "<script> document.location.href='index.php?lihat=mp/index'; </script>";
?>