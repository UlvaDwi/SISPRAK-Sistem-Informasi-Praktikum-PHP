<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_ta = $_POST['semester'].$_POST['tahun'];	
	$semester 	= $_POST['semester'];
	$tahun 	= $_POST['tahun'];
	$conn 		= new db_class();
	$conn->create ($kode_ta, $semester, $tahun);
//	header('location: ../../index.php?lihat=tahunajaran/index');
}	

?>