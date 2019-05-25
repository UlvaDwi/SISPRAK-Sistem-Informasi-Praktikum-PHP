<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_mp = $_POST['kode_mp'];	
	$nama_mp	= $_POST['nama_mp'];
	$kode_jurusan	= $_POST['kode_jurusan'];
	$kode_ta	= $_POST['kode_ta'];
	$conn = new db_class();
	$conn->update($kode_mp, $nama_mp, $kode_jurusan, $kode_ta);
	header('location: ../../index.php?lihat=mp/index');
}	
?>