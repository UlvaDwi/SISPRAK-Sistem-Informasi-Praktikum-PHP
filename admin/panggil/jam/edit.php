<?php
	require_once 'class.php';
	$conn = new db_class();

	//Memgambil id data get dari url
	$kode_jam = $_REQUEST['kode_jam'];
	$fetch = $conn->tampil($kode_jam);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/jam/proses_ubah.php" method="POST">
			<input type="hidden" name="kode_jam" value = "<?php echo $fetch['kode_jam']?>">
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" value = "<?php echo $fetch['keterangan']?>" class="form-control" >
			</div>
			
			<div class="form-group">
				<label>Jam Mulai</label>
				<input type="time" name="jam_mulai" value = "<?php echo $fetch['jam_mulai']?>" class="time form-control">
			</div>

			<div class="form-group">
				<label>Jam Akhir</label>
				<input type="time" name="jam_akhir" value = "<?php echo $fetch['jam_akhir']?>" class="time form-control">
			</div>
			
			<br>
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

