<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$npm = $_POST['npm'];	
	$nama_mhs 	= $_POST['nama_mhs'];
	$kode_jurusan= $_POST['kode_jurusan'];
	$alamat 	= $_POST['alamat'];
	$jk_mhs 	= $_POST['jk_mhs'];
	$foto 	= $_POST['foto'];
	$pass_mhs 	= $_POST['pass_mhs'];
	$conn = new db_class();
	$conn->update($npm, $nama_mhs,$kode_jurusan,$alamat,$jk_mhs,$foto,$pass_mhs);
	header('location: ../../index.php?lihat=mahasiswa/index');
}	
?>