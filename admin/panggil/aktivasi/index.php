<!DOCTYPE html>
<html>
<head>
	<title>Sisfo Praktikum</title>
	<!-- Icon -->
	<link rel="shortcut icon" type="image/icon" href="kanjuruhan.png">
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
$npm= "";
$link 	= "index.php?lihat=aktivasi/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Aktivasi</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-12">
				<!-- status aktivasi -->
				<div class="col-lg-4">
				<form method ="POST"action = "" enctype = "multipart/form-data">
					<div class="form-group">
						<label>Status Aktivasi</label>
						<select name="status_aktivasi" class="form-control">
							<option>--pilih status aktivasi--</option>
							<option value="0">Belum Aktivasi</option>
							<option value="1">Request Aktivasi</option>
							<option value="2">Sudah di Aktivasi</option>
							
						</select>
					</div>
				</form>
			</div>
			<div class="col-lg-4">
				<form method ="POST"action = "" enctype = "multipart/form-data">
					<div class="form-group">
						<label>Jurusan</label>
						<select name="status_aktivasi" class="form-control">
							<?php
							$con = mysqli_connect("localhost","root","","dbpraktikum");
					$result = mysqli_query($con,"SELECT *FROM tbl_jurusan ORDER BY kode_jurusan");
				
							echo "<option>--pilih jurusan--</option>";
							
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
							} 
							?>
						</select>
					</div>
				</form>
			</div>
			<div class="col-lg-4">
				<form method ="POST"action = "" enctype = "multipart/form-data">
					<div class="form-group">
						<label>NPM</label>
						<input type="text" name="npm" value="" placeholder="masukan npm">
					</div>
					<div class="form-group">
						<input type="submit" name="cari" value="cari">
					</div>
				</form>
			</div>
				<?php 
				if (isset($_POST['cari'])) {
					$readmhs = $conn->tampildetail($_POST["npm"]);
					if ($readmhs ==0 ) {
						echo "data mahasiswa tidak ada";
					}else{
						?>
						<table>
							<tr>
								<td>NPM</td>
								<td><?php echo $readmhs['npm'];?></td>
							</tr>
							<tr>
								<td>Nama Mahasiswa</td>
								<td><?php echo $readmhs['nama_mhs'];?></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td><?php echo $readmhs['nama_jurusan'];?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?php echo $readmhs['alamat'];?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?php echo $readmhs['jk_mhs'];?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?php echo $readmhs['foto'];?></td>
							</tr>
						</table>
						<form method ="POST"action = "panggil/aktivasi/tambah.php" enctype = "multipart/form-data">
							<input type ="hidden" id="npm" name = "npm" value="<?php echo $readmhs['npm'];?>" class="form-control" autofocus>
							<div class="form-group">
								<label>Kwitansi</label>
								<input type ="file" id="foto_kwitansi" name = "kwitansi" class="form-control" autofocus>
							</div>
							<div class = "form-group">
								<button name = "save" class = "btn btn-success">
									<span class = "glyphicon glyphicon-floppy-disk"></span> 
									Simpan
								</button>
							</div>
						</form>

						<?php
					}
				}
				?>	
			</div><!-- .col-lg-6 -->
			<div class = "col-lg-3"></div>
		</div><!-- .row -->
		<br>

		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="info">
				<th>No</th>
				<th>npm</th>
				<th>kwitansi</th>
				<th>keterangan</th>
				<th>waktu aktivasi</th>
				<th>status</th>
				<th>aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					$button="";
					$a = "";
					switch ($tampil['status_aktivasi']) {
						case '0':
							$button="belum aktivasi";
						break;
						case '1':
							$button="menunggu persetujuan";
						break;
						case '2':
							$button="teraktivasi";
						break;
					}

					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['npm']?></td>
						<td><?php echo "<img src = 'panggil/aktivasi/file/".$tampil['kwitansi']. " '  width =  '100' height = '100' alt=".$tampil['kwitansi']."> "?></td>
						<td><?php echo $tampil['keterangan']?></td>
						<td><?php echo $tampil['waktu_aktivasi']?></td>
						<td><?php echo $tampil['status_aktivasi']?></td>
						
						<td>
							<a href="<?php echo $link.'detailaktivasi&npm='.$tampil['npm'] ?>"  class="btn btn-primary btn-sm"><?php echo $button?></a>
								
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>