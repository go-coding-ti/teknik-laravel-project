/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.13 : Database - kepangkatan_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kepangkatan_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;

USE `kepangkatan_db`;

/*Table structure for table `master_fakultas` */

DROP TABLE IF EXISTS `master_fakultas`;

CREATE TABLE `master_fakultas` (
  `id_fakultas` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_fakultas` */

/*Table structure for table `master_golongan` */

DROP TABLE IF EXISTS `master_golongan`;

CREATE TABLE `master_golongan` (
  `id_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `golongan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_golongan` */

/*Table structure for table `master_id_pendidik` */

DROP TABLE IF EXISTS `master_id_pendidik`;

CREATE TABLE `master_id_pendidik` (
  `id_pendidik` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `jenis_id` enum('NIDN','NIDK','NUP') DEFAULT NULL,
  PRIMARY KEY (`id_pendidik`),
  KEY `nip` (`nip`),
  CONSTRAINT `master_id_pendidik_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_id_pendidik` */

/*Table structure for table `master_jabatan_fungsional` */

DROP TABLE IF EXISTS `master_jabatan_fungsional`;

CREATE TABLE `master_jabatan_fungsional` (
  `id_jabatan_fungsional` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan_fungsional` enum('Asisten Ahli','Lektor','Lektor Kepala','Guru Besar') DEFAULT NULL,
  `tmt_jabatan_fungsional` date DEFAULT NULL,
  PRIMARY KEY (`id_jabatan_fungsional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_jabatan_fungsional` */

/*Table structure for table `master_kepangkatan_fungsional` */

DROP TABLE IF EXISTS `master_kepangkatan_fungsional`;

CREATE TABLE `master_kepangkatan_fungsional` (
  `id_kepangkatan_fungsional` int(11) NOT NULL AUTO_INCREMENT,
  `id_pangkat_pns` int(11) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `tmt_pangkat/golongan` date DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kepangkatan_fungsional`),
  KEY `id_pangkat_pns` (`id_pangkat_pns`),
  KEY `id_golongan` (`id_golongan`),
  CONSTRAINT `master_kepangkatan_fungsional_ibfk_1` FOREIGN KEY (`id_pangkat_pns`) REFERENCES `master_pangkat_pns` (`id_pangkat_pns`),
  CONSTRAINT `master_kepangkatan_fungsional_ibfk_2` FOREIGN KEY (`id_golongan`) REFERENCES `master_golongan` (`id_golongan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_kepangkatan_fungsional` */

/*Table structure for table `master_pangkat_pns` */

DROP TABLE IF EXISTS `master_pangkat_pns`;

CREATE TABLE `master_pangkat_pns` (
  `id_pangkat_pns` int(11) NOT NULL AUTO_INCREMENT,
  `pangkat` enum('Penata Muda','Penata Muda Tk. I','Penata','Penata Tk. I','Pembina','Pembina Tk. I','Pembina Utama Muda','Pembina Utama Madya','Pembina Utama') DEFAULT NULL,
  PRIMARY KEY (`id_pangkat_pns`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_pangkat_pns` */

/*Table structure for table `master_pendidikan` */

DROP TABLE IF EXISTS `master_pendidikan`;

CREATE TABLE `master_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang_pendidikan_terakhir` varchar(5) DEFAULT NULL,
  `nama_institusi` varchar(50) DEFAULT NULL,
  `bidang_ilmu` varchar(30) DEFAULT NULL,
  `tanggal_selesai_studi` date DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_pendidikan` */

/*Table structure for table `master_prodi` */

DROP TABLE IF EXISTS `master_prodi`;

CREATE TABLE `master_prodi` (
  `id_prodi` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_fakultas` tinyint(4) DEFAULT NULL,
  `prodi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `id_fakultas` (`id_fakultas`),
  CONSTRAINT `master_prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `master_fakultas` (`id_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_prodi` */

/*Table structure for table `master_status_dosen` */

DROP TABLE IF EXISTS `master_status_dosen`;

CREATE TABLE `master_status_dosen` (
  `id_status_dosen` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status_dosen` enum('dosen biasa','profesor','dosen dengan tugas tambahan rektor s/d ketjur','profesor dengan tugas tambahan rektor s/d ketjur') DEFAULT NULL,
  PRIMARY KEY (`id_status_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_status_dosen` */

/*Table structure for table `master_status_kepegawaian` */

DROP TABLE IF EXISTS `master_status_kepegawaian`;

CREATE TABLE `master_status_kepegawaian` (
  `id_status_kepegawaian` int(11) NOT NULL AUTO_INCREMENT,
  `status_kepegawaian` enum('Emeritus','Tetap BLU','Tetap','Luar Non PNS','Luar','Kontrak') DEFAULT NULL,
  PRIMARY KEY (`id_status_kepegawaian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_status_kepegawaian` */

/*Table structure for table `tb_dosen` */

DROP TABLE IF EXISTS `tb_dosen`;

CREATE TABLE `tb_dosen` (
  `nip` int(11) NOT NULL AUTO_INCREMENT,
  `id_status_dosen` tinyint(1) DEFAULT NULL,
  `id_prodi` tinyint(4) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `id_kepangkatan_fungsional` int(11) DEFAULT NULL,
  `id_status_kepegawaian` int(11) DEFAULT NULL,
  `id_jabatan_fungsional` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gelar_depan` varchar(6) DEFAULT NULL,
  `gelar_belakang` varchar(6) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_domisili` varchar(50) DEFAULT NULL,
  `alamat_rumah` varchar(50) DEFAULT NULL,
  `telp_rumah` varchar(13) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email_aktif` varchar(50) DEFAULT NULL,
  `no_karpeg` varchar(10) DEFAULT NULL,
  `file_karpeg` varchar(50) DEFAULT NULL,
  `no_npwp` varchar(15) DEFAULT NULL,
  `file_npwp` varchar(50) DEFAULT NULL,
  `no_karis/karsu` varchar(10) DEFAULT NULL,
  `file_karis/karsu` varchar(50) DEFAULT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `file_ktp` varchar(50) DEFAULT NULL,
  `status_keaktifan` enum('tugas di instansi lain','Tugas belajar','Tidak Ada Data','Keluar','Pensiun duda/janda','Pensiun','Pemberhentian Tanpa Hak Pensiun','Pemberhentian Jabatan Akademik','Pemberhentian Dengan Hormat Tidak Atas Permintaan Sendiri','Masa Persiapan Pensiun (MPP)','Ijin Belajar','Cuti','Almarhum','Aktif') DEFAULT NULL,
  `tmt_keaktifan` date DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_pendidikan` (`id_pendidikan`),
  KEY `id_status_dosen` (`id_status_dosen`),
  KEY `id_kepangkatan_fungsional` (`id_kepangkatan_fungsional`),
  KEY `id_status_kepegawaian` (`id_status_kepegawaian`),
  KEY `id_prodi` (`id_prodi`),
  KEY `id_jabatan_fungsional` (`id_jabatan_fungsional`),
  CONSTRAINT `tb_dosen_ibfk_1` FOREIGN KEY (`id_jabatan_fungsional`) REFERENCES `master_jabatan_fungsional` (`id_jabatan_fungsional`),
  CONSTRAINT `tb_dosen_ibfk_2` FOREIGN KEY (`id_status_kepegawaian`) REFERENCES `master_status_kepegawaian` (`id_status_kepegawaian`),
  CONSTRAINT `tb_dosen_ibfk_3` FOREIGN KEY (`id_kepangkatan_fungsional`) REFERENCES `master_kepangkatan_fungsional` (`id_kepangkatan_fungsional`),
  CONSTRAINT `tb_dosen_ibfk_4` FOREIGN KEY (`id_pendidikan`) REFERENCES `master_pendidikan` (`id_pendidikan`),
  CONSTRAINT `tb_dosen_ibfk_5` FOREIGN KEY (`id_prodi`) REFERENCES `master_prodi` (`id_prodi`),
  CONSTRAINT `tb_dosen_ibfk_6` FOREIGN KEY (`id_status_dosen`) REFERENCES `master_status_dosen` (`id_status_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_dosen` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
