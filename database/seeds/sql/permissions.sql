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

 Date: 30/03/2023 22:32:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group_id` bigint(20) unsigned NOT NULL,
  `guard_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_permission_group_id_foreign` (`permission_group_id`),
  CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permissions_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES (1, 'dashboard-menu', 'dashboard-menu', 1, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (2, 'employee-list', 'employee-list', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (3, 'employee-create', 'employee-create', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (4, 'employee-edit', 'employee-edit', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (5, 'employee-delete', 'employee-delete', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (6, 'employee-accountability-list', 'employee-accountability-list', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (7, 'employee-accountability-create', 'employee-accountability-create', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (8, 'employee-accountability-edit', 'employee-accountability-edit', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (9, 'employee-accountability-delete', 'employee-accountability-delete', 2, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (10, 'payslip-list', 'payslip-list', 3, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (11, 'payslip-create', 'payslip-create', 3, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (12, 'payslip-view', 'payslip-view', 3, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (13, 'cash-advance-list', 'cash-advance-list', 3, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (14, 'cash-advance-create', 'cash-advance-create', 3, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (15, 'cash-advance-edit', 'cash-advance-edit', 3, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (16, 'cash-advance-delete', 'cash-advance-delete', 3, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (17, 'attendance-log-list', 'attendance-log-list', 4, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (18, 'project-list', 'project-list', 4, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (19, 'project-create', 'project-create', 4, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (20, 'project-edit', 'project-edit', 4, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (21, 'project-delete', 'project-delete', 4, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (22, 'department-list', 'department-list', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (23, 'department-create', 'department-create', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (24, 'department-edit', 'department-edit', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (25, 'department-delete', 'department-delete', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (26, 'position-list', 'position-list', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (27, 'position-create', 'position-create', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (28, 'position-edit', 'position-edit', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (29, 'position-delete', 'position-delete', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (30, 'deduction-list', 'deduction-list', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (31, 'deduction-create', 'deduction-create', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (32, 'deduction-edit', 'deduction-edit', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (33, 'deduction-delete', 'deduction-delete', 5, 'web', '2023-03-30 22:16:31', '2023-03-30 22:16:37');
INSERT INTO `permissions` VALUES (34, 'accountability-list', 'accountability-list', 5, 'web', '2023-03-30 22:17:58', '2023-03-30 22:18:01');
INSERT INTO `permissions` VALUES (36, 'accountability-create', 'accountability-create', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (37, 'accountability-edit', 'accountability-edit', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (38, 'accountability-delete', 'accountability-delete', 5, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (39, 'user-list', 'user-list', 6, 'web', '2023-03-30 22:17:58', '2023-03-30 22:18:01');
INSERT INTO `permissions` VALUES (40, 'user-create', 'user-create', 6, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (41, 'user-edit', 'user-edit', 6, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (42, 'user-delete', 'user-delete', 6, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (43, 'role-list', 'role-list', 6, 'web', '2023-03-30 22:17:58', '2023-03-30 22:18:01');
INSERT INTO `permissions` VALUES (44, 'role-create', 'role-create', 6, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (45, 'role-edit', 'role-edit', 6, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
INSERT INTO `permissions` VALUES (46, 'role-delete', 'role-delete', 6, 'web', '2023-03-30 22:11:34', '2023-03-30 22:11:34');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
