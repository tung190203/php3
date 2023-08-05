-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th8 05, 2023 lúc 04:28 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignment_php3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `pttt` varchar(255) NOT NULL DEFAULT 'Thanh toán khi nhận hàng',
  `status_bill` varchar(255) NOT NULL DEFAULT 'Đơn hàng mới',
  `cart_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`cart_id`)),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `name`, `email`, `address`, `phone`, `total`, `pttt`, `status_bill`, `cart_id`, `user_id`, `created_at`, `updated_at`) VALUES
(30, 'superadmin', 'superadmin@gmail.com', 'Bắc Giang', '0869888319', 184, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"47\"]', 2, '2023-07-26 19:32:25', '2023-07-26 19:32:25'),
(31, 'superadmin', 'superadmin@gmail.com', 'Bắc Giang', '0869888319', 17, 'Chuyển tiền online', 'Đơn hàng mới', '[\"48\"]', 2, '2023-07-27 23:14:46', '2023-07-27 23:14:46'),
(32, 'superadmin', 'superadmin@gmail.com', 'Bắc Giang', '0869888319', 126, 'Chuyển tiền online', 'Đơn hàng mới', '[\"49\"]', 2, '2023-07-27 23:25:13', '2023-07-27 23:25:13'),
(35, 'superadmin', 'superadmin@gmail.com', 'Bắc Giang', '0869888319', 2850, 'Chuyển tiền online', 'Đơn hàng mới', '[\"52\",\"53\",\"54\"]', 2, '2023-07-28 09:13:17', '2023-07-28 09:13:17'),
(36, 'user', 'user@gmail.com', 'Bắc Giang', '0869888319', 310, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"45\",\"55\"]', 3, '2023-07-28 09:17:06', '2023-07-28 09:17:06'),
(37, 'user', 'user@gmail.com', 'Bắc Giang', '0869888319', 184, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"56\"]', 3, '2023-07-28 09:17:37', '2023-07-28 09:17:37'),
(38, 'user', 'user@gmail.com', 'Bắc Giang', '0869888319', 157, 'Chuyển tiền online', 'Đơn hàng mới', '[\"57\"]', 3, '2023-07-28 09:18:19', '2023-07-28 09:18:19'),
(39, 'user', 'user@gmail.com', 'Bắc Giang', '0869888319', 11863, 'Chuyển tiền online', 'Đơn hàng mới', '[\"58\"]', 3, '2023-07-30 21:00:03', '2023-07-30 21:00:03'),
(40, 'superadmin', 'superadmin@gmail.com', 'Bắc Giang', '0869888319', 727, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"59\"]', 2, '2023-08-03 05:03:58', '2023-08-03 05:03:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Dolce & Gabbana', 'Dolce & Gabbana is an iconic Italian luxury fashion brand known for its opulent designs.', '2023-07-13 05:30:29', '2023-07-25 05:38:12'),
(2, 'Levi\'s', 'Their signature style combines sophistication, sensuality, and playfulness, making it a popular choice for those seeking a distinctive and elegant look.', '2023-07-13 05:31:00', '2023-07-25 05:35:29'),
(3, 'Kenzo', 'The brand\'s signature style combines sophistication, sensuality, and a touch of playfulness', '2023-07-13 05:35:22', '2023-07-13 05:35:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_amount` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_cart` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_size`, `product_amount`, `user_id`, `status_cart`, `created_at`, `updated_at`) VALUES
(45, 2, 'M', '1', 3, 1, '2023-07-26 09:27:53', '2023-07-28 09:17:06'),
(47, 2, 'M', '1', 2, 1, '2023-07-26 19:31:31', '2023-07-26 19:32:25'),
(48, 10, 'S', '1', 2, 1, '2023-07-27 23:14:39', '2023-07-27 23:14:46'),
(49, 1, 'S', '1', 2, 1, '2023-07-27 23:25:07', '2023-07-27 23:25:13'),
(50, 3, 'M', '1', 2, 1, '2023-07-28 02:17:28', '2023-07-28 02:17:36'),
(52, 3, 'M', '1', 2, 1, '2023-07-28 09:09:42', '2023-07-28 09:13:17'),
(53, 8, 'S', '1', 2, 1, '2023-07-28 09:10:09', '2023-07-28 09:13:17'),
(54, 5, 'S', '1', 2, 1, '2023-07-28 09:10:41', '2023-07-28 09:13:17'),
(55, 1, 'S', '1', 3, 1, '2023-07-28 09:17:00', '2023-07-28 09:17:06'),
(56, 2, 'M', '1', 3, 1, '2023-07-28 09:17:33', '2023-07-28 09:17:37'),
(57, 8, 'S', '2', 3, 1, '2023-07-28 09:18:12', '2023-07-28 09:18:19'),
(58, 3, 'XXL', '5', 3, 1, '2023-07-30 20:59:52', '2023-07-30 21:00:03'),
(59, 2, 'XL', '4', 2, 1, '2023-08-03 05:03:51', '2023-08-03 05:03:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Men Clothes', 'For man', '2023-07-13 05:35:41', '2023-07-13 05:35:41'),
(2, 'Woman Clothes', 'fashion for woman', '2023-07-13 05:36:14', '2023-07-13 05:36:14'),
(3, 'Unisex Clothes', 'fashion for both', '2023-07-13 05:36:31', '2023-07-13 05:36:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 2, 'hay quá', 10, '2023-07-27 23:14:25', '2023-07-27 23:14:25'),
(19, 2, 'đẹp', 10, '2023-07-27 23:14:34', '2023-07-27 23:14:34'),
(20, 2, 'đẹp quá', 8, '2023-07-28 09:10:03', '2023-07-28 09:10:03'),
(21, 2, 'áo này trông không giống như ảnh nhỉ', 5, '2023-07-28 09:10:37', '2023-07-28 09:10:37'),
(22, 3, 'đẹp nhỉ', 1, '2023-07-28 09:16:57', '2023-07-28 09:16:57'),
(23, 3, 'đẹp', 2, '2023-07-28 09:17:28', '2023-07-28 09:17:28'),
(24, 3, 'chả đẹp không đẹp bán sao được ba', 8, '2023-07-28 09:18:03', '2023-07-28 09:18:03'),
(25, 2, 'quả áo này chắc mua ngoài phải hơn 300 củ khoai nhỉ =))', 1, '2023-07-30 09:33:44', '2023-07-30 09:33:44'),
(26, 3, 'shop có bán thêm người không :))', 11, '2023-07-30 10:30:55', '2023-07-30 10:30:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `expiration_time` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `expiration_time`, `created_at`, `updated_at`) VALUES
(8, 'HX190203', 12.00, '2023-08-01', '2023-07-28 10:04:34', '2023-07-28 10:04:34'),
(9, 'HX19022003', 10.00, '2023-08-24', '2023-07-31 19:22:00', '2023-07-31 19:22:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_07_01_054552_create_categories_table', 1),
(5, '2023_07_01_055615_create_brands_table', 1),
(6, '2023_07_03_110808_create_products_table', 1),
(10, '2023_07_07_121743_create_bills_table', 2),
(11, '2023_07_08_080411_create_carts_table', 2),
(14, '2023_07_13_173147_create_coupons_table', 3),
(15, '2023_07_14_171620_create_comments_table', 4),
(18, '2023_07_05_115650_create_users_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'male',
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `size` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`size`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `amount`, `description`, `price`, `images`, `gender`, `brand_id`, `category_id`, `size`, `created_at`, `updated_at`) VALUES
(1, 'Áo sơ mi nơ', 13.00, 'Áo sơ mi nơ: Áo sơ mi nam với nơ trên cổ, tạo điểm nhấn thanh lịch và độc đáo.', 123.00, '1689252004.jpg', 'Male', 1, 1, '[\"S\",\"L\",\"XL\"]', '2023-07-13 05:40:04', '2023-07-28 09:17:06'),
(2, 'Quần tây cắt may tỉ mỉ', 209.00, 'Quần tây cắt may tỉ mỉ: Quần tây nam chất liệu cao cấp, được thiết kế tỉ mỉ, tạo vẻ lịch sự và đẳng cấp.', 181.00, '1689252043.jpg', 'Male', 2, 1, '[\"M\",\"L\",\"XL\"]', '2023-07-13 05:40:43', '2023-08-03 05:03:58'),
(3, 'Áo vest lịch lãm', 215.00, 'Áo vest lịch lãm: Áo vest nam sang trọng, phù hợp với các dịp đặc biệt, mang đến phong cách điệu đà.', 2372.00, '1689252089.jpg', 'Male', 3, 1, '[\"M\",\"L\",\"XXL\"]', '2023-07-13 05:41:29', '2023-07-30 21:00:03'),
(4, 'Quần jeans cạp cao', 65.00, 'Quần jeans cạp cao: Quần jeans nam cạp cao, ôm vừa vặn, tạo vẻ nam tính và hiện đại.', 20.00, '1689252138.jpg', 'Male', 2, 1, '[\"S\",\"M\",\"L\"]', '2023-07-13 05:42:18', '2023-07-18 11:27:05'),
(5, 'Áo thun polo đơn giản', 41.00, 'Áo thun polo đơn giản: Áo thun polo nam với thiết kế đơn giản, tạo sự trẻ trung và thoải mái trong mọi hoạt động.', 392.00, '1689252532.jpg', 'Male', 2, 1, '[\"S\",\"M\",\"L\",\"XL\"]', '2023-07-13 05:48:52', '2023-07-28 09:13:17'),
(6, 'Áo khoác da nam', 23.00, 'Áo khoác da nam: Áo khoác da nam thời trang, tạo phong cách cá nhân mạnh mẽ và bụi bặm.', 23.00, '1689252608.jpg', 'Male', 2, 1, '[\"S\",\"M\",\"XL\",\"XXL\"]', '2023-07-13 05:50:08', '2023-07-13 05:50:08'),
(7, 'Áo hoodie thể thao', 65.00, 'Áo hoodie thể thao: Áo hoodie nam thể thao, mang đến sự thoải mái và phong cách năng động.', 33.00, '1689252735.jpg', 'Male', 2, 1, '[\"S\",\"M\",\"XXL\"]', '2023-07-13 05:52:15', '2023-07-19 10:16:26'),
(8, 'Áo sơ mi trắng đơn giản', 7.00, 'Áo sơ mi trắng đơn giản: Áo sơ mi nữ màu trắng đơn giản, phù hợp cho các dịp công việc hay hẹn hò, tạo vẻ trẻ trung và thanh lịch.', 77.00, '1689252797.jpg', 'Female', 2, 2, '[\"S\",\"M\",\"L\"]', '2023-07-13 05:53:17', '2023-07-28 09:18:19'),
(9, 'Chân váy midi thời trang', 61.00, 'Chân váy midi thời trang: Chân váy midi nữ với kiểu dáng thời trang, phù hợp cho cả công việc và dạo phố.', 22.00, '1689252830.jpg', 'Female', 2, 2, '[\"S\",\"L\",\"XL\"]', '2023-07-13 05:53:50', '2023-07-26 12:43:08'),
(10, 'Áo blazer nữ thanh lịch', 95.00, 'Áo blazer nữ thanh lịch: Áo blazer nữ với kiểu dáng thanh lịch, tạo vẻ chuyên nghiệp và quyền lực.', 14.00, '1689252875.jpg', 'Female', 2, 1, '[\"S\",\"L\",\"XL\"]', '2023-07-13 05:54:35', '2023-07-27 23:14:46'),
(11, 'Áo khoác nỉ nữ', 33.00, 'Áo khoác nỉ nữ: Áo khoác nỉ nữ ấm áp và thoải mái, phù hợp cho mùa đông và các hoạt động ngoài trời.', 11.00, '1689252955.jpg', 'Female', 2, 2, '[\"M\",\"XL\",\"XXL\"]', '2023-07-13 05:55:55', '2023-07-13 05:55:55'),
(12, 'Áo dài truyền thống', 66.00, 'Áo dài truyền thống: Áo dài nữ truyền thống mang đậm nét văn hóa, tôn lên vẻ đẹp truyền thống và thanh lịch.', 66.00, '1689253011.jpg', 'Female', 3, 2, '[\"S\",\"M\",\"L\"]', '2023-07-13 05:56:51', '2023-07-19 10:16:26'),
(13, 'Bộ đồ hai mảnh áo crop top và quần short', 34.00, 'Bộ đồ hai mảnh áo crop top và quần short: Bộ đồ nữ gồm áo crop top và quần short, tạo vẻ trẻ trung, tự tin và phong cách thời trang.', 58.00, '1689262230.jpg', 'Female', 2, 2, '[\"M\",\"L\"]', '2023-07-13 08:30:31', '2023-07-13 08:30:31'),
(14, 'Áo blazer nữ thanh lịch cam hồng', 43.00, 'Áo blazer nữ thanh lịch: Áo blazer nữ với kiểu dáng thanh lịch, tạo vẻ chuyên nghiệp và quyền lực.', 39.00, '1689262307.jpg', 'Female', 2, 2, '[\"S\",\"M\",\"L\"]', '2023-07-13 08:31:47', '2023-07-13 08:31:47'),
(15, 'Đồ bơi hai mảnh bikini nữ', 8.00, 'Đồ bơi hai mảnh bikini nữ: Đồ bơi nữ gồm áo bikini hai mảnh, tạo vẻ quyến rũ, năng động và phong cách biển.', 90.00, '1689262383.jpg', 'Female', 3, 2, '[\"M\",\"XL\",\"XXL\"]', '2023-07-13 08:33:03', '2023-07-26 03:18:26'),
(16, 'Áo phong unisex cho cả nam và nữ', 46.00, 'áo phông trắng', 23.00, '1689262504.jpg', 'Female', 3, 3, '[\"S\",\"L\",\"XL\"]', '2023-07-13 08:35:04', '2023-07-13 08:35:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `first_login` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `status`, `first_login`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'superadmin', 'superadmin@gmail.com', '$2y$10$RECnkbb47WE53JJRnyig9uENLyWBhl68KCc0i.g4D335pPBnwFe1K', '0869888319', 'Bắc Giang', 'admin', 0, 0, '2023-07-26 08:18:03', 'cQoI4L0jpmoIQ2KyStpWUb4YYaEfkJWxtl5HsXyNhFp5eI9nPflTRLRsl2Np', '2023-07-26 08:17:25', '2023-07-26 19:32:09'),
(3, 'user', 'user@gmail.com', '$2y$10$zI/KW9qU9NO1ZJpuCffjsevpMZEj4h/FALA8Cgk0W5xgi5/4qc4Py', '0869888319', 'Bắc Giang', 'user', 0, 0, '2023-07-26 08:19:08', NULL, '2023-07-26 08:18:38', '2023-07-26 09:28:03'),
(9, 'anh dũng', 'dung@gmail.com', '$2y$10$kuR5.KHm/0j6kEtdNFdanumQfp1h2YwMyUg9IwMqqcZ1/TSa7Fy9a', NULL, NULL, 'user', 0, 0, NULL, NULL, '2023-07-30 21:03:24', '2023-07-30 21:03:24'),
(10, 'thanhtung', 'tungqq@gmail.com', '$2y$10$uht58CcaZ6lg0qfaBTAlVuzQPpDNsY1El.yCvWRMQc.T5WF/J27Su', NULL, NULL, 'user', 0, 0, NULL, 'QfnTcEE0RCZLDGCzYydy9esu46AT8pe9rJ34Tji4mkJVuKBhTlJQUC1aoHxb', '2023-07-30 21:07:18', '2023-07-30 21:07:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
