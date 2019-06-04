<?php
require_once 'class.php';
$kode_lab	= $_REQUEST['kode_lab'];
$conn 		= new db_class();
$conn->delete($kode_lab);
echo "<meta http-equiv='refresh' content='0; url=index.php?lihat=laboratorium/index'>";
echo "<script>alert('Data Telah Terhapus');</script>";
?>