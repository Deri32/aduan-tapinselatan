/*
 Navicat Premium Data Transfer

 Source Server         : Database
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : db_aduantapinselatan

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 20/06/2025 21:22:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_aspirasiaduan
-- ----------------------------
DROP TABLE IF EXISTS `tb_aspirasiaduan`;
CREATE TABLE `tb_aspirasiaduan`  (
  `id_aspirasiaduan` int NOT NULL AUTO_INCREMENT,
  `nama_aspirasiaduan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_aspirasiaduan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_aspirasiaduan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_aspirasiaduan
-- ----------------------------
INSERT INTO `tb_aspirasiaduan` VALUES (41, 'Pendidikan', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (43, 'Kesehatan', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (44, 'KTP', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (45, 'KK', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (46, 'Akta Kelahiran', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (47, 'Lampu Jalan', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (49, 'Air Bersih', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (50, 'Tempat Pembuangan Sampah (TPS)', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (51, 'Ruang Terbuka Hijau (RTH)', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (52, 'Lapangan Olahraga', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (53, 'Surat Izin Usaha', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (54, 'Surat Izin Tempat Usaha', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (56, 'Surat Pernyataan Hibah', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (57, 'Surat Pernyataan Ahli Waris', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (58, 'Surat Keterangan Ahli Waris', 'Layanan');
INSERT INTO `tb_aspirasiaduan` VALUES (59, 'Tempat Ibadah', 'Fasilitas');
INSERT INTO `tb_aspirasiaduan` VALUES (60, 'Surat Keterangan Meninggal Dunia', 'Layanan');

-- ----------------------------
-- Table structure for tb_berita
-- ----------------------------
DROP TABLE IF EXISTS `tb_berita`;
CREATE TABLE `tb_berita`  (
  `id_berita` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_berita
-- ----------------------------

-- ----------------------------
-- Table structure for tb_feedback
-- ----------------------------
DROP TABLE IF EXISTS `tb_feedback`;
CREATE TABLE `tb_feedback`  (
  `id_feedback` int NOT NULL AUTO_INCREMENT,
  `tanggal_feedback` date NULL DEFAULT NULL,
  `isi_feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `fk_layanan` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_feedback`) USING BTREE,
  INDEX `fk_layanan`(`fk_layanan`) USING BTREE,
  CONSTRAINT `tb_feedback_ibfk_1` FOREIGN KEY (`fk_layanan`) REFERENCES `tb_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for tb_hasil
-- ----------------------------
DROP TABLE IF EXISTS `tb_hasil`;
CREATE TABLE `tb_hasil`  (
  `id_proposal` int NOT NULL AUTO_INCREMENT,
  `fk_layanan` int NULL DEFAULT NULL,
  `biaya` int NULL DEFAULT NULL,
  `tanggal` datetime NULL DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_proposal`) USING BTREE,
  INDEX `FK__tb_pemohon`(`fk_layanan`) USING BTREE,
  CONSTRAINT `tb_hasil_ibfk_1` FOREIGN KEY (`fk_layanan`) REFERENCES `tb_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_hasil
-- ----------------------------

-- ----------------------------
-- Table structure for tb_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan`  (
  `id_jabatan` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_jabatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_jabatan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_komentar
-- ----------------------------
DROP TABLE IF EXISTS `tb_komentar`;
CREATE TABLE `tb_komentar`  (
  `id_komentar` int NOT NULL AUTO_INCREMENT,
  `fk_masyarakat` int NULL DEFAULT NULL,
  `fk_berita` int NULL DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  `anonim` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_komentar`) USING BTREE,
  INDEX `FK__tb_pemohon`(`fk_masyarakat`) USING BTREE,
  INDEX `FK_tb_komentar_tb_berita`(`fk_berita`) USING BTREE,
  CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`fk_masyarakat`) REFERENCES `tb_masyarakat` (`id_masyarakat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_komentar_ibfk_2` FOREIGN KEY (`fk_berita`) REFERENCES `tb_berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_komentar
-- ----------------------------

-- ----------------------------
-- Table structure for tb_layanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_layanan`;
CREATE TABLE `tb_layanan`  (
  `id_layanan` int NOT NULL AUTO_INCREMENT,
  `fk_masyarakat` int NULL DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal` datetime NULL DEFAULT NULL,
  `anonim` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('Aspirasi','Aduan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_aspirasiaduan` int NULL DEFAULT NULL,
  `upload_bukti` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `konfirmasi` enum('Proses','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Proses',
  `keterangan_konfirmasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_layanan`) USING BTREE,
  INDEX `FK__tb_pemohon`(`fk_masyarakat`) USING BTREE,
  INDEX `id_aspirasiaduan`(`id_aspirasiaduan`) USING BTREE,
  CONSTRAINT `tb_layanan_ibfk_1` FOREIGN KEY (`fk_masyarakat`) REFERENCES `tb_masyarakat` (`id_masyarakat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_layanan_ibfk_2` FOREIGN KEY (`id_aspirasiaduan`) REFERENCES `tb_aspirasiaduan` (`id_aspirasiaduan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_layanan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_masyarakat
-- ----------------------------
DROP TABLE IF EXISTS `tb_masyarakat`;
CREATE TABLE `tb_masyarakat`  (
  `id_masyarakat` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Laki - Laki',
  PRIMARY KEY (`id_masyarakat`) USING BTREE,
  UNIQUE INDEX `nik`(`nik`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `telepon`(`telepon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_masyarakat
-- ----------------------------

-- ----------------------------
-- Table structure for tb_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE `tb_pegawai`  (
  `id_pegawai` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Laki - Laki',
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `telepon` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_perkawinan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` enum('Honorer','ASN') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'ASN',
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_jabatan` int NOT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE,
  INDEX `id_jabatan`(`id_jabatan`) USING BTREE,
  CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for tb_penanganan
-- ----------------------------
DROP TABLE IF EXISTS `tb_penanganan`;
CREATE TABLE `tb_penanganan`  (
  `id_penanganan` int NOT NULL AUTO_INCREMENT,
  `tanggal_penanganan` date NULL DEFAULT NULL,
  `keterangan_penanganan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `fk_layanan` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_penanganan`) USING BTREE,
  INDEX `id_layanan`(`fk_layanan`) USING BTREE,
  CONSTRAINT `tb_penanganan_ibfk_1` FOREIGN KEY (`fk_layanan`) REFERENCES `tb_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_penanganan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna`  (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` enum('Admin','Pegawai','Masyarakat','Camat') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Pegawai',
  PRIMARY KEY (`id_pengguna`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `telepon`(`telepon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_pengguna
-- ----------------------------
INSERT INTO `tb_pengguna` VALUES (2, 'admin', '0895395333220', 'Admin', 'admin', 'Admin');
INSERT INTO `tb_pengguna` VALUES (10, 'camat', '081212121212', 'Camat', 'camat', 'Camat');

-- ----------------------------
-- Table structure for tb_proposal
-- ----------------------------
DROP TABLE IF EXISTS `tb_proposal`;
CREATE TABLE `tb_proposal`  (
  `id_proposal` int NOT NULL AUTO_INCREMENT,
  `fk_layanan` int NULL DEFAULT NULL,
  `biaya` int NULL DEFAULT NULL,
  `tanggal` datetime NULL DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_proposal`) USING BTREE,
  INDEX `FK__tb_pemohon`(`fk_layanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_proposal
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
