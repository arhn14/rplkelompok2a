-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jun 2016 pada 11.31
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datarapat`
--

CREATE TABLE IF NOT EXISTS `datarapat` (
`id_datarapat` int(11) NOT NULL,
  `id_rapat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data untuk tabel `datarapat`
--

INSERT INTO `datarapat` (`id_datarapat`, `id_rapat`, `id_user`) VALUES
(49, 82, 123213),
(50, 82, 8888877),
(51, 82, 3455),
(52, 83, 8888877),
(57, 86, 123213),
(58, 86, 8888877),
(59, 90, 123213),
(60, 90, 8888877),
(61, 90, 3455);

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_date` date NOT NULL,
  `total_events` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`event_date`, `total_events`) VALUES
('2016-06-05', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_detail`
--

CREATE TABLE IF NOT EXISTS `event_detail` (
`idevent` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `event_detail`
--

INSERT INTO `event_detail` (`idevent`, `event_date`, `event_time`, `event`) VALUES
(1, '2016-06-05', '07:18:17', 'a'),
(2, '2016-06-05', '06:00:00', 'h');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalkosong`
--

CREATE TABLE IF NOT EXISTS `jadwalkosong` (
`id_jadwal` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `jadwalkosong`
--

INSERT INTO `jadwalkosong` (`id_jadwal`, `id_user`, `tanggal`, `shift`) VALUES
(5, '3455', '2016-12-31', '23:59:00'),
(6, '3455', '2016-09-27', '22:59:00'),
(8, '345', '2016-12-31', '00:59:00'),
(9, '345', '2016-01-01', '00:00:00'),
(10, '123213', '2016-12-31', '23:59:00'),
(11, '3455', '2016-12-29', '23:59:00'),
(12, '3455', '2016-06-07', '23:59:00'),
(13, '123213', '2016-06-07', '23:59:00'),
(17, '123', '0000-00-00', '10:10:00'),
(20, '3455', '0000-00-00', '13:00:00'),
(21, '3455', '0000-00-00', '13:00:00'),
(22, '3455', '0000-00-00', '13:00:00'),
(24, '8888877', '0000-00-00', '10:10:00'),
(26, '8888877', '0000-00-00', '13:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapat`
--

CREATE TABLE IF NOT EXISTS `rapat` (
`id_rapat` int(11) NOT NULL,
  `perihal` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(10) NOT NULL,
  `shift` time NOT NULL,
  `keterangan` text NOT NULL,
  `hasil` text NOT NULL,
  `undangan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data untuk tabel `rapat`
--

INSERT INTO `rapat` (`id_rapat`, `perihal`, `status`, `tanggal`, `hari`, `shift`, `keterangan`, `hasil`, `undangan`) VALUES
(78, 'Rapat Penentuan Jadwal UAS', 'belum', '2016-12-31', '', '23:59:00', 'erfq', '', ''),
(82, 'rapat akhir', 'selesai', '0000-00-00', '', '00:00:07', '<p>rar mbg</p>', '', ''),
(83, 'aya', 'selesai', '0000-00-00', '', '13:00:00', '<p>ytaciurtguiv btgiwe</p>', '', ''),
(86, 'ayaaaaa', 'selesai', '0000-00-00', '', '10:00:00', '<p>fdkuhgsdjkbs</p>', '', ''),
(89, 'wandra1', 'selesai', '0000-00-00', '', '10:00:00', 'dfsdglstowkg', '', ''),
(90, 'krs', 'selesai', '0000-00-00', '', '10:00:00', '<p>ayafstsishnsknkjkj</p>', '', ''),
(91, 'kkk', 'selesai', '0000-00-00', '', '10:10:00', '<p>rapat ini akan dilaksanakan</p>', '', ''),
(92, 'kkk', 'selesai', '0000-00-00', '', '10:10:00', 'rapat ini akan dilaksanakan', '', ''),
(93, 'aya lagi', 'selesai', '0000-00-00', '', '10:10:00', 'ayayayayayay', '', ''),
(94, 'aya lagi', 'selesai', '0000-00-00', '', '10:10:00', 'ayayayayayay', '', ''),
(95, 'agigigi', 'selesai', '0000-00-00', '', '10:00:00', 'agjsbjkuyshgvshgshgshbshgshkgshkgsjkhgasjkgkh', '', ''),
(96, 'agigigi', 'selesai', '0000-00-00', '', '10:00:00', 'agjsbjkuyshgvshgshgshbshgshkgshkgsjkhgasjkgkh', '', ''),
(97, 'agigigi', 'selesai', '0000-00-00', '', '10:00:00', 'agjsbjkuyshgvshgshgshbshgshkgshkgsjkhgasjkgkh', '', ''),
(98, 'agigigi', 'selesai', '0000-00-00', '', '10:00:00', 'agjsbjkuyshgvshgshgshbshgshkgshkgsjkhgasjkgkh', '', ''),
(99, 'agigigi', 'belum', '0000-00-00', '', '10:00:00', 'agjsbjkuyshgvshgshgshbshgshkgshkgsjkhgasjkgkh', '', ''),
(100, 'agigigi', 'belum', '0000-00-00', '', '10:00:00', 'agjsbjkuyshgvshgshgshbshgshkgshkgsjkhgasjkgkh', '', ''),
(101, 'agigigi', 'belum', '0000-00-00', '', '10:00:00', 'agjsbjkuyshgvshgshgshbshgshkgshkgsjkhgasjkgkh', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nip` int(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `nama`, `role`, `password`, `nip`, `jabatan`, `email`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `alamat`) VALUES
('admin', 'Admin Jurusan SI', 'admin', 'admin', 123, 'Admin Jurusan', '', 'Padang', '0000-00-00', 0, 'Padang'),
('arif', 'Arifff', 'dosen', 'arif', 123213, '', 'arhnrahman14@gmail.com', '', '0000-00-00', 0, ''),
('kajur', 'Ir. Darwison MT', 'kajur', 'kajur', 8888877, '', '', 'Padang Panjang', '2016-12-31', 6666, 'Padang'),
('root', 'Root', 'dosen', 'root', 3455, 'Dosen', '', '', '0000-00-00', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datarapat`
--
ALTER TABLE `datarapat`
 ADD PRIMARY KEY (`id_datarapat`);

--
-- Indexes for table `event_detail`
--
ALTER TABLE `event_detail`
 ADD PRIMARY KEY (`idevent`);

--
-- Indexes for table `jadwalkosong`
--
ALTER TABLE `jadwalkosong`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
 ADD PRIMARY KEY (`id_rapat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datarapat`
--
ALTER TABLE `datarapat`
MODIFY `id_datarapat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `event_detail`
--
ALTER TABLE `event_detail`
MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwalkosong`
--
ALTER TABLE `jadwalkosong`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
MODIFY `id_rapat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
