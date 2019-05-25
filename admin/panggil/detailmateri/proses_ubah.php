<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_detail_materi = $_POST['kode_detail_materi'];	
	$materi 	= $_POST['materi'];
	$keterangan = $_POST['keterangan'];
	$kode_materi = $_POST['kode_materi'];
	$conn = new db_class();
	$conn->update($kode_detail_materi, $materi, $keterangan, $kode_materi);
	header('location: ../../index.php?lihat=detailmateri/index');
}	
?>