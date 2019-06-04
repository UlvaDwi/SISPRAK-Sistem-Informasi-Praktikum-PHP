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
$kode_kelas = $_REQUEST['kode_kelas'];
$fetch = $conn->tampil($kode_kelas);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/kelas/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode kelas</label>
				<input type ="text"  value = "<?php echo $fetch['kode_kelas']?>" name = "kode_kelas" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama Kelas</label>
				<input type ="text"  value = "<?php echo $fetch['nama_kelas']?>" name = "nama_kelas" class="form-control" autofocus>
			</div>
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

