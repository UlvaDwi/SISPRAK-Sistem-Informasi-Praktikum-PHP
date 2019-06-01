<?php

	// $koneksi = new mysqli('localhost', 'root', '','dbpraktikum');

	// //Jika koneksi gagal jalankan perintah dibawah
	// if ($koneksi->connect_error) {
 //    	die("Koneksi Gagal: " . $koneksi->connect_error);
	// } 

define('db_host', 'localhost');
define('db_user', 'root');	
define('db_pass', '');
define('db_name', 'dbpraktikum'); 

class db_connect{	
		public $host 	= db_host; //Server
		public $user 	= db_user; //User
		public $pass 	= db_pass; //Password
		public $dbname 	= db_name; //Database
		public $conn;
		public $error;
		
		public function connect(){
			//Perintah ketika koneksi berhasil
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

			//Perintah ketika koneksi error
			if(!$this->conn){
				$this->error = "Terjadi Kesalahan: Tidak Bisa Koneksi Ke Database !" . $this->connect->connect_error();
				return false;
			}
		}
	}	
	?>