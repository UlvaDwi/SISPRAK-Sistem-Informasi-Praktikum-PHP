<?php
require_once 'class.php';
$conn = new db_class();
//Memgambil id data get dari url
$kode_detail_materi = $_REQUEST['kode_detail_materi'];
$con = mysqli_connect("localhost","root","","dbpraktikum");
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
				<label>Jurusan</label>
				<select class="form-control" id="jurusan" required>
					<?php
					$result = mysqli_query($con,"SELECT *FROM tbl_jurusan");
					echo "<option>--pilih Jurusan--</option>";
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['kode_jurusan']==$row['kode_jurusan']) {
							# code...
							echo "<option value=$row[kode_jurusan] selected>$row[nama_jurusan]</option>";
						}else{
							echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
						}
					} 
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Mata Praktikum</label>
				<select class="form-control" id="mp" required>
					<?php
					echo "<option>--pilih mata praktikum--</option>";
					$result = mysqli_query($con,"SELECT * FROM tbl_matapraktikum");
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['kode_mp']==$row['kode_mp']) {
							# code...
							echo "<option value=$row[kode_mp] class=$row[kode_jurusan] selected>$row[nama_mp]</option>";

						}else{
							echo "<option value=$row[kode_mp] class=$row[kode_jurusan]>$row[nama_mp]</option>";
						} 
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Materi</label>
				<select class="form-control" name="kode_materi" id="materi" required>
					<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_materi");
					echo "<option>--pilih materi--</option>";
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['kode_materi']==$row['kode_materi']) {
							echo "<option value=$row[kode_materi] class=$row[kode_mp] selected>$row[nama_materi]</option>";
						}else{
							echo "<option value=$row[kode_materi] class=$row[kode_mp]>$row[nama_materi]</option>";
						} 
					} 
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type ="text"  value = "<?php echo $fetch['keterangan']?>" name = "keterangan" class="form-control" autofocus>
			</div>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$("#mp").chained("#jurusan");
		$("#materi").chained("#mp");
	});
</script>