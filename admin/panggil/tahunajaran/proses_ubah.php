<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_ta = $_POST['kode_ta'];		
	$semester 	= $_POST['semester'];
	$tahun 	= $_POST['tahun1']."/".$_POST['tahun2'];
	// $tahun 	= $_POST['tahun1'].$_POST['tahun2'];
	$conn = new db_class();
	if ($conn->checkData($tahun, $semester) == 0) {
		$conn->update ($kode_ta, $semester, $tahun);
		echo "<script>alert('Data Terupdate')</script>";
        echo "<script> document.location.href='../../index.php?lihat=tahunajaran/index'; </script>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data');history.go(-1);</script>";
	}
}	
?>