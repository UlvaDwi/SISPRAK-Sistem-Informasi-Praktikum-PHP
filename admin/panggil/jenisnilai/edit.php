<?php
	require_once 'class.php';
	$conn = new db_class();

	//Memgambil id data get dari url
	$kode_jn = $_REQUEST['kode_jn'];
	$fetch = $conn->tampil($kode_jn);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/jenisnilai/proses_ubah.php" method="POST">
			<input type="hidden" name="kode_jn" value = "<?php echo $fetch['kode_jn']?>">
			<div class="form-group">
				<label>kode jenis nilai</label>
				<input type="text" name="kode_jn" value = "<?php echo $fetch['kode_jn']?>" class="form-control" >
			</div>
			
			<div class="form-group">
				<label>jenis nilai</label>
				<input type="text" name="jenis_nilai" value = "<?php echo $fetch['jenis_nilai']?>" class="form-control">
			</div>
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

