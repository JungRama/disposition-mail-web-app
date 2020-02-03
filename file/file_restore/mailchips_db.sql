-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Feb 2018 pada 05.16
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mailchips_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tujuan_disposisi` varchar(50) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `isi_disposisi` text NOT NULL,
  `sifat_disposisi` varchar(20) NOT NULL,
  `id_surat` int(2) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`id_disposisi`, `tujuan_disposisi`, `tgl_disposisi`, `isi_disposisi`, `sifat_disposisi`, `id_surat`, `id_user`) VALUES
(1, 'Alfin', '0000-00-00', 'Segera Koordinasi Pelaksanaan Zakat Fitrah', 'segera', 1, 1),
(2, 'Kepala Bidang', '0000-00-00', 'Segera Koordinasi Pelaksanaan Zakat Fitrah', 'segera', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_keluar`
--

CREATE TABLE `tb_surat_keluar` (
  `id_surat_keluar` int(3) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat_dibuat` date NOT NULL,
  `surat_dari` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `isi_surat` text NOT NULL,
  `file_upload` varchar(50) NOT NULL,
  `id_tipe_surat` int(2) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `tgl_surat_masuk` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat_dibuat` date NOT NULL,
  `surat_dari` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `isi_surat` text NOT NULL,
  `file_upload` varchar(50) NOT NULL,
  `id_tipe_surat` int(2) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id_surat_masuk`, `tgl_surat_masuk`, `no_surat`, `tgl_surat_dibuat`, `surat_dari`, `kepada`, `subjek`, `isi_surat`, `file_upload`, `id_tipe_surat`, `id_user`) VALUES
(7, '2018-02-06', '21/2121/211/22', '2018-03-09', 'benjamin', 'Junk', 'Duplicate', '"Awalnya oknum karyawan PLN itu mengarahkan saya untuk mewawancarai bagian jaringan, setelah selesai wawancara saya mengambil gambar video suasana kerja kantor dan lobi, tiba-tiba ZK membentak dan terkesan menghalangi," kata Muhammad Roni, jurnalis TV swasta nasional kepada wartawan di Subulussalam, Kamis (1/2/2018) seperti dikutip dari Antara.', 'new6.jpg', 1, 1),
(8, '2018-02-03', '112/012/PK/2018', '2018-02-02', 'Garuda Indonesia', 'PT.Raya Adiwisesa', 'Jumlah Pemasukan Seluruh Produksi', 'Untuk menjamin kelangsungan penerbangan dengan baik, maka garuda indonesia menjalin kerjasama dengan PT Raya Adiwisesa dalam hal keuangan. Arrahh anjayyy njirr fakk fakkk fakk', 'penetration-testing-with-backtrack.pdf', 1, 1),
(9, '2018-02-28', '122/PKJ/21/2018', '2018-02-22', 'SMKN 1 Denpasar', 'SMA 1 Denpasar', 'Peresmian Ketua Osis 2017/2018', 'Sebuah surat yang dibaca menjadi sebuah ingatan yang kian lama akan semakin hilang karena lamanya waktu, setelah itu berubah menjadi kenangan berupa masa lalu yang kelam.', 'bag-pexels-photo-515169-150x150.png', 1, 1),
(10, '2018-02-05', '219/PSN/29/2018', '2018-02-01', 'MailChips', 'SMKN 1 Denpasar', 'Surat Pengesahan Bangunan Baru', 'Sebuah surat yang dibaca menjadi sebuah ingatan yang kian lama akan semakin hilang karena lamanya waktu, setelah itu berubah menjadi kenangan berupa masa lalu.', 'new6.jpg', 1, 1),
(11, '2018-02-05', '210/JUJ/29/2018', '2018-01-09', 'Supreme', 'Sukreme', 'Distro baru di Kuta', 'Sebuah surat yang dibaca menjadi sebuah ingatan yang kian lama akan semakin hilang karena lamanya waktu, setelah itu berubah menjadi kenangan berupa masa lalu.', 'new4.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_surat`
--

CREATE TABLE `tb_tipe_surat` (
  `id_tipe_surat` int(2) NOT NULL,
  `tipe_surat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tipe_surat`
--

INSERT INTO `tb_tipe_surat` (`id_tipe_surat`, `tipe_surat`) VALUES
(1, 'undangan'),
(2, 'pemerintahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user_username`, `user_password`, `fullname`, `nip`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'alfinsurya', '9192019321', 1),
(2, 'Benjamin', '5d9f71b71b207b9e665820c0dce67bdb', 'Benjamin S', '920199123', 2),
(3, 'alfin', '6ff92dee2a93081f0192781f156fa0e9', 'Alfin Surya', '102912039120', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `tb_tipe_surat`
--
ALTER TABLE `tb_tipe_surat`
  ADD PRIMARY KEY (`id_tipe_surat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  MODIFY `id_surat_keluar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_tipe_surat`
--
ALTER TABLE `tb_tipe_surat`
  MODIFY `id_tipe_surat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
