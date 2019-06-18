<?php
require_once 'class.php';
$kode_aktivasi	= $_REQUEST['kode'];
$conn 		= new db_class();
if ($conn->delete($kode_aktivasi)) {
	?>
	<script type="text/javascript">
		alert( "berhasil");
	</script>
	<?php
}else{
	?>
	<script type="text/javascript">
		alert( "gagal");
	</script>
	<?php
}
?>
<script type="text/javascript">
	window.location.replace("../../index.php?lihat=aktivasi/index");
</script>