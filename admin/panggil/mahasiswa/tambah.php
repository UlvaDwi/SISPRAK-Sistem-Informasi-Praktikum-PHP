<?php
require_once 'class.php';

if(isset($_POST['save'])){
	$npm = $_POST['npm'];	
	$nama_mhs 	= $_POST['nama_mhs'];
	$kode_jurusan= $_POST['kode_jurusan'];
	$alamat 	= $_POST['alamat'];
	$jk_mhs 	= $_POST['jk_mhs'];
	$pass_mhs 	= "sisprak";
	$name       = $_FILES['file']['name'];  
	$temp_name  = $_FILES['file']['tmp_name'];  
	$conn = new db_class();
	if(isset($name)){
		if(!empty($name)){      
			$ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/'.$nama);
					if($conn->create($npm, $nama_mhs,  $kode_jurusan, $alamat, $jk_mhs, $nama, $pass_mhs)){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}       
	}  else {
		echo 'You should select a file to upload !!';
	}
}	
?>