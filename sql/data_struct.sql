/*
SQLyog Community v12.2.6 (64 bit)
MySQL - 5.7.11-log : Database - ci_pmbol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_berita` */

DROP TABLE IF EXISTS `tb_berita`;

CREATE TABLE `tb_berita` (
  `id_berita` varchar(20) NOT NULL,
  `isi_berita` varchar(2000) DEFAULT NULL,
  `tgl_post` datetime DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_fak` */

DROP TABLE IF EXISTS `tb_fak`;

CREATE TABLE `tb_fak` (
  `id_fak` varchar(40) NOT NULL,
  `nm_fak` varchar(50) DEFAULT NULL,
  `urut_fak` int(11) DEFAULT '1',
  PRIMARY KEY (`id_fak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_glmb` */

DROP TABLE IF EXISTS `tb_glmb`;

CREATE TABLE `tb_glmb` (
  `thn` int(11) NOT NULL,
  `glmb` int(11) NOT NULL,
  `awal` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `ujian` date DEFAULT NULL,
  PRIMARY KEY (`thn`,`glmb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_log_maba` */

DROP TABLE IF EXISTS `tb_log_maba`;

CREATE TABLE `tb_log_maba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lg_time` datetime NOT NULL,
  `out_time` datetime DEFAULT NULL,
  `id_peserta` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3917 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_log_user` */

DROP TABLE IF EXISTS `tb_log_user`;

CREATE TABLE `tb_log_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lg_time` datetime NOT NULL,
  `out_time` datetime DEFAULT NULL,
  `user_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3959 DEFAULT CHARSET=utf8;

/*Table structure for table `tb_maba` */

DROP TABLE IF EXISTS `tb_maba`;

CREATE TABLE `tb_maba` (
  `id_peserta` varchar(20) NOT NULL,
  `id_prodi` varchar(40) DEFAULT NULL,
  `kd_prodi` int(11) DEFAULT NULL,
  `ktp` varchar(20) DEFAULT NULL,
  `nm` varchar(100) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `tlp` varchar(20) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `asalsma` varchar(100) DEFAULT NULL,
  `thnlls` int(4) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `tgltrans` date DEFAULT NULL,
  `tglentry` date DEFAULT NULL,
  `tglkonf` date DEFAULT NULL,
  `verified` int(1) DEFAULT '0',
  `tglveri` date DEFAULT NULL,
  `konf` int(1) DEFAULT '0',
  `nm_bank` varchar(100) DEFAULT NULL,
  `kwitansi` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `tmplhr` varchar(100) DEFAULT NULL,
  `ket` varchar(225) DEFAULT NULL,
  `jmlmsk` int(11) DEFAULT NULL,
  `usm` int(1) DEFAULT '0',
  `nousm` int(11) DEFAULT '0',
  `ctkkrt` int(11) DEFAULT '0',
  PRIMARY KEY (`id_peserta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `tb_priode` */

DROP TABLE IF EXISTS `tb_priode`;

CREATE TABLE `tb_priode` (
  `thn` int(11) NOT NULL,
  `awal` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `an` varchar(200) DEFAULT NULL,
  `rek` varchar(200) DEFAULT NULL,
  `byr` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL,
  PRIMARY KEY (`thn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `tb_prodi` */

DROP TABLE IF EXISTS `tb_prodi`;

CREATE TABLE `tb_prodi` (
  `id_prodi` varchar(40) NOT NULL,
  `nm_prodi` varchar(50) NOT NULL,
  `fak_prodi` varchar(8) NOT NULL,
  `urut_prodi` int(11) DEFAULT '1',
  PRIMARY KEY (`id_prodi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_name` varchar(10) NOT NULL,
  `user_pass` varchar(40) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Trigger structure for table `tb_priode` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `upd_thn` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `upd_thn` AFTER UPDATE ON `tb_priode` FOR EACH ROW IF (old.thn != new.thn) 
    THEN  
      UPDATE tb_glmb SET thn=new.thn WHERE thn=old.thn;    
    END if */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
