	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}

		public function checkData( $nama_kelas,$kode_kelas )
		{
			$stmt =$this->conn->prepare("select * from tbl_kelas");
			$gabung=strtolower(preg_replace('/\s/','', $nama_kelas)).$kode_kelas;
			if ($stmt->execute()) {
				$result =$stmt->get_result();
				while ($i = $result->fetch_array()) {
					if (strtolower(preg_replace('/\s/', '',$i['nama_kelas'])).$i['kode_kelas']==$gabung) {
						return 1;
						break;
					}
				}
			}
		}
		
		public function create($kode_kelas , $nama_kelas){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_kelas` (`kode_kelas`, `nama_kelas`) VALUES (?,?)") or die($this->conn->error);
			$stmt->bind_param("ss", $kode_kelas, $nama_kelas);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_kelas") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_kelas){
			$stmt = $this->conn->prepare("select * from tbl_kelas where kode_kelas =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_kelas);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_kelas){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_kelas` WHERE `kode_kelas` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_kelas);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_kelas, $nama_kelas){
			$stmt = $this->conn->prepare("UPDATE `tbl_kelas` SET `nama_kelas` = ? WHERE `kode_kelas` = ?") or die($this->conn->error);
			$stmt->bind_param("ss", $nama_kelas, $kode_kelas);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>