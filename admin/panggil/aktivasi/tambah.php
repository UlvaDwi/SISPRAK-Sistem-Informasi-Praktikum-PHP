<?php
require_once 'class.php';

if(isset($_POST['save'])){
	// $npm = $_POST['npm'];	
	// $nama_mhs 	= $_POST['nama_mhs'];
	// $kode_jurusan= $_POST['kode_jurusan'];
	// $alamat 	= $_POST['alamat'];
	// $jk_mhs 	= $_POST['jk_mhs'];
	// $foto 	= $_POST['foto'];
	// $pass_mhs 	= $_POST['pass_mhs'];
	$npm = $_POST['id'];
	$ekstensi_diperbolehkan	= array('png','jpg');
	$keterangan = "offline";
	$nama = $_FILES['kwitansi']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['kwitansi']['size'];
	$file_tmp = $_FILES['kwitansi']['tmp_name'];	
	$date = date("Y-m-d H:i:s");
	$conn = new db_class();
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, 'file/'.$nama);
			if($conn->create($npm , $nama, $keterangan , $date, "1")){
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
	// header('location: ../../index.php?lihat=mahasiswa/index');
	
}	

?>