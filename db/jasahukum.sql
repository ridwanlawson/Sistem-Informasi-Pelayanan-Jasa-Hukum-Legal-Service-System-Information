-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2021 pada 08.19
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasahukum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `desk` text NOT NULL,
  `gambar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `desk`, `gambar`, `waktu`) VALUES
(1, 'Kami Keluarga Besar Sihin Advocates Mengucapkan Selamat Hari Raya Idul Adha 1442 Hijriah ', 'Selamat Hari Raya Idul Adha 1442 Hijriah semoga kita semua diberikan keberkahan selalu', 'lnd1.png', '2021-08-05 04:40:43'),
(2, 'Jasa Hukum Profesional', 'Mencari jasa hukum yang profesional? Kami solusinya', 'lnd2.png', '2021-08-05 04:42:00'),
(3, 'Melek Hukum itu Penting!', 'Hukum adalah perkara yang harus dikonsultasikan pada ahlinya agar anda tidak dimanipulasi oleh siapapun', 'lnd3.png', '2021-08-05 05:27:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_userhukum` int(11) NOT NULL,
  `id_userbiasa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_userhukum`, `id_userbiasa`, `tanggal`, `jam_mulai`, `jam_akhir`, `waktu`) VALUES
(1, 20, 14, '2021-08-05', '15:13:00', '17:00:00', '2021-08-05 08:13:56'),
(2, 10, 9, '2021-08-30', '01:00:00', '02:00:00', '2021-08-29 17:10:27'),
(3, 10, 9, '2021-08-30', '22:39:00', '00:39:00', '2021-08-30 15:39:14'),
(4, 10, 9, '2021-08-30', '22:39:00', '22:40:00', '2021-08-30 15:39:32'),
(5, 10, 9, '2021-08-30', '23:31:00', '23:34:00', '2021-08-30 16:31:19'),
(6, 10, 9, '2021-08-30', '23:31:00', '23:33:00', '2021-08-30 16:32:40'),
(7, 10, 9, '2021-08-30', '23:31:00', '23:33:00', '2021-08-30 16:33:25'),
(8, 10, 9, '2021-08-30', '23:31:00', '23:33:00', '2021-08-30 16:35:03'),
(9, 10, 9, '2021-08-30', '23:31:00', '23:33:00', '2021-08-30 16:35:48'),
(10, 10, 9, '2021-08-30', '23:31:00', '23:33:00', '2021-08-30 16:40:03'),
(11, 10, 9, '2021-08-30', '23:31:00', '23:33:00', '2021-08-30 16:40:10'),
(12, 10, 9, '2021-08-30', '23:40:00', '12:00:00', '2021-08-30 16:40:21'),
(13, 10, 9, '2021-08-30', '23:40:00', '23:42:00', '2021-08-30 16:41:24'),
(14, 10, 9, '2021-08-30', '23:40:00', '23:42:00', '2021-08-30 16:41:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `hargamin` varchar(16) NOT NULL,
  `hargamax` varchar(16) NOT NULL,
  `waktu_ditambahkan` datetime DEFAULT NULL,
  `user_penambah` int(11) NOT NULL,
  `waktu_diubah` timestamp NULL DEFAULT NULL,
  `user_pengubah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `id_jenis`, `hargamin`, `hargamax`, `waktu_ditambahkan`, `user_penambah`, `waktu_diubah`, `user_pengubah`) VALUES
(1, 2, '2000000', '10000000', '2021-08-03 09:17:06', 2021, NULL, NULL),
(3, 1, '5000000', '30000000', '2021-08-01 13:13:20', 2021, NULL, NULL),
(5, 5, '25000000', '100000000', '2021-08-05 14:30:01', 10, '0000-00-00 00:00:00', 0),
(6, 4, '1500000', '25000000', '2021-08-05 14:30:49', 10, '0000-00-00 00:00:00', 0),
(7, 1, '6678687', '7868', '2021-08-30 23:20:04', 10, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(100) NOT NULL,
  `desk_jenis` longtext NOT NULL,
  `gambar` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nm_jenis`, `desk_jenis`, `gambar`, `waktu`) VALUES
(1, 'KONSULTAN HUKUM LINGKUNGAN', 'Permasalahan lingkungan hidup telah mendorong perkembangan pengaturan lingkungan hidup yang wajib diketahui dan ditaati oleh semua pihak, terutama pelaku usaha. Permasalahan hukum lingkungan hidup dapat terjadi sejak rencana kegiatan usaha dirancang, pada saat operasional kegiatan usaha, termasuk pasca kegiatan usaha berakhir. Kebutuhan akan jasa hukum lingkungan juga tetap diperlukan pelaku usaha yang telah taat pada ketentuan peraturan perundangan-undangan, khususnya terkait perubahan kebijakan yang berimplikasi bagi kelangsungan kegiatan usaha. Dalam membantu berbagai pihak untuk menghadapi permasalahan hukum lingkungan hidup, kami dengan pengalaman lebih dari 30 tahun memberikan berbagai layanan di bidang hukum lingkungan', '30-08-2021-1.jpg', '2021-03-12 06:03:14'),
(2, 'KONSULTAN HUKUM PERUSAHAN DAN KOMERSIAL', 'Berbicara tentang Hukum perusahaan dan Hukum komersial, Setiap kegiatan usaha memiliki berbagai resiko yang perlu dikelola agar dapat menjamin kelangsungan usaha. Salah satu resiko yang senantiasa melekat pada kegiatan usaha adalah resiko hukum. Dengan pengalaman lebih dari 20 tahun di bidang hukum perusahaan dan hukum komersial, serta pengetahuan bisnis yang memadai, firma hukum kami memberikan jasa yang lengkap untuk kelangsungan kegiatan usaha meliputi pendampingan sejak rencana kegiatan usaha, pelaksanaan kegiatan usaha dan rencana pengembangan kegiatan usaha', '30-08-2021-2.jpg', '2021-03-12 18:45:21'),
(3, 'KONSULTAN HUKUM PERTAMBANGAN, ENERGI & SUMBER DAYA ALAM', 'Indonesia sebagai negara yang kaya akan sumber daya alam selalu menarik untuk investor dalam mengembangkan usahanya, mulai dari sektor pertambangan, kehutanan, perikanan dan lain-lain. Perkembangan pengaturan pengelolaan sumber daya alam, baik dalam aspek hukum, khususnya terkait perkembangan kesadaran akan kedaultan negara atas sumber daya alam telah menciptakan kondisi hukum yang dinamis dalam pengelolaan sumber daya alam sehingga memerlukan pendekatan hukum yang cerdas dalam memastikan keberlangsungan usaha di bidang ini. Pengetahuan dan jaringan kami yang luas membantu pelaku usaha di bidang pengelolaan sumber daya alam dan energi atas jasa kami yang meliputi analisa hukum, perizinan, audit, perancangan kontrak dan penegakkan hukum atas bidang :\r\n\r\nMinyak dan Gas\r\nHukum Pertambangan\r\nHukum Kehutanan\r\nPerkebunan\r\nPerikanan\r\nManufaktur\r\nTekstil\r\nEnergi Alternatif\r\nPariwisata (termasuk pariwisata ramah lingkungan)', '30-08-2021-3.jpg', '2021-08-05 13:47:50'),
(4, 'KONSULTAN HUKUM TEKNOLOGI INFORMASI', 'Perkembangan teknologi telah menjadi bagian keseharian kehidupan manusia. Kemajuan teknologi tidak jarang tidak diikuti dengan perkembangan aturan yang mengikuti perkembangan tersebut dalam rangka menjamin kepastian hukum dan kepastian berusaha. Disamping itu, pemahaman berbagai ketentuan terkait dengan teknologi informasi dari Hak Kekayaan Intelektual, Standarisasi, Kewajiban Komponen Dalam Negeri, ketentuan hukum terkait penggunaan media sosial, perjanjian pengembangan software dan lainnya sebagainya merupakan gambaran kompleks pegaturan terkait informasi teknologi. Pengetahuan yang mumpuni di bidang Teknologi Informasi melalui kemintraan dengan Perusahaan IT telah memberikan kami keunggulan dalam membantu perusahaan menghadap perkembangan teknologi informasi dan aspek hukum yang terkait didalamnya. Untuk membantu berbagai pihak di bidang teknologi informasi, maka kami menyediakan jasa antara lain :\r\n\r\nMembuat dan Menganalisa Perjanjian IT\r\nMembantu mendirikan Badan Usaha\r\nMenyediakan pemahaman yang menyeluruh mengenai aspek teknis dan hukum dalam industri IT\r\nMemfasilitasi dan merancang Pedoman dan Ketentuan terkait penggunaan media terkait IT\r\nHukum Siber dan Media\r\nMembantu pendaftaran Hak Kekayaan Intelektual', '30-08-2021-4.jpg', '2021-08-05 13:48:30'),
(5, 'KASUS PIDANA KHUSUS', 'Perkara / Kasus Pidana Khusus Adalah Merupakan Jenis Perkara-Perkara Pidana Yang Pengaturan Hukumnya Berada Di Luar Kitab Undang-Undang Hukum Pidana (Kuhp) Yang Merupakan Kitab Undang â€“ Undnag Yang Terkodifikasi, Yang Mempunyai Karakteristik Dan Penanganan Perkara Yang Khusus Dan Spesific, Baik Dari Aturan Hukum Yang Diberlakukan, Hukum Acaranya, Penegak Hukumnya Maupun Dari Lawyer Yang Menanganinya. Hukum Pidana Khusus Juga Hanya Berlaku Terhadap Subjek Hukum Tertentu, Artinya Tidak Semua Warga Negara Indonesia Dapat Diberlakukan Hukum Pidana Khusus, Walaupun Semua Warga Negara Mempunyai Potensi Sebagai Subjek Dari Hukum Pidana Khusus Tersebut. Dalam Bidang Penanganan Kasus-Kasus Hukum Pidana Khusus, Kantor Kami Dapat Menangani Berbagai Kasus Hukum Kategori Tindak Pidana Khusus. Beberapa Kasus Hukum Pidana Khusus Yang Dapat Kami Tangani Antara Lain Adalah :\r\n\r\nNarkotika & Psikotropika\r\nPidana Uu Ite\r\nTindak Pidana Haki\r\nPidana Kependudukan\r\nKewarganegaraan & Imigrasi\r\nKorupsi & Gratifikasi\r\nPidana Pornografi\r\nKdrt / Kekerasan Dalam Rumah Tangga\r\nTindak Pidana Lingkungan\r\nTindak Pidana Kehutanan\r\nPidana Pencucuian Uang\r\nTindak Pidana Kesehatan\r\nTindak Pidana Pangan\r\nPidana Perikanan & Kelautan\r\nTindak Pidana Pendidikan\r\nPidana Impor & Cukai\r\nPidana Perlindungan Anak\r\nPidana Transportasi & Penerbangan\r\nTindak Pidana Telekomunikasi\r\nPidana Perlindungan Konsumen\r\nDalam Lain Sebagainya\r\n', '30-08-2021-5.jpg', '2021-08-05 13:51:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `Id_user_hukum` int(11) DEFAULT NULL,
  `Id_user_biasa` int(11) NOT NULL,
  `judul_kasus` text NOT NULL,
  `deskripsi_kasus` longtext NOT NULL,
  `status` varchar(15) NOT NULL,
  `Waktu_kasus` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_jenis`, `Id_user_hukum`, `Id_user_biasa`, `judul_kasus`, `deskripsi_kasus`, `status`, `Waktu_kasus`) VALUES
(5, 5, 20, 9, 'Penganiayaan anak', 'saya dan anak sering dianiaya oleh suami mohon bantu saya untuk menggugat suami saya', 'selesai', '2021-08-29 20:27:50'),
(6, 3, 24, 9, 'STMIK Indonesia Padang Mengucapkan Selamat Hari Raya Idul Adha 1442 Hijriah ', 'kbgdshfchvjbknlm', 'selesai', '2021-08-30 16:10:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `nm_pengumuman` text NOT NULL,
  `status_pengumuman` varchar(30) NOT NULL,
  `waktu_pengumuman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `nm_pengumuman`, `status_pengumuman`, `waktu_pengumuman`) VALUES
(4, 'Selamat Datang di Sistem Informasi Pelayanan Jasa Hukum Pada Sihin Advocates', 'aktif', '2021-06-10 19:34:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkembangan`
--

CREATE TABLE `perkembangan` (
  `id_perkembangan` int(11) NOT NULL,
  `id_kasus` int(11) NOT NULL,
  `deskripsi_perkembangan` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `file` text NOT NULL,
  `waktu_perkembangan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkembangan`
--

INSERT INTO `perkembangan` (`id_perkembangan`, `id_kasus`, `deskripsi_perkembangan`, `status`, `file`, `waktu_perkembangan`) VALUES
(1, 5, 'Sudah dibahas dengan Komnas perlindungan Anak dan Istri', 'progress', '30-08-2021-Bab 4 Annisya 0903.doc', '2021-08-29 19:58:18'),
(3, 5, 'Kasus telah selesai suami akhirnya diminta untuk menceraikan istrinya dan hak asuh anak jatuh ke tangan istri', 'selesai', '30-08-2021-BAB IV.docx', '2021-08-29 20:11:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `init_perusahaan` varchar(10) NOT NULL,
  `desk_perusahaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nm_perusahaan`, `init_perusahaan`, `desk_perusahaan`) VALUES
(1, 'Sihin Advocates', 'SA', 'Sistem Informasi Pelayanan Jasa Hukum Pada Sihin Advocates Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_lengkap` varchar(100) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `pass` text NOT NULL,
  `level` varchar(100) NOT NULL,
  `gambar` text,
  `waktu_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_lengkap`, `nm_user`, `email`, `no_hp`, `alamat`, `pass`, `level`, `gambar`, `waktu_user`) VALUES
(9, 'jaja', 'jaja', 'jaja@gmail.com', '0812891283918', 'jl kampung durian runtuh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user', NULL, '12-09-2020 04:55:18'),
(10, 'dayat', 'dayat', 'dayat@gmail.com', '81270389862', 'Jl Kaki', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', NULL, '2020-07-25 11:40:25'),
(20, 'Rizki Budiastuti, S.H, M.H', 'rizki', 'rizkibudi@sihin.id', '0182038102830', 'Jl Pulang', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hukum', '30-08-2021-avatar-2.png', '2021-08-05 13:38:40'),
(21, 'Nofrizal , S.Kom, S.H, M.H', 'nofri', 'nofrizalpr@gmail.com', '0989809809', 'Jl Kebeneran', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hukum', '30-08-2021-avatar-1.png', '2021-08-05 13:39:55'),
(24, 'T. Furqon Aulia, S.H., M.H.', 'furqons', 'furqon@gmail.com', '81231928319', 'Jl Pulang No.1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hukum', '30-08-2021-avatar-5.png', '2021-08-30 00:58:55'),
(25, 'Rudolf Valentino Djoe, S.H', 'djoe', 'djoe@sihin.id', '8123123718273', 'Jl Kebenaran', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hukum', '30-08-2021-avatar-4.png', '2021-08-30 01:16:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `perkembangan`
--
ALTER TABLE `perkembangan`
  ADD PRIMARY KEY (`id_perkembangan`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `perkembangan`
--
ALTER TABLE `perkembangan`
  MODIFY `id_perkembangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
