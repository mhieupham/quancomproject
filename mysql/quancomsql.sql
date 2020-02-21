/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3306
 Source Schema         : quancomsql

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 21/02/2020 17:02:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for food_lists
-- ----------------------------
DROP TABLE IF EXISTS `food_lists`;
CREATE TABLE `food_lists`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for foods
-- ----------------------------
DROP TABLE IF EXISTS `foods`;
CREATE TABLE `foods`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_food` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_food` decimal(18, 0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of foods
-- ----------------------------
INSERT INTO `foods` VALUES (2, 'Cơm 25k', 25000, '2019-12-25 23:13:52', '2019-12-25 23:13:55');
INSERT INTO `foods` VALUES (10, 'Cơm 30k', 30000, '2020-02-20 02:53:56', '2020-02-20 02:53:56');
INSERT INTO `foods` VALUES (11, 'Sting', 10000, '2020-02-20 02:54:16', '2020-02-20 02:54:16');

-- ----------------------------
-- Table structure for history_buy
-- ----------------------------
DROP TABLE IF EXISTS `history_buy`;
CREATE TABLE `history_buy`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count_foods` int(11) NOT NULL,
  `id_foods` bigint(20) UNSIGNED NOT NULL,
  `create_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_foods`(`id_foods`) USING BTREE,
  CONSTRAINT `history_buy_ibfk_1` FOREIGN KEY (`id_foods`) REFERENCES `foods` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of history_buy
-- ----------------------------
INSERT INTO `history_buy` VALUES (1, 1, 2, '2020-02-20');
INSERT INTO `history_buy` VALUES (2, 2, 10, '2020-02-20');
INSERT INTO `history_buy` VALUES (3, 1, 2, '2020-02-20');
INSERT INTO `history_buy` VALUES (4, 1, 2, '2020-02-20');
INSERT INTO `history_buy` VALUES (5, 1, 10, '2020-02-20');
INSERT INTO `history_buy` VALUES (6, 1, 2, '2020-02-20');
INSERT INTO `history_buy` VALUES (7, 3, 11, '2020-02-20');
INSERT INTO `history_buy` VALUES (8, 2, 11, '2020-02-20');
INSERT INTO `history_buy` VALUES (9, 1, 10, '2020-02-20');
INSERT INTO `history_buy` VALUES (10, 1, 2, '2020-02-20');
INSERT INTO `history_buy` VALUES (11, 2, 2, '2020-02-21');
INSERT INTO `history_buy` VALUES (12, 2, 10, '2020-02-21');
INSERT INTO `history_buy` VALUES (13, 1, 11, '2020-02-21');
INSERT INTO `history_buy` VALUES (14, 1, 2, '2020-02-21');
INSERT INTO `history_buy` VALUES (15, 1, 2, '2020-02-21');
INSERT INTO `history_buy` VALUES (16, 2, 10, '2020-02-21');
INSERT INTO `history_buy` VALUES (17, 1, 11, '2020-02-21');
INSERT INTO `history_buy` VALUES (18, 3, 2, '2020-02-21');
INSERT INTO `history_buy` VALUES (19, 1, 11, '2020-02-21');
INSERT INTO `history_buy` VALUES (20, 1, 10, '2020-02-21');
INSERT INTO `history_buy` VALUES (21, 1, 2, '2020-02-21');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_23_154851_create_food_lists_table', 2);
INSERT INTO `migrations` VALUES (5, '2019_12_25_151654_create_foods_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'mhieupham', 'mhieupham1@gmail.com', NULL, '$2y$10$BcqEtTlh5zTlmnMfVrRNr.492sboh.4lX0dbWfOwbSyVSnTqA1w8.', NULL, '2019-12-23 15:36:23', '2019-12-23 15:36:23');
INSERT INTO `users` VALUES (2, 'mhieupham', 'mhieupham3@gmail.com', NULL, '$2y$10$RkzO.GKK6rd/jMvRIbCM5.Uld67wzFbBWMEzmwl4.AmiRTmeJ.i8q', NULL, '2020-02-15 07:15:37', '2020-02-15 07:15:37');

SET FOREIGN_KEY_CHECKS = 1;
