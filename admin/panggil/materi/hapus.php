<?php
	require_once 'class.php';
	
	$kode_materi	= $_REQUEST['kode_materi'];
	$conn 		= new db_class();
	$conn->delete($kode_materi);
	header('location: index.php?lihat=materi/index');
?>