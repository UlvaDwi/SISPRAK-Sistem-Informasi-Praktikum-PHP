<?php
	require_once 'class.php';
	
	$kode_jurusan	= $_REQUEST['kode_jurusan'];
	$conn 		= new db_class();
	$conn->delete($kode_jurusan);
	header('location: index.php?lihat=jurusan/index');
?>