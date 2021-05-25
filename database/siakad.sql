/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP 7
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : siakad

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 25/05/2021 20:43:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'Dosen');
INSERT INTO `jabatan` VALUES (2, 'Karyawan');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_prodi` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kode_prodi_mhs`(`kode_prodi`) USING BTREE,
  CONSTRAINT `kode_prodi_mhs` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (1, '20310001', 'Arif Firmansyah', 31, '', '089789998789', '');
INSERT INTO `mahasiswa` VALUES (2, '20510001', 'Irfan Hakim', 51, '', '089678567778', '');
INSERT INTO `mahasiswa` VALUES (3, '20510019', 'Beni Wahyudi', 51, 'beniwahyu@stimata.ac.id', '087667556889', 'Jln Raya Teluk Pacitan No 13');
INSERT INTO `mahasiswa` VALUES (4, '20520001', 'Firmandika Setiawan', 52, '', '089678678999', '');
INSERT INTO `mahasiswa` VALUES (5, '20520018', 'Muzaki Syahrul Karomah', 52, 'muzaki@stimata.ac.id', '089678181688', 'Jln Perum Asrikaton Indah No 3');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gelar_depan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gelar_belakang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_jabatan` int(11) UNSIGNED NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_jabatan_pegawai`(`id_jabatan`) USING BTREE,
  CONSTRAINT `id_jabatan_pegawai` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES (1, '1111222233334444', 'Amir Hamzah', '', '', 'amirhz@gmail.com', '089678567456', 'Jln Raya Asrikaton Indah No 10 Malang', 1, 'user1.jpg');

-- ----------------------------
-- Table structure for prodi
-- ----------------------------
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi`  (
  `kode_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode_prodi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prodi
-- ----------------------------
INSERT INTO `prodi` VALUES (31, 'D3 Sistem Informasi');
INSERT INTO `prodi` VALUES (51, 'S1 Sistem Informasi');
INSERT INTO `prodi` VALUES (52, 'S1 Teknologi Informasi');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) UNSIGNED NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_level` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `id_level_user`(`id_level`) USING BTREE,
  INDEX `id_pegawai_user`(`id_pegawai`) USING BTREE,
  CONSTRAINT `id_level_user` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_pegawai_user` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, 'admin', '$2y$10$n10DNqSX4Yn3aRAFbZiUaeI5edBLq2oFYfZmkAwZ3t8xcvV4qHEO6', 5);

-- ----------------------------
-- Table structure for user_level
-- ----------------------------
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_level
-- ----------------------------
INSERT INTO `user_level` VALUES (1, 'superadmin');
INSERT INTO `user_level` VALUES (5, 'admin');
INSERT INTO `user_level` VALUES (20, 'keuangan');
INSERT INTO `user_level` VALUES (30, 'akademik');
INSERT INTO `user_level` VALUES (40, 'perpustakaan');
INSERT INTO `user_level` VALUES (50, 'sarpras');

SET FOREIGN_KEY_CHECKS = 1;
