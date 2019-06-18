<?php
require_once 'class.php';
$conn = new db_class();
$link 	= "index.php?lihat=krp/";
$con = mysqli_connect("localhost","root","","dbpraktikum");
$npm = $_SESSION["Username"];
$read = $conn->read($conn->jurusan_user($npm));
$pilihan = $conn ->pilihan_krp($npm);
$pilihan_jadwal= array();
$choosen_mp = array();
$jadwal = array();
// menyimpan data pilihan krp
while ($k =mysqli_fetch_assoc($pilihan)) {
	$pilihan_jadwal[] = $k;
}
////////////////////////////
// menyimpan data jadwal
while ($i = $read->fetch_array()) {
	$jadwal[] = $i;
}
////////////////////////////
$button = "Simpan";
$action = "panggil/krp/tambah.php";
foreach ($jadwal as $tampil_jadwal) {
	foreach ($pilihan_jadwal as $lihat){
		if ($lihat['npm']==$npm) {
			$button = "Update";
			$action = "panggil/krp/proses_ubah.php";
		}
		if ($tampil_jadwal['kode_mp'] == $lihat['kode_mp']) {
			$choosen_mp[] = $tampil_jadwal['kode_mp'];
		}	
	}
}


?>
<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Master Materi</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">

				<form method="POST" action="<?php echo $action; ?>">
					<table class="table table-bordered">
						<input type="hidden" name="npm" value="<?php echo $npm ?>">
						<tr>
							<th>Jadwal</th>
							<th>Aksi</th>
						</tr>
						<?php 
						if (empty($jadwal)) {
							?>
							<tr>
								<td colspan="2">
									data tidak ada
								</td>
							</tr>
							<?php
						}
						?>
						<?php 
						$mp_before = "";
						foreach ($jadwal as $tampil_jadwal) {
						// td colspan for mp
							$disabled = "";
							foreach ($choosen_mp as $k) {
								if ($k == $tampil_jadwal['kode_mp']) {
									$disabled = "disabled";
								}
							}
							if ($mp_before != $tampil_jadwal['nama_mp']) {
								?>
								<tr>
									<td colspan="2">
										<?php echo $tampil_jadwal['nama_mp']." ".$tampil_jadwal['kode_mp']?>
									</td>
								</tr>		
								<?php
								$mp_before = $tampil_jadwal['nama_mp'];
								// untuk class radio button jadwal
								$class = 'radjadwal'.$tampil_jadwal['kode_jadwal_praktikum'];
								// $edit = untuk button mengilangkan checked dan disabled
								$edit = 'edit'.$tampil_jadwal['kode_jadwal_praktikum'];
							}
						/////////////////////
							$a="";
							$linkHapus="";
							$checked="";
							$sisa_ruang = $tampil_jadwal["kapasitas_lab"]-$conn->jumlah_orang($tampil_jadwal['kode_jadwal_praktikum']);
									if ($sisa_ruang<=0) {
										$disabled = "disabled";
									}
						// memberikan a + check pilihan sebelumnya
							foreach ($pilihan_jadwal as $lihat){
								if ($tampil_jadwal['kode_jadwal_praktikum']==$lihat["kode_jadwal_praktikum"]) {
									$checked = "checked";

									// $a ="<button type='button' class='".$edit."'>[batalkan pilihan]</<button>";

									$linkHapus = "<a onclick='return confirm('Apakah yakin data akan di hapus?')' href='".$link."hapus&npm=".$npm."&id=".$lihat['kode_jadwal_praktikum']."' class='btn btn-danger btn-sm'>Hapus</a>";

								}
								$kode_penjadwalan_mhs = $lihat['kode_penjadwalan_mhs'];
							}

						///////////////////
							
							?>
							<tr>
								<td>
									<input type="radio" class="<?php echo $class; ?>" name="<?php echo 'matapraktikum'.$tampil_jadwal['kode_mp'];?>" value="<?php echo $tampil_jadwal['kode_jadwal_praktikum']; ?>" <?php echo $disabled." ".$checked; ?> >
								</td>
								<td>

									<?php 
									
									echo "kode jadwal praktikum: ". $tampil_jadwal['kode_jadwal_praktikum']." Kelas ".$tampil_jadwal['nama_kelas'].", ".$tampil_jadwal['hari']." ".$tampil_jadwal["jam_mulai"]."-".$tampil_jadwal["jam_akhir"]."</br>".$tampil_jadwal["nama_lab"]."(".$sisa_ruang.")"." Pemateri : ".$tampil_jadwal["nama_asprak"]."</br>".$a."  ".$linkHapus; ?>
									<!-- perintah untuk klik batal  -->
									<script type="text/javascript">
										$(document).ready(function(){
											$(document).ready(function(){
											// kode = kode jadwal
											var kode = <?php echo $tampil_jadwal['kode_jadwal_praktikum'] ?>;
											var npm = <?php echo $npm ?>;
											var value1 = ".edit"+kode.toString();
											var value2 = ".radjadwal"+kode.toString();
											$(value1).on('click', function() {
													// $(value2).prop("checked", false);
													
													if (confirm("Anda yakin untuk mengganti Jadwal ?")) {
														// console.log(npm);
														// console.log(kode);

														$.ajax({
															type: "POST",
															url: "panggil/krp/hapus.php",
															data: ({
																id: kode,
																npm: npm
															}),
															cache: false,
															success: function(html) {
																alert("pergantian jadwal berhasil");
																$(value2).prop("disabled", false);
																$(value1).remove();
															}
														});
													} else {
														alert("pergantian jadwal gagal");
														return false;
													}
												})
										});
										});
									</script>
									<!-- ----------------------- -->
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<input class="btn btn-default" type="submit" name="sav" value="<?php echo $button ?>">
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
			</tr>
			<tbody>
				<?php
				$no=1;
				if (empty($pilihan_jadwal)) {
					?>
					<td colspan="6">tidak ada data</td>
					<?php
				}
				// echo $data;
				foreach ($pilihan_jadwal as $tampil) {
					?>
					<tr>

						<td><?php echo $no ?></td>
						<td>
							<?php echo $tampil["hari"].", ".$tampil['jam_mulai']." - ".$tampil['jam_akhir'] ?>
						</td>
						<td>
							<?php echo $tampil["nama_mp"]."(".$tampil["nama_kelas"].")" ?>
						</td>
						<td>
							<?php echo $tampil['nama_lab']."(".$tampil['kapasitas_lab']."/".$conn->jumlah_orang($tampil['kode_jadwal_praktikum']).")"; ?>
						</td>
						<td>
							<?php echo $tampil['nama_asprak'] ?>
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