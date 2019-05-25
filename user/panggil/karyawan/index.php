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

$link 	= "index.php?lihat=karyawan/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Karyawan</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/karyawan/tambah.php">

					<div class="form-group">
						<label>Kode User</label>
						<input type ="text" id="kode_user" name = "kode_user" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama User</label>
						<input type ="text" id="nama_user" name = "nama_user" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type ="text" id="username" name = "username" class="form-control" >
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type ="text" id="password" name = "password" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Hak Akses</label>
						<select id="hak_akses" name="hak_akses" class="form-control">
							<option value="">---Pilih---</option>
							<option value="x">x</option>
							<option value="y">y</option>
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
				<th>kode User</th>
				<th>Nama User</th>
				<th>Username</th>
				<th>Password</th>
				<th>Hak Akses</th>
				
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['kode_user']?></td>
						<td><?php echo $tampil['nama_user']?></td>
						<td><?php echo $tampil['username']?></td>
						<td><?php echo $tampil['password']?></td>
						<td><?php echo $tampil['hak_akses']?></td>
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&kode_user='.$tampil['kode_user'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_user='.$tampil['kode_user'] ?>" class="btn btn-danger btn-sm">
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

