<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}

		public function checkData($jam_mulai, $jam_akhir)
		{
			$stmt =$this->conn->prepare("select * from tbl_jam");
			// $gabung=strtolower(preg_replace('/\s/','', $keterangan)).$jam_mulai.$jam_akhir;
			$gabung=$jam_mulai.$jam_akhir;
			if ($stmt->execute()) {
				$result =$stmt->get_result();
				while ($i = $result->fetch_array()) {
					if ($i['jam_mulai'].$i['jam_akhir']==$gabung) {
						return 1;
						break;
					}
				}
			}
			return 0;
		}
		
		public function create($keterangan, $jam_mulai, $jam_akhir){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_jam` (`keterangan`, `jam_mulai`, `jam_akhir`) VALUES (?, ?, ?)") or die($this->conn->error);
			$stmt->bind_param("sss",$keterangan, $jam_mulai, $jam_akhir);
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