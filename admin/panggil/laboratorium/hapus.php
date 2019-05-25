<?php
	require_once 'class.php';
	
	$kode_lab	= $_REQUEST['kode_lab'];
	$conn 		= new db_class();
	$conn->delete($kode_lab);
	header('location: index.php?lihat=laboratorium/index');
?>