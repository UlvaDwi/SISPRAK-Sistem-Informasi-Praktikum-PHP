<?php
	require_once 'class.php';
	
	if(ISSET($_POST['save'])){	
		$kode_jam		= $_POST['kode_jam'];
		$keterangan 	= $_POST['keterangan'];
		$jam_mulai		= $_POST['jam_mulai'];
		$jam_akhir		= $_POST['jam_akhir'];
		$conn 			= new db_class();
		$conn->create($kode_jam, $keterangan, $jam_mulai, $jam_akhir);
		header('location: ../../index.php?lihat=jam/index');
	}	
	
?>