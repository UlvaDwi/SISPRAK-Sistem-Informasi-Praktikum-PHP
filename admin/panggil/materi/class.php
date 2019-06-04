 <?php
 require 'koneksi.php';
 class db_class extends db_connect{	
 	public function __construct(){
 		$this->connect();
 	}
		// pengecekan apabila terdapat inputan yang pernah ada
 	public function checkData($nama_materi, $kode_materi){
 		$stmt = $this->conn->prepare("select * from tbl_materi");
 		$gabung = strtolower(preg_replace('/\s/', '', $nama_materi)).$kode_materi;
 		if ($stmt->execute()) {
 			$result = $stmt->get_result();
 			while ($i = $result->fetch_array()) {
 				if (strtolower(preg_replace('/\s/', '', $i['nama_materi'])).$i['kode_mp']==$gabung) {
 					return 1;
 					break;
 				}
 			}
 		}
 		return 0;
 	}

 	public function create($kode_materi,$nama_materi, $kode_mp){
 		$stmt = $this->conn->prepare("INSERT INTO `tbl_materi` (`kode_materi`, `nama_materi`, `kode_mp`) VALUES (?,?,?)") or die($this->conn->error);
 		$stmt->bind_param("sss", $kode_materi, $nama_materi, $kode_mp);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function read(){
 		$stmt = $this->conn->prepare("select tbl_materi.*, tbl_matapraktikum.nama_mp, tbl_jurusan.nama_jurusan from tbl_materi inner join tbl_matapraktikum on tbl_materi.kode_mp = tbl_matapraktikum.kode_mp inner join tbl_jurusan on tbl_matapraktikum.kode_jurusan = tbl_jurusan.kode_jurusan ORDER BY `tbl_jurusan`.`nama_jurusan` ASC") or die($this->conn->error);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$stmt->close();
 			$this->conn->close();
 			return $result;
 		}
 	}


 	public function tampil($kode_materi){
 		$stmt = $this->conn->prepare("select tbl_materi.*, tbl_matapraktikum.nama_mp, tbl_matapraktikum.kode_ta, tbl_jurusan.* from tbl_materi inner join tbl_matapraktikum on tbl_materi.kode_mp = tbl_matapraktikum.kode_mp inner join tbl_jurusan on tbl_matapraktikum.kode_jurusan = tbl_jurusan.kode_jurusan where kode_materi = ?") or die($this->conn->error);
 		$stmt->bind_param("s", $kode_materi);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$fetch = $result->fetch_array();
 			$stmt->close();
 			$this->conn->close();
 			return $fetch;
 		}
 	}

 	public function delete($kode_materi){
 		$stmt = $this->conn->prepare("DELETE FROM `tbl_materi` WHERE `kode_materi` = ?") or die($this->conn->error);
 		$stmt->bind_param("s", $kode_materi);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function update($kode_materi, $nama_materi, $kode_mp){
 		$stmt = $this->conn->prepare("UPDATE `tbl_materi` SET `nama_materi` = ?, `kode_mp`=? WHERE `kode_materi` = ?") or die($this->conn->error);
 		$stmt->bind_param("sss", $nama_materi, $kode_mp, $kode_materi);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}
 }
 ?>