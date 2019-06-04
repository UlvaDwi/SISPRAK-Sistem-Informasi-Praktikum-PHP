<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$semester 	= $_POST['semester'];
	$tahun 	= $_POST['tahun1']."/".$_POST['tahun2'];
	$kode_ta = $_POST['semester'].$tahun;	
	$conn 		= new db_class();
	// $conn->checkData($tahun, $semester);
	if ($conn->checkData($tahun, $semester) == 0) {
		# code...
		$conn->create ($kode_ta, $semester, $tahun);
		echo "<script>alert('Data Tersimpan')</script>";
        echo "<script> document.location.href='../../index.php?lihat=tahunajaran/index'; </script>";
	}else{
		echo "<script>alert('Terdapat Duplikasi Data')</script>";
        echo "<script> document.location.href='../../index.php?lihat=tahunajaran/index'; </script>";
	}
}	

?>