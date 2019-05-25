<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_ta = $_POST['kode_ta'];		
	$semester 	= $_POST['semester'];
	$tahun 	= $_POST['tahun'];
	$conn = new db_class();
	$conn->update ($kode_ta, $semester, $tahun);
	header('location: ../../index.php?lihat=tahunajaran/index');
}	
?>