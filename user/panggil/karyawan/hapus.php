<?php
	require_once 'class.php';
	
	$kode_user	= $_REQUEST['kode_user'];
	$conn 		= new db_class();
	$conn->delete($kode_user);
	header('location: index.php?lihat=karyawan/index');
?>