<?php 
require_once 'class.php'; 
$dbase = new db_class();
?>
<div class="jumbotron">
	<center><b> <font size="200px">Sisfo Praktikum</font> </b><br>
	<img src="../kanjuruhan.png" height="300px">

	<p>Hai Admin,</p>
	</center>
	<h3>
		Jumlah permintaan aktivasi sebesar 
		<?php echo $dbase->get_count(); ?>
		<a href="index.php?lihat=aktivasi/index" title="">
			<button type="button" class="btn btn-primary btn-sm">
			<span class = "glyphicon glyphicon-triangle-right"></span>lihat</button>
		</a>
	</h3>
</div>