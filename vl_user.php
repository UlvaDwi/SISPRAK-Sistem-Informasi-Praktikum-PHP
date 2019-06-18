<?php
session_start();
include "koneksi.php"; 

$Username = $_POST["Username"];
$Password = $_POST["Password"];

$query = mysqli_query ($konek, "SELECT * FROM tbl_karyawan WHERE username='$Username' AND password='$Password'");
$data = mysqli_fetch_array($query);
$id=$data[0];
$cek = mysqli_num_rows($query);
if($cek>0){
 $_SESSION['Username']= $id;
 echo"<script>window.location='admin/index.php';</script>";
}else{
 $query = mysqli_query ($konek, "SELECT * FROM tbl_asprak WHERE nama_asprak='$Username' AND pass_asprak='$Password'");
 $data = mysqli_fetch_array($query);
 $id=$data[0];
 $cek = mysqli_num_rows($query);
 if($cek>0){
  $_SESSION['Username']= $id;
  echo"<script>window.location='asisten/index.php';</script>";
}else{
  $query = mysqli_query ($konek, "SELECT * FROM tbl_mahasiswa WHERE npm='$Username' AND pass_mhs='$Password'");
  $data = mysqli_fetch_array($query);
  $id=$data[0];
  $cek = mysqli_num_rows($query);
  if($cek>0){
   $_SESSION['Username']= $id;
   echo"<script>window.location='user/index.php';</script>";
 }else{
   echo"<script>alert('Login Gagal! Masukkan Username & Password dengan benar');</script>";
   echo"<script>window.location='index.php';</script>";
 }
}
}
?>