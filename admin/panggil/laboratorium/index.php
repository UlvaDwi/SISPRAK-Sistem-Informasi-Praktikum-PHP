<?php
require 'class.php';
$conn = new db_class();
$read = $conn->read();

$link 	= "index.php?lihat=laboratorium/";
?>
<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Laboratorium</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/laboratorium/tambah.php">

					<div class="form-group">
						<label>Kode Laboratorium</label>
						<input type ="text" id="nominal" name = "kode_lab" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>Nama Laboratorium</label>
						<input type ="text"  name = "nama_lab" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>Kapasitas Laboratorium</label>
						<input type ="number" id="nominal" name = "kapasitas_lab" class="form-control" autofocus>
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
				<th>Nama Laboratorium</th>
				<th>Kapasitas Laboratorium</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['nama_lab']?></td>
						<td><?php echo $tampil['kapasitas_lab']?></td>
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_lab='.$tampil['kode_lab'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_lab='.$tampil['kode_lab'] ?>" class="btn btn-danger btn-sm">
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

