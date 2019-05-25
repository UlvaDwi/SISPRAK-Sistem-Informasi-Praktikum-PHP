	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($kode_asprak , $nama_asprak, $jk_asprak , $foto_asprak , $telp_asprak , $email_asprak , $pass_asprak){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_asprak` (`kode_asprak`, `nama_asprak` ,`jk_asprak`, `foto_asprak` , `telp_asprak` , `email_asprak` , `pass_asprak`) VALUES (?,?,?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sssssss", $kode_asprak , $nama_asprak, $jk_asprak , $foto_asprak , $telp_asprak , $email_asprak , $pass_asprak);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_asprak") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

		public function read_foto($kode_asprak){
			$stmt = $this->conn->prepare("select * from tbl_asprak where kode_asprak = ?") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($kode_asprak){
			$stmt = $this->conn->prepare("select * from tbl_asprak where kode_asprak =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_asprak);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_asprak){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_asprak` WHERE `kode_asprak` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_asprak);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_asprak , $nama_asprak, $jk_asprak , $foto_asprak , $telp_asprak , $email_asprak , $pass_asprak){
			$stmt = $this->conn->prepare("UPDATE `tbl_asprak` SET `nama_asprak` = ? , `jk_asprak` = ? , `foto_asprak` = ? , `telp_asprak` = ? , `email_asprak` = ? , `pass_asprak` = ? 
			  WHERE `kode_asprak` = ?") or die($this->conn->error);
			$stmt->bind_param("sssssss", $nama_asprak, $jk_asprak , $foto_asprak , $telp_asprak , $email_asprak , $pass_asprak , $kode_asprak);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
	 
	 
	 public function update_tanpa_foto($kode_asprak , $nama_asprak, $jk_asprak  , $telp_asprak , $email_asprak , $pass_asprak){
		$stmt = $this->conn->prepare("UPDATE `tbl_asprak` SET `nama_asprak` = ? , `jk_asprak` = ? , `telp_asprak` = ? , `email_asprak` = ? , `pass_asprak` = ? 
		  WHERE `kode_asprak` = ?") or die($this->conn->error);
		$stmt->bind_param("ssssss", $nama_asprak, $jk_asprak , $telp_asprak , $email_asprak , $pass_asprak , $kode_asprak);
		if($stmt->execute()){
			$stmt->close();
			$this->conn->close();
			return true;
		}
	}

 }	
?>