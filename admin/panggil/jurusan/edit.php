<?php
require_once 'class.php';
$conn = new db_class();

	//Memgambil id data get dari url
$kode_jurusan = $_REQUEST['kode_jurusan'];
$fetch = $conn->tampil($kode_jurusan);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/jurusan/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>Kode jurusan</label>
				<input type ="text"  value = "<?php echo $fetch['kode_jurusan']?>" name = "kode_jurusan" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>Nama jurusan</label>
				<input type ="text"  value = "<?php echo $fetch['nama_jurusan']?>" name = "nama_jurusan" class="form-control" autofocus>
			</div>
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

