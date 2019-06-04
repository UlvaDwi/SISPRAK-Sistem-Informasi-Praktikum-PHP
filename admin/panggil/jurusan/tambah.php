<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_jurusan = $_POST['kode_jurusan'];	
	$nama_jurusan 	= $_POST['nama_jurusan'];
	$conn 		= new db_class();
	if ($conn->checkData($nama_jurusan) == 0) {
		$conn->create($kode_jurusan, $nama_jurusan);
		echo "<script>alert('Data Terupdate')</script>";
		echo "<script> document.location.href='../../index.php?lihat=jurusan/index'; </script>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data')</script>";
		echo "<script> document.location.href='../../index.php?lihat=jurusan/index'; </script>";
	}
}	

?>