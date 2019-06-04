<?php
require_once 'class.php';
$kd	= $_REQUEST['asprak'];
$conn 	= new db_class();
$conn->reset($kd);
echo "<script>alert('Password Ter-reset');</script>";
echo "<script> document.location.href='index.php?lihat=asprak/index'; </script>";
?>