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
$kode_jadwal_praktikum = $_REQUEST['kode_jadwal_praktikum'];
$fetch = $conn->tampil($kode_jadwal_praktikum);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/penjadwalan/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode Jadwal Praktikum</label>
				<input type ="text"  value = "<?php echo $fetch['kode_jadwal_praktikum']?>" name = "kode_jadwal_praktikum" class="form-control" readonly>
			</div>

			<div class="form-group">
				<label>Kode Mata Praktikum</label>
				<select class="form-control" name="kode_mp" value="<?= $data->kode_mp ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_matapraktikum ORDER BY kode_mp");
					echo "<option>--pilih Mata Praktikum--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_mp]>$row[nama_mp]</option>";
					} 
					?>
					</select>
			</div>

			<div class="form-group">
				<label>Kode Kelas</label>
				<select class="form-control" name="kode_kelas" value="<?= $data->kode_kelas ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_kelas ORDER BY kode_kelas");
					echo "<option>--pilih kode kelas--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_kelas]>$row[nama_kelas]</option>";
					} 
					?>
					</select>
			</div>

			<div class="form-group">
				<label>Kode Asprak</label>
				<select class="form-control" name="kode_asprak" value="<?= $data->kode_asprak ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_asprak ORDER BY kode_asprak");
					echo "<option>--pilih kode Asprak--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_asprak]>$row[nama_asprak]</option>";
					} 
					?>
					</select>
			</div>

			<div class="form-group">
				<label>Hari</label>
				<select class="form-control" name="hari" value = "<?php echo $fetch['hari']?>">
					<option value="">-----Pilih Hari-----</option>
					<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jumat">Jumat</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>
				</select>
			</div>

			<div class="form-group">
				<label>Kode Jam</label>
				<select class="form-control" name="kode_jam" value="<?= $data->kode_jam ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_jam ORDER BY kode_jam");
					echo "<option>--pilih kode Jam--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_jam]>$row[jam_mulai].$row[jam_akhir]</option>";
					} 
					?>
					</select>
			</div>

			<div class="form-group">
				<label>Kode Lab</label>
				<select class="form-control" name="kode_lab" value="<?= $data->kode_lab ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_ruanglab ORDER BY kode_lab");
					echo "<option>--pilih kode lab--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_lab]>$row[nama_lab]</option>";
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

