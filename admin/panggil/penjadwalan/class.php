	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}

		public function checkData( $hari,$kode_jam,$kode_lab )
		{
			$stmt =$this->conn->prepare("select * from tbl_penjadwalan");
			$hari=strtolower($hari);
			$gabung = $hari.$kode_jam.$kode_lab;
			if ($stmt->execute()) {
				$result =$stmt->get_result();
				// echo "inputan : ".$gabung;
				while ($i = $result->fetch_array()) {
					$dat = strtolower($i['hari']).$i['kode_jam'].$i['kode_lab']; 
					if ($dat==$gabung) {
						// echo $dat."::".$gabung;
						return 1;
						break;
					}
				}
			}
		}
		
		public function create($kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_penjadwalan` (`kode_jadwal_praktikum`, `kode_mp` , `kode_kelas` , `kode_asprak` , `hari` , `kode_jam` , `kode_lab`) VALUES (null,?,?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("ssssis", $kode_mp ,$kode_kelas , $kode_asprak ,$hari , $kode_jam , $kode_lab);
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