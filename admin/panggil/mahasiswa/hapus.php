<?php
require_once 'class.php';

$npm	= $_REQUEST['npm'];
$conn 	= new db_class();
$conn->delete($npm);
echo "<script>alert('Data Telah Terhapus');</script>";
echo "<meta http-equiv='refresh' content='0; url= index.php?lihat=mahasiswa/index'>";
?>