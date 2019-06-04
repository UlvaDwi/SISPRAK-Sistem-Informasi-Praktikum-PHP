<?php
	require_once 'class.php';
	
	$kode_ta	= $_REQUEST['kode_ta'];
	$conn 		= new db_class();
	$conn->delete($kode_ta);
	echo "<meta http-equiv='refresh' content='0; url= index.php?lihat=tahunajaran/index'>";
	echo "<script>alert('Data Telah Terhapus');</script>";
?>