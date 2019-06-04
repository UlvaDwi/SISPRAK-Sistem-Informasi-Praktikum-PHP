<?php
	require_once 'class.php';
	
	$kode_jurusan	= $_REQUEST['kode_jurusan'];
	$conn 		= new db_class();
	$conn->delete($kode_jurusan);
	echo "<script>alert('Data Telah Terhapus');</script>";
	echo "<script> document.location.href='index.php?lihat=jurusan/index'; </script>";
?>