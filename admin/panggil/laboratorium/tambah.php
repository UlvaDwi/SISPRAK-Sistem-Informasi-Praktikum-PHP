<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_lab = $_POST['kode_lab'];	
	$nama_lab 	= $_POST['nama_lab'];
	$kapasitas_lab = $_POST['kapasitas_lab'];
	$conn 		= new db_class();
	if ($conn->checkData($nama_lab, $kapasitas_lab) == 0) {
		$conn->create($kode_lab, $nama_lab, $kapasitas_lab);
		echo "<script>alert('Data Tersimpan')</script>";
		echo "<script> document.location.href='../../index.php?lihat=laboratorium/index'; </script>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data')</script>";
		echo "<script> document.location.href='../../index.php?lihat=laboratorium/index'; </script>";
	}
}	

?>