-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th10 17, 2023 lúc 08:00 AM
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
-- Cơ sở dữ liệu: `fpl_iku`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`id`, `name`, `information`, `created_at`, `updated_at`) VALUES
(1, 'Jane Doe', 'Jane Doe là một nhà văn nổi tiếng với nhiều tác phẩm xuất sắc. Cô sinh ngày 15 tháng 5 năm 1980 tại thành phố New York, Hoa Kỳ. Jane đã học về văn học tại Đại học Columbia và sau đó nhận được bằng thạc sĩ văn học tại Đại học Harvard.', NULL, '2023-09-12 04:06:54'),
(4, 'John Smith', 'John Smith là một nhà văn và nhà nghiên cứu lịch sử nổi tiếng. Ông sinh vào ngày 10 tháng 3 năm 1975 tại London, Anh Quốc. John đã nhận bằng cử nhân về Văn học tại Đại học Oxford và sau đó nhận bằng tiến sĩ về Lịch sử tại Đại học Cambridge.', '2023-09-12 04:08:17', '2023-09-12 04:08:17'),
(5, 'Haruki Murakami', 'Haruki Murakami là một trong những tác giả nổi tiếng và phổ biến nhất của Nhật Bản và trên thế giới. Ông sinh vào ngày 12 tháng 1 năm 1949 tại Kyoto, Nhật Bản. Murakami đã học về kinh tế tại Đại học Waseda ở Tokyo', '2023-09-12 04:09:20', '2023-09-12 04:09:20');

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
(1, 'Thanh Tùng', 'admin@gmail.com', 'Bắc giang', '0869888319', 82, 'Thanh toán khi nhận hàng', 'Đang giao', '[\"1\"]', 1, '2023-09-12 10:33:21', '2023-09-12 10:40:56'),
(2, 'Thanh Tùng', 'admin@gmail.com', 'Bắc giang', '0869888319', 1359, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"5\"]', 1, '2023-09-12 10:36:26', '2023-09-12 10:36:26'),
(3, 'Thanh Tùng', 'admin@gmail.com', 'Bắc giang', '0869888319', 1588, 'Thanh toán khi nhận hàng', 'Đã giao', '[\"4\",\"5\",\"5\"]', 1, '2023-09-12 10:37:42', '2023-09-12 10:41:02'),
(4, 'Thanh Tùng', 'admin@gmail.com', 'Bắc giang', '0869888319', 229, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"3\",\"4\"]', 1, '2023-09-12 10:39:41', '2023-09-12 10:39:41'),
(5, 'Haruki Atakana', 'user@gmail.com', 'Bắc giang', '0869888319', 60, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"5\"]', 2, '2023-09-12 11:28:43', '2023-09-12 11:28:43'),
(6, 'Thanh Tùng Nguyễn', 'admin@gmail.com', 'Bắc giang', '0869888319', 359, 'Thanh toán khi nhận hàng', 'Đơn hàng mới', '[\"6\"]', 1, '2023-09-28 01:58:45', '2023-09-28 01:58:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_amount` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_cart` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_amount`, `user_id`, `status_cart`, `created_at`, `updated_at`) VALUES
(1, 8, '1', 1, 1, '2023-09-12 10:17:48', '2023-09-12 10:33:21'),
(3, 5, '1', 1, 1, '2023-09-12 10:37:21', '2023-09-12 10:39:41'),
(4, 3, '2', 1, 1, '2023-09-12 10:37:33', '2023-09-12 10:39:41'),
(5, 5, '1', 2, 1, '2023-09-12 11:27:58', '2023-09-12 11:28:43'),
(6, 12, '4', 1, 1, '2023-09-28 01:58:27', '2023-09-28 01:58:45');

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
(1, 'Truyện Tiên hiệp', 'Tiên hiệp là những tiểu thuyết lấy bối cảnh chính ở thời cổ đại, nội dung truyện thường miêu tả con đường cầu tiên tu đạo, đấu tranh sinh tồn trong thế giới tu tiên của nhân vật chính.', NULL, '2023-09-12 04:02:07'),
(5, 'Truyện Ngôn tình', 'Ngôn Tình là tiểu thuyết viết về tình yêu giữa các đôi nam nữ, có thể là những câu chuyện tình cảm ngọt ngào lãng mạn, cũng có thể là những mối tình ngược tâm ngược thân lâm li bi đát. Bối cảnh của truyện ngôn tình khá phong phú như: cổ trang, hiện đại, võng phối, mạt thế, xuyên không,…', '2023-09-12 04:04:27', '2023-09-12 04:04:27'),
(6, 'Truyện Trinh thám', 'Lấy đề tài về những màn điều tra, đấu trí cân não, giải quyết những vụ án khó khăn hóc búa….của nhân vật chính.', '2023-09-12 04:04:51', '2023-09-12 04:04:51'),
(7, 'Truyện Quân Sự', 'là những truyện liên quan đến đề tài về quân đội như cuộc sống sinh hoạt, chiến tranh, khai mở lãnh thổ…tranh đoạt thiên hạ, các quốc gia giao chiến với nhau. Và đương nhiên kết thúc sẽ là việc nhân vật chính giành được thiên hạ, có giang sơn mà cũng có mỹ nhân', '2023-09-12 04:05:16', '2023-09-12 04:05:16');

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
(1, 1, 'cái này khá hay đó nha', 4, '2023-09-12 10:41:57', '2023-09-12 10:41:57'),
(2, 1, 'quyển này đọc lú quá =))', 11, '2023-09-12 11:34:01', '2023-09-12 11:34:01'),
(3, 2, 'đọc hay lắm mn ơi mua thôi', 11, '2023-09-12 11:34:29', '2023-09-12 11:34:29');

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
(1, 'NGONTINH50K', 50.00, '2023-09-21', '2023-09-12 10:49:02', '2023-09-14 05:35:55'),
(2, 'TRINHTHAM10K', 10.00, '2023-09-15', '2023-09-12 10:49:22', '2023-09-12 10:49:22'),
(3, 'GIAMGIA5K', 5.00, '2023-09-08', '2023-09-14 05:35:43', '2023-09-14 05:35:43');

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
(5, '2023_07_05_115650_create_users_table', 2),
(6, '2023_07_07_121743_create_bills_table', 2),
(7, '2023_07_08_080411_create_carts_table', 2),
(8, '2023_07_13_173147_create_coupons_table', 2),
(9, '2023_07_14_171620_create_comments_table', 2),
(10, '2023_09_12_093443_create_authors_table', 2),
(11, '2023_09_12_094109_create_products_table', 3);

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
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `amount`, `description`, `price`, `images`, `author_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Harry Potter và đứa trẻ bị nguyền rủa', 45.00, 'Harry Potter và đứa trẻ bị nguyền rủa (tựa gốc tiếng Anh: Harry Potter and the Cursed Child) là vở kịch hai phần của Anh năm 2016 do Jack Thorne viết kịch bản dựa trên câu chuyện gốc của J. K. Rowling, John Tiffany và Thorne', 78.00, '1694529667.jpg', 4, 6, '2023-09-12 03:17:49', '2023-09-12 10:39:41'),
(4, 'Phàm nhân tu tiên', 31.00, 'Thường xoay quanh việc một nhân vật chính bình thường bắt đầu cuộc hành trình của mình để rèn luyện, tu luyện, và trở thành một tiên nhân mạnh mẽ. Trong quá trình này, nhân vật thường phải vượt qua nhiều thử thách, đối đầu với quái vật', 678.00, '1694529940.jpg', 5, 1, '2023-09-12 07:45:40', '2023-09-12 07:45:40'),
(5, 'Tru tiên 1', 43.00, '\"Tru Tiên\" là một trong những tiểu thuyết kiếm hiệp và huyền huyễn phổ biến nhất trong văn học Trung Quốc. Nó được sáng tác bởi tác giả Tiêu Đỉnh và đã thu hút rất nhiều độc giả trong và ngoài Trung Quốc', 67.00, '1694530079.jpg', 5, 1, '2023-09-12 07:47:59', '2023-09-12 11:28:43'),
(6, 'Tiên giả', 90.00, '\"Tiên Giả\" là một trong các thể loại văn học huyền huyễn và kiếm hiệp phổ biến trong văn học Trung Quốc. Đây là một thể loại văn học thường xoay quanh những câu chuyện về các nhân vật có siêu năng lực', 66.00, '1694530176.png', 4, 1, '2023-09-12 07:49:36', '2023-09-12 07:49:36'),
(7, 'Đại mộng chủ', 12.00, 'Thường có yếu tố phong cách thần thoại, thần tiên, võ thuật, và các hình thức ma thuật. Những tiên nhân trong thể loại này có thể sử dụng các phép thuật, võ công, và trang thiết bị đặc biệt', 89.00, '1694530270.jpg', 1, 1, '2023-09-12 07:51:10', '2023-09-12 07:51:10'),
(8, 'Mật mã Davinci', 30.00, 'Đây là một tiểu thuyết bán chạy của Dan Brown, được xuất bản vào năm 2003. Câu chuyện xoay quanh các bí mật và mật mã liên quan đến tác phẩm nghệ thuật nổi tiếng \"Mona Lisa\" của Leonardo da Vinci và Nhà thờ Chúa Kitô lớn ở Paris.', 79.00, '1694531382.jpg', 1, 6, '2023-09-12 08:09:42', '2023-09-12 10:33:21'),
(9, 'Dưới cơn mưa năm ấy', 21.00, 'Đây là 1 câu truyện tình cảm kể về mối quan hệ giữa chàng trai và 1 cô gái đang trong tuổi học trò với nhiều biến cố xảy ra trong cuộc đời họ', 78.00, '1694540776.jpg', 5, 5, '2023-09-12 10:46:16', '2023-09-12 10:46:16'),
(10, 'Lịch sử tư tưởng quân sự việt nam', 31.00, 'Lịch sử của Việt Nam là một hành trình phong phú và đa dạng, đánh dấu bởi nhiều giai đoạn lịch sử quan trọng. Dưới đây là một đoạn ngắn về lịch sử của Việt Nam:', 10.00, '1694540880.jpg', 1, 7, '2023-09-12 10:48:00', '2023-09-12 10:48:00'),
(11, 'Sherlock Holmes', 45.00, 'Sherlock Holmes là một nhân vật thám tử tư hư cấu, do nhà văn người Anh Arthur Conan Doyle sáng tạo nên.', 78.00, '1694542291.jpg', 1, 6, '2023-09-12 11:11:31', '2023-09-12 11:11:31'),
(12, 'Thám tử lừng danh conan', 27.00, 'Thám tử lừng danh Conan là một series manga trinh thám được sáng tác bởi Aoyama Gōshō. Tác phẩm được đăng tải trên tạp chí Weekly Shōnen Sunday của nhà xuất bản Shogakukan vào năm 1994 và được đóng gói thành 103 tập tankōbon tính đến tháng 4 năm 2023', 89.00, '1694542381.jpg', 1, 6, '2023-09-12 11:13:01', '2023-09-28 01:58:45');

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
(1, 'Thanh Tùng Nguyễn', 'admin@gmail.com', '$2y$10$mQO037LHCn4VHDExWHxrTedQeBHlPnI2VHLU.2fcAksjTLVPgNDQm', '0869888319', 'Bắc giang', 'admin', 0, 0, '2023-09-12 02:45:20', NULL, '2023-09-12 02:43:50', '2023-09-12 10:42:27'),
(2, 'Haruki Atakana', 'user@gmail.com', '$2y$10$Li3zcKunkUtrLabBYBXDz.B2dAiJyR.oEMSWPaBEjQGK38zU8zlRa', '0869888319', 'Bắc giang', 'user', 0, 0, '2023-09-12 11:09:02', NULL, '2023-09-12 11:08:19', '2023-09-12 11:28:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

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
  ADD KEY `products_author_id_foreign` (`author_id`),
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
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
