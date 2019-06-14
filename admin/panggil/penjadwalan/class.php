	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_jadwal_praktikum , $kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_penjadwalan` (`kode_jadwal_praktikum`, `kode_mp` , `kode_kelas` , `kode_asprak` , `hari` , `kode_jam` , `kode_lab`) VALUES (?,?,?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("issssis", $kode_jadwal_praktikum , $kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tabel_penjadwalan ") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_jadwal_praktikum){
			$stmt = $this->conn->prepare("select * from tbl_penjadwalan where kode_jadwal_praktikum =?") or die($this->conn->error);
			$stmt->bind_param("i", $kode_jadwal_praktikum);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_jadwal_praktikum){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_penjadwalan` WHERE `kode_jadwal_praktikum` = ?") or die($this->conn->error);
			$stmt->bind_param("i", $kode_jadwal_praktikum);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_jadwal_praktikum , $kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab){
			$stmt = $this->conn->prepare("UPDATE `tbl_penjadwalan` SET `kode_mp` = ?, `kode_kelas` = ?, `kode_asprak` = ? ,`hari` = ?, `kode_jam` = ?, `kode_lab` = ? WHERE `kode_jadwal_praktikum` = ?") or die($this->conn->error);
			$stmt->bind_param("ssssisi",  $kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab, $kode_jadwal_praktikum );
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>