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
			<div class="col-lg-6">
				<form method ="POST"action = "" enctype = "multipart/form-data">
					<div class="form-group">
						<label>NPM</label>
						<input type="text" name="npm" value="" placeholder="masukan npm"class="form-control" >
					</div>
					<div class="form-group">

						<input type="submit" name="cari" value="cari"class = "btn btn-primary btn-sm">
					</div>
				</form>
			<!-- </div> -->
				<?php 
				if (isset($_POST['cari'])) {
					$readmhs = $conn->tampildetail($_POST["npm"]);
					if ($readmhs ==0 ) {
						echo "data mahasiswa tidak ada";
					}else{
						?>
						<table border="0" cellspacing="10" cellpadding="10" width="555px">
							<tr>
								<td rowspan="5"><?php echo "<img src = 'panggil/mahasiswa/gambar/".$readmhs['foto']. " '  width =  '100' height = '150' alt=".$readmhs['foto']."> "?></td>
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
						<td align="center"><?php echo "<img src = 'panggil/aktivasi/file/".$tampil['kwitansi']. " '  width =  '300' height = '100' alt=".$tampil['kwitansi']."> "?></td>
						<td><?php echo $tampil['keterangan']?></td>
						<td><?php echo $tampil['waktu_aktivasi']?></td>
						
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