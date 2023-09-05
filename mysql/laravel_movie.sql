-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.2.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table laravel_movie.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table laravel_movie.categories: ~6 rows (approximately)
INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `status`, `position`) VALUES
	(36, 'Phim thuyết minh', 'phim-thuyet-minh', '<p>Phim thuyết minh cập nhật thường xuy&ecirc;n</p>\r\n\r\n<div class="ddict_btn" style="left:238.266px; top:28px">&nbsp;</div>', '1', 2),
	(38, 'Phim mới', 'phim-moi', '<p>Phim mới cập nhật thường xuy&ecirc;n</p>\r\n\r\n<div class="ddict_btn" style="left:193.297px; top:33px">&nbsp;</div>', '1', 1),
	(39, 'Phim chiếu rạp', 'phim-chieu-rap', '<p>Phim chiếu rạp cập nhật thường xuy&ecirc;n</p>\r\n\r\n<div class="ddict_btn" style="left:224.531px; top:34px">&nbsp;</div>', '1', 0),
	(40, 'Phim lẻ', 'phim-le', '<p>Phim lẻ cập nhật thường xuy&ecirc;n</p>', '1', 3),
	(41, 'Phim bộ', 'phim-bo', '<p>Phim bộ cập nhật thường xuy&ecirc;n</p>', '1', 4),
	(42, 'Phim hoạt hình', 'phim-hoat-hinh', '<p>Phim hoạt h&igrave;nh cập nhật thường xuy&ecirc;n</p>', '1', NULL);

-- Dumping structure for table laravel_movie.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table laravel_movie.countries: ~6 rows (approximately)
INSERT INTO `countries` (`id`, `title`, `slug`, `description`, `status`) VALUES
	(1, 'Phim Âu Mỹ', 'phim-au-my', '<p>Phim &Acirc;u Mỹ cập nhật thường xuy&ecirc;n</p>\r\n\r\n<div class="ddict_btn" style="left:88.6406px; top:30px">&nbsp;</div>', '1'),
	(2, 'Phim Nhật Bản', 'phim-nhat-ban', '<p>Phim Nhật Bản cập nhật thường xuy&ecirc;n</p>\r\n\r\n<div class="ddict_btn" style="left:103.844px; top:32px">&nbsp;</div>\r\n\r\n<div class="ddict_btn" style="left:225.266px; top:33px">&nbsp;</div>', '1'),
	(3, 'Phim Việt Nam', 'phim-viet-nam', '<p>Phim Việt Nam cập nhật thường xuy&ecirc;n</p>\r\n\r\n<div class="ddict_btn" style="left:102.375px; top:34px">&nbsp;</div>', '1'),
	(4, 'Phim Hàn Quốc', 'phim-han-quoc', '<p>Phim H&agrave;n Quốc cập nhật thường xuy&ecirc;n</p>', '1'),
	(5, 'Phim Thái Lan', 'phim-thai-lan', '<p>Phim Th&aacute;i Lan cập nhật thường xuy&ecirc;n</p>', '1'),
	(6, 'Phim Trung Quốc', 'phim-trung-quoc', '<p>Phim Trung Quốc cập nhật thường xuy&ecirc;n</p>', '1');

-- Dumping structure for table laravel_movie.episodes
CREATE TABLE IF NOT EXISTS `episodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `episode` varchar(100) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `movie_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_episodes_movies` (`movie_id`),
  CONSTRAINT `FK_episodes_movies` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table laravel_movie.episodes: ~6 rows (approximately)
INSERT INTO `episodes` (`id`, `episode`, `link`, `movie_id`, `created_at`, `updated_at`) VALUES
	(5, '1', '<iframe width="560" height="315" src="https://www.youtube.com/embed/kHaP23cQyTM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', 43, '2023-08-20 19:45:35', '2023-08-20 19:45:35'),
	(6, '2', '<iframe width="560" height="315" src="https://www.youtube.com/embed/fRs86W6E7qA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', 43, '2023-08-20 19:45:59', '2023-08-20 19:47:23'),
	(7, '1', '<iframe width="560" height="315" src="https://www.youtube.com/embed/fWoDkwFmnhk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', 44, '2023-08-21 09:39:44', '2023-08-21 09:39:44'),
	(8, '2', '<iframe width="560" height="315" src="https://www.youtube.com/embed/my0RV4TV5nU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', 44, '2023-08-21 09:41:41', '2023-08-21 09:41:41'),
	(9, '3', '<iframe width="560" height="315" src="https://www.youtube.com/embed/0MW5v50Te88" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', 44, '2023-08-21 09:42:07', '2023-08-21 09:42:07'),
	(12, 'HD', '<iframe width="560" height="315" src="https://hd1080.opstream2.com/share/8c3b5e395a73855eb15bf81d2f249f00" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', 11, '2023-08-22 01:11:11', '2023-08-22 01:28:31');

-- Dumping structure for table laravel_movie.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_movie.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel_movie.genres
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table laravel_movie.genres: ~8 rows (approximately)
INSERT INTO `genres` (`id`, `title`, `slug`, `description`, `status`) VALUES
	(1, 'Hành Động', 'hanh-dong', '<p>Phim h&agrave;nh động&nbsp;cũng gọi l&agrave;&nbsp;phim hoạt động&nbsp;(tiếng Anh:&nbsp;<em>Action film</em>) l&agrave; một&nbsp;thể loại điện ảnh&nbsp;trong đ&oacute; một hoặc nhiều nh&acirc;n vật anh h&ugrave;ng bị đẩy v&agrave;o một loạt những thử th&aacute;ch, thường bao gồm những k&igrave; c&ocirc;ng vật l&yacute;,&nbsp;c&aacute;c cảnh h&agrave;nh động&nbsp;k&eacute;o d&agrave;i, yếu tố&nbsp;bạo lực&nbsp;v&agrave; những cuộc rượt đuổi đi&ecirc;n cuồng.</p>', '1'),
	(2, 'Cổ Trang', 'co-trang', '<p>Phim lịch sử cổ trang (tiếng Trung:&nbsp;古装故事剧;&nbsp;H&aacute;n-Việt:&nbsp;<em>cổ trang cố sự kịch</em>) chỉ đến d&ograve;ng phim giả tưởng lấy chủ đề về c&aacute;c nh&acirc;n vật v&agrave; sự kiện lịch sử. Cốt truyện v&agrave; c&aacute;c nh&acirc;n vật trong phim c&oacute; thể kh&ocirc;ng b&aacute;m s&aacute;t sự thật lịch sử.</p>', '1'),
	(3, 'Phiêu Lưu', 'phieu-luu', '<p>Phim phi&ecirc;u lưu&nbsp;l&agrave; một&nbsp;thể loại điện ảnh.&nbsp;Kh&ocirc;ng giống như&nbsp;phim h&agrave;nh động, phim phi&ecirc;u lưu thường sử dụng những cảnh quay h&agrave;nh động để diễn tả những địa điểm kh&aacute;c lạ một c&aacute;ch mạnh mẽ.</p>', '1'),
	(4, 'Tâm Lý', 'tam-ly', '<p>Phim t&acirc;m l&yacute; l&agrave; loại phim c&oacute; cốt truyện g&acirc;y x&uacute;c động mạnh với mục đ&iacute;ch lay động cảm x&uacute;c m&atilde;nh liệt cũng như tạo tiền đề cho sự x&acirc;y dựng đặc t&iacute;nh nh&acirc;n vật được cặn kẽ, chi tiết.</p>', '1'),
	(5, 'Kinh Dị', 'kinh-di', '<p>Phim kinh dị thường kh&aacute;m ph&aacute; chủ đề đen tối v&agrave; c&oacute; thể li&ecirc;n quan đến&nbsp;c&aacute;c đề t&agrave;i x&uacute;c phạm. Những yếu tố rộng bao gồm&nbsp;qu&aacute;i vật,&nbsp;sự kiện khải huyền&nbsp;v&agrave; t&iacute;n ngưỡng&nbsp;t&ocirc;n gi&aacute;o&nbsp;hoặc&nbsp;d&acirc;n gian. Những kỹ thuật l&agrave;m phim kinh dị đ&atilde; được chứng minh l&agrave; k&iacute;ch th&iacute;ch phản ứng t&acirc;m l&yacute; ở kh&aacute;n giả.</p>', '1'),
	(6, 'Tình Cảm', 'tinh-cam', '<p>Phim t&igrave;nh cảm&nbsp;l&agrave; những c&acirc;u chuyện t&igrave;nh l&atilde;ng mạn được ghi lại tr&ecirc;n c&aacute;c phương tiện thị gi&aacute;c để ph&aacute;t s&oacute;ng tr&ecirc;n&nbsp;s&acirc;n khấu&nbsp;v&agrave; tr&ecirc;n&nbsp;TV&nbsp;với nội dung tập trung v&agrave;o&nbsp;đam m&ecirc;,&nbsp;cảm x&uacute;c, v&agrave; sự li&ecirc;n hệ t&igrave;nh cảm l&atilde;ng mạn của c&aacute;c nh&acirc;n vật ch&iacute;nh v&agrave; cuộc h&agrave;nh tr&igrave;nh m&agrave; t&igrave;nh y&ecirc;u mạnh mẽ, ch&acirc;n thực v&agrave; thuần khiết của họ đ&atilde; đưa họ đến việc hẹn h&ograve;, t&aacute;n tỉnh v&agrave; cuối c&ugrave;ng l&agrave;&nbsp;h&ocirc;n nh&acirc;n.</p>', '1'),
	(7, 'Võ Thuật', 'vo-thuat', '<p>Phim v&otilde; thuật&nbsp;l&agrave; một thể loại&nbsp;phim h&agrave;nh động&nbsp;khởi ph&aacute;t v&agrave; thường thịnh h&agrave;nh trong&nbsp;văn h&oacute;a Hoa ngữ</p>', '1'),
	(8, 'Viễn tưởng', 'vien-tuong', '<p>Phim khoa học viễn tưởng/ giả tưởng&nbsp;l&agrave; một&nbsp;thể loại phim&nbsp;sử dụng những m&ocirc; tả mang t&iacute;nh ti&ecirc;n đo&aacute;n v&agrave; hư cấu dựa tr&ecirc;n khoa học về c&aacute;c hiện tượng m&agrave; khoa học ch&iacute;nh thống kh&ocirc;ng chấp nhận đầy đủ như sinh vật ngo&agrave;i Tr&aacute;i Đất, thế giới người ngo&agrave;i h&agrave;nh tinh,&nbsp;ngoại cảm&nbsp;v&agrave;&nbsp;du h&agrave;nh thời gian&nbsp;c&ugrave;ng với c&aacute;c yếu tố tương lai như&nbsp;t&agrave;u vũ trụ,&nbsp;robot,&nbsp;sinh vật cơ kh&iacute; h&oacute;a,&nbsp;du h&agrave;nh li&ecirc;n sao&nbsp;hoặc c&aacute;c kỹ thuật kh&aacute;c.&nbsp;</p>', '1');

-- Dumping structure for table laravel_movie.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_movie.migrations: ~5 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table laravel_movie.movies
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_english` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `episode` int(11) DEFAULT 0,
  `season` int(11) DEFAULT 0,
  `topview` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `belong_category` varchar(100) DEFAULT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `tag` text DEFAULT NULL,
  `hot` int(11) DEFAULT NULL,
  `resolution` int(11) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `sub` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table laravel_movie.movies: ~24 rows (approximately)
INSERT INTO `movies` (`id`, `title`, `title_english`, `slug`, `year`, `trailer`, `episode`, `season`, `topview`, `description`, `status`, `image`, `belong_category`, `category_id`, `country_id`, `genre_id`, `tag`, `hot`, `resolution`, `time`, `sub`, `created_at`, `updated_at`) VALUES
	(9, 'Cá Mập Siêu Bạo Chúa 2: Vực Sâu', 'Meg 2: The Trench 2023', 'ca-map-sieu-bao-chua-2 -vuc-sau', '2022', NULL, 1, 2, 2, '<p><strong>C&aacute; Mập Si&ecirc;u Bạo Ch&uacute;a 2: Vực S&acirc;u &ndash; Meg 2: The Trench (2023)</strong>&nbsp;tiếp tục nhiệm vụ đ&atilde; được đề cập trong phần phim trước, nh&oacute;m của Jonas Taylor (Jason Statham thủ vai) tiếp cận gần khu vực R&atilde;nh Mariana, nơi họ đụng độ một qu&aacute;i vật b&iacute; ẩn, khiến một th&agrave;nh vi&ecirc;n trong nh&oacute;m thiệt mạng ngay sau đ&oacute;. C&aacute;i chết của người đồng đội b&aacute;o hiệu cho cả nh&oacute;m về một mối đe dọa to lớn đang giấu m&igrave;nh trong những v&aacute;ch đ&aacute; tối tăm. Thế nhưng, trong cả những viễn cảnh hoang đường nhất, họ cũng kh&ocirc;ng thể ngờ những mối nguy đang chực chờ đe dọa họ c&oacute; thể t&agrave;n &aacute;c đến mức n&agrave;o.</p>', '1', '/storage/photos/1/meg-2.jpg', 'phimle', 36, 1, 8, 'ca map sieu bao chua, meg 2', 1, 1, '150 phút', 2, '2022-08-16 21:04:10', '2023-08-29 11:51:00'),
	(10, 'Người Nhện: Du Hành Vũ Trụ Nhện', 'Spider-Man: Across the Spider-Verse 2023', 'nguoi-nhen -du-hanh-vu-tru-nhen', '2022', 'HVgwRbQfpCc', 1, 0, 1, '<p><strong>Người Nhện: Du H&agrave;nh Vũ Trụ Nhện &ndash; Spider-Man: Across the Spider-Verse (2023)</strong>&nbsp;Miles Morales t&aacute;i xuất trong phần tiếp theo của bom tấn hoạt h&igrave;nh từng đoạt giải Oscar &ndash; Spider-Man: Across the Spider-Verse. Sau khi gặp lại Gwen Stacy, ch&agrave;ng Spider-Man th&acirc;n thiện đến từ Brooklyn phải du h&agrave;nh qua đa vũ trụ v&agrave; gặp một nh&oacute;m Người Nhện chịu tr&aacute;ch nhiệm bảo vệ c&aacute;c thế giới song song.</p>\r\n\r\n<p>Nhưng khi nh&oacute;m si&ecirc;u anh h&ugrave;ng xung đột về c&aacute;ch xử l&yacute; một mối đe dọa mới, Miles buộc phải đọ sức với c&aacute;c Người Nhện kh&aacute;c v&agrave; phải x&aacute;c định lại &yacute; nghĩa của việc trở th&agrave;nh một người h&ugrave;ng để c&oacute; thể cứu những người cậu y&ecirc;u thương nhất.</p>', '1', '/storage/photos/1/Nguoi-Nhen-Du-Hanh-Vu-Tru-Nhen-2023.jpg', 'phimle', 36, 1, 8, 'nguoi nhen, du hanh vu tru', 1, 5, '140 phút', 2, '2022-08-16 21:04:11', '2023-08-21 11:48:52'),
	(11, 'John Wick: Phần 4', 'John Wick: Chapter 4 2023', 'john-wick -phan-4', '2023', NULL, 1, 0, 1, '<p><strong>John Wick: Phần 4 &ndash; John Wick: Chapter 4</strong>&nbsp;l&agrave; c&acirc;u chuyện của John Wick (Keanu Reeves) đ&atilde; kh&aacute;m ph&aacute; ra con đường để đ&aacute;nh bại High Table. Nhưng trước khi c&oacute; thể kiếm được tự do, Wick phải đối đầu với kẻ th&ugrave; mới với những li&ecirc;n minh h&ugrave;ng mạnh tr&ecirc;n to&agrave;n cầu v&agrave; những lực lượng biến những người bạn cũ th&agrave;nh kẻ th&ugrave;.</p>', '1', '/storage/photos/1/John-Wick-4.jpg', 'phimle', 39, 1, 7, 'john wick', 1, 1, '169 phút', 1, '2022-08-16 21:04:11', '2023-08-28 07:54:48'),
	(12, 'Nàng Tiên Cá', 'The Little Mermaid 2023', 'nang-tien-ca', '2023', NULL, 1, 0, 1, '<p><strong>N&agrave;ng Ti&ecirc;n C&aacute; &ndash; The Little Mermaid (2023)</strong>&nbsp;l&agrave; c&acirc;u chuyện được y&ecirc;u th&iacute;ch về Ariel &ndash; một n&agrave;ng ti&ecirc;n c&aacute; trẻ xinh đẹp v&agrave; mạnh mẽ với kh&aacute;t khao phi&ecirc;u lưu. Ariel l&agrave; con g&aacute;i &uacute;t của Vua Triton v&agrave; cũng l&agrave; người ngang ngạnh nhất, n&agrave;ng khao kh&aacute;t kh&aacute;m ph&aacute; về thế giới b&ecirc;n kia đại dương.</p>\r\n\r\n<p>Trong một lần gh&eacute; thăm đất liền, n&agrave;ng đ&atilde; phải l&ograve;ng Ho&agrave;ng tử Eric bảnh bao. Trong khi ti&ecirc;n c&aacute; bị cấm tiếp x&uacute;c với con người, Ariel đ&atilde; l&agrave;m theo tr&aacute;i tim m&igrave;nh. N&agrave;ng đ&atilde; thỏa thuận với ph&ugrave; thủy biển Ursula hung &aacute;c để cơ hội sống cuộc sống tr&ecirc;n đất liền. Nhưng cuối c&ugrave;ng việc n&agrave;y lại đe dọa tới mạng sống của Ariel v&agrave; vương miện của cha n&agrave;ng.</p>', '1', '/storage/photos/1/the-little-mermaid.jpg', 'phimle', 39, 1, 8, 'nang tien ca', 1, 1, '110 phút', 1, '2022-08-16 21:04:12', '2023-08-21 11:49:09'),
	(13, 'Transformers 7: Quái Thú Trỗi Dậy', 'Transformers: Rise of the Beasts 2023', 'transformers-7 -quai-thu-troi-day', '2023', 'lRBA1AKyUaI', 1, 7, 1, '<p><strong>Transformers 7: Qu&aacute;i Th&uacute; Trỗi Dậy &ndash; Transformers: Rise of the Beasts (2023)</strong>&nbsp;dựa tr&ecirc;n sự kiện Beast Wars trong loạt phim hoạt h&igrave;nh &ldquo;Transformers&rdquo;, nơi m&agrave; c&aacute;c robot c&oacute; khả năng biến th&agrave;nh động vật khổng lồ c&ugrave;ng chiến đấu chống lại một mối đe dọa tiềm t&agrave;ng.</p>', '1', '/storage/photos/1/Phim-Transformers-7.jpg', 'phimle', 36, 1, 8, 'quai thu troi day', 1, 5, '110 phút', 2, '2022-08-16 21:04:12', '2023-08-21 11:49:16'),
	(14, 'Vệ Binh Dải Ngân Hà 3', 'Guardians of the Galaxy Volume 3 2023', 've-binh-dai-ngan-ha-3', '2023', NULL, 1, 0, 1, '<p><strong>Vệ Binh Dải Ng&acirc;n H&agrave; 3 &ndash; Guardians of the Galaxy Volume 3 (2023)</strong>&nbsp;sau khi mua Knowhere từ The Collector, đội Vệ binh dải Ng&acirc;n H&agrave; cố gắng biến n&oacute; th&agrave;nh nơi tr&uacute; ẩn an to&agrave;n cho những người tị nạn sau c&uacute; b&uacute;ng tay di dời. Nhưng sau một cuộc tấn c&ocirc;ng t&agrave;n bạo, Peter Quill, vẫn cảm x&uacute;c v&igrave; mất Gamora, phải tập hợp c&aacute;c Vệ binh để thực hiện sứ mệnh bảo vệ vũ trụ v&agrave; bảo vệ một người trong số họ khỏi kẻ th&ugrave; chung nguy hiểm.</p>', '1', '/storage/photos/1/ve-binh-dai-ngan-ha.jpg', 'phimle', 36, 1, 8, 've binh dai ngan ha', 1, 1, '150 phút', 2, '2022-08-16 21:04:13', '2023-08-21 11:49:24'),
	(15, 'Nhiệm Vụ: Bất Khả Thi 7 – Nghiệp Báo Phần 1', 'Mission: Impossible 7 - Dead Reckoning Part One 2023', 'nhiem-vu -bat-kha-thi-7-–-nghiep-bao-phan-1', '2023', NULL, 1, 0, 1, '<p><strong>Nhiệm Vụ: Bất Khả Thi 7 &ndash; Nghiệp B&aacute;o Phần 1 &ndash; Mission: Impossible 7 &ndash; Dead Reckoning Part One (2023)</strong>&nbsp;Ethan Hunt v&agrave; đội IMF của anh ta bắt đầu nhiệm vụ nguy hiểm nhất của họ: Theo d&otilde;i một vũ kh&iacute; mới đ&aacute;ng sợ đe dọa to&agrave;n nh&acirc;n loại trước khi n&oacute; rơi v&agrave;o tay kẻ xấu.</p>\r\n\r\n<p>Với quyền kiểm so&aacute;t tương lai v&agrave; số phận thế giới đang bị đặt cược, v&agrave; những thế lực đen tối từ qu&aacute; khứ của Ethan tiến gần, một cuộc đua chết người xung quanh thế giới bắt đầu. Đối mặt với một kẻ th&ugrave; b&iacute; ẩn, to&agrave;n năng, Ethan buộc phải xem x&eacute;t rằng kh&ocirc;ng c&oacute; g&igrave; c&oacute; thể quan trọng hơn nhiệm vụ của anh ta &ndash; ngay cả những người anh ta quan t&acirc;m nhất.</p>', '1', '/storage/photos/1/nhiem-vu-bat-kha-thi-7.jpg', 'phimle', 36, 1, 7, 'nhiem vu, bat kha thi', 2, 1, '163 phút', 2, '2022-08-16 21:04:14', '2023-08-21 11:49:33'),
	(16, 'The Flash', 'The Flash 2023', 'the-flash', '2023', NULL, 1, 0, 1, '<p><strong>The Flash (2023)</strong>&nbsp;v&igrave; muốn cứu mẹ, Barry Allen t&igrave;m c&aacute;ch quay trở lại qu&aacute; khứ tuy nhi&ecirc;n h&agrave;nh động của anh v&ocirc; t&igrave;nh thiết lập một thế giới mới nơi thế lực ngo&agrave;i h&agrave;nh tinh của tướng Zod quay trở lại v&agrave; t&igrave;m c&aacute;ch t&agrave;n ph&aacute; Tr&aacute;i Đất một lần nữa</p>', '1', '/storage/photos/1/The-Flash-vietsub.jpg', 'phimle', 39, 1, 8, 'the flash', 2, 5, '144 phút', 1, '2022-08-16 21:04:14', '2023-08-21 11:49:41'),
	(17, 'Xứ Sở Các Nguyên Tố', 'Elemental 2023', 'xu-so-cac-nguyen-to', '2023', NULL, 1, 0, 1, '<p><strong>Xứ Sở C&aacute;c Nguy&ecirc;n Tố &ndash; Elemental (2023)</strong>&nbsp;trong một th&agrave;nh phố m&agrave; c&aacute;c cư d&acirc;n lửa, nước, đất, v&agrave; kh&iacute; c&ugrave;ng sinh sống. Một c&ocirc; g&aacute;i n&oacute;ng nảy v&agrave; một ch&agrave;ng trai gi&oacute;-chiều-n&agrave;o-xoay-chiều-ấy sẽ kh&aacute;m ph&aacute; ra rằng họ c&oacute; nhiều điểm giống nhau.</p>', '1', '/storage/photos/1/Elemental.jpg', 'phimle', 36, 1, 8, 'xu so cac nguyen to', 2, 1, '102 phút', 2, '2022-08-16 21:04:15', '2023-08-21 11:49:48'),
	(19, 'Bão Trắng 3', 'The White Storm 3: Heaven or Hell 2023', 'bao-trang-3', '2023', NULL, 1, 0, 1, '<p><strong>B&atilde;o Trắng 3 &ndash; The White Storm 3 (2023)</strong>&nbsp;&Acirc;u Ch&iacute; Viễn v&agrave; Trương Kiến H&agrave;nh l&agrave; cảnh s&aacute;t ch&igrave;m hoạt động trong một băng đảng ma t&uacute;y do &ocirc;ng tr&ugrave;m Khang Tố Sai đứng đầu tại Hongkong. Trong một lần bị thương nặng, Trương Kiến H&agrave;nh đ&atilde; được cứu bởi &ocirc;ng tr&ugrave;m ma t&uacute;y tr&ecirc;n một con t&agrave;u vượt bi&ecirc;n tới khu Tam Gi&aacute;c V&agrave;ng.</p>\r\n\r\n<p>Sau lần được trở về từ c&otilde;i chết, Trương Kiến H&agrave;nh đ&atilde; cảm k&iacute;ch tấm l&ograve;ng của &ocirc;ng tr&ugrave;m ma t&uacute;y n&ecirc;n miễn cưỡng hoạt động cho &ocirc;ng tr&ugrave;m ma t&uacute;y để sản xuất thuốc phiện tại khu Tam Gi&aacute;c V&agrave;ng. Mặt kh&aacute;c, &Acirc;u Ch&iacute; Viễn lần theo dấu vết đồng nghiệp của m&igrave;nh để lại c&ugrave;ng cảnh s&aacute;t quốc tế truy n&atilde; &ocirc;ng tr&ugrave;m ma t&uacute;y</p>', '1', '/storage/photos/1/Bao-trang-3.jpg', 'phimle', 40, 6, 7, 'bao trang', 2, 1, '125 phút', 1, '2022-08-16 21:04:16', '2023-08-21 11:49:55'),
	(20, 'Vây Hãm: Không Lối Thoát', 'The Roundup: No Way Out 2023', 'vay-ham -khong-loi-thoat', '2023', NULL, 1, 0, 1, '<p><strong>V&acirc;y H&atilde;m: Kh&ocirc;ng Lối Tho&aacute;t &ndash; The Roundup: No Way Out (2023)</strong>&nbsp;qu&aacute;i vật cơ bắp Seok-do (Ma Dong Seok) dẫn đầu đội h&igrave;nh sự truy l&ugrave;ng đường d&acirc;y bu&ocirc;n chất cấm của thiếu gia Joo Seong Cheol. Cuộc truy đuổi c&agrave;ng th&ecirc;m gay cấn khi c&uacute; đấm c&ocirc;ng l&yacute; &ldquo;ch&uacute; Ma&rdquo; chạm tr&aacute;n thanh kiếm lừng lẫy chốn giang hồ Nhật Bản.</p>', '1', '/storage/photos/1/Vay-Ham-Khong-Loi-Thoat.jpg', 'phimle', 38, 6, 7, 'vay ham', 2, 1, '105 phút', 1, '2022-08-16 21:04:17', '2023-08-21 11:50:03'),
	(21, 'Quá Nhanh Quá Nguy Hiểm 10', 'Fast And Furious 10 2023', 'qua-nhanh-qua-nguy-hiem-10', '2023', NULL, 1, 0, 2, '<p><strong>Qu&aacute; Nhanh Qu&aacute; Nguy Hiểm 10 &ndash; Fast and Furious 10 (2023)</strong>&nbsp;xoay quanh việc Dom Toretto c&ugrave;ng gia đ&igrave;nh anh ấy đ&atilde; trở th&agrave;nh mục tiếu tấn c&ocirc;ng bởi ch&iacute;nh con trai &ocirc;ng tr&ugrave;m ma t&uacute;y, kẻ trước đ&acirc;y bị X 10 ti&ecirc;u diệt. Mời c&aacute;c bạn c&ugrave;ng đ&oacute;n xem bộ phim Qu&aacute; Nhanh Qu&aacute; Nguy Hiểm 10 &ndash; Fast X cực hấp dẫn n&agrave;y.</p>', '1', '/storage/photos/1/Qua-Nhanh-Qua-Nguy-Hiem-10-2023.jpg', 'phimle', 38, 1, 7, 'qua nhanh qua nguy hiem', 1, 1, '141 phút', 1, '2022-08-16 20:52:51', '2023-08-29 11:48:53'),
	(22, 'Phong Thần 1: Tam Bộ Khúc', 'Creation of the Gods 1: Kingdom Of Storms 2023', 'phong-than-1 -tam-bo-khuc', '2023', NULL, 1, 0, 1, '<p><strong>Phong Thần 1: Tam Bộ Kh&uacute;c</strong>&nbsp;Trụ Vương cấu kết với hồ ly tinh Đ&aacute;t Kỷ khiến người d&acirc;n l&acirc;m v&agrave;o cảnh lầm than. Khương Tử Nha được lệnh mang Phong Thần Bảng, lợi dụng mọi sự trợ gi&uacute;p c&oacute; được để giải tho&aacute;t b&aacute; t&iacute;nh khỏi kiếp nạn, ph&ograve; Chu diệt Thương.</p>', '1', 'http://127.0.0.1:8000/storage/photos/1/y4Q4N7S5CozfSxLecUbGhDj3gz4.jpg', 'phimle', 39, 6, 7, 'phong than', 1, 1, '140 phút', 1, '2022-08-16 21:04:18', '2023-08-21 11:50:26'),
	(27, 'Blue Beetle', 'Blue Beetle 2023', 'blue-beetle', '2023', NULL, 1, 0, 2, '<p><strong>Blue Beetle</strong>&nbsp;một phi&ecirc;n bản cải tiến của nh&acirc;n vật n&agrave;y, nh&agrave; khảo cổ học Dan Garrett, được giới thiệu v&agrave;o năm 1964 bởi Charlton Comics, đ&atilde; vẽ ra những khả năng thần b&iacute; từ một con bọ hung Ai Cập cổ đại. Được xuất bản bởi Charlton Comics v&agrave; sau đ&oacute; l&agrave; DC, t&aacute;c phẩm s&aacute;ng tạo năm 1966 Ted Kord l&agrave; học tr&ograve; của Garret, người tiếp tục di sản chiến đấu chống tội phạm l&acirc;u đời của m&igrave;nh, mặc d&ugrave; anh ta kh&ocirc;ng c&oacute; si&ecirc;u năng lực.</p>', '1', '/storage/photos/1/Phim-Blue-Beetle.jpg', 'phimle', 39, 1, 8, 'Blue Beetle 2023', 1, 1, '110 phút', 1, '2023-08-17 17:38:36', '2023-08-29 11:48:57'),
	(28, 'Oppenheimer', 'Oppenheimer 2023', 'oppenheimer', '2023', NULL, 1, 0, 1, '<p><strong>Oppenheimer (2023)</strong>&nbsp;với nh&acirc;n vật trung t&acirc;m l&agrave; J. Robert Oppenheimer, nh&agrave; vật l&yacute; l&yacute; thuyết người đứng đầu ph&ograve;ng th&iacute; nghiệm Los Alamos, thời kỳ Thế chiến II. &Ocirc;ng đ&oacute;ng vai tr&ograve; quan trọng trong Dự &aacute;n Manhattan, ti&ecirc;n phong trong nhiệm vụ ph&aacute;t triển vũ kh&iacute; hạt nh&acirc;n, v&agrave; được coi l&agrave; một trong những &ldquo;cha đẻ của bom nguy&ecirc;n tử&rdquo;.</p>', '1', '/storage/photos/1/Oppenheimer.jpg', 'phimle', 39, 1, 7, 'Oppenheimer', 1, 1, '181 phút', 1, '2023-08-17 17:40:28', '2023-08-21 11:50:44'),
	(29, 'Tà Chú Cấm', 'Home for Rent 2023', 'ta-chu-cam', '2023', NULL, 1, 0, 1, '<p><strong>T&agrave; Ch&uacute; Cấm &ndash; Home for Rent (2023)</strong>&nbsp;kh&aacute;m ph&aacute; nỗi &aacute;m ảnh từ sự kiện thật tại Th&aacute;i Lan, kể về gia đ&igrave;nh Ning v&agrave; Kwin khi họ chuyển đến căn hộ chung cư gi&aacute; rẻ. H&agrave;nh vi kỳ lạ của Kwin v&agrave; h&igrave;nh xăm b&iacute; ẩn dẫn đến nguy hiểm đối với con g&aacute;i Ing. B&iacute; mật đen tối trong ng&ocirc;i nh&agrave; thu&ecirc; đang chờ đợi.</p>', '1', '/storage/photos/1/ta-chu-cam.jpg', 'phimle', 39, 1, 8, 'Home for Rent, ta chu cam', 1, 5, '124 phút', 1, '2023-08-17 17:42:33', '2023-08-21 11:50:57'),
	(30, 'Quỷ Quyệt 5: Cửa Đỏ Vô Định', 'Insidious 5: The Red Door 2023', 'quy-quyet-5 -cua-do-vo-dinh', '2023', NULL, 1, 0, 1, '<p><strong>Quỷ Quyệt 5: Cửa Đỏ V&ocirc; Định &ndash; Insidious 5: The Red Door (2023)</strong>&nbsp;lấy bối cảnh sau mười năm kể từ hai phần phim đầu ti&ecirc;n, Josh Lambert (Patrick Wilson) đang chuyển đến sinh sống tại ph&iacute;a Đ&ocirc;ng để đưa cậu con trai Dalton (Ty Simpkins) đến học tại một trường đại học b&igrave;nh dị, phủ đầy c&acirc;y thường xu&acirc;n. Tuy nhi&ecirc;n, giấc mơ đại học của Dalton lại trở lại một &aacute;c mộng khi những con quỷ bị k&igrave;m h&atilde;m trong qu&aacute; khứ bằng một c&aacute;ch n&agrave;o đ&oacute; đ&atilde; quay trở lại v&agrave; tiếp tục &aacute;m hai cha con.</p>', '1', '/storage/photos/1/quy-quyet-cua-do-vo-dinh.jpg', 'phimle', 39, 1, 8, 'quy quyet, cua do vo dinh', 1, 5, '110 phút', 1, '2023-08-17 17:44:43', '2023-08-21 11:51:05'),
	(31, 'Ruby Thủy Quái Tuổi Teen', 'Ruby Gillman, Teenage Kraken 2023', 'ruby-thuy-quai-tuoi-teen', '2023', NULL, 1, 0, 1, '<p><strong>Ruby Thủy Qu&aacute;i Tuổi Teen</strong>&nbsp;kể về c&ocirc; b&eacute; Ruby Gillman nh&uacute;t nh&aacute;t, t&igrave;nh cờ ph&aacute;t hiện ra m&igrave;nh l&agrave; một phần của d&ograve;ng d&otilde;i thủy qu&aacute;i ho&agrave;ng gia huyền thoại. V&agrave; kể từ gi&acirc;y ph&uacute;t n&agrave;y, số phận của c&ocirc; b&eacute; dưới đ&aacute;y đại dương bỗng thay thổi ho&agrave;n to&agrave;n, c&ugrave;ng với đ&oacute; l&agrave; một sứ mệnh lớn hơn tất cả những g&igrave; c&ocirc; từng mơ đến.</p>', '1', '/storage/photos/1/Ruby-Thuy-Quai-Tuoi-Teen.jpg', 'phimle', 39, 1, 8, 'thuy quai tuoi teen', 1, 1, '91 phút', 1, '2023-08-17 17:47:07', '2023-08-21 11:51:13'),
	(32, 'Siêu Nhân Cuồng Phong Kỷ Niệm 20 Năm', 'Ninpu Sentai Hurricaneger: 20 Years After 2023', 'sieu-nhan-cuong-phong-ky-niem-20-nam', '2023', NULL, 1, 0, 1, '<p><strong>Si&ecirc;u Nh&acirc;n Cuồng Phong Kỷ Niệm 20 Năm &ndash; Hurricaneger: 20 Years After (2023)</strong>&nbsp;lấy bối cảnh ở thời Edo. V&igrave; một l&yacute; do chưa r&otilde;, 5 chiến binh quen thuộc của ch&uacute;ng ta đ&atilde; bị đưa về thời kỳ n&agrave;y. Tại đ&acirc;y, họ sẽ c&ugrave;ng với 5 tổ ti&ecirc;n của m&igrave;nh để chống lại b&egrave; lũ phản diện Oilanda v&agrave; Aunja với mục ti&ecirc;u gi&agrave;nh lại vi&ecirc;n đ&aacute; Tensho &ndash; b&aacute;u vật c&oacute; sức mạnh hủy diệt thế giới.</p>', '1', '/storage/photos/1/Sieu-nhan-cuong-phong-ky-niem-20-nam.jpg', 'phimle', 36, 2, 8, 'sieu nhan, cuong phong', 1, 1, '110 phút', 2, '2023-08-17 17:49:20', '2023-08-21 11:51:21'),
	(33, 'Indiana Jones 5 và Vòng Quay Định Mệnh', 'Indiana Jones 5 and the Dial of Destiny 2023', 'indiana-jones-5-va-vong-quay-dinh-menh', '2023', NULL, 1, 0, 1, '<p><strong>Indiana Jones 5 v&agrave; V&ograve;ng Quay Định Mệnh &ndash; Indiana Jones and the Dial of Destiny (2023)</strong>&nbsp;sẽ pha trộn giữa thực tế, hư cấu khi lấy bối cảnh năm 1969, lần n&agrave;y Indiana Jones sẽ đối mặt với Đức quốc x&atilde; trong thời gian diễn ra cuộc chạy đua v&agrave;o kh&ocirc;ng gian.</p>', '1', '/storage/photos/1/Indiana-Jones-va-Vong-Quay-Dinh-Menh.jpg', 'phimle', 36, 1, 7, 'vong quay dinh menh', 1, 1, '154 phút', 2, '2023-08-17 17:51:10', '2023-08-21 11:51:28'),
	(34, 'Quái Vật Đen', 'The Black Demon 2023', 'quai-vat-den', '2023', NULL, 1, 0, 1, '<p><strong>Qu&aacute;i Vật Đen &ndash; The Black Demon (2023)</strong>&nbsp;xoay quanh c&acirc;u chuyện khi kỳ nghỉ b&igrave;nh dị của gia đ&igrave;nh Oilman Paul Sturges biến th&agrave;nh cơn &aacute;c mộng. Bởi họ đ&atilde; gặp phải một con c&aacute; mập Megalodon hung dữ, kh&ocirc;ng từ bất kỳ khoảnh khắc n&agrave;o để bảo vệ l&atilde;nh thổ của m&igrave;nh. Bị mắc kẹt v&agrave; tấn c&ocirc;ng li&ecirc;n tục, Paul v&agrave; gia đ&igrave;nh của m&igrave;nh phải t&igrave;m c&aacute;ch để an to&agrave;n sống s&oacute;t trở về bờ trước khi con c&aacute; mập kh&aacute;t m&aacute;u n&agrave;y tấn c&ocirc;ng lần nữa.</p>', '1', '/storage/photos/1/Phim-quai-vat-den.jpg', 'phimle', 39, 1, 5, 'quai vat den', 2, 5, '100 phút', 1, '2023-08-17 17:52:45', '2023-08-21 11:51:38'),
	(35, 'Ngục Tối Và Rồng: Danh Dự Của Kẻ Trộm', 'Dungeons & Dragons: Honor Among Thieves 2023', 'nguc-toi-va-rong -danh-du-cua-ke-trom', '2023', NULL, 1, 0, 1, '<p><strong>Ngục Tối V&agrave; Rồng: Danh Dự Của Kẻ Trộm &ndash; Dungeons &amp; Dragons: Honor Among Thieves (2023)</strong>&nbsp;theo ch&acirc;n một t&ecirc;n trộm quyến rũ v&agrave; một nh&oacute;m những kẻ bịp bợm nghiệp dư thực hiện vụ trộm sử thi nhằm lấy lại một di vật đ&atilde; mất, nhưng mọi thứ trở n&ecirc;n nguy hiểm kh&oacute; lường hơn bao giờ hết khi họ đ&atilde; chạm tr&aacute;n nhầm người. Ngục Tối V&agrave; Rồng: Danh Dự Của Kẻ Trộm mang thế giới huyền ảo của tr&ograve; chơi nhập vai huyền thoại l&ecirc;n m&agrave;n ảnh rộng bằng một cuộc phi&ecirc;u lưu tr&agrave;n ngập c&aacute;c m&agrave;n h&agrave;nh động đ&atilde; mắt c&ugrave;ng m&agrave;u sắc h&agrave;i hước, vui nhộn.</p>', '1', '/storage/photos/1/Nguc-Toi-Rong-Danh-Du-Cua-Ke-Trom-2023.jpg', 'phimle', 39, 1, 7, 'nguc toi va rong, danh du cua ke trom', 1, 5, '134 phút', 1, '2023-08-17 17:56:29', '2023-08-21 11:51:48'),
	(36, 'Những Kẻ Thao Túng', 'Hypnotic 2023', 'nhung-ke-thao-tung', '2023', NULL, 1, 0, 1, '<p><strong>Những Kẻ Thao T&uacute;ng &ndash; Hypnotic (2023)</strong>&nbsp;theo ch&acirc;n th&aacute;m tử Daniel Rourke (Ben Affleck) trong h&agrave;nh tr&igrave;nh t&igrave;m kiếm c&ocirc; con g&aacute;i bị mất t&iacute;ch. Anh sớm nhận ra tất cả những chuyện b&iacute; ẩn n&agrave;y đều li&ecirc;n quan đến một người đ&agrave;n &ocirc;ng c&oacute; sức mạnh th&ocirc;i mi&ecirc;n, bẻ cong thực tại. Với sự hỗ trợ từ nh&agrave; ngoại cảm Diana Cruz (Alice Braga), Daniel bắt đầu truy đuổi hắn v&agrave; phải t&igrave;m mọi c&aacute;ch để đưa con g&aacute;i m&igrave;nh trở về nh&agrave; an to&agrave;n.</p>', '1', '/storage/photos/1/nhung-ke-thao-tung.jpg', 'phimle', 39, 1, 8, 'nhung ke thao tung', 1, 1, '94 phút', 1, '2023-08-17 17:58:21', '2023-08-21 11:51:58'),
	(37, 'Sheena: Nữ Chúa Rừng Xanh', 'Sheena 1984', 'sheena -nu-chua-rung-xanh', '2023', NULL, 1, 0, 1, '<p><strong>Sheena: Nữ Ch&uacute;a Rừng Xanh (1984)</strong>&nbsp;Sheena, c&ograve;n được gọi l&agrave; Sheena: Queen of the Jungle, l&agrave; một bộ phim phi&ecirc;u lưu giả tưởng năm 1984 dựa tr&ecirc;n một nh&acirc;n vật truyện tranh xuất hiện lần đầu v&agrave;o cuối những năm 1930, Sheena, Queen of the Jungle. L&agrave; sự kết hợp giữa kịch t&iacute;nh phi&ecirc;u lưu h&agrave;nh động v&agrave; x&agrave; ph&ograve;ng opera, Sheena đ&atilde; bị bắn v&agrave;o địa điểm ở Kenya.</p>\r\n\r\n<p>Từ b&eacute;, Sheena đ&atilde; mồ c&ocirc;i trong 1 tai nạn, v&agrave; được Kali nu&ocirc;i dưỡng &ndash; th&agrave;nh vi&ecirc;n cuối c&ugrave;ng của bộ tộc Kaya. Bộ tộc n&agrave;y nắm giữ 1 sức mạnh huyền b&iacute;, c&oacute; thể gi&uacute;p con người biến h&igrave;nh th&agrave;nh động vật, v&agrave; Sheena được thừa hưởng điều n&agrave;y. Vận mệnh của c&ocirc; l&agrave; sử dụng năng lực của m&igrave;nh v&agrave; sự thấu hiểu về thế giới hiện đại để bảo vệ rừng gi&agrave; c&ugrave;ng c&aacute;c lo&agrave;i vật.</p>', '1', '/storage/photos/1/Sheena.jpg', 'phimle', 38, 1, 4, 'nu chua rung xanh', 1, 1, '117 phút', 1, '2023-08-18 23:19:27', '2023-08-21 11:52:09'),
	(43, 'TÂN TAM QUỐC DIỄN NGHĨA', 'Three Kingdoms (2010)', 'tan-tam-quoc-dien-nghia', '2010', NULL, 85, 0, 1, '<p>Three Kingdoms (T&acirc;n Tam Quốc Diễn Nghĩa) l&agrave; t&aacute;c phẩm truyền h&igrave;nh thứ hai được chuyển thể từ tiểu thuyết &lsquo;Tam quốc diễn nghĩa&rsquo; v&agrave; quyển &lsquo;Sử k&yacute; Tam Quốc&rsquo;, kể về những năm th&aacute;ng loạn lạc khi nh&agrave; Đ&ocirc;ng H&aacute;n sụp đổ th&igrave; Đổng Tr&aacute;c v&ugrave;ng l&ecirc;n th&acirc;u t&oacute;m quyền h&agrave;nh khiến quần h&ugrave;ng c&aacute;t cứ ph&acirc;n chia Trung Quốc th&agrave;nh ba nước Ngụy - Thục - Ng&ocirc; cho đến khi nh&agrave; Tấn thống nhất lại th&agrave;nh một.<br />\r\nPhim xoay quanh qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển theo thế ch&acirc;n vạc giữa ba nước với c&aacute;c nh&acirc;n vật chủ đạo như Gia C&aacute;t Lượng, T&agrave;o Th&aacute;o, Lưu Bị, T&ocirc;n Quyền, Chu Du, Tư M&atilde; &Yacute;&hellip; đan xen về những m&acirc;u thuẫn trong việc tranh gi&agrave;nh ng&ocirc;i thứ trong gia đ&igrave;nh họ T&agrave;o; những rắc rối t&iacute;nh &aacute;i giữa T&agrave;o Phi, T&agrave;o Thực v&agrave; n&agrave;ng Ch&acirc;n Phi với những bất đồng chiến lược, những cuộc chiến t&agrave;i tr&iacute; giữa Gia C&aacute;t Lượng v&agrave; Lưu Bị, giữa Chu Du v&agrave; T&ocirc;n Quyền</p>', '1', '/storage/photos/1/tan-tam-quoc-dien-nghia-393.jpg', 'phimbo', 41, 6, 7, 'xem phim Tân Tam Quốc Diễn Nghĩa vietsub, phim Three Kingdoms vietsub', 2, 1, '45 phút / tập', 1, '2023-08-19 15:34:25', '2023-08-21 10:09:38'),
	(44, 'TÂN THỦY HỬ', 'All Men Are Brothers (2011)', 'tan-thuy-hu', '2011', NULL, 86, 0, 1, '<p>Với thế mạnh bề dầy kinh nghiệm l&agrave;m phim v&otilde; thuật cổ trang, phần nội dung v&otilde; thuật trong &ldquo;<strong>T&acirc;n thủy hử</strong>&rdquo; l&agrave; ti&ecirc;u điểm rất được c&ocirc;ng ch&uacute;ng ch&uacute; &yacute;. Theo tiết lộ của đạo diễn, phi&ecirc;n bản mới vừa ho&agrave;n th&agrave;nh đ&atilde; th&agrave;nh c&ocirc;ng khai th&aacute;c to&agrave;n diện ưu điểm v&agrave; thậm ch&iacute; c&ograve;n c&oacute; nhiều đột ph&aacute;</p>', '1', '/storage/photos/1/tan-thuy-hu-1426.jpg', 'phimbo', 41, 6, 7, 'xem phim Tân Thủy Hử vietsub, phim All Men Are Brothers vietsub', 2, 6, '45 phút/tập', 1, '2023-08-20 18:25:02', '2023-08-21 10:09:27');

-- Dumping structure for table laravel_movie.movie_genre
CREATE TABLE IF NOT EXISTS `movie_genre` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) unsigned NOT NULL,
  `genre_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_movie_genre_genres` (`genre_id`),
  KEY `FK_movie_genre_movies` (`movie_id`),
  CONSTRAINT `FK_movie_genre_genres` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_movie_genre_movies` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table laravel_movie.movie_genre: ~86 rows (approximately)
INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
	(17, 13, 1),
	(18, 14, 1),
	(19, 15, 1),
	(20, 16, 1),
	(21, 17, 1),
	(23, 19, 1),
	(24, 20, 1),
	(25, 21, 1),
	(26, 22, 1),
	(27, 27, 1),
	(28, 28, 1),
	(30, 30, 5),
	(31, 31, 8),
	(32, 32, 8),
	(33, 33, 1),
	(34, 34, 1),
	(35, 34, 5),
	(36, 35, 1),
	(37, 35, 2),
	(38, 35, 7),
	(39, 36, 1),
	(40, 36, 4),
	(41, 36, 8),
	(42, 37, 1),
	(43, 37, 4),
	(44, 10, 1),
	(45, 10, 3),
	(46, 10, 8),
	(47, 11, 1),
	(48, 11, 4),
	(49, 11, 7),
	(50, 12, 1),
	(51, 12, 6),
	(52, 12, 8),
	(53, 9, 1),
	(54, 9, 5),
	(55, 9, 8),
	(56, 13, 3),
	(57, 13, 7),
	(58, 13, 8),
	(59, 14, 3),
	(60, 14, 4),
	(61, 14, 6),
	(62, 14, 8),
	(63, 15, 3),
	(64, 15, 4),
	(65, 15, 7),
	(66, 16, 7),
	(67, 16, 8),
	(68, 17, 4),
	(69, 17, 6),
	(70, 17, 8),
	(74, 19, 6),
	(75, 19, 7),
	(76, 20, 4),
	(77, 20, 7),
	(78, 21, 4),
	(79, 21, 6),
	(80, 21, 7),
	(81, 22, 2),
	(82, 22, 4),
	(83, 22, 7),
	(84, 27, 3),
	(85, 27, 4),
	(86, 27, 8),
	(87, 28, 4),
	(88, 28, 6),
	(89, 28, 7),
	(90, 29, 5),
	(91, 29, 8),
	(92, 30, 1),
	(93, 30, 4),
	(94, 30, 8),
	(95, 31, 1),
	(96, 31, 3),
	(97, 31, 6),
	(98, 32, 1),
	(99, 32, 7),
	(100, 33, 1),
	(101, 33, 4),
	(102, 33, 7),
	(103, 10, 4),
	(116, 43, 1),
	(117, 43, 2),
	(118, 43, 4),
	(119, 43, 7),
	(120, 44, 2),
	(121, 44, 6),
	(122, 44, 7);

-- Dumping structure for table laravel_movie.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_movie.password_resets: ~0 rows (approximately)

-- Dumping structure for table laravel_movie.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_movie.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel_movie.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_movie.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel_movie.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_movie.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Bùi Hùng', 'hungb.z98@gmail.com', NULL, '$2y$10$tdz1HEWbdB8OYdQUU91QO.p9TLJeR2ICyv2tiXCA8X4g6468jp38W', NULL, '2023-08-09 16:07:22', '2023-08-09 16:07:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
