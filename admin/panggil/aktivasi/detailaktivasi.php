<?php
require_once 'class.php';
$conn = new db_class();
$con = mysqli_connect("localhost","root","","dbpraktikum");
$npm = $_GET['npm'];
$link 	= "index.php?lihat=aktivasi/";
$fetch = $conn->detailaktivasi($npm);
		switch ($fetch["status_aktivasi"]) {
			case '1':
				$status = "menunggu persetujuan";
			break;
			case "2":
				$status = "teraktivasi";
			break;	
			default:
				$status = "belum sama sekali";
			break;
			}
	?>
	<h1>Data Aktivasi Mahasiswa <?php echo($fetch['npm']);?></h1>
<table>
	
	<tr>
		<td rowspan ="7"><?php echo "<img src = 'panggil/aktivasi/file/".($fetch['foto']. " '  width =  '100' height = '100' alt=".$fetch['foto']);?>"
		</td>
		<td>NPM </td>
		<td>:</td>
		<td><?php echo($fetch['npm']);?></td>
	</tr>
	<tr>
	<td>Nama </td>
		<td>:</td>
		<td><?php echo($fetch['nama_mhs']);?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td>:</td>
		<td>
			<?php echo $status ?>
		</td>
	<tr>
		<td>Kode Jurusan</td>
		<td>:</td>
		<td><?php echo($fetch['nama_jurusan']);?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo($fetch['alamat']);?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo($fetch['jk_mhs']);?></td>
	</tr>

	<tr>
		<td>Waktu Aktivasi</td>
		<td>:</td>
		<td><?php echo($fetch['waktu_aktivasi']);?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo "<img src = 'panggil/aktivasi/file/".($fetch['kwitansi']. " '  width =  '100' height = '100' alt=".$fetch['kwitansi']);?>"
		</td>
	</tr>

</table>
<?php 
switch ($fetch["status_aktivasi"]) {
			case '1':
			?>
			<div class="form-group">
				<div class ="form-group">
					<a href="panggil/aktivasi/aktifkan.php?kode=<?php echo$fetch['kode_aktivasi'] ?>">Terima</a>
				</div>
			</div>
				<div class = "form-group">
					<a href="panggil/aktivasi/hapus.php?kode=<?php echo$fetch['kode_aktivasi'] ?>">Tolak</a>
				</div>
				</tr>
			<?php
			break;
			case "2":
			?>
			<div class="form-group">						<div class = "form-group">
								<a href="index.php?lihat=aktivasi/index">Back
						</div>
						<?php
			break;

			default:
			?>
			<div class="form-group">
							
							<input type ="file" id="foto_asprak" name = "kwitansi" class="form-control" autofocus>
						</div>
						<div class = "form-group">
							<button name = "save" class = "btn btn-success">
								<span class = "glyphicon glyphicon-floppy-disk"></span> 
								Simpan
							</button>
						</div>
						<?php
			break;
			}

 ?>
