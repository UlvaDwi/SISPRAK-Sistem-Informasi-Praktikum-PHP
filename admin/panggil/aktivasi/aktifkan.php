<?php
require_once 'class.php';
$kode	= $_REQUEST['kode'];
$conn = new db_class();
	// echo $kode;
if ($conn->aktifkan($kode)) {
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

