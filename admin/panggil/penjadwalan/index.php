<?php
require 'class.php';
$conn = new db_class();
$read = $conn->read();
$con = mysqli_connect("localhost","root","","dbpraktikum");
$link 	= "index.php?lihat=penjadwalan/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Penjadwalan</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/penjadwalan/tambah.php">
					<div class="form-group">
						<label>Jurusan</label>
						<select class="form-control" id="jurusan" required>
							<?php
							$result = mysqli_query($con,"SELECT * FROM tbl_jurusan");
							echo "<option>--pilih Jurusan--</option>";
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Mata Praktikum</label>
						<select class="form-control" id="mp" name="kode_mp" required>
							<?php
							echo "<option>--pilih mata praktikum--</option>";
							$result = mysqli_query($con,"SELECT * FROM tbl_matapraktikum");
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_mp] class=$row[kode_jurusan]>$row[nama_mp]</option>";
							} 
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Kode Kelas</label>
						<select class="form-control" name="kode_kelas" >
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
						<select class="form-control" name="kode_asprak" >
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
						<select class="form-control" name="hari">
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
						<select class="form-control" name="kode_jam" >
							<?php
							$con = mysqli_connect("localhost","root","","dbpraktikum");
							$result = mysqli_query($con,"SELECT *FROM tbl_jam ORDER BY kode_jam");
							echo "<option>--pilih kode Jam--</option>";
							while($row = mysqli_fetch_assoc($result)){

								echo "<option value=$row[kode_jam]>$row[jam_mulai]-$row[jam_akhir]</option>";
							} 
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Kode Lab</label>
						<select class="form-control" name="kode_lab" >
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
					
					<div class = "form-group">
						<button name = "save" class = "btn btn-success">
							<span class = "glyphicon glyphicon-floppy-disk"></span> 
							Simpan
						</button>
					</div>
				</form>
			</div><!-- .col-lg-6 -->
			<div class = "col-lg-3"></div>
		</div><!-- .row -->
		<br>

		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="info">
				<th>No</th>
				<th>Nama Mata Praktikum</th>
				<th>Nama kelas</th>
				<th>Nama Asprak</th>
				<th>Hari</th>
				<th>Jam</th>
				<th>nama Lap</th>
				<th>kapasitas</th>
				
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['nama_mp']?></td>
						<td><?php echo $tampil['nama_kelas']?></td>
						<td><?php echo $tampil['nama_asprak']?></td>
						<td><?php echo $tampil['hari']?></td>
						<td><?php echo $tampil['jam_mulai']."-".$tampil['jam_akhir']?></td>
						<td><?php echo $tampil['nama_lab']?></td>
						<td><?php echo $tampil['kapasitas_lab']?></td>
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_jadwal_praktikum='.$tampil['kode_jadwal_praktikum'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_jadwal_praktikum='.$tampil['kode_jadwal_praktikum'] ?>" class="btn btn-danger btn-sm">
								<span class = "glyphicon glyphicon-trash"></span> Hapus
							</a>
						</td>
					</tr>

					<?php
				}
				?>	

			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$("#mp").chained("#jurusan");
	});
</script>