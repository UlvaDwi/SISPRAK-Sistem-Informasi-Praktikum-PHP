<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_jn, $jenis_nilai){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_jenis_nilai` (`kode_jn`, `jenis_nilai`) VALUES (?, ?)") or die($this->conn->error);
			$stmt->bind_param("ss", $kode_jn, $jenis_nilai);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_jenis_nilai ") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_jn){
			$stmt = $this->conn->prepare("SELECT * FROM `tbl_jenis_nilai` WHERE `kode_jn` = '$kode_jn'") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_jn){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_jenis_nilai` WHERE `kode_jn` = '$kode_jn'") or die($this->conn->error);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_jn, $jenis_nilai){
			$stmt = $this->conn->prepare("UPDATE `tbl_jenis_nilai` SET `jenis_nilai` = '$jenis_nilai' WHERE `kode_jn` = '$kode_jn'") or die($this->conn->error);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>