-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 07:47 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking_ruangrapat`
--

CREATE TABLE `tbl_booking_ruangrapat` (
  `id_booking` int(11) NOT NULL,
  `agenda_meeting` text NOT NULL,
  `tanggal_booking` date NOT NULL,
  `waktu_booking` time NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking_ruangrapat`
--

INSERT INTO `tbl_booking_ruangrapat` (`id_booking`, `agenda_meeting`, `tanggal_booking`, `waktu_booking`, `tanggal_selesai`, `waktu_selesai`, `status`, `id_divisi`, `nama_lengkap`) VALUES
(107, 'Koordinasi dengan Qupro program pembinaan mualaf. ', '2019-04-01', '12:00:00', '2019-01-04', '17:00:00', 'Disetujui', 2, 'Rio MAP'),
(108, 'pembahasan annuala report 2018', '2019-04-02', '13:00:00', '2019-04-02', '15:00:00', 'Disetujui', 1, 'Ahmad Iqbal'),
(109, 'RENCANA KERJA RAMADHAN', '2019-04-04', '13:00:00', '2019-04-04', '15:00:00', 'Disetujui', 1, 'Ahmad Iqbal'),
(110, 'Rapat persiapan program spesial Ramadhan', '2019-04-08', '16:00:00', '2019-04-08', '17:00:00', 'Disetujui', 2, 'Rio MAP'),
(111, 'Meeting Bidang KHS', '2019-04-09', '01:00:00', '2019-04-09', '04:00:00', 'Disetujui', 4, 'Chusnul Fadhillah'),
(112, 'Kerjasama Pemberdayaan Desa  Binaan Peternak Ikan Hias di Daerah Parung, Bogor. Bersama LAZNAS YAKESMA', '2019-04-10', '00:00:00', '2019-04-10', '15:00:00', 'Disetujui', 2, 'Muhammad Iqbal'),
(113, 'Rapat Kegiatan Ramadhan 0.2', '2019-04-24', '13:00:00', '2019-04-24', '16:00:00', 'Disetujui', 3, 'Fahma Izzatina'),
(114, 'Rapat Akunting', '2019-04-26', '13:00:00', '2019-04-26', '15:00:00', 'Ditolak', 3, 'Fahma Izzatina'),
(115, 'Meeting Aplikasi Keuangan dengan PT Speca', '2019-04-26', '13:30:00', '2019-04-26', '15:00:00', 'Disetujui', 3, 'Rahman Sidik'),
(116, '', '2019-04-26', '09:30:00', '2019-04-26', '12:00:00', 'Disetujui', 3, 'Fahma Izzatina'),
(117, 'Desa Berdaya With Rumah Zakat', '2019-04-30', '08:00:00', '2019-04-30', '12:00:00', 'Disetujui', 2, 'Muhammad Iqbal'),
(118, 'Meeting Aplikasi', '2019-05-06', '10:00:00', '2019-05-06', '16:00:00', 'Disetujui', 3, 'Ahmad Dahlan'),
(119, 'Menerima tamu dari BSM rencana pelayanan cash management', '2019-05-22', '10:00:00', '2019-05-22', '11:00:00', '', 3, 'Rahman Sidik'),
(120, 'Persiapan program pemberdayaan', '2019-06-20', '14:00:00', '2019-06-20', '16:00:00', '', 2, 'Achmad Badawi'),
(121, 'Rapat pemberdayaan dengan UID Banten', '2019-07-02', '10:00:00', '2019-07-02', '12:00:00', 'Disetujui', 2, 'Rio MAP'),
(122, 'Sharing season bersama IMZ tentang pemilihan mitra pemberdayaan', '2019-07-02', '13:00:00', '2019-07-02', '15:00:00', 'Disetujui', 2, 'Rio MAP'),
(123, 'Laporan Keuangan Pusat dan Unit', '2019-07-09', '08:00:00', '2019-07-09', '12:00:00', 'Disetujui', 3, 'Ahmad Dahlan'),
(124, 'Tim Building', '2019-07-10', '13:00:00', '2019-07-10', '15:00:00', 'Disetujui', 4, 'Chusnul Fadhillah'),
(125, '', '2019-07-17', '08:00:00', '2019-07-17', '12:00:00', 'Disetujui', 2, 'Ismy LF'),
(126, 'Meeting dengan UI', '2019-07-17', '13:00:00', '2019-07-17', '16:00:00', 'Disetujui', 2, 'Ismy LF'),
(127, 'Tes Seleksi Siswa/i Tahfidz Preneur Cisarua', '2019-07-19', '13:00:00', '2019-07-19', '16:00:00', 'Disetujui', 2, 'Muhammad Iqbal'),
(128, 'Program dakwah - Pelatihan sembelih halal sesuai syariat', '2019-07-31', '12:01:00', '2019-07-31', '14:00:00', 'Ditolak', 2, 'Muhammad Iqbal'),
(129, 'meeting KHS dan Tim Building', '2019-08-27', '08:00:00', '2018-08-27', '15:00:00', 'Disetujui', 4, 'Chusnul Fadhillah'),
(130, 'Meeting website baru bareng vendor ', '2019-08-30', '10:00:00', '2019-08-30', '11:00:00', 'Disetujui', 1, 'Muhammad Syafei'),
(131, 'Program libur berbagi dengan extensi UI', '2019-09-05', '13:00:00', '2019-09-05', '15:00:00', 'Disetujui', 2, 'Ismy LF'),
(132, 'meeting dengan pihak bank', '2019-10-03', '10:00:00', '2019-10-03', '16:00:00', 'Disetujui', 4, 'Chusnul Fadhillah'),
(133, 'Pertemuan dengan YBM PLN Unit se Jabar, Pembahasan sinergi program Unit dan Pusat', '2019-10-15', '13:00:00', '2019-10-15', '16:00:00', 'Disetujui', 2, 'Riki Bagus'),
(134, 'Meeting Aplikasi SDM', '2019-10-29', '13:00:00', '2019-10-29', '17:00:00', 'Disetujui', 4, 'Nadia N. Ashfahani'),
(135, 'Evaaluasi Program 2019 dan Penyusunan Program 2020', '2019-10-31', '09:00:00', '2019-10-31', '12:00:00', 'Disetujui', 2, 'Achmad Badawi'),
(136, 'Review asesment program Pesantrenku berdaya, bersama tim Kafilla', '2019-10-29', '09:00:00', '2019-10-29', '11:30:00', 'Disetujui', 2, 'Riki Bagus'),
(137, 'Pertemuan rutin dengan Forkomit', '2019-10-30', '09:00:00', '2019-10-30', '11:30:00', 'Disetujui', 2, 'Riki Bagus'),
(138, 'Pertemuan koordinasi sinerfi program bersama ACT', '2019-10-30', '13:00:00', '2019-10-30', '14:30:00', 'Disetujui', 2, 'Riki Bagus'),
(139, 'Rapat RKAT 2020', '2019-11-01', '13:00:00', '2019-11-01', '17:00:00', 'Disetujui', 2, 'Yunita Candra S'),
(140, 'persiapan rakernas 2019', '2019-11-04', '10:00:00', '2019-11-04', '12:00:00', 'Disetujui', 1, 'Indah Purnama S'),
(141, 'MAINTENANCE 2 UNIT AC RUANG MEETING', '2019-11-12', '09:00:00', '2019-11-12', '12:00:00', 'Disetujui', 3, 'Abdul Rahman Septu'),
(142, 'Meeting Keuangan bersama PeTik', '2019-11-14', '13:00:00', '2019-11-14', '15:00:00', 'Disetujui', 3, 'Alvin Rizkyanto'),
(143, 'Rapat bersama BSM', '2019-11-26', '10:00:00', '2019-11-26', '12:00:00', 'Disetujui', 3, 'Sri Sugihartati'),
(144, 'Pra Raker Divisi Pemberdayaan', '2019-11-27', '09:00:00', '2019-11-27', '13:00:00', '', 2, 'Riki Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking_mobil`
--

CREATE TABLE `tb_booking_mobil` (
  `id_booking` int(11) NOT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `tujuan` text,
  `id_mobil` int(11) DEFAULT NULL,
  `tanggal_booking` date DEFAULT '0000-00-00',
  `waktu_booking` time DEFAULT '00:00:00',
  `tanggal_selesai` date DEFAULT '0000-00-00',
  `waktu_selesai` time DEFAULT '00:00:00',
  `nama_lengkap` varchar(25) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking_mobil`
--

INSERT INTO `tb_booking_mobil` (`id_booking`, `id_divisi`, `tujuan`, `id_mobil`, `tanggal_booking`, `waktu_booking`, `tanggal_selesai`, `waktu_selesai`, `nama_lengkap`, `status`) VALUES
(136, 2, 'Kec. Sumur Kab. Pandeglang Prov. Banten', 21, '2019-04-04', '06:00:00', '2019-04-04', '22:00:00', 'Muhammad Iqbal', 'Disetujui'),
(138, 2, 'Peresmian gedung baru SMk Informatika Utama dan Survei', 21, '2019-04-09', '07:30:00', '2019-04-09', '17:00:00', 'Rio MAP', 'Disetujui'),
(139, 1, 'mengantar pengurus dan majalah ke bandara halim', 21, '2019-04-08', '14:00:00', '2019-04-08', '17:00:00', 'Ahmad Iqbal', 'Disetujui'),
(140, 4, '', 0, '2019-04-13', '07:00:00', '2019-04-14', '15:00:00', 'Chusnul Fadhillah', 'Disetujui'),
(141, 2, 'Belanja dan penyaluran serpong,rscm,rs harapan kita ', 21, '2019-04-10', '08:00:00', '2019-04-10', '17:00:00', 'Musaddat Achmad', 'Disetujui'),
(142, 3, 'PeTIK', 21, '2019-04-10', '07:30:00', '2019-04-10', '15:00:00', 'Ahmad Dahlan', 'Ditolak'),
(143, 2, 'Meeting Pembahasan Program Rumah Cahaya Berdaya, kantor LAZIS Astra, Tj. Priok, Kota Jakarta Utara', 0, '2019-04-15', '11:00:00', '2019-04-15', '15:00:00', 'Muhammad Iqbal', 'Disetujui'),
(144, 2, 'Penyaluran program jumat berkah\r\nPenyaluran program RSCM\r\nsurvei Program bedah rumah', 21, '2019-04-12', '07:00:00', '2019-04-12', '17:00:00', 'Rio MAP', 'Disetujui'),
(145, 4, 'IZI', 21, '2019-04-11', '07:30:00', '2019-04-11', '16:30:00', 'Chusnul Fadhillah', 'Disetujui'),
(146, 2, 'Bogor ', 21, '2019-04-16', '07:30:00', '2019-04-16', '17:00:00', 'Rio MAP', 'Disetujui'),
(147, 4, 'Bogor', 21, '2019-04-22', '12:00:00', '2019-04-22', '16:00:00', 'Chusnul Fadhillah', 'Disetujui'),
(148, 2, 'Bekasi', 21, '2019-04-23', '07:00:00', '2019-04-23', '17:00:00', 'Rio MAP', 'Disetujui'),
(149, 2, 'Serang Banten agenda Assesment program tsunami banten dan survey 2 lokasi berbagi sembako ramadhan 1440', 21, '2019-04-25', '07:00:00', '2019-04-26', '17:00:00', 'Rio MAP', 'Disetujui'),
(150, 2, 'Teluknaga, Banten', 21, '2019-05-03', '06:00:00', '2019-05-03', '18:00:00', 'Ismy LF', 'Ditolak'),
(151, 3, 'BRI Syariah', 21, '2019-04-29', '08:00:00', '2019-04-29', '15:00:00', 'Ahmad Dahlan', 'Disetujui'),
(152, 4, 'Smart Ekselensia Parung', 21, '2019-05-09', '08:00:00', '2019-05-09', '16:00:00', 'Reza Haryo MP', 'Disetujui'),
(153, 4, 'Sukamakmur Bogor', 21, '2019-05-10', '16:00:00', '2019-05-11', '16:00:00', 'Reza Haryo MP', 'Disetujui'),
(154, 2, 'BAZNAS DKI', 21, '2019-05-13', '09:00:00', '2019-05-13', '12:00:00', 'Rio MAP', 'Disetujui'),
(155, 3, 'Gedung BRI, Jl. Jend. Sudirman Kav.44', 0, '2019-05-14', '14:30:00', '2019-05-14', '19:00:00', 'Rahman Sidik', 'Disetujui'),
(156, 4, 'Satunan Anak yatim dan Duafa di Jl. Dr. Susilo I /no. 13, Rt. 004/04\r\nGrogol, Grogol Penamburan Kota\r\nJakarta Barat', 0, '2019-05-16', '14:00:00', '2019-05-16', '19:00:00', 'Chusnul Fadhillah', 'Ditolak'),
(157, 4, 'santunan Anak Yatim dan duafa di Jalan Amasandi Rt. 014/02\r\nPasirjaya Bogor Barat Bogor\r\nJawa Barat', 21, '2019-05-17', '10:00:00', '2019-05-17', '20:00:00', 'Chusnul Fadhillah', 'Disetujui'),
(158, 2, 'Kementerian PMK dan UID Jaya', 21, '2019-05-20', '11:30:00', '2019-05-20', '19:00:00', 'Rio MAP', 'Disetujui'),
(159, 2, 'pembagian sembako', 21, '2019-05-24', '08:00:00', '2019-05-24', '18:00:00', 'Rio MAP', ''),
(160, 1, 'Explore SMKI Utama dan PeTIK bersama Blogger & Jurnalis', 21, '2019-05-22', '09:00:00', '2019-05-22', '21:00:00', 'Indah Purnama S', ''),
(161, 3, 'BRI Syariah (Tukar Uang)', 0, '2019-05-28', '10:00:00', '2019-05-28', '13:00:00', 'Nadia Putri', ''),
(162, 2, 'Ombudsman Republik Indonesia', 21, '2019-06-18', '08:00:00', '2019-06-18', '12:00:00', 'Salman AF', 'Disetujui'),
(163, 2, 'Survei lokasi sekolah programer', 21, '2019-07-02', '07:00:00', '2019-07-02', '14:00:00', 'Rio MAP', 'Disetujui'),
(164, 2, 'diadakannya supervisi serta peliputan Nuansa Amal program desa pemberdayaan di Desa Darawolong kec Purwasari Kab Karawang  dan di Desa Lebaksiuh Kecamatan Ciawigebang Kuningan Jawa Barat', 21, '2019-07-06', '07:00:00', '2019-07-07', '20:00:00', 'Rio MAP', 'Disetujui'),
(165, 2, 'Perguruan Tinggi Tirtayasa dan UIN Sultan Hasanuddin Serang Banten', 21, '2019-07-08', '07:00:00', '2019-07-08', '19:00:00', 'Achmad Badawi', 'Disetujui'),
(166, 2, 'cibetok, kab tanggerang', 21, '2019-07-11', '18:00:00', '2019-12-07', '07:00:00', 'Rio MAP', 'Disetujui'),
(167, 2, 'Manggarai', 21, '2019-11-07', '21:00:00', '2019-11-07', '12:00:00', 'Rio MAP', ''),
(168, 2, 'Survey dan  Eksekusi bantuan kepada Bapak Ipin Pensiunan PLN, Parung Panjang Bogor Jawa Barat', 21, '2019-07-19', '09:00:00', '2019-07-19', '17:00:00', 'Achmad Badawi', 'Disetujui'),
(169, 2, 'Bogor Baranangsiang, Rapa koordinasi bidang Pemberdayagunaan dan pedistribusian', 21, '2019-07-21', '07:00:00', '2019-07-22', '00:00:00', 'Achmad Badawi', 'Disetujui'),
(170, 1, 'Pesantren tahfidzpreneur', 21, '2019-07-23', '08:00:00', '2019-07-23', '17:00:00', 'Ahmad Iqbal', 'Disetujui'),
(171, 2, 'Survei program desa cahaya sukabumi', 21, '2019-07-23', '17:00:00', '2019-07-24', '08:00:00', 'Rio MAP', 'Ditolak'),
(172, 2, 'Rumpin (Monev)', 21, '2019-07-30', '07:00:00', '2019-07-31', '10:00:00', 'Rio MAP', 'Disetujui'),
(173, 2, 'Survei Program Idul Adha ke Ponpes Al Madina Gunung Sindur', 21, '2019-08-01', '14:00:00', '2019-08-01', '19:00:00', 'Muhammad Iqbal', 'Disetujui'),
(174, 2, 'Yayasan Ponpes Islami.\r\nCibalung, Cijeruk, Kab. Bogor\r\nSurvei Permohonan Bantuan Pembangunan Asrama Ponpes Islami (Referensi Muzakki Zainal Arifin)', 21, '2019-08-05', '08:00:00', '2019-08-05', '14:00:00', 'Muhammad Iqbal', 'Disetujui'),
(175, 4, 'Bogor, rapat kerja Ponpes di Cisarua. Mau jemput Prof Amin.', 21, '2019-08-06', '07:00:00', '2019-08-07', '20:00:00', 'Nadia N. Ashfahani', 'Disetujui'),
(176, 2, 'Dinas kuningan', 21, '2019-08-07', '07:00:00', '2019-08-09', '21:00:00', 'Rio MAP', 'Disetujui'),
(177, 2, 'Sumedang dan Kuningan', 21, '2019-08-20', '08:00:00', '2019-08-21', '17:00:00', 'Rio MAP', 'Ditolak'),
(178, 2, 'Audiensi LAZ Astra, LDKS SMKI Utama, Sukamakmur', 21, '2019-08-23', '07:00:00', '2019-08-24', '17:00:00', 'Rio MAP', 'Disetujui'),
(179, 1, 'Acara YBM PLN dan Ekstensi Mengajar di TMII ', 21, '2019-08-15', '08:00:00', '2019-08-15', '18:00:00', 'Indah Purnama S', 'Ditolak'),
(180, 2, 'Survei Desa Cahaya Sumedang dan Bandung', 21, '2019-08-28', '18:59:00', '2019-08-30', '08:00:00', 'Rio MAP', 'Ditolak'),
(181, 1, 'TMII untuk kegiatan libur berbagi bersama ekstensi UI mengajar', 21, '2019-09-15', '07:00:00', '2019-09-15', '18:00:00', 'Indah Purnama S', 'Disetujui'),
(182, 4, 'Survei lokasi team building', 21, '2019-09-02', '07:00:00', '2019-09-02', '16:00:00', 'Nadia N. Ashfahani', 'Disetujui'),
(183, 2, 'Cisarua', 21, '2019-09-02', '09:00:00', '2019-09-03', '12:00:00', 'Ismy LF', 'Ditolak'),
(184, 2, 'Cisarua', 21, '2019-09-02', '09:00:00', '2019-09-03', '12:00:00', 'Ismy LF', 'Disetujui'),
(185, 2, 'Tanjung Lesung Banten', 21, '2019-09-05', '06:00:00', '2019-09-05', '21:00:00', 'Ryan Suryanto', 'Disetujui'),
(186, 2, 'Cikokol, Tangerang', 21, '2019-09-03', '11:00:00', '2019-09-03', '17:00:00', 'Salman AF', 'Disetujui'),
(187, 4, 'cisarua', 21, '2019-09-04', '08:00:00', '2019-09-05', '17:00:00', 'Reza Haryo MP', 'Disetujui'),
(188, 2, 'Pesantren Tahfidz Cisarua bersama Pak Wahyu', 21, '2019-09-13', '15:00:00', '2019-09-15', '07:00:00', 'Riki Bagus', 'Disetujui'),
(189, 2, 'survei dan pembuatan video program air kehidupan dan Mesjid Tani di Desa Cilembu Kecamatan Pamulihan Kabupaten Sumedang', 21, '2019-09-17', '05:00:00', '2019-09-19', '16:00:00', 'Rio MAP', 'Disetujui'),
(190, 2, 'Kemayoran Jakarta pusat kegiatan Prokesmasling', 21, '2019-09-20', '07:00:00', '2019-09-20', '12:00:00', 'Achmad Badawi', 'Disetujui'),
(191, 2, 'TMII, Jakarta Timur\r\nKegiatan Pelatihan dan Penugasan 30 Dai ke Daerah', 21, '2019-09-26', '17:00:00', '2019-09-28', '17:00:00', 'Muhammad Iqbal', 'Disetujui'),
(192, 2, 'Gg. Kelinci Bojongsari Depok', 21, '2019-04-10', '19:30:00', '2019-04-10', '02:00:00', 'Achmad Badawi', 'Disetujui'),
(193, 2, '1. Senin ke Karawang (monev Desa Cahaya dan pertemuan dengan YBM PLN Karawang) \r\n2. Selasa ke Bogor (pertemuan dengan Pemkot Bogor) ', 21, '2019-10-07', '05:00:00', '2019-10-08', '18:00:00', 'Riki Bagus', 'Disetujui'),
(194, 2, 'Lapas Cikarang', 21, '2019-10-15', '08:00:00', '2019-10-15', '14:00:00', 'Riki Bagus', 'Disetujui'),
(195, 3, 'Sumedang', 21, '2019-10-14', '17:00:00', '2019-10-15', '17:00:00', 'Abdul Rahman Septu', 'Ditolak'),
(196, 2, 'Kantor Lurah dan Lokasi Pembanguna Pesantren Kreatif Sukamakmur, Bogor', 21, '2019-10-28', '05:30:00', '2019-10-28', '17:00:00', 'Riki Bagus', 'Disetujui'),
(197, 2, 'MI Al Muzayyanah Cilincing, Jakut', 21, '2019-11-05', '08:00:00', '2019-11-05', '15:00:00', 'Yunita Candra S', 'Disetujui'),
(198, 2, 'Rumah Sehat Donpet Duafa\r\nJalan PArung Bogor Jawa Barat', 21, '2019-10-30', '12:00:00', '2019-10-30', '18:00:00', 'Achmad Badawi', 'Disetujui'),
(199, 2, 'Penyuluhan Kespro di SMP Utama', 21, '2019-11-02', '07:00:00', '2019-11-02', '13:00:00', 'Yunita Candra S', 'Disetujui'),
(200, 2, 'Survey program kesehatan bidan pedalaman di Lebak, Banten', 21, '2019-11-07', '07:00:00', '2019-11-07', '16:00:00', 'Yunita Candra S', 'Disetujui'),
(201, 2, 'MLEB TMII, santunan yatim', 0, '2019-09-11', '07:00:00', '2019-09-11', '00:00:00', 'Yunita Candra S', 'Ditolak'),
(202, 4, 'SUKAMAKMUR', 21, '2019-11-11', '08:00:00', '2019-11-11', '17:00:00', 'Nadia N. Ashfahani', 'Disetujui'),
(203, 2, 'Kegiatan Prokesmasling di Cigudeg, Bogor, Jawa Barat', 21, '2019-11-10', '17:00:00', '2019-11-11', '20:00:00', 'Yunita Candra S', ''),
(204, 3, 'menjenguk ugi di ciseeng', 21, '2019-11-12', '09:00:00', '2019-11-12', '15:00:00', 'Anggraita Ria Wulantika', 'Disetujui'),
(205, 2, 'Survei Masjid di Pandeglang referensi Pak Wiluyo Direksi PLN', 21, '2019-11-15', '09:00:00', '2019-11-15', '18:00:00', 'Muhammad Iqbal', 'Ditolak'),
(206, 2, 'Sentul, bersama Pak Wahyu dan Pak Salman. Agenda pertemuan dengan Tokoh Masyarakat Suka makmur', 21, '2019-11-19', '10:00:00', '2019-11-19', '17:00:00', 'Riki Bagus', 'Disetujui'),
(207, 4, 'meeting di Bogor', 21, '2019-11-19', '10:00:00', '2019-11-19', '18:00:00', 'Chusnul Fadhillah', 'Disetujui'),
(208, 2, 'Pemkot Bogor', 21, '2019-11-20', '06:00:00', '2019-11-20', '16:00:00', 'Riki Bagus', 'Disetujui'),
(209, 2, 'Badui Kab. Pandeglang', 21, '2019-11-21', '20:00:00', '2019-11-22', '17:00:00', 'Muhammad Iqbal', 'Disetujui'),
(210, 2, 'PeTIK', 21, '2019-11-26', '08:00:00', '2019-11-26', '14:00:00', 'Riki Bagus', 'Disetujui'),
(211, 2, 'Pemkot Bogor dan Pesantren Cisarua', 21, '2019-12-02', '10:00:00', '2019-12-03', '15:00:00', 'Riki Bagus', 'Disetujui'),
(212, 1, 'Sosialisasi Pendaftaran Kepesertaan YBM PLN (Kantor Pusat PT Pelayaran Bahtera Adhiguna)', 21, '2019-12-18', '08:00:00', '2019-12-18', '14:00:00', 'Indah Purnama S', 'Disetujui'),
(213, 2, 'Menghadiri pembukaan Rapat Kerja SMP dan SMK Utama dan Pertemuan dengan vendor pemasangan sistem hidroponik di Cisarua', 23, '2019-12-30', '07:00:00', '2019-12-30', '15:00:00', 'Riki Bagus', 'Disetujui'),
(214, 3, 'Cilodong, Kab, Bogor - Meeting Aplikasi', 21, '2019-12-31', '09:00:00', '2019-12-31', '14:00:00', 'Alvin Rizkyanto', 'Disetujui'),
(215, 2, 'Banyuresmi dan Cimulang', 21, '2020-01-03', '07:00:00', '2020-01-03', '17:00:00', 'Rio MAP', 'Disetujui'),
(216, 1, 'Pembagian Kalender 2020 YBM PLN untuk PeTIK dan SMKI Utama - Depok', 0, '2020-01-08', '10:00:00', '2020-01-08', '12:00:00', 'Muhammad Syafei', 'Disetujui'),
(217, 2, 'Survei Desa Cahaya', 23, '2020-01-11', '05:00:00', '2020-01-12', '17:00:00', 'Rio MAP', 'Disetujui'),
(218, 2, 'Survei Tahap 2 Kampung Gizi Desa Banyuresmi Cigudeg, Bogor', 21, '0202-01-11', '07:00:00', '0202-01-11', '19:00:00', 'Yunita Candra S', 'Disetujui'),
(219, 3, 'Bandung, UID JABAR dan TJBT', 21, '2020-01-20', '09:00:00', '2020-01-23', '17:00:00', 'Ahmad Dahlan', 'Disetujui'),
(220, 2, 'Closing program Pelatihan Service AC, Pelaksanaan di YBM PLN TJBB', 21, '2020-01-16', '07:00:00', '2020-01-16', '11:00:00', 'Riki Bagus', ''),
(221, 2, 'Sumur Pandeglang Banten', 21, '2020-01-20', '06:00:00', '2020-01-20', '01:20:00', 'Achmad Badawi', ''),
(222, 2, 'Sumur, Pandeglang Banten', 21, '2020-01-20', '06:00:00', '2020-01-20', '18:00:00', 'Achmad Badawi', ''),
(223, 2, 'PLN  UP3 Malimping', 23, '2020-01-27', '10:00:00', '2020-01-28', '16:00:00', 'Yunita Candra S', ''),
(224, 2, 'Kampung Gizi, Cigudeg Bogor', 21, '2020-01-29', '08:00:00', '2020-01-30', '17:00:00', 'Yunita Candra S', ''),
(225, 2, 'Cirebon', 21, '2020-01-24', '03:00:00', '2020-01-25', '17:00:00', 'Rio MAP', ''),
(226, 2, 'Kantor PLN Cisoka', 21, '2020-02-19', '07:00:00', '2020-02-19', '17:00:00', 'Rio MAP', ''),
(227, 4, 'cisarua', 21, '2020-03-04', '07:00:00', '2020-03-07', '19:00:00', 'Nadia N. Ashfahani', ''),
(228, 4, 'cisarua', 21, '2020-03-04', '07:00:00', '2020-03-07', '19:00:00', 'Nadia N. Ashfahani', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Penghimpunan dan Publikasi'),
(2, 'Pendistribusian dan Pendayagunaan'),
(3, 'Keuangan dan Umum'),
(4, 'Kepatuhan Hukum dan SDM'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `nama_mobil`) VALUES
(21, 'Avanza'),
(22, 'Ambulance'),
(23, 'Triton (Rescue)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `status_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `password`, `nama_lengkap`, `alamat`, `id_divisi`, `telepon`, `status_s`) VALUES
(11, 'septu.ar@ybmpln.org', '53p7u', 'Abdul Rahman Septu', 'Meruyung', 3, '081295154747', 0),
(12, 'a.badawi@ybmpln.org', '1234', 'Achmad Badawi', '', 2, '', 0),
(13, 'a.dahlan@ybmpln.org', '1234', 'Ahmad Dahlan', '', 3, '', 0),
(14, 'a.iqbal@ybmpln.org', '1234', 'Ahmad Iqbal', '', 1, '', 0),
(15, 'anggraita.rw@ybmpln.org', '1234', 'Anggraita Ria Wulantika', '', 3, '', 0),
(16, 'chusnul.f@ybmpln.org', '1234', 'Chusnul Fadhillah', '', 4, '', 0),
(18, 'dani.g@ybmpln.org', '1234', 'Dani Gunawan', '', 3, '', 0),
(19, 'eri.santoso@ybmpln.org', '1234', 'Eri Santoso', '', 1, '', 0),
(20, 'fahma.i@ybmpln.org', '1234', 'Fahma Izzatina', '', 3, '', 0),
(21, 'hanifa.sa@ybmpln.org', '1234', 'Hanifa Sabila', '', 3, '', 0),
(22, 'ismy.lf@ybmpln.org', '1234', 'Ismy LF', '', 2, '', 0),
(23, 'admin@ybmpln.org', '4dm1n', 'Kantor Pusat', 'Jakarta', 5, '02127083282', 0),
(29, 'm.iqbal@ybmpln.org', '1234', 'Muhammad Iqbal', '', 2, '', 0),
(30, 'm.syafei@ybmpln.org', '1234', 'Muhammad Syafei', '', 1, '', 0),
(31, 'musaddat.a@ybmpln.org', '1234', 'Musaddat Achmad', '', 2, '', 0),
(32, 'nadia.na@ybmpln.org', '1234', 'Nadia N. Ashfahani', '', 4, '', 0),
(33, 'nadia.p@ybmpln.org', '1234', 'Nadia Putri', '', 3, '', 0),
(34, 'rahman.s@ybmpln.org', '1234', 'Rahman Sidik', '', 3, '', 0),
(35, 'reza.hmp@ybmpln.org', '1234', 'Reza Haryo MP', '', 4, '', 0),
(36, 'rio.map@ybmpln.org', '1234', 'Rio MAP', 'Depok', 2, '08979583688', 0),
(37, 'ryan.s@ybmpln.org', '1234', 'Ryan Suryanto', '', 2, '', 0),
(38, 'salman.af@ybmpln.org', '1234', 'Salman AF', '', 2, '', 0),
(39, 'ugi.ss@ybmpln.org', '1234', 'Sri Sugihartati', '', 3, '', 0),
(40, 'wahyu.m@ybmpln.org', '1234', 'Wahyu', '', 4, '', 0),
(41, 'candra.y@ybmpln.org', '1234', 'Yunita Candra S', '', 2, '', 0),
(42, 'indah.ps@ybmpln.org', '1234', 'Indah Purnama S', 'Jakarta', 1, '0812', 0),
(43, 'riki.bs@ybmpln.org', 'riki1234', 'Riki Bagus', '', 2, '+62812345678', 0),
(44, 'alvin.r@ybmpln.org', '1234', 'Alvin Rizkyanto', 'Jakarta', 3, '081200001111', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking_ruangrapat`
--
ALTER TABLE `tbl_booking_ruangrapat`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tb_booking_mobil`
--
ALTER TABLE `tb_booking_mobil`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking_ruangrapat`
--
ALTER TABLE `tbl_booking_ruangrapat`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `tb_booking_mobil`
--
ALTER TABLE `tb_booking_mobil`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
