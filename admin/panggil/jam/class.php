<?php
	require 'koneksi.php';
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_jam, $keterangan, $jam_mulai, $jam_akhir){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_jam` (`kode_jam`, `keterangan`, `jam_mulai`, `jam_akhir`) VALUES (?, ?, ?, ?)") or die($this->conn->error);
			$stmt->bind_param("ssss", $kode_jam, $keterangan, $jam_mulai, $jam_akhir);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("SELECT * from `tbl_jam`") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_jam){
			$stmt = $this->conn->prepare("SELECT * FROM `tbl_jam` WHERE `kode_jam` = '$kode_jam'") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_jam){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_jam` WHERE `kode_jam` = '$kode_jam'") or die($this->conn->error);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($keterangan, $jam_mulai, $jam_akhir, $kode_jam){
			$stmt = $this->conn->prepare("UPDATE `tbl_jam` SET `keterangan` = '$keterangan', `jam_mulai` = '$jam_mulai', `jam_akhir` = '$jam_akhir' WHERE `kode_jam` = '$kode_jam'") or die($this->conn->error);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>