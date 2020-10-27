/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql_3307
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3307
 Source Schema         : minion

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 27/10/2020 11:28:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for branch
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for corpu_events
-- ----------------------------
DROP TABLE IF EXISTS `corpu_events`;
CREATE TABLE `corpu_events`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `tahun` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of corpu_events
-- ----------------------------
INSERT INTO `corpu_events` VALUES (1, 'TR', '00010', '00011', 'Training Leadership Basic Batch 1', 'Adalah ini ku dan tidak ', '2020-09-01', '2020-09-06', '2020', NULL, NULL);
INSERT INTO `corpu_events` VALUES (4, 'TR', '00010', '00011', 'Tidak bisa masuk g-leads', 's', '2020-09-01', '2020-09-04', '2020', '2020-09-28 08:03:49', '2020-09-28 08:03:49');
INSERT INTO `corpu_events` VALUES (7, 'WB', '00010', '00011', 'Webinar Wellbeing', 'Webinar Wellbeing', '2020-09-30', '2020-09-30', '2020', '2020-09-29 06:47:54', '2020-09-29 06:47:54');
INSERT INTO `corpu_events` VALUES (8, 'EL', '00010', '00010', 'E-learning APU-PPT', 'E-learning APU-PPT', '2020-09-01', '2020-09-05', '2020', '2020-09-29 07:08:40', '2020-09-29 07:08:40');
INSERT INTO `corpu_events` VALUES (9, 'WB', '00010', '00011', 'WellBeing Vol 7', 'WellBeing Vol 7', '2020-09-06', '2020-09-06', '2020', '2020-09-29 07:09:24', '2020-09-29 07:09:24');
INSERT INTO `corpu_events` VALUES (10, 'TR', '00010', '00010', 'Data Scient', 'Training Data Scient', '2020-09-06', '2020-09-26', '2020', '2020-09-29 07:13:07', '2020-09-29 07:13:07');
INSERT INTO `corpu_events` VALUES (11, 'TR', '00010', '00011', 'aaa', 'aaaa', '2020-10-04', '2020-10-08', '2020', '2020-10-06 07:26:55', '2020-10-06 07:26:55');

-- ----------------------------
-- Table structure for departement
-- ----------------------------
DROP TABLE IF EXISTS `departement`;
CREATE TABLE `departement`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_kadept` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kadept` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `departement_kode_unique`(`kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 129 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departement
-- ----------------------------
INSERT INTO `departement` VALUES (5, '00010', 'Akademi Digital dan TI', 'P81030', 'Mugi', '00010', '2020-09-22 06:17:21', '2020-09-22 06:17:21');
INSERT INTO `departement` VALUES (6, '00011', 'Akademi Supporting', 'P2', 'Tita A', '00010', '2020-09-22 06:17:53', '2020-09-22 06:17:53');
INSERT INTO `departement` VALUES (9, '00012', 'Akademi Leadership', 'P123', 'Untung Pus', '00010', '2020-10-01 02:25:26', '2020-10-02 15:49:00');
INSERT INTO `departement` VALUES (119, '00000', 'NA', 'NA', 'NA', '00000', NULL, NULL);
INSERT INTO `departement` VALUES (120, '00013', 'Akademi Syariah', 'P10', 'Sita', '00010', '2020-10-06 04:28:45', '2020-10-06 04:28:45');
INSERT INTO `departement` VALUES (121, '00014', 'Akademi Gadai', 'P10', 'Udin N', '00010', '2020-10-06 04:32:11', '2020-10-06 04:32:11');
INSERT INTO `departement` VALUES (122, '00015', 'Ak Jaringan Operasioan dan Sales', 'P21', 'Henry', '00010', '2020-10-06 04:33:08', '2020-10-06 04:33:08');
INSERT INTO `departement` VALUES (125, '00016', 'Akademi Mikro', 'P23', 'Rochmadi', '00010', '2020-10-06 04:35:30', '2020-10-06 04:35:30');
INSERT INTO `departement` VALUES (126, '00017', 'Dept LOGS', 'P24', 'Emma', '00010', '2020-10-06 04:35:59', '2020-10-06 04:35:59');
INSERT INTO `departement` VALUES (127, '00018', 'Dept LSP', 'P25', 'Legiyo', '00010', '2020-10-06 04:36:20', '2020-10-06 04:36:20');
INSERT INTO `departement` VALUES (128, '00006qqq', 'Bedu', 'P81030', 'Nirin Kumpul', '00010', '2020-10-06 06:25:42', '2020-10-06 06:25:42');

-- ----------------------------
-- Table structure for divisi
-- ----------------------------
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_kadiv` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kadiv` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of divisi
-- ----------------------------
INSERT INTO `divisi` VALUES (11, '00010', 'Divisi Pegadaian Corporate University', 'P00001', 'Rofiq', '2020-09-22 06:15:46', '2020-09-22 06:15:46');
INSERT INTO `divisi` VALUES (13, '00000', '-NA-', 'NA', 'NA', NULL, '2020-10-02 15:59:42');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_05_22_022844_create_divisi', 1);
INSERT INTO `migrations` VALUES (5, '2020_08_20_124550_create_branches_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_09_01_032328_create_parameters_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_09_13_111325_create_roles_table', 2);
INSERT INTO `migrations` VALUES (10, '2020_09_17_032703_create_departements_table', 3);
INSERT INTO `migrations` VALUES (11, '2020_09_25_041348_create_corpu_events_table', 4);
INSERT INTO `migrations` VALUES (14, '2020_10_02_004957_create_w_periodes_table', 5);
INSERT INTO `migrations` VALUES (15, '2020_10_12_080042_create_l_wallet_members_table', 5);
INSERT INTO `migrations` VALUES (16, '2020_10_14_072305_create_w_transaksis_table', 6);
INSERT INTO `migrations` VALUES (21, '2020_10_15_015732_create_w_transaksi_users_table', 7);

-- ----------------------------
-- Table structure for parameter
-- ----------------------------
DROP TABLE IF EXISTS `parameter`;
CREATE TABLE `parameter`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `param_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `group_desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `param_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `param_label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `param_desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `param_urut` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'ADM', 'Administrator', 'Y', NULL, NULL);
INSERT INTO `role` VALUES (2, 'USR', 'User', 'Y', NULL, NULL);
INSERT INTO `role` VALUES (4, 'DEAN', 'Dean', 'Y', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_unit_kerja` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_unit_kerja` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `grade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_user_id_unique`(`user_id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 839 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (834, 'admin', 'Administratord', NULL, 'administaror@gmail.com', NULL, '00010', NULL, '00002', NULL, NULL, 'ADM', NULL, '$2y$10$mXPRsAZdsKx/hG9lgO.Zguo1hDhhtDBj/IqDLYNRnOXpvugHxSt1u', '00010', 'R45jOP1RKArADk593sn4QEXvhzOiPi5WJuGxH09rSl5DhXUJDhUZxbodnlul', '2020-09-09 08:07:35', '2020-10-02 12:09:31');
INSERT INTO `users` VALUES (836, 'mugi', 'mugi', NULL, 'mugihnf2@gmail.com', NULL, '00010', NULL, NULL, NULL, NULL, 'USR', NULL, '$2y$10$YDHT96cgYGmM8/s5QDKqkuA1MaC8Q/fRTwMxElik4qWQDclbbjW4e', '00010', NULL, '2020-09-11 14:51:56', '2020-10-01 04:31:12');
INSERT INTO `users` VALUES (837, 'P00001', 'P satu', NULL, 'psatu@gmail.com', NULL, '00010', NULL, NULL, NULL, NULL, 'USR', NULL, '$2y$10$rmFtvGTdxrOvmm1RAUIpAOi65k/qeQ2IIMH9HmH5IE0pcEsgxsLvS', '00010', NULL, '2020-10-02 07:14:29', '2020-10-02 07:14:29');
INSERT INTO `users` VALUES (838, 'user2', 'USer yang kedua', NULL, 'kedua@gmail.com', NULL, '00011', NULL, NULL, NULL, NULL, 'USR', NULL, '$2y$10$JDszGYn75aOPkVku8zrqk.6vQLkoyqDNwaA0tuULNBV/gijKosve6', '00010', NULL, '2020-10-02 08:26:45', '2020-10-02 08:30:08');

-- ----------------------------
-- Table structure for users_a
-- ----------------------------
DROP TABLE IF EXISTS `users_a`;
CREATE TABLE `users_a`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kd_unit_kerja` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_unit_kerja` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `grade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `divisi_kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_user_id_unique`(`user_id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 836 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_a
-- ----------------------------
INSERT INTO `users_a` VALUES (833, 'mugi', 'Administrator', NULL, 'mugihnf@gmail.com', NULL, 'Pertahanan', NULL, '00006', NULL, NULL, 'USR', NULL, '$2y$10$ccQcKyfWEIi2MIO4Kx5ARONeeM7dhMQa.0GcX82.BDhcpgdpfC48S', NULL, '2020-09-09 07:59:51', '2020-09-10 06:10:48', '00002');
INSERT INTO `users_a` VALUES (834, 'admin', 'Administratora', NULL, 'admin@gmail.com', NULL, 'Deparlu', NULL, '00002', NULL, NULL, 'ADM', NULL, '$2y$10$mXPRsAZdsKx/hG9lgO.Zguo1hDhhtDBj/IqDLYNRnOXpvugHxSt1u', NULL, '2020-09-09 08:01:30', '2020-09-09 08:07:35', '00002');
INSERT INTO `users_a` VALUES (836, 'zzzz', 'ZZZZ', NULL, 'mugihnfxx@gmail.com', NULL, 'Pertahanan', NULL, '00008', NULL, NULL, 'USR2', NULL, '$2y$10$G7/IJMxiIXV.aT4YiegN5eXW3U/rt.VUQ7RsDHSSmfigV.PAQhaYi', NULL, '2020-09-10 02:49:39', '2020-09-10 04:27:02', '00007');

-- ----------------------------
-- Table structure for w_members
-- ----------------------------
DROP TABLE IF EXISTS `w_members`;
CREATE TABLE `w_members`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periode_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sawal` decimal(12, 0) NOT NULL,
  `sakhir` decimal(12, 0) NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of w_members
-- ----------------------------
INSERT INTO `w_members` VALUES (7, '202001', 'user2', 'USer yang kedua', '00010', 'Divisi Pegadaian Corporate University', '00011', 'Akademi Supporting', 3000000, -2000000, 'A', '2020-10-21 06:09:28', '2020-10-27 03:46:16');

-- ----------------------------
-- Table structure for w_periode
-- ----------------------------
DROP TABLE IF EXISTS `w_periode`;
CREATE TABLE `w_periode`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `descripsi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `awal` date NOT NULL,
  `akhir` date NOT NULL,
  `sawal` decimal(12, 0) NOT NULL,
  `sakhir` decimal(12, 0) NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of w_periode
-- ----------------------------
INSERT INTO `w_periode` VALUES (1, '202001', 'Periode 2020', 'Periode 2020', '2020-10-14', '2020-10-15', 10000000, 5500000, 'A', '2020-10-14 06:57:22', '2020-10-21 06:09:28');

-- ----------------------------
-- Table structure for w_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `w_transaksi`;
CREATE TABLE `w_transaksi`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periode_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `masuk` decimal(12, 0) NOT NULL,
  `keluar` decimal(12, 0) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_trans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of w_transaksi
-- ----------------------------
INSERT INTO `w_transaksi` VALUES (29, '202001', 'user2', 'Saldo Awal 202001', 3000000, 0, '2020-10-21 06:09:28', '2020-10-21 06:09:28', NULL);
INSERT INTO `w_transaksi` VALUES (32, '202001', 'user2', 'Training Youtube1', 0, 1000000, '2020-10-21 06:16:52', '2020-10-21 06:16:52', NULL);
INSERT INTO `w_transaksi` VALUES (33, '202001', 'user2', 'Tolak Training Youtube', 1000000, 0, '2020-10-21 06:18:56', '2020-10-21 06:18:56', NULL);
INSERT INTO `w_transaksi` VALUES (34, '202001', 'user2', 'Laptop', 0, 1200000, '2020-10-21 07:52:34', '2020-10-21 07:52:34', '7');
INSERT INTO `w_transaksi` VALUES (35, '202001', 'user2', 'Tolak Laptop', 1200000, 0, '2020-10-21 08:00:15', '2020-10-21 08:00:15', '7');
INSERT INTO `w_transaksi` VALUES (36, '202001', 'user2', 'Training Membuat Kapal Selam', 0, 2500000, '2020-10-22 04:10:04', '2020-10-22 04:10:04', NULL);
INSERT INTO `w_transaksi` VALUES (37, '202001', 'user2', 'dddd', 0, 1500000, '2020-10-22 07:54:04', '2020-10-22 07:54:04', '9');
INSERT INTO `w_transaksi` VALUES (38, '202001', 'user2', 'MAkan Besar', 0, 200000, '2020-10-26 08:34:35', '2020-10-26 08:34:35', '10');
INSERT INTO `w_transaksi` VALUES (39, '202001', 'user2', 'Public Seminar', 0, 600000, '2020-10-27 01:51:40', '2020-10-27 01:51:40', NULL);
INSERT INTO `w_transaksi` VALUES (40, '202001', 'user2', 'Flash Disk', 0, 200000, '2020-10-27 03:46:16', '2020-10-27 03:46:16', '12');

-- ----------------------------
-- Table structure for w_transaksi_user
-- ----------------------------
DROP TABLE IF EXISTS `w_transaksi_user`;
CREATE TABLE `w_transaksi_user`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periode_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `lokasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_training` decimal(12, 0) NOT NULL,
  `jml_lain` decimal(12, 0) NOT NULL,
  `jml_total` decimal(12, 0) NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `approve_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_pengajuan` date NULL DEFAULT NULL,
  `tgl_approve` date NULL DEFAULT NULL,
  `file1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file1_jwb` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file3_jwb` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file2_jwb` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik_atasan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_atasan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_approve_atasan` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tgl_atasan_approve` date NULL DEFAULT NULL,
  `status_jwb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `catatan_jwb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of w_transaksi_user
-- ----------------------------
INSERT INTO `w_transaksi_user` VALUES (6, '202001', 'user2', 'TR', 'Training Youtube', '2020-10-21', '2020-10-24', 'Nusa kambanganq', 1000000, 0, 1000000, 'TLD', 'admin', NULL, '2020-10-21', NULL, NULL, NULL, NULL, NULL, NULL, 'mugi', 'mugi', NULL, '2020-10-21 06:16:15', '2020-10-21 06:18:56', NULL, NULL, NULL);
INSERT INTO `w_transaksi_user` VALUES (7, '202001', 'user2', 'TT', 'Laptop', '2020-10-21', '2020-10-21', 'Bandung', 1200000, 0, 1200000, 'TLD', 'admin', NULL, '2020-10-21', NULL, NULL, NULL, NULL, NULL, NULL, 'mugi', 'mugi', NULL, '2020-10-21 07:52:34', '2020-10-21 08:00:15', '2020-10-21', NULL, NULL);
INSERT INTO `w_transaksi_user` VALUES (8, '202001', 'user2', 'TR', 'Kapal Selam', '2020-10-22', '2020-10-31', 'Surabaya', 2000000, 500000, 2500000, 'STD', 'admin', NULL, '2020-10-23', '1603339651_Point.png', '1603438434_Capture-7.JPG', '1603339651_tempsnip.png', '1603339651_tempsnip2.png', '1603438434_BUZZZ.JPG', '1603438434_Capture-8.JPG', 'mugi', 'mugi', NULL, '2020-10-22 04:07:31', '2020-10-27 03:12:53', '2020-10-23', 'KMB', 'Mohon Kirimkan file invoincenya');
INSERT INTO `w_transaksi_user` VALUES (9, '202001', 'user2', 'SM', 'dddd', '2020-10-30', '2020-11-07', 'hjhj', 1500000, 0, 1500000, 'STD', 'admin', NULL, '2020-10-23', '1603339651_Point.png', '1603438345_Capture-7.JPG', '1603339651_tempsnip.png', '1603339651_tempsnip2.png', '1603438345_Capture-5.JPG', '1603438345_Capture-6.JPG', 'mugi', 'mugi', NULL, '2020-10-22 07:54:04', '2020-10-27 03:11:40', '2020-10-23', 'DRF', '');
INSERT INTO `w_transaksi_user` VALUES (10, '202001', 'user2', 'TR', 'MAkan Besar', '2020-11-04', '2020-11-06', 'Indonesia', 200000, 0, 200000, 'STD', 'admin', NULL, '2020-10-26', '1603701275_BUZZZ.JPG', '1603701639_BUZZZ.JPG', '1603701275_BUZZZ.JPG', '1603701275_BUZZZ.JPG', '1603701639_BUZZZ.JPG', '1603701639_BUZZZ.JPG', 'mugi', 'mugi', NULL, '2020-10-26 08:34:35', '2020-10-27 03:06:26', '2020-10-26', 'STD', 'setujuhhhhh');
INSERT INTO `w_transaksi_user` VALUES (11, '202001', 'user2', 'TR', 'Public Seminar', '2020-11-01', '2020-11-07', 'Semarang', 600000, 0, 600000, 'STD', 'admin', NULL, '2020-10-27', '1603763449_cheathead.jpg', '1603764673_Elegant.pptx', '1603763449_as2.png', '1603763449_check24.png', '1603764673_Flat.pptx', '1603764673_Flat Modern.pptx', 'mugi', 'mugi', NULL, '2020-10-27 01:50:49', '2020-10-27 04:14:06', '2020-10-27', 'STD', 'setuju, sesuai');
INSERT INTO `w_transaksi_user` VALUES (12, '202001', 'user2', 'TT', 'Flash Disk', '2020-10-27', '2020-10-27', 'Bitung', 200000, 0, 200000, 'STD', 'admin', NULL, '2020-10-27', '1603770376_Elegant.pptx', '1603770570_10. working on laptop bob.png', '1603770376_health care.wmv', NULL, '1603770570_29. car driving bob.png', '1603770570_11. working on laptop loop bob.png', 'mugi', 'mugi', NULL, '2020-10-27 03:46:16', '2020-10-27 03:50:20', '2020-10-27', 'STD', 'Setuju unutk pembelian Flashdisk');

SET FOREIGN_KEY_CHECKS = 1;
