<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$npm = $_POST['npm'];	
	$nama_mhs 	= $_POST['nama_mhs'];
	$kode_jurusan= $_POST['kode_jurusan'];
	$alamat 	= $_POST['alamat'];
	$jk_mhs 	= $_POST['jk_mhs'];
	$conn = new db_class();
	$name       = $_FILES['file']['name'];  
	$temp_name  = $_FILES['file']['tmp_name'];  
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
					if($conn->update($npm, $nama_mhs,$kode_jurusan,$alamat,$jk_mhs,$nama)){
						echo "<script>alert('Data Terupdate')</script>";
						echo "<script> document.location.href='../../index.php?lihat=mahasiswa/index'; </script>";
					}else{
						echo "<script>alert('Gagal Upload Gambar');history.go(-1);</script>";
					}
				}else{
					echo "<script>alert('Ukuran File Terlalu Besar');history.go(-1);</script>";
				}
			}else{
				echo "<script>alert('Ekstensi untuk Upload Tidak Diperbolehkan');history.go(-1);</script>";
			}
		}       
	}  else {
		echo "<script>alert('Pilih File untuk anda Upload');history.go(-1);</script>";
	}

}	
?>