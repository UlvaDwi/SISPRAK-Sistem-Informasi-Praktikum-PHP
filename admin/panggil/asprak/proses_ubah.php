<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$kode_asprak = $_POST['kode_asprak'];	
	$nama_asprak 	= $_POST['nama_asprak'];
	$jk_asprak = $_POST['jk_asprak'];	
	$telp_asprak = $_POST['telp_asprak'];
	$email_asprak = $_POST['email_asprak'];
	
	if(isset($_POST['ubah_foto']))
	{
		$foto_asprak 	= $_FILES['foto_asprak'] ['name'];
		$tmp = $_FILES['foto_asprak']['tmp_name'];

	//mengubah nama foto yang di ambil
		$foto_baru = date('dmYHis').$foto_asprak ;

	//set folder penyimpanan foto
		$path = "gambar/".$foto_baru ;

	//proses simpan
		if( move_uploaded_file ($tmp, $path))
		{
			$conn = new db_class();
			$conn->update($kode_asprak , $nama_asprak, $jk_asprak , $foto_baru , $telp_asprak , $email_asprak);
			echo "<script>alert('Data Terupdate')</script>";
			echo "<script> document.location.href='../../index.php?lihat=asprak/index'; </script>";
		}
	}
	else{
		$conn = new db_class();
		$conn->update_tanpa_foto($kode_asprak , $nama_asprak, $jk_asprak , $telp_asprak , $email_asprak);
		echo "<script>alert('Data Terupdate')</script>";
		echo "<script> document.location.href='../../index.php?lihat=asprak/index'; </script>";
	}

	

	
}	
?>