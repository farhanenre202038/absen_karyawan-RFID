/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_absen

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-10-28 01:20:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_absen`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_absen`;
CREATE TABLE `tbl_absen` (
  `id_absen` int(30) NOT NULL AUTO_INCREMENT,
  `no_kartu` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `history_absen` varchar(20) DEFAULT '',
  `bukti_foto` text DEFAULT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_absen
-- ----------------------------
INSERT INTO `tbl_absen` VALUES ('75', '22610411253', '2022-10-28', '00:00:00', '00:00:00', 'SAKIT', '');
INSERT INTO `tbl_absen` VALUES ('76', '981096253', '2022-10-28', '00:17:19', '00:00:00', 'HADIR', '');

-- ----------------------------
-- Table structure for `tbl_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(35) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(35) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `status` enum('offline','online') DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES ('1', 'Muhammad Farhan Enre', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'offline', '1666021608371227520087756173345.jpg');
INSERT INTO `tbl_admin` VALUES ('2', 'Angelita Maspaitella', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'offline', 'wallpaperflare.com_wallpaper (1).jpg');

-- ----------------------------
-- Table structure for `tbl_history`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE `tbl_history` (
  `id_history` int(40) NOT NULL AUTO_INCREMENT,
  `tanggal_history` date DEFAULT NULL,
  `nik` int(40) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `methode_absen` enum('admin','mesin','aplikasi') DEFAULT NULL,
  `status_karyawan` varchar(40) DEFAULT NULL,
  `bukti_foto` text DEFAULT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_history
-- ----------------------------
INSERT INTO `tbl_history` VALUES ('274', '2022-10-14', '737112438', '23:32:24', '23:37:05', 'mesin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('275', '2022-10-15', '737112438', '00:05:14', '23:12:12', 'mesin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('276', '2022-10-15', '823234348', '15:07:08', '23:20:06', 'mesin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('277', '2022-10-16', '823234348', '00:07:27', '00:00:00', 'mesin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('278', '2022-10-16', '737112438', '00:08:39', '00:00:00', 'mesin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('279', '2022-10-25', '737112438', '10:06:58', '10:07:23', 'aplikasi', 'HADIR', 'Screenshot_2022-10-15-00-21-36-727_com.android.chrome.jpg');
INSERT INTO `tbl_history` VALUES ('280', '2022-10-26', '823234348', '13:59:24', '00:00:00', 'admin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('281', '2022-10-26', '737112438', '13:59:28', '14:04:15', 'admin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('282', '2022-10-26', '737112438', '14:02:51', '14:04:15', 'aplikasi', 'HADIR', '16667641497082783191094466316411.jpg');
INSERT INTO `tbl_history` VALUES ('283', '2022-10-27', '823234348', '23:50:33', '23:50:34', 'admin', 'HADIR', '');
INSERT INTO `tbl_history` VALUES ('284', '2022-10-28', '737112438', '00:00:00', '00:00:00', 'admin', 'SAKIT', '');
INSERT INTO `tbl_history` VALUES ('285', '2022-10-28', '823234348', '00:17:19', '00:00:00', 'admin', 'HADIR', '');

-- ----------------------------
-- Table structure for `tbl_jadwal`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jadwal`;
CREATE TABLE `tbl_jadwal` (
  `id_jam` int(10) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_jadwal
-- ----------------------------
INSERT INTO `tbl_jadwal` VALUES ('0', '08:00:00', '21:00:00', '-5.122174,119.5065316,17z');

-- ----------------------------
-- Table structure for `tbl_karyawan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_karyawan`;
CREATE TABLE `tbl_karyawan` (
  `nik` int(40) NOT NULL,
  `no_kartu` varchar(20) DEFAULT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(50) DEFAULT NULL,
  `jk` enum('P','L') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto_karyawan` text DEFAULT NULL,
  `status` enum('offline','online') DEFAULT NULL,
  `status_absen` enum('izin','sakit','alfa','hadir') DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_karyawan
-- ----------------------------
INSERT INTO `tbl_karyawan` VALUES ('737112438', '22610411253', 'Muhammad Farhan Enre', '2002-02-28', 'L', 'Jalan Lanraki Ruko No.1', 'farhanenre@gmail.com', 'ecadd9b7a3ea7d48267b4dca564d5260', 'IMG_20220309_221133.jpg', 'online', 'sakit');
INSERT INTO `tbl_karyawan` VALUES ('823234348', '981096253', 'Angelita Maspaitella', '2001-01-06', 'P', 'Jalan Bone Raya Taman Sudiang', 'angelitamaspaitella@gmail.com', 'ecadd9b7a3ea7d48267b4dca564d5260', 'user.png', 'offline', 'hadir');

-- ----------------------------
-- Table structure for `tbl_rfid`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rfid`;
CREATE TABLE `tbl_rfid` (
  `no_kartu` varchar(20) NOT NULL,
  PRIMARY KEY (`no_kartu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_rfid
-- ----------------------------

-- ----------------------------
-- View structure for `view_absen`
-- ----------------------------
DROP VIEW IF EXISTS `view_absen`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_absen` AS select `tbl_karyawan`.`nik` AS `nik`,`tbl_karyawan`.`nama_karyawan` AS `nama_karyawan`,`tbl_karyawan`.`tanggal_lahir` AS `tanggal_lahir`,`tbl_karyawan`.`alamat` AS `alamat`,`tbl_karyawan`.`email` AS `email`,`tbl_karyawan`.`password` AS `password`,`tbl_karyawan`.`foto_karyawan` AS `foto_karyawan`,`tbl_karyawan`.`status` AS `status`,`tbl_karyawan`.`status_absen` AS `status_absen`,`tbl_absen`.`id_absen` AS `id_absen`,`tbl_absen`.`tanggal` AS `tanggal`,`tbl_absen`.`jam_masuk` AS `jam_masuk`,`tbl_absen`.`jam_keluar` AS `jam_keluar`,`tbl_absen`.`history_absen` AS `history_absen`,`tbl_karyawan`.`no_kartu` AS `no_kartu`,`tbl_absen`.`bukti_foto` AS `bukti_foto` from (`tbl_karyawan` join `tbl_absen` on(`tbl_karyawan`.`no_kartu` = `tbl_absen`.`no_kartu`)) ;

-- ----------------------------
-- View structure for `view_history`
-- ----------------------------
DROP VIEW IF EXISTS `view_history`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history` AS select `tbl_karyawan`.`nik` AS `nik`,`tbl_karyawan`.`no_kartu` AS `no_kartu`,`tbl_karyawan`.`nama_karyawan` AS `nama_karyawan`,`tbl_karyawan`.`status_absen` AS `status_absen`,`tbl_history`.`id_history` AS `id_history`,`tbl_history`.`tanggal_history` AS `tanggal_history`,`tbl_history`.`jam_masuk` AS `jam_masuk`,`tbl_history`.`jam_keluar` AS `jam_keluar`,`tbl_history`.`methode_absen` AS `methode_absen`,`tbl_history`.`status_karyawan` AS `status_karyawan`,`tbl_history`.`bukti_foto` AS `bukti_foto` from (`tbl_history` join `tbl_karyawan` on(`tbl_karyawan`.`nik` = `tbl_history`.`nik`)) ;
