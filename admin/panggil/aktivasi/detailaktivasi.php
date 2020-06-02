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

	<h3>Data Aktivasi Mahasiswa <?php echo($fetch['npm']);?></h3>
<table width="500px">
	
	<tr>
		<td rowspan ="7" align="center" valign="center"><?php echo "<img src = 'panggil/aktivasi/file/".($fetch['foto']. " '  width =  '100' height = '100' alt=".$fetch['foto']);?>"
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
	<td colspan="4" align="center"><b>Bukti Pembayaran</b></td>
</tr>
<tr>
		<td colspan="4" align="center"><?php echo "<img src = 'panggil/aktivasi/file/".($fetch['kwitansi']. " '  width =  '300' height = '100' alt=".$fetch['kwitansi']);?>"
		</td>
	</tr>

</table>
<?php 
switch ($fetch["status_aktivasi"]) {
			case '1':
			?>
			<div class="form-group">
				<div class ="form-group">
					<a href="panggil/aktivasi/aktifkan.php?kode=<?php echo$fetch['kode_aktivasi'] ?>"class="btn btn-primary btn-sm"><span class = "glyphicon glyphicon-ok"></span>Terima</a>
				</div>
			</div>
				<div class = "form-group">
					<a href="panggil/aktivasi/hapus.php?kode=<?php echo$fetch['kode_aktivasi'] ?>" class="btn btn-danger btn-sm"><span class = "glyphicon glyphicon-remove"></span>Tolak</a>
				</div>
				</tr>
			<?php
			break;
			case "2":
			?>	
			<div class="form-group">
				<div class ="form-group">				
								<a href="index.php?lihat=aktivasi/index" class="btn btn-primary btn-sm"><span class = "glyphicon glyphicon-circle-arrow-left"></span>Back</a>
						</div>
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
