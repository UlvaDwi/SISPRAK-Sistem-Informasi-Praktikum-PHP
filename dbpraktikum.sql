-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 12:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpraktikum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktivasi`
--

CREATE TABLE `tbl_aktivasi` (
  `kode_aktivasi` int(11) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `kwitansi` varchar(200) NOT NULL,
  `keterangan` varchar(7) NOT NULL,
  `waktu_aktivasi` datetime NOT NULL,
  `status_aktivasi` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aktivasi`
--

INSERT INTO `tbl_aktivasi` (`kode_aktivasi`, `npm`, `kwitansi`, `keterangan`, `waktu_aktivasi`, `status_aktivasi`) VALUES
(1, '170403020039', '745.jpg', 'offline', '2019-05-24 09:01:06', '2'),
(2, '170403020042', '2.PNG', 'offline', '2019-05-24 09:05:05', '1'),
(4, '170403020049', '1.PNG', 'online', '2019-05-24 19:27:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asprak`
--

CREATE TABLE `tbl_asprak` (
  `kode_asprak` varchar(12) NOT NULL,
  `nama_asprak` varchar(30) NOT NULL,
  `jk_asprak` varchar(10) NOT NULL,
  `foto_asprak` varchar(255) NOT NULL,
  `telp_asprak` varchar(15) NOT NULL,
  `email_asprak` varchar(50) NOT NULL,
  `pass_asprak` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_asprak`
--

INSERT INTO `tbl_asprak` (`kode_asprak`, `nama_asprak`, `jk_asprak`, `foto_asprak`, `telp_asprak`, `email_asprak`, `pass_asprak`) VALUES
('t12019', 'Ulva Dwi Mariyani', 'Perempuan', 'imgsrc', '086792278999', 'ulvhadwii@gmail.com', '12345'),
('t22019', 'Ludi W', 'Laki-laki', 'imgsrc', '098767899876', 'ludiw@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jadwal_praktikum`
--

CREATE TABLE `tbl_detail_jadwal_praktikum` (
  `kode_jadwal_praktikum` varchar(6) NOT NULL,
  `kode_mp` varchar(5) NOT NULL,
  `kode_jadwal_ruang` varchar(5) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `kode_asprak` varchar(12) NOT NULL,
  `kode_rumus` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jadwal_praktikum`
--

INSERT INTO `tbl_detail_jadwal_praktikum` (`kode_jadwal_praktikum`, `kode_mp`, `kode_jadwal_ruang`, `kode_kelas`, `kode_asprak`, `kode_rumus`) VALUES
('1', '1', '2', '2', 't12019', '1'),
('2', '2', '1', '2', 't12019', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jadwal_ruang`
--

CREATE TABLE `tbl_detail_jadwal_ruang` (
  `kode_jadwal_ruang` varchar(5) NOT NULL,
  `kode_lab` varchar(5) NOT NULL,
  `kode_hari` varchar(6) NOT NULL,
  `kode_jam` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jadwal_ruang`
--

INSERT INTO `tbl_detail_jadwal_ruang` (`kode_jadwal_ruang`, `kode_lab`, `kode_hari`, `kode_jam`) VALUES
('1', 'apk1', '1', 1),
('2', 'apk2', '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_materi`
--

CREATE TABLE `tbl_detail_materi` (
  `kode_detail_materi` int(11) NOT NULL,
  `materi` varchar(30) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kode_materi` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_materi`
--

INSERT INTO `tbl_detail_materi` (`kode_detail_materi`, `materi`, `keterangan`, `kode_materi`) VALUES
(1, 'oop', 'aa', '1'),
(2, 'class dan object', 'aaa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `kode_hari` varchar(6) NOT NULL,
  `nama_hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hari`
--

INSERT INTO `tbl_hari` (`kode_hari`, `nama_hari`) VALUES
('1', 'senin'),
('2', 'selasa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `kode_jam` tinyint(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jam`
--

INSERT INTO `tbl_jam` (`kode_jam`, `keterangan`, `jam_mulai`, `jam_akhir`) VALUES
(1, 'jam1', '07:00:00', '08:40:00'),
(2, 'jam2', '08:40:00', '10:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_nilai`
--

CREATE TABLE `tbl_jenis_nilai` (
  `kode_jn` varchar(6) NOT NULL,
  `jenis_nilai` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_nilai`
--

INSERT INTO `tbl_jenis_nilai` (`kode_jn`, `jenis_nilai`) VALUES
('1', 'uts'),
('2', 'uas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `kode_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('1', 'Sistem Informasi'),
('2', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `kode_user` int(5) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak_akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`kode_user`, `nama_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'Septivia', 'via', '123', 'abc'),
(2, 'abcd', 'abcd', '1234', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kode_kelas` varchar(6) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kode_kelas`, `nama_kelas`) VALUES
('1', 'a'),
('2', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `npm` varchar(12) NOT NULL,
  `nama_mhs` varchar(30) NOT NULL,
  `kode_jurusan` varchar(5) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `jk_mhs` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `pass_mhs` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`npm`, `nama_mhs`, `kode_jurusan`, `alamat`, `jk_mhs`, `foto`, `pass_mhs`) VALUES
('170403020039', 'Ulva Dwi Mariyani', '1', 'Malang', 'Perempuan', 'imgsrc', '1234'),
('170403020042', 'Dony W', '2', 'Malang', 'Laki-Laki', 'imgsrc', '1234'),
('170403020049', 'alfrizal', '1', 'lalalala', 'laki', 'imgsrc', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matapraktikum`
--

CREATE TABLE `tbl_matapraktikum` (
  `kode_mp` varchar(5) NOT NULL,
  `nama_mp` varchar(30) NOT NULL,
  `kode_jurusan` varchar(5) NOT NULL,
  `kode_ta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matapraktikum`
--

INSERT INTO `tbl_matapraktikum` (`kode_mp`, `nama_mp`, `kode_jurusan`, `kode_ta`) VALUES
('1', 'Pemrograman Web', '1', '2'),
('2', 'Mobile Computing 1', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `kode_materi` varchar(6) NOT NULL,
  `nama_materi` varchar(30) NOT NULL,
  `kode_mp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`kode_materi`, `nama_materi`, `kode_mp`) VALUES
('1', 'OOP', '1'),
('2', 'Layout ', '2'),
('3', 'css', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `kode_nilai` tinyint(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `nilai` tinyint(12) NOT NULL,
  `kode_jn` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`kode_nilai`, `keterangan`, `nilai`, `kode_jn`) VALUES
(1, 'aaa', 80, '1'),
(2, 'sss', 80, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `kode_penilaian` varchar(6) NOT NULL,
  `kode_penjadwalan_mhs` varchar(10) NOT NULL,
  `kode_nilai` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`kode_penilaian`, `kode_penjadwalan_mhs`, `kode_nilai`) VALUES
('1', '1', 1),
('2', '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjadwalan_mhs`
--

CREATE TABLE `tbl_penjadwalan_mhs` (
  `kode_penjadwalan_mhs` varchar(10) NOT NULL,
  `kode_jadwal_praktikum` varchar(6) NOT NULL,
  `npm` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjadwalan_mhs`
--

INSERT INTO `tbl_penjadwalan_mhs` (`kode_penjadwalan_mhs`, `kode_jadwal_praktikum`, `npm`) VALUES
('1', '1', '170403020039'),
('2', '2', '170403020042');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `kode_request` int(11) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `request` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruanglab`
--

CREATE TABLE `tbl_ruanglab` (
  `kode_lab` varchar(5) NOT NULL,
  `nama_lab` varchar(30) NOT NULL,
  `kapasitas_lab` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruanglab`
--

INSERT INTO `tbl_ruanglab` (`kode_lab`, `nama_lab`, `kapasitas_lab`) VALUES
('apk1', 'aplikasi 1', 40),
('apk2', 'aplikasi 2', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rumus`
--

CREATE TABLE `tbl_rumus` (
  `kode_rumus` varchar(6) NOT NULL,
  `jumlah_kehadiran` tinyint(5) NOT NULL,
  `persentase_uas` int(11) NOT NULL,
  `persentase_uts` int(11) NOT NULL,
  `persentase_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rumus`
--

INSERT INTO `tbl_rumus` (`kode_rumus`, `jumlah_kehadiran`, `persentase_uas`, `persentase_uts`, `persentase_tugas`) VALUES
('1', 10, 20, 30, 40),
('2', 5, 25, 30, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `kode_ta` varchar(20) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ta`
--

INSERT INTO `tbl_ta` (`kode_ta`, `semester`, `tahun`) VALUES
('1', 'ganjil', '2019'),
('2', 'genap', '2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aktivasi`
--
ALTER TABLE `tbl_aktivasi`
  ADD PRIMARY KEY (`kode_aktivasi`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `tbl_asprak`
--
ALTER TABLE `tbl_asprak`
  ADD PRIMARY KEY (`kode_asprak`);

--
-- Indexes for table `tbl_detail_jadwal_praktikum`
--
ALTER TABLE `tbl_detail_jadwal_praktikum`
  ADD PRIMARY KEY (`kode_jadwal_praktikum`),
  ADD KEY `kode_jadwal_ruang` (`kode_jadwal_ruang`),
  ADD KEY `kode_mp` (`kode_mp`),
  ADD KEY `kode_rumus` (`kode_rumus`),
  ADD KEY `kode_asprak` (`kode_asprak`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `tbl_detail_jadwal_ruang`
--
ALTER TABLE `tbl_detail_jadwal_ruang`
  ADD PRIMARY KEY (`kode_jadwal_ruang`),
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `kode_jam` (`kode_jam`),
  ADD KEY `kode_hari` (`kode_hari`);

--
-- Indexes for table `tbl_detail_materi`
--
ALTER TABLE `tbl_detail_materi`
  ADD PRIMARY KEY (`kode_detail_materi`),
  ADD KEY `kode_materi` (`kode_materi`);

--
-- Indexes for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`kode_hari`);

--
-- Indexes for table `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`kode_jam`);

--
-- Indexes for table `tbl_jenis_nilai`
--
ALTER TABLE `tbl_jenis_nilai`
  ADD PRIMARY KEY (`kode_jn`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indexes for table `tbl_matapraktikum`
--
ALTER TABLE `tbl_matapraktikum`
  ADD PRIMARY KEY (`kode_mp`),
  ADD KEY `kode_jurusan` (`kode_jurusan`),
  ADD KEY `kode_ta` (`kode_ta`);

--
-- Indexes for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`kode_materi`),
  ADD KEY `kode_mp` (`kode_mp`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `kode_jn` (`kode_jn`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`kode_penilaian`),
  ADD KEY `kode_penjadwalan_mhs` (`kode_penjadwalan_mhs`),
  ADD KEY `kode_nilai` (`kode_nilai`);

--
-- Indexes for table `tbl_penjadwalan_mhs`
--
ALTER TABLE `tbl_penjadwalan_mhs`
  ADD PRIMARY KEY (`kode_penjadwalan_mhs`),
  ADD KEY `kode_jadwal_praktikum` (`kode_jadwal_praktikum`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`kode_request`);

--
-- Indexes for table `tbl_ruanglab`
--
ALTER TABLE `tbl_ruanglab`
  ADD PRIMARY KEY (`kode_lab`);

--
-- Indexes for table `tbl_rumus`
--
ALTER TABLE `tbl_rumus`
  ADD PRIMARY KEY (`kode_rumus`);

--
-- Indexes for table `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`kode_ta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aktivasi`
--
ALTER TABLE `tbl_aktivasi`
  MODIFY `kode_aktivasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `kode_request` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_jadwal_praktikum`
--
ALTER TABLE `tbl_detail_jadwal_praktikum`
  ADD CONSTRAINT `tbl_detail_jadwal_praktikum_ibfk_1` FOREIGN KEY (`kode_jadwal_ruang`) REFERENCES `tbl_detail_jadwal_ruang` (`kode_jadwal_ruang`),
  ADD CONSTRAINT `tbl_detail_jadwal_praktikum_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `tbl_kelas` (`kode_kelas`),
  ADD CONSTRAINT `tbl_detail_jadwal_praktikum_ibfk_3` FOREIGN KEY (`kode_asprak`) REFERENCES `tbl_asprak` (`kode_asprak`),
  ADD CONSTRAINT `tbl_detail_jadwal_praktikum_ibfk_4` FOREIGN KEY (`kode_rumus`) REFERENCES `tbl_rumus` (`kode_rumus`),
  ADD CONSTRAINT `tbl_detail_jadwal_praktikum_ibfk_5` FOREIGN KEY (`kode_mp`) REFERENCES `tbl_matapraktikum` (`kode_mp`);

--
-- Constraints for table `tbl_detail_jadwal_ruang`
--
ALTER TABLE `tbl_detail_jadwal_ruang`
  ADD CONSTRAINT `tbl_detail_jadwal_ruang_ibfk_1` FOREIGN KEY (`kode_hari`) REFERENCES `tbl_hari` (`kode_hari`),
  ADD CONSTRAINT `tbl_detail_jadwal_ruang_ibfk_2` FOREIGN KEY (`kode_jam`) REFERENCES `tbl_jam` (`kode_jam`),
  ADD CONSTRAINT `tbl_detail_jadwal_ruang_ibfk_3` FOREIGN KEY (`kode_lab`) REFERENCES `tbl_ruanglab` (`kode_lab`);

--
-- Constraints for table `tbl_detail_materi`
--
ALTER TABLE `tbl_detail_materi`
  ADD CONSTRAINT `tbl_detail_materi_ibfk_1` FOREIGN KEY (`kode_materi`) REFERENCES `tbl_materi` (`kode_materi`);

--
-- Constraints for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD CONSTRAINT `tbl_mahasiswa_ibfk_1` FOREIGN KEY (`kode_jurusan`) REFERENCES `tbl_jurusan` (`kode_jurusan`);

--
-- Constraints for table `tbl_matapraktikum`
--
ALTER TABLE `tbl_matapraktikum`
  ADD CONSTRAINT `tbl_matapraktikum_ibfk_1` FOREIGN KEY (`kode_ta`) REFERENCES `tbl_ta` (`kode_ta`),
  ADD CONSTRAINT `tbl_matapraktikum_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `tbl_jurusan` (`kode_jurusan`);

--
-- Constraints for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD CONSTRAINT `tbl_materi_ibfk_1` FOREIGN KEY (`kode_mp`) REFERENCES `tbl_matapraktikum` (`kode_mp`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`kode_jn`) REFERENCES `tbl_jenis_nilai` (`kode_jn`);

--
-- Constraints for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD CONSTRAINT `tbl_penilaian_ibfk_1` FOREIGN KEY (`kode_nilai`) REFERENCES `tbl_nilai` (`kode_nilai`),
  ADD CONSTRAINT `tbl_penilaian_ibfk_2` FOREIGN KEY (`kode_penjadwalan_mhs`) REFERENCES `tbl_penjadwalan_mhs` (`kode_penjadwalan_mhs`);

--
-- Constraints for table `tbl_penjadwalan_mhs`
--
ALTER TABLE `tbl_penjadwalan_mhs`
  ADD CONSTRAINT `tbl_penjadwalan_mhs_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `tbl_mahasiswa` (`npm`),
  ADD CONSTRAINT `tbl_penjadwalan_mhs_ibfk_2` FOREIGN KEY (`kode_jadwal_praktikum`) REFERENCES `tbl_detail_jadwal_praktikum` (`kode_jadwal_praktikum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
