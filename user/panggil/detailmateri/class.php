	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_detail_materi,$materi, $keterangan, $kode_materi){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_detail_materi` (`kode_detail_materi`, `materi`, `keterangan`, `kode_materi`) VALUES (?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("isss", $kode_detail_materi , $materi, $keterangan, $kode_materi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_detail_materi") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_detail_materi){
			$stmt = $this->conn->prepare("select * from tbl_detail_materi where kode_detail_materi =?") or die($this->conn->error);
			$stmt->bind_param("i", $kode_detail_materi);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_detail_materi){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_detail_materi` WHERE `kode_detail_materi` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_detail_materi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_detail_materi, $materi, $keterangan, $kode_materi){
			$stmt = $this->conn->prepare("UPDATE `tbl_detail_materi` SET `materi` = ?, `keterangan` = ?, `kode_materi` = ?  WHERE `kode_detail_materi` = ?") or die($this->conn->error);
			$stmt->bind_param("sssi", $materi,$keterangan, $kode_materi, $kode_detail_materi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>