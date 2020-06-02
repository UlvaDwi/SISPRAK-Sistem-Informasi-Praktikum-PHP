<?php
require 'class.php';
$conn = new db_class();
$read = $conn->read();
$con = mysqli_connect("localhost","root","","dbpraktikum");
$link 	= "index.php?lihat=mahasiswa/";
?>
<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Mastering Mahasiswa</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST" action = "panggil/mahasiswa/tambah.php" enctype="multipart/form-data">
					<div class="form-group">
						<label>NPM</label>
						<input type ="text" name = "npm" class="form-control" required>
					</div>
					<div class="form-group">
						<label>NAMA MAHASISWA</label>
						<input type ="text" name = "nama_mhs" class="form-control" autofocus required>
					</div>
					<!-- <div class="form-group">
						<label>PASSWORD</label>
						<input type ="password" name = "pass_mhs" class="form-control" autofocus required>
					</div> -->
					<div class="form-group">
						<label>JENIS KELAMIN</label>
						<div class="radio">
							<label>
								<input type="radio" name="jk_mhs" value="Perempuan" placeholder="Perempuan" required>
								Perempuan
							</label>
							<label>
								<input type="radio" name="jk_mhs" value="Laki-Laki" placeholder="Laki-Laki" required>
								Laki-Laki
							</label>
						</div>
					</div>
					<div class="form-group">
						<label>ALAMAT</label>
						<textarea name = "alamat" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>JURUSAN</label>
						<select name="kode_jurusan" class="form-control" required>
							<?php
							echo "<option>--pilih Jurusan--</option>";
							$result = mysqli_query($con,"SELECT * FROM tbl_jurusan");
							while($row = mysqli_fetch_assoc($result)){
								echo "<option value=$row[kode_jurusan]>$row[nama_jurusan]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="file" required>
					</div>
					<div class = "form-group">
						<button name = "save" class = "btn btn-success">
							<span class = "glyphicon glyphicon-floppy-disk"></span> 
							Simpan
						</button>
					</div>
				</form>
			</div><!-- .col-lg-6 -->
			<div class = "col-lg-3"></div>
		</div><!-- .row -->
		<br>
		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="info">
				<th>No</th>
				<th>NAMA MAHASISWA</th>
				<th>ALAMAT</th>
				<th>JURUSAN</th>
				<th>Aksi</th>
			</tr>
			<tbody>
				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					$npm=$tampil['npm'];
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td>
							<a href="" id="edit" data-id="<?php echo $tampil['npm']?>">
								<?php echo $tampil['nama_mhs']?>
							</a>
						</td>
						<td><?php echo $tampil['alamat']?></td>
						<td><?php echo $tampil['nama_jurusan']?></td>
						<td style="text-align: center;">
							<a onclick="return confirm('Apakah yakin Password Di Reset?')" href="<?= $link.'reset&npm='.$tampil['npm'] ?>" class="btn btn-danger btn-sm">
								<span class=""></span> Reset Password
							</a>
							<a href="<?= $link.'edit&npm='.$tampil['npm'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&npm='.$tampil['npm'] ?>" class="btn btn-danger btn-sm">
								<span class = "glyphicon glyphicon-trash"></span> Hapus
							</a>
						</td>
					</tr>
					<?php
				}
				?>	
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).on('click','#edit',function(e){
		e.preventDefault();
		$("#modal-lihat").modal('show');
		$.post('panggil/mahasiswa/lihat.php',
			{id:$(this).attr('data-id')},
			function(html){
				$("#data-edit").html(html);
			}   
			);
	});
</script>
<!-- ======================MODAL=============================== -->
<div class="modal fade" id="modal-lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Data Detail Mahasiswa</h4>
			</div>
			<div class="modal-body" style="padding: 0px;">
				<div id="data-edit">

				</div>				
			</div>
			<div class="modal-footer" style="padding-top: 5px">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- ====================MODAL======================================== -->