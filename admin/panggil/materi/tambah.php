<?php
require_once 'class.php';
if(ISSET($_POST['save'])){
	$kode_materi = $_POST['kode_materi'];	
	$nama_materi	= $_POST['nama_materi'];
	$kode_mp	= $_POST['kode_mp'];
	$conn = new db_class();
	if ($conn->checkData($nama_materi, $kode_mp) == 0) {
		$conn->create($kode_materi, $nama_materi, $kode_mp);
		echo "<script>alert('Data Tersimpan')</script>";
		echo "<script> document.location.href='../../index.php?lihat=materi/index'; </script>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data')</script>";
		echo "<script> document.location.href='../../index.php?lihat=materi/index'; </script>";
	}
}	
?>