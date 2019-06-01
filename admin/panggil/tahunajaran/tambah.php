<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_ta = $_POST['semester'].$_POST['tahun'];	
	$semester 	= $_POST['semester'];
	$tahun 	= $_POST['tahun1']."/".$_POST['tahun2'];
	$conn 		= new db_class();
	// $conn->checkData($tahun, $semester);
	if ($conn->checkData($tahun, $semester) == 0) {
		# code...
		$conn->create ($kode_ta, $semester, $tahun);
		header('location: ../../index.php?lihat=tahunajaran/index');
	}else{
		// header('location: ../../index.php?lihat=tahunajaran/index');
		echo "<script>alert('Terdapat Duplikasi Data')</script>";
        echo "<meta http-equiv='refresh' content='0; url= ../../index.php?lihat=tahunajaran/index'>";
	}
}	

?>