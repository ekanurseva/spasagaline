-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Agu 2023 pada 16.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

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
  `hsl_kategori` varchar(45) NOT NULL,
  `hsl_kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(35, 'IND2-C', 'memiliki perilaku menentang atau tidak patuh dengan orang tua maupun aturan lain akibat sering bermain game online', 28, 0.5),
(36, 'IND1-P', 'keberfungsian psikologis diri', 29, 0.12413108189901);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `range_atas` double NOT NULL,
  `range_bawah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama_kategori`, `range_atas`, `range_bawah`) VALUES
(7, 'Ringan', 8.052, 0),
(8, 'Sedang', 16.103, 8.053),
(9, 'Berat', 24.155, 16.104);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `idkriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(20) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(29, 'P', 'Problem', 'Problems yaitu hal yang merujuk pada masalah yang disebabkan oleh kecanduan bermain game yang berlebihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `kode_pertanyaan` varchar(20) NOT NULL,
  `text_pertanyaan` text NOT NULL,
  `idindikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`idpertanyaan`, `kode_pertanyaan`, `text_pertanyaan`, `idindikator`) VALUES
(1, 'G1', 'Apakah anda terus-menerus memikirkan game online, bahkan ketika anda sedang tidak bermain selama 6 bulan terakhir?', 22),
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
(32, 'G31', 'selama 6 bulan terakhir, apakah anda sering menolak dan membantah apabila disuruh orang tua yang sedang membutuhkan bantuan sehingga membuat orang tua marah?', 35),
(33, 'G32', 'selama 6 bulan terakhir, apakah anda mengalami kesulitan tidur, gangguan nafsu makan, atau gejala fisik lainnya ketika Anda tidak bermain game online?', 36),
(34, 'G33', 'selama 6 bulan terakhir, apakah anda rela mengeluarkan banyak uang untuk membeli item dalam game online?', 36),
(35, 'G34', 'selama 6 bulan terakhir, apakah anda tidak memperhatikan kebersihan diri seperti mandi, karena terus bermain game online?', 36),
(36, 'G35', 'selama 6 bulan terakhir, apakah anda merasa tidak masalah mengorbankan waktu belajar/beraktivitas sosial hanya karena bermain game online?', 36),
(37, 'G36', 'selama 6 bulan terakhir, apakah prestasi sekolah anda mengalami penurunan akibat terlalu sering bermain game online?', 36),
(38, 'G37', 'selama 6 bulan terakhir, apakah anda mengalami masalah kesehatan seperti kelelahan atau kurang energi setelah bermain game online selama beberapa jam?', 36);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(63, 'P', 'C', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `idsolusi` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `nama_solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`idsolusi`, `idkategori`, `nama_solusi`) VALUES
(5, 7, 'Mengurangi waktu bermain game online dengan lebih memperhatikan lingkungan sekitar dan fokus terhadap hal yang positif yang mendukung aktivitas dalam mengalihkan keinginan untuk\r\nbermain game online'),
(6, 7, 'sebaiknya konsultasikan dengan psikolog/psikiater '),
(7, 8, 'Silahkan konsultasi dengan psikolog dan psikiater. '),
(8, 8, 'Berolahraga/melakukan aktivitas fisik, minimal seminggu dua kali selama 2 jam'),
(9, 8, 'Makan secara teratur : Sarapan jam 06.00 – 07.00 WIB, Makan siang jam 11.00 – 13.00 WIB, Makan malam 17.00 – 18.00 WIB\r\n'),
(10, 8, 'Perbanyak konsumsi serat, buah dan air putih 2L perhari'),
(11, 8, 'Tidur secara teratur, paling telat jam 22.00 WIB dan bangun lebih dini, kurang dari jam 06.00 WIB'),
(12, 8, 'Kurangi konsumsi rokok dan kopi'),
(13, 8, 'Paksakan untuk puasa HP/Game Online '),
(14, 8, 'Sempatkan untuk membahagiakan diri sendiri, seperti tamasya (outing) ke tempat yang membuat diri kamu nyaman selama  seminggu sekali'),
(15, 8, 'Perbaiki hubungan dengan keluarga dan teman dekat, upayakan intens berkomunikasi dengan orang dekat'),
(16, 8, 'Ikuti kajian ilmu keagamaan rutin minimal seminggu sekali'),
(17, 8, 'Lakukan passion anda (membaca, menulis, atau lainnya)  minimal seminggu sekali'),
(18, 8, 'Jika anda di usia matang (23-30 tahun) namun belum memiliki pasangan, cobalah untuk berta’aruf'),
(19, 9, 'Anda sudah dalam level berat dalam kecanduan bermain game online, segeralah hubungi psikolog.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `email`, `foto`, `level`) VALUES
(1, 'Eka Nurseva Saniyah', 'eka', '$2y$10$b4K6pXc/pRmcGLk.MdqjDeyU8JOprHX75kHXU.pYkARmRedZS/Gjy', 'ekanursevas@gmail.com', '64d51cf577e65.jpg', 'Admin'),
(2, 'Ali Asyidiqiansyah', 'ali', '$2y$10$wBGQowL3BxxRWH/f7P8j3eycrRPRN9jZmtCW/AEmWvbZUrcq6Ei.q', 'aliasss@gmail.com', '64d51cb0da085.jpg', 'User'),
(5, 'Nurseva S', 'seva', '$2y$10$c9hDYIndNWRY7Dhn4FNRSu3wKLzw7JyZ9GUAnjFH0gHMdZGrhnLMu', 'nursevasa@gmail.com', '64d521a6a81d1.jpg', 'User'),
(9, 'Siti Syarifah M', 'siti18', '$2y$10$c1V1kNg7Jo4k9DEc0sZoUuu6ctfVs5BgtmKA/CQ9iu6Fc0BsfCqRu', 'sitisyarifahmudaim19@gmail.com', '64d8d35768301.jpg', 'User'),
(10, 'Ali Asya', 'aliasya', '$2y$10$.MUsxEpC50UgTcMNPL0s2exEUOylQzF2divqgeOwZIQHw0RSAf.Ja', 'aliasyadiqian@gmail.com', 'default.png', 'User'),
(13, 'Fillah Zaki Alhaqi', 'fillah21', '$2y$10$IkJs7QoTFBWrYfXkYCX08OvxJH6dq70vKQ4LsWAc1EJUcGz6CewPm', 'fillah.alhaqi11@gmail.com', '64eb6351a1519.png', 'Admin');

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
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ind_gejala`
--
ALTER TABLE `ind_gejala`
  MODIFY `idindikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `rel_indikator`
--
ALTER TABLE `rel_indikator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `rel_kriteria`
--
ALTER TABLE `rel_kriteria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `solusi`
--
ALTER TABLE `solusi`
  MODIFY `idsolusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
