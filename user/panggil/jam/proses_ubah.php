<?php 
	require_once 'class.php';
	if(ISSET($_POST['update'])){	
		$keterangan 	= $_POST['keterangan'];
		$jam_mulai		= $_POST['jam_mulai'];
		$jam_akhir		= $_POST['jam_akhir'];
		$kode_jam		= $_POST['kode_jam'];

		$conn = new db_class();
		$conn->update($keterangan, $jam_mulai, $jam_akhir, $kode_jam);
		header('location: ../../index.php?lihat=jam/index');
	}	
?>