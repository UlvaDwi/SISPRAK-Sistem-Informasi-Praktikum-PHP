	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_materi,$nama_materi, $kode_mp){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_materi` (`kode_materi`, `nama_materi`, `kode_mp`) VALUES (?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sss", $kode_materi, $nama_materi, $kode_mp);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select tbl_materi.*, tbl_matapraktikum.nama_mp from tbl_materi inner join tbl_matapraktikum on tbl_materi.kode_mp = tbl_matapraktikum.kode_mp") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_materi){
			$stmt = $this->conn->prepare("select * from tbl_materi where kode_materi =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_materi);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_materi){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_materi` WHERE `kode_materi` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_materi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_materi, $nama_materi, $kode_mp){
			$stmt = $this->conn->prepare("UPDATE `tbl_materi` SET `nama_materi` = ?, `kode_mp`=? WHERE `kode_materi` = ?") or die($this->conn->error);
			$stmt->bind_param("sss", $nama_materi, $kode_mp, $kode_materi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>