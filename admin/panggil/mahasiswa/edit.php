<?php
require_once 'class.php';
$conn = new db_class();
$con = mysqli_connect("localhost","root","","dbpraktikum");
$npm = $_REQUEST['npm'];
$fetch = $conn->tampil($npm);
?>
<div class="row">
	<div class="col-lg-6">
		<form action="panggil/mahasiswa/proses_ubah.php" method="POST" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>NPM</label>
				<input type ="text"  value = "<?php echo $fetch['npm']?>" name = "npm" class="form-control" readonly required>
			</div>
			<div class="form-group">
				<label>NAMA MAHASISWA</label>
				<input type ="text"  value = "<?php echo $fetch['nama_mhs']?>" name = "nama_mhs" class="form-control" autofocus required>
			</div>
			<div class="form-group">
				<label>JURUSAN</label>
				<select name="kode_jurusan" class="form-control" required>
					<?php
					echo "<option>--pilih Jurusan--</option>";
					$result = mysqli_query($con,"SELECT * FROM tbl_jurusan");
					while($row = mysqli_fetch_assoc($result)){
						if ($row['kode_jurusan']==$fetch['kode_jurusan']) {
							echo "<option value=$row[kode_jurusan] selected>$row[nama_jurusan]</option>";
						}else{
							echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
						}
					} 
					?>
				</select>
			</div>
			<div class="form-group">
				<label>ALAMAT</label>
				<input type ="text"  value = "<?php echo $fetch['alamat']?>" name = "alamat" class="form-control" autofocus required>
			</div>
			<div class="form-group">
				<label>JENIS KELAMIN</label>
				<div class="radio">
					<?php 
					if ($fetch['jk_mhs']=="Perempuan") {
						$checked1 = "checked";
						$checked2 = "";
					}else{
						$checked2 = "checked";
						$checked1 = "";
					}
					?>
					<label>
						<input type="radio" name="jk_mhs" value="Perempuan" <?php echo $checked1; ?> required>
						Perempuan
					</label>
					<label>
						<input type="radio" name="jk_mhs" value="Laki-Laki" <?php echo $checked2; ?> required>
						Laki-Laki
					</label>
				</div>
			</div>
			<div class="form-group">
				<label>Foto</label>
				<input type ="file" value ="<?php echo $fetch['foto']?>" id="file" name = "file" class="form-control" autofocus required>(ukuran file maksimal 500 kb)
			</div>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>
		</form>
	</div>
</div>

