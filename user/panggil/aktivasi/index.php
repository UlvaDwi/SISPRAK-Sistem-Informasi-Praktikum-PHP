<?php
require 'class.php';
$conn = new db_class();
$read = $conn->read();
$npm= "";
$link 	= "index.php?lihat=aktivasi/";
$cek= $conn->cek_status($_SESSION['Username']);

?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Aktivasi Akun</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<?php 
				if ($cek['status_aktivasi']==0 || $cek['status_aktivasi']==null) {
					?>
					<form method ="POST"action = "panggil/aktivasi/tambah.php" enctype = "multipart/form-data">
						<input type ="hidden" id="npm" name = "npm" value="<?php echo $_SESSION['Username'];?>" 
						class="form-control" autofocus>
						<div class="form-group">
							<label>Kwitansi</label>
							<input type ="file" id="foto_asprak" name = "kwitansi" name = "kwitansi" class="form-control" autofocus>
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
				else if ($cek['status_aktivasi']=="1"){
					?>
					<img src="panggil/aktivasi/file/<?php echo $cek['kwitansi'] ?>">
					<div class = "form-group">
						<br><br><button name = "save" class = "btn btn-success">
							<span class = "glyphicon glyphicon-floppy-disk"></span> 
							menunggu persetujuan
						</button>
					</div>
					<?php
				}
				else{?>
					<img src="panggil/aktivasi/file/<?php echo $cek['kwitansi'] ?>">
					<?php echo "<br><br>Akun Anda telah teraktivasi"; 

				}
				
					?>
			</div><!-- .col-lg-6 -->
			<div class = "col-lg-3"></div>
		</div><!-- .row -->
		<br>