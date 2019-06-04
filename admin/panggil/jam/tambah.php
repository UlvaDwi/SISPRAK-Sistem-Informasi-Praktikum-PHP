<?php
	require_once 'class.php';
	
	if(ISSET($_POST['save'])){	
		$keterangan 	= $_POST['keterangan'];
		$jam_mulai		= $_POST['jam_mulai'];
		$jam_akhir		= $_POST['jam_akhir'];
		$conn 			= new db_class();

		if ($conn->checkData($jam_mulai, $jam_akhir)==0) {
			$conn->create($keterangan, $jam_mulai, $jam_akhir);
			echo "<script>alert('Data Disimpan')</script>";
			echo "<script>document.location.href='../../index.php?lihat=jam/index'</script>";
		}else{
			echo "<script>alert('Terdapat Duplikasi Data')</script>";
			echo "<script>document.location.href='../../index.php?lihat=jam/index'</script>";
		}
		}
	
?>