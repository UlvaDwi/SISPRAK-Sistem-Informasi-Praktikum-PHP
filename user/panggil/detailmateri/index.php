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
						<label>Kode Detail Materi</label>
						<input type ="text" name = "kode_detail_materi" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>Kode Materi</label>
						<select class="form-control" name="kode_materi" value="<?= $data->kode_materi ?>">
							<?php
							$con = mysqli_connect("localhost","root","","dbpraktikum");
							$result = mysqli_query($con,"SELECT *FROM tbl_materi ORDER BY kode_materi");
							echo "<option>--pilih kode materi--</option>";
							while($row = mysqli_fetch_assoc($result)){

								echo "<option value=$row[kode_materi]>$row[nama_materi]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Materi</label>
						<input type ="text"  name = "materi" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<input type ="text" name = "keterangan" class="form-control" autofocus>
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
				<th>Kode Detail Materi</th>
				<th>Materi</th>
				<th>Keterangan</th>
				<th>Kode Materi</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['kode_detail_materi']?></td>
						<td><?php echo $tampil['materi']?></td>
						<td><?php echo $tampil['keterangan']?></td>
						<td><?php echo $tampil['kode_materi']?></td>
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

