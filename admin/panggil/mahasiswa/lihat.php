<table class="table table-striped">
	<?php 
	require 'class.php';
	$conn = new db_class();
	$fetch = $conn->tampil($_POST['id']);
	?>
	<tr>
		<td rowspan="5" width="180px">
			<img class="img-responsive" width="175px" src="panggil/mahasiswa/gambar/<?php echo $fetch['foto']?>" alt="<?php echo $fetch['foto']?>">
		</td>
		<td>NPM</td>
		<td><?php echo $fetch['npm']?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><?php echo $fetch['nama_mhs']?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><?php echo $fetch['alamat']?></td>
	</tr>
	<tr>
		<td>Jurusan</td>
		<td><?php echo $fetch['nama_jurusan']?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td><?php echo $fetch['jk_mhs']?></td>
	</tr>
</table>