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
$kode_lab = $_REQUEST['kode_lab'];
$fetch = $conn->tampil($kode_lab);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/laboratorium/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode Laboratorium</label>
				<input type ="text"  value = "<?php echo $fetch['kode_lab']?>" name = "kode_lab" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama Laboratorium</label>
				<input type ="text"  value = "<?php echo $fetch['nama_lab']?>" name = "nama_lab" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Kapasitas Laboratorium</label>
				<input type ="number"  value = "<?php echo $fetch['kapasitas_lab']?>" name = "kapasitas_lab" class="form-control" >
			</div>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

