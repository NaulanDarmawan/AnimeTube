-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2024 at 11:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sinopsis` text NOT NULL,
  `gambar` text NOT NULL,
  `id_genre` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `nama`, `slug_nama`, `sinopsis`, `gambar`, `id_genre`, `id_user`) VALUES
(6, 'Oshi No Ko', 'oshi-no-ko', 'Dalam industri hiburan, berbohong adalah senjatanya.\r\nSetiap hari, Goro, seorang dokter kandungan dan ginekolog yang bekerja di kota kecil, menjalani kehidupan yang tidak ada hubungannya dengan bisnis hiburan.\r\nNamun, idola Hoshino Ai yang dia &quot;ikuti&quot; mulai naik ke daftar bintang.\r\nKeduanya menyadari skenario terburuk mereka, dan sejak saat itu, roda takdir mulai berputar.', 'WhatsApp Image 2024-07-03 at 18.46.59.jpeg', 4, 4),
(7, 'Solo Leveling', 'solo-leveling', '10 tahun yang lalu, sebuah gerbang yang menghubungkan dunia manusia dengan alam yang berisi sihir dan monster tiba-tiba muncul dan disebut dengan nama &quot;Gate&quot;. Untuk mengalahkan monster-monster ganas ini, manusia biasa yang menerima kekuatan super dikenal sebagai &quot;Hunters&quot; akan masuk ke Gerbang dan mengalahkannya. Sung Jin Woo adalah salah satu dari Hunters yang dikenal sebegai &quot;Terlemah&quot; dikarenakan kemampuannya yang hampir tidak ada. Tetapi dia tetap bersusah payah masuk ke Gate untuk membayar tagihan rumah sakit ibunya.\r\nKehidupan menyedihkan Sung Jin Woo berubah setelah dia menjadi satu-satunya yang selamat dari misi dan membuka matanya tiga hari kemudian dengan sebuah layar misterius muncul di depan wajahnya. &quot;Daftar Misi&quot; menuntut Jin Woo untuk menyelesaikan program pelatihan intens dan tidak realistik dengan hukuman jika tidak dilakukan. Dengan enggan dia melakukannya tanpa menyadari bahwa sebentar lagi dia akan menjadi salah satu Hunter paling menakutkan di dunia.', 'WhatsApp Image 2024-07-03 at 18.47.00.jpeg', 3, 4),
(8, 'Jujutsu Kaisen', 'jujutsu-kaisen', 'Di dunia di mana para iblis memakan manusia yang tak sadar dirinya menjadi mangsa, serpihan dari iblis legendaris dan paling ditakuti, Ryoumen Sukuna telah hilang tanpa jejak. Iblis mana pun yang memakan anggota tubuh Sukuna akan mendapatkan kekuatan yang mampu menghancurkan dunia. Untungnya, ada sebuah sekolah misterius bernama Jujutsu yang didirikan untuk melindungi manusia dari bahaya itu!Itadori Yuji adalah seorang murid SMA yang menghabiskan waktunya merawat kakeknya yang sakit-sakitan. Meski terlihat seperti murid SMA kebanyakan, kekuatan fisiknya yang luar biasa membuatnya menonjol dari murid lain. Semua ekskul olahraga ingin merekrutnya, namun Itadori justru lebih senang bergaul dengan murid-murid tersisih dari ekskul gaib. Suatu hari, ekskul gaib mendapatkan pusaka terkutuk, namun mereka tak mengetahui teror macam apa yang akan muncul jika segelnya terbuka.', 'WhatsApp Image 2024-07-03 at 18.47.01.jpeg', 3, 4),
(9, 'Overlord', 'overlord', 'Bagaimana Ainz Ooal Gown sebagai raja di Sorcerer Kingdom akan memimpin kerajaan ini?\r\nDengan kerja keras tanpa mengenal lelah para NPC seperti Albedo, Demiurge, dan Undead lainnya, Sorcerer Kingdom sekarang menjadi tempat yang aman dan tidak pernah kelaparan lagi. Tapi penduduk di sana masih merasa takut dan cemas. Jalan-jalan sepi bagaikan malam hari setelah lampu-lampu dimatikan, kota itu kehilangan kemeriahannya yang dulu.\r\nTanpa tahu jawabannya terlebih dahulu, Ainz mengunjungi Guild Adventurer seorang diri dan memberikan sebuah saran kepada ketua Guild Adventurer, Ainzach.\r\nDi sisi lain, penguasa dari kerajaan lain yang merasa tercengang akan kemunculan tiba-tiba Sorcerer Kingdom mulai mengambil tindakan. Akankah Ainz berhasil menghentikan konspirasi dari kerajaan-kerajaan lain dan membangun tempat impiannya?', 'WhatsApp Image 2024-07-03 at 18.47.00 (1).jpeg', 3, 4),
(10, 'Petualangan Cyber', 'petualangan-cyber', 'Lorem Ipsum Dolor SIt Amet', 'banner02.jpg', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `anime_comments`
--

CREATE TABLE `anime_comments` (
  `id` int NOT NULL,
  `anime_id` int NOT NULL,
  `user_id` int NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anime_comments`
--

INSERT INTO `anime_comments` (`id`, `anime_id`, `user_id`, `komentar`) VALUES
(19, 10, 4, 'Halo Semuanya');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `judul` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `slug_judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `waktu_upload` timestamp NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug_judul`, `deskripsi`, `foto`, `waktu_upload`, `waktu_update`, `user_id`) VALUES
(7, 'Programming Terbaru', 'programming-terbaru', 'Gasido wes', 'carbon (1).png', '2024-07-03 09:20:30', '2024-07-03 09:20:46', 4);

-- --------------------------------------------------------

--
-- Table structure for table `berita_comments`
--

CREATE TABLE `berita_comments` (
  `id` int NOT NULL,
  `id_berita` int NOT NULL,
  `id_user` int NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita_comments`
--

INSERT INTO `berita_comments` (`id`, `id_berita`, `id_user`, `komentar`) VALUES
(6, 7, 4, 'Halo Semuanya');

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `id` int NOT NULL,
  `id_anime` varchar(100) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`id`, `id_anime`, `link`) VALUES
(12, 'oshi-no-ko', 'https://www.youtube.com/embed/7P42Qjcl8qA?si=O68R8PdYZpszgodB'),
(13, 'oshi-no-ko', 'https://www.youtube.com/embed/ZRtdQ81jPUQ?si=y9Eor19PtEXteBal'),
(14, 'petualangan-cyber', 'https://www.youtube.com/embed/jIfogFtgV-o?si=RZg7jAWc8SxFPpz2'),
(15, 'petualangan-cyber', 'https://www.youtube.com/embed/pmanD_s7G3U?si=o_eZyPp29O5KH103');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `nama`) VALUES
(1, 'Komedi'),
(2, 'Petualangan'),
(3, 'Fiksi Ilmiah'),
(4, 'Musik');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`) VALUES
(19, 'Naulan Darmawan 2', '23.51.0001', 'naulan@gmail.com', 'S1 - Sistem Informasi'),
(20, 'Alya Eka Safitri', '23.31.0001', 'alya@gmail.com', 'D3 - Sistem Informasi'),
(21, 'Dido Fajar Satria', '23.52.0001', 'dido@gmail.com', 'S1 - Teknik Informatika'),
(22, 'Isna Saharal Fitrah', '23.51.0002', 'isna@gmail.com', 'S1 - Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug_nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `slug_nama`, `email`, `password`, `role`, `image`) VALUES
(4, 'Imelda Nadila', 'imelda-nadila', 'imelda@gmail.com', '$2y$10$j8giVXgoW87.RMCnwsEgOOz4DsqAgVluRvG.QoVUyzP7a5G2OTLUS', 'Admin', 'profile.png'),
(5, 'Ferdi', 'ferdi', 'ferdi@gmail.com', '$2y$10$Dj3ckqcH7wj26jM516NdnON.ZAjI8YfwZVOfQ.E.geKPt1tZvNYNG', 'Creator', 'profile.png'),
(7, 'user', 'user', 'user@gmail.com', '$2y$10$as9azPHLJPczVxMmOMy29OtHBHjIvucqeBZbdPmu3CiuNFwZluDLe', 'User', 'profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_nama` (`slug_nama`),
  ADD KEY `anime_genre` (`id_genre`),
  ADD KEY `anime_user` (`id_user`);

--
-- Indexes for table `anime_comments`
--
ALTER TABLE `anime_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_comment` (`anime_id`),
  ADD KEY `comment_user` (`user_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_user` (`user_id`);

--
-- Indexes for table `berita_comments`
--
ALTER TABLE `berita_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_comment` (`id_berita`),
  ADD KEY `berita_comments_user` (`id_user`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_episode` (`id_anime`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug-nama` (`slug_nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anime_comments`
--
ALTER TABLE `anime_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `berita_comments`
--
ALTER TABLE `berita_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `anime_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anime_comments`
--
ALTER TABLE `anime_comments`
  ADD CONSTRAINT `anime_comment` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_comments`
--
ALTER TABLE `berita_comments`
  ADD CONSTRAINT `berita_comment` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_comments_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `anime_episode` FOREIGN KEY (`id_anime`) REFERENCES `anime` (`slug_nama`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
