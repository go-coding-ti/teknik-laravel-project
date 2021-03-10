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

/*Table structure for table `detail_kategori_penelitian` */

DROP TABLE IF EXISTS `detail_kategori_penelitian`;

CREATE TABLE `detail_kategori_penelitian` (
  `id_detail_kategori_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_penelitian` int(11) DEFAULT NULL,
  `detail_kategori_penelitian` text,
  PRIMARY KEY (`id_detail_kategori_penelitian`),
  KEY `id_kategori_penelitian` (`id_kategori_penelitian`),
  CONSTRAINT `detail_kategori_penelitian_ibfk_1` FOREIGN KEY (`id_kategori_penelitian`) REFERENCES `master_kategori_penelitian` (`id_kategori_penelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `detail_kategori_penelitian` */

/*Table structure for table `detail_kategori_pengabdian` */

DROP TABLE IF EXISTS `detail_kategori_pengabdian`;

CREATE TABLE `detail_kategori_pengabdian` (
  `id_detail_kategori_pengabdian` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_pengabdian` int(11) DEFAULT NULL,
  `detail_kategori_pengabdian` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_kategori_pengabdian`),
  KEY `id_kategori_pengabdian` (`id_kategori_pengabdian`),
  CONSTRAINT `detail_kategori_pengabdian_ibfk_1` FOREIGN KEY (`id_kategori_pengabdian`) REFERENCES `master_kategori_pengabdian` (`id_kategori_pengabdian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `detail_kategori_pengabdian` */

/*Table structure for table `master_fakultas` */

DROP TABLE IF EXISTS `master_fakultas`;

CREATE TABLE `master_fakultas` (
  `id_fakultas` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_fakultas` */

insert  into `master_fakultas`(`id_fakultas`,`fakultas`) values 
(1,'Fakultas Teknik'),
(2,'Fakultas Kedokteran');

/*Table structure for table `master_id_pendidik` */

DROP TABLE IF EXISTS `master_id_pendidik`;

CREATE TABLE `master_id_pendidik` (
  `id_pendidik` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `jenis_id` enum('NIDN','NIDK','NUP') DEFAULT NULL,
  `nidn/nidk/nup` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_pendidik`),
  KEY `nip` (`nip`),
  CONSTRAINT `master_id_pendidik_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_id_pendidik` */

/*Table structure for table `master_jabatan_fungsional` */

DROP TABLE IF EXISTS `master_jabatan_fungsional`;

CREATE TABLE `master_jabatan_fungsional` (
  `id_jabatan_fungsional` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan_fungsional` enum('Asisten Ahli','Lektor','Lektor Kepala','Guru Besar') DEFAULT NULL,
  PRIMARY KEY (`id_jabatan_fungsional`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_jabatan_fungsional` */

insert  into `master_jabatan_fungsional`(`id_jabatan_fungsional`,`jabatan_fungsional`) values 
(1,'Asisten Ahli'),
(2,'Guru Besar'),
(3,'Lektor'),
(4,'Lektor Kepala');

/*Table structure for table `master_kategori_penelitian` */

DROP TABLE IF EXISTS `master_kategori_penelitian`;

CREATE TABLE `master_kategori_penelitian` (
  `id_kategori_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_penelitian` enum('Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku (ber-ISSN/ISBN)','Hasil penelitian atau hasil pemikiran dalam buku yang  dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter) (ber ISBN)','Hasil penelitian atau hasil pemikiran yang dipublikasikan','Hasil penelitian atau hasil pemikiran yang didesiminasikan','Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)','Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)','Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara nasional atau internasional','Membuat rancangan dan karya teknologi yang tidak dipatenkan; rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum yang teragenda','Membuat rancangan dan karya seni yang tidak mendapatkan HaKI','Tahapan penelitian LPPM (Penelitian LPPM PNPB/KEMENRISTEK DIKTI/LUAR)','Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga') DEFAULT NULL,
  PRIMARY KEY (`id_kategori_penelitian`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_kategori_penelitian` */

insert  into `master_kategori_penelitian`(`id_kategori_penelitian`,`kategori_penelitian`) values 
(1,'Hasil penelitian atau hasil pemikiran dalam buku yang  dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter) (ber ISBN)'),
(2,'Hasil penelitian atau hasil pemikiran yang didesiminasikan'),
(3,'Hasil penelitian atau hasil pemikiran yang dipublikasikan'),
(4,'Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku (ber-ISSN/ISBN)'),
(5,'Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga'),
(6,'Membuat rancangan dan karya seni yang tidak mendapatkan HaKI'),
(7,'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara nasional atau internasional'),
(8,'Membuat rancangan dan karya teknologi yang tidak dipatenkan; rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum yang teragenda'),
(9,'Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)'),
(10,'Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)'),
(11,'Tahapan penelitian LPPM (Penelitian LPPM PNPB/KEMENRISTEK DIKTI/LUAR)');

/*Table structure for table `master_kategori_pengabdian` */

DROP TABLE IF EXISTS `master_kategori_pengabdian`;

CREATE TABLE `master_kategori_pengabdian` (
  `id_kategori_pengabdian` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_pengabdian` text,
  PRIMARY KEY (`id_kategori_pengabdian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_kategori_pengabdian` */

/*Table structure for table `master_keaktifan` */

DROP TABLE IF EXISTS `master_keaktifan`;

CREATE TABLE `master_keaktifan` (
  `id_keaktifan` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `id_status_keaktifan` int(11) DEFAULT NULL,
  `tmt_keaktifan` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id_keaktifan`),
  KEY `id_status_keaktifan` (`id_status_keaktifan`),
  KEY `nip` (`nip`),
  CONSTRAINT `master_keaktifan_ibfk_1` FOREIGN KEY (`id_status_keaktifan`) REFERENCES `master_status_keaktifan` (`id_status_keaktifan`),
  CONSTRAINT `master_keaktifan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_keaktifan` */

insert  into `master_keaktifan`(`id_keaktifan`,`nip`,`id_status_keaktifan`,`tmt_keaktifan`,`created_at`,`updated_at`) values 
(6,NULL,1,NULL,'2021-02-25','2021-02-25');

/*Table structure for table `master_pangkat_pns` */

DROP TABLE IF EXISTS `master_pangkat_pns`;

CREATE TABLE `master_pangkat_pns` (
  `id_pangkat_pns` int(11) NOT NULL AUTO_INCREMENT,
  `pangkat` enum('Penata Muda','Penata Muda Tk. I','Penata','Penata Tk. I','Pembina','Pembina Tk. I','Pembina Utama Muda','Pembina Utama Madya','Pembina Utama','CPNS - 3A','CPNS - 3B','CPNS Belum Memiliki Pangkat') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `golongan` enum('Gol. III/a','Gol. III/b','Gol. III/c','Gol. III/d','Gol. IV/a','Gol. IV/b','Gol. IV/c','Gol. IV/d','Gol. IV/e') DEFAULT NULL,
  PRIMARY KEY (`id_pangkat_pns`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_pangkat_pns` */

insert  into `master_pangkat_pns`(`id_pangkat_pns`,`pangkat`,`golongan`) values 
(1,'Pembina','Gol. IV/a'),
(2,'Pembina Tk. I','Gol. IV/b'),
(3,'Pembina Utama','Gol. IV/e'),
(4,'Pembina Utama Madya','Gol. IV/d'),
(5,'Pembina Utama Muda','Gol. IV/c'),
(6,'Penata','Gol. III/c'),
(7,'Penata Muda','Gol. III/a'),
(8,'Penata Muda Tk. I','Gol. III/b'),
(9,'Penata Tk. I','Gol. III/d'),
(10,'CPNS - 3A',NULL),
(11,'CPNS - 3B',NULL),
(12,'CPNS Belum Memiliki Pangkat',NULL);

/*Table structure for table `master_pendidikan` */

DROP TABLE IF EXISTS `master_pendidikan`;

CREATE TABLE `master_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `jenjang_pendidikan_terakhir` varchar(5) DEFAULT NULL,
  `nama_institusi` varchar(50) DEFAULT NULL,
  `bidang_ilmu` varchar(30) DEFAULT NULL,
  `tanggal_selesai_studi` date DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_pendidikan` */

insert  into `master_pendidikan`(`id_pendidikan`,`jenjang_pendidikan_terakhir`,`nama_institusi`,`bidang_ilmu`,`tanggal_selesai_studi`) values 
(1,'SMA','SMA 123 Merdeka','IPA','2021-02-19');

/*Table structure for table `master_penelitian` */

DROP TABLE IF EXISTS `master_penelitian`;

CREATE TABLE `master_penelitian` (
  `id_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_penelitian` int(11) DEFAULT NULL,
  `jenis_penelitian` enum('test') DEFAULT NULL,
  `judul` text,
  `penerbit` text,
  `edisi` text,
  `ISBN` int(11) DEFAULT NULL,
  `jumlah_halaman` int(11) DEFAULT NULL,
  `bulan_publikasi` int(11) DEFAULT NULL,
  `tahun_publikasi` int(11) DEFAULT NULL,
  `keterangan` text,
  `file_sk_tugas` text,
  `file_bukti_kerja` text,
  `status_validitas` enum('Valid','Tidak Valid','Belum Valid') DEFAULT NULL,
  PRIMARY KEY (`id_penelitian`),
  KEY `id_kategori_penelitian` (`id_kategori_penelitian`),
  CONSTRAINT `master_penelitian_ibfk_1` FOREIGN KEY (`id_kategori_penelitian`) REFERENCES `master_kategori_penelitian` (`id_kategori_penelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_penelitian` */

/*Table structure for table `master_pengabdian` */

DROP TABLE IF EXISTS `master_pengabdian`;

CREATE TABLE `master_pengabdian` (
  `id_pengabdian` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_pengabdian` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengabdian`),
  KEY `id_kategori_pengabdian` (`id_kategori_pengabdian`),
  CONSTRAINT `master_pengabdian_ibfk_1` FOREIGN KEY (`id_kategori_pengabdian`) REFERENCES `master_kategori_pengabdian` (`id_kategori_pengabdian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_pengabdian` */

/*Table structure for table `master_penulis` */

DROP TABLE IF EXISTS `master_penulis`;

CREATE TABLE `master_penulis` (
  `id_penulis` int(11) NOT NULL AUTO_INCREMENT,
  `id_penelitian` int(11) DEFAULT NULL,
  `nama_penulis` varchar(50) DEFAULT NULL,
  `role` enum('Dosen','LUAR','Mahasiswa') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_penulis`),
  KEY `id_penelitian` (`id_penelitian`),
  CONSTRAINT `master_penulis_ibfk_1` FOREIGN KEY (`id_penelitian`) REFERENCES `master_penelitian` (`id_penelitian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_penulis` */

/*Table structure for table `master_prodi` */

DROP TABLE IF EXISTS `master_prodi`;

CREATE TABLE `master_prodi` (
  `id_prodi` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_fakultas` tinyint(4) DEFAULT NULL,
  `prodi` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `id_fakultas` (`id_fakultas`),
  CONSTRAINT `master_prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `master_fakultas` (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_prodi` */

insert  into `master_prodi`(`id_prodi`,`id_fakultas`,`prodi`) values 
(1,1,'TI');

/*Table structure for table `master_status_dosen` */

DROP TABLE IF EXISTS `master_status_dosen`;

CREATE TABLE `master_status_dosen` (
  `id_status_dosen` tinyint(1) NOT NULL AUTO_INCREMENT,
  `status_dosen` enum('dosen biasa','profesor','dosen dengan tugas tambahan rektor s/d ketjur','profesor dengan tugas tambahan rektor s/d ketjur') DEFAULT NULL,
  PRIMARY KEY (`id_status_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_status_dosen` */

insert  into `master_status_dosen`(`id_status_dosen`,`status_dosen`) values 
(1,'dosen biasa'),
(2,'dosen dengan tugas tambahan rektor s/d ketjur'),
(3,'profesor'),
(4,'profesor dengan tugas tambahan rektor s/d ketjur');

/*Table structure for table `master_status_keaktifan` */

DROP TABLE IF EXISTS `master_status_keaktifan`;

CREATE TABLE `master_status_keaktifan` (
  `id_status_keaktifan` int(11) NOT NULL AUTO_INCREMENT,
  `status_keaktifan` enum('Tugas di Instansi Lain','Tugas Belajar','Tidak Ada Data','Keluar','Pensiun Duda/Janda','Pensiun','Pemberhentian Tanpa Hak Pensiun','Pemberhentian Jabatan Akademik','Masa Persiapan Pensiun (MPP)','Ijin Belajar','Cuti','Almarhum','Aktif','Pemberhentian dengan Hormat Tidak Atas Permintaan Sendiri') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_status_keaktifan`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_status_keaktifan` */

insert  into `master_status_keaktifan`(`id_status_keaktifan`,`status_keaktifan`) values 
(1,'Aktif'),
(2,'Almarhum'),
(3,'Cuti'),
(4,'Ijin Belajar'),
(5,'Keluar'),
(6,'Masa Persiapan Pensiun (MPP)'),
(7,'Pemberhentian dengan Hormat Tidak Atas Permintaan Sendiri'),
(8,'Pemberhentian Jabatan Akademik'),
(9,'Pemberhentian Tanpa Hak Pensiun'),
(10,'Pensiun'),
(11,'Pensiun Duda/Janda'),
(12,'Tidak Ada Data'),
(13,'Tugas Belajar'),
(14,'Tugas di Instansi Lain');

/*Table structure for table `master_status_kepegawaian` */

DROP TABLE IF EXISTS `master_status_kepegawaian`;

CREATE TABLE `master_status_kepegawaian` (
  `id_status_kepegawaian` int(11) NOT NULL AUTO_INCREMENT,
  `status_kepegawaian` enum('Emeritus','Tetap BLU','Tetap','Luar Non PNS','Luar','Kontrak') DEFAULT NULL,
  PRIMARY KEY (`id_status_kepegawaian`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `master_status_kepegawaian` */

insert  into `master_status_kepegawaian`(`id_status_kepegawaian`,`status_kepegawaian`) values 
(1,'Emeritus'),
(2,'Kontrak'),
(3,'Luar'),
(4,'Luar Non PNS'),
(5,'Tetap'),
(6,'Tetap BLU');

/*Table structure for table `notification_table` */

DROP TABLE IF EXISTS `notification_table`;

CREATE TABLE `notification_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kepangkatan` int(11) DEFAULT NULL,
  `nip_dosen` int(11) DEFAULT NULL,
  `cek_hari` date DEFAULT NULL,
  `chat_id` text,
  `flag` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nip_dosen` (`nip_dosen`),
  KEY `id_kepangkatan` (`id_kepangkatan`),
  CONSTRAINT `notification_table_ibfk_1` FOREIGN KEY (`nip_dosen`) REFERENCES `tb_dosen` (`nip`),
  CONSTRAINT `notification_table_ibfk_2` FOREIGN KEY (`id_kepangkatan`) REFERENCES `tmt_kepangkatan_fungsional` (`id_tmt_kepangkatan_fungsional`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `notification_table` */

insert  into `notification_table`(`id`,`id_kepangkatan`,`nip_dosen`,`cek_hari`,`chat_id`,`flag`,`created_at`,`updated_at`) values 
(43,2,4,'2021-03-04','643313177',1,'2021-03-04 16:00:11','2021-03-04 16:00:11'),
(44,3,6,'2021-03-04','628748372',2,'2021-03-04 16:01:03','2021-03-04 16:01:03'),
(45,4,4,'2021-02-25','643313177',2,'2021-03-04 17:39:52','2021-03-04 17:39:52');

/*Table structure for table `tb_dosen` */

DROP TABLE IF EXISTS `tb_dosen`;

CREATE TABLE `tb_dosen` (
  `nip` int(11) NOT NULL AUTO_INCREMENT,
  `id_status_dosen` tinyint(1) DEFAULT NULL,
  `id_prodi` tinyint(4) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `id_status_kepegawaian` int(11) DEFAULT NULL,
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
  `no_karis_karsu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `file_karis_karsu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `file_ktp` varchar(50) DEFAULT NULL,
  `chat_id` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_pendidikan` (`id_pendidikan`),
  KEY `id_status_dosen` (`id_status_dosen`),
  KEY `id_status_kepegawaian` (`id_status_kepegawaian`),
  KEY `id_prodi` (`id_prodi`),
  CONSTRAINT `tb_dosen_ibfk_2` FOREIGN KEY (`id_status_kepegawaian`) REFERENCES `master_status_kepegawaian` (`id_status_kepegawaian`),
  CONSTRAINT `tb_dosen_ibfk_4` FOREIGN KEY (`id_pendidikan`) REFERENCES `master_pendidikan` (`id_pendidikan`),
  CONSTRAINT `tb_dosen_ibfk_5` FOREIGN KEY (`id_prodi`) REFERENCES `master_prodi` (`id_prodi`),
  CONSTRAINT `tb_dosen_ibfk_6` FOREIGN KEY (`id_status_dosen`) REFERENCES `master_status_dosen` (`id_status_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=1234567892 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_dosen` */

insert  into `tb_dosen`(`nip`,`id_status_dosen`,`id_prodi`,`id_pendidikan`,`id_status_kepegawaian`,`nama`,`gelar_depan`,`gelar_belakang`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`alamat_domisili`,`alamat_rumah`,`telp_rumah`,`no_hp`,`email_aktif`,`no_karpeg`,`file_karpeg`,`no_npwp`,`file_npwp`,`no_karis_karsu`,`file_karis_karsu`,`no_ktp`,`file_ktp`,`chat_id`,`updated_at`,`created_at`) values 
(4,NULL,NULL,NULL,NULL,'Wahyu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'643313177',NULL,NULL),
(6,NULL,NULL,NULL,NULL,'Rey',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'628748372',NULL,NULL);

/*Table structure for table `tmt_jabatan_fungsional` */

DROP TABLE IF EXISTS `tmt_jabatan_fungsional`;

CREATE TABLE `tmt_jabatan_fungsional` (
  `id_tmt_jabatan_fungsional` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan_fungsional` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `tmt_jabatan_fungsional` date DEFAULT NULL,
  PRIMARY KEY (`id_tmt_jabatan_fungsional`),
  KEY `id_jabatan_fungsional` (`id_jabatan_fungsional`),
  KEY `nip` (`nip`),
  CONSTRAINT `tmt_jabatan_fungsional_ibfk_1` FOREIGN KEY (`id_jabatan_fungsional`) REFERENCES `master_jabatan_fungsional` (`id_jabatan_fungsional`),
  CONSTRAINT `tmt_jabatan_fungsional_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tmt_jabatan_fungsional` */

/*Table structure for table `tmt_kepangkatan_fungsional` */

DROP TABLE IF EXISTS `tmt_kepangkatan_fungsional`;

CREATE TABLE `tmt_kepangkatan_fungsional` (
  `id_tmt_kepangkatan_fungsional` int(11) NOT NULL AUTO_INCREMENT,
  `id_pangkat_pns` int(11) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `tmt_pangkat/golongan` date DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tmt_kepangkatan_fungsional`),
  KEY `id_pangkat_pns` (`id_pangkat_pns`),
  KEY `nip` (`nip`),
  CONSTRAINT `tmt_kepangkatan_fungsional_ibfk_1` FOREIGN KEY (`id_pangkat_pns`) REFERENCES `master_pangkat_pns` (`id_pangkat_pns`),
  CONSTRAINT `tmt_kepangkatan_fungsional_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tmt_kepangkatan_fungsional` */

insert  into `tmt_kepangkatan_fungsional`(`id_tmt_kepangkatan_fungsional`,`id_pangkat_pns`,`nip`,`tmt_pangkat/golongan`,`unit`) values 
(2,9,4,'2019-03-04',0),
(3,9,6,'2019-03-04',0),
(4,10,4,'2019-03-04',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
