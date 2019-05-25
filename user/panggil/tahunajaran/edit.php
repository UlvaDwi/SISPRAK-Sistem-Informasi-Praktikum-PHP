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
$kode_ta = $_REQUEST['kode_ta'];
$fetch = $conn->tampil($kode_ta);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/tahunajaran/proses_ubah.php" method="POST">
			<input type ="hidden"  value = "<?php echo $fetch['kode_ta']?>" name = "kode_ta" class="form-control" readonly>
			<div class="form-group">
				<label>Kode Tahun Ajaran</label>
				
				<input type ="text"  value = "<?php echo $fetch['semester'].$fetch['tahun']?>" name="tambahan" class="form-control" readonly>
				
			</div>
			<div class="form-group">
				<label>Semester</label>
				<input type ="text"  value = "<?php echo $fetch['semester']?>" name = "semester" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<input type="text" value = "<?php echo $fetch['tahun']?>" name = "tahun" class="form-control" autofocus>
			</div>
			</div>
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>


