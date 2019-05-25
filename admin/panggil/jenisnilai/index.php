<?php
	require 'class.php';
	$conn = new db_class();
	$read = $conn->read();
	
	$link 	= "index.php?lihat=jenisnilai/";
?>

<div class = "row">	
<div class = "col-lg-12">
	<h3 class = "text-primary">master jenis nilai</h3>
	<hr style = "border-top:1px dotted #000;"/>

	<div class = "row">	
	<div class = "col-lg-2"></div>
	<div class = "col-lg-8">
		<form method ="POST" class = "form-inline" action = "panggil/jenisnilai/tambah.php">
			
			<div class="form-group">
				<label>kode jenis nilai</label>
				<input type ="text" id="kode_jn" name = "kode_jn" class="form-control" autofocus>
			</div>

			<div class="form-group">
				<label>jenis nilai</label>
				<input type ="text" id="jenis_nilai" name = "jenis_nilai" class="form-control" autofocus>
			</div>


			<div class = "form-group">
				<button name = "save" class = "btn btn-success">
					<span class = "glyphicon glyphicon-floppy-disk"></span> 
					Simpan
				</button>
			</div>
		</form>
	</div><!-- .col-lg-6 -->
	<div class = "col-lg-2"></div>
	</div><!-- .row -->
	<br>
	
	<table class="table table-hover table-bordered" style="margin-top: 10px">
		<tr class="info">
			<th>No</th>
			<th>kode jenis nilai</th>
			<th>jenis nilai</th>
			<th>Aksi</th>
		</tr>
		<tbody>
		
		<?php
			$no=1;
			while($tampil = $read->fetch_array()){ 
		?>
		
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $tampil['kode_jn']?></td>
			<td><?php echo $tampil['jenis_nilai']?></td>
			<td style="text-align: center;">
				<a href="<?= $link.'edit&kode_jn='.$tampil['kode_jn'] ?>" class="btn btn-primary btn-sm">
					<span class = "glyphicon glyphicon-edit"></span> Edit
				</a> 
				<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_jn='.$tampil['kode_jn'] ?>" class="btn btn-danger btn-sm">
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

