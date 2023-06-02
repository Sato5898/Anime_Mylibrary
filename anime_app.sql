-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-06-02 03:24:09
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `anime_app`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `animes`
--

CREATE TABLE `animes` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID',
  `anime_name` varchar(50) NOT NULL COMMENT 'アニメ名',
  `schedule_id` int(11) DEFAULT NULL COMMENT '行列',
  `genre` varchar(100) NOT NULL COMMENT 'ジャンル',
  `image_color` varchar(50) DEFAULT NULL COMMENT 'imgカラー',
  `official_page` varchar(255) NOT NULL COMMENT '公式サイト',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `animes`
--

INSERT INTO `animes` (`id`, `anime_name`, `schedule_id`, `genre`, `image_color`, `official_page`, `created_at`, `updated_at`) VALUES
(1, 'anime1', 11, 'ジャンル1', 'black.png', 'サイト1', '2023-05-15 15:13:51', '2023-05-16 11:18:11'),
(2, 'anime2', 66, 'ジャンル2', 'blue.png', 'サイト2', '2023-05-16 11:17:33', '2023-05-16 11:17:33'),
(3, 'anime3', 27, 'ジャンル3', 'gray.png', 'サイト3', '2023-05-16 17:00:50', '2023-05-16 17:01:10'),
(4, 'anime4', 14, 'ジャンル4', 'green.png', 'サイト4', '2023-05-16 17:02:26', '2023-05-16 17:02:26'),
(5, 'anime5', 21, 'ジャンル1', 'orange.png', 'サイト5', '2023-05-17 17:18:52', '2023-05-17 17:18:52'),
(6, 'anime6', 77, 'ジャンル3', 'pink.png', 'サイト6', '2023-05-17 17:19:02', '2023-05-17 17:19:02'),
(7, 'anime7', 32, 'ジャンル1', 'purple.png', 'サイト7', '2023-05-17 17:19:11', '2023-05-17 17:19:11'),
(8, 'anime8', 34, 'ジャンル2', 'red.png', 'サイト8', '2023-05-17 17:19:47', '2023-05-17 17:19:47'),
(9, 'anime9', 43, 'ジャンル4', 'skyblue.png', 'サイト9', '2023-05-17 17:21:57', '2023-05-17 17:21:57'),
(10, 'anime10', 55, 'ジャンル3', 'yellow.png', 'サイト10', '2023-05-17 17:22:08', '2023-05-17 17:22:08'),
(11, 'anime11', NULL, 'ジャンル1', 'yellowgreen.png', 'サイト2', '2023-06-01 16:25:15', '2023-06-01 16:25:15');

-- --------------------------------------------------------

--
-- テーブルの構造 `anime_user`
--

CREATE TABLE `anime_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `anime_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `anime_user`
--

INSERT INTO `anime_user` (`id`, `user_id`, `anime_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 2, 2, NULL, NULL),
(8, 4, 2, NULL, NULL),
(9, 2, 5, NULL, NULL),
(10, 2, 6, NULL, NULL),
(12, 2, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `broadcasts`
--

CREATE TABLE `broadcasts` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `schedule_id` int(11) DEFAULT NULL,
  `broadcast` varchar(50) NOT NULL COMMENT '放送局',
  `on_air_date` varchar(50) NOT NULL COMMENT '放送日',
  `on_air_time` varchar(50) NOT NULL COMMENT '放送時間',
  `streaming` varchar(50) NOT NULL COMMENT '動画配信サービス',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `broadcasts`
--

INSERT INTO `broadcasts` (`id`, `schedule_id`, `broadcast`, `on_air_date`, `on_air_time`, `streaming`, `created_at`, `updated_at`) VALUES
(1, 11, 'テレビ局1', '日', '23:00~23:30', 'サービス1,サービス2', '2023-05-18 11:53:03', '2023-05-18 11:53:03'),
(2, 66, 'テレビ局1', '金', '25:30～26:00', 'サービス1', '2023-05-18 11:55:59', '2023-05-18 11:55:59'),
(3, 27, 'テレビ局2', '土', '23:30~24:00', 'サービス1,サービス2,サービス3', '2023-05-18 11:56:23', '2023-05-18 11:56:23'),
(4, 14, 'テレビ局1', '水', '23:00~23:30', 'サービス2', '2023-05-18 11:56:58', '2023-05-18 11:56:58'),
(5, 21, 'テレビ局3', '日', '23:30~24:00', 'サービス2,サービス3', '2023-05-18 11:57:24', '2023-05-18 11:57:24'),
(6, 77, 'テレビ局1', '土', '26:00~26:30', 'サービス3', '2023-05-18 11:58:28', '2023-05-18 11:58:28'),
(7, 32, 'テレビ局2', '月', '24:00~24:30', 'サービス1,サービス3', '2023-05-18 11:59:01', '2023-05-18 11:59:01'),
(8, 34, 'テレビ局1', '水', '24:00~24:30', 'サービス3', '2023-05-18 11:59:19', '2023-05-18 11:59:19'),
(9, 43, 'テレビ局2', '火', '24:30~25:00', 'サービス1,サービス2,サービス3', '2023-05-18 11:59:55', '2023-05-18 11:59:55'),
(10, 55, 'テレビ局3', '木', '25:00~25:30', 'サービス3', '2023-05-18 12:00:27', '2023-05-18 12:00:27'),
(11, NULL, 'テレビ局4', '木', '25:00~25:30', 'サービス1', '2023-06-01 16:26:13', '2023-06-01 16:26:13');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_22_101448_add_soft_deletes_to_users_table--table=users', 2),
(7, '2023_05_29_172935_create_tb_twitter_users_table', 3),
(8, '2023_05_30_135109_add_twitter_social_field', 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('test@test.co.jp', '$2y$10$ILsqRWYXvoBwM3KWEOEa5u4UnwA.kPPoC.CXeqvdvinUIx4TRB2ua', '2023-05-01 01:09:53');

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(50) NOT NULL COMMENT 'ロール名',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '作成日時',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-05-23 01:44:24', '2023-05-23 01:44:24'),
(2, 'tester', '2023-05-23 01:44:34', '2023-05-23 01:44:34'),
(3, 'user', '2023-05-23 01:44:41', '2023-05-23 01:44:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `schedule_id` int(11) NOT NULL COMMENT '行列(例:11=1行1列)',
  `anime_name` varchar(50) DEFAULT NULL COMMENT 'アニメ名',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `schedules`
--

INSERT INTO `schedules` (`id`, `schedule_id`, `anime_name`, `created_at`, `updated_at`) VALUES
(1, 11, 'anime1', '2023-05-17 15:17:05', '2023-06-01 15:43:52'),
(2, 12, NULL, '2023-05-17 15:19:03', '2023-05-17 15:19:03'),
(3, 13, NULL, '2023-05-17 15:19:08', '2023-05-17 15:19:08'),
(4, 14, 'anime4', '2023-05-17 15:19:11', '2023-06-01 15:43:52'),
(5, 15, NULL, '2023-05-17 15:19:13', '2023-05-17 15:19:13'),
(6, 16, NULL, '2023-05-17 15:19:16', '2023-05-17 15:19:16'),
(7, 17, NULL, '2023-05-17 15:19:19', '2023-05-17 15:19:19'),
(8, 21, 'anime5', '2023-05-17 15:19:22', '2023-06-01 15:43:52'),
(9, 22, NULL, '2023-05-17 15:19:26', '2023-05-17 15:19:26'),
(10, 23, NULL, '2023-05-17 15:19:30', '2023-05-17 15:19:30'),
(11, 24, NULL, '2023-05-17 15:19:33', '2023-05-17 15:19:33'),
(12, 25, NULL, '2023-05-17 15:19:35', '2023-05-17 15:19:35'),
(13, 26, NULL, '2023-05-17 15:19:38', '2023-05-17 15:19:38'),
(14, 27, 'anime3', '2023-05-17 15:19:40', '2023-06-01 15:43:52'),
(15, 31, NULL, '2023-05-17 15:19:43', '2023-05-17 15:19:43'),
(16, 32, 'anime7', '2023-05-17 15:19:47', '2023-06-01 15:43:52'),
(17, 33, NULL, '2023-05-17 15:19:50', '2023-05-17 15:19:50'),
(18, 34, 'anime8', '2023-05-17 15:19:53', '2023-06-01 15:43:52'),
(19, 35, NULL, '2023-05-17 15:19:55', '2023-05-17 15:19:55'),
(20, 36, NULL, '2023-05-17 15:19:58', '2023-05-17 15:19:58'),
(21, 37, NULL, '2023-05-17 15:20:01', '2023-05-17 15:20:01'),
(22, 41, NULL, '2023-05-17 15:20:03', '2023-05-17 15:20:03'),
(23, 42, NULL, '2023-05-17 15:20:07', '2023-05-17 15:20:07'),
(24, 43, 'anime9', '2023-05-17 15:20:09', '2023-06-01 15:43:52'),
(25, 44, NULL, '2023-05-17 15:20:12', '2023-05-17 15:20:12'),
(26, 45, NULL, '2023-05-17 15:20:15', '2023-05-17 15:20:15'),
(27, 46, NULL, '2023-05-17 15:20:17', '2023-05-17 15:20:17'),
(28, 47, NULL, '2023-05-17 15:20:20', '2023-05-17 15:20:20'),
(29, 51, NULL, '2023-05-17 15:20:22', '2023-05-17 15:20:22'),
(30, 52, NULL, '2023-05-17 15:20:28', '2023-05-17 15:20:28'),
(31, 53, NULL, '2023-05-17 15:20:34', '2023-05-17 15:20:34'),
(32, 54, NULL, '2023-05-17 15:20:37', '2023-05-17 15:20:37'),
(33, 55, 'anime10', '2023-05-17 15:20:39', '2023-06-01 15:43:52'),
(34, 56, NULL, '2023-05-17 15:20:42', '2023-05-17 15:20:42'),
(35, 57, NULL, '2023-05-17 15:20:44', '2023-05-17 15:20:44'),
(36, 61, NULL, '2023-05-17 15:20:46', '2023-05-17 15:20:46'),
(37, 62, NULL, '2023-05-17 15:20:48', '2023-05-17 15:20:48'),
(38, 63, NULL, '2023-05-17 15:20:51', '2023-05-17 15:20:51'),
(39, 64, NULL, '2023-05-17 15:20:53', '2023-05-17 15:20:53'),
(40, 65, NULL, '2023-05-17 15:20:56', '2023-05-17 15:20:56'),
(41, 66, 'anime2', '2023-05-17 15:20:59', '2023-06-01 15:43:52'),
(42, 67, NULL, '2023-05-17 15:21:01', '2023-05-17 15:21:01'),
(43, 71, NULL, '2023-05-17 15:21:03', '2023-05-17 15:21:03'),
(44, 72, NULL, '2023-05-17 15:21:05', '2023-05-17 15:21:05'),
(45, 73, NULL, '2023-05-17 15:21:07', '2023-05-17 15:21:07'),
(46, 74, NULL, '2023-05-17 15:21:10', '2023-05-17 15:21:10'),
(47, 75, NULL, '2023-05-17 15:21:12', '2023-05-17 15:21:12'),
(48, 76, NULL, '2023-05-17 15:21:16', '2023-05-17 15:21:16'),
(49, 77, 'anime6', '2023-05-17 15:21:19', '2023-06-01 15:43:52');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `role_id` int(50) DEFAULT 3,
  `oauth_type` varchar(100) DEFAULT '通常',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `twitter_email` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `twitter_id`, `role_id`, `oauth_type`, `name`, `email`, `twitter_email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 2, '通常', '山田太郎', 'test@test.co.jp', NULL, NULL, '$2y$10$maC7hgpujXJ//aSec3krg.ZUox5cAiC/TL5MQAmrLnUbT8imeWXaq', NULL, '2023-04-27 08:09:20', '2023-06-01 06:43:46', NULL),
(2, NULL, 1, '通常', 'admin', 'admin@co.jp', NULL, NULL, '$2y$10$IdTIFbwdEkXe6nK/T/TYy.kFm53cYUEfpAf4oWr9Qm7TrC.XGF0Yy', '6fOo93ZccKqlP96jNPkfTucg2cGjcRKCgwQsvpiWWLPigSD6QXh6rU2pF0nI', '2023-04-27 08:32:17', '2023-05-31 06:32:12', NULL),
(3, NULL, 3, '通常', 'tester1', 'test@test.com.jp', NULL, NULL, '$2y$10$HefzIEyh2BJ7G9OWGhKTNem0rQUrooVPSSyvwFOWzcB07Vnp6p/ue', NULL, '2023-05-24 04:24:54', '2023-05-25 04:00:35', NULL),
(4, NULL, 3, '通常', 'tester2', 'test@test.ne.jp', NULL, NULL, '$2y$10$ZlWi8b5U5OoARTN2XaPt/.KXQY7GKvanBGlJ7bMY8jURfZCp/cu0O', NULL, '2023-05-24 04:45:16', '2023-05-25 07:41:02', '2023-05-25 07:41:02'),
(5, NULL, 3, 'twitter', '佐藤雄太', NULL, NULL, NULL, 'eyJpdiI6IjUzQUdKbkdRL0dpZTlNcDRyOVFXd0E9PSIsInZhbHVlIjoib0JaKy9ETVBsa3JkOHhYZHNvR1g3QjRVR2lFSjJ5SjhQY0s5Z2NwRjJRdz0iLCJtYWMiOiJmYTNmNmQ3ZjI3NmVlN2Y1YTNkY2M1ZGVmYTVjODMxNzUxMjJkYTU5YTAzN2U1NGFmNTA3MGNlY2U5NTk5MDhkIiwidGFnIjoiIn0=', NULL, '2023-05-30 05:59:31', '2023-05-30 05:59:31', NULL),
(6, NULL, 3, 'twitter', '佐藤雄太', NULL, NULL, NULL, 'eyJpdiI6InhTNjJlcmJmcGhxTGFXbDR1bmFabmc9PSIsInZhbHVlIjoiMlgvUWFzL0dZY2l3VlpSYXhTSXZ5SnVmVEcxb3FXanIyOTUrSzJLOElaYz0iLCJtYWMiOiJhNjkxOWMyMjNiMDU4NjdmNWU2MzEzMDcwNzE3MDVkZmI5NDA4NGI5MzFiYzI4MTg2NWZlZjI3NmRmYTYzODljIiwidGFnIjoiIn0=', NULL, '2023-05-31 01:56:48', '2023-05-31 02:00:40', '2023-05-31 02:00:40'),
(7, NULL, 3, 'twitter', '佐藤雄太', NULL, NULL, NULL, 'eyJpdiI6Ikl6V0dYYzVuUTRORHRWeTQ0ZnkzRmc9PSIsInZhbHVlIjoiT3lLM0hFME1ZQm5VejBMZzFjYTJFaTg1bm9xV3N0RmIvdzMwTWNraXRYQT0iLCJtYWMiOiIwNmVjMmI3OThhOGFkMzU4ZjNhYWY1YmE0MTg3YWZhNDZmMmQwODkxNTYxZGY5NTZhZDBmNjI5NzllNWU1ODlmIiwidGFnIjoiIn0=', NULL, '2023-05-31 06:07:16', '2023-05-31 06:32:35', '2023-05-31 06:32:35');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- テーブルのインデックス `anime_user`
--
ALTER TABLE `anime_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anime_id` (`anime_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `broadcasts`
--
ALTER TABLE `broadcasts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `animes`
--
ALTER TABLE `animes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `anime_user`
--
ALTER TABLE `anime_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `broadcasts`
--
ALTER TABLE `broadcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=50;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `anime_user`
--
ALTER TABLE `anime_user`
  ADD CONSTRAINT `anime_id` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
