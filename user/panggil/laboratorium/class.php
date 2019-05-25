	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_lab,$nama_lab, $kapasitas_lab){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_ruanglab` (`kode_lab`, `nama_lab`, `kapasitas_lab`) VALUES (?,?,?)") or die($this->conn->error);
			$stmt->bind_param("ssi", $kode_lab , $nama_lab, $kapasitas_lab);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_ruanglab") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_lab){
			$stmt = $this->conn->prepare("select * from tbl_ruanglab where kode_lab =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_lab);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_lab){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_ruanglab` WHERE `kode_lab` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_lab);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_lab, $nama_lab, $kapasitas_lab){
			$stmt = $this->conn->prepare("UPDATE `tbl_ruanglab` SET `nama_lab` = ?, `kapasitas_lab` = ?  WHERE `kode_lab` = ?") or die($this->conn->error);
			$stmt->bind_param("sis", $nama_lab,$kapasitas_lab, $kode_lab);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>