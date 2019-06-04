<?php
require_once 'class.php';

$kode_asprak	= $_REQUEST['kode_asprak'];
$conn 		= new db_class();
$conn->delete($kode_asprak);
echo "<meta http-equiv='refresh' content='0; url=index.php?lihat=asprak/index'>";
echo "<script>alert('Data Telah Terhapus');</script>";
?>

