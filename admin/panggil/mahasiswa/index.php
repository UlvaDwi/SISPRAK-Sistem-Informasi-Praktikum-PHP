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

$link 	= "index.php?lihat=mahasiswa/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary"></h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/mahasiswa/tambah.php">

					<div class="form-group">
						<label>NPM</label>
						<input type ="text" name = "npm" class="form-control" >
					</div>
					<div class="form-group">
						<label>NAMA MAHASISWA</label>
						<input type ="text" name = "nama_mhs" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>PASSWORD</label>
						<input type ="password" name = "pass_mhs" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>KODE JURUSAN</label>
						<input type ="text" name = "kode_jurusan" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>ALAMAT</label>
						<input type ="text" name = "alamat" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>JENIS KELAMIN</label>
						<input type ="text" name = "jk_mhs" class="form-control" autofocus>
					</div>
					<div class="form-group">
						<label>FOTO</label>
						<input type ="file" name = "foto" >
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
				<th>NPM</th>
				<th>NAMA MAHASISWA</th>
				<th>KODE JURUSAN</th>
				<th>ALAMAT</th>
				<th>JENIS KELAMIN</th>
				<th>FOTO</th>
				<th>PASSWORD</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['npm']?></td>
						<td><?php echo $tampil['nama_mhs']?></td>
						
						<td><?php echo $tampil['kode_jurusan']?></td>
						<td><?php echo $tampil['alamat']?></td>
						<td><?php echo $tampil['jk_mhs']?></td>
						<td><?php echo $tampil['foto']?></td>
						<td><?php echo $tampil['pass_mhs']?></td>
						<td style="text-align: center;">
							<a href="<?= $link.'edit&npm='.$tampil['npm'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&npm='.$tampil['npm'] ?>" class="btn btn-danger btn-sm">
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

