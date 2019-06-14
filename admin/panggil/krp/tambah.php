<?php
require_once 'class.php';
$conn = new db_class();
if(ISSET($_POST['sav'])){
	$mp = $conn->read_mp(1);
	$npm = $_POST['npm'];
	while ($i=$mp->fetch_array()) {
		$k = $i['kode_mp'];
		$kode_mp = $_POST['matapraktikum'.$k];
		// echo $kode_mp." ".$npm;
		$conn->wew($kode_mp, $npm);
		// echo "</br>";	
	}
	echo "<script>alert('Data Tersimpan')</script>";
	echo "<script> document.location.href='../../index.php?lihat=krp/index'; </script>";
}	
?>