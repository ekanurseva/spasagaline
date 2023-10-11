-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2023 pada 03.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spasagaline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `idhasil` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `anak` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hsl_kategori` varchar(45) NOT NULL,
  `salience` double NOT NULL,
  `tolerance` double NOT NULL,
  `mood_modification` double NOT NULL,
  `relapse` double NOT NULL,
  `withdrawal` double NOT NULL,
  `conflict` double NOT NULL,
  `problem` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`idhasil`, `iduser`, `anak`, `tanggal`, `hsl_kategori`, `salience`, `tolerance`, `mood_modification`, `relapse`, `withdrawal`, `conflict`, `problem`) VALUES
(11, 1, '-', '2023-09-22 03:39:01', 'Ringan', 80.179, 54.476, 52.147, 78.587, 43.75, 68.359, 31.918),
(12, 1, '-', '2023-09-22 03:39:01', 'Berat', 96.093, 54.476, 64.838, 96.02, 62.5, 90.625, 44.559),
(13, 2, '-', '2023-09-22 03:39:01', 'Sedang', 77.971, 66.678, 58.98, 91.002, 75, 68.359, 48.227),
(14, 5, '-', '2023-09-22 03:39:01', 'Ringan', 77.971, 54.476, 85.939, 77.464, 62.5, 68.359, 54.852),
(15, 10, '-', '2023-09-22 03:39:01', 'Berat', 77.971, 66.678, 85.939, 91.451, 62.5, 93.75, 54.852),
(16, 10, '-', '2023-09-22 03:39:01', 'Ringan', 77.971, 37.807, 58.98, 77.464, 43.75, 68.359, 36.423),
(17, 1, '-', '2023-09-22 03:39:01', 'Ringan', 77.971, 37.807, 52.147, 78.587, 43.75, 68.359, 40.63),
(18, 14, '-', '2023-09-22 03:39:01', 'Sedang', 77.971, 66.678, 85.939, 77.464, 75, 93.75, 54.852),
(19, 14, '-', '2023-09-22 03:39:01', 'Sedang', 90.919, 54.476, 85.939, 89.509, 75, 68.359, 54.852),
(20, 20, 'Bulan', '2023-09-22 03:37:25', 'Ringan', 77.971, 37.807, 52.147, 78.587, 43.75, 68.359, 40.63),
(21, 20, 'Bulan', '2023-09-22 03:37:25', 'Sedang', 80.575, 66.678, 52.147, 92.572, 62.5, 93.75, 54.852),
(22, 21, '-', '2023-09-22 03:39:01', 'Sedang', 79.314, 54.476, 52.147, 95.811, 43.75, 68.359, 36.423),
(24, 24, '-', '2023-09-22 03:39:01', 'Ringan', 77.971, 37.807, 58.98, 77.464, 62.5, 90.625, 36.423),
(25, 10, '-', '2023-09-22 03:39:01', 'Ringan', 77.971, 54.476, 85.939, 77.464, 62.5, 68.359, 54.852),
(26, 10, '-', '2023-09-22 03:39:01', 'Ringan', 77.971, 54.476, 52.147, 77.464, 62.5, 68.359, 54.852),
(27, 10, '-', '2023-09-22 03:39:01', 'Sedang', 77.971, 66.678, 85.939, 77.464, 75, 93.75, 54.852),
(28, 27, 'Naufal', '2023-09-22 03:37:25', 'Berat', 95.922, 54.476, 64.838, 92.572, 62.5, 90.625, 40.63),
(29, 27, 'Naufal', '2023-09-22 03:37:25', 'Berat', 95.922, 54.476, 64.838, 92.572, 62.5, 90.625, 40.63),
(31, 14, '-', '2023-09-22 03:25:08', 'Sedang', 90.522, 54.476, 80.865, 91.002, 75, 85.938, 51.653),
(32, 29, '-', '2023-09-21 03:03:42', 'Sedang', 79.314, 37.807, 58.98, 87.486, 62.5, 85.938, 48.227),
(33, 30, '-', '2023-09-21 03:07:00', 'Sedang', 89.907, 66.678, 58.98, 88.959, 62.5, 78.906, 31.918),
(34, 31, '-', '2023-09-21 03:10:46', 'Sedang', 80.179, 66.678, 58.98, 91.34, 43.75, 90.625, 44.559),
(35, 32, '-', '2023-09-21 03:13:52', 'Sedang', 98.21, 37.807, 83.597, 92.943, 43.75, 68.359, 48.227),
(36, 33, '-', '2023-09-21 03:17:52', 'Ringan', 77.971, 54.476, 64.838, 86.829, 43.75, 78.906, 36.423),
(37, 34, '-', '2023-09-21 03:22:44', 'Ringan', 89.907, 54.476, 52.147, 77.464, 62.5, 68.359, 31.918),
(38, 35, '-', '2023-09-21 03:25:28', 'Ringan', 89.907, 37.807, 64.838, 81.634, 62.5, 78.906, 31.918),
(39, 36, '-', '2023-09-21 03:25:58', 'Ringan', 77.971, 37.807, 64.838, 87.325, 43.75, 85.938, 31.918),
(40, 37, '-', '2023-09-21 03:27:08', 'Berat', 96.331, 66.678, 80.865, 95.179, 75, 90.625, 48.227),
(41, 38, '-', '2023-09-21 03:27:19', 'Ringan', 90.522, 37.807, 52.147, 83.206, 62.5, 78.906, 31.918),
(42, 39, '-', '2023-09-21 03:27:55', 'Ringan', 77.971, 37.807, 52.147, 78.587, 43.75, 68.359, 36.423),
(43, 40, '-', '2023-09-21 03:27:19', 'Sedang', 90.522, 54.476, 64.838, 91.772, 43.75, 90.625, 31.918),
(44, 41, '-', '2023-09-21 03:27:31', 'Sedang', 80.179, 54.476, 64.838, 90.53, 43.75, 85.938, 36.423),
(45, 42, '-', '2023-09-21 03:27:21', 'Sedang', 79.314, 54.476, 83.597, 90.886, 62.5, 85.938, 40.63),
(46, 43, '-', '2023-09-21 03:28:19', 'Ringan', 77.971, 37.807, 64.838, 84.044, 43.75, 78.906, 36.423),
(47, 28, 'Tiara Dian Santika', '2023-09-21 04:56:39', 'Berat', 90.522, 37.807, 80.865, 94.379, 75, 85.938, 36.423),
(48, 28, 'Fajar Rifai', '2023-09-21 05:58:43', 'Sedang', 89.907, 66.678, 64.838, 84.839, 62.5, 78.906, 44.559),
(49, 28, 'Pandu Winata', '2023-09-21 06:00:38', 'Ringan', 77.971, 54.476, 58.98, 83.206, 43.75, 85.938, 36.423),
(50, 28, 'Ahmad Ridho Haibah', '2023-09-21 06:05:34', 'Sedang', 95.658, 54.476, 80.865, 85.41, 75, 78.906, 40.63),
(51, 28, 'Saputra', '2023-09-21 06:10:49', 'Sedang', 90.522, 37.807, 64.838, 87.291, 62.5, 78.906, 44.559),
(52, 28, 'Muh Muhyi', '2023-09-21 06:13:07', 'Ringan', 91.472, 54.476, 80.865, 78.587, 62.5, 78.906, 40.63),
(53, 28, 'fahrian wibowo', '2023-09-21 06:17:58', 'Sedang', 77.971, 37.807, 52.147, 93.774, 43.75, 85.938, 36.423),
(54, 28, 'Jihan Delly Naysilla', '2023-09-21 06:21:15', 'Berat', 98.21, 54.476, 52.147, 92.183, 75, 85.938, 48.227),
(55, 28, 'Sultan Reza Ardiansyah', '2023-09-21 06:25:51', 'Sedang', 96.331, 37.807, 80.865, 84.044, 62.5, 90.625, 36.423),
(56, 28, 'Cantika Satya Bhayangkari', '2023-09-21 06:30:56', 'Sedang', 80.575, 66.678, 58.98, 95.36, 62.5, 85.938, 40.63),
(57, 28, 'Cinta Oktaviani', '2023-09-21 06:35:04', 'Sedang', 90.522, 54.476, 64.838, 86.138, 62.5, 85.938, 44.559),
(58, 28, 'Ratna Anjali', '2023-09-21 06:41:42', 'Sedang', 90.919, 37.807, 80.865, 82.325, 62.5, 85.938, 44.559),
(59, 28, 'Adik Rowe', '2023-09-21 06:46:29', 'Sedang', 89.907, 54.476, 58.98, 90.53, 43.75, 68.359, 36.423),
(60, 28, 'Nicolas Octavian', '2023-09-21 06:48:36', 'Sedang', 89.907, 37.807, 58.98, 92.082, 62.5, 85.938, 51.653),
(61, 28, 'Reyhan Panca Satria Hardiana', '2023-09-21 06:51:52', 'Berat', 95.658, 54.476, 85.939, 94.379, 43.75, 85.938, 48.227),
(62, 44, 'Tiara Dian Santika', '2023-09-21 07:19:59', 'Berat', 90.522, 37.807, 80.865, 94.659, 62.5, 85.938, 36.423),
(63, 45, 'Fajar Rifai', '2023-09-21 07:29:30', 'Sedang', 89.907, 66.678, 58.98, 84.839, 62.5, 78.906, 44.559),
(64, 46, 'Pandu Winata', '2023-09-21 08:10:46', 'Sedang', 80.179, 54.476, 58.98, 90.53, 43.75, 85.938, 36.423),
(65, 47, 'Ahmad Ridho Haibah', '2023-09-21 08:59:01', 'Sedang', 96.093, 54.476, 80.865, 91.772, 75, 78.906, 40.63),
(66, 48, 'Saputra', '2023-09-21 07:23:02', 'Berat', 90.522, 37.807, 64.838, 92.833, 62.5, 85.938, 44.559),
(67, 49, 'Muh Muhyi', '2023-09-21 08:26:00', 'Sedang', 81.388, 54.476, 80.865, 87.325, 62.5, 85.938, 48.227),
(68, 50, 'Fahrian Wibowo', '2023-09-21 07:49:02', 'Sedang', 91.992, 54.476, 52.147, 93.774, 43.75, 85.938, 40.63),
(69, 51, 'Jihan Delly Naysilla', '2023-09-21 10:32:44', 'Sedang', 90.919, 54.476, 58.98, 91.002, 62.5, 85.938, 40.63),
(70, 52, 'Sultan Reza Ardiansyah', '2023-09-21 09:05:14', 'Sedang', 96.331, 37.807, 80.865, 84.044, 62.5, 90.625, 36.423),
(71, 53, 'Cantika Satya Bhayangkari', '2023-09-21 09:39:22', 'Sedang', 80.575, 66.678, 58.98, 95.592, 62.5, 85.938, 44.559),
(72, 54, 'Cinta Oktaviani', '2023-09-21 11:36:34', 'Sedang', 90.522, 54.476, 64.838, 87.486, 62.5, 85.938, 44.559),
(73, 55, 'Ratna Anjali', '2023-09-21 10:02:44', 'Sedang', 90.919, 37.807, 80.865, 82.325, 62.5, 85.938, 44.559),
(74, 56, 'Adik Rowe', '2023-09-21 10:11:19', 'Sedang', 90.522, 54.476, 58.98, 91.002, 43.75, 68.359, 36.423),
(75, 57, 'Nicolas Octavian', '2023-09-21 10:28:32', 'Sedang', 89.907, 37.807, 58.98, 92.082, 62.5, 85.938, 48.227),
(76, 58, 'Reyhan Panca Satria Hardiana', '2023-09-21 11:39:54', 'Berat', 95.658, 54.476, 85.939, 94.379, 43.75, 85.938, 44.559),
(77, 28, '-', '2023-10-02 01:35:43', 'Sedang', 90.919, 54.476, 58.98, 89.099, 43.75, 78.906, 36.423);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ind_gejala`
--

CREATE TABLE `ind_gejala` (
  `idindikator` int(11) NOT NULL,
  `kode_indikator` varchar(20) NOT NULL,
  `indikator` text NOT NULL,
  `idkriteria` int(11) NOT NULL,
  `cf_pakar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ind_gejala`
--

INSERT INTO `ind_gejala` (`idindikator`, `kode_indikator`, `indikator`, `idkriteria`, `cf_pakar`) VALUES
(22, 'IND1-S', 'Selalu terpikir bermain game online (pikiran)', 23, 0.70283882783883),
(23, 'IND2-S', 'Menghabiskan banyak waktu luang untuk terus bermain game online (perilaku)', 23, 0.18223443223443),
(24, 'IND3-S', 'merasa ingin terus bermain game online dalam keadaan apapun (perasaan)', 23, 0.11492673992674),
(25, 'IND1-T', 'ingin terus menambah jumlah waktu dalam bermain game online', 24, 0.42274626129174),
(26, 'IND1-M', 'melupakan dan meluapkan masalah dengan bermain game online', 25, 0.24990622655664),
(27, 'IND2-M', 'kehilangan minat dan passion sebelumnya karena terlalu sering bermain game onlie', 25, 0.75009377344336),
(28, 'IND1-R', 'terus terpikirkan bermain game online meskipun mengetahui efek buruknya (pikiran)', 26, 0.57800650343891),
(29, 'IND2-R', 'tidak berhenti bermain game online walaupun mengetahui efek buruknya (perilaku)', 26, 0.23200162585973),
(30, 'IND3-R', 'merasa gagal ketika mencoba mengurangi bermain game online (perasaan)', 26, 0.094995935350683),
(31, 'IND4-R', 'adanya gangguan fisiologis seperti masalah penglihatan, gangguan sistem saraf, gangguan postur tubuh, dan lain sebagainya (fisiologis)', 26, 0.094995935350683),
(32, 'IND1-W', 'merasakan emosi seperti marah, kecewa, gelisah, sedih dan bingung ketika tidak bermain game online ', 27, 0.5),
(33, 'IND2-W', 'menyendiri dan tidak ingin diganggu karena bermain game online berlebihan', 27, 0.5),
(34, 'IND1-C', 'sering bertengkar dengan pemain/player lain saat bermain game online', 28, 0.5),
(37, 'IND2-C', 'memiliki perilaku menentang atau tidak patuh dengan orang tua maupun aturan lain akibat sering bermain game online', 28, 0.5),
(38, 'IND1-P', 'keberfungsian psikologis diri', 30, 0.12413108189901);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `range_atas` double NOT NULL,
  `range_bawah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama_kategori`, `range_atas`, `range_bawah`) VALUES
(15, 'Ringan', 19.257, 16.809),
(16, 'Sedang', 21.706, 19.258),
(17, 'Berat', 24.155, 21.707);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `idkriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`idkriteria`, `kode_kriteria`, `nama_kriteria`, `deskripsi`) VALUES
(23, 'S', 'Salience', 'Salience yaitu suatu kondisi di mana bermain game menjadi kegiatan utama yang paling penting bagi seseorang'),
(24, 'T', 'Tolerance', 'Tolerance yaitu suatu proses di mana seseorang mulai bermain game dengan intensitas dan frekuensi yang semakin meningkat, sehingga secara perlahan meningkatkan jumlah waktu yang dihabiskan untuk bermain game'),
(25, 'M', 'Mood Modification', 'Mood Modification adalah perubahan perasaan yang dipicu oleh kegiatan yang dialami secara pribadi'),
(26, 'R', 'Relapse', 'Relapse yaitu kecenderungan untuk kembali ke pola permainan atau perilaku adiktif yang sudah dilakukan sebelumnya'),
(27, 'W', 'Withdrawal', 'Withdrawal adalah perasaan dan dampak fisik negatif saat bermain game tiba-tiba berkurang atau dihentikan'),
(28, 'C', 'Conflict', 'Conflict yaitu suatu hal yang merujuk pada segala bentuk konflik interpersonal yang timbul karena bermain game secara berlebihan'),
(30, 'P', 'Problem', 'Problems yaitu hal yang merujuk pada masalah yang disebabkan oleh kecanduan bermain game yang berlebihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `kode_pertanyaan` varchar(20) NOT NULL,
  `text_pertanyaan` text NOT NULL,
  `idindikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`idpertanyaan`, `kode_pertanyaan`, `text_pertanyaan`, `idindikator`) VALUES
(1, 'G1', 'apakah anda terus-menerus memikirkan game online, bahkan ketika anda sedang tidak bermain selama 6 bulan terakhir?', 22),
(2, 'G2', 'selama 6 bulan terakhir, apa sebelum tidur anda berpikiran untuk bermain game online?', 22),
(3, 'G3', 'selama 6 bulan terakhir, apakah anda sering terpikirkan untuk bermain game online saat sedang melakukan aktivitas fisik seperti berolahraga?', 22),
(4, 'G4', 'selama 6 bulan terakhir, apakah anda lebih sering bermain game online dibandingkan melakukan kegiatan sosial?', 23),
(5, 'G5', 'selama 6 bulan terakhir, apakah anda merasa ingin bermain game online saat sedang makan?', 24),
(6, 'G6', 'selama 6 bulan terakhir, apakah anda merasa terhubung dengan karakter atau dunia virtual dalam dunia game online?', 24),
(7, 'G7', 'selama 6 bulan terakhir, apakah sejak awal anda mencoba bermain game online, anda terus menambah durasi bermain game online hingga sekarang?', 25),
(8, 'G8', 'selama 6 bulan terakhir, apakah waktu bermain game online lebih banyak dibandingkan waktu beraktivitas sosial?', 25),
(9, 'G9', 'selama 6 bulan terakhir, jika sedang marah, apakah anda akan bermain game online untuk meredakan emosi?', 26),
(10, 'G10', 'selama 6 bulan terakhir, apakah anda sering merasakan emosi seperti marah dan senang secara bersamaan ketika bermain game online?', 26),
(11, 'G11', 'selama 6 bulan terakhir, apakah anda telah meninggalkan kebiasaan anda seperti membaca, bermusik, berolahraga, atau travelling, hanya karena bermain game online? ', 27),
(12, 'G12', 'selama 6 bulan terakhir, apakah Anda sering mengalami keinginan kuat atau dorongan yang tidak terkendali untuk kembali bermain game online?', 28),
(13, 'G13', 'selama 6 bulan terakhir, ketika anda mencoba berhenti bermain game online, apakah terus terpikirkan melanjutkan bermain hingga mengganggu konsentrasi anda?', 28),
(14, 'G14', 'selama 6 bulan terakhir, apakah anda terus bermain game online meski anda mengetahui dampak negatifnya?', 29),
(15, 'G15', 'selama 6 bulan terakhir, apakah anda pernah kembali bermain game online dengan intensitas yang sama seperti sebelumnya setelah sebelumnya berhasil menghentikan kebiasaan tersebut?', 29),
(16, 'G16', 'selama 6 bulan terakhir, apakah anda mengalami kesulitan dalam mengendalikan atau menghentikan waktu yang anda habiskan untuk bermain game online?', 29),
(18, 'G17', 'selama 6 bulan terakhir, apakah ada perasaan bersalah atau penyesalan setelah menghabiskan terlalu banyak waktu untuk bermain game online?', 30),
(19, 'G18', 'selama 6 bulan terakhir, apakah anda merasa frustasi atau khawatir dengan waktu yang terbuang saat bermain game online?', 30),
(20, 'G19', 'selama 6 bulan terakhir, apakah Anda merasa terus-menerus tergoda untuk bermain game online, bahkan ketika Anda seharusnya fokus pada tugas atau tanggung jawab yang lain?', 30),
(21, 'G20', 'selama 6 bulan terakhir, apakah anda merasa cemas atau gelisah jika berhenti bermain game online?', 30),
(22, 'G21', 'selama 6 bulan terakhir, apakah Anda mengalami ketegangan otot atau masalah kesehatan yang terkait dengan postur tubuh yang buruk akibat terlalu lama bermain game online?', 31),
(23, 'G22', 'selama 6 bulan terakhir, apakah anda mengalami masalah kesehatan seperti gangguan penglihatan atau ketegangan mata akibat terlalu lama menatap layar saat bermain game online?', 31),
(24, 'G23', 'selama 6 bulan terakhir, apakah anda merasa lelah, kurang bertenaga, atau mengalami penurunan energi karena terlalu lama bermain game online?', 31),
(25, 'G24', 'selama 6 bulan terakhir, apakah Anda merasa kaku atau tidak fleksibel pada otot-otot tertentu akibat kurangnya aktivitas fisik di luar bermain game online?', 31),
(26, 'G25', 'selama 6 bulan terakhir, apakah Anda mengalami masalah kesehatan, seperti pegal-pegal atau nyeri pada tangan dan pergelangan tangan, akibat penggunaan kontroler atau keyboard dan mouse yang berlebihan saat bermain game online?', 31),
(27, 'G26', 'ketika sedang belajar/bekerja, apakah anda merasa gelisah karena tidak bisa bermain game online, selama 6 bulan terakhir?', 32),
(28, 'G27', 'selama 6 bulan terakhir, apakah anda selalu menjauhi keramaian untuk fokus dalam bermain game online?', 33),
(29, 'G28', 'selama 6 bulan terakhir, apakah kamu sering membuat pertengkaran dengan pemain/player lain dalam bermain game online?', 34),
(30, 'G29', 'selama 6 bulan terakhir, apakah anda pernah memperlakukan player lain dengan  tidak menyenangkan akibat kekalahan dalam bermain game online?', 34),
(31, 'G30', 'selama 6 bulan terakhir, apakah anda pernah mengalami situasi di mana konflik dalam game online berasal dari perselisihan pribadi atau perbedaan pendapat dengan pemain lain?', 34),
(94, 'G31', 'selama 6 bulan terakhir, apakah anda sering menolak dan membantah apabila disuruh orang tua yang sedang membutuhkan bantuan sehingga membuat orang tua marah?', 37),
(95, 'G32', 'selama 6 bulan terakhir, apakah anda mengalami kesulitan tidur, gangguan nafsu makan, atau gejala fisik lainnya ketika Anda tidak bermain game online?', 38),
(96, 'G33', 'selama 6 bulan terakhir, apakah anda rela mengeluarkan banyak uang untuk membeli item dalam game online?', 38),
(97, 'G34', 'selama 6 bulan terakhir, apakah anda tidak memperhatikan kebersihan diri seperti mandi, karena terus bermain game online?', 38),
(98, 'G35', 'selama 6 bulan terakhir, apakah anda merasa tidak masalah mengorbankan waktu belajar/beraktivitas sosial hanya karena bermain game online?', 38),
(99, 'G36', 'selama 6 bulan terakhir, apakah prestasi sekolah anda mengalami penurunan akibat terlalu sering bermain game online?', 38),
(104, 'G37', 'selama 6 bulan terakhir, apakah anda mengalami masalah kesehatan seperti kelelahan atau kurang energi setelah bermain game online selama beberapa jam?', 38);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_indikator`
--

CREATE TABLE `rel_indikator` (
  `ID` int(11) NOT NULL,
  `idkriteria` int(11) NOT NULL,
  `kode1` varchar(20) NOT NULL,
  `kode2` varchar(20) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rel_indikator`
--

INSERT INTO `rel_indikator` (`ID`, `idkriteria`, `kode1`, `kode2`, `nilai`) VALUES
(20, 23, 'IND1-S', 'IND1-S', 1),
(21, 23, 'IND1-S', 'IND2-S', 5),
(22, 23, 'IND1-S', 'IND3-S', 5),
(23, 23, 'IND2-S', 'IND1-S', 0.2),
(24, 23, 'IND2-S', 'IND2-S', 1),
(25, 23, 'IND2-S', 'IND3-S', 2),
(26, 23, 'IND3-S', 'IND1-S', 0.2),
(27, 23, 'IND3-S', 'IND2-S', 0.5),
(28, 23, 'IND3-S', 'IND3-S', 1),
(29, 25, 'IND1-M', 'IND1-M', 1),
(30, 25, 'IND1-M', 'IND2-M', 0.33333333333333),
(31, 25, 'IND2-M', 'IND1-M', 3),
(32, 25, 'IND2-M', 'IND2-M', 1),
(33, 26, 'IND1-R', 'IND1-R', 1),
(34, 26, 'IND1-R', 'IND2-R', 4),
(35, 26, 'IND1-R', 'IND3-R', 5),
(36, 26, 'IND1-R', 'IND4-R', 5),
(37, 26, 'IND2-R', 'IND1-R', 0.25),
(38, 26, 'IND2-R', 'IND2-R', 1),
(39, 26, 'IND2-R', 'IND3-R', 3),
(40, 26, 'IND2-R', 'IND4-R', 3),
(41, 26, 'IND3-R', 'IND1-R', 0.2),
(42, 26, 'IND3-R', 'IND2-R', 0.33333333333333),
(43, 26, 'IND3-R', 'IND3-R', 1),
(44, 26, 'IND3-R', 'IND4-R', 1),
(45, 26, 'IND4-R', 'IND1-R', 0.2),
(46, 26, 'IND4-R', 'IND2-R', 0.33333333333333),
(47, 26, 'IND4-R', 'IND3-R', 1),
(48, 26, 'IND4-R', 'IND4-R', 1),
(49, 27, 'IND1-W', 'IND1-W', 1),
(50, 27, 'IND1-W', 'IND2-W', 1),
(51, 27, 'IND2-W', 'IND1-W', 1),
(52, 27, 'IND2-W', 'IND2-W', 1),
(53, 28, 'IND1-C', 'IND1-C', 1),
(54, 28, 'IND1-C', 'IND2-C', 1),
(55, 28, 'IND2-C', 'IND1-C', 1),
(56, 28, 'IND2-C', 'IND2-C', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rel_kriteria`
--

CREATE TABLE `rel_kriteria` (
  `ID` int(11) NOT NULL,
  `ID1` varchar(10) NOT NULL,
  `ID2` varchar(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rel_kriteria`
--

INSERT INTO `rel_kriteria` (`ID`, `ID1`, `ID2`, `nilai`) VALUES
(15, 'S', 'S', 1),
(16, 'T', 'T', 1),
(17, 'S', 'T', 0.2),
(18, 'T', 'S', 5),
(19, 'M', 'M', 1),
(20, 'S', 'M', 3),
(21, 'M', 'S', 0.33333333333333),
(22, 'T', 'M', 5),
(23, 'M', 'T', 0.2),
(24, 'R', 'R', 1),
(25, 'S', 'R', 1),
(26, 'R', 'S', 1),
(27, 'T', 'R', 5),
(28, 'R', 'T', 0.2),
(29, 'M', 'R', 0.33333333333333),
(30, 'R', 'M', 3),
(31, 'W', 'W', 1),
(32, 'S', 'W', 3),
(33, 'W', 'S', 0.33333333333333),
(34, 'T', 'W', 5),
(35, 'W', 'T', 0.2),
(36, 'M', 'W', 0.33333333333333),
(37, 'W', 'M', 3),
(38, 'R', 'W', 1),
(39, 'W', 'R', 1),
(40, 'C', 'C', 1),
(41, 'S', 'C', 3),
(42, 'C', 'S', 0.33333333333333),
(43, 'T', 'C', 5),
(44, 'C', 'T', 0.2),
(45, 'M', 'C', 0.33333333333333),
(46, 'C', 'M', 3),
(47, 'R', 'C', 1),
(48, 'C', 'R', 1),
(49, 'W', 'C', 1),
(50, 'C', 'W', 1),
(51, 'P', 'P', 1),
(52, 'S', 'P', 0.33333333333333),
(53, 'P', 'S', 3),
(54, 'T', 'P', 5),
(55, 'P', 'T', 0.2),
(56, 'M', 'P', 0.33333333333333),
(57, 'P', 'M', 3),
(58, 'R', 'P', 1),
(59, 'P', 'R', 1),
(60, 'W', 'P', 1),
(61, 'P', 'W', 1),
(62, 'C', 'P', 1),
(63, 'P', 'C', 1),
(64, 'P', 'P', 1),
(65, 'S', 'P', 1),
(66, 'P', 'S', 1),
(67, 'T', 'P', 1),
(68, 'P', 'T', 1),
(69, 'M', 'P', 1),
(70, 'P', 'M', 1),
(71, 'R', 'P', 1),
(72, 'P', 'R', 1),
(73, 'W', 'P', 1),
(74, 'P', 'W', 1),
(75, 'C', 'P', 1),
(76, 'P', 'C', 1),
(77, 'SS', 'SS', 1),
(78, 'S', 'SS', 1),
(79, 'SS', 'S', 1),
(80, 'T', 'SS', 1),
(81, 'SS', 'T', 1),
(82, 'M', 'SS', 1),
(83, 'SS', 'M', 1),
(84, 'R', 'SS', 1),
(85, 'SS', 'R', 1),
(86, 'W', 'SS', 1),
(87, 'SS', 'W', 1),
(88, 'C', 'SS', 1),
(89, 'SS', 'C', 1),
(90, 'P', 'SS', 1),
(91, 'SS', 'P', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `idsolusi` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `nama_solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`idsolusi`, `idkategori`, `nama_solusi`) VALUES
(1, 15, 'Mengurangi waktu bermain game online dengan lebih memperhatikan lingkungan sekitar dan fokus terhadap hal yang positif yang mendukung aktivitas dalam mengalihkan keinginan untuk\r\nbermain game online'),
(2, 15, 'Sebaiknya konsultasikan dengan psikolog/psikiater '),
(3, 16, 'Silahkan konsultasi dengan psikolog dan psikiater'),
(4, 16, 'Berolahraga/melakukan aktivitas fisik, minimal 2x seminggu selama 2 jam'),
(5, 16, 'Makan secara teratur (Sarapan jam 06.00 – 07.00 WIB, Makan siang jam 11.00 – 13.00 WIB, Makan malam 17.00 – 18.00 WIB)\r\n'),
(6, 16, 'Perbanyak konsumsi serat, buah dan air putih 2L perhari'),
(7, 16, 'Tidur secara teratur, paling telat jam 22.00 WIB dan bangun lebih dini, kurang dari jam 06.00 WIB'),
(8, 16, 'Kurangi konsumsi rokok dan kopi'),
(9, 16, 'Paksakan untuk puasa HP/Game Online '),
(10, 16, 'Sempatkan untuk membahagiakan diri sendiri, seperti tamasya (outing) ke tempat yang membuat diri kamu nyaman selama  seminggu sekali'),
(11, 16, 'Perbaiki hubungan dengan keluarga dan teman dekat, upayakan intens berkomunikasi dengan orang dekat'),
(12, 16, 'Ikuti kajian ilmu keagamaan rutin minimal seminggu sekali'),
(13, 16, 'Lakukan passion anda (membaca, menulis, atau lainnya)  minimal seminggu sekali'),
(14, 16, 'Jika anda di usia matang (23-30 tahun) namun belum memiliki pasangan, cobalah untuk berta’aruf'),
(15, 17, 'Anda sudah dalam level berat dalam kecanduan bermain game online, segeralah hubungi psikolog!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `email`, `foto`, `level`) VALUES
(1, 'Eka Nurseva Saniyah', 'eka', '$2y$10$6iUNpnVUyRDy83nTBtqZ0e958GUQ6q5pA5q/PScVnIkkT9UMK3GAi', 'ekanursevas@gmail.com', '64eb7d97e138e.jpg', 'Admin'),
(2, 'Ali Asyidiqiansyah', 'ali', '$2y$10$ss.R0CZO/EkdSt3Zxcw4YuL4gVbnNlWmJ6Ae9mivgKjr4LkNB6P12', 'aliasss@gmail.com', '64fc07a5463ab.jpg', 'User'),
(5, 'Nurseva S', 'seva', '$2y$10$c9hDYIndNWRY7Dhn4FNRSu3wKLzw7JyZ9GUAnjFH0gHMdZGrhnLMu', 'nursevasa@gmail.com', '64fc782790aab.jpeg', 'User'),
(9, 'Siti Syarifah M', 'siti18', '$2y$10$c1V1kNg7Jo4k9DEc0sZoUuu6ctfVs5BgtmKA/CQ9iu6Fc0BsfCqRu', 'sitisyarifahmudaim19@gmail.com', '64d8d35768301.jpg', 'User'),
(10, 'Ali Asya', 'aliasya', '$2y$10$.MUsxEpC50UgTcMNPL0s2exEUOylQzF2divqgeOwZIQHw0RSAf.Ja', 'aliasyadiqian@gmail.com', 'default.png', 'User'),
(14, 'User', 'user', '$2y$10$vtJ1379MXo05EKNI9ZdDd.2vjBS39PSrbxao0inB/G9D9s8lrFGV2', 'user1@gmail.com', '64fec6428e429.png', 'User'),
(15, 'User2', 'user2', '$2y$10$mNRlBmXgVVm6BqjSbdY79ukUrkzD1AD620QEnteTij4iJgBhVLOeq', 'user2@gmail.com', 'default.png', 'User'),
(19, 'azka', 'maulanazka', '$2y$10$eh.d.Km2IhMNK0QIyUrPm.QaTrDTNL.R/izFvOXb5Mvcv2Ys2Jwc2', 'askamualana6@gmail.com', 'default.png', 'User'),
(20, 'Bubu', 'bubu', '$2y$10$JJykw2RjTRnUy/IW8Jmvruouu8R1wAQB1uENNdSNpvm1xhdU/Vfkm', 'ekanursevas@gmail.com', '650cbbe79453f.jpg', 'Ortu'),
(21, 'tiwwi', 'wii', '$2y$10$a/ex1iygwAAEsMhDp5E8.eCt6LqpgH/.ms8YewuQZS6zXRm0JJpJq', 'mgpratiwwi@gmail.com', 'default.png', 'User'),
(24, 'Halimatus Sadiyah', 'atus', '$2y$10$FuFtfGf9JuIiQyLSBtexnOdy/d/.0/kPruY.ytFTmy8a7fk7QYIGK', 'halimatussadiyah281@gmail.com', 'default.png', 'User'),
(27, 'Maulana', 'maul', '$2y$10$KfJvZ2dRRxKGq.BUzTETVOHNmkUAqitnjWerha6QfcX29l5qPWtuG', 'maulanaya@gmail.com', 'default.png', 'Ortu'),
(28, 'Aris Sabthazi', 'aris', '$2y$10$NR7HcvgaOfGiuCGRMPGT3uMpvNhybUNYr8mqTJyuW/GMvp1t64xTu', 'arissabthazi@gmail.com', 'default.png', 'Ortu'),
(29, 'Tiara Dian Santika', 'tiara', '$2y$10$ZkAdqG3MmY1sIJL6pJK7Ku2IbNSxv0b.DE3LahIRrJigoYcpcVplW', 'tiaradians@gmail.com', 'default.png', 'User'),
(30, 'Fajar Rifai', 'fajar', '$2y$10$XUiQNb32W5rEOcQyKqRr3.OBJqUlvBPu5ZeJolgnosy.d8UVcJj.y', 'frifai.fajar@gmail.com', 'default.png', 'User'),
(31, 'Pandu Winata', 'winata', '$2y$10$pACKTi0WjW09NM2gScTcju0xc0d9yd1tY1ntOLr566u7Qvoq4hTHS', 'panduwina@gmail.com', 'default.png', 'User'),
(32, 'Ahmad Ridho Haibah', 'ridho', '$2y$10$pPxWy5MWjJEX4z41VyFHsO1V4NGZzksUmu1.0Uvt.nH6ZNdfH9hfO', 'ridho.ahmadh@gmail.com', 'default.png', 'User'),
(33, 'Saputra', 'saputra', '$2y$10$IEs0hGMSMb3EeEtpwPA1fePspzYL6o0x765P1Yd6dywwu4WJN9.TG', 'saputra23@gmail.com', 'default.png', 'User'),
(34, 'Muhammad Muhyi', 'muhyi', '$2y$10$NNVtgFVuVe49JjxRvW8RcOJVwCITmy7Jbs3i0.c3RSdDXRUpz3drW', 'muh.muhyi@gmail.com', 'default.png', 'User'),
(35, 'Fahrian Wibowo', 'fahrian', '$2y$10$ZVYnd74hJk5biTUKCNj0..CyjB4UEeYbx7S/Ira6Z7hZwB4p63JUW', 'fahrianwibowo@gmail.com', 'default.png', 'User'),
(36, 'Jihan Delly Naysilla', 'jihan', '$2y$10$/uMeYPNFDTeiE2Xd5g3XHe6xKhj/7/MhtThC2ZTDeWZyY5IecI5cq', 'jihan.naysilla@gmail.com', 'default.png', 'User'),
(37, 'Sultan reza Apriansyah', 'reza', '$2y$10$ezSXbvleIK5LZm2N741ou.7HMIzr.1VwkHk/66XBfGo643/CINRMi', 'rezaapriansyah@gmail.com', 'default.png', 'User'),
(38, 'Cantika Satya Bhayangkari', 'cantika', '$2y$10$pZeE0fwjSWrQl61LzLg5gOS4c0R1vZcv91UwlFUWUTC2MtPJHp.8a', 'cantika.satya@gmail.com', 'default.png', 'User'),
(39, 'Cinta Oktaviani', 'cinta', '$2y$10$7n8Q.8d3h/j7oT4ouT4Fquqze4woWTEv5l/ULxCnP0hkPONShh8HC', 'cintiaokt10@gmail.com', 'default.png', 'User'),
(40, 'Ratna Anjali', 'ratna', '$2y$10$zrRsgr0fq47NYtOWJITI7e1mcwCSBzJkviEPtWb6d2Iw0yquFdWCy', 'ratnaanjali03@gmail.com', 'default.png', 'User'),
(41, 'Adik Rowe', 'rowe', '$2y$10$U2Si9MQxtINkBs/YWf5fhO5KWfKdTWxz/MBes9.sOiAepftpRdOAS', 'adikrowe@gmail.com', 'default.png', 'User'),
(42, 'Nicolas Octavian', 'nico', '$2y$10$j1.plNf/zwJzDAT4wGBvVOK4VEnUkKatOJ.xWoyh1TnzdnSLLK83y', 'nicolas.octavian@gmail.com', 'default.png', 'User'),
(43, 'Reyhan Panca Satria Hardiana', 'rey', '$2y$10$KyVpsNFm0y7dUsCW.sZnSeoTJgiJwBW0/5dUqDHM5QEZPYnY8n80K', 'reyhanpanca.satria@gmail.com', 'default.png', 'User'),
(44, 'Tania', 'tania', '$2y$10$M/A/znkRp6yuIQJRSP62BueKG1vyPsIdTlps33wShMaIYZf/IXttW', 'tania320@gmail.com', 'default.png', 'Ortu'),
(45, 'Moh. Jainal', 'jainal', '$2y$10$TR7E/5O4rvsGkRycvY3YSenKg90zuzvXPaio7awWoaomlm1XFVrIG', 'jainal.mohammad@gmail.com', 'default.png', 'Ortu'),
(46, 'Jalaludin', 'udin', '$2y$10$NzvpkgBHv838KjAyylIpL.AxJHfPhs3OIRotTLUtHXgT8itpKzk3C', 'jalaludin.09@gmail.com', 'default.png', 'Ortu'),
(47, 'Habibah Putra', 'putra', '$2y$10$4TqYXWeexkgVl8quBl2TrOOTU9x5Fw6T6r.kYNLvoHBT4avgsluue', 'habibahputra@gmail.com', 'default.png', 'Ortu'),
(48, 'Jaelani', 'jae', '$2y$10$O9LAnNLu6ECAmcG9RUcqeOu58r4XUqYw773uAW9N7qGvOyFifPljS', 'jaelani20@gmail.com', 'default.png', 'Ortu'),
(49, 'Maryam', 'maryam', '$2y$10$Auemy8vCSfYUeuw6pAa7nOfusNhYOWG0ie4tZdeWDXbII5FJosF5C', 'maryam.m@gmail.com', 'default.png', 'Ortu'),
(50, 'Wibowo', 'bowo', '$2y$10$IEv7loc7NtftbDQkLrIt/eKwB8suPu5iBx0u.YmzNuL2rXZwgLr2.', 'wibowo.bowo12@gmail.com', 'default.png', 'Ortu'),
(51, 'Tanti Suprianti', 'tanti', '$2y$10$kEDvbceh0coDN55eQD1qkueQxw/2EiWwrP49ddt4UewZhR1OavhrK', 'suprianti_tanti@gmail.com', 'default.png', 'Ortu'),
(52, 'Ichtiarin S', 'arin', '$2y$10$/gIdPcB8IkquNjqKk5hMH.At/tnHWHe1Cfz1cwActVy.YF0qQa8nO', 'ichtiarin7s@gmail.com', 'default.png', 'Ortu'),
(53, 'Heri Bhayangkari', 'heri', '$2y$10$DyLzM7LNSvaMF4kwWWZtmOjhT1ZnQi/krH31ScTW3/YeMqusjyvBC', 'bhayangkasi_herri@gmail.com', 'default.png', 'Ortu'),
(54, 'Dwi Dewi', 'dewi', '$2y$10$sHLlQxCYH7sHh5Oh7cLPCu9yEor4qwzeT2rZ7GPTWM.cQlj6j2xsy', '2dewi.dwi@gmail.com', 'default.png', 'Ortu'),
(55, 'Dian', 'dian', '$2y$10$ryBtUlluLg8VSSpHYF6/Je/VcZequL3scUbvuPsvKMipDCNJAPSYW', 'dian0921@gmail.com', 'default.png', 'Ortu'),
(56, 'Yani', 'yani', '$2y$10$Q9dAi9M/0BLUqIbun5/azej4P9vHuAAyV4Vh/D9fKLI4QX6u8qf0q', 'yaniyani@gmail.com', 'default.png', 'Ortu'),
(57, 'Maulana Muna', 'muna', '$2y$10$Vp6Kffw9.IqALB.7AwtCKO2dyUigHl2HyzYp9YDrS1yd45iIKgIdG', 'maulanamuna@gmail.com', 'default.png', 'Ortu'),
(58, 'Dhamar S', 'dhamar', '$2y$10$7ExZAJpm94PrPjmpLM0QF.CobgAgcUk0zIVLJG4W8NJ5aUf7zXNIu', 'dhamar.suryana@gmail.com', 'default.png', 'Ortu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `ind_gejala`
--
ALTER TABLE `ind_gejala`
  ADD PRIMARY KEY (`idindikator`),
  ADD KEY `idkriteria` (`idkriteria`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idkriteria`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`),
  ADD KEY `idindikator` (`idindikator`);

--
-- Indeks untuk tabel `rel_indikator`
--
ALTER TABLE `rel_indikator`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `rel_kriteria`
--
ALTER TABLE `rel_kriteria`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`idsolusi`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `ind_gejala`
--
ALTER TABLE `ind_gejala`
  MODIFY `idindikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `rel_indikator`
--
ALTER TABLE `rel_indikator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `rel_kriteria`
--
ALTER TABLE `rel_kriteria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `solusi`
--
ALTER TABLE `solusi`
  MODIFY `idsolusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ind_gejala`
--
ALTER TABLE `ind_gejala`
  ADD CONSTRAINT `ind_gejala_ibfk_1` FOREIGN KEY (`idkriteria`) REFERENCES `kriteria` (`idkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`idindikator`) REFERENCES `ind_gejala` (`idindikator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
