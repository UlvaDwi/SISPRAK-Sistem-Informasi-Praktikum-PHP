	<?php
	require 'koneksi.php';

	class db_class extends db_connect{	
		public function __construct(){
			$this->connect();
		}
		// insert data 
		public function checkData($tahun, $semester){
			$stmt = $this->conn->prepare("select concat(semester, tahun) as gabung from tbl_ta");
			$gabung = $semester.$tahun;
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				while ($i = $result->fetch_array()) {
					if ($i['gabung']==$gabung) {
						return 1;
						break;
					}
				}
			}
			return 0;
		}
		public function create($kode_ta, $semester, $tahun){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_ta` (`kode_ta`, `semester`, `tahun` ) VALUES (?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sss", $kode_ta, $semester, $tahun);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		// tampil data
		public function read(){
			$stmt = $this->conn->prepare("select * from tbl_ta") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}
		// untuk edit
		public function tampil($kode_ta){
			$stmt = $this->conn->prepare("select * from tbl_ta where kode_ta =?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_ta);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		// hapus data
		public function delete($kode_ta){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_ta` WHERE `kode_ta` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_ta);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		// sistem untuk update ke mysql
		public function update($kode_ta, $semester, $tahun){
			$stmt = $this->conn->prepare("UPDATE `tbl_ta` SET `semester`=? ,`tahun` = ? WHERE `kode_ta` = ?") or die($this->conn->error);
			$gantiID = $this->conn->prepare("UPDATE `tbl_ta` SET `kode_ta` = ?  WHERE `semester`=? and `tahun` = ?") or die($this->conn->error);
			$stmt->bind_param("sss", $semester, $tahun, $kode_ta);
			$idBaru = $semester.$tahun;
			$gantiID->bind_param("sss", $idBaru, $semester, $tahun);
			if($stmt->execute()){
				if ($gantiID->execute()) {
					$stmt->close();
					$gantiID->close();
					$this->conn->close();
					return true;
				}
			}
		}
	}	
	?>