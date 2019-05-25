<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_jurusan = $_POST['kode_jurusan'];	
	$nama_jurusan 	= $_POST['nama_jurusan'];
	$conn = new db_class();
	$conn->update($kode_jurusan, $nama_jurusan);
	header('location: ../../index.php?lihat=jurusan/index');
}	
?>