<?php
require_once 'class.php';
$conn = new db_class();
if(ISSET($_POST['sav'])){
	$mp = $conn->read_mp(1);
	$npm = $_POST['npm'];
	while ($i=$mp->fetch_array()) {
		$k = $i['kode_mp'];
		if (isset($_POST['matapraktikum'.$k])) {
			// echo $_POST['matapraktikum'.$k]." ".$npm;
			$conn->wew($_POST['matapraktikum'.$k], $npm);
			// echo "</br>";	
		}
	}
	echo "<script>alert('Data Tersimpan')</script>";
	echo "<script> document.location.href='../../index.php?lihat=krp/index'; </script>";
}	
?>