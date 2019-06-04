<?php
require 'class.php';
$conn = new db_class();
$read = $conn->read();
$con = mysqli_connect("localhost","root","","dbpraktikum");
$link 	= "index.php?lihat=mp/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Mata Praktikum</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/mp/tambah.php">

					<div class="form-group">
						<label>Kode Mata Praktikum</label>
						<input type ="text" id="kode_mp" name = "kode_mp" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama Mata Praktikum</label>
						<input type ="text" name = "nama_mp" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>jurusan</label>
						<select class="form-control" name="kode_jurusan" value="<?= $data->kode_jurusan ?>">
							<?php
							echo "<option>--pilih kode jurusan--</option>";
							$result = mysqli_query($con,"SELECT * FROM tbl_jurusan ORDER BY kode_jurusan");
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Tahun Akademik</label>
						<select class="form-control" name="kode_ta" value="<?= $data->kode_ta ?>">
							<?php
							$result = mysqli_query($con,"SELECT *FROM tbl_ta ORDER BY kode_ta");
							echo "<option>--pilih kode tahun akademik--</option>";
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_ta]>$row[kode_ta]</option>";
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
				<th>Nama mata praktikum</th>
				<th>Jurusan</th>
				<th>Semester</th>
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
						<td><?php echo $tampil['nama_jurusan']?></td>
						<td><?php echo $tampil['kode_ta']?></td>
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_mp='.$tampil['kode_mp'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_mp='.$tampil['kode_mp'] ?>" class="btn btn-danger btn-sm">
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

