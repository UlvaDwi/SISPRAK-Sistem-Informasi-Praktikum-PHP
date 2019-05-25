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
$kode_detail_materi = $_REQUEST['kode_detail_materi'];
$fetch = $conn->tampil($kode_detail_materi);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/detailmateri/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode Detail Materi</label>
				<input type ="text"  value = "<?php echo $fetch['kode_detail_materi']?>" name = "kode_detail_materi" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Materi</label>
				<input type ="text"  value = "<?php echo $fetch['materi']?>" name = "materi" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type ="text"  value = "<?php echo $fetch['keterangan']?>" name = "keterangan" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Kode Materi</label>
				<select class="form-control" name="kode_materi" value="<?= $data->kode_materi ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_materi ORDER BY kode_materi");
					echo "<option>--pilih kode materi--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_materi]>$row[kode_materi]</option>";
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

