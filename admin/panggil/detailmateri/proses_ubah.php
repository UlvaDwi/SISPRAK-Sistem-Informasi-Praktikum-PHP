<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_detail_materi = $_POST['kode_detail_materi'];	
	$keterangan = $_POST['keterangan'];
	$kode_materi = $_POST['kode_materi'];
	$conn = new db_class();
	if ($conn->checkData($keterangan, $kode_materi) == 0) {
		$conn->update($kode_detail_materi, $keterangan, $kode_materi);
		echo "<script>alert('Data Terupdate')</script>";
		echo "<script> document.location.href='../../index.php?lihat=detailmateri/index'; </script>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data')</script>";
		echo "<script> document.location.href='../../index.php?lihat=detailmateri/index'; </script>";
	}

}	
?>