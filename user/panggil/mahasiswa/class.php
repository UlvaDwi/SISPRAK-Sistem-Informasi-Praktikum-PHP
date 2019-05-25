	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($npm,$nama_mhs,$kode_jurusan,$alamat,$jk_mhs,$foto,$pass_mhs){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_mahasiswa` (`npm`, `nama_mhs`,`kode_jurusan`,`alamat`,`jk_mhs`,`foto`,`pass_mhs`) VALUES (?,?,?,?,?,?,?)") or die($this->conn->error);
		
			$stmt->bind_param("sssssss", $npm, $nama_mhs, $kode_jurusan, $alamat, $jk_mhs, $foto, $pass_mhs);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_mahasiswa") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($npm){
			$stmt = $this->conn->prepare("select * from tbl_mahasiswa where npm =?") or die($this->conn->error);
			$stmt->bind_param("s", $npm);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($npm){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_mahasiswa` WHERE `npm` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $npm);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($npm, $nama_mhs, $kode_jurusan, $alamat, $jk_mhs, $foto, $pass_mhs){
			$stmt = $this->conn->prepare("UPDATE `tbl_mahasiswa` SET `nama_mhs`= ?, `kode_jurusan`=? ,`alamat`=? ,`jk_mhs`= ?,`foto`=?, `pass_mhs`=? WHERE `npm` = ?") or die($this->conn->error);
			$stmt->bind_param("sssssss",  $nama_mhs, $kode_jurusan, $alamat, $jk_mhs,$foto,$pass_mhs,$npm);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>