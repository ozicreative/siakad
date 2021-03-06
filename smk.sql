-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 08:47 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nuptk` varchar(30) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `kelahiran` varchar(255) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nuptk`, `nama_guru`, `kelahiran`, `tgl_lhr`, `active`) VALUES
(1, '1361766667300023', 'Anita Rohmah, S.Pd', 'Bojonegoro', '1988-10-29', '1'),
(2, '1639741643200042', 'Drs. Chudhori, MM', 'Bojonegoro', '1963-03-07', '1'),
(3, '6742742644200022', 'Drs. H. Muhtarom', 'Bojonegoro', '1964-06-10', '1'),
(4, '1634742643200022', 'Drs. Mukardi, MM', 'Bojonegoro', '1964-03-02', '1'),
(5, '2542742648200003', 'Drs. Sutryo', 'Jombang', '1964-03-02', '1'),
(6, '', 'Endang Sulistyowati, S.Pd', 'Bojonegoro', '1988-09-23', '1'),
(7, '9341763665300073', 'Isnaini Yubariah, S.Pd', 'Bojonegoro', '1985-09-10', '1'),
(8, '2638742645200002', 'Khoiril Anam S.pd', 'Lamongan', '1963-04-06', '1'),
(9, '2463754655300062', 'Lilik Januwinarti, S.Pd', 'Bojonegoro', '1976-01-31', '1'),
(10, '2533760662200053', 'M. Ady Susanto, SE', 'Bojonegoro', '1982-12-10', '1'),
(11, '2544748653200003', 'M. Hasyim, S.Pd', 'Bojonegoro', '1970-12-12', '1'),
(12, '2342752656200013', 'Misbakul Munir, S.Pd', 'Bojonegoro', '1974-10-10', '1'),
(13, '3842763664200062', 'Moh Hadi Mustofa', 'Bojonegoro', '1985-05-10', '1'),
(14, '2433759659300062', 'Ririn Nur Azizah, SE', 'Bojonegoro', '1981-01-01', '1'),
(15, '9434767668110012', 'Saiful As\'ari', 'Bojonegoro', '1989-01-02', '1'),
(16, '8855760661303332', 'Siti Thoyibah, S.pd', 'Bojonegoro', '1982-05-23', '1'),
(17, '5857747649200012', 'Suyitno, S.Pd', 'Bojonegoro', '1969-05-25', '1'),
(18, '6652764665200042', 'Zaenuri, S.Pd', 'Bojonegoro', '1986-03-20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kelas_id`, `pelajaran_id`, `guru_id`, `hari`, `mulai`, `selesai`, `active`) VALUES
(1, 11, 4, 7, 'Senin', '07:30:00', '09:30:00', '1'),
(2, 11, 5, 13, 'Senin', '09:30:00', '10:10:00', '1'),
(3, 11, 2, 18, 'Senin', '10:30:00', '11:50:00', '1'),
(4, 11, 1, 14, 'Senin', '12:10:00', '13:20:00', '1'),
(5, 6, 6, 14, 'Senin', '07:30:00', '08:50:00', '1'),
(6, 6, 7, 1, 'Senin', '08:50:00', '10:10:00', '1'),
(7, 6, 1, 14, 'Senin', '10:30:00', '11:50:00', '1'),
(8, 6, 2, 18, 'Senin', '12:10:00', '13:20:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kbm`
--

CREATE TABLE `kbm` (
  `id_kbm` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(255) NOT NULL,
  `t_hadir` int(8) NOT NULL,
  `t_tdkhadir` int(8) NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kbm`
--

INSERT INTO `kbm` (`id_kbm`, `jadwal_id`, `tanggal`, `materi`, `t_hadir`, `t_tdkhadir`, `active`) VALUES
(1, 1, '2019-09-02', 'English Beginner', 15, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `key_kehadiran` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_kehadiran`, `key_kehadiran`, `siswa_id`, `kelas_id`, `tanggal`, `status`, `keterangan`) VALUES
(1, '5fc2572bef504', 1, 11, '2019-09-23', 'MASUK', NULL),
(2, '5fc2572bef504', 3, 11, '2019-09-23', 'MASUK', NULL),
(3, '5fc2572bef504', 4, 11, '2019-09-23', 'MASUK', NULL),
(4, '5fc2572bef504', 5, 11, '2019-09-23', 'MASUK', NULL),
(5, '5fc2572bef504', 6, 11, '2019-09-23', 'MASUK', NULL),
(6, '5fc2572bef504', 7, 11, '2019-09-23', 'MASUK', NULL),
(7, '5fc2572bef504', 8, 11, '2019-09-23', 'MASUK', NULL),
(8, '5fc2572bef504', 9, 11, '2019-09-23', 'MASUK', NULL),
(9, '5fc2572bef504', 10, 11, '2019-09-23', 'MASUK', NULL),
(10, '5fc2572bef504', 11, 11, '2019-09-23', 'MASUK', NULL),
(11, '5fc2572bef504', 12, 11, '2019-09-23', 'MASUK', NULL),
(12, '5fc2572bef504', 13, 11, '2019-09-23', 'MASUK', NULL),
(13, '5fc2572bef504', 14, 11, '2019-09-23', 'MASUK', NULL),
(14, '5fc2572bef504', 15, 11, '2019-09-23', 'MASUK', NULL),
(15, '5fc2572bef504', 16, 11, '2019-09-23', 'MASUK', NULL),
(16, '5fc2572bef504', 17, 11, '2019-09-23', 'MASUK', NULL),
(17, '5fc2572bef504', 18, 11, '2019-09-23', 'MASUK', NULL),
(18, '5fc2572bef504', 19, 11, '2019-09-23', 'MASUK', NULL),
(19, '5fc25747a7b89', 2, 6, '2019-09-23', 'MASUK', NULL),
(20, '5fc25747a7b89', 31, 6, '2019-09-23', 'MASUK', NULL),
(21, '5fc25747a7b89', 32, 6, '2019-09-23', 'MASUK', NULL),
(22, '5fc25747a7b89', 33, 6, '2019-09-23', 'MASUK', NULL),
(23, '5fc25747a7b89', 34, 6, '2019-09-23', 'MASUK', NULL),
(24, '5fc25747a7b89', 35, 6, '2019-09-23', 'MASUK', NULL),
(25, '5fc25747a7b89', 36, 6, '2019-09-23', 'MASUK', NULL),
(26, '5fc25747a7b89', 37, 6, '2019-09-23', 'MASUK', NULL),
(27, '5fc25747a7b89', 38, 6, '2019-09-23', 'MASUK', NULL),
(28, '5fc25747a7b89', 39, 6, '2019-09-23', 'MASUK', NULL),
(29, '5fc25747a7b89', 40, 6, '2019-09-23', 'MASUK', NULL),
(30, '5fc25747a7b89', 41, 6, '2019-09-23', 'MASUK', NULL),
(31, '5fc25747a7b89', 42, 6, '2019-09-23', 'MASUK', NULL),
(32, '5fc25747a7b89', 43, 6, '2019-09-23', 'MASUK', NULL),
(33, '5fc25747a7b89', 44, 6, '2019-09-23', 'MASUK', NULL),
(34, '5fc25747a7b89', 45, 6, '2019-09-23', 'MASUK', NULL),
(35, '5fc25747a7b89', 46, 6, '2019-09-23', 'MASUK', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `lvl_kelas` varchar(3) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `lvl_kelas`, `active`) VALUES
(1, 'Tehnik Informasi', 'X', '1'),
(2, 'Tehnik Komputer', 'X', '1'),
(3, 'Tehnik Otomotif', 'X', '1'),
(4, 'Tehnik Informasi', 'XI', '1'),
(5, 'Tehnik Komputer', 'XI', '1'),
(6, 'Tehnik Otomotif', 'XI', '1'),
(8, 'Tehnik Informasi', 'XII', '1'),
(9, 'Tehnik Komputer', 'XII', '1'),
(10, 'Tehnik Otomotif', 'XII', '1'),
(11, 'Bisnis dan Manajemen', 'X', '1'),
(12, 'Bisnis dan Manajemen', 'XI', '1'),
(13, 'Bisnis dan Manajemen', 'XII', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelassiswa` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `periode` int(4) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelassiswa`, `siswa_id`, `kelas_id`, `periode`, `active`) VALUES
(1, 1, 11, 2019, '1'),
(2, 2, 6, 2019, '1'),
(3, 3, 11, 2019, '1'),
(4, 4, 11, 2019, '1'),
(5, 5, 11, 2019, '1'),
(6, 6, 11, 2019, '1'),
(7, 7, 11, 2019, '1'),
(8, 8, 11, 2019, '1'),
(9, 9, 11, 2019, '1'),
(10, 10, 11, 2019, '1'),
(11, 11, 11, 2019, '1'),
(12, 12, 11, 2019, '1'),
(13, 13, 11, 2019, '1'),
(14, 14, 11, 2019, '1'),
(15, 15, 11, 2019, '1'),
(16, 16, 11, 2019, '1'),
(17, 17, 11, 2019, '1'),
(18, 18, 11, 2019, '1'),
(19, 19, 11, 2019, '1'),
(20, 20, 12, 2019, '1'),
(21, 21, 12, 2019, '1'),
(22, 22, 12, 2019, '1'),
(23, 23, 12, 2019, '1'),
(24, 24, 12, 2019, '1'),
(25, 25, 12, 2019, '1'),
(26, 26, 12, 2019, '1'),
(27, 27, 12, 2019, '1'),
(28, 28, 12, 2019, '1'),
(29, 29, 12, 2019, '1'),
(30, 30, 12, 2019, '1'),
(31, 31, 6, 2019, '1'),
(32, 32, 6, 2019, '1'),
(33, 33, 6, 2019, '1'),
(34, 34, 6, 2019, '1'),
(35, 35, 6, 2019, '1'),
(36, 36, 6, 2019, '1'),
(37, 37, 6, 2019, '1'),
(38, 38, 6, 2019, '1'),
(39, 39, 6, 2019, '1'),
(40, 40, 6, 2019, '1'),
(41, 41, 6, 2019, '1'),
(42, 42, 6, 2019, '1'),
(43, 43, 6, 2019, '1'),
(44, 44, 6, 2019, '1'),
(45, 45, 6, 2019, '1'),
(46, 46, 6, 2019, '1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `key_nilai` varchar(255) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `total_nilai` int(3) NOT NULL,
  `pelajaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `key_nilai`, `siswa_id`, `kelas_id`, `tanggal`, `jenis`, `total_nilai`, `pelajaran_id`) VALUES
(1, '5fc4d4f23a6d1', 1, 11, '2019-09-23', 'UTS', 80, 4),
(2, '5fc4d4f23a6d1', 3, 11, '2019-09-23', 'UTS', 0, 4),
(3, '5fc4d4f23a6d1', 4, 11, '2019-09-23', 'UTS', 85, 4),
(4, '5fc4d4f23a6d1', 5, 11, '2019-09-23', 'UTS', 0, 4),
(5, '5fc4d4f23a6d1', 6, 11, '2019-09-23', 'UTS', 60, 4),
(6, '5fc4d4f23a6d1', 7, 11, '2019-09-23', 'UTS', 0, 4),
(7, '5fc4d4f23a6d1', 8, 11, '2019-09-23', 'UTS', 65, 4),
(8, '5fc4d4f23a6d1', 9, 11, '2019-09-23', 'UTS', 0, 4),
(9, '5fc4d4f23a6d1', 10, 11, '2019-09-23', 'UTS', 0, 4),
(10, '5fc4d4f23a6d1', 11, 11, '2019-09-23', 'UTS', 70, 4),
(11, '5fc4d4f23a6d1', 12, 11, '2019-09-23', 'UTS', 0, 4),
(12, '5fc4d4f23a6d1', 13, 11, '2019-09-23', 'UTS', 75, 4),
(13, '5fc4d4f23a6d1', 14, 11, '2019-09-23', 'UTS', 0, 4),
(14, '5fc4d4f23a6d1', 15, 11, '2019-09-23', 'UTS', 90, 4),
(15, '5fc4d4f23a6d1', 16, 11, '2019-09-23', 'UTS', 0, 4),
(16, '5fc4d4f23a6d1', 17, 11, '2019-09-23', 'UTS', 55, 4),
(17, '5fc4d4f23a6d1', 18, 11, '2019-09-23', 'UTS', 0, 4),
(18, '5fc4d4f23a6d1', 19, 11, '2019-09-23', 'UTS', 95, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` varchar(255) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`, `active`) VALUES
(1, 'Matematika', '1'),
(2, 'Agama Islam', '1'),
(3, 'Komputer', '1'),
(4, 'Bahasa Inggris', '1'),
(5, 'Penjaskes', '1'),
(6, 'Kimia dan Fisika', '1'),
(7, 'Bahasa Jawa', '1'),
(8, 'Akuntansi', '1'),
(9, 'Bahasa Indonesia', '1'),
(10, 'Seni Budaya', '1'),
(11, 'Aswaja', '1'),
(12, 'Kewirausahaan', '1'),
(13, 'Sejarah', '1'),
(14, 'Pengantar Akuntansi, Ekonomi dan Bisnis', '1'),
(15, 'Pengantar Administrasi Perkantoran', '1'),
(16, 'Pengelolaan Dokumen Transaksi', '1'),
(17, 'Pengelolaan KAS', '1'),
(18, 'Pemeliharaan Chasing Sepeda Motor', '1'),
(19, 'Pemeliharaan Kelistrikan Sepeda Motor', '1'),
(20, 'Pemeliharaan Mesin Sepeda Motor', '1'),
(21, 'Pengembangan Produk Kreatif', '1');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `kelahiran` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nisn`, `alamat`, `tgl_lhr`, `kelahiran`, `gender`, `active`) VALUES
(1, 'Novia Widia Ningsih', '375/375.119', 'Ngrandu, Jipo', '2002-08-29', 'Banyumas', 'P', '1'),
(2, 'M. Khoirul Anwar', '373/373.115', 'Kendal', '2001-07-22', 'Bojonegoro', 'L', '1'),
(3, 'Insaniatus Sholihah', '376/376.119', 'Budug, Mudung', '2002-07-11', 'Bojonegoro', 'P', '1'),
(4, 'Muhimmatur Rosidah', '377/377.119', 'Prayungan, Lamongan', '2002-03-03', 'Lamongan', 'P', '1'),
(5, 'Heni Safitri', '378/378.119', 'Kedungwaras, Lamongan', '2002-12-21', 'Lamongan', 'P', '1'),
(6, 'Siti Asrofah', '379/379.119', 'Jipo, Kepohbaru', '2003-08-06', 'Bojonegoro', 'P', '1'),
(7, 'Siti Nur Hidayah S.M.S', '380/380.119', 'Mudung, Kepohbaru', '2003-05-06', 'Bojonegoro', 'P', '1'),
(8, 'M. Faiz Nasrullah', '383/383.119', 'Ngrandu, Jipo', '2003-12-07', 'Bojonegoro', 'L', '1'),
(9, 'Fitri', '381/381.119', 'Kajangan', '2003-01-17', 'Tuban', 'P', '1'),
(10, 'M. Toriqul Ihsan', '384/384.119', 'Kendal, Jipo', '2003-07-16', 'Bojonegoro', 'L', '1'),
(11, 'M. Andrian Majid', '385/385.119', 'Jipo, Kepohbaru', '2003-09-30', 'Bojonegoro', 'L', '1'),
(12, 'Ahmad Fiky Ramadhoni', '386/386.119', 'Jipo, Kepohbaru', '2003-11-16', 'Bojonegoro', 'L', '1'),
(13, 'M. Nur Afid', '387/387.119', 'Jipo, Kepohbaru', '2003-02-08', 'Bojonegoro', 'L', '1'),
(14, 'M. Ikhsan', '389/389.119', 'Tlanak, Mudung', '2002-05-18', 'Bojonegoro', 'L', '1'),
(15, 'Ahmad Ali Fauzi', '390/390.119', 'Tlanak, Mudung', '2002-06-03', 'Bojonegoro', 'L', '1'),
(16, 'Elli Fadhilah', '391/391.119', 'Budug, Mudung', '2002-03-05', 'Bojonegoro', 'P', '1'),
(17, 'Bagus Budiman', '382/382.119', 'Granggonanyar', '2002-12-22', 'Bojonegoro', 'L', '1'),
(18, 'M. Firman Islamuddin', '392/392.119', 'Granggonanyar', '2001-10-05', 'Ketapang', 'L', '1'),
(19, 'Agung Samudra', '393/393.119', 'Temu, Kerangkong', '2002-02-15', 'Bojonegoro', 'L', '1'),
(20, 'Elsa Maulida S.', '359/359.119', 'Budug, Mudung', '2001-06-05', 'Bojonegoro', 'P', '1'),
(21, 'Siti Khanifah', '360/360.119', 'Dayu', '2000-01-20', 'Bojonegoro', 'P', '1'),
(22, 'Zumrotus S.', '361/361.119', 'Songaran', '2001-06-19', 'Bojonegoro', 'P', '1'),
(23, 'Ilma Fitrotun Zuhria', '362/362.119', 'Sembung', '2003-01-11', 'Bojonegoro', 'P', '1'),
(24, 'Zunita', '364/364.119', 'Sembung', '2003-04-15', 'Bojonegoro', 'P', '1'),
(25, 'Nor Kholisotin N.', '366/366.119', 'Budug, Mudung', '2000-10-05', 'Bojonegoro', 'P', '1'),
(26, 'Firda Zuliana', '367/367.119', 'Kendal, Jipo', '2000-07-27', 'Bojonegoro', 'P', '1'),
(27, 'Shelin Elsza Putri', '368/368.119', 'Songaran', '2002-04-15', 'Bojonegoro', 'P', '1'),
(28, 'Qaid Nur Laila', '370/370.119', 'Kepohbaru', '2001-06-08', 'Bojonegoro', 'P', '1'),
(30, 'Wardiana Adinda Putri', '371/371.119', 'Bumirejo', '2000-04-28', 'Bojonegoro', 'P', '1'),
(31, 'Adam M Alfanzi', '374/374.115', 'Kendal, Jipo', '2001-12-15', 'Bojonegoro', 'L', '1'),
(32, 'Fery Irawan', '375/375.115', 'Budug, Mudung', '2002-06-26', 'Bojonegoro', 'L', '1'),
(33, 'Danang Yoga P.', '376/376.115', 'Budug, Mudung', '2002-05-18', 'Bojonegoro', 'L', '1'),
(34, 'Dani Yogi P.', '377/377.115', 'Budug, Mudung', '2002-05-18', 'Bojonegoro', 'L', '1'),
(35, 'M. Teguh Irwanto', '378/378.115', 'Budug, Mudung', '2000-09-13', 'Bojonegoro', 'L', '1'),
(36, 'A. Fikri Nur Sya\'bani', '379/379.115', 'Budug, Mudung', '2001-10-24', 'Bojonegoro', 'L', '1'),
(37, 'M. Indra Rama A.', '380/380.115', 'Kendal, Jipo', '2002-02-19', 'Bojonegoro', 'L', '1'),
(38, 'M. Alfaris', '381/381.115', 'Paloh', '2002-02-17', 'Bojonegoro', 'L', '1'),
(39, 'Nanda Syahrul A.', '382/382.115', 'Budug, Mudung', '2003-10-24', 'Bojonegoro', 'L', '1'),
(40, 'M. Khafidzul Mujib', '383/383.119', 'Jipo, Kepohbaru', '2002-03-30', 'Bojonegoro', 'L', '1'),
(41, 'A. Adib Muzaki', '384/384.115', 'Budug, Mudung', '2002-01-19', 'Bojonegoro', 'L', '1'),
(42, 'M. Fatoni', '385/385.115', 'Jipo, Kepohbaru', '2000-05-09', 'Bojonegoro', 'L', '1'),
(43, 'M. Ali Sihabur R.', '386/386.115', 'Tlanak, Mudung', '2001-07-04', 'Bojonegoro', 'L', '1'),
(44, 'M. Dwi Afendi', '387/387.115', 'Tlanak, Mudung', '2001-10-24', 'Bojonegoro', 'L', '1'),
(45, 'M. Budi Saputra Hari', '388/388.115', 'Jipo, Kepohbaru', '2002-02-19', 'Bojonegoro', 'L', '1'),
(46, 'M. Adimas Setya P.', '389/389.115', 'Jipo, Kepohbaru', '2002-02-17', 'Bojonegoro', 'L', '1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Guru'),
(4, 'Kepala Sekolah'),
(5, 'Siswa'),
(6, 'Wali Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_active`
--

CREATE TABLE `tbl_active` (
  `id_active` int(11) NOT NULL,
  `nama_active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_active`
--

INSERT INTO `tbl_active` (`id_active`, `nama_active`) VALUES
(1, 'Aktif'),
(2, 'Nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updatedby` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `level` int(1) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `email`, `img`, `createdby`, `created_at`, `updatedby`, `updated_at`, `level`, `active`) VALUES
(1, 'Rozi', 'superadmin', '$2y$10$YTG76BgBov8kPcL6DYssVuhIL5spkw.YM1QKsFaRlq9no6PH7CXcW', 'root@admin.com', 'default.png', '', '2020-11-20 00:00:00', '', '2020-11-20 00:00:00', 1, 1),
(2, 'Nisa', 'admin', 'admin', 'nisa@admin.com', 'default.png', '', '2020-11-20 00:00:00', 'Rozi', '2020-11-20 00:00:00', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`id_kbm`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelassiswa`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_active`
--
ALTER TABLE `tbl_active`
  ADD PRIMARY KEY (`id_active`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id_kbm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelassiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_active`
--
ALTER TABLE `tbl_active`
  MODIFY `id_active` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
