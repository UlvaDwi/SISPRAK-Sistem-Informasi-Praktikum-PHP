<?php 
// require_once 'class.php';
// if(ISSET($_POST['update'])){	
// 	$kode_materi = $_POST['kode_materi'];	
// 	$nama_materi	= $_POST['nama_materi'];
// 	$kode_mp	= $_POST['kode_mp'];
// 	$conn = new db_class();
// 	if ($conn->checkData($nama_materi, $kode_mp) == 0) {
// 		$conn->update($kode_materi, $nama_materi, $kode_mp);
// 		echo "<script>alert('Data Terupdate')</script>";
// 		echo "<script> document.location.href='../../index.php?lihat=materi/index'; </script>";
// 	}else{
// 		echo "<script>alert('Data Sudah Ada');history.go(-1);</script>";
// 	}
// }

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