<table class="table table-striped">
	<?php 
	require 'class.php';
	$conn = new db_class();
	$fetch = $conn->tampil($_POST['id']);
	?>
	<tr>
		<td rowspan="5" width="180px">
			<img class="img-responsive" width="175px" src="panggil/asprak/gambar/<?php echo $fetch['foto_asprak']?>" alt="<?php echo $fetch['foto_asprak']?>">
		</td>
		<td>NPM</td>
		<td><?php echo $fetch['kode_asprak']?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><?php echo $fetch['nama_asprak']?></td>
	</tr>
	<tr>
		<td>Telp</td>
		<td><?php echo $fetch['telp_asprak']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $fetch['email_asprak']?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td><?php echo $fetch['jk_asprak']?></td>
	</tr>
</table>