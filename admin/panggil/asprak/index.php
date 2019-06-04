<?php
require 'class.php';
$conn = new db_class();
$read = $conn->read();

$link 	= "index.php?lihat=asprak/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Mastering Asprak</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST" action = "panggil/asprak/tambah.php" enctype = "multipart/form-data">
					<div class="form-group">
						<label>Kode Asprak</label>
						<input type ="text" id="kode_asprak" name = "kode_asprak" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama Asprak</label>
						<input type ="text" id="nama_asprak" name = "nama_asprak" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<br>
						<input type ="radio" name = "jk_asprak"  value = "Laki-Laki" > Laki - Laki </input>
						<input type ="radio" name = "jk_asprak"  value = "Perempuan" >Perempuan </input>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type ="file" id="foto_asprak" name = "foto_asprak" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Telepon</label>
						<input type ="text" id="telp_asprak" name = "telp_asprak" class="form-control" >
					</div>

					<div class="form-group">
						<label>E-mail</label>
						<input type ="text" id="email_asprak" name = "email_asprak" class="form-control" >
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type ="text" id="pass_asprak" name = "pass_asprak" class="form-control" >
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
				<th>Nama Asprak</th>
				<th>Telepon</th>
				<th>E-mail</th>

				<th>Aksi</th>
			</tr>
			<tbody>
				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td>
							<a href="" id="edit" data-id="<?php echo $tampil['kode_asprak']?>">
								<?php echo $tampil['nama_asprak']?>
							</a>
						</td>
						<td><?php echo $tampil['telp_asprak']?></td>
						<td><?php echo $tampil['email_asprak']?></td>
						<td style="text-align: center;">
							<a onclick="return confirm('Apakah yakin Password Di Reset?')" href="<?= $link.'reset&asprak='.$tampil['kode_asprak'] ?>" class="btn btn-danger btn-sm">
								<span class=""></span> Reset Password
							</a>
							<a href="<?= $link.'edit&kode_asprak='.$tampil['kode_asprak'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&kode_asprak='.$tampil['kode_asprak'] ?>" class="btn btn-danger btn-sm">
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
		$.post('panggil/asprak/lihat.php',
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
				<h4 class="modal-title" id="exampleModalLabel">Data Detail Asprak</h4>
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