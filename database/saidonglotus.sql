/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : saidonglotus

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 14/02/2020 18:46:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for client_request
-- ----------------------------
DROP TABLE IF EXISTS `client_request`;
CREATE TABLE `client_request`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` int(11) NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `post_id` int(11) NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_04_15_191331679173_create_1555355612601_permissions_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_04_15_191331731390_create_1555355612581_roles_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_04_15_191331779537_create_1555355612782_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_04_15_191332603432_create_1555355612603_permission_role_pivot_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_04_15_191332791021_create_1555355612790_role_user_pivot_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_04_15_191441675085_create_1555355681975_products_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_08_19_000000_create_failed_jobs_table', 1);

-- ----------------------------
-- Table structure for panel
-- ----------------------------
DROP TABLE IF EXISTS `panel`;
CREATE TABLE `panel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_panel` int(11) NOT NULL,
  `image_position` int(11) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL COMMENT 'là product_id or news_id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
  INDEX `permission_role_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (1, 3);
INSERT INTO `permission_role` VALUES (1, 4);
INSERT INTO `permission_role` VALUES (1, 5);
INSERT INTO `permission_role` VALUES (1, 6);
INSERT INTO `permission_role` VALUES (1, 7);
INSERT INTO `permission_role` VALUES (1, 8);
INSERT INTO `permission_role` VALUES (1, 9);
INSERT INTO `permission_role` VALUES (1, 10);
INSERT INTO `permission_role` VALUES (1, 11);
INSERT INTO `permission_role` VALUES (1, 12);
INSERT INTO `permission_role` VALUES (1, 13);
INSERT INTO `permission_role` VALUES (1, 14);
INSERT INTO `permission_role` VALUES (1, 15);
INSERT INTO `permission_role` VALUES (1, 16);
INSERT INTO `permission_role` VALUES (1, 17);
INSERT INTO `permission_role` VALUES (1, 18);
INSERT INTO `permission_role` VALUES (1, 19);
INSERT INTO `permission_role` VALUES (1, 20);
INSERT INTO `permission_role` VALUES (1, 21);
INSERT INTO `permission_role` VALUES (2, 17);
INSERT INTO `permission_role` VALUES (2, 18);
INSERT INTO `permission_role` VALUES (2, 19);
INSERT INTO `permission_role` VALUES (2, 20);
INSERT INTO `permission_role` VALUES (2, 21);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'user_management_access', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (2, 'permission_create', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (3, 'permission_edit', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (4, 'permission_show', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (5, 'permission_delete', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (6, 'permission_access', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (7, 'role_create', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (8, 'role_edit', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (9, 'role_show', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (10, 'role_delete', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (11, 'role_access', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (12, 'user_create', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (13, 'user_edit', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (14, 'user_show', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (15, 'user_delete', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (16, 'user_access', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (17, 'product_create', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (18, 'product_edit', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (19, 'product_show', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (20, 'product_delete', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);
INSERT INTO `permissions` VALUES (21, 'product_access', '2019-04-15 19:14:42', '2019-04-15 19:14:42', NULL);

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_top` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `post_relate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES (1, 'nướng sieu dai để tét vuout klhung', 'n-ng-sieu-dai-t-t-vuout-klhung', 'adsadsad', 'Chính sách bảo hành', NULL, 'ádasdsadsa', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (2, 'Đồ ăn cho mùa dong giá lạnh test dài vo tận', '-n-cho-m-a-dong-gi-l-nh-test-d-i-vo-t-n', 'quà tặng tết , quà tặng sinh nhật ,đồ phong thủy ,tặng gì ngày sinh nhật,', 'quà tặng tết , quà tặng sinh nhật ,đồ phong thủy ,tặng gì ngày sinh nhật,', '-n-cho-m-a-dong-gi-l-nh-test-d-i-vo-t-n.PNG', 'quà tặng tết , quà tặng sinh nhật ,đồ phong thủy ,tặng gì ngày sinh nhật,', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (3, 'Đồ ăn cho mùa dong giá lạnh test dài vo tận', '-n-cho-m-a-dong-gi-l-nh-test-d-i-vo-t-n', 'quà tặng tết , quà tặng sinh nhật ,đồ phong thủy ,tặng gì ngày sinh nhật,', 'quà tặng tết , quà tặng sinh nhật ,đồ phong thủy ,tặng gì ngày sinh nhật,', '-n-cho-m-a-dong-gi-l-nh-test-d-i-vo-t-n.PNG', 'quà tặng tết , quà tặng sinh nhật ,đồ phong thủy ,tặng gì ngày sinh nhật,', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (4, 'nướng sieu dai để tét vuout klhung', 'n-ng-sieu-dai-t-t-vuout-klhung', 'ádasds', 'mệnh thổ hợp màu gì,mệnh thổ đeo vòng gì,mệnh thổ đeo màu gì,mệnh thổ đeo vòng tay màu gì,vòng đá mệnh thổ ,vòng tay đá mệnh thổ ,mặt đá mệnh thổ ,mệnh thổ hợp đá màu gì', 'n-ng-sieu-dai-t-t-vuout-klhung.png', 'ádasdsadas', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (5, 'nướng sieu dai để tét vuout klhung', 'n-ng-sieu-dai-t-t-vuout-klhung1581624766', 'ádasds', 'mệnh thổ hợp màu gì,mệnh thổ đeo vòng gì,mệnh thổ đeo màu gì,mệnh thổ đeo vòng tay màu gì,vòng đá mệnh thổ ,vòng tay đá mệnh thổ ,mặt đá mệnh thổ ,mệnh thổ hợp đá màu gì', 'n-ng-sieu-dai-t-t-vuout-klhung1581624766.png', 'ádasdsadas', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (6, 'nướng sieu dai để tét vuout klhung', 'n-ng-sieu-dai-t-t-vuout-klhung-1581624832', 'ádasds', 'mệnh thổ hợp màu gì,mệnh thổ đeo vòng gì,mệnh thổ đeo màu gì,mệnh thổ đeo vòng tay màu gì,vòng đá mệnh thổ ,vòng tay đá mệnh thổ ,mặt đá mệnh thổ ,mệnh thổ hợp đá màu gì', 'n-ng-sieu-dai-t-t-vuout-klhung-1581624832.png', 'ádasdsadas', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (7, 'nướng sieu dai để tét vuout klhung dai nhu the roi ma no van chưa vuọt', 'n-ng-sieu-dai-t-t-vuout-klhung-dai-nhu-the-roi-ma-no-van-ch-a-vu-t-1581624877', 'aaaaa', 'mệnh hỏa hợp màu gì,mệnh hỏa đeo vòng gì,mệnh hỏa đeo màu gì,mệnh hỏa đeo vòng tay màu gì,vòng đá mệnh hỏa ,vòng tay đá mệnh hỏa ,mặt đá mệnh hỏa ,mệnh hỏa hợp đá màu gì', 'n-ng-sieu-dai-t-t-vuout-klhung-dai-nhu-the-roi-ma-no-van-ch-a-vu-t-1581624877.jpg', 'aaaaaaaaa', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (8, 'nướng sieu dai để tét vuout klhung', 'n-ng-sieu-dai-t-t-vuout-klhung-1581624953', 'adsadsad', 'Chính sách bảo hành', 'n-ng-sieu-dai-t-t-vuout-klhung-1581624953.png', 'ádasdsadsa', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (9, 'nướng sieu dai để tét vuout klhung', 'n-ng-sieu-dai-t-t-vuout-klhung-1581625007', 'adsadsad', 'Chính sách bảo hành', 'n-ng-sieu-dai-t-t-vuout-klhung-1581625007.png', 'ádasdsadsa', 1, 1, 1, NULL, '2020-02-13', '2020-02-13');
INSERT INTO `post` VALUES (10, 'Chính sách bảo hành', 'ch-nh-s-ch-b-o-h-nh-1581669408', NULL, NULL, 'ch-nh-s-ch-b-o-h-nh-1581669408.jpg', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/33.jpg\" style=\"height:667px; width:1600px\" /></p>', 1, 1, 1, NULL, '2020-02-14', '2020-02-14');
INSERT INTO `post` VALUES (11, 'Đồ ăn cho mùa dong giá lạnh test dài vo tận', '-n-cho-m-a-dong-gi-l-nh-test-d-i-vo-t-n-1581679810', 'tỳ hưu , lắc bạc , nhẫn phong thủy ,vòng chram bạc ,..', 'tỳ hưu , lắc bạc , nhẫn phong thủy ,vòng chram bạc ,..', '-n-cho-m-a-dong-gi-l-nh-test-d-i-vo-t-n-1581679810.jpg', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/33.jpg\" style=\"height:667px; width:1600px\" /></p>', 0, 2, 1, NULL, '2020-02-14', '2020-02-14');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `price` decimal(15, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Giàng A Páo', 'test', 122.00, '2020-02-13 15:17:53', '2020-02-13 15:17:53', NULL);
INSERT INTO `products` VALUES (2, 'Giàng A Páo', 'aaaaa', NULL, '2020-02-14 07:02:27', '2020-02-14 07:02:27', NULL);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  INDEX `role_user_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', '2019-04-15 19:13:32', '2019-04-15 19:13:32', NULL);
INSERT INTO `roles` VALUES (2, 'User', '2019-04-15 19:13:32', '2019-04-15 19:13:32', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@admin.com', NULL, '$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO', NULL, '2019-04-15 19:13:32', '2019-04-15 19:13:32', NULL);

SET FOREIGN_KEY_CHECKS = 1;
