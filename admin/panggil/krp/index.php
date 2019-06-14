<?php
require_once 'class.php';
$conn = new db_class();
$link 	= "index.php?lihat=materi/";
$con = mysqli_connect("localhost","root","","dbpraktikum");
$read = $conn->read();
$pilihan = $conn ->pilihan_krp("170403020049");

?>
<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Materi</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">

				<form method="POST" action="panggil/krp/tambah.php">
					<table class="table table-bordered">
						<input type="hidden" name="npm" value="170403020049">
						<tr>
							<th>Jadwal</th>
							<th>Aksi</th>
						</tr>
						<?php 
						$mp_before = "";
						while ($tampil = $read->fetch_array()) {
							if ($mp_before != $tampil['nama_mp']) {
								?>
								<tr>
									<td colspan="2">
										<?php echo $tampil['nama_mp'] ?>
									</td>
								</tr>		
								<?php
								$mp_before = $tampil['nama_mp'];
							}
							?>
							<tr>
								<td>
									<input type="radio" name="<?php echo 'matapraktikum'.$tampil['kode_mp'];?>" value="<?php echo $tampil['kode_jadwal_praktikum']; ?>">
								</td>
								<td>
									<?php echo "Kelas ".$tampil['nama_kelas'].", ".$tampil['hari']." ".$tampil["jam_mulai"]."-".$tampil["jam_akhir"]."</br>".$tampil["nama_lab"]."(".$tampil["kapasitas_lab"].")"." Pemateri : ".$tampil["nama_asprak"]; ?>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<input class="btn btn-default" type="submit" name="sav" value="Simpan">
				</form>
			</div><!-- .col-lg-6 -->
			<div class = "col-lg-3"></div>
		</div><!-- .row -->
		<br>

		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="info">
				<th>No</th>
				<th>Hari, Jam</th>
				<th>Mata Praktikum (kelas)</th>
				<th>Nama Lab(kuota/jumlah orang)</th>
				<th>Pengajar</th>
				<th>Aksi</th>
			</tr>
			<tbody>
				<?php
				$no=1;
				while($tampil = mysqli_fetch_assoc($pilihan)){ 
					?>
					<td><?php echo $no ?></td>
					<td>
						<?php echo $tampil["hari"].", ".$tampil['jam_mulai']." - ".$tampil['jam_akhir'] ?>
					</td>
					<td>
						<?php echo $tampil["nama_mp"]."(".$tampil["nama_kelas"].")" ?>
					</td>
					<td>
						<?php echo $tampil['nama_lab']."(".$tampil['kapasitas_lab']."/jumlah orang" ?>
					</td>
					<td>
						<?php echo $tampil['nama_asprak'] ?>
					</td>
					<td style="text-align: center;">
						<a href="<?= $link.'edit&kode_materi='.$tampil['kode_materi'] ?>" class="btn btn-primary btn-sm">
							<span class = "glyphicon glyphicon-edit"></span> Edit
						</a> 
						<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_materi='.$tampil['kode_materi'] ?>" class="btn btn-danger btn-sm">
							<span class = "glyphicon glyphicon-trash"></span> Hapus
						</a>
					</td>
				</tr>
				<?php
				$no++;
			}
			?>	

		</tbody>
	</table>
</div>
</div>

<script type="text/javascript">
	// Add your javascript here
	$(function(){
		$("#mp").chained("#jurusan");
	});
</script>
