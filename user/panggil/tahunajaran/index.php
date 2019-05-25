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

$link 	= "index.php?lihat=tahunajaran/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary"></h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/tahunajaran/tambah.php">

					<div class="form-group">
						<label>Semester</label>
						<input type ="text" name = "semester" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Tahun</label>
						<input type ="text" name = "tahun" class="form-control" autofocus>
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
				<th>kode tahun ajaran</th>
				<th>Semester</th>
				<th>Tahun</th>
				
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['semester'].$tampil['tahun']?></td>
						<td><?php echo $tampil['semester']?></td>
						<td><?php echo $tampil['tahun']?></td>
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_ta='.$tampil['kode_ta'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_ta='.$tampil['kode_ta'] ?>" class="btn btn-danger btn-sm">
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
