<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_lab = $_POST['kode_lab'];	
	$nama_lab 	= $_POST['nama_lab'];
	$kapasitas_lab = $_POST['kapasitas_lab'];
	$conn = new db_class();
	$conn->update($kode_lab, $nama_lab, $kapasitas_lab);
	header('location: ../../index.php?lihat=laboratorium/index');
}	
?>