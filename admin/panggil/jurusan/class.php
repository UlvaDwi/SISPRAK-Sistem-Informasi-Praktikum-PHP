	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		public function checkData($kelas){
			$stmt = $this->conn->prepare("select * from tbl_jurusan");
			$gabung = strtolower(preg_replace('/\s/', '', $kelas));
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				while ($i = $result->fetch_array()) {
					if (strtolower(preg_replace('/\s/', '', $i['nama_jurusan']))==$gabung) {
						return 1;
						break;
					}
				}
			}
			return 0;
		}
		public function create($kode_jurusan,$nama_jurusan){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES (?,?)") or die($this->conn->error);
			$stmt->bind_param("ss", $kode_jurusan, $nama_jurusan);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_jurusan") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_jurusan){
			$stmt = $this->conn->prepare("select * from tbl_jurusan where kode_jurusan =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_jurusan);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_jurusan){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_jurusan` WHERE `kode_jurusan` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_jurusan);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_jurusan, $nama_jurusan){
			$stmt = $this->conn->prepare("UPDATE `tbl_jurusan` SET `nama_jurusan` = ? WHERE `kode_jurusan` = ?") or die($this->conn->error);
			$stmt->bind_param("ss", $nama_jurusan, $kode_jurusan);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>