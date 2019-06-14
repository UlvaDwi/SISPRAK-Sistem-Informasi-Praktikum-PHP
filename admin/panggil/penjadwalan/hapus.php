<?php
	require_once 'class.php';
	
	$kode_kelas	= $_REQUEST['kode_jadwal_praktikum'];
	$conn 		= new db_class();
	$conn->delete($kode_jadwal_praktikum);
	header('location: index.php?lihat=penjadwalan/index');
?>