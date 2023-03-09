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

 Date: 23/02/2023 22:03:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for accountabilities
-- ----------------------------
DROP TABLE IF EXISTS `accountabilities`;
CREATE TABLE `accountabilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `employee_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accountabilities_employee_id_foreign` (`employee_id`),
  KEY `accountabilities_user_id_foreign` (`user_id`),
  CONSTRAINT `accountabilities_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `accountabilities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of accountabilities
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for activity_logs
-- ----------------------------
DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE `activity_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of activity_logs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
BEGIN;
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (1, 'AF', 'Afghanistan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (2, 'AX', 'Åland Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (3, 'AL', 'Albania', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (4, 'DZ', 'Algeria', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (5, 'AS', 'American Samoa', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (6, 'AD', 'AndorrA', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (7, 'AO', 'Angola', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (8, 'AI', 'Anguilla', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (9, 'AQ', 'Antarctica', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (10, 'AG', 'Antigua and Barbuda', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (11, 'AR', 'Argentina', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (12, 'AM', 'Armenia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (13, 'AW', 'Aruba', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (14, 'AU', 'Australia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (15, 'AT', 'Austria', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (16, 'AZ', 'Azerbaijan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (17, 'BS', 'Bahamas', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (18, 'BH', 'Bahrain', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (19, 'BD', 'Bangladesh', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (20, 'BB', 'Barbados', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (21, 'BY', 'Belarus', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (22, 'BE', 'Belgium', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (23, 'BZ', 'Belize', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (24, 'BJ', 'Benin', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (25, 'BM', 'Bermuda', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (26, 'BT', 'Bhutan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (27, 'BO', 'Bolivia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (28, 'BA', 'Bosnia and Herzegovina', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (29, 'BW', 'Botswana', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (30, 'BV', 'Bouvet Island', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (31, 'BR', 'Brazil', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (32, 'IO', 'British Indian Ocean Territory', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (33, 'BN', 'Brunei Darussalam', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (34, 'BG', 'Bulgaria', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (35, 'BF', 'Burkina Faso', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (36, 'BI', 'Burundi', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (37, 'KH', 'Cambodia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (38, 'CM', 'Cameroon', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (39, 'CA', 'Canada', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (40, 'CV', 'Cape Verde', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (41, 'KY', 'Cayman Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (42, 'CF', 'Central African Republic', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (43, 'TD', 'Chad', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (44, 'CL', 'Chile', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (45, 'CN', 'China', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (46, 'CX', 'Christmas Island', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (47, 'CC', 'Cocos (Keeling) Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (48, 'CO', 'Colombia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (49, 'KM', 'Comoros', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (50, 'CG', 'Congo', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (51, 'CD', 'Congo, The Democratic Republic of the', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (52, 'CK', 'Cook Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (53, 'CR', 'Costa Rica', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (54, 'CI', 'Cote D\'Ivoire', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (55, 'HR', 'Croatia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (56, 'CU', 'Cuba', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (57, 'CY', 'Cyprus', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (58, 'CZ', 'Czech Republic', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (59, 'DK', 'Denmark', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (60, 'DJ', 'Djibouti', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (61, 'DM', 'Dominica', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (62, 'DO', 'Dominican Republic', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (63, 'EC', 'Ecuador', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (64, 'EG', 'Egypt', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (65, 'SV', 'El Salvador', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (66, 'GQ', 'Equatorial Guinea', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (67, 'ER', 'Eritrea', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (68, 'EE', 'Estonia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (69, 'ET', 'Ethiopia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (70, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (71, 'FO', 'Faroe Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (72, 'FJ', 'Fiji', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (73, 'FI', 'Finland', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (74, 'FR', 'France', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (75, 'GF', 'French Guiana', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (76, 'PF', 'French Polynesia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (77, 'TF', 'French Southern Territories', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (78, 'GA', 'Gabon', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (79, 'GM', 'Gambia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (80, 'GE', 'Georgia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (81, 'DE', 'Germany', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (82, 'GH', 'Ghana', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (83, 'GI', 'Gibraltar', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (84, 'GR', 'Greece', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (85, 'GL', 'Greenland', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (86, 'GD', 'Grenada', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (87, 'GP', 'Guadeloupe', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (88, 'GU', 'Guam', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (89, 'GT', 'Guatemala', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (90, 'GG', 'Guernsey', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (91, 'GN', 'Guinea', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (92, 'GW', 'Guinea-Bissau', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (93, 'GY', 'Guyana', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (94, 'HT', 'Haiti', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (95, 'HM', 'Heard Island and Mcdonald Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (96, 'VA', 'Holy See (Vatican City State)', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (97, 'HN', 'Honduras', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (98, 'HK', 'Hong Kong', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (99, 'HU', 'Hungary', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (100, 'IS', 'Iceland', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (101, 'IN', 'India', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (102, 'ID', 'Indonesia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (103, 'IR', 'Iran, Islamic Republic Of', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (104, 'IQ', 'Iraq', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (105, 'IE', 'Ireland', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (106, 'IM', 'Isle of Man', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (107, 'IL', 'Israel', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (108, 'IT', 'Italy', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (109, 'JM', 'Jamaica', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (110, 'JP', 'Japan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (111, 'JE', 'Jersey', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (112, 'JO', 'Jordan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (113, 'KZ', 'Kazakhstan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (114, 'KE', 'Kenya', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (115, 'KI', 'Kiribati', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (116, 'KP', 'Korea, Democratic People\'S Republic of', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (117, 'KR', 'Korea, Republic of', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (118, 'KW', 'Kuwait', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (119, 'KG', 'Kyrgyzstan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (120, 'LA', 'Lao People\'S Democratic Republic', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (121, 'LV', 'Latvia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (122, 'LB', 'Lebanon', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (123, 'LS', 'Lesotho', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (124, 'LR', 'Liberia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (125, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (126, 'LI', 'Liechtenstein', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (127, 'LT', 'Lithuania', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (128, 'LU', 'Luxembourg', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (129, 'MO', 'Macao', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (130, 'MK', 'Macedonia, The Former Yugoslav Republic of', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (131, 'MG', 'Madagascar', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (132, 'MW', 'Malawi', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (133, 'MY', 'Malaysia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (134, 'MV', 'Maldives', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (135, 'ML', 'Mali', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (136, 'MT', 'Malta', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (137, 'MH', 'Marshall Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (138, 'MQ', 'Martinique', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (139, 'MR', 'Mauritania', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (140, 'MU', 'Mauritius', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (141, 'YT', 'Mayotte', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (142, 'MX', 'Mexico', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (143, 'FM', 'Micronesia, Federated States of', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (144, 'MD', 'Moldova, Republic of', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (145, 'MC', 'Monaco', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (146, 'MN', 'Mongolia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (147, 'MS', 'Montserrat', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (148, 'MA', 'Morocco', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (149, 'MZ', 'Mozambique', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (150, 'MM', 'Myanmar', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (151, 'NA', 'Namibia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (152, 'NR', 'Nauru', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (153, 'NP', 'Nepal', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (154, 'NL', 'Netherlands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (155, 'AN', 'Netherlands Antilles', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (156, 'NC', 'New Caledonia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (157, 'NZ', 'New Zealand', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (158, 'NI', 'Nicaragua', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (159, 'NE', 'Niger', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (160, 'NG', 'Nigeria', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (161, 'NU', 'Niue', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (162, 'NF', 'Norfolk Island', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (163, 'MP', 'Northern Mariana Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (164, 'NO', 'Norway', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (165, 'OM', 'Oman', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (166, 'PK', 'Pakistan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (167, 'PW', 'Palau', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (168, 'PS', 'Palestinian Territory, Occupied', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (169, 'PA', 'Panama', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (170, 'PG', 'Papua New Guinea', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (171, 'PY', 'Paraguay', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (172, 'PE', 'Peru', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (173, 'PH', 'Philippines', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (174, 'PN', 'Pitcairn', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (175, 'PL', 'Poland', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (176, 'PT', 'Portugal', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (177, 'PR', 'Puerto Rico', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (178, 'QA', 'Qatar', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (179, 'RE', 'Reunion', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (180, 'RO', 'Romania', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (181, 'RU', 'Russian Federation', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (182, 'RW', 'RWANDA', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (183, 'SH', 'Saint Helena', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (184, 'KN', 'Saint Kitts and Nevis', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (185, 'LC', 'Saint Lucia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (186, 'PM', 'Saint Pierre and Miquelon', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (187, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (188, 'WS', 'Samoa', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (189, 'SM', 'San Marino', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (190, 'ST', 'Sao Tome and Principe', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (191, 'SA', 'Saudi Arabia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (192, 'SN', 'Senegal', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (193, 'CS', 'Serbia and Montenegro', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (194, 'SC', 'Seychelles', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (195, 'SL', 'Sierra Leone', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (196, 'SG', 'Singapore', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (197, 'SK', 'Slovakia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (198, 'SI', 'Slovenia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (199, 'SB', 'Solomon Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (200, 'SO', 'Somalia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (201, 'ZA', 'South Africa', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (202, 'GS', 'South Georgia and the South Sandwich Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (203, 'ES', 'Spain', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (204, 'LK', 'Sri Lanka', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (205, 'SD', 'Sudan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (206, 'SR', 'Suriname', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (207, 'SJ', 'Svalbard and Jan Mayen', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (208, 'SZ', 'Swaziland', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (209, 'SE', 'Sweden', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (210, 'CH', 'Switzerland', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (211, 'SY', 'Syrian Arab Republic', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (212, 'TW', 'Taiwan, Province of China', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (213, 'TJ', 'Tajikistan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (214, 'TZ', 'Tanzania, United Republic of', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (215, 'TH', 'Thailand', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (216, 'TL', 'Timor-Leste', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (217, 'TG', 'Togo', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (218, 'TK', 'Tokelau', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (219, 'TO', 'Tonga', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (220, 'TT', 'Trinidad and Tobago', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (221, 'TN', 'Tunisia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (222, 'TR', 'Turkey', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (223, 'TM', 'Turkmenistan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (224, 'TC', 'Turks and Caicos Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (225, 'TV', 'Tuvalu', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (226, 'UG', 'Uganda', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (227, 'UA', 'Ukraine', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (228, 'AE', 'United Arab Emirates', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (229, 'GB', 'United Kingdom', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (230, 'US', 'United States', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (231, 'UM', 'United States Minor Outlying Islands', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (232, 'UY', 'Uruguay', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (233, 'UZ', 'Uzbekistan', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (234, 'VU', 'Vanuatu', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (235, 'VE', 'Venezuela', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (236, 'VN', 'Viet Nam', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (237, 'VG', 'Virgin Islands, British', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (238, 'VI', 'Virgin Islands, U.S.', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (239, 'WF', 'Wallis and Futuna', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (240, 'EH', 'Western Sahara', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (241, 'YE', 'Yemen', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (242, 'ZM', 'Zambia', NULL, NULL);
INSERT INTO `countries` (`id`, `code`, `country`, `created_at`, `updated_at`) VALUES (243, 'ZW', 'Zimbabwe', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for deductions
-- ----------------------------
DROP TABLE IF EXISTS `deductions`;
CREATE TABLE `deductions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `deduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(9,3) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deductions_user_id_foreign` (`user_id`),
  CONSTRAINT `deductions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of deductions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departments_user_id_foreign` (`user_id`),
  CONSTRAINT `departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of departments
-- ----------------------------
BEGIN;
INSERT INTO `departments` (`id`, `department`, `user_id`, `created_at`, `updated_at`) VALUES (1, 'Accounting', 2, NULL, NULL);
INSERT INTO `departments` (`id`, `department`, `user_id`, `created_at`, `updated_at`) VALUES (2, 'Information Technology', 2, NULL, NULL);
INSERT INTO `departments` (`id`, `department`, `user_id`, `created_at`, `updated_at`) VALUES (3, 'Audit', 2, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci,
  `hire_date` date NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_bldg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipality_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eye_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreign_language` text COLLATE utf8mb4_unicode_ci,
  `race` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sss_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `philhealth_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagibigid_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psu_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psu_issuance_date` date DEFAULT NULL,
  `nbi_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbi_validity` date DEFAULT NULL,
  `member_type` int(11) DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommended_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_address` text COLLATE utf8mb4_unicode_ci,
  `mothers_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_address` text COLLATE utf8mb4_unicode_ci,
  `spouse_first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_middle_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_married_date` date DEFAULT NULL,
  `spouse_birth_date` date DEFAULT NULL,
  `spouse_birth_place` text COLLATE utf8mb4_unicode_ci,
  `spouse_occupation` text COLLATE utf8mb4_unicode_ci,
  `employment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Probationary',
  `project_id` bigint(20) unsigned DEFAULT NULL,
  `position_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`),
  KEY `employees_position_id_foreign` (`position_id`),
  KEY `employees_user_id_foreign` (`user_id`),
  CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of employees
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
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

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2020_11_26_145526_create_countries_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2020_11_27_000411_create_departments_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2020_11_30_135814_create_permission_tables', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2021_02_10_080109_create_activity_logs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2023_02_18_084149_create_positions_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2023_02_18_090744_create_employees_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2023_02_18_102300_create_deductions_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2023_02_18_104851_create_accountabilities_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12, '2023_02_21_093324_create_time_attendances_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13, '2023_02_23_130354_create_projects_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1, 'App\\User', 1);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\User', 2);
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (2, 'App\\User', 3);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

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

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probationary` decimal(9,3) NOT NULL,
  `regular` decimal(9,3) NOT NULL,
  `department_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `positions_department_id_foreign` (`department_id`),
  KEY `positions_user_id_foreign` (`user_id`),
  CONSTRAINT `positions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `positions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of positions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `permanent` tinyint(1) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`),
  CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of projects
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (2, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (3, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (4, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (5, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (6, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (7, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (8, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (9, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (11, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (12, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (13, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (14, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (15, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (16, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (17, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (18, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (19, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (20, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (21, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (22, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (23, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (24, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (25, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (26, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (27, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (28, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (29, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (30, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (31, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (32, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (33, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (34, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (35, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (36, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (37, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (38, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (39, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (40, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (41, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (42, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (43, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (44, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (45, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (46, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (47, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (48, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (49, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (50, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (51, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (52, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (53, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (54, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (55, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (56, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (57, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (58, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (59, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (60, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (61, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (62, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (63, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (64, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (65, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (66, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (67, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (68, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (69, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (70, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (71, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (72, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (73, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (74, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (75, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (76, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (77, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (78, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (79, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (80, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (81, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (82, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (83, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (84, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (85, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (86, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (87, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (88, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (89, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (90, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (91, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (92, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (93, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (94, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (95, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (96, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (97, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (98, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (99, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (100, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (101, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (102, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (103, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (104, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (105, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (106, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (107, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (108, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (109, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (110, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (111, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (112, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (113, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (114, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (115, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (116, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (117, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (118, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (119, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (120, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (121, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (122, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (123, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (124, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (125, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (126, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (127, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (128, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (129, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (130, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (131, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (132, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (133, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (134, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (135, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (136, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (137, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (138, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (139, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (140, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (141, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (142, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (143, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (144, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (145, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (146, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (147, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (148, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (149, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (150, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (151, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (2, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (3, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (4, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (5, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (6, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (7, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (8, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (9, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (10, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (11, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (12, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (13, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (14, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (15, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (16, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (17, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (18, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (19, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (20, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (21, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (22, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (23, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (24, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (25, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (26, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (27, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (28, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (29, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (30, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (31, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (32, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (33, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (34, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (35, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (36, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (37, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (38, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (39, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (40, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (41, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (42, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (43, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (44, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (45, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (46, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (47, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (48, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (49, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (50, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (51, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (52, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (53, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (54, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (55, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (56, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (57, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (58, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (59, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (60, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (61, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (62, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (63, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (64, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (65, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (66, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (67, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (68, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (69, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (70, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (71, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (72, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (73, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (74, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (75, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (76, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (77, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (78, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (79, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (80, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (81, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (82, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (83, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (84, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (85, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (86, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (87, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (88, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (89, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (90, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (91, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (92, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (93, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (94, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (95, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (96, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (97, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (98, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (99, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (100, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (101, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (102, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (103, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (104, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (105, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (106, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (107, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (108, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (109, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (110, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (111, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (112, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (113, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (114, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (115, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (116, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (117, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (118, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (119, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (120, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (121, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (122, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (123, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (124, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (125, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (126, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (127, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (128, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (129, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (130, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (131, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (132, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (133, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (134, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (135, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (136, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (137, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (138, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (139, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (140, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (141, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (142, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (143, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (144, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (145, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (146, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (147, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (148, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (149, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (150, 2);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (151, 2);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `built_in` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `built_in`, `created_at`, `updated_at`) VALUES (1, 'Web Developer', 'web', 1, '2021-02-06 09:53:45', '2021-02-06 09:53:45');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `built_in`, `created_at`, `updated_at`) VALUES (2, 'System Administrator', 'web', 0, '2021-02-06 09:53:45', '2021-02-06 09:53:45');
COMMIT;

-- ----------------------------
-- Table structure for time_attendances
-- ----------------------------
DROP TABLE IF EXISTS `time_attendances`;
CREATE TABLE `time_attendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_created` date NOT NULL,
  `in_am` datetime DEFAULT NULL,
  `out_am` datetime DEFAULT NULL,
  `in_pm` datetime DEFAULT NULL,
  `out_pm` datetime DEFAULT NULL,
  `employee_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `time_attendances_employee_id_foreign` (`employee_id`),
  CONSTRAINT `time_attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of time_attendances
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `built_in` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `position`, `built_in`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Anthony Carl Meniado', 'carlsus@gmail.com', NULL, '$2y$10$nsmlhgq6SOQbPLS1259RuOBflVfH6pXN1NVsL/un.ZRVBF4lqoyRu', 'Web Developer', 1, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `position`, `built_in`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'John Doe', 'admin@email.com', NULL, '$2y$10$87YIW4isCab5hOg5ueo1LOypwiyByoBq5Z44sly4GqZ.i890H.hJa', 'System Administrator', 0, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
