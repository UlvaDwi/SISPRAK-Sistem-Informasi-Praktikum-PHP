<?php
	require_once 'class.php';
	
	$kode_detail_materi	= $_REQUEST['kode_detail_materi'];
	$conn 		= new db_class();
	$conn->delete($kode_detail_materi);
	header('location: index.php?lihat=detailmateri/index');
?>