<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_mp	= $_POST['kode_mp'];
	$kode_jurusan = $_POST['kode_jurusan'];	
	$nama_mp	= $_POST['nama_mp'];
	$kode_ta	= $_POST['kode_ta'];
	$conn = new db_class();
	if ($conn->checkData($nama_mp, $kode_jurusan, $kode_ta) == 0) {
		$conn->create($kode_mp, $nama_mp, $kode_jurusan, $kode_ta);
		echo "<script>alert('Data Tersimpan')</script>";
		echo "<script> document.location.href='../../index.php?lihat=mp/index'; </script>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data')</script>";
		echo "<script> document.location.href='../../index.php?lihat=mp/index'; </script>";
	}
}	

?>