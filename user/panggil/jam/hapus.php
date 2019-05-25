<?php
	require_once 'class.php';
	
	$kode_jam	= $_REQUEST['kode_jam'];
	$conn 		= new db_class();
	$conn->delete($kode_jam);
	header('location: index.php?lihat=jam/index');
?>