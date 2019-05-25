<?php
	require_once 'class.php';
	
	$npm	= $_REQUEST['npm'];
	$conn 		= new db_class();
	$conn->delete($npm);
	header('location: index.php?lihat=mahasiswa/index');
?>