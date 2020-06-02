<?php


$koneksi = mysqli_connect("localhost","root","","login_web1");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

// membaca username dari GET request
$email = $_GET['email'];
// membaca password dari GET request
// $nama = $_GET['nama'];
$pass = $_GET['password'];
// membaca email dari GET request
// $alamat = $_GET['alamat'];
// membaca kode API dari GET request
$api = $_GET['api'];

// jika kode API nya '1234' maka lakukan proses validasi username dan password
// jika kode API nya salah, maka proses validasi tidak dilakukan (diberikan respon "FALSE")
if ($api == "1234")
{
   // membaca data password user berdasar usernamenya
   $query = "SELECT * FROM user WHERE email = '$email'";
   $hasil = mysqli_query($koneksi, $query);
   $data  = mysqli_fetch_array($hasil);
   $password = $data['password'];

   // mencocokkan password user dari db dan dari GET request
   // jika cocok, maka responnya TRUE, jika tidak cocok responnya FALSE
   if ($pass == $password) $response = "TRUE";
   else $response = "FALSE";
}
else $response = "FALSE";

// membuat header dokumen XML
header('Content-Type: text/xml');
echo "<?xml version='1.0'?>";

// membuat tag data respon pada dokumen XML
echo "<data>";
echo "<response>".$response."</response>";
echo "</data>";
?>