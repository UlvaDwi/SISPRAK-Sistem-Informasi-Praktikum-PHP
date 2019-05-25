<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_materi = $_POST['kode_materi'];	
	$nama_materi	= $_POST['nama_materi'];
	$kode_mp	= $_POST['kode_mp'];
	$conn = new db_class();
	$conn->update($kode_materi, $nama_materi, $kode_mp);
	header('location: ../../index.php?lihat=materi/index');
}	
?>