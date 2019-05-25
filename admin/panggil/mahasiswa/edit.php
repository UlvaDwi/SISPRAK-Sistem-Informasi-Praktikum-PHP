<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
      body{
        background-color:  #f0f5f5;
        /*background: transparent;*/
      }
      form, table{
      	background-color: white;
      	padding:20px;
      	border-radius: 5px;

      }
    </style>

</body>
</html><?php
require_once 'class.php';
$conn = new db_class();

	//Memgambil id data get dari url
$npm = $_REQUEST['npm'];
$fetch = $conn->tampil($npm);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/mahasiswa/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>NPM</label>
				<input type ="text"  value = "<?php echo $fetch['npm']?>" name = "npm" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>NAMA MAHASISWA</label>
				<input type ="text"  value = "<?php echo $fetch['nama_mhs']?>" name = "nama_mhs" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>PASSWORD</label>
				<input type ="password"  value = "<?php echo $fetch['pass_mhs']?>" name = "pass_mhs" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>KODE JURUSAN</label>
				<input type ="text"  value = "<?php echo $fetch['kode_jurusan']?>" name = "kode_jurusan" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>ALAMAT</label>
				<input type ="text"  value = "<?php echo $fetch['alamat']?>" name = "alamat" class="form-control" autofocus>
			</div>
			
			<div class="form-group">
				<label>JENIS KELAMIN</label>
				<input type ="text"  value = "<?php echo $fetch['jk_mhs']?>" name = "jk_mhs" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>FOTO</label>
				<input type ="file"  value = "<?php echo $fetch['foto']?>" name = "foto" >
			</div>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

