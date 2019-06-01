<?php
	require_once 'class.php';
	$kode_aktivasi	= $_REQUEST['kode_asprak'];
	$conn 		= new db_class();
	$conn->delete($kode_aktivasi);
	header('location: index.php?lihat=asprak/index');
?>