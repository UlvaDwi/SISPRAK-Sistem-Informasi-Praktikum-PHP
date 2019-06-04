<?php
require_once 'class.php';

$kode_kelas	= $_REQUEST['kode_kelas'];
$conn 		= new db_class();
$conn->delete($kode_kelas);
echo "<script>alert('Data Telah Terhapus');</script>";
echo "<script>document.location.href='index.php?lihat=kelas/index'</script>";

?>