<?php
require_once 'class.php';

if(ISSET($_POST['save'])){
	$kode_asprak = $_POST['kode_asprak'];	
	$nama_asprak 	= $_POST['nama_asprak'];
	$jk_asprak = $_POST['jk_asprak'];	
	$foto_asprak 	= $_FILES['foto_asprak'] ['name'];
	$tmp = $_FILES['foto_asprak']['tmp_name'];
	$telp_asprak = $_POST['telp_asprak'];
	$email_asprak = $_POST['email_asprak'];
	$pass_asprak = "asistenpraktikum";
	//mengubah nama foto yang di ambil
	$foto_baru = date('dmYHis').$foto_asprak ;
	//set folder penyimpanan foto
	$path = "gambar/".$foto_baru ;
	//proses simpan
	if( move_uploaded_file ($tmp, $path))
	{
		$conn 		= new db_class();
		$conn->create($kode_asprak , $nama_asprak, $jk_asprak , $foto_baru , $telp_asprak , $email_asprak , $pass_asprak);
		echo "<script>alert('Data Tersimpan')</script>";
		echo "<script> document.location.href='../../index.php?lihat=asprak/index'; </script>";

	}

	
}	

?>