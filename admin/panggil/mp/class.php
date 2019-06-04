	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_mp, $nama_mp, $kode_jurusan, $kode_ta){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_matapraktikum` (`kode_mp`, `nama_mp`, `kode_jurusan`, `kode_ta`) VALUES (?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("ssss", $kode_mp, $nama_mp, $kode_jurusan, $kode_ta);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select tbl_matapraktikum.*, tbl_jurusan.nama_jurusan, tbl_ta.semester from tbl_ta inner join  (tbl_matapraktikum INNER JOIN tbl_jurusan ON tbl_jurusan.kode_jurusan=tbl_matapraktikum.kode_jurusan) ON tbl_matapraktikum.kode_ta = tbl_ta.kode_ta") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

		
		public function tampil($kode_mp){
			$stmt = $this->conn->prepare("select * from tbl_matapraktikum where kode_mp =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_mp);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_mp){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_matapraktikum` WHERE `kode_mp` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_mp);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_mp, $nama_mp, $kode_jurusan, $kode_ta){
			$stmt = $this->conn->prepare("UPDATE `tbl_matapraktikum` SET `nama_mp` = ?, `kode_jurusan`=?, `kode_ta`=? WHERE `kode_mp` = ?") or die($this->conn->error);
			$stmt->bind_param("ssss", $nama_mp, $kode_jurusan, $kode_ta, $kode_mp);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
	}	
	?>