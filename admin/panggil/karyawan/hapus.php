<?php
	require_once 'class.php';
	
	$kode_user	= $_REQUEST['kode_user'];
	$conn 		= new db_class();
	$conn->delete($kode_user);
	echo "<script>alert('Data Telah Terhapus');</script>";
	echo "<script> document.location.href='index.php?lihat=karyawan/index'; </script>";
?>