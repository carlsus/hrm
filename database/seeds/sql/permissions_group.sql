/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80011 (8.0.11)
 Source Host           : localhost:3306
 Source Schema         : hrm_db

 Target Server Type    : MySQL
 Target Server Version : 80011 (8.0.11)
 File Encoding         : 65001

 Date: 21/02/2023 04:59:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permissions_group
-- ----------------------------
DROP TABLE IF EXISTS `permissions_group`;
CREATE TABLE `permissions_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions_group
-- ----------------------------
BEGIN;
INSERT INTO `permissions_group` (`id`, `name`, `menu`, `created_at`, `updated_at`) VALUES (1, 'Dashboard', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` (`id`, `name`, `menu`, `created_at`, `updated_at`) VALUES (2, 'Employee List', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` (`id`, `name`, `menu`, `created_at`, `updated_at`) VALUES (3, 'Payroll', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` (`id`, `name`, `menu`, `created_at`, `updated_at`) VALUES (4, 'Maintenance', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
INSERT INTO `permissions_group` (`id`, `name`, `menu`, `created_at`, `updated_at`) VALUES (5, 'Security', 1, '2021-02-06 09:46:48', '2021-02-06 09:46:48');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
