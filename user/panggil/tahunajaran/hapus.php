<?php
	require_once 'class.php';
	
	$kode_ta	= $_REQUEST['kode_ta'];
	$conn 		= new db_class();
	$conn->delete($kode_ta);
	header('location: index.php?lihat=tahunajaran/index');
?>