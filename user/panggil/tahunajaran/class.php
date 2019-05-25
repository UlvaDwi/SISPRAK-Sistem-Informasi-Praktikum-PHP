	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_ta, $semester, $tahun){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_ta` (`kode_ta`, `semester`, `tahun` ) VALUES (?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sss", $kode_ta, $semester, $tahun);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_ta") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}


		public function tampil($kode_ta){
			$stmt = $this->conn->prepare("select * from tbl_ta where kode_ta =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_ta);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		public function delete($kode_ta){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_ta` WHERE `kode_ta` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_ta);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_ta, $semester, $tahun){
			$stmt = $this->conn->prepare("UPDATE `tbl_ta` SET `semester`=? ,`tahun` = ? WHERE `kode_ta` = ?") or die($this->conn->error);
			$stmt->bind_param("sss", $semester, $tahun, $kode_ta);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
	}	
	?>