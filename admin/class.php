<?php 
require_once 'koneksi.php';
	/**
	 * 
	 */
	class db_class extends db_connect
	{
		
		public function __construct()
		{
			$this->connect();
		}

		public function lihat_aktivasi(){
			$stmt = $this->conn->prepare("select status_aktivasi from tbl_aktivasi where status_aktivasi=1");
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}
		public function get_count(){
			$stmt = $this->conn->prepare("select count(status_aktivasi) as total from tbl_aktivasi where status_aktivasi=1");
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch['total'];
			}
		}

	}
	?>