<?php
require_once 'class.php';
$kode_detail_materi	= $_REQUEST['kode_detail_materi'];
$conn 		= new db_class();
$conn->delete($kode_detail_materi);
echo "<meta http-equiv='refresh' content='0; url= index.php?lihat=detailmateri/index'>";
echo "<script>alert('Data Telah Terhapus');</script>";
?>