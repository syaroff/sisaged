/*
 Navicat Premium Data Transfer

 Source Server         : just
 Source Server Type    : MySQL
 Source Server Version : 100425 (10.4.25-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : sisaged

 Target Server Type    : MySQL
 Target Server Version : 100425 (10.4.25-MariaDB)
 File Encoding         : 65001

 Date: 30/01/2023 20:59:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gedung
-- ----------------------------
DROP TABLE IF EXISTS `gedung`;
CREATE TABLE `gedung`  (
  `gedung_id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tersewa` int NULL DEFAULT NULL,
  PRIMARY KEY (`gedung_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gedung
-- ----------------------------
INSERT INTO `gedung` VALUES (2, 'asdadaa', 'asdffaf', '1000000', '1674653807.jpg', 0);

-- ----------------------------
-- Table structure for laporan
-- ----------------------------
DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan`  (
  `id_laporan` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_laporan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laporan
-- ----------------------------
INSERT INTO `laporan` VALUES (1, '2023-01-30', 2000000);

-- ----------------------------
-- Table structure for metode
-- ----------------------------
DROP TABLE IF EXISTS `metode`;
CREATE TABLE `metode`  (
  `metode_id` int NOT NULL AUTO_INCREMENT,
  `nama_metode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_rekening` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`metode_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of metode
-- ----------------------------
INSERT INTO `metode` VALUES (1, 'BRI', '0988412411111');
INSERT INTO `metode` VALUES (2, 'BCA', '92440912449911');
INSERT INTO `metode` VALUES (3, 'BNI', '2341244412444124');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_hp` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `sandi` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` int NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'Budi', '0987654321', 'budi@gmail.com', 'Dusun Dlanggu,Desa Dlanggu,Kec. Dlanggu,Mojokerto -Jawa Timur', '81dc9bdb52d04dc20036dbd8313ed055', 1);
INSERT INTO `pengguna` VALUES (2, 'Sang Admin', '098767772123', 'sangadmin@gmail.com', 'Dusun Dlanggu,Desa Dlanggu,Kec. Dlanggu,Mojokerto -Jawa Timur', '81dc9bdb52d04dc20036dbd8313ed055', 3);

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_transaksi` bigint NOT NULL AUTO_INCREMENT,
  `id_pengguna` int NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `gedung_id` int NULL DEFAULT NULL,
  `metode_id` int NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  `tanggal_selesai` date NULL DEFAULT NULL,
  `date_created` date NULL DEFAULT NULL,
  `status_transaksi` int NOT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE,
  INDEX `fk_user`(`id_pengguna` ASC) USING BTREE,
  INDEX `fk_gedung`(`gedung_id` ASC) USING BTREE,
  INDEX `fk_metode`(`metode_id` ASC) USING BTREE,
  CONSTRAINT `fk_gedung` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`gedung_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_metode` FOREIGN KEY (`metode_id`) REFERENCES `metode` (`metode_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_user` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20230129796 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (20230129255, 1, '2023-01-29', 2, 1, 2000000, '2023-01-31', '2023-01-29', 1);

-- ----------------------------
-- View structure for vwtransaksi
-- ----------------------------
DROP VIEW IF EXISTS `vwtransaksi`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vwtransaksi` AS SELECT
	transaksi.id_transaksi, 
	pengguna.nama, 
	pengguna.no_hp, 
	transaksi.total, 
	transaksi.date_created, 
	metode.nama_metode, 
	metode.no_rekening, 
	gedung.nama AS nama_gedung, 
	transaksi.tanggal_mulai, 
	transaksi.tanggal_selesai, 
	gedung.foto, 
	transaksi.status_transaksi, 
	transaksi.id_pengguna
FROM
	gedung
	INNER JOIN
	transaksi
	ON 
		gedung.gedung_id = transaksi.gedung_id
	INNER JOIN
	pengguna
	ON 
		transaksi.id_pengguna = pengguna.user_id
	INNER JOIN
	metode
	ON 
		transaksi.metode_id = metode.metode_id ;

SET FOREIGN_KEY_CHECKS = 1;
