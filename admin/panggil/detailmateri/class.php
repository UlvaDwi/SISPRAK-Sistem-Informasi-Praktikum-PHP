	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		// pengecekan apabila terdapat inputan yang pernah ada
		public function checkData($keterangan, $kode_materi){
			$stmt = $this->conn->prepare("select * from tbl_detail_materi");
			$gabung = strtolower(preg_replace('/\s/', '', $keterangan)).$kode_materi;
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				while ($i = $result->fetch_array()) {
					if (strtolower(preg_replace('/\s/', '', $i['keterangan'])).$i['kode_materi']==$gabung) {
						return 1;
						break;
					}
				}
			}
			return 0;
		}
		public function create($keterangan, $kode_materi){
			$stmt = $this->conn->prepare("INSERT INTO `tbl_detail_materi` (`kode_materi`, `keterangan`) VALUES (?,?)") or die($this->conn->error);
			$stmt->bind_param("ss",$kode_materi,  $keterangan);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("SELECT tbl_detail_materi.*, tbl_materi.nama_materi, tbl_materi.kode_ta , tbl_materi.kode_mp, tbl_matapraktikum.nama_mp, tbl_matapraktikum.kode_jurusan, tbl_jurusan.nama_jurusan FROM `tbl_detail_materi` INNER join tbl_materi on tbl_detail_materi.kode_materi = tbl_materi.kode_materi INNER join tbl_matapraktikum on tbl_matapraktikum.kode_mp = tbl_materi.kode_mp INNER join tbl_jurusan on tbl_jurusan.kode_jurusan = tbl_matapraktikum.kode_jurusan ") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

		
		public function tampil($kode_detail_materi){
			$stmt = $this->conn->prepare("SELECT tbl_detail_materi.*, tbl_materi.nama_materi, tbl_materi.kode_ta , tbl_materi.kode_mp, tbl_matapraktikum.nama_mp, tbl_matapraktikum.kode_jurusan, tbl_jurusan.nama_jurusan FROM `tbl_detail_materi` INNER join tbl_materi on tbl_detail_materi.kode_materi = tbl_materi.kode_materi INNER join tbl_matapraktikum on tbl_matapraktikum.kode_mp = tbl_materi.kode_mp INNER join tbl_jurusan on tbl_jurusan.kode_jurusan = tbl_matapraktikum.kode_jurusan where kode_detail_materi =?") or die($this->conn->error);
			$stmt->bind_param("i", $kode_detail_materi);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($kode_detail_materi){
			$stmt = $this->conn->prepare("DELETE FROM `tbl_detail_materi` WHERE `kode_detail_materi` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $kode_detail_materi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($kode_detail_materi, $keterangan, $kode_materi){
			$stmt = $this->conn->prepare("UPDATE `tbl_detail_materi` SET `keterangan` = ?, `kode_materi` = ?  WHERE `kode_detail_materi` = ?") or die($this->conn->error);
			$stmt->bind_param("ssi", $keterangan, $kode_materi, $kode_detail_materi);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
	}
	?>