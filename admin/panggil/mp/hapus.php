<?php
	require_once 'class.php';
	
	$kode_mp	= $_REQUEST['kode_mp'];
	$conn 		= new db_class();
	$conn->delete($kode_mp);
	header('location: index.php?lihat=mp/index');
?>