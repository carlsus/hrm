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

 Date: 21/02/2023 04:59:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group_id` bigint(20) unsigned NOT NULL,
  `guard_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_permission_group_id_foreign` (`permission_group_id`),
  CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permissions_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (1, 'dashboard-menu', 'dashboard-menu', 1, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (2, 'employee-list-menu', 'employee-list-menu', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (3, 'employee-list-menu-can-create', 'employee-list-menu-can-create', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (4, 'employee-list-menu-can-edit', 'employee-list-menu-can-edit', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (5, 'employee-list-menu-can-delete', 'employee-list-menu-can-delete', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (6, 'payroll-menu', 'payroll-menu', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (7, 'payroll-menu-create', 'payroll-menu-create', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (8, 'payroll-menu-view', 'payroll-menu-view', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (9, 'cash-advance-menu', 'cash-advance-menu', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (10, 'cash-advance-view', 'cash-advance-view', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (11, 'maintenance-menu', 'maintenance-menu', 2, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (12, 'crew-management-menu', 'crew-management-menu', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (13, 'crew-management-create', 'crew-management-create', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (14, 'crew-management-edit', 'crew-management-edit', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (15, 'crew-management-delete', 'crew-management-delete', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (16, 'crew-management-view', 'crew-management-view', 3, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (17, 'on-board-management-menu', 'on-board-management-menu', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (18, 'embarkation-menu', 'embarkation-menu', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (19, 'embarkation-view', 'embarkation-view', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (20, 'embarkation-create', 'embarkation-create', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (21, 'embarkation-edit', 'embarkation-edit', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (22, 'embarkation-delete', 'embarkation-delete', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (23, 'disembarkation-menu', 'disembarkation-menu', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (24, 'disembarkation-view', 'disembarkation-view', 4, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (25, 'human-resource-menu', 'human-resource-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (26, 'crew-payslip-menu', 'crew-payslip-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (27, 'payroll-menu', 'payroll-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (28, 'payroll-create', 'payroll-create', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (29, 'payroll-view', 'payroll-view', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (30, 'payroll-edit', 'payroll-edit', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (31, 'payroll-delete', 'payroll-delete', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
INSERT INTO `permissions` (`id`, `name`, `slug`, `permission_group_id`, `guard_name`, `created_at`, `updated_at`) VALUES (32, 'payroll-summary-menu', 'payroll-summary-menu', 5, 'web', '2021-02-06 09:50:52', '2021-02-06 09:50:52');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
