<?php
require_once 'class.php';
$kode_materi= $_REQUEST['kode_materi'];
$conn = new db_class();
$conn->delete($kode_materi);
echo "<meta http-equiv='refresh' content='0; url= index.php?lihat=materi/index'>";
echo "<script>alert('Data Telah Terhapus');</script>";
?>