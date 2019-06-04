<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_kelas = $_POST['kode_kelas'];	
	$nama_kelas 	= $_POST['nama_kelas'];
	$conn 		= new db_class();
	if ($conn->checkData($nama_kelas,$kode_kelas)==0) {
			$conn->create($kode_kelas, $nama_kelas);
			echo "<script>alert('Data Disimpan')</script>";
			echo "<script>document.location.href='../../index.php?lihat=kelas/index'</script>";
		}else{
			echo "<script>alert('Terdapat Duplikasi Data')</script>";
			echo "<script>document.location.href='../../index.php?lihat=kelas/index'</script>";
		}
		}

		
?>