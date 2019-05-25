<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		body{
			background-color:  #f0f5f5;
			/*background: transparent;*/
		}
		form, table{
			background-color: white;
			padding:20px;
			border-radius: 5px;

		}
	</style>

</body>
</html>
<?php
	require 'class.php';
	$conn = new db_class();
	$read = $conn->read();
	
	$link 	= "index.php?lihat=jam/";
?>

<div class = "row">	
<div class = "col-lg-12">
	<h3 class = "text-primary">Master Jam</h3>
	<hr style = "border-top:1px dotted #000;"/>

	<div class = "row">	
	<!-- <div class = "col-lg-2"></div> -->
	<div class = "col-lg-6">
		<form method ="POST" action = "panggil/jam/tambah.php">
			
			<div class="form-group">
				<label>Kode Jam</label>
				<input type ="text" name = "kode_jam" class="form-control" autofocus>
			</div>

			<div class="form-group">
				<label>Keterangan</label>
				<input type ="text" name = "keterangan" class="form-control" autofocus>
			</div>

			<div class="form-group">
				<label>Jam Mulai</label>
				<input type ="time" name = "jam_mulai" class="time form-control" autofocus>
			</div>

			<div class="form-group">
				<label>Jam Akhir</label>
				<input type ="time" name = "jam_akhir" class="time form-control" autofocus>
			</div>

			<br>
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
			<th>Kode Jam</th>
			<th>Keterangan</th>
			<th>Jam Mulai</th>
			<th>Jam Akhir</th>
			<th>Aksi</th>
		</tr>
		<tbody>
		
		<?php
			$no=1;
			while($tampil = $read->fetch_array()){ 
		?>
		
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $tampil['kode_jam']?></td>
			<td><?php echo $tampil['keterangan']?></td>
			<td><?php echo $tampil['jam_mulai']?></td>
			<td><?php echo $tampil['jam_akhir']?></td>
			<td style="text-align: center;">
				<a href="<?= $link.'edit&kode_jam='.$tampil['kode_jam'] ?>" class="btn btn-primary btn-sm">
					<span class = "glyphicon glyphicon-edit"></span> Edit
				</a> 
				<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_jam='.$tampil['kode_jam'] ?>" class="btn btn-danger btn-sm">
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

