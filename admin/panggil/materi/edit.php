<?php
require_once 'class.php';
$conn = new db_class();
//Memgambil id data get dari url
$kode_materi = $_REQUEST['kode_materi'];
$fetch = $conn->tampil($kode_materi);
$con = mysqli_connect("localhost","root","","dbpraktikum");
?>
<div class="row">
	<div class="col-lg-6">
		<form action="panggil/materi/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode Materi</label>
				<input type ="text"  value = "<?php echo $fetch['kode_materi']?>" name = "kode_materi" class="form-control" readonly required>
			</div>
			<div class="form-group">
				<label>Jurusan</label>
				<select class="form-control" id="jurusan" required>
					<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_jurusan");
					echo "<option>--pilih kode mata praktikum--</option>";
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['kode_jurusan']==$row['kode_jurusan']) {
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
				<select class="form-control" name="kode_mp" id="mp" required>
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT tbl_matapraktikum.* ,tbl_jurusan.nama_jurusan FROM tbl_matapraktikum inner join tbl_jurusan on tbl_matapraktikum.kode_jurusan = tbl_jurusan.kode_jurusan ORDER BY kode_mp");
					echo "<option>--pilih kode mata praktikum--</option>";
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['kode_mp']==$row['kode_mp']) {
							echo "<option value=$row[kode_mp] class=$row[kode_jurusan] selected>$row[nama_mp]</option>";
						}else{
							echo "<option value=$row[kode_mp] class=$row[kode_jurusan]>$row[nama_mp]</option>";
						}
					} 
					?>
				</select>
			</div>

			<div class="form-group">
				<label>Nama Materi</label>
				<input type ="text"  value = "<?php echo $fetch['nama_materi']?>" name = "nama_materi" class="form-control" autofocus required>
			</div>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>
		</form>
	</div>
</div>

<script type="text/javascript">
	// Add your javascript here
	$(function(){
		$("#mp").chained("#jurusan");
	});
</script>