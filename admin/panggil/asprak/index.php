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

$link 	= "index.php?lihat=asprak/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Mastering Asprak</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/asprak/tambah.php" enctype = "multipart/form-data">

					<div class="form-group">
						<label>Kode Asprak</label>
						<input type ="text" id="kode_asprak" name = "kode_asprak" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama Asprak</label>
						<input type ="text" id="nama_asprak" name = "nama_asprak" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<br>
						<input type ="radio" name = "jk_asprak"  value = "Laki-Laki" > Laki - Laki </input>
						<input type ="radio" name = "jk_asprak"  value = "Perempuan" >Perempuan </input>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type ="file" id="foto_asprak" name = "foto_asprak" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Telepon</label>
						<input type ="text" id="telp_asprak" name = "telp_asprak" class="form-control" >
					</div>

					<div class="form-group">
						<label>E-mail</label>
						<input type ="text" id="email_asprak" name = "email_asprak" class="form-control" >
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type ="text" id="pass_asprak" name = "pass_asprak" class="form-control" >
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
				<th>kode Asprak</th>
				<th>Nama Asprak</th>
				<th>Jenis Kelamin</th>
				<th>Foto</th>
				<th>Telepon</th>
				<th>E-mail</th>
				<th>Password</th>

				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['kode_asprak']?></td>
						<td><?php echo $tampil['nama_asprak']?></td>
						<td><?php echo $tampil['jk_asprak']?></td>
						<td><?php echo "<img src = 'foto_asprak/".$tampil['foto_asprak']. " '  width =  '100' height = '100'> "?></td>
						<td><?php echo $tampil['telp_asprak']?></td>
						<td><?php echo $tampil['email_asprak']?></td>
						<td><?php echo $tampil['pass_asprak']?></td>
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_asprak='.$tampil['kode_asprak'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_asprak='.$tampil['kode_asprak'] ?>" class="btn btn-danger btn-sm">
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

