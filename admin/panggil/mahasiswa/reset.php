<?php
require_once 'class.php';
$npm	= $_REQUEST['npm'];
$conn 	= new db_class();
$conn->reset($npm);
echo "<script>alert('Password Ter-reset');</script>";
echo "<script> document.location.href='index.php?lihat=mahasiswa/index'; </script>";
?>