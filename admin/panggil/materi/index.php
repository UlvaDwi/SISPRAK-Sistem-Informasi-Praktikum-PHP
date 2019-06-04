<?php
require_once 'class.php';
$conn = new db_class();
$read = $conn->read();
$link 	= "index.php?lihat=materi/";
$con = mysqli_connect("localhost","root","","dbpraktikum");

?>
<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Materi</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/materi/tambah.php">

					<div class="form-group">
						<label>Kode Materi</label>
						<input type ="text" id="nominal" name = "kode_materi" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<select class="form-control" id="jurusan" required>
							<?php
							echo "<option>--pilih Jurusan--</option>";
							$result = mysqli_query($con,"SELECT * FROM tbl_jurusan");
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Mata Praktikum</label>
						<select class="form-control" name="kode_mp" id="mp" required>
							<?php
							echo "<option>--pilih mata praktikum--</option>";
							$result = mysqli_query($con,"SELECT tbl_matapraktikum.* ,tbl_jurusan.nama_jurusan FROM tbl_matapraktikum inner join tbl_jurusan on tbl_matapraktikum.kode_jurusan = tbl_jurusan.kode_jurusan ORDER BY kode_mp");
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_mp] class=$row[kode_jurusan] >$row[nama_mp]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Manteri</label>
						<input type ="text" name = "nama_materi" class="form-control" autofocus required>
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
				<!-- <th>kode materi</th> -->
				<th>Jurusan</th>
				<th>Mata Praktikum</th>
				<th>Nama materi</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<!-- <td><?php echo $tampil['kode_materi']?></td> -->
						<td><?php echo $tampil['nama_jurusan']?></td>
						<td><?php echo $tampil['nama_mp']?></td>
						<td><?php echo $tampil['nama_materi']?></td>
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_materi='.$tampil['kode_materi'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_materi='.$tampil['kode_materi'] ?>" class="btn btn-danger btn-sm">
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
	// Add your javascript here
	$(function(){
		$("#mp").chained("#jurusan");
	});
</script>
