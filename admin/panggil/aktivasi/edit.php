<?php
	require_once 'class.php';
	
	$kode_aktivasi	= $_REQUEST['kode_aktivasi'];
	$conn 		= new db_class();
	$conn->approve($kode_aktivasi);
	
?>

