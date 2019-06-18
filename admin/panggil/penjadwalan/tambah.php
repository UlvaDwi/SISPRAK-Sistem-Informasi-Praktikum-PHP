<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_mp = $_POST['kode_mp'];	
	$kode_kelas = $_POST['kode_kelas'];	
	$kode_asprak = $_POST['kode_asprak'];	
	$hari = $_POST['hari'];	 
	$kode_jam = $_POST['kode_jam'];	 
	$kode_lab= $_POST['kode_lab'];

	$conn 		= new db_class();
	// $conn->checkData($hari,$kode_jam,$kode_lab);
	if ($conn->checkData($hari,$kode_jam,$kode_lab)==0) {
		$conn->create($kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab);
		echo "<script>alert('Data Disimpan')</script>";
		echo "<script>document.location.href='../../index.php?lihat=penjadwalan/index'</script>";
	}else{
		echo "<script>alert('Terdapat Jadwal Yang Sama')</script>";
		echo "<script>document.location.href='../../index.php?lihat=penjadwalan/index'</script>";
	}
}
?>