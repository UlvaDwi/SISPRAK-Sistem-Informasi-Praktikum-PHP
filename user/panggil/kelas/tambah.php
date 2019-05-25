<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_kelas = $_POST['kode_kelas'];	
	$nama_kelas 	= $_POST['nama_kelas'];
	$conn 		= new db_class();
	$conn->create($kode_kelas, $nama_kelas);
	header('location: ../../index.php?lihat=kelas/index');
}	

?>