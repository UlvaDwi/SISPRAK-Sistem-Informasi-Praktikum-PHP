<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_jadwal_praktikum = $_POST['kode_jadwal_praktikum'];	 
	$kode_mp = $_POST['kode_mp'];	
	$kode_kelas = $_POST['kode_kelas'];	
	$kode_asprak = $_POST['kode_asprak'];	
	$hari = $_POST['hari'];	 
	$kode_jam = $_POST['kode_jam'];	 
	$kode_lab= $_POST['kode_lab'];

	$conn 		= new db_class();
	$conn->create($kode_jadwal_praktikum , $kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab);
	header('location: ../../index.php?lihat=penjadwalan/index');
}	

?>