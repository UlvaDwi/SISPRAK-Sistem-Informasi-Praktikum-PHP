<?php 
require_once 'class.php'; 
$dbase = new db_class();
?>
<div class="jumbotron">
	<p>SISPRAK</p>
	<h3>
		jumlah permintaan aktivasi sebesar 
		<?php echo $dbase->get_count(); ?>
		<a href="index.php?lihat=aktivasi/index" title="">
			<button type="button">lihat</button>
		</a>
	</h3>
</div>