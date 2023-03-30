/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80011
 Source Host           : localhost:3306
 Source Schema         : hrm_db

 Target Server Type    : MySQL
 Target Server Version : 80011
 File Encoding         : 65001

 Date: 30/03/2023 22:29:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permissions_group
-- ----------------------------
DROP TABLE IF EXISTS `permissions_group`;
CREATE TABLE `permissions_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions_group
-- ----------------------------
BEGIN;
INSERT INTO `permissions_group` VALUES (1, 'Dashboard', 1, '2023-03-30 22:25:20', '2023-03-30 22:25:20');
INSERT INTO `permissions_group` VALUES (2, 'Human Resource', 1, '2023-03-30 22:25:20', '2023-03-30 22:25:20');
INSERT INTO `permissions_group` VALUES (3, 'Payroll', 1, '2023-03-30 22:25:20', '2023-03-30 22:25:20');
INSERT INTO `permissions_group` VALUES (4, 'Attendance', 1, '2023-03-30 22:25:20', '2023-03-30 22:25:20');
INSERT INTO `permissions_group` VALUES (5, 'Maintenance', 1, '2023-03-30 22:25:20', '2023-03-30 22:25:20');
INSERT INTO `permissions_group` VALUES (6, 'Security', 0, '2023-03-30 22:25:20', '2023-03-30 22:25:20');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
