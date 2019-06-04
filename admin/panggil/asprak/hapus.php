<?php
	require_once 'class.php';
	
	$kode_asprak	= $_REQUEST['kode_asprak'];
	$conn 		= new db_class();
	$conn->delete($kode_asprak);
	header('location: ../../index.php?lihat=asprak/index');
?>

