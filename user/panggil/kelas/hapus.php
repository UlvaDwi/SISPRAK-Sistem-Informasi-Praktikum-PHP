<?php
	require_once 'class.php';
	
	$kode_kelas	= $_REQUEST['kode_kelas'];
	$conn 		= new db_class();
	$conn->delete($kode_kelas);
	header('location: index.php?lihat=kelas/index');
?>