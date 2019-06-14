<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_materi = $_POST['kode_materi'];	
	$nama_materi	= $_POST['nama_materi'];
	$kode_mp	= $_POST['kode_mp'];
	$conn = new db_class();
	if ($conn->checkData($nama_materi, $kode_mp) == 0) {
		$conn->update($kode_materi, $nama_materi, $kode_mp);
		echo "<script>alert('Data Terupdate')</script>";
		echo "<script> document.location.href='../../index.php?lihat=materi/index'; </script>";
	}else{
		echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
	}
}	
?>