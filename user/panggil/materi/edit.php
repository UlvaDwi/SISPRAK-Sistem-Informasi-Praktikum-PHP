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
$kode_materi = $_REQUEST['kode_materi'];
$fetch = $conn->tampil($kode_materi);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/materi/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode Materi</label>
				<input type ="text"  value = "<?php echo $fetch['kode_materi']?>" name = "kode_materi" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama Materi</label>
				<input type ="text"  value = "<?php echo $fetch['nama_materi']?>" name = "nama_materi" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Kode Mata Praktikum</label>
				<select class="form-control" name="kode_mp" value="<?= $data->kode_mp ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_matapraktikum ORDER BY kode_mp");
					echo "<option>--pilih kode mata praktikum--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_mp]>$row[nama_mp]</option>";
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

