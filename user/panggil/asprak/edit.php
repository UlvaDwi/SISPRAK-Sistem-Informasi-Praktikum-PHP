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
</html><?php
require_once 'class.php';
$conn = new db_class();

	//Memgambil id data get dari url
$kode_asprak = $_REQUEST['kode_asprak'];
$fetch = $conn->tampil($kode_asprak);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/asprak/proses_ubah.php" method="POST" enctype = "multipart/form-data">
			
			<div class="form-group">
				<label>Kode Asprak</label>
				<input type ="text"  value = "<?php echo $fetch['kode_asprak']?>" name = "kode_asprak" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama Asprak</label>
				<input type ="text"  value = "<?php echo $fetch['nama_asprak']?>" name = "nama_asprak" class="form-control" autofocus>
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
						<input type="checkbox" name = "ubah_foto" value = "true"> ceklis jika ingin mengubah foto <br>
					</div>

			<div class="form-group">
				<label>Telepon</label>
				<input type ="text"  value = "<?php echo $fetch['telp_asprak']?>" name = "telp_asprak" class="form-control" autofocus>
			</div>

			<div class="form-group">
				<label>E-mail</label>
				<input type ="text"  value = "<?php echo $fetch['email_asprak']?>" name = "email_asprak" class="form-control" autofocus>
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type ="text"  value = "<?php echo $fetch['pass_asprak']?>" name = "pass_asprak" class="form-control" autofocus>
			</div>
			
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

