<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_user = $_POST['kode_user'];	
	$nama_user 	= $_POST['nama_user'];
	$username = $_POST['username'];	
	$password 	= $_POST['password'];
	$hak_akses = $_POST['hak_akses'];	

	$conn = new db_class();
	$conn->update($kode_user , $nama_user , $username , $password ,$hak_akses);
	header('location: ../../index.php?lihat=karyawan/index');
}	
?>