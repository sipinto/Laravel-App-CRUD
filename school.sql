-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-11-10 10:26
-- 서버 버전: 10.4.28-MariaDB
-- PHP 버전: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `school`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postId` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `failed_jobs`
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
-- 테이블 구조 `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `postId` bigint(20) UNSIGNED NOT NULL,
  `imgAdd` varchar(255) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `images`
--

INSERT INTO `images` (`id`, `category`, `postId`, `imgAdd`, `imgName`, `created_at`, `updated_at`) VALUES
(1, 'notice', 3, 'public/storage/notice/KakaoTalk_20230618_152702446.jpg', 'KakaoTalk_20230618_152702446.jpg', '2023-11-02 02:42:49', '2023-11-02 02:42:49'),
(2, 'notice', 4, 'public/storage/notice/버터.png', '버터.png', '2023-11-02 02:44:22', '2023-11-02 02:44:22'),
(3, 'board', 5, 'public/storage/board/버터.png', '버터.png', '2023-11-02 02:45:54', '2023-11-02 02:45:54'),
(4, 'notice', 6, 'public/storage/notice/KakaoTalk_20230619_212836928.jpg', 'KakaoTalk_20230619_212836928.jpg', '2023-11-09 18:33:50', '2023-11-09 18:33:50'),
(5, 'board', 7, 'public/storage/board/KakaoTalk_20230618_152702446.jpg', 'KakaoTalk_20230618_152702446.jpg', '2023-11-09 18:34:23', '2023-11-09 18:34:23'),
(6, 'board', 8, 'public/storage/board/KakaoTalk_20230618_152702446.jpg', 'KakaoTalk_20230618_152702446.jpg', '2023-11-09 18:35:41', '2023-11-09 18:35:41'),
(7, 'board', 9, 'public/storage/board/KakaoTalk_20231017_225306414.jpg', 'KakaoTalk_20231017_225306414.jpg', '2023-11-09 18:37:07', '2023-11-09 18:37:07'),
(8, 'board', 10, 'public/storage/board/로꼬.png', '로꼬.png', '2023-11-09 18:37:39', '2023-11-09 18:37:39');

-- --------------------------------------------------------

--
-- 테이블 구조 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_27_020718_create_posts_table', 1),
(6, '2023_10_27_020743_create_comments_table', 1),
(7, '2023_11_02_103107_create_images_table', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `personal_access_tokens`
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

--
-- 테이블의 덤프 데이터 `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'als@g.yju.ac.kr', '966ed18e4e5850f3b9386cef466015f02e6924e7f52ef9c09b76c9762611f67d', '[\"admin\"]', NULL, NULL, '2023-11-02 02:39:22', '2023-11-02 02:39:22'),
(2, 'App\\Models\\User', 1, 'als@g.yju.ac.kr', '05ae94081bb28f992d315b2ce256eb36a673e6fe9027de615962136952e87f8b', '[\"admin\"]', NULL, NULL, '2023-11-09 18:15:05', '2023-11-09 18:15:05'),
(3, 'App\\Models\\User', 1, 'als@g.yju.ac.kr', '6e4e0cf38d3350232dcb9117f7a63de54c968fa6d8b3bcca8e88c4d04ff68d7d', '[\"admin\"]', NULL, NULL, '2023-11-09 22:34:37', '2023-11-09 22:34:37');

-- --------------------------------------------------------

--
-- 테이블 구조 `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `content`, `email`, `writer`, `created_at`, `updated_at`) VALUES
(1, 'notice', '1호점은 치킨이다', '그렇지?', 'als@g.yju.ac.kr', '김민재', '2023-11-02 02:39:38', '2023-11-02 02:39:38'),
(2, 'notice', '1호점은 치킨이다', '그렇지?', 'als@g.yju.ac.kr', '김민재', '2023-11-02 02:40:20', '2023-11-02 02:40:20'),
(3, 'notice', '1호점은 치킨이다', '그렇지?', 'als@g.yju.ac.kr', '김민재', '2023-11-02 02:42:49', '2023-11-02 02:42:49'),
(4, 'notice', '아하', '이런', 'als@g.yju.ac.kr', '김민재', '2023-11-02 02:44:22', '2023-11-02 02:44:22'),
(5, 'board', '넌 너무 많이 알았어', '많이 살았지?', 'als@g.yju.ac.kr', '김민재', '2023-11-02 02:45:54', '2023-11-02 02:45:54'),
(6, 'notice', '공지사항 잠시만 빌릴게요', '근데 어쩌라고', 'als@g.yju.ac.kr', '김민재', '2023-11-09 18:33:50', '2023-11-09 18:33:50'),
(7, 'board', '일반글 접수를 위해서 오늘부터 1일', '알빠고', 'als@g.yju.ac.kr', '김민재', '2023-11-09 18:34:23', '2023-11-09 18:34:23'),
(8, 'board', '입사전까지 놁겁니다', '근데 님은 못하죠?', 'als@g.yju.ac.kr', '김민재', '2023-11-09 18:35:41', '2023-11-09 18:35:41'),
(9, 'board', '무플 방지를 위해 힘써주세요', '근데 또 있으면 보기 싫음', 'als@g.yju.ac.kr', '김민재', '2023-11-09 18:37:07', '2023-11-09 18:37:07'),
(10, 'board', '오홍', '우흥', 'als@g.yju.ac.kr', '김민재', '2023-11-09 18:37:39', '2023-11-09 18:37:39');

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `position`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '김민재', 'als@g.yju.ac.kr', 'admin', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 12:23:59', '2023-11-01 12:23:59'),
(2, '김세진', 'e1@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 12:43:52', '2023-11-01 12:43:52'),
(3, '기묘선', 'e2@g.yju.ac.kr', 'user', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 03:23:59', '2023-11-01 03:23:59'),
(4, '이예슬', 'e3@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 03:43:52', '2023-11-01 03:43:52'),
(5, '춘왕리', 'e4@g.yju.ac.kr', 'admin', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 03:23:59', '2023-11-01 03:23:59'),
(6, '김빛나', 'e5@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 03:43:52', '2023-11-01 03:43:52'),
(7, '김민재', 'e6@g.yju.ac.kr', 'user', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 03:23:59', '2023-11-01 03:23:59'),
(8, '우현정', 'e7@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 03:43:52', '2023-11-01 03:43:52'),
(9, '손민정', 'e8@g.yju.ac.kr', 'user', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 03:23:59', '2023-11-01 03:23:59'),
(10, '마자운', 'e9@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 03:43:52', '2023-11-01 03:43:52'),
(11, '강서연', 'e10@g.yju.ac.kr', 'admin', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 03:23:59', '2023-11-01 03:23:59'),
(12, '조코체프', 'e11@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 03:43:52', '2023-11-01 03:43:52'),
(13, '우진우', 'e12@g.yju.ac.kr', 'admin', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 03:23:59', '2023-11-01 03:23:59'),
(14, '하수현', 'e13@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 03:43:52', '2023-11-01 03:43:52'),
(15, '은지우', 'e14@g.yju.ac.kr', 'admin', NULL, '$2y$10$tzXoknK0k1NaurIoiZG2yedRhIchAeMLdbCVYb3rmOq37vIkyaKGS', NULL, '2023-11-01 03:23:59', '2023-11-01 03:23:59'),
(16, '강유라', 'e15@g.yju.ac.kr', 'user', NULL, '$2y$10$rUC7qmU6ZlQg0ZiRQ6amzuBaZNQtY9/g8kRVTj0Pi4m85uNXcdhqO', NULL, '2023-11-01 03:43:52', '2023-11-01 03:43:52');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_postid_foreign` (`postId`),
  ADD KEY `comments_email_foreign` (`email`);

--
-- 테이블의 인덱스 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 테이블의 인덱스 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_postid_foreign` (`postId`);

--
-- 테이블의 인덱스 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- 테이블의 인덱스 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 테이블의 인덱스 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_email_foreign` (`email`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 테이블의 AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_postid_foreign` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_postid_foreign` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- 테이블의 제약사항 `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
