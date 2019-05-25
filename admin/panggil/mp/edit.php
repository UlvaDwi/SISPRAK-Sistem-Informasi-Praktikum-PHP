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
	$kode_mp = $_REQUEST['kode_mp'];
	$fetch = $conn->tampil($kode_mp);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/mp/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode Mata Praktikum</label>
				<input type ="text"  value = "<?php echo $fetch['kode_mp']?>" name = "kode_mp" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama Mata Praktikum</label>
				<input type ="text"  value = "<?php echo $fetch['nama_mp']?>" name = "nama_mp" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Kode Jurusan</label>
				<select class="form-control" name="kode_jurusan" value="<?= $data->kode_jurusan ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_jurusan ORDER BY kode_jurusan");
					echo "<option>--pilih kode jurusan--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
					} 
					?>
					</select>
			</div>
			<div class="form-group">
				<label>Kode Tahun Akademik</label>
				<select class="form-control" name="kode_ta" value="<?= $data->kode_ta ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_ta ORDER BY kode_ta");
					echo "<option>--pilih kode tahun akademik--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_ta]>$row[semester]</option>";
					} 
					?>
					</select>
			</div>
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

