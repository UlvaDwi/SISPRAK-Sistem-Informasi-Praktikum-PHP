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
				<input type ="text"  value = "<?php echo $fetch['kode_ta']?>" name="tambahan" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Semester</label>
				<select name="semester" class="form-control" required>
					<?php 
					switch ($fetch["semester"]) {
						case 'ganjil':
						echo "<option value='ganjil' selected>Ganjil</option>";
						echo "<option value='genap'>Genap</option>";
						break;						
						case 'genap':
						echo "<option value='ganjil' >Ganjil</option>";
						echo "<option value='genap' selected>Genap</option>";
						break;						
					}
					?>
					
				</select>
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<?php 
				$str_arr = explode ("/", $fetch['tahun']);  
				?>
				<input type="text" value = "<?php echo $str_arr[0]?>" name = "tahun1" class="form-control" autofocus required>
				<input type="text" value = "<?php echo $str_arr[1]?>" name = "tahun2" class="form-control" autofocus required>
			</div>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> 
				Ubah
			</button>
		</form>
	</div>
</div>
</div>