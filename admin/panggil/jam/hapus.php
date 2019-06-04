<?php
require_once 'class.php';
$kode_jam	= $_REQUEST['kode_jam'];
$conn 		= new db_class();
$conn->delete($kode_jam);
echo "<meta http-equiv='refresh' content='0; url= index.php?lihat=jam/index'>";
echo "<script>alert('Data Telah Terhapus');</script>";
?>