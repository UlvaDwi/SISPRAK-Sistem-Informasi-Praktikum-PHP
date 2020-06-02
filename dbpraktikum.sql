-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2019 pada 09.48
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
-- Stand-in struktur untuk tampilan `tabel_krp`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tabel_krp` (
`kode_penjadwalan_mhs` int(10)
,`npm` varchar(12)
,`kode_jadwal_praktikum` int(11)
,`kode_mp` varchar(5)
,`kode_kelas` varchar(6)
,`kode_asprak` varchar(12)
,`hari` varchar(10)
,`kode_jam` tinyint(5)
,`kode_lab` varchar(5)
,`nama_mp` varchar(30)
,`kode_jurusan` varchar(5)
,`nama_kelas` varchar(20)
,`nama_asprak` varchar(30)
,`jam_mulai` time
,`jam_akhir` time
,`nama_lab` varchar(30)
,`kapasitas_lab` tinyint(4)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tabel_penjadwalan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tabel_penjadwalan` (
`kode_jadwal_praktikum` int(11)
,`kode_mp` varchar(5)
,`kode_kelas` varchar(6)
,`kode_asprak` varchar(12)
,`hari` varchar(10)
,`kode_jam` tinyint(5)
,`kode_lab` varchar(5)
,`nama_mp` varchar(30)
,`kode_jurusan` varchar(5)
,`nama_kelas` varchar(20)
,`nama_asprak` varchar(30)
,`jam_mulai` time
,`jam_akhir` time
,`nama_lab` varchar(30)
,`kapasitas_lab` tinyint(4)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_aktivasi`
--

CREATE TABLE `tbl_aktivasi` (
  `kode_aktivasi` int(11) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `kwitansi` varchar(200) NOT NULL,
  `keterangan` varchar(7) NOT NULL,
  `waktu_aktivasi` datetime NOT NULL,
  `status_aktivasi` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_asprak`
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
-- Dumping data untuk tabel `tbl_asprak`
--

INSERT INTO `tbl_asprak` (`kode_asprak`, `nama_asprak`, `jk_asprak`, `foto_asprak`, `telp_asprak`, `email_asprak`, `pass_asprak`) VALUES
('t12019', 'Ulva Dwi Mariyani', 'Perempuan', 'imgsrc', '086792278999', 'ulvhadwii@gmail.com', 'ulva'),
('t22019', 'Riki Hariana', 'Laki-laki', 'imgsrc', '098767899876', 'riki@gmail.com', 'riki'),
('t32016', 'Imroatul Faizah', 'Perempuan', 'aa', '098765456788', 'imroatul@gmail.com', 'imroatul'),
('t42016', 'Kurniawan Angga Kusuma', 'Laki-laki', 'aa', '098765456789', 'kurniawan@gmail.com', 'kurniawan'),
('t52015', 'Gika', 'Laki-laki', 'aa', '098765678987', 'gika@gmail.com', 'gika'),
('t62014', 'Ivan Andika', 'Laki-laki', 'aa', '076567890876', 'ivan@gmail.com', 'ivan'),
('t72016', 'Makinun Amin', 'Laki-laki', 'aa', '098767899876', 'makin@gmail.com', 'makin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_materi`
--

CREATE TABLE `tbl_detail_materi` (
  `kode_detail_materi` int(11) NOT NULL,
  `kode_materi` varchar(6) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_materi`
--

INSERT INTO `tbl_detail_materi` (`kode_detail_materi`, `kode_materi`, `keterangan`) VALUES
(1, '1', ''),
(2, '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jam`
--

CREATE TABLE `tbl_jam` (
  `kode_jam` tinyint(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jam`
--

INSERT INTO `tbl_jam` (`kode_jam`, `keterangan`, `jam_mulai`, `jam_akhir`) VALUES
(1, 'jam1', '07:00:00', '08:40:00'),
(2, 'jam2', '08:40:00', '10:20:00'),
(3, 'jam3', '08:40:00', '10:20:00'),
(4, 'jam4', '10:20:00', '12:00:00'),
(5, 'jam5', '12:50:00', '14:30:00'),
(6, 'jam6', '14:30:00', '16:10:00'),
(7, 'jam7', '16:10:00', '17:50:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_nilai`
--

CREATE TABLE `tbl_jenis_nilai` (
  `kode_jn` int(11) NOT NULL,
  `jenis_nilai` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jenis_nilai`
--

INSERT INTO `tbl_jenis_nilai` (`kode_jn`, `jenis_nilai`) VALUES
(1, 'uts'),
(2, 'uas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `kode_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('1', 'Sistem Informasi'),
('2', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `kode_user` varchar(12) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak_akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`kode_user`, `nama_user`, `username`, `password`, `hak_akses`) VALUES
('1', 'Septivia', 'via', '123', 'abc'),
('2', 'abcd', 'abcd', '1234', 'abcd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kode_kelas` varchar(6) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kode_kelas`, `nama_kelas`) VALUES
('1', 'a'),
('2', 'b'),
('3', 'c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krp`
--

CREATE TABLE `tbl_krp` (
  `kode_penjadwalan_mhs` int(10) NOT NULL,
  `kode_jadwal_praktikum` varchar(6) NOT NULL,
  `npm` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
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
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`npm`, `nama_mhs`, `kode_jurusan`, `alamat`, `jk_mhs`, `foto`, `pass_mhs`) VALUES
('170403010012', 'Intan', '2', 'malang', 'Perempuan', 'humas meta sekretaris.jpg', 'sisprak'),
('170403020042', 'Dony Wicaksono', '2', 'Malang', 'Laki-Laki', 'dpo vega.jpg', '1234'),
('170403020049', 'alfrizal', '1', 'mergan', 'Laki-Laki', 'sarpras kaffani sekretaris.jpg', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matapraktikum`
--

CREATE TABLE `tbl_matapraktikum` (
  `kode_mp` varchar(5) NOT NULL,
  `nama_mp` varchar(30) NOT NULL,
  `kode_jurusan` varchar(5) NOT NULL,
  `kode_ta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matapraktikum`
--

INSERT INTO `tbl_matapraktikum` (`kode_mp`, `nama_mp`, `kode_jurusan`, `kode_ta`) VALUES
('1', 'Pemrograman Web', '1', '2'),
('10', 'Smart Technology', '2', '2'),
('11', 'web', '1', 'genap2018/2019'),
('2', 'Mobile Computing 1', '1', '2'),
('3', 'Audio Video Editing', '2', '1'),
('4', 'Pemrograman Web Dasar', '1', '2'),
('5', 'Jaringan Komputer', '1', '2'),
('6', 'Basis Data', '2', '2'),
('7', 'Perancangan Web', '2', '2'),
('8', 'Animasi 3d', '2', '1'),
('9', 'Pemrograman Lanjut', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `kode_materi` varchar(6) NOT NULL,
  `nama_materi` varchar(30) NOT NULL,
  `kode_mp` varchar(5) NOT NULL,
  `kode_ta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_materi`
--

INSERT INTO `tbl_materi` (`kode_materi`, `nama_materi`, `kode_mp`, `kode_ta`) VALUES
('1', 'OOP', '1', ''),
('2', 'Layout ', '2', ''),
('3', 'css', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `kode_nilai` tinyint(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `nilai` tinyint(12) NOT NULL,
  `kode_jn` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`kode_nilai`, `keterangan`, `nilai`, `kode_jn`) VALUES
(1, 'aaa', 80, '1'),
(2, 'sss', 80, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `kode_penilaian` varchar(6) NOT NULL,
  `kode_penjadwalan_mhs` varchar(10) NOT NULL,
  `kode_nilai` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`kode_penilaian`, `kode_penjadwalan_mhs`, `kode_nilai`) VALUES
('1', '1', 1),
('2', '2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjadwalan`
--

CREATE TABLE `tbl_penjadwalan` (
  `kode_jadwal_praktikum` int(11) NOT NULL,
  `kode_mp` varchar(5) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `kode_asprak` varchar(12) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kode_jam` tinyint(5) NOT NULL,
  `kode_lab` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjadwalan`
--

INSERT INTO `tbl_penjadwalan` (`kode_jadwal_praktikum`, `kode_mp`, `kode_kelas`, `kode_asprak`, `hari`, `kode_jam`, `kode_lab`) VALUES
(1, '1', '1', 't12019', 'Senin', 7, 'apk2'),
(2, '1', '1', 't22019', 'Selasa', 7, 'apk3'),
(3, '1', '1', 't22019', 'Selasa', 7, 'apk1'),
(57, '2', '2', 't62014', 'Rabu', 5, 'apk2'),
(60, '6', '2', 't42016', 'Kamis', 4, 'jakom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_request`
--

CREATE TABLE `tbl_request` (
  `kode_request` int(11) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `request` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruanglab`
--

CREATE TABLE `tbl_ruanglab` (
  `kode_lab` varchar(5) NOT NULL,
  `nama_lab` varchar(30) NOT NULL,
  `kapasitas_lab` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ruanglab`
--

INSERT INTO `tbl_ruanglab` (`kode_lab`, `nama_lab`, `kapasitas_lab`) VALUES
('apk1', 'aplikasi 1', 30),
('apk2', 'aplikasi 2', 25),
('apk3', 'aplikasi 3', 15),
('jakom', 'jaringan komputer', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rumus`
--

CREATE TABLE `tbl_rumus` (
  `kode_rumus` varchar(6) NOT NULL,
  `jumlah_kehadiran` tinyint(5) NOT NULL,
  `persentase_uas` int(11) NOT NULL,
  `persentase_uts` int(11) NOT NULL,
  `persentase_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rumus`
--

INSERT INTO `tbl_rumus` (`kode_rumus`, `jumlah_kehadiran`, `persentase_uas`, `persentase_uts`, `persentase_tugas`) VALUES
('1', 10, 20, 30, 40),
('2', 5, 25, 30, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `kode_ta` varchar(20) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ta`
--

INSERT INTO `tbl_ta` (`kode_ta`, `semester`, `tahun`) VALUES
('1', 'ganjil', '2019'),
('2', 'genap', '2019'),
('genap2018/2019', 'genap', '2018/2019');

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_krp`
--
DROP TABLE IF EXISTS `tabel_krp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_krp`  AS  select `tbl_krp`.`kode_penjadwalan_mhs` AS `kode_penjadwalan_mhs`,`tbl_krp`.`npm` AS `npm`,`tabel_penjadwalan`.`kode_jadwal_praktikum` AS `kode_jadwal_praktikum`,`tabel_penjadwalan`.`kode_mp` AS `kode_mp`,`tabel_penjadwalan`.`kode_kelas` AS `kode_kelas`,`tabel_penjadwalan`.`kode_asprak` AS `kode_asprak`,`tabel_penjadwalan`.`hari` AS `hari`,`tabel_penjadwalan`.`kode_jam` AS `kode_jam`,`tabel_penjadwalan`.`kode_lab` AS `kode_lab`,`tabel_penjadwalan`.`nama_mp` AS `nama_mp`,`tabel_penjadwalan`.`kode_jurusan` AS `kode_jurusan`,`tabel_penjadwalan`.`nama_kelas` AS `nama_kelas`,`tabel_penjadwalan`.`nama_asprak` AS `nama_asprak`,`tabel_penjadwalan`.`jam_mulai` AS `jam_mulai`,`tabel_penjadwalan`.`jam_akhir` AS `jam_akhir`,`tabel_penjadwalan`.`nama_lab` AS `nama_lab`,`tabel_penjadwalan`.`kapasitas_lab` AS `kapasitas_lab` from (`tbl_krp` join `tabel_penjadwalan` on((`tbl_krp`.`kode_jadwal_praktikum` = `tabel_penjadwalan`.`kode_jadwal_praktikum`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_penjadwalan`
--
DROP TABLE IF EXISTS `tabel_penjadwalan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_penjadwalan`  AS  select `tbl_penjadwalan`.`kode_jadwal_praktikum` AS `kode_jadwal_praktikum`,`tbl_penjadwalan`.`kode_mp` AS `kode_mp`,`tbl_penjadwalan`.`kode_kelas` AS `kode_kelas`,`tbl_penjadwalan`.`kode_asprak` AS `kode_asprak`,`tbl_penjadwalan`.`hari` AS `hari`,`tbl_penjadwalan`.`kode_jam` AS `kode_jam`,`tbl_penjadwalan`.`kode_lab` AS `kode_lab`,`tbl_matapraktikum`.`nama_mp` AS `nama_mp`,`tbl_matapraktikum`.`kode_jurusan` AS `kode_jurusan`,`tbl_kelas`.`nama_kelas` AS `nama_kelas`,`tbl_asprak`.`nama_asprak` AS `nama_asprak`,`tbl_jam`.`jam_mulai` AS `jam_mulai`,`tbl_jam`.`jam_akhir` AS `jam_akhir`,`tbl_ruanglab`.`nama_lab` AS `nama_lab`,`tbl_ruanglab`.`kapasitas_lab` AS `kapasitas_lab` from (((((`tbl_penjadwalan` join `tbl_matapraktikum` on((`tbl_penjadwalan`.`kode_mp` = `tbl_matapraktikum`.`kode_mp`))) join `tbl_kelas` on((`tbl_penjadwalan`.`kode_kelas` = `tbl_kelas`.`kode_kelas`))) join `tbl_asprak` on((`tbl_penjadwalan`.`kode_asprak` = `tbl_asprak`.`kode_asprak`))) join `tbl_jam` on((`tbl_penjadwalan`.`kode_jam` = `tbl_jam`.`kode_jam`))) join `tbl_ruanglab` on((`tbl_penjadwalan`.`kode_lab` = `tbl_ruanglab`.`kode_lab`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_aktivasi`
--
ALTER TABLE `tbl_aktivasi`
  ADD PRIMARY KEY (`kode_aktivasi`),
  ADD KEY `npm` (`npm`);

--
-- Indeks untuk tabel `tbl_asprak`
--
ALTER TABLE `tbl_asprak`
  ADD PRIMARY KEY (`kode_asprak`);

--
-- Indeks untuk tabel `tbl_detail_materi`
--
ALTER TABLE `tbl_detail_materi`
  ADD PRIMARY KEY (`kode_detail_materi`),
  ADD KEY `kode_materi` (`kode_materi`);

--
-- Indeks untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  ADD PRIMARY KEY (`kode_jam`);

--
-- Indeks untuk tabel `tbl_jenis_nilai`
--
ALTER TABLE `tbl_jenis_nilai`
  ADD PRIMARY KEY (`kode_jn`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `tbl_krp`
--
ALTER TABLE `tbl_krp`
  ADD PRIMARY KEY (`kode_penjadwalan_mhs`),
  ADD KEY `npm` (`npm`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indeks untuk tabel `tbl_matapraktikum`
--
ALTER TABLE `tbl_matapraktikum`
  ADD PRIMARY KEY (`kode_mp`),
  ADD KEY `kode_jurusan` (`kode_jurusan`),
  ADD KEY `kode_ta` (`kode_ta`);

--
-- Indeks untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`kode_materi`),
  ADD KEY `kode_mp` (`kode_mp`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indeks untuk tabel `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`kode_penilaian`),
  ADD KEY `kode_penjadwalan_mhs` (`kode_penjadwalan_mhs`),
  ADD KEY `kode_nilai` (`kode_nilai`);

--
-- Indeks untuk tabel `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  ADD PRIMARY KEY (`kode_jadwal_praktikum`),
  ADD KEY `kode_mp` (`kode_mp`),
  ADD KEY `kode_asprak` (`kode_asprak`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_jam` (`kode_jam`),
  ADD KEY `kode_jadwal_praktikum` (`kode_jadwal_praktikum`),
  ADD KEY `kode_lab` (`kode_lab`);

--
-- Indeks untuk tabel `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`kode_request`);

--
-- Indeks untuk tabel `tbl_ruanglab`
--
ALTER TABLE `tbl_ruanglab`
  ADD PRIMARY KEY (`kode_lab`);

--
-- Indeks untuk tabel `tbl_rumus`
--
ALTER TABLE `tbl_rumus`
  ADD PRIMARY KEY (`kode_rumus`);

--
-- Indeks untuk tabel `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`kode_ta`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_aktivasi`
--
ALTER TABLE `tbl_aktivasi`
  MODIFY `kode_aktivasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_materi`
--
ALTER TABLE `tbl_detail_materi`
  MODIFY `kode_detail_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jam`
--
ALTER TABLE `tbl_jam`
  MODIFY `kode_jam` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_nilai`
--
ALTER TABLE `tbl_jenis_nilai`
  MODIFY `kode_jn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_krp`
--
ALTER TABLE `tbl_krp`
  MODIFY `kode_penjadwalan_mhs` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  MODIFY `kode_jadwal_praktikum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `kode_request` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detail_materi`
--
ALTER TABLE `tbl_detail_materi`
  ADD CONSTRAINT `tbl_detail_materi_ibfk_1` FOREIGN KEY (`kode_materi`) REFERENCES `tbl_materi` (`kode_materi`);

--
-- Ketidakleluasaan untuk tabel `tbl_krp`
--
ALTER TABLE `tbl_krp`
  ADD CONSTRAINT `tbl_krp_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `tbl_mahasiswa` (`npm`);

--
-- Ketidakleluasaan untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD CONSTRAINT `tbl_mahasiswa_ibfk_1` FOREIGN KEY (`kode_jurusan`) REFERENCES `tbl_jurusan` (`kode_jurusan`);

--
-- Ketidakleluasaan untuk tabel `tbl_matapraktikum`
--
ALTER TABLE `tbl_matapraktikum`
  ADD CONSTRAINT `tbl_matapraktikum_ibfk_1` FOREIGN KEY (`kode_ta`) REFERENCES `tbl_ta` (`kode_ta`),
  ADD CONSTRAINT `tbl_matapraktikum_ibfk_2` FOREIGN KEY (`kode_jurusan`) REFERENCES `tbl_jurusan` (`kode_jurusan`);

--
-- Ketidakleluasaan untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD CONSTRAINT `tbl_materi_ibfk_1` FOREIGN KEY (`kode_mp`) REFERENCES `tbl_matapraktikum` (`kode_mp`);

--
-- Ketidakleluasaan untuk tabel `tbl_penjadwalan`
--
ALTER TABLE `tbl_penjadwalan`
  ADD CONSTRAINT `tbl_penjadwalan_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `tbl_kelas` (`kode_kelas`),
  ADD CONSTRAINT `tbl_penjadwalan_ibfk_3` FOREIGN KEY (`kode_asprak`) REFERENCES `tbl_asprak` (`kode_asprak`),
  ADD CONSTRAINT `tbl_penjadwalan_ibfk_4` FOREIGN KEY (`kode_mp`) REFERENCES `tbl_matapraktikum` (`kode_mp`),
  ADD CONSTRAINT `tbl_penjadwalan_ibfk_5` FOREIGN KEY (`kode_jam`) REFERENCES `tbl_jam` (`kode_jam`),
  ADD CONSTRAINT `tbl_penjadwalan_ibfk_6` FOREIGN KEY (`kode_lab`) REFERENCES `tbl_ruanglab` (`kode_lab`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
