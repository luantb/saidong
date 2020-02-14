-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `banner` (`id`, `title`, `description`, `status`, `image`) VALUES
(1,	'Chính sách bảo hành',	'aaaaa',	0,	'ch-nh-s-ch-b-o-h-nh-1581707278.PNG'),
(2,	'banner nha to',	'banner nha to',	1,	'banner-11111111-1581699480.PNG'),
(3,	'banner 1',	'no',	1,	'banner-1-1581695766.PNG');

DROP TABLE IF EXISTS `client_request`;
CREATE TABLE `client_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `landing_page`;
CREATE TABLE `landing_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL COMMENT '1 ảnh-chữ, 2 chữ- ảnh, 3 chỉ chữ,4 text và form',
  `page_type` int(11) NOT NULL COMMENT '0=link onpage ,1 link redirect',
  `type` int(11) NOT NULL COMMENT '1 text,2-tin tức, 3 sản phẩm ,4 form',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2019_04_15_191331679173_create_1555355612601_permissions_table',	1),
(2,	'2019_04_15_191331731390_create_1555355612581_roles_table',	1),
(3,	'2019_04_15_191331779537_create_1555355612782_users_table',	1),
(4,	'2019_04_15_191332603432_create_1555355612603_permission_role_pivot_table',	1),
(5,	'2019_04_15_191332791021_create_1555355612790_role_user_pivot_table',	1),
(6,	'2019_04_15_191441675085_create_1555355681975_products_table',	1),
(7,	'2019_08_19_000000_create_failed_jobs_table',	1);

DROP TABLE IF EXISTS `panel`;
CREATE TABLE `panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_panel` int(11) NOT NULL,
  `image_position` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL COMMENT 'là product_id or news_id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'user_management_access',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(2,	'permission_create',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(3,	'permission_edit',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(4,	'permission_show',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(5,	'permission_delete',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(6,	'permission_access',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(7,	'role_create',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(8,	'role_edit',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(9,	'role_show',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(10,	'role_delete',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(11,	'role_access',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(12,	'user_create',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(13,	'user_edit',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(14,	'user_show',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(15,	'user_delete',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(16,	'user_access',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(17,	'product_create',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(18,	'product_edit',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(19,	'product_show',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(20,	'product_delete',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL),
(21,	'product_access',	'2019-04-15 12:14:42',	'2019-04-15 12:14:42',	NULL);

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  KEY `permission_role_role_id_foreign` (`role_id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1,	1),
(1,	2),
(1,	3),
(1,	4),
(1,	5),
(1,	6),
(1,	7),
(1,	8),
(1,	9),
(1,	10),
(1,	11),
(1,	12),
(1,	13),
(1,	14),
(1,	15),
(1,	16),
(1,	17),
(1,	18),
(1,	19),
(1,	20),
(1,	21),
(2,	17),
(2,	18),
(2,	19),
(2,	20),
(2,	21);

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_top` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `post_relate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `post` (`id`, `title`, `seo_url`, `description`, `keywords`, `image`, `content`, `is_top`, `type`, `status`, `post_relate`, `created_at`, `updated_at`) VALUES
(1,	'nướng sieu dai để tét vuout klhung',	'n-ng-sieu-dai-t-t-vuout-klhung',	'adsadsad',	'Chính sách bảo hành',	'n-ng-sieu-dai-t-t-vuout-klhung-1581705386.PNG',	'1',	1,	1,	0,	NULL,	'2020-02-13',	'2020-02-14'),
(4,	'nướng sieu dai để tét vuout klhung',	'n-ng-sieu-dai-t-t-vuout-klhung',	'ádasds',	'mệnh thổ hợp màu gì,mệnh thổ đeo vòng gì,mệnh thổ đeo màu gì,mệnh thổ đeo vòng tay màu gì,vòng đá mệnh thổ ,vòng tay đá mệnh thổ ,mặt đá mệnh thổ ,mệnh thổ hợp đá màu gì',	'n-ng-sieu-dai-t-t-vuout-klhung-1581705450.PNG',	'0',	1,	1,	0,	NULL,	'2020-02-13',	'2020-02-14'),
(8,	'nướng sieu dai để tét vuout klhung',	'n-ng-sieu-dai-t-t-vuout-klhung-1581624953',	'adsadsad',	'Chính sách bảo hành',	'n-ng-sieu-dai-t-t-vuout-klhung-1581624953.png',	'ádasdsadsa',	1,	1,	1,	NULL,	'2020-02-13',	'2020-02-13'),
(9,	'nướng sieu dai để tét vuout klhung',	'n-ng-sieu-dai-t-t-vuout-klhung-1581625007',	'adsadsad',	'Chính sách bảo hành',	'n-ng-sieu-dai-t-t-vuout-klhung-1581625007.png',	'ádasdsadsa',	1,	1,	1,	NULL,	'2020-02-13',	'2020-02-13');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Giàng A Páo',	'test',	122.00,	'2020-02-13 08:17:53',	'2020-02-13 08:17:53',	NULL);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Admin',	'2019-04-15 12:13:32',	'2019-04-15 12:13:32',	NULL),
(2,	'User',	'2019-04-15 12:13:32',	'2019-04-15 12:13:32',	NULL);

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1,	1),
(2,	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Admin',	'admin@admin.com',	NULL,	'$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO',	NULL,	'2019-04-15 12:13:32',	'2019-04-15 12:13:32',	NULL),
(2,	'Admin',	'devluan@gmail.com',	NULL,	'$2y$10$bxW2QnXAzW9IGXGHo6UTJ.Vf.J87w5Gy5w0Rd/KYan278AusmBCJi',	NULL,	'2020-02-14 11:00:05',	'2020-02-14 11:00:05',	NULL);

-- 2020-02-14 19:31:05
