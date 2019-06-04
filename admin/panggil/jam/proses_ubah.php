<?php 
	require_once 'class.php';
	if(ISSET($_POST['update'])){	
		$keterangan 	= $_POST['keterangan'];
		$jam_mulai		= $_POST['jam_mulai'];
		$jam_akhir		= $_POST['jam_akhir'];
		$kode_jam		= $_POST['kode_jam'];

		$conn = new db_class();
		if ($conn->checkData($keterangan, $jam_mulai, $jam_akhir)==0) {
			$conn->update($keterangan, $jam_mulai, $jam_akhir, $kode_jam);
			echo "<script>alert('Data Disimpan')</script>";
			echo "<script>document.location.href='../../index.php?lihat=jam/index'</script>";
		}else{
			echo "<script>alert('Terdapat Duplikasi Data')</script>";
			echo "<script>document.location.href='../../index.php?lihat=jam/index'</script>";
		}
		}

		
?>