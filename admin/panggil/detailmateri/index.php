<?php
require 'class.php';
$conn = new db_class();
$read = $conn->read();
$con = mysqli_connect("localhost","root","","dbpraktikum");
$link 	= "index.php?lihat=detailmateri/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Detail Materi</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/detailmateri/tambah.php">
					<div class="form-group">
						<label>Jurusan</label>
						<select class="form-control" id="jurusan" required>
							<?php
							$result = mysqli_query($con,"SELECT *FROM tbl_jurusan");
							echo "<option>--pilih Jurusan--</option>";
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
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
								echo "<option value=$row[kode_mp] class=$row[kode_jurusan]>$row[nama_mp]</option>";
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
								echo "<option value=$row[kode_materi] class=$row[kode_mp]>$row[nama_materi]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea name = "keterangan" class="form-control" autofocus required></textarea>
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
				<!-- <th>Kode Detail Materi</th> -->
				<th>jurusan</th>
				<th>Mata Praktikum</th>
				<th>Materi</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<!-- <td><?php echo $tampil['kode_detail_materi']?></td> -->
						<td><?php echo $tampil['nama_jurusan']?></td>
						<td><?php echo $tampil['nama_mp']?></td>
						<td><?php echo $tampil['nama_materi']?></td>
						<td><?php echo $tampil['keterangan']?></td>
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_detail_materi='.$tampil['kode_detail_materi'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_detail_materi='.$tampil['kode_detail_materi'] ?>" class="btn btn-danger btn-sm">
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
		$("#materi").chained("#mp");
	});
</script>
