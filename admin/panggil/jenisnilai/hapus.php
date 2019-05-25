<?php
	require_once 'class.php';
	
	$kode_jn	= $_REQUEST['kode_jn'];
	$conn 		= new db_class();
	$conn->delete($kode_jn);
	header('location: index.php?lihat=jenisnilai/index');
?>