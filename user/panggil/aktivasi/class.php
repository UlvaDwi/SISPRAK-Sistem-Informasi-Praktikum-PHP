	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		public function cek_status($npm){
			$konek = mysqli_connect("localhost", "root", "", "dbpraktikum");
			$ecsape = mysqli_real_escape_string($konek, $npm);
			$sql= "SELECT tbl_aktivasi.status_aktivasi FROM `tbl_mahasiswa` LEFT JOIN tbl_aktivasi ON tbl_mahasiswa.npm = tbl_aktivasi.npm where tbl_mahasiswa.npm = $ecsape";
			$query = mysqli_query($konek,$sql)or die(mysqli_error($konek));
			$fetch = mysqli_fetch_array($query);
			return $fetch;

		}
		public function create($npm , $kwitansi, $keterangan , $waktu_aktivasi, $status_aktivasi){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_aktivasi` (`npm`, `kwitansi` ,`keterangan`, `waktu_aktivasi`, `status_aktivasi`) VALUES (?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sssss", $npm , $kwitansi, $keterangan , $waktu_aktivasi, $status_aktivasi );
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_aktivasi") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

		public function read_foto($kode_aktivasi){
			$stmt = $this->conn->prepare("select * from tbl_aktivasi where kode_aktivasi = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_aktivasi);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

		
		public function tampil($kode_aktivasi){
			$stmt = $this->conn->prepare("select * from tbl_aktivasi where kode_aktivasi =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_aktivasi);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_aktivasi){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_aktivasi` WHERE `kode_aktivasi` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_aktivasi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_aktivasi , $kwitansi, $keterangan , $waktu_aktivasi){
			$stmt = $this->conn->prepare("UPDATE `tbl_aktivasi` SET `kwitansi` = ? , `keterangan` = ? , `waktu_aktivasi` = ? , `telp_asprak` = ? , `email_asprak` = ? , `pass_asprak` = ? 
				WHERE `kode_aktivasi` = ?") or die($this->conn->error);
			$stmt->bind_param("ssssss", $kwitansi, $keterangan , $waktu_aktivasi , $kode_aktivasi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		
		public function update_tanpa_foto($kode_aktivasi , $kwitansi, $keterangan ){
			$stmt = $this->conn->prepare("UPDATE `tbl_aktivasi` SET `npm`=?,`kwitansi` = ? , `keterangan` = ? , `telp_asprak` = ? , `email_asprak` = ? , `pass_asprak` = ? 
				WHERE `kode_aktivasi` = ?") or die($this->conn->error);
			$stmt->bind_param("ssssss", $kwitansi, $keterangan , $kode_aktivasi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
	}	
	?>