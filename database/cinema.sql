-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2023 at 04:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed_yt` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `kode`, `judul`, `sinopsis`, `durasi`, `gambar`, `embed_yt`, `created_at`, `updated_at`) VALUES
(1, 'F001', 'Cek Toko Sebelah', 'rwin (Ernest Prakasa) menikmati hidupnya dengan karir gemilang di usia muda, dan kekasih cantik yang tak kalah sukses, Natalie (Gisella Anastasia). Tapi semua jadi pelik saat Koh Afuk (Chew Kin Wah) yang kesehatannya makin memburuk, ingin mewariskan toko sembakonya kepada Erwin, anak kesayangannya.\r\n \r\nSementara itu, Yohan (Dion Wiyoko) kakak Erwin, naik pitam karena dilangkahi. Sebagai anak sulung yang merasa lebih perhatian pada kedua orang tuanya, Yohan yakin ia dan istrinya, Ayu (Adinia Wirasti), adalah yang paling berhak meneruskan toko tersebut. Sayangnya, Koh Afuk sulit mempercayai Yohan yang selalu memberontak.\r\n \r\nApakah Erwin akan terpaksa mengorbankan karirnya untuk mengurusi toko Koh Afuk meski ditentang keras oleh Natalie? Ataukah Yohan akan berhasil meyakinkan ayahnya bahwa ia sesungguhnya lebih layak dipercaya? Nantikan CEK TOKO SEBELAH, sebuah drama komedi keluarga dari penulis, sutradara, produser, dan segenap tim kerja dibalik film NGENEST.', 95, '20231130051919.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/r9NJveLN3zI?si=RkLqskgIUx-pbouG\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-11-29 22:19:19', '2023-11-29 22:22:07'),
(2, 'F002', 'Jalan Yang Jauh Jangan Lupa Pulang', 'Selama berkuliah di London, Aurora harus berjuang keras untuk bisa bertahan hidup di negeri orang dan jauh dari keluarga. Aurora tinggal bersama temannya, Honey. Ia juga bertemu dengan sesama perantau dari Indonesia bernama J\r\nem (Ganindra Bimo), seniornya di kampus.Berawal dari rasa kagum, Aurora memutuskan untuk berpacaran dengan Jem karena memiliki visi yang sama. Suatu ketika, ambisi tersebut runtuh karena Aurora melihat sisi lain dari Jem yang tidak ia ketahui selama ini. Kejadian tersebut membuat hubungan keduanya kandas dan mengganggu studi Aurora. Tertarik untuk Menonton? Sinopsis Bayi Ajaib, Remake Film Horor Legenda Tanah Air Mengintip Sinopsis Dear David yang Tayang di Netflix Setelah kandasnya hubungan, Aurora terpaksa mengubur mimpinya. Beruntungnya Aurora memiliki dua sahabat yaitu Honey (Lutesha) dan Kit (Jerome Kurnia) yang membantunya dalam masa sulit. Honey memiliki karakter pekerja keras dan telah dianggap sebagai kakak oleh Aurora semenjak menetap di London. Adapun Kit merupakan teman laki-laki keturunan Jerman-Thailand. Kit juga merupakan sosok pekerja keras dalam meraih mimpi di London. Dalam sinopsis Jalan yang Jauh Jangan Lupa Pulang, kedua sahabatnya, Honey dan Kit menyediakan tempat tinggal untuk Aurora di apartemennya bahkan membantunya mencari pekerjaan agar memiliki penghasilan. Terlalu sibuk mencari kerja, Aurora putus kontak dengan keluarganya di Indonesia. Kondisi tersebut membuat Angkasa (Rio Dewanto) dan Awan (Rachel Amanda) memutuskan untuk menyusul ke Inggris. Mereka datang ke London untuk melihat kondisi Aurora karena selama dua bulan terakhir tidak ada kabar.', 120, '20231130052135.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/RX_F6AoQphc?si=iWty3bGRyZu-2IHx\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-11-29 22:21:35', '2023-11-29 22:21:35'),
(3, 'F003', 'Guardians Of The Galaxy', 'Brash space adventurer Peter Quill (Chris Pratt) finds himself the quarry of relentless bounty hunters after he steals an orb coveted by Ronan, a powerful villain. To evade Ronan, Quill is forced into an uneasy truce with four disparate misfits: gun-toting Rocket Raccoon, treelike-humanoid Groot, enigmatic Gamora, and vengeance-driven Drax the Destroyer. But when he discovers the orb\'s true power and the cosmic threat it poses, Quill must rally his ragtag group to save the universe.', 110, '20231130052329.jpeg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/d96cjJhvlMA?si=6OMyCjoljtOMwzN6\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-11-29 22:23:29', '2023-11-29 22:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tayangs`
--

CREATE TABLE `jadwal_tayangs` (
  `id` bigint UNSIGNED NOT NULL,
  `id_film` bigint UNSIGNED NOT NULL,
  `id_studio` bigint UNSIGNED NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `harga` double(8,2) NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_tayangs`
--

INSERT INTO `jadwal_tayangs` (`id`, `id_film`, `id_studio`, `tanggal_tayang`, `waktu_mulai`, `waktu_selesai`, `harga`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-11-28', '05:25:00', '06:26:00', 35000.00, 'Ekonomi', '2023-11-29 22:25:24', '2023-11-29 22:25:24'),
(2, 2, 2, '2023-11-28', '17:25:00', '19:27:00', 60000.00, 'VIP', '2023-11-29 22:25:57', '2023-11-29 22:25:57'),
(3, 3, 1, '2023-12-02', '20:00:00', '22:00:00', 35000.00, 'Ekonomi', '2023-11-29 22:26:37', '2023-11-29 22:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `kursis`
--

CREATE TABLE `kursis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_studio` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kursis`
--

INSERT INTO `kursis` (`id`, `id_studio`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'A001', '2023-11-29 22:24:05', '2023-11-29 22:24:05'),
(2, 1, 'A002', '2023-11-29 22:24:09', '2023-11-29 22:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_28_083945_create_films_table', 1),
(7, '2023_11_28_084004_create_studios_table', 1),
(8, '2023_11_28_084504_create_jadwal_tayangs_table', 1),
(9, '2023_11_28_085157_create_kursis_table', 1),
(10, '2023_11_28_235227_create_pemesanans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_jadwal_tayang` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_kursi` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `id_jadwal_tayang`, `id_user`, `id_kursi`, `status`, `file`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, 'Sudah Bayar', '20231130053914.jpg', '2023-11-29 22:38:31', '2023-11-29 22:41:33'),
(2, 3, 2, 2, 'Belum Bayar', 'tes', '2023-11-29 22:40:03', '2023-11-29 22:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denah_kursi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `nama`, `denah_kursi`, `created_at`, `updated_at`) VALUES
(1, 'Studio 1', '20231130052340.jpg', '2023-11-29 22:23:40', '2023-11-29 22:23:40'),
(2, 'Studio 2', '20231130052354.jpg', '2023-11-29 22:23:54', '2023-11-29 22:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$12$rHeosXiQv1mqt.cWFa39h.qNzNOX.4B6iwqZotMuscH2PgiylaTRS', 'admin', NULL, '2023-11-29 15:59:54', '2023-11-29 15:59:54'),
(2, 'user', 'user@example.com', NULL, '$2y$12$v/xYXiBf1hwlaUuribPl2eRjOwSXYR8.ak6Di6gM8qTlBLh12p6qC', 'user', NULL, '2023-11-29 22:18:01', '2023-11-29 22:18:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_tayangs`
--
ALTER TABLE `jadwal_tayangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_tayangs_id_film_foreign` (`id_film`),
  ADD KEY `jadwal_tayangs_id_studio_foreign` (`id_studio`);

--
-- Indexes for table `kursis`
--
ALTER TABLE `kursis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kursis_id_studio_foreign` (`id_studio`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanans_id_jadwal_tayang_foreign` (`id_jadwal_tayang`),
  ADD KEY `pemesanans_id_user_foreign` (`id_user`),
  ADD KEY `pemesanans_id_kursi_foreign` (`id_kursi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_tayangs`
--
ALTER TABLE `jadwal_tayangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kursis`
--
ALTER TABLE `kursis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_tayangs`
--
ALTER TABLE `jadwal_tayangs`
  ADD CONSTRAINT `jadwal_tayangs_id_film_foreign` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_tayangs_id_studio_foreign` FOREIGN KEY (`id_studio`) REFERENCES `studios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kursis`
--
ALTER TABLE `kursis`
  ADD CONSTRAINT `kursis_id_studio_foreign` FOREIGN KEY (`id_studio`) REFERENCES `studios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD CONSTRAINT `pemesanans_id_jadwal_tayang_foreign` FOREIGN KEY (`id_jadwal_tayang`) REFERENCES `jadwal_tayangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanans_id_kursi_foreign` FOREIGN KEY (`id_kursi`) REFERENCES `kursis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
