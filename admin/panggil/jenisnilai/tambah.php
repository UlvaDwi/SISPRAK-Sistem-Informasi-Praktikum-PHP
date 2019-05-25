<?php
	require_once 'class.php';
	
	if(ISSET($_POST['save'])){	
		$kode_jn 	= $_POST['kode_jn'];
		$jenis_nilai = $_POST['jenis_nilai'];
		$conn 		= new db_class();
		$conn->create($kode_jn, $jenis_nilai);
		header('location: ../../index.php?lihat=jenisnilai/index');
	}	
	
?>