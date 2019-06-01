<?php
	require_once 'class.php';
	
	$kode_aktivasi	= $_REQUEST['kode_asprak'];
	$conn 		= new db_class();
	$conn->approve($kode_aktivasi);
	
?>

