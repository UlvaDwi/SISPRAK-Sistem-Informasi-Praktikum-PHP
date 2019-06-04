<?php
require_once 'class.php';
$conn = new db_class();
$con = mysqli_connect("localhost","root","","dbpraktikum");
$kode_mp = $_REQUEST['kode_mp'];
$fetch = $conn->tampil($kode_mp);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/mp/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Mata Praktikum</label>
				<input type ="text"  value = "<?php echo $fetch['kode_mp']?>" name = "kode_mp" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama Mata Praktikum</label>
				<input type ="text"  value = "<?php echo $fetch['nama_mp']?>" name = "nama_mp" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Jurusan</label>
				<select class="form-control" name="kode_jurusan">
					<?php
					$result = mysqli_query($con,"SELECT *FROM tbl_jurusan ORDER BY kode_jurusan");
					echo "<option>--pilih kode jurusan--</option>";
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['kode_jurusan']==$row['kode_jurusan']) {
							echo "<option value=$row[kode_jurusan] selected>$row[nama_jurusan]</option>";
						}
						echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
					} 
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Tahun Akademik</label>
				<select class="form-control" name="kode_ta">
					<?php
					$result = mysqli_query($con,"SELECT *FROM tbl_ta ORDER BY kode_ta");
					echo "<option>--pilih kode tahun akademik--</option>";
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['kode_ta']==$row['kode_ta']) {
							echo "<option value=$row[kode_ta] selected>$row[kode_ta]</option>";
						}else{
							echo "<option value=$row[kode_ta]>$row[kode_ta]</option>";
						}
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

