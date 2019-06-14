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

 	public function wew($kd,$npm){
 		// $this->conn->close();
 		// $stmt = $this->conn->prepare("INSERT INTO `tbl_krp` (`kode_penjadwalan_mhs`, `kode_jadwal_praktikum`, `npm`) VALUES (NULL, ?, ?)") or die($this->conn->error);
 		// $stmt->bind_param("ss", $kd, $npm);
 		// if($stmt->execute()){
 		// 	// $stmt->close();
 		// 	// $this->conn->close();
 		// 	// return true;
 		// }
 		$konek = mysqli_connect("localhost", "root", "", "dbpraktikum");
 		$kd_escape = mysqli_real_escape_string($konek, $kd);
 		$npm_escape = mysqli_real_escape_string($konek, $npm);
 		$sql = "INSERT INTO `tbl_krp` (`kode_penjadwalan_mhs`, `kode_jadwal_praktikum`, `npm`) VALUES (NULL, $kd_escape, $npm_escape)";
 		$query = mysqli_query($konek, $sql);
 		if ($query) {
 			echo "berhasil";
 		}else{
 			mysql_error();
 		}
 	}

 	public function read_mp($jurusan){
 		$stmt = $this->conn->prepare("SELECT kode_mp FROM `tabel_penjadwalan` where tabel_penjadwalan.kode_jurusan = $jurusan GROUP BY tabel_penjadwalan.kode_mp") or die($this->conn->error);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$stmt->close();
 			$this->conn->close();
 			return $result;
 		}
 	}
 	public function read(){
 		$stmt = $this->conn->prepare("SELECT * FROM `tabel_penjadwalan` where kode_jurusan = 1 ORDER BY `tabel_penjadwalan`.`kode_mp` ASC ") or die($this->conn->error);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$stmt->close();
 			$this->conn->close();
 			return $result;
 		}
 	}
 	
 	public function pilihan_krp($npm){
 		$sql = "select tbl_krp.*, tabel_penjadwalan.* from tbl_krp inner join tabel_penjadwalan on tbl_krp.kode_jadwal_praktikum = tabel_penjadwalan.kode_jadwal_praktikum where tbl_krp.npm =? ";
 		$konek = mysqli_connect("localhost", "root", "", "dbpraktikum");
 		$stmt = mysqli_stmt_init($konek);
 		if (!mysqli_stmt_prepare($stmt, $sql)) {
 			$result = "error";
 		}else{
 			mysqli_stmt_bind_param($stmt, "s", $npm);
 			mysqli_stmt_execute($stmt);
 			$result = mysqli_stmt_get_result($stmt);
 		}
 		return $result;
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