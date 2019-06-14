	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($npm , $kwitansi, $keterangan , $waktu_aktivasi, $status){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_aktivasi` (`npm`, `kwitansi` ,`keterangan`, `waktu_aktivasi`, `status_aktivasi`) VALUES (?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sssss", $npm , $kwitansi, $keterangan , $waktu_aktivasi, $status);
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

		public function tampildetail($kode_aktivasi){
			$konek = mysqli_connect("localhost", "root", "", "dbpraktikum");
			$ecsape = mysqli_real_escape_string($konek, $kode_aktivasi);
			$sql = "select tbl_mahasiswa.*, tbl_jurusan.nama_jurusan from tbl_mahasiswa inner join tbl_jurusan on tbl_mahasiswa.kode_jurusan = tbl_jurusan.kode_jurusan where npm= $ecsape";
			$query = mysqli_query($konek, $sql);
			$row = mysqli_num_rows($query);
			if ($row == 1) {
				$readmhs = mysqli_fetch_array($query);
			}else{
				$readmhs = 0;
			}
			return $readmhs;
		}
		public function approve($npm){
			$stmt = $this->conn->prepare("UPDATE `tbl_aktivasi` SET `status_aktivasi` = 2 
				WHERE `kode_aktivasi` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $npm);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
	}	
	?>