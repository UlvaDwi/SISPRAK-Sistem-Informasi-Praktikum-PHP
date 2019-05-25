	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_user,$nama_user, $username , $password , $hak_akses){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_karyawan` (`kode_user`, `nama_user` ,`username`, `password` , `hak_akses` ) VALUES (?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("issss", $kode_user,$nama_user, $username , $password , $hak_akses);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_karyawan") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_user){
			$stmt = $this->conn->prepare("select * from tbl_karyawan where kode_user =?") or die($this->conn->error);
			$stmt->bind_param("i", $kode_user);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_user){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_karyawan` WHERE `kode_user` = ?") or die($this->conn->error);
			$stmt->bind_param("i", $kode_user);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_user,$nama_user, $username , $password , $hak_akses){
			$stmt = $this->conn->prepare("UPDATE `tbl_karyawan` SET `nama_user` = ? , `username` = ? , `password` = ? , `hak_akses` = ? 
			  WHERE `kode_user` = ?") or die($this->conn->error);
			$stmt->bind_param("ssssi", $nama_user, $username , $password , $hak_akses , $kode_user);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>