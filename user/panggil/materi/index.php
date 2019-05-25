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

$link 	= "index.php?lihat=materi/";
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
						<input type ="text" id="nominal" name = "kode_materi" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama Manteri</label>
						<input type ="text" name = "nama_materi" class="form-control" autofocus>
					</div>
					<div class="form-group">
				<label>Kode Mata Praktikum</label>
				<select class="form-control" name="kode_mp" value="<?= $data->kode_mp ?>">
					<?php
					$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_matapraktikum ORDER BY kode_mp");
					echo "<option>--pilih kode mata praktikum--</option>";
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[kode_mp]>$row[nama_mp]</option>";
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
				<th>kode materi</th>
				<th>Nama materi</th>
				<th>Mata Praktikum</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['kode_materi']?></td>
						<td><?php echo $tampil['nama_materi']?></td>
						<td><?php echo $tampil['nama_mp']?></td>
						
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

