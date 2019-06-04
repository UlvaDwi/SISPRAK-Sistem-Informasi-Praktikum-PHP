<?php
require_once 'class.php';
$conn = new db_class();
$kode_user = $_REQUEST['kode_user'];
$fetch = $conn->tampil($kode_user);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/karyawan/proses_ubah.php" method="POST">
			<div class="form-group">
				<label>Kode User</label>
				<input type ="text"  value = "<?php echo $fetch['kode_user']?>" name = "kode_user" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama User</label>
				<input type ="text"  value = "<?php echo $fetch['nama_user']?>" name = "nama_user" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>username</label>
				<input type ="text"  value = "<?php echo $fetch['username']?>" name = "username" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type ="text"  value = "<?php echo $fetch['password']?>" name = "password" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Hak Akses</label>
				<select id="hak_akses" name="hak_akses" class="form-control">
					<option value="">---Pilih---</option>
					<option value="1">Admin</option>
					<option value="2">Keuangan</option>
				</select>
			</div>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

