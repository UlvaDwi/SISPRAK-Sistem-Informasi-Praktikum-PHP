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
		// header('location: ../../index.php?lihat=tahunajaran/index');
		echo "<meta http-equiv='refresh' content='0; url=../../index.php?lihat=tahunajaran/index'>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data');history.go(-1);</script>";
	}
}	
?>