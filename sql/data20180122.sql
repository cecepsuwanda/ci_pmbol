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

/*Data for the table `tb_berita` */

insert  into `tb_berita`(`id_berita`,`isi_berita`,`tgl_post`) values 
('20180122054447','Pendaftaran mahasiswa baru untuk T.A. 2018-2019, sudah dibuka ...','2018-01-22 05:44:47');

/*Table structure for table `tb_fak` */

DROP TABLE IF EXISTS `tb_fak`;

CREATE TABLE `tb_fak` (
  `id_fak` varchar(40) NOT NULL,
  `nm_fak` varchar(50) DEFAULT NULL,
  `urut_fak` int(11) DEFAULT '1',
  PRIMARY KEY (`id_fak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_fak` */

insert  into `tb_fak`(`id_fak`,`nm_fak`,`urut_fak`) values 
('FAPERTA','Pertanian',1),
('FE','Ekonomi',3),
('FIKES','Ilmu Kesehatan',7),
('FISIP','Ilmu Sosial dan Ilmu Politik',5),
('FKIP','Keguruan Dan Ilmu Pendidikan',2),
('FMIPA','Matematika dan Ilmu Pengetahuan Alam',6),
('FTI','Teknologi Informasi',4);

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

/*Data for the table `tb_glmb` */

insert  into `tb_glmb`(`thn`,`glmb`,`awal`,`akhir`,`ujian`) values 
(2018,1,'2018-01-01','2018-03-30','2018-03-31'),
(2018,2,'2018-03-31','2018-06-01','2018-06-02'),
(2018,3,'2018-06-02','2018-08-31','2018-09-01');

/*Table structure for table `tb_log_maba` */

DROP TABLE IF EXISTS `tb_log_maba`;

CREATE TABLE `tb_log_maba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lg_time` datetime NOT NULL,
  `out_time` datetime DEFAULT NULL,
  `id_peserta` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tb_log_maba` */

/*Table structure for table `tb_log_user` */

DROP TABLE IF EXISTS `tb_log_user`;

CREATE TABLE `tb_log_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lg_time` datetime NOT NULL,
  `out_time` datetime DEFAULT NULL,
  `user_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_log_user` */

insert  into `tb_log_user`(`id`,`lg_time`,`out_time`,`user_name`) values 
(1,'2018-01-21 17:15:50','2018-01-21 19:20:06','admin'),
(2,'2018-01-22 05:44:09','2018-01-22 05:44:55','admin');

/*Table structure for table `tb_maba` */

DROP TABLE IF EXISTS `tb_maba`;

CREATE TABLE `tb_maba` (
  `id_peserta` varchar(20) NOT NULL,
  `id_prodi` varchar(40) DEFAULT NULL,
  `kd_prodi` int(11) DEFAULT NULL,
  `ktp` varchar(20) DEFAULT NULL,
  `nm` varchar(100) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `kelas` varchar(1) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `tlp` varchar(20) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
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

/*Data for the table `tb_maba` */

insert  into `tb_maba`(`id_peserta`,`id_prodi`,`kd_prodi`,`ktp`,`nm`,`jk`,`kelas`,`tgllhr`,`tlp`,`hp`,`alamat`,`email`,`asalsma`,`thnlls`,`user`,`pass`,`tgltrans`,`tglentry`,`tglkonf`,`verified`,`tglveri`,`konf`,`nm_bank`,`kwitansi`,`photo`,`tmplhr`,`ket`,`jmlmsk`,`usm`,`nousm`,`ctkkrt`) values 
('201501001','87202',1,NULL,'citra','P',NULL,'2000-04-03','-','08132544211',NULL,'citra@yahoo.id','sma n baleendah',2014,'citra','e260eab6a7c45d139631f72b55d8506b',NULL,'2015-04-28',NULL,0,NULL,0,'',NULL,'','',NULL,0,0,0,0),
('201504001','87220',4,NULL,'yuyun yuningsih','P',NULL,'1996-08-20','','+6289501055549',NULL,'yuyunyuningsih218@yahoo.co.id','smk tribakti pangalengan',2014,'yuyunyuni','6cfd64c90186abd742c8f98d5e704dec',NULL,'2015-05-20',NULL,0,NULL,0,'',NULL,'201504001.jpeg','bandung',NULL,0,0,0,0),
('201502001','88201',2,NULL,'Rosmayanti','P',NULL,'2015-02-15','','089639920049',NULL,'rosmayasuryadi@gmail.com','SMAN 1 CICALENGKA',2009,'rosmayasuryadi@','bf368ab030fb35ef67186910940ca02a',NULL,'2015-04-28',NULL,0,NULL,0,'',NULL,'','',NULL,1,0,0,0),
('201511001','65201',11,NULL,'dini asri haryati ','P',NULL,'1996-03-23','','087714677741',NULL,'diniasri.h@gmail.com ','MA AL - FALAH NAGREG BANDUNG',2014,'diniasri23','96ce3eaedc4a2c9a6dc05b12e2e28878',NULL,'2015-04-29',NULL,0,NULL,0,'',NULL,'201511001.jpeg','',NULL,0,0,0,0),
('201511002','65201',11,NULL,'Nu\'man Asfahani','L',NULL,'1996-08-20','','08977318430',NULL,'nu39manmoreira@yahoo.com','SMKN 2 BALEENDAH',2014,'numunibba','5209ac5a6438c8e6a4d38ef3ba131179','2015-05-08','2015-05-04','2015-05-08',1,NULL,1,'BNI',NULL,'201511002.jpeg','Bandung',NULL,23,1,1,4),
('201508001','55201',8,NULL,'AGUS KAMALUDIN','L',NULL,'1993-08-18','','089609323294',NULL,'aguskamaludin93@mail.com','SMA KARYA PEMBANGUNAN BALEENDA',2010,'aguskamaludin','77f22823bf178e8af56cb678c3ffe185',NULL,'2015-05-09',NULL,0,NULL,0,'',NULL,'201508001.jpeg','bandung',NULL,0,0,0,0),
('201504002','87220',4,NULL,'aldo prakoso','L',NULL,'0000-00-00','021157577','082114747777',NULL,'aldoprakoso47@yahoo.com','SMK 1 BANDUNG',2015,'aldo_prakoso47','2d5a44c33dcac25da4b480abf86a8984','0000-00-00','2015-05-21','2015-05-21',0,NULL,1,'BANK BNI BANDUNG GANESHA',NULL,'201504002.jpeg','bandung',NULL,4,0,0,0),
('201513001','14201',13,NULL,'Yuni Lestari','P',NULL,'0000-00-00','085775389828','',NULL,'','SMA YADIKA 1 JAKARTA BARAT',2015,'Yunilestari','41971cb8422a2aa24cc1c1442b4e3e3d',NULL,'2015-05-18',NULL,0,NULL,0,'',NULL,'201513001.jpeg','Jakarta',NULL,0,0,0,0),
('201513002','14201',13,NULL,'Yuni Lestari','P',NULL,'1997-06-08','085775389828','',NULL,'','SMA YADIKA 1 Jakarta Barat',2015,'Yuniles','41971cb8422a2aa24cc1c1442b4e3e3d','0000-00-00','2015-05-18','2015-05-18',0,NULL,0,'',NULL,'201513002.jpeg','Jakarta',NULL,3,0,0,0),
('201513003','14201',13,NULL,'Yuni Lestari','P',NULL,'1997-06-08','085775389828','081210202810',NULL,'','SMA YADIKA 1',2015,'Yuniles08','d2b4d027c61ad1e74bcded4c110f87e3','0000-00-00','2015-05-18','2015-05-18',0,NULL,0,'',NULL,'201513003.jpeg','Jakarta',NULL,2,0,0,0),
('201504003','87220',4,NULL,'aldo prakoso','L',NULL,'1997-07-15','021157577','082114747777',NULL,'aldoprakoso47@yahoo.com','SMK 1 BANDUNG',2015,'aldo_prakoso','2d5a44c33dcac25da4b480abf86a8984',NULL,'2015-05-21',NULL,0,NULL,0,'',NULL,'201504003.jpeg','bandung',NULL,0,0,0,0),
('201503001','88203',3,NULL,'Mochamad Nurdin','L',NULL,'1996-03-13','6281214354218','6281214354218',NULL,'dancingprincerasts@yahoo.co.id','MAN CIPARAY',2014,'aku123','699d0d6405481f4f3ad918bb178f0c6b',NULL,'2015-05-22',NULL,0,NULL,0,'',NULL,'201503001.jpeg','Bandung',NULL,0,0,0,0),
('201501002','87202',1,NULL,'Fida Nabila Nahar','L',NULL,'0000-00-00','085727373338','',NULL,'','SMA Negeri 1 Kedungwuni',2015,'Fida Nabila Nah','eb96f4b33c211219dc8a7e2db9d7b448',NULL,'2015-05-24',NULL,0,NULL,0,'',NULL,'201501002.jpeg','Pekalongan',NULL,0,0,0,0),
('201508002','55201',8,NULL,'Jajang Malu','L',NULL,'1992-05-11','0274859203','',NULL,'jajangmalu@gmail.com','SMAN 1 Cisalak',2010,'jajang28','5432b5cca89832a04a2e6a87aefc5f47','2015-05-24','2015-05-24','2015-05-24',0,NULL,1,'BNI',NULL,'201508002.jpeg','Kendari',NULL,1,0,0,0),
('201508003','55201',8,NULL,'Muhammad Soleh','L',NULL,'1996-03-30','021-84593961','081291654976',NULL,'soleh0832@yahoo.com','SMAN 7 BEKASI',2015,'soleh','a438c02edf4daac9aa6068b6090ff6f7',NULL,'2015-05-29',NULL,0,NULL,0,'',NULL,'201508003.jpeg','Bekasi',NULL,1,0,0,0),
('201513004','14201',13,NULL,'RIZKIA UTAMI','P',NULL,'1997-10-01','','083820745597',NULL,'Rizkiautami69@gmail.com','SMAN 1 CILILIN',2015,'Rizkia','10aceae2d1175aa8fd9631d018792e53',NULL,'2015-05-29',NULL,0,NULL,0,'',NULL,'201513004.jpeg','BANDUNG',NULL,1,0,0,0),
('201503002','88203',3,NULL,'EGA APRILIA','P',NULL,'1994-04-03','','089606043494',NULL,'apriliaega48@gmail.com','SMK WIRAKARYA 2 CIPARAY',2012,'egaaprilia','1a0bde5d45f93715a3cbe735a61fc99f','2015-06-08','2015-06-03','2015-06-10',1,'2015-06-13',1,'BNI',NULL,'201503002.jpeg','BANDUNG',NULL,5,2,1,0),
('201502002','88201',2,NULL,'Nandang Rosdi Marta Kusumah','L',NULL,'1997-03-21','-','085798424036',NULL,'nandangrosdimartakusumah@gmail','SMA NEGERI 1 CILAKU CIANJUR',2015,'nandang','5e375ae82d1354c579bc759be089377a',NULL,'2015-06-04',NULL,0,NULL,0,'',NULL,'201502002.jpeg','Cianjur',NULL,1,0,0,0),
('201508004','55201',8,NULL,'Usep Rohimat Saleh','L',NULL,'1991-06-06','085624050525','085624050525',NULL,'yusefsaleh31@yahoo.com','man cipray',2009,'usep','7367cc4cee061a476290d18978830414',NULL,'2015-06-05',NULL,0,NULL,0,'',NULL,'201508004.jpeg','Bandung',NULL,0,0,0,0),
('201503003','88203',3,NULL,'WAWAN GUNAWAN','L',NULL,'1988-07-11','','082214428264',NULL,'cautsar_cloud@yahoo.com','MUHAMMADIYAH 3 CIPARAY',2007,'wawunibba','2cde240b79ddd3cc6ec367b191583311',NULL,'2015-06-06',NULL,0,NULL,0,'',NULL,'201503003.jpeg','BANDUNG',NULL,1,0,0,0),
('201510001','62201',10,NULL,'Risma Kania','P',NULL,'1997-10-19','','08987935235',NULL,'rismakst@gmail.com','SMAN 1 SOREANG',2015,'rismakania','aa46f030ecbf754a83f7798f4cbfaa6f',NULL,'2015-06-07',NULL,0,NULL,0,'',NULL,'201510001.jpeg','Bandung',NULL,0,0,0,0),
('201510002','62201',10,NULL,'Risma Kania','P',NULL,'1997-10-19','','08987935235',NULL,'rismakst@gmail.com','Sman 1 soreang',2015,'risunibba','4da413ca6e9d83792e755f2c2a15424d',NULL,'2015-06-07',NULL,0,NULL,0,'',NULL,'201510002.jpeg','Bandung',NULL,0,0,0,0),
('201509001','57201',9,NULL,'Muhamad Aldi Rainaldi','L',NULL,'1997-10-13','081320097642','081321398756',NULL,'m.aldirainaldi@gmail.com','SMAN 1 JATIWANGI ',2015,'maldrnld','fb105cfdbb0fb1af3da33e88559db190',NULL,'2015-06-11',NULL,0,NULL,0,'',NULL,'201509001.jpeg','Majalengka',NULL,1,0,0,0),
('201508005','55201',8,NULL,'MUHAMMAD RIFAD FAKHROZI','L',NULL,'0000-00-00','','085860467572',NULL,'MUHAMMAD RIFAD FAKHROZI','MA QUWATUL IMAN',2015,'MUHUNIBBA','8f0a596d046bc7852e51353f503bc5d4',NULL,'2015-06-12',NULL,0,NULL,0,'',NULL,'201508005.jpeg','INDRAMAYU ',NULL,1,0,0,0),
('201512001','44201',12,NULL,'CHYNTIA NOVA DEWI','P',NULL,'1997-11-11','','087821070323',NULL,'chyntianovadewi@gmail.com','SMAN 1 SOREANG',2015,'chyntianova','1a9c91f6e0310d4f55b7ee7f22c2c9df',NULL,'2015-06-13',NULL,0,NULL,0,'',NULL,'201512001.jpeg','BANDUNG',NULL,1,0,0,0),
('201509002','57201',9,NULL,'PUTRI SALMA SUHARDI','P',NULL,'2015-06-10','+6281267900898','+6281267900898',NULL,'sansanpss.ps@gmail.com','man 2 model ',2015,'putrisalmas','f160712f7762b0a6753c59335d08aec1',NULL,'2015-06-16',NULL,0,NULL,0,'',NULL,'201509002.jpeg','pekanbaru',NULL,0,0,0,0),
('201507001','41221',7,NULL,'Gina Rismawati','P',NULL,'1996-12-04','085795929347','',NULL,'','SMKN 2 Baleendah',2015,'gina_rismawati','b053e604c81dcccb73615e9869db039e',NULL,'2015-06-22',NULL,0,NULL,0,'',NULL,'201507001.jpeg','Bandung',NULL,0,0,0,0),
('201502003','88201',2,NULL,'ICHSAN ARIF NUGRAHA','L',NULL,'1989-02-17','','08970071295',NULL,'ichsan_arifnugraha@yahoo.com','SMK PENIDA 2 KATAPANG',2006,'ichsan','8e1ab1d09d1faeb9536ea0ccc363c236','2015-07-10','2015-06-30','2015-06-30',0,NULL,1,'BANK RAKYAT INDONESIA',NULL,'201502003.jpeg','BANDUNG',NULL,10,0,0,0),
('201511003','65201',11,NULL,'Agus Kusumah','L',NULL,'1974-08-08','081322090444','',NULL,'','SMA PASUNDAN MAJALAYA',1992,'akusumah06@gmai','a97e1ab082b09e28acda7f328d326935',NULL,'2015-07-08',NULL,0,NULL,0,'',NULL,'201511003.jpeg','Bandung',NULL,0,0,0,0),
('201504004','87220',4,NULL,'ahmad fauzan','L',NULL,'1995-07-21','','085773370025',NULL,'zan.ahmad128@gmail.com','Ma.Attaqwa pusat putra bekasi',2013,'fauzan21','98b8a55e5167e4989da936ba09af0f8c',NULL,'2015-07-09',NULL,0,NULL,0,'',NULL,'201504004.jpeg','bekasi',NULL,0,0,0,0),
('201501003','87202',1,NULL,'CEP SUMINDAR','L',NULL,'1995-06-28','','085797068585',NULL,'puteracikal734@yahoo.com','SMA PASUNDAN CIKALONGKULON',2014,'cepunibba','9ab82498781ef14411d7b52171cdeae3',NULL,'2015-07-10',NULL,0,NULL,0,'',NULL,'201501003.jpeg','CIANJUR',NULL,8,0,0,0),
('201508006','55201',8,NULL,'rangga ario manggala aditia','L',NULL,'2015-07-30','022 7912758','082274444648',NULL,'rangga613@gmail.com','-',2014,'ranunibba','4676c7bb8c4d5a8154b27efed6490354',NULL,'2015-07-11',NULL,0,NULL,0,'',NULL,'201508006.jpeg','sumedang',NULL,0,0,0,0),
('201508007','55201',8,NULL,'rangga ario manggala aditia','L',NULL,'2015-07-30','022 7912758','082274444648',NULL,'rangga613@gmail.com','-',2014,'ramunibba','4676c7bb8c4d5a8154b27efed6490354',NULL,'2015-07-11',NULL,0,NULL,0,'',NULL,'201508007.jpeg','sumedang',NULL,3,0,0,0),
('201503004','88203',3,NULL,'Ali Mamun ','L',NULL,'1997-08-12','-','082240424919',NULL,'lhiemamun@gmail.com','SMAN 1 Katapang',2015,'Ali Mamun','e5a38aaf724053856276beb3f82e4c36','2015-07-14','2015-07-13','2015-07-14',1,'2015-08-01',1,'Bank Negara Indonesia (BNI)',NULL,'201503004.jpeg','Bandung',NULL,5,3,2,0),
('201508008','55201',8,NULL,'HILMAN RISKI FAUZI','L',NULL,'1996-04-03','08977798588','08977798588',NULL,'hriski20@ymail.com','SMK ANGKASA 1 MARGAHAYU',2014,'hriski20','5c2fb951458b57e8e049d48a55cdddad',NULL,'2015-07-18',NULL,0,NULL,0,'',NULL,'201508008.jpeg','BANDUNG ',NULL,1,0,0,0),
('201510003','62201',10,NULL,'Pandu Pangestu','L',NULL,'1996-06-11','','089505121179',NULL,'pandupangestu38@gmail.com','SMA N 1 PANGALENGA',2014,'pandu_pangestu','dec05fe8101fdf5c00fd9729a0423102',NULL,'2015-07-18',NULL,0,NULL,0,'',NULL,'201510003.jpeg','Bandung',NULL,1,0,0,0),
('201507002','41221',7,NULL,'Hemeh Anskill','L',NULL,'1984-07-10','085271830293','',NULL,'hem@bra.co.id','SMA Putra Harapan Bangsa Bersa',1992,'hemehcok','867e8407297c8a70c6dafb172f23941d','2015-07-20','2015-07-20','2015-07-20',0,NULL,1,'BNI',NULL,'201507002.jpeg','Bontang',NULL,1,0,0,0),
('201506001','54201',6,NULL,'NINDIA AYU DEWININGTIYAS','P',NULL,'1997-07-03','','085811563723',NULL,'ayunindia57@gmail.com','SMA NEGERI 1 KARAWANG',2015,'ninunibba_','d40148c940cfdc9dc158fc832fe4034d',NULL,'2015-07-23',NULL,0,NULL,0,'',NULL,'201506001.jpeg','KARAWANG',NULL,0,0,0,0),
('201501004','87202',1,NULL,'MUCHAMMAD IRGI F','L',NULL,'1996-11-04','','085723151161',NULL,'','SMA PASUNDAN CIKALONGKULON',2015,'irgunibba','e8e23b2339c370bf07e8b5058abb115f',NULL,'2015-07-26',NULL,0,NULL,0,'',NULL,'201501004.jpeg','CIANJUR',NULL,2,0,0,0),
('201501005','87202',1,NULL,'Sulastri','P',NULL,'1997-02-11','','085624964678',NULL,'lastri28@gmail.com','SMAN 1CIRACAP',2015,'Sulastri','9955b1c35360ea867186847c50b70c94',NULL,'2015-07-29',NULL,0,NULL,0,'',NULL,'201501005.jpeg','Sukabumi',NULL,0,0,0,0),
('201510004','62201',10,NULL,'Sulastri','P',NULL,'1997-02-11','','085624964678',NULL,'lastri28@gmail.com','SMAN 1CIRACAP',2015,'sulastri rahayu','8fb63f4f87f938e81b2603ab64c74b88',NULL,'2015-07-29',NULL,0,NULL,0,'',NULL,'201510004.jpeg','Sukabumi',NULL,9,0,0,0),
('201510005','62201',10,NULL,'Sulastri','P',NULL,'1997-02-11','','085624964678',NULL,'lastri28@gmail.com','SMAN 1CIRACAP',2015,'sulunibba','15fe3031817bd2d3dac50e0e59c9d07c',NULL,'2015-07-29',NULL,0,NULL,0,'',NULL,'201510005.jpeg','Sukabumi',NULL,5,0,0,0),
('201510006','62201',10,NULL,'Sulastri','P',NULL,'1997-02-11','','085624964678',NULL,'lastri28@gmail.com','SMAN 1CIRACAP',2015,'Rahunibba','15fe3031817bd2d3dac50e0e59c9d07c',NULL,'2015-07-29',NULL,0,NULL,0,'',NULL,'201510006.jpeg','Sukabumi',NULL,0,0,0,0),
('201506002','54201',6,NULL,'RIZAL HADIANSYAH','L',NULL,'1996-03-26','','081214423633',NULL,'idzalhungkul@yahoo.co.id','SMA PEMUDA BANJARAN',2014,'IDZAL','f8cf9f7508ce6fcb6da6fe4db3b477f3','2015-07-30','2015-07-29','2015-07-30',1,'2015-08-01',1,'MANDIRI',NULL,'201506002.jpeg','BANDUNG',NULL,7,3,1,0),
('201512002','44201',12,NULL,'NUR ALIFIA DWI LESTARI','P',NULL,'1998-03-23','-','085729924620',NULL,'','MAN KEBUMEN 1',2015,'alifiadwilestar','6e7d102d23af75c9074f68939acdc66a',NULL,'2015-07-31',NULL,0,NULL,0,'',NULL,'201512002.jpeg','KEBUMEN',NULL,0,0,0,0),
('201512003','44201',12,NULL,'NUR ALIFIA DWI LESTARI','P',NULL,'1998-03-23','','085729924620',NULL,'','MAN KEBUMEN 1',2015,'NUR ALIFIA D.L','6e7d102d23af75c9074f68939acdc66a','2015-08-05','2015-07-31','2015-07-31',0,NULL,1,'BNI',NULL,'201512003.jpeg','KEBUMEN',NULL,2,0,0,0),
('201506003','54201',6,NULL,'Karina Riyadi','P',NULL,'1997-12-16','','087874523986',NULL,'karinariyadi13@gmail.com','SMAN 3 BOGOR',2015,'krnryd','2d84233746ac18f28f893adc320e3368',NULL,'2015-07-31',NULL,0,NULL,0,'',NULL,'201506003.jpeg','Bogor',NULL,0,0,0,0),
('201508009','55201',8,NULL,'Pandu Pangestu','L',NULL,'1996-06-11','','089595121179',NULL,'pandupangestu38@gmail.com','SMA N 1 PANGALENGA',2014,'pandu.pangestu','7940efeee160519c92b32696b17b1690',NULL,'2015-07-31',NULL,0,NULL,0,'',NULL,'201508009.jpeg','Bandung',NULL,2,0,0,0),
('201508010','55201',8,NULL,'Lulu Yamlikho','L',NULL,'1998-04-06','','082121158299',NULL,'yamlikho@gmail.com','MAS PERSIS KOTA BANDUNG',2015,'yamlikho','c0ce8eb547c086007b77383817802755',NULL,'2015-08-02',NULL,0,NULL,0,'',NULL,'201508010.jpeg','Bandung',NULL,4,0,0,0),
('201508011','55201',8,NULL,'Lulu Yamlikho','L',NULL,'1998-04-06','','082121158299',NULL,'yamlikho@gmail','MAS PERSIS KOTA BANDUNG',2015,'yamlikgo','c0ce8eb547c086007b77383817802755',NULL,'2015-08-02',NULL,0,NULL,0,'',NULL,'201508011.jpeg','Bandung',NULL,8,0,0,0),
('201508012','55201',8,NULL,'Lulu Yamlikho','L',NULL,'1998-04-06','','082121158299',NULL,'yamlikho@gmail.com','MAS PERSIS KOTA BANDUNG',2015,'lulunibba','01ea00427286a7dbb3d46450c0c69211','2015-08-04','2015-08-02','2015-08-04',1,'2015-08-18',1,'BNI',NULL,'201508012.jpeg','Bandung',NULL,56,3,3,48),
('201510007','62201',10,NULL,'SOPANI RANJANI','P',NULL,'1996-09-22','','085795321428',NULL,'paniranjani52@gmail.com','SMK TRIBAKTI PANGALENGAN',2015,'sopunibba','135f016418c07e9578fbfa4a0a095053','2015-08-03','2015-08-03','2015-08-03',0,NULL,1,'Mandiri',NULL,'201510007.jpeg','BANDUNG',NULL,16,0,0,0),
('201501006','87202',1,NULL,'kaka arka','L',NULL,'2015-01-01','081221224587','',NULL,'kakaarka@gmail.com','smk 7 bandung',2015,'kakunibba','0786ab3f9b205f21eae1d86a3a01d6dc',NULL,'2015-08-03',NULL,0,NULL,0,'',NULL,'201501006.jpeg','bandung',NULL,1,0,0,0),
('201502004','88201',2,NULL,'ASEP MUNAWAR SAJALI','L',NULL,'1995-12-13','','081809863427',NULL,'asepmunawar.211.86@gmailcom','SMAN 1 KERTASARI',2015,'ASEP MUNAWAR','162f37c99fddba46e53d47b688a72fe6','2015-08-03','2015-08-03','2015-08-03',0,NULL,1,'BNI',NULL,'201502004.jpeg','BANDUNG',NULL,3,0,0,0),
('201507003','41221',7,NULL,'AHMAD FAUZI PERMANA','L',NULL,'1997-12-14','','089504054801',NULL,'afper14@gmail.com','SMKN 13 BANDUNG',2015,'afper14','d51ad5a3cad0b8347ffa80d0941acf25',NULL,'2015-08-05',NULL,0,NULL,0,'',NULL,'201507003.jpeg','BANDUNG',NULL,0,0,0,0),
('201502005','88201',2,NULL,'aida nurfadilah','P',NULL,'1997-05-26','','089612279430',NULL,'aidanurfadilah26@,gmail.com','sman 1 ciparsy',2015,'aidunibba','cb88df9f11ed9db04a4566eb2b25a3be',NULL,'2015-08-09',NULL,0,NULL,0,'',NULL,'201502005.jpeg','bandung',NULL,1,0,0,0),
('201502006','88201',2,NULL,'aida nurfadilah','P',NULL,'1997-05-26','','089612279430',NULL,'aidanurfadilah26@gmail.com','sman 1 ciparay',2015,'idaunibba','673605b186d86b22d0bd374bc2e508d0',NULL,'2015-08-10',NULL,0,NULL,0,'',NULL,'201502006.jpeg','bandung',NULL,0,0,0,0),
('201503005','88203',3,NULL,'maya tamara','P',NULL,'1997-03-15','089655074824','089655074824',NULL,'maya_t.fauzzya@yahoo.co.id','SMA PASUNDAN 2 CIMAHI',2015,'mayatf','0b90e9b8560edd91895b74ef5597a0fe',NULL,'2015-08-10',NULL,0,NULL,0,'',NULL,'201503005.jpeg','bandung',NULL,1,0,0,0),
('201512004','44201',12,NULL,'Wandi Ramdani','L',NULL,'1995-01-27','','08996824495',NULL,'ramdani.wandi02@gmail.com','SMAN 14 Garut',2013,'WandiRamdani','c008079c8ebff2945ad655f25a092cbd',NULL,'2015-08-10',NULL,0,NULL,0,'',NULL,'201512004.jpeg','Garut',NULL,0,0,0,0),
('201512005','44201',12,NULL,'fitria nurul fazriah','P',NULL,'1997-01-30','085793721832','082117974300',NULL,'fitrianurulfazriah@gmail.com','mas darul arqam muhammadiyah ',2015,'fitrianurul','74daff4c5e3a3f4135309852aa765720',NULL,'2015-08-11',NULL,0,NULL,0,'',NULL,'201512005.jpeg','bandung',NULL,3,0,0,0),
('201504005','87220',4,NULL,'luki ','L',NULL,'1996-10-09','','085721355133',NULL,'rini.resti11@yahoo.com','sma negri 1 kertasari pacet',2015,'rini','e5601fea06c0d1f4191788e6a80ea0f8',NULL,'2015-08-11',NULL,0,NULL,0,'',NULL,'201504005.jpeg','bandung',NULL,0,0,0,0),
('201502007','88201',2,NULL,'REGITA CHURNIA DEWI','P',NULL,'1998-02-16','085778885452','085778885452',NULL,'regitachurniadewi16@gmail.com','SMAN 1 TELUKJAMBE',2015,'regunibba','a5f0e2d33213bb0dfb48dd7f98537e21','2015-08-14','2015-08-14','2015-08-14',1,'2015-08-18',1,'BNI',NULL,'201502007.jpeg','BEKASI',NULL,8,3,4,0),
('201510008','62201',10,NULL,'Yulianti Wulandari','P',NULL,'1997-07-12','08122419687','085721760380',NULL,'wulandariyulianti12@gmail.com','SMAN 1 Margahayu',2015,'yulunibba','82fe6388ca19425fe8ef6a36d91f04a3','2015-08-26','2015-08-20','2015-08-20',0,NULL,1,'BNI',NULL,'201510008.jpeg','Indramayu',NULL,1,0,0,0),
('201505001','54211',5,NULL,'Lolo Sarido Silalahi','L',NULL,'1997-07-04','','082214647310',NULL,'lolosilalahi@gmail.com','SMAN 1 Cileunyi',2015,'lolunibba','80aedb8b618e1097b64848312cc50979','2015-08-27','2015-08-22','2015-08-27',1,'2015-08-28',1,'BNI',NULL,'201505001.jpeg','Bandung',NULL,8,3,5,6),
('201501007','87202',1,NULL,'mimin','L',NULL,'2015-08-03','08989898989','08989898989',NULL,'dhimas.ef@gmail.com','smk 1 kudus',1992,'mimin','3d22322b211316241cd6e0da39fcf3fa',NULL,'2015-08-28',NULL,0,NULL,0,'',NULL,'201501007.jpeg','kudus',NULL,0,0,0,0),
('201501008','87202',1,NULL,'jancok','L',NULL,'2015-08-28','23-498234','09845034',NULL,'dhimas.ef@gmail.com','smk 1 kudus',1992,'asololea','3d22322b211316241cd6e0da39fcf3fa',NULL,'2015-08-28',NULL,0,NULL,0,'',NULL,'201501008.jpeg','asdasd',NULL,0,0,0,0),
('201508013','55201',8,NULL,'DENI HIDAYAT','L',NULL,'1993-12-16','085721661555','',NULL,'','SMK KP 1 MAJALAYA',2010,'deni.h','e10adc3949ba59abbe56e057f20f883e',NULL,'2015-08-31',NULL,0,NULL,0,'',NULL,'201508013.jpeg','BANDUNG',NULL,1,0,0,0),
('201512006','44201',12,NULL,'rezza regina astiana','P',NULL,'1992-04-04','','089655249495',NULL,'reginarezza.rr@gmail.com','smk pasundan 1 banjaran',0,'regina','ae2021e1aee42b92f868cff16b1b80f3',NULL,'2015-10-07',NULL,0,NULL,0,'',NULL,'201512006.jpeg','bandung',NULL,1,0,0,0),
('201502008','88201',2,NULL,'EKA DESI UTAMI','P',NULL,'1996-12-05','','082216269959',NULL,'eka_desyutami@yahoo.co.id','SMK PASUNDAN 1 BANJARAN',5015,'EKADESIUTAMI','7de161320f808f0743ae0807002f7254',NULL,'2015-10-29',NULL,0,NULL,0,'',NULL,'201502008.jpeg','BANDUNG',NULL,1,0,0,0),
('201504006','87220',4,NULL,'Madani Sulaeman','L',NULL,'1995-08-15','085624020406','',NULL,'','SMA PGRI NARINGGUL',2014,'madanisulaeman@','78917d9522ca00bc7ce2d9eabf4ee287',NULL,'2015-11-03',NULL,0,NULL,0,'',NULL,'201504006.jpeg','cianjur ',NULL,0,0,0,0),
('201511004','65201',11,NULL,'Asepraidafasha','L',NULL,'1971-07-22','','081224524343',NULL,'asepraidafasha@gmail.com','Badak putih cianjur',2012,'aseunibba','e8578652622f459a305aaf3ba0b8b49c',NULL,'2015-11-24',NULL,0,NULL,0,'',NULL,'201511004.jpeg','SUMEDANG',NULL,0,0,0,0),
('201513005','14201',13,NULL,'ikbal hidayat','L',NULL,'1994-09-24','','089698894258',NULL,'ikbalsaybread@gmail.com','smk prakarya internasional',2012,'ikbalhidayat','0d2b0da8c6cf9300c73e37f189e10874',NULL,'2015-12-03',NULL,0,NULL,0,'',NULL,'201513005.jpeg','bandung',NULL,1,0,0,0),
('201506004','54201',6,NULL,'Aris Jun Pariska','L',NULL,'0000-00-00','','083822291226',NULL,'Arisjunpariska@gmail.com','Bit Bina aulia',2014,'aris','6b5843ce9d2d0599c3e3ce6d59c1551f',NULL,'2015-12-04',NULL,0,NULL,0,'',NULL,'201506004.jpeg','Bandung',NULL,6,0,0,0),
('201608014','55201',8,NULL,'DICKY MARSHIDIQ','L',NULL,'1994-03-26','089619573945','089619573945',NULL,'dickymarshidiq@gmail.com','SMKN 2 BALEENDAH',2013,'dicky','c05ca9980215a998578d2683c885b420',NULL,'2016-04-04',NULL,0,NULL,0,'',NULL,'201508014.jpeg','BANDUNG',NULL,0,0,0,0),
('201606005','54201',6,NULL,'aris junpariska','L',NULL,'0000-00-00','083819362716','083819362716',NULL,'','smk bit bina aulia',2014,'arisjunpariska','288077f055be4fadc3804a69422dd4f8',NULL,'2016-04-06',NULL,0,NULL,0,'',NULL,'201506005.jpeg','bandung',NULL,1,0,0,0),
('201605002','54211',5,NULL,'rifqi anjas','L',NULL,'0000-00-00','','087825317168',NULL,'rifky.anjas@gmail.com','sma 1  baleendah ',2012,'rifqi anjas','4d409a250121d1788325fddbfc49b5c7',NULL,'2016-04-14',NULL,0,NULL,0,'',NULL,'201505002.jpeg','bandung',NULL,1,0,0,0),
('201603006','88203',3,NULL,'Faizal Muhammad Rizky','L',NULL,'1998-07-07','','089655954427',NULL,'','MA DAARUL HASAN',2016,'Faizal','a8beabc53321469ad0373a607da25a90',NULL,'2016-04-14',NULL,0,NULL,0,'',NULL,'201503006.jpeg','Bandung',NULL,1,0,0,0),
('201609003','57201',9,NULL,'bebi','P',NULL,'1990-04-14','03135678233','03135678233',NULL,'bebi@ymail.com','sma negeri bale endah',2014,'bebi','f993161a60e8da083489dd05bae25a24','2016-04-14','2016-04-14','2016-04-14',0,NULL,1,'BNI',NULL,'201509003.jpeg','bandung',NULL,10,0,0,0),
('201610009','62201',10,NULL,'Oktaviani rengganis','P',NULL,'1997-01-31','','089636382260',NULL,'Orengganis@gmail.com','MA persis 03 pameungpeuk ',2014,'Oktaviani R','3ea8e23f0ebd1e792a518811c5399e32',NULL,'2016-04-17',NULL,0,NULL,0,'',NULL,'201510009.jpeg','Bandung',NULL,1,0,0,0),
('201606006','54201',6,NULL,'SISKA NURFAUZIYAH','P',NULL,'1997-07-21','-','081214324348',NULL,'siskanurfauziyah@gmail.com','SMK',2016,'siska','589e7c3684bf2f31f5a63f274c434242',NULL,'2016-04-18',NULL,0,NULL,0,'',NULL,'201506006.jpeg','TASIKMALAYA ',NULL,0,0,0,0),
('201606007','54201',6,NULL,'SISKA NURFAUZIYAH','P',NULL,'1997-07-21','-','081214324348',NULL,'siskanurfauziyah@gmail.com','SMK',2016,'sisunibba','3ba0b115777a4b2402daeb73d1e99377',NULL,'2016-04-18',NULL,0,NULL,0,'',NULL,'201506007.jpeg','TASIKMALAYA ',NULL,1,0,0,0),
('201601001','87202',1,NULL,'tomer','L',NULL,'2016-04-06','02111111111','081988888888',NULL,'','sma n 1 formulir data',2222,'tomer123','4693fbb215b8ca15a6900f0cfa164cdc','2016-04-13','2016-04-24','2016-04-24',0,NULL,1,'bri',NULL,'201601001.jpeg','vvvvvv',NULL,4,0,0,0),
('201601002','87202',1,NULL,'a','L',NULL,'2016-04-08','02111111111','081988888888',NULL,'','sma n 1 formulir data',2222,'ridwan123','4693fbb215b8ca15a6900f0cfa164cdc',NULL,'2016-04-24',NULL,0,NULL,0,NULL,NULL,'201601002.jpeg','a',NULL,NULL,0,0,0),
('201609002','57201',9,NULL,'MEGANTARI SUHENDAR','P',NULL,'1994-07-11','','082112337344',NULL,'megantari.s@outlook.com','SMA PGRI 31 PANGALENGAN',2011,'megunibba','53059ca4ce8b06c549ddabad381cf8c1','2016-05-07','2016-04-28','2016-05-07',1,'2016-07-27',1,'BANG BJB',NULL,'201609002.jpeg','BANDUNG',NULL,33,2,6,0),
('201606004','54201',6,NULL,'RISMAYANTI','P',NULL,'1998-03-27','087828642936',' -',NULL,' -','SMAN 1 TUKDANA',2015,'endunibba','5711ea86d05dc0b5b19a146ab3ef4cd6',NULL,'2016-04-29',NULL,0,NULL,0,NULL,NULL,'201606004.jpeg','INDRAMAYU',NULL,NULL,0,0,0),
('201604001','87220',4,NULL,'KURNIAWAN','L',NULL,'0000-00-00','','087825825371',NULL,'kwan7859@gmail.com','SMUN CILILIN',2003,'kurunibba','4d17046292295b2403ff95beda5a7390','2016-04-30','2016-04-30','2016-04-30',1,'2016-07-27',1,'BCA',NULL,'201604001.jpeg','BANDUNG',NULL,36,2,7,6),
('201603002','88203',3,NULL,'FAIZAL MUHAMMAD RIZKY','L',NULL,'1998-07-07','089655954427','',NULL,'encangsurseyuw01@gmail.com','MA DAARUL HASAN',2016,'faizal07','a8beabc53321469ad0373a607da25a90',NULL,'2016-05-04',NULL,0,NULL,0,NULL,NULL,'201603002.jpeg','Bandung',NULL,1,0,0,0),
('201602001','88201',2,NULL,'Tati Nurhayati','P',NULL,'0000-00-00','+62 858-7129-37','+62 858-7129-37',NULL,'081220649375','SMAN 2 MAJALAYA',2016,'nuy puttri','da9509467c8fc1ee6172853649adabea',NULL,'2016-05-09',NULL,0,NULL,0,NULL,NULL,'201602001.jpeg','Bandung',NULL,3,0,0,0),
('201602002','88201',2,NULL,'Tati Nurhayati','P',NULL,'1997-02-12','+62 858-7129-37','+62 858-7129-37',NULL,'081220649375','SMAN 2 MAJALAYA',2016,'nuy  puttri','da9509467c8fc1ee6172853649adabea',NULL,'2016-05-09',NULL,0,NULL,0,NULL,NULL,'201602002.jpeg','Bandung',NULL,NULL,0,0,0),
('201610002','62201',10,NULL,'Prida Aprilia','P',NULL,'1998-04-19','','085320386970',NULL,'paprilia06@gmail.com','sma negeri 1 ciparay',2016,'pridaaprilia','e52bb2efb97a90dedbaf09718eb5b4bd',NULL,'2016-05-10',NULL,0,NULL,0,NULL,NULL,'201610002.jpeg','Bandung',NULL,NULL,0,0,0),
('201610003','62201',10,NULL,'Endang Rutini','P',NULL,'1997-06-19','','089666410865',NULL,'endang.rutini@gmail.com','smk yp 79 majalaya',2016,'endang rutini','e46663385588415d38844a3822c54c2b','2016-05-10','2016-05-10','2016-05-10',0,NULL,1,'bni',NULL,'201610003.jpeg','bandung',NULL,2,0,0,0),
('201608002','55201',8,NULL,'Karinda Larasati','P',NULL,'1997-04-03','085799694990','',NULL,'','MAN 2 Banjarnegara',2015,'karunibba','efa10073f6786102d1352b07f20054ff','2016-05-16','2016-05-11','2016-05-18',1,'2016-07-27',1,'BNI',NULL,'201608002.jpeg','Banjarnegara',NULL,14,2,5,0),
('201602003','88201',2,NULL,'Lyla Ginanti Gunawan','P',NULL,'1997-08-26','','085224320375',NULL,'lilaginanti@yahoo.co.id','Sma Negeri 1 Ciparay',2014,'Lyla Ginanti G','a60ef67a0fbb3877f1ce7effe6398531','0000-00-00','2016-05-19','2016-05-20',0,NULL,1,'BNI',NULL,'201602003.jpeg','Bandung',NULL,14,0,0,0),
('201602004','88201',2,NULL,'ANISA DWI RAHAYU','P',NULL,'1997-08-27','-','089678019856',NULL,'anisadwirahayu88@yahoo.com','SMA KARYA PEMBANGUNAN 1 CIPARA',2015,'aniunibba','daf116d18d6adb0abbb23d660b3e4afa',NULL,'2016-05-22',NULL,0,NULL,0,NULL,NULL,'201602004.jpeg','BANDUNG',NULL,4,0,0,0),
('201611001','65201',11,NULL,'ASEP RAHMAT JATNIKA','L',NULL,'1989-02-07','','085795181212',NULL,'asepjatnika@hotmail.com','SMAN 1 BANJARAN',2007,'arjatnika','60830f679083cd1bee398dacbbe03cb7',NULL,'2016-05-27',NULL,0,NULL,0,NULL,NULL,'201611001.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201601003','87202',1,NULL,'Risna Aryanti','P',NULL,'0000-00-00','083822386251','',NULL,'','SMK N 5 OANGALENGAN',2016,'Risna aryanti','e17dfc96f8776b9581cf82f95f2b53bc',NULL,'2016-06-05',NULL,0,NULL,0,NULL,NULL,'201601003.jpeg','Bandung',NULL,NULL,0,0,0),
('201602005','88201',2,NULL,'Guruh Gustian','L',NULL,'1997-08-25','083820404997','082216906293',NULL,'Guruhgus@yahoo.com','SMA YPPI BALEENDAH',2015,'Guruhgustian','a283df915eb504c19c2fda54edfc8bcd',NULL,'2016-06-13',NULL,0,NULL,0,NULL,NULL,'201602005.jpeg','Bandung',NULL,NULL,0,0,0),
('201608003','55201',8,NULL,'enep syamsuein','L',NULL,'1995-12-07','083821207041','083821207041',NULL,'enep.syamsudin@yahoo.com','smk aloer wargakusumah',2014,'enep syamsudin','f26e3981ff6a0410598084aa44eb8a11',NULL,'2016-06-17',NULL,0,NULL,0,NULL,NULL,'201608003.jpeg','bandung',NULL,2,0,0,0),
('201604002','87220',4,NULL,'Yuni Andini','P',NULL,'1996-07-03','','083820773929',NULL,'andiniyuni69@gmail.com','MA ARAFAH CILILIN',2014,'yuniandini','907b47aa8ac538417caaf63fc30b6de1','2016-06-28','2016-06-21','2016-06-29',1,'2016-07-27',1,'BNI',NULL,'201604002.jpeg','Bandung',NULL,15,2,4,0),
('201612001','44201',12,NULL,'Sahrul Saadudin','L',NULL,'1996-03-26','','083822066620',NULL,'Sahrul.saadudin@gmail.com','MA ARAFAH CILILIN',2015,'sahrulsaadudin','e3edd7b2916e07e43d4d697582f90028','2016-06-28','2016-06-21','2016-06-29',1,'2016-07-27',1,'BNI',NULL,'201612001.jpeg','Ciamis',NULL,6,2,3,0),
('201603003','88203',3,NULL,'Mayang Asri','P',NULL,'0000-00-00','-','08998538022',NULL,'','SMA',2015,'mayangkhan20@gm','f34e7461f33c249858ef3b025a59e8cc',NULL,'2016-06-27',NULL,0,NULL,0,NULL,NULL,'201603003.jpeg','Garut',NULL,NULL,0,0,0),
('201603004','88203',3,NULL,'Fanny Restu Pratiwi','P',NULL,'1998-10-01','','085222910848',NULL,'manuarr@yahoo.com','MA Ishlahul Amanah',2016,'manuarr','5e718b84aa643db62e50bfa8f30de6b8',NULL,'2016-06-28',NULL,0,NULL,0,NULL,NULL,'201603004.jpeg','Bandung',NULL,NULL,0,0,0),
('201613001','14201',13,NULL,'RIKE ADELIA HERMAWAN','P',NULL,'1998-08-31','089640258019','089640258019',NULL,'rikeadeliah@gmail.com','MAN Majalaya',2016,'Rike Adelia H','a7777999e260290f68a1455cacdabf6c',NULL,'2016-06-28',NULL,0,NULL,0,NULL,NULL,'201613001.jpeg','Bandung',NULL,1,0,0,0),
('201603005','88203',3,NULL,'Chantika Nabila','P',NULL,'1998-04-27','','089630706025',NULL,'Chantikanachan@gmail.com','SMK ITIKURIH HIBARNA',2016,'Chantikan','dd398b3adc599139e6987ba3cad2a4db',NULL,'2016-06-29',NULL,0,NULL,0,NULL,NULL,'201603005.jpeg','Bandung',NULL,1,0,0,0),
('201608004','55201',8,NULL,'Mia Nurul Fauziah','P',NULL,'1998-05-17','','08966938050',NULL,'','SMA KP 2 CIPARAY',2016,'mianurulfauziah','cab9dcd8e8b94b9b6f031e5ac7dfb453',NULL,'2016-07-01',NULL,0,NULL,0,NULL,NULL,'201608004.jpeg','bandung',NULL,1,0,0,0),
('201608005','55201',8,NULL,'Yogaswara Rabbani','L',NULL,'1998-11-21','083822442113','',NULL,'','Smkn 1 majalaya',2016,'YogaswaraR','3df462ba26f5284efcbed1e7b9db504b','0000-00-00','2016-07-02','2016-07-02',0,NULL,1,'BNI',NULL,'201608005.jpeg','Bandung',NULL,8,0,0,0),
('201608006','55201',8,NULL,'Yogaswara Rabbani','L',NULL,'1998-11-21','083822324931','083822324931',NULL,'','Smkn 1 majalaya',2016,'Yogaunibba','d68d7bfd46a735ce9a4b6e930ddd2d4f','0000-00-00','2016-07-04','2016-07-04',0,NULL,1,'BNI',NULL,'201608006.jpeg','Bandung',NULL,4,0,0,0),
('201608007','55201',8,NULL,'Yogaswara Rabbani','L',NULL,'1998-11-21','083822324931','083822324931',NULL,'','Smkn 1 majalaya',2016,'Yogasunibba','d68d7bfd46a735ce9a4b6e930ddd2d4f','0000-00-00','2016-07-04','2016-07-04',0,NULL,1,'ATM BNI Borma Majalaya',NULL,'201608007.jpeg','Bandung',NULL,4,0,0,0),
('201601004','87202',1,NULL,'acep indra a','L',NULL,'1999-04-27','083820658769','',NULL,'referendum@gmail.com','sma n 2 majalaya',2016,'acepindra','9b91f7fd370faa644266a648751e33f4',NULL,'2016-07-09',NULL,0,NULL,0,NULL,NULL,'201601004.jpeg','bandung',NULL,1,0,0,0),
('201601005','87202',1,NULL,'indah permata sari','P',NULL,'0000-00-00','0895338979379','0895332041255',NULL,'samharojan96@yahoo.com','sman 18 bekasi',2016,'indahps','6531401f9a6807306651b87e44c05751',NULL,'2016-07-13',NULL,0,NULL,0,NULL,NULL,'201601005.jpeg','bekasi',NULL,2,0,0,0),
('201612002','44201',12,NULL,'rafian maulana yusuf','L',NULL,'1996-02-22','085694978967','',NULL,'arielmaulanaaja@gmail.com','sma n 1 candiroto',2013,'rafian','efb176c46afce3d093639a17748c19d3',NULL,'2016-07-14',NULL,0,NULL,0,NULL,NULL,'201612002.jpeg','temanggung',NULL,NULL,0,0,0),
('201611002','65201',11,NULL,'iyan sugianto','L',NULL,'1979-11-30','085861939700','085320109339',NULL,'yancell007.yc.@gmail.com','smkn6 bandung',1998,'yancell','5ef0ac341af37df62735d844fe86b8f2',NULL,'2016-07-15',NULL,0,NULL,0,NULL,NULL,'201611002.jpeg','bandung',NULL,NULL,0,0,0),
('201611003','65201',11,NULL,'WAHID NUR ABDULOH','L',NULL,'0000-00-00','082295380001','082295380001',NULL,'','SMA TERPADU DARUSSALAM',2015,'wahidnurabdulla','4eebaf9774337f9cd752721bf43becb9',NULL,'2016-07-19',NULL,0,NULL,0,NULL,NULL,'201611003.jpeg','TASIKMALAYA',NULL,NULL,0,0,0),
('201610004','62201',10,NULL,'Lya Herlianti ','P',NULL,'1997-08-01','085316720832','',NULL,'','SMAN 1 Pangalengan',2016,'Lyaunibba','a07fa83c3e2961539242b745433a7eb0','2016-07-19','2016-07-19','2016-07-19',1,'2016-07-27',1,'Mandiri',NULL,'201610004.jpeg','Bandung',NULL,17,2,2,5),
('201602006','88201',2,NULL,'NISA ANNISA ROHMAH','P',NULL,'1997-07-28','083822660132','083822660132',NULL,'nisaannisar01@gmail.com','SMAN 1 MAJALAYA',2016,'NISAANNISAR','d10c69630fc343ab7dc8ee124ee115a5',NULL,'2016-07-22',NULL,0,NULL,0,NULL,NULL,'201602006.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201608008','55201',8,NULL,'M Rio Prayoga','L',NULL,'1998-03-26','-','089694043124',NULL,'m.rioprayoga914@yahoo.com','SMK N 3 Sekayu',2016,'mrioprayoga','6ae76493dfce2aaf0e2b309a3632d67e','2016-07-31','2016-07-23','2016-07-23',0,NULL,1,'BRI',NULL,'201608008.jpeg','Sekayu',NULL,2,0,0,0),
('201602007','88201',2,NULL,'SETYO IRWANTO','L',NULL,'1997-01-15','','089630500227',NULL,'SETYOIRWANTO33','SMA N 1 KARANGKOBAR',2014,'SETYOIRWANTO33','7f3976680a821e0ddb8a6b4e312bbcc0',NULL,'2016-07-25',NULL,0,NULL,0,NULL,NULL,'201602007.jpeg','BANJARNEGARA',NULL,3,0,0,0),
('201607001','41221',7,NULL,'VIDA ADLIA KURNIASARI','P',NULL,'1997-09-11','7505580','089658568952',NULL,'','MAS PERSIS RANCABAGO GARUT',2016,'Vida adlia','f5fd85dae217219682038b8fb03dc2ba',NULL,'2016-07-26',NULL,0,NULL,0,NULL,NULL,'201607001.jpeg','Bandung',NULL,NULL,0,0,0),
('201701001','87202',1,NULL,'Nanda Rizky Alfianty','P',NULL,'0000-00-00','','083827693242',NULL,'nandarizkyalfianty@yahoo.com','',2021,'nandaalfianty','9f4faa71693584da6d77a071f95cd75d',NULL,'2017-04-17',NULL,0,NULL,0,NULL,NULL,'201701001.jpeg','Jakarta',NULL,NULL,0,0,0),
('201604003','87220',4,NULL,'Muhammad Iqbal Zakaria','L',NULL,'1997-04-25','','085294070703',NULL,'muhamadiqbalzakaria@gmail.com','SMK N 1 Cihampelas',2015,'iqbunibba','2dbcfc7b4a59b1e4647e2820cd380e44',NULL,'2016-07-28',NULL,0,NULL,0,NULL,NULL,'201604003.jpeg','Bandung',NULL,1,0,0,0),
('201608009','55201',8,NULL,'Ai Santi','P',NULL,'1999-07-01','083820338251','',NULL,'aisanti39@gmail.com','SMK PUTRA GUNUNGHALU',2016,'Ai Santi','827ccb0eea8a706c4c34a16891f84e7b','2016-08-01','2016-08-01','2016-08-01',0,NULL,1,'BRI',NULL,'201608009.jpeg','Bandung',NULL,4,0,0,0),
('201608010','55201',8,NULL,'Ai Santi','P',NULL,'1999-07-01','','083820338251',NULL,'aisanti39@gmail.com','SMK PUTRA GUNUNGHALU',2016,'UNIBBA','e10adc3949ba59abbe56e057f20f883e','2016-08-01','2016-08-01','2016-08-01',0,NULL,1,'BRI',NULL,'201608010.jpeg','Bandung',NULL,8,0,0,0),
('201612004','44201',12,NULL,'Ashyfa Mulyawati','P',NULL,'1997-02-19','085721240476','',NULL,'','SMA Sapta Dharma',2015,'ashyfamulya@gma','4ff23241dff9502421168d9b960697fb',NULL,'2016-08-02',NULL,0,NULL,0,NULL,NULL,'201612004.jpeg','bandung',NULL,NULL,0,0,0),
('201601006','87202',1,NULL,'Yogi ginanjar','L',NULL,'1997-10-22','083821696586','',NULL,'','SMA Negeri 1 Banjaran ',2016,'Yogunibba','74b933271fdb753d4d72466698055611','2016-08-05','2016-08-04','2016-08-05',0,NULL,1,'BRI atas nama Rangga Yusman',NULL,'201601006.jpeg','Bandung',NULL,11,0,0,0),
('201601007','87202',1,NULL,'Yogi ginanjar','L',NULL,'1997-10-22','083821696586','',NULL,'','SMA N 1 Banjaran',2016,'Yogiunniba','5985dc64a4ac105a3b5cfbbe5a31303f','2016-08-05','2016-08-08','2016-08-08',0,NULL,1,'Rangga Yusman ',NULL,'201601007.jpeg','Bandung',NULL,6,0,0,0),
('201612005','44201',12,NULL,'HERA KUSMEILASARI','L',NULL,'2016-05-20','','081223010204',NULL,'','SMAN 1 MAJALAYA',2010,'hera20','52b29e1aa20c034dcec6015865e269df',NULL,'2016-08-11',NULL,0,NULL,0,NULL,NULL,'201612005.jpeg','BANDAR LAMPUNG',NULL,1,0,0,0),
('201607002','41221',7,NULL,'Winda Anggraeni','P',NULL,'1998-04-14','09871738810','',NULL,'windaanggraeniputri@gmail.com','MAS Serba Bakti Suryalaya',2016,'windaanggraenip','1fbc8847fef24cd50881b865892b4ae4',NULL,'2016-08-12',NULL,0,NULL,0,NULL,NULL,'201607002.jpeg','Bandung',NULL,NULL,0,0,0),
('201607003','41221',7,NULL,'Winda Anggraeni','P',NULL,'1998-04-14','','08971738810',NULL,'windaanggraeniputri@gmail.comw','MAS Serba Bakti Suryalaya',2016,'winunibba','72062aeaa2821f583e6da27722535125',NULL,'2016-08-12',NULL,0,NULL,0,NULL,NULL,'201607003.jpeg','Bandung',NULL,2,0,0,0),
('201601008','87202',1,NULL,'Handri nursyarippudin','L',NULL,'1997-05-24','083820921269','',NULL,'handrinursyarippudin@ymail.com','smkn 3 balaendah',2015,'handri n.s','379f28ee5e6e354855d6c346826cc4c7',NULL,'2016-08-12',NULL,0,NULL,0,NULL,NULL,'201601008.jpeg','bandung',NULL,2,0,0,0),
('201602008','88201',2,NULL,'Anggi Wiliyam ','L',NULL,'1994-11-30','','085798508230',NULL,'anggiwiliyam@gmail.com','SMK NEGERI 1 MAJALAYA ',2012,'anggi wiliyam ','68ddf2e741c2525029a5edc21a6c9561',NULL,'2016-08-19',NULL,0,NULL,0,NULL,NULL,'201602008.jpeg','Kebumen ',NULL,NULL,0,0,0),
('201602009','88201',2,NULL,'Fiki Fauzi ','L',NULL,'1994-10-08','','0895800173308',NULL,'otingseel123@gmail.com','SMK KARYA PEMBANGUNAN 1 MAJALA',2012,'fiki fauzi ','0bfccbdaef14ce9fd38711b8cdecc35b',NULL,'2016-08-19',NULL,0,NULL,0,NULL,NULL,'201602009.jpeg','Bandung ',NULL,NULL,0,0,0),
('201608011','55201',8,NULL,'Nadya Nur Auliaunnisa','P',NULL,'1997-12-06','','085624893795',NULL,'ilzafh7@gmail.com','SMKN 1 Majalaya',2016,'nadunibba','53d0e82fd54aa73ffa72d8fdec52fc5e','2016-08-23','2016-08-23','2016-08-23',0,NULL,1,'BANK RAKYAT INDONESIA',NULL,'201608011.jpeg','Bandung',NULL,10,0,0,0),
('201608012','55201',8,NULL,'Ilza Fadilatul Haq','L',NULL,'1998-05-02','','08121405411',NULL,'ilzafh7@gmail.com','SMKN 1 Majalaya',2016,'ilzunibba','e6dd1492017726ec2cb795e67a7eb4d5','2016-08-23','2016-08-23','2016-08-23',0,NULL,1,'BANK RAKYAT INDONESIA',NULL,'201608012.jpeg','Bandung',NULL,4,0,0,0),
('201608013','55201',8,NULL,'asep nanang r','L',NULL,'0000-00-00','','083821300376',NULL,'jhantha.aznank@gmail.com','pkbm cipta mandiri',2013,'asn','b2873c28df2e98b9f30db4c6f7bce100',NULL,'2016-08-27',NULL,0,NULL,0,NULL,NULL,'201608013.jpeg','bandung',NULL,NULL,0,0,0),
('201704001','87220',4,NULL,'ILHAM MAULANA','L',NULL,'1994-09-02','','081322597931',NULL,'imaulana199@gmail.com','SMK HARAPAN 2 RANCAEKEK',2012,'Ilham Maulana','02281fb907c5bf3148b26f11eb37107a',NULL,'2017-03-01',NULL,0,NULL,0,NULL,NULL,'201704001.jpeg','BANDUNG',NULL,1,0,0,0),
('201711001','65201',11,NULL,'Indri susanti dewi','P',NULL,'0000-00-00','081220585591','',NULL,'','SMAN 1 PANGALENGAN',2009,'Indrisusanti','ee3c03ef2f5564f199013dabc0eb0f7a',NULL,'2017-03-06',NULL,0,NULL,0,NULL,NULL,'201711001.jpeg','Bandung',NULL,2,0,0,0),
('201706001','54201',6,NULL,'Muahamad danu cesa','L',NULL,'1998-09-30','088210563236','088210563236',NULL,'mdanusesa@gmail.com','SMA NEGERI 2 GUNUNG PUTRI',2017,'danusesa','bd28c1b3e732699541b5b13c9d0ab578',NULL,'2017-03-17',NULL,0,NULL,0,NULL,NULL,'201706001.jpeg','brebes',NULL,1,0,0,0),
('201706002','54201',6,NULL,'Elpa Maindri','P',NULL,'1999-05-24','','081528735797',NULL,'maindrielpa@gmail.com','SMKN 1 Ella Hilir',2017,'elpa maindri','6617b5fe761218aa1c839d1625836acd',NULL,'2017-04-02',NULL,0,NULL,0,NULL,NULL,'201706002.jpeg','Ella Hilir',NULL,NULL,0,0,0),
('201710001','62201',10,NULL,'emma rosaliah rahmatunnisa','P',NULL,'1996-07-28','0225944727','081312824341',NULL,'emmarosaliah96.er@gmail.com','sman 1 banjaran',2014,'emmarosa','dcdb3e1d86951f843a1e0c24acadf8ad',NULL,'2017-04-04',NULL,0,NULL,0,NULL,NULL,'201710001.jpeg','bandung',NULL,NULL,0,0,0),
('201702001','88201',2,NULL,'NAI ASTI INDRIANI','P',NULL,'1996-09-17','085222299661','085222299661',NULL,'nai.asti.indriani@gmail.com','SMAN 23 GARUT',2015,'naiasti','528e668fcb0d9694c33ccb86d3c1ed7c','2017-04-06','2017-04-06','2017-04-06',1,'2017-04-13',1,'MANDIRI A.N SETIYO WIDAYAT',NULL,'201702001.jpeg','GARUT',NULL,6,1,3,0),
('201710002','62201',10,NULL,'RISMA ROBIATUS SAIDAH','P',NULL,'0000-00-00','085222219473','',NULL,'','SMA N 2 MAJALAYA',2017,'rismarobiatus@y','ada13fdcea33c5eec42ff32e68c021b8',NULL,'2017-04-07',NULL,0,NULL,0,NULL,NULL,'201710002.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201710003','62201',10,NULL,'Fadil Maulana Fajri','L',NULL,'1998-06-21','','083821766309',NULL,'fadilmaulanafajri@gmail.com','MA AL-JAUHARI',2016,'fadunibba','a209997b754c1ff022a0ed011f5df49e',NULL,'2017-04-07',NULL,0,NULL,0,NULL,NULL,'201710003.jpeg','Bandung',NULL,15,0,0,0),
('201706003','54201',6,NULL,'SYIFA SYAILA ASKA ','P',NULL,'1999-06-19','','082210092709',NULL,'syifasyailaf@gmail.com','SMAN 1 CIKARANG UTARA',2017,'syifasyailaa','21224ee77157bf0306ddf5d58444b7a3',NULL,'2017-04-20',NULL,0,NULL,0,NULL,NULL,'201706003.jpeg','BEKASI',NULL,1,0,0,0),
('201704002','87220',4,NULL,'SITI NURHALIMAH','P',NULL,'1999-08-10','','081313012661',NULL,'kwan7859@gmail.com','SMA DARUL FALAH',2017,'situnibba','d418ae20f33b3b70dfcd637d74f69a7e',NULL,'2017-04-23',NULL,0,NULL,0,NULL,NULL,'201704002.jpeg','BANDUNG',NULL,1,0,0,0),
('201713001','14201',13,NULL,'Rema safitri','P',NULL,'1999-01-18','08158782137','089620978455',NULL,'Mremasafitri@yahoo.com','SMK Kesehatan Atlantis Plus',2017,'Rere18rs','0f092dd6c2a9ef476b0df70049669bfa',NULL,'2017-04-26',NULL,0,NULL,0,NULL,NULL,'201713001.jpeg','Indramayu',NULL,1,0,0,0),
('201713002','14201',13,NULL,'Nida Riska Aulya Hanifah','P',NULL,'1999-05-01','-','085222260169',NULL,'nidariska01@gmail.com','SMK YPIB SUBANG',2017,'Nida riska','b824dc520bb01f5eae671f9cccc5c5c6',NULL,'2017-04-26',NULL,0,NULL,0,NULL,NULL,'201713002.jpeg','Subang',NULL,NULL,0,0,0),
('201706004','54201',6,NULL,'SYIFA SYAILA ASKA','P',NULL,'1999-06-19','','082210092709',NULL,'syifasyailaf@gmail.com','SMAN 1 CIKARANG UTARA',2017,'syifasyl','cf0bfe1e9e7ed68188201b58e3160cee',NULL,'2017-04-26',NULL,0,NULL,0,NULL,NULL,'201706004.jpeg','BEKASI',NULL,1,0,0,0),
('201705001','54211',5,NULL,'CLARISA RIZQIA SYAFIRA','P',NULL,'1999-02-10','-','083820724288',NULL,'','MAS AL-FATAH',2017,'Claunibba','f1f29089650a30cb54eaba03bc263516',NULL,'2017-04-27',NULL,0,NULL,0,NULL,NULL,'201705001.jpeg','Bandung',NULL,1,0,0,0),
('201703001','88203',3,NULL,'yuni sara','P',NULL,'0000-00-00','','085659904766',NULL,'saryuni858@gmail.com','SMAN 1 CIRACAP',2017,'YUNI SARA','91239897c4d52b0389c6f383d8db75b2',NULL,'2017-05-02',NULL,0,NULL,0,NULL,NULL,'201703001.jpeg','sukabumi',NULL,NULL,0,0,0),
('201713003','14201',13,NULL,'Zul Andrivat','L',NULL,'1999-04-22','089684444508','089684444508',NULL,'','MAN CIPARAY',2017,'Zulandrivat','57c8d109a93da8997f58510dd07d0dab',NULL,'2017-05-02',NULL,0,NULL,0,NULL,NULL,'201713003.jpeg','Bandung',NULL,NULL,0,0,0),
('201713004','14201',13,NULL,'Priska pebriyani','P',NULL,'1999-02-07','089660809188','',NULL,'','Smk bhakti husada kuningan',2017,'Priunibba','5902a5d82536128a1e64c5b26949dbb1',NULL,'2017-05-03',NULL,0,NULL,0,NULL,NULL,'201713004.jpeg','Kuningan',NULL,NULL,0,0,0),
('201708001','55201',8,NULL,'RIAN ARDINSAH','L',NULL,'1998-06-27','','085294167454',NULL,'rianardian258@gmail.com','MAS. AL-HOLILIYAH',2016,'riaunibba','0f51d4ff25a4e9f27fd1b75ee8ad386a','2017-05-04','2017-05-03','2017-05-04',1,'2017-06-14',1,'Bank BRI Unit Cidaun',NULL,'201708001.jpeg','CIANJUR',NULL,22,2,9,0),
('201708002','55201',8,NULL,'Riky Saputra','L',NULL,'1999-06-10','','089678846333',NULL,'rikysaputra133@gmail.com','Smk Negeri 1 Garut',2017,'rikysaputra','41314fdcf9420ce22a54b09776436a8b',NULL,'2017-05-04',NULL,0,NULL,0,NULL,NULL,'201708002.jpeg','Garut',NULL,NULL,0,0,0),
('201703002','88203',3,NULL,'YULI YANTI','P',NULL,'1998-06-13','','083822110014',NULL,'yyuli8124@gmail.com','SMK AL_AMAH CIMANGGUNG',2017,'K02251760347','06289debbbd808f9bb49aae7715ec4df',NULL,'2017-05-04',NULL,0,NULL,0,NULL,NULL,'201703002.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201713005','14201',13,NULL,'Mira Rizqia','P',NULL,'0000-00-00','081314520016','',NULL,'','Smk bhakti kencana bandung',2017,'Mira Rizqia','8777fc5a5137a3a0ddfa21863ef32dce',NULL,'2017-05-08',NULL,0,NULL,0,NULL,NULL,'201713005.jpeg','Bandung',NULL,NULL,0,0,0),
('201703003','88203',3,NULL,'Faisal Chaerul Rizal','L',NULL,'1989-07-08','','082216388076',NULL,'faisalc.rizal@gmail.com','SMA PKBM TARAKAN',2011,'faisalcrizal','a28de595c6655a1bdee7e95ed502ef93',NULL,'2017-05-09',NULL,0,NULL,0,NULL,NULL,'201703003.jpeg','Bandung',NULL,NULL,0,0,0),
('201702002','88201',2,NULL,'IQBAL MAULANA YUSUF','L',NULL,'2017-05-31','085795555658','',NULL,'iqbalmaulana6983@gmail.com','SMA N 1 CIKANCUNG',2012,'IQBAL6983','415c3e8d557775e37803ceca69a4312e',NULL,'2017-05-10',NULL,0,NULL,0,NULL,NULL,'201702002.jpeg','BANDUNG',NULL,1,0,0,0),
('201711002','65201',11,NULL,'ASEP SUTISNA','L',NULL,'0000-00-00','','082217365367',NULL,'sutisnaa606@gmail.com','MA AL-MANSHURIYAH',2014,'utiunibba','c9bbf38fc16f555fe8942f2f747269be',NULL,'2017-05-12',NULL,0,NULL,0,NULL,NULL,'201711002.jpeg','CIANJUR',NULL,4,0,0,0),
('201711003','65201',11,NULL,'ASEP SUTISNA','L',NULL,'1995-12-12','','082217365367',NULL,'asepsutisna1995@gmail.com','MA AL-MANSHURIYAH',2014,'sutunibba','ec78e095bed4b46b9a9a4e3b4f61f094','2017-05-14','2017-05-12','2017-05-12',1,'2017-06-14',1,'BJB KCP CIHAMPELAS',NULL,'201711003.jpeg','CIANJUR',NULL,5,2,8,0),
('201711004','65201',11,NULL,'Raden ridwan samsudin','L',NULL,'1993-12-19','08994146917','',NULL,'','SMA MUHAMMADIYAH 3 CIPARAY',2012,'Ridwan ','1a9644ccd8c0ecdc14c884b19bef1d0d',NULL,'2017-05-16',NULL,0,NULL,0,NULL,NULL,'201711004.jpeg','Bandung',NULL,NULL,0,0,0),
('201711005','65201',11,NULL,'Raden ridwan samsudin','L',NULL,'1993-12-19','08994146917','',NULL,'','SMA MUHAMMADIYAH 3 CIPARAY',2012,'Raden','1a9644ccd8c0ecdc14c884b19bef1d0d',NULL,'2017-05-17',NULL,0,NULL,0,NULL,NULL,'201711005.jpeg','Bandung',NULL,1,0,0,0),
('201711006','65201',11,NULL,'Raden ridwan samsudin','L',NULL,'1993-12-19','08994146917','',NULL,'','SMA MUHAMMADIYAH 3 CIPARAY',2012,'Ridunibba','64a0aa58f6ec316f0fac7f1ed15c5124',NULL,'2017-05-17',NULL,0,NULL,0,NULL,NULL,'201711006.jpeg','Bandung',NULL,NULL,0,0,0),
('201711007','65201',11,NULL,'Raden ridwan samsudin','L',NULL,'1993-12-19','08994146917','',NULL,'','SMA MUHAMMADIYAH 3 CIPARAY',2012,'Radunibba','69ff02b17d4a9813daf15aec9c6e0997',NULL,'2017-05-17',NULL,0,NULL,0,NULL,NULL,'201711007.jpeg','Bandung',NULL,1,0,0,0),
('201702003','88201',2,NULL,'MILA PUSPITA','P',NULL,'1998-02-15','','082218449101',NULL,'milapuspita38@gmail.com','SMKN 5 PANGALENGAN',2016,'MILA PUSPITA','578051a4f5acdcc065adcd879e320a2b',NULL,'2017-05-18',NULL,0,NULL,0,NULL,NULL,'201702003.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201710004','62201',10,NULL,'Rita herawati','P',NULL,'0000-00-00','','085794489346',NULL,'rita9bherawati@gmail.com','MAN majalaya',2016,'ritaherawati','097f69b7a8631514f628556e5d0715dc',NULL,'2017-05-27',NULL,0,NULL,0,NULL,NULL,'201710004.jpeg','bandung',NULL,NULL,0,0,0),
('201710005','62201',10,NULL,'Rita herawati','P',NULL,'0000-00-00','085794489346','',NULL,'','man majalaya',2016,'rita9bherawati','c6dbc228833c2c5a66b7c3263eb383c1',NULL,'2017-05-27',NULL,0,NULL,0,NULL,NULL,'201710005.jpeg','bandung',NULL,1,0,0,0),
('201702004','88201',2,NULL,'Shoumi Tazkiyyatun Nafsi','P',NULL,'1999-12-06','083824901113','083824901113',NULL,'Shoumitnafsi@gmail.com','SMAN 1 BABAKAN CIREBON',2017,'Shoumi','9b7d78b6ac6db3f2823fbf75b5cbf1a7',NULL,'2017-05-28',NULL,0,NULL,0,NULL,NULL,'201702004.jpeg','Cirebon',NULL,12,0,0,0),
('201713006','14201',13,NULL,'Sintia Gita Hidayati','P',NULL,'1999-03-12','085624023653','',NULL,'sintiagita1203@gmail.com','SMK Al-Wafa Farmasi',2017,'sintiagita','49f464fd8f087c2ace3762aaa9762011',NULL,'2017-06-02',NULL,0,NULL,0,NULL,NULL,'201713006.jpeg','Bandung',NULL,NULL,0,0,0),
('201704003','87220',4,NULL,'Didin Nurdin','L',NULL,'1992-01-18','','085880898049',NULL,'endinn09@gmail.com','AL-FURQON',2010,'Didin Nurdin','731982a033a5cc815ac03c8504abb748',NULL,'2017-06-03',NULL,0,NULL,0,NULL,NULL,'201704003.jpeg','Garut',NULL,NULL,0,0,0),
('201713007','14201',13,NULL,'Mita Wulandari','P',NULL,'0000-00-00','089504060289','',NULL,'','SMA PASUNDAN BANJARAN',2017,'Mitawulandari20','308f4cd6143b1c9ab54d3f39ab739b9b',NULL,'2017-06-07',NULL,0,NULL,0,NULL,NULL,'201713007.jpeg','Bandung',NULL,1,0,0,0),
('201710006','62201',10,NULL,'rita herawati','P',NULL,'1998-05-20','085794489346','',NULL,'','MAN majalaya',2016,'ritaherawati20','84787564d260291d76b91e58bfbd8acf',NULL,'2017-06-10',NULL,0,NULL,0,NULL,NULL,'201710006.jpeg','bandung',NULL,2,0,0,0),
('201706005','54201',6,NULL,'syifa syaila aska','P',NULL,'1999-06-19','082210092709','082210092709',NULL,'syifasyailaf@gmail.com','SMAN 1 CIKARANG UTARA',2017,'syifasa','21224ee77157bf0306ddf5d58444b7a3',NULL,'2017-06-10',NULL,0,NULL,0,NULL,NULL,'201706005.jpeg','bekasi',NULL,NULL,0,0,0),
('201711008','65201',11,NULL,'YAURI DWI ARVIANDI','L',NULL,'1997-12-18','','083821899229',NULL,'arviandiyauridwi@yahoo.com','SMAN 1 CISARUA ',2017,'yauridwia','e468e2ee17dac9d6fbd4b68663914fff',NULL,'2017-06-14',NULL,0,NULL,0,NULL,NULL,'201711008.jpeg','CIAMIS',NULL,NULL,0,0,0),
('201708003','55201',8,NULL,'Panji Sastra Atmaja','L',NULL,'1999-01-21','','085724890666',NULL,'panjisastraatmaja@gmail.com','SMA Negeri 1 Warungkondang',2017,'Halamadrid','dd335f498ed05ba3881a0fbbaf777697',NULL,'2017-06-14',NULL,0,NULL,0,NULL,NULL,'201708003.jpeg','Cianjur',NULL,NULL,0,0,0),
('201713008','14201',13,NULL,'Anita Anggraeni','P',NULL,'1999-05-23','085320562851','',NULL,'','Smk Farmasi As-Shifa',2017,'Anggraenianita','5b98f73223913a37c75da326330e3975',NULL,'2017-06-14',NULL,0,NULL,0,NULL,NULL,'201713008.jpeg','Bandung',NULL,2,0,0,0),
('201707001','41221',7,NULL,'rahmadita ','P',NULL,'0000-00-00','-','083817417217',NULL,'','smk n 2 cilaku-cianjur ',2017,'rahmadita0709@g','ca704e6ec18ae0c57752fd0c42b1912d',NULL,'2017-06-15',NULL,0,NULL,0,NULL,NULL,'201707001.jpeg','cianjur ',NULL,NULL,0,0,0),
('201705002','54211',5,NULL,'Dinda dwi rahayu','P',NULL,'1998-10-24','-','083820992810',NULL,'','Sman 1 pangalengan',2017,'Ddindadr','06a9cc18df045a2aeec415607d6fc786',NULL,'2017-06-15',NULL,0,NULL,0,NULL,NULL,'201705002.jpeg','Bandung',NULL,NULL,0,0,0),
('201713009','14201',13,NULL,'RUHDY HIDAYAT','L',NULL,'0000-00-00','087822353097','087822353087',NULL,'nilanilut72@gmail.com','SMAN 1 LIGUNG',2017,'ruhdyhidayat','22fd77a39cbd67c123c1e23e6abf0ecd',NULL,'2017-06-15',NULL,0,NULL,0,NULL,NULL,'201713009.jpeg','INDRAMAYU',NULL,NULL,0,0,0),
('201708004','55201',8,NULL,'RENA WIJAYA','L',NULL,'2017-02-09','089656648582','089656648582',NULL,'','Smk tribakti pangalengan',2017,'Rwijaya','cfcb1060fb8351ae60832d8f6c511f48','2017-06-21','2017-06-15','2017-06-21',1,'2017-08-05',1,'Bri',NULL,'201708004.jpeg','Bandung',NULL,5,3,8,0),
('201701002','87202',1,NULL,'Muhammad Rifad Fakhrozi','L',NULL,'2017-06-05','','085224292191',NULL,'','MA Quwatul Iman',2015,'Rifad123','b23af1c3d38821633abe0423e1a99171',NULL,'2017-06-15',NULL,0,NULL,0,NULL,NULL,'201701002.jpeg','indramayu',NULL,1,0,0,0),
('201702005','88201',2,NULL,'Syifa Isnaeni Fadilah','P',NULL,'0000-00-00','','089621360457',NULL,'syifaisna13@gmail.com','MA Persis 03 Pameungpeuk',2017,'Syifa Isnaeni F','41994036afa593396fe22e3a7ef8969a',NULL,'2017-06-15',NULL,0,NULL,0,NULL,NULL,'201702005.jpeg','Bandung',NULL,3,0,0,0),
('201705003','54211',5,NULL,'RUHDY HIDAYAT','L',NULL,'1998-07-14','087822353097','',NULL,'nilanilut72@gmail.com','SMAN 1 LIGUNG',2017,'ruhdy','22fd77a39cbd67c123c1e23e6abf0ecd',NULL,'2017-06-16',NULL,0,NULL,0,NULL,NULL,'201705003.jpeg','INDRAMAYU',NULL,1,0,0,0),
('201708005','55201',8,NULL,'SANTI MARYANI','P',NULL,'1997-06-08','085721560352','085721560352',NULL,'SANJULY97@GMAIL.COM','SMK AN-NUR MARUYUNG',2016,'9975165808','33cbb6d9ca11e3426a2daad4776f4425',NULL,'2017-06-19',NULL,0,NULL,0,NULL,NULL,'201708005.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201704004','87220',4,NULL,'Widia Mukholashin','P',NULL,'1999-07-17','085861796815','',NULL,'','Pesantren persis ciganitri',2017,'widia1707','caca60fed150e9b827e82e417726d3a0',NULL,'2017-06-19',NULL,0,NULL,0,NULL,NULL,'201704004.jpeg','Bandung ',NULL,4,0,0,0),
('201704005','87220',4,NULL,'Widia Mukholashin','P',NULL,'2017-06-17','085861796815','',NULL,'','MA persis ciganitri',2017,'widia17','caca60fed150e9b827e82e417726d3a0',NULL,'2017-06-19',NULL,0,NULL,0,NULL,NULL,'201704005.jpeg','Bandung ',NULL,5,0,0,0),
('201704006','87220',4,NULL,'Widia Mukholashin','P',NULL,'1999-07-17','085861796815','',NULL,'','MA persis ciganitri',2017,'widunibba','2e6d3ac1fab40dc9c48ed5a2ea7ea624','2017-06-20','2017-06-19','2017-06-20',1,'2017-08-05',1,'BRI',NULL,'201704006.jpeg','Bandung ',NULL,8,3,10,0),
('201702006','88201',2,NULL,'DIMA SATRIANI JUANDAPUTRI','P',NULL,'1999-03-06','081322871956','082310002460',NULL,'dima_sjp@yahoo.com','SMAN 9 BANDUNG',2017,'dimasatriani','b539b8fe460da84561eccfb222c9943c',NULL,'2017-06-29',NULL,0,NULL,0,NULL,NULL,'201702006.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201711009','65201',11,NULL,'Cristie Juliana Marpaung','P',NULL,'1999-07-07','081397589296','0895352910292',NULL,'Cristie560@gmail.com','SMAN 1 SOREANG',2016,'Cristie07','49a7da0ea32aff4af8dde2a8d0356031',NULL,'2017-07-03',NULL,0,NULL,0,NULL,NULL,'201711009.jpeg','Timika, Irian Jaya',NULL,1,0,0,0),
('201705004','54211',5,NULL,'sabila adma putri','P',NULL,'1998-12-18','','081284800333',NULL,'sabila_adma@yahoo.com','mas darussalam',2017,'sabilaadma','509b9d01aad0ed2346096ea165241a44',NULL,'2017-07-03',NULL,0,NULL,0,NULL,NULL,'201705004.jpeg','subang',NULL,NULL,0,0,0),
('201708006','55201',8,NULL,'SANTI MARYANI','P',NULL,'1997-06-08','085721560352','085721560352',NULL,'sanjuly97@gmail.com','SMK AN-NUR MARUYUNG',2016,'santi','ae1d4b431ead52e5ee1788010e8ec110',NULL,'2017-07-04',NULL,0,NULL,0,NULL,NULL,'201708006.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201709001','57201',9,NULL,'Yodia prayoga','L',NULL,'0000-00-00','083824059889','',NULL,'','SMK PGRI JATIWANGI',2017,'yodia44gmail.co','938b4263f09b8b1dae8f027d06681ec9',NULL,'2017-07-06',NULL,0,NULL,0,NULL,NULL,'201709001.jpeg','Kab,Majalengka kec.sumberjaya ',NULL,NULL,0,0,0),
('201709002','57201',9,NULL,'yodia prayoga','L',NULL,'1998-04-10','083824059889','',NULL,'','SMK PGRI JATIWANGI',2017,'yodunibba','646703a825f526155d1b5c5fcaba29ec',NULL,'2017-07-06',NULL,0,NULL,0,NULL,NULL,'201709002.jpeg','kab.majalengka.kec.sumberjaya',NULL,1,0,0,0),
('201713010','14201',13,NULL,'SAIDATUN NISA','P',NULL,'1999-12-09','+6281322594646','08992123629',NULL,'RAFIKASUCI321@gmail.com','smk umikulsum',2017,'SASA','74ee55083a714aa3791f8d594fea00c9',NULL,'2017-07-08',NULL,0,NULL,0,NULL,NULL,'201713010.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201713011','14201',13,NULL,'hahan','L',NULL,'2017-07-12','','089754536723',NULL,'','sma 1 baleendah',2017,'hahan','74ee55083a714aa3791f8d594fea00c9',NULL,'2017-07-10',NULL,0,NULL,0,NULL,NULL,'201713011.jpeg','medan',NULL,NULL,0,0,0),
('201708007','55201',8,NULL,'DICKY AHMAD FAUZI','L',NULL,'1998-04-17','','083822116834',NULL,'faudziidai@gmail.com','SMK Aloer Wargakusumah',2017,'dicky ahmad f','25d55ad283aa400af464c76d713c07ad',NULL,'2017-07-10',NULL,0,NULL,0,NULL,NULL,'201708007.jpeg','Bandung',NULL,1,0,0,0),
('201705005','54211',5,NULL,'Fitria Musyaidah','P',NULL,'0000-00-00','','089648498302',NULL,'fitriamusyaidah@yahoo.com','MA Persis 76',2017,'fitria18','21850c195e7eda901039fea258263273','2017-07-14','2017-07-11','2017-07-11',1,'2017-08-05',1,'Bank BNI',NULL,'201705005.jpeg','Garut',NULL,4,3,6,0),
('201705006','54211',5,NULL,'Fitria Musyaidah','P',NULL,'0000-00-00','','089648498302',NULL,'fitriamusyaidah@yahoo.com','MA Persis 76',2017,'inggri18','fcce1de66366f58b1528e6be21ce231e','0000-00-00','2017-07-11','2017-07-15',1,'2017-08-06',1,'BRI',NULL,'201705006.jpeg','Garut',NULL,6,3,11,0),
('201711010','65201',11,NULL,'Faisal Dwi Pratama','L',NULL,'0000-00-00','','083148726598',NULL,'inggrimusaaa188@yah00.com','MA Persis 76',2017,'pratama23','fcce1de66366f58b1528e6be21ce231e','0000-00-00','2017-07-11','2017-07-15',1,'2017-08-06',1,'BRI',NULL,'201711010.jpeg','Cirebon',NULL,3,3,13,0),
('201705007','54211',5,NULL,'Fitria Musyaidah','P',NULL,'0000-00-00','','089648498302',NULL,'fitriamusyaidah@yahoo.com','MA Persis 76',2017,'fitunibba','ee8d259f8376307150607f6458979e44','0000-00-00','2017-07-15','2017-07-15',1,'2017-08-06',1,'BRI',NULL,'201705007.jpeg','Garut',NULL,6,3,12,0),
('201711011','65201',11,NULL,'Faisal Dwi Pratama','L',NULL,'0000-00-00','','083148726598',NULL,'inggrimusaaa188@yahoo.com','MA Persis 76',2017,'faiunibba','6ef15f8a333680fe124f27fe7af8c8ba','0000-00-00','2017-07-15','2017-07-15',1,'2017-08-06',1,'BRI',NULL,'201711011.jpeg','Cirebon',NULL,3,3,14,0),
('201709003','57201',9,NULL,'Adham Achiro Djaisin ','L',NULL,'1998-04-20','089698153488','',NULL,'','SMK Telkom Bandung',2017,'Adhamachiro','9af0dd7d89df96a85c5500eba10fe6c9',NULL,'2017-07-17',NULL,0,NULL,0,NULL,NULL,'201709003.jpeg','Purwakarta',NULL,1,0,0,0),
('201712002','44201',12,NULL,'GILANG NITIASYA FAWZI','L',NULL,'1998-07-30','-','081221490227',NULL,'gilangnitiasya@gmail.com','SMA NEGERI 1 CICALENGKA',2017,'GILANGNF','07049b2bcc97256a839eed39b9de6736',NULL,'2017-07-19',NULL,0,NULL,0,NULL,NULL,'201712002.jpeg','BANDUNG',NULL,1,0,0,0),
('201701003','87202',1,NULL,'Litundzira Akhliya','L',NULL,'1999-08-13','-','082175661580',NULL,'litundzira21@gmail.com','SMAN 1 Sungailiat',2017,'litundzira','d0e0bd7bf24be0888a73151f4478c131',NULL,'2017-07-21',NULL,0,NULL,0,NULL,NULL,'201701003.jpeg','Sungailiat ',NULL,NULL,0,0,0),
('201711012','65201',11,NULL,'Satrio pandu prayogo','L',NULL,'1998-06-11','','089681275527',NULL,'satriopandu.prayogo@gmail.com','SMA AMS PAMEUNGPEUK',2016,'satriopandu','24c4e4db133e7de802d60216d99e77ad','2017-07-27','2017-07-21','2017-07-27',1,'2017-08-05',1,'BRI',NULL,'201711012.jpeg','Bandung',NULL,19,3,7,0),
('201711013','65201',11,NULL,'SANBA SHEDA OCTORA PASARIBU ','L',NULL,'1999-10-12','081220793785','',NULL,'','SMAN 1 SOREANG ',2017,'sanbapsb ','e6126e664b5ffb2db5cdc17e4f3f0486',NULL,'2017-07-22',NULL,0,NULL,0,NULL,NULL,'201711013.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201703004','88203',3,NULL,'Sheby Renjani Belly','P',NULL,'1998-10-23','081572967446','',NULL,'Renjanisheby@gmail.com','SMK YADIKA SOREANG',2016,'sheby renjani','02e5997dfa5b2e41105bcf81fd4450ad','2017-07-25','2017-07-25','2017-07-25',1,'2017-08-05',1,'Bidikmisi',NULL,'201703004.jpeg','Bandung',NULL,2,3,9,0),
('201706006','54201',6,NULL,'Heni Damayanti','P',NULL,'1999-05-30','085718585404','',NULL,'','Sman 10 bogor',2017,'Heni.damayanti','c6ff5582ec61d87d733cc887ce0f4618',NULL,'2017-07-25',NULL,0,NULL,0,NULL,NULL,'201706006.jpeg','Bogor',NULL,NULL,0,0,0),
('201706007','54201',6,NULL,'HUSNI MUBAROQ','L',NULL,'1997-10-21','','089627762078',NULL,'Husenalapena@gmail.com','SMK AL-WAFA CIWIDEY',2016,'husnimubaroqs','92686f15fa0a177b2b4345e64630d13f',NULL,'2017-07-26',NULL,0,NULL,0,NULL,NULL,'201706007.jpeg','BANDUNG',NULL,NULL,0,0,0),
('201706008','54201',6,NULL,'HUSNI MUBAROQ','L',NULL,'2017-10-21','','089627762078',NULL,'Husenalapena@gmail.com','SMK AL-WAFA CIWIDEY',2016,'husunibb','80f998542b52f13351199de1945b266c',NULL,'2017-07-26',NULL,0,NULL,0,NULL,NULL,'201706008.jpeg','BANDUNG',NULL,2,0,0,0),
('201706009','54201',6,NULL,'HUSNI MUBAROQ','L',NULL,'1997-10-21','','089627762078',NULL,'Husenalapena@gmail.com','SMK AL-WAFA CIWIDEY',2016,'husunibba','80f998542b52f13351199de1945b266c',NULL,'2017-07-26',NULL,0,NULL,0,NULL,NULL,'201706009.jpeg','BANDUNG',NULL,3,0,0,0),
('201703005','88203',3,NULL,'ALYA ADNI AZHARI','P',NULL,'0000-00-00','089660463690','082116363445',NULL,'alyaadniazharia@gmail.com','SMAN 1 PANGALENGAN ',2107,'alyunibba','4dd59c8323beb8b0a896a1aa4bf78d4c',NULL,'2017-07-26',NULL,0,NULL,0,NULL,NULL,'201703005.jpeg','BANDUNG',NULL,1,0,0,0),
('201701004','87202',1,NULL,'DINAR SAMROTUL WAHIDAH','P',NULL,'1998-11-20','085759996583','085759996583',NULL,'dinar282930@gmail.com','SMA PLUS AL-ITTIHAD',2017,'dinunibba','07a6d2ac7bb32b55a42b3c18e2b24e91',NULL,'2017-07-26',NULL,0,NULL,0,NULL,NULL,'201701004.jpeg','CIANJUR',NULL,NULL,0,0,0),
('201705008','54211',5,NULL,'feri erdamsyah','L',NULL,'0000-00-00','083818474420','',NULL,'','Smk ppn tanjungsari',2017,'ferierdamsyah','9578a81175cc5aa1182a0b5f0a607ace',NULL,'2017-07-27',NULL,0,NULL,0,NULL,NULL,'201705008.jpeg','bandung',NULL,1,0,0,0),
('201702007','88201',2,NULL,'KRISNA EGAR SAPUTRA ','L',NULL,'0000-00-00','087705231550','',NULL,'','SMKN 1 BINANGUN ',2017,'krisnaegar40@gm','20d6b9bb3d0932c173784f7638d6e90d',NULL,'2017-08-02',NULL,0,NULL,0,NULL,NULL,'201702007.jpeg','CILACAP ',NULL,NULL,0,0,0),
('201706010','54201',6,NULL,'Didin Rosidin','L',NULL,'1996-12-11','081222012476','',NULL,'didinrosidin780@yahoo.com','SMKN 5 kuningan',2015,'didinrosidin780','0e55812d2fd65c6f9bf3d42f2baec6bb',NULL,'2017-08-05',NULL,0,NULL,0,NULL,NULL,'201706010.jpeg','Kuningan',NULL,NULL,0,0,0),
('201712003','44201',12,NULL,'Syarifah','P',NULL,'1999-08-02','08122175766','',NULL,'','SMA N 1 Ciparay',2017,'Latif','e10adc3949ba59abbe56e057f20f883e','2017-08-02','2017-08-05','2017-08-06',1,'2017-08-06',1,'Bidikmisi',NULL,'201712003.jpeg','Bandung',NULL,8,3,15,92),
('201707002','41221',7,NULL,'Wildan Muhamad fatwa ','L',NULL,'1999-04-02','082216353617','088216353617',NULL,'','Sman 12 Garut ',2017,'Wildan ','11c5b69a220b7cdadd2a82ea5bd52cf6',NULL,'2017-08-21',NULL,0,NULL,0,NULL,NULL,'201707002.jpeg','Bandung',NULL,1,0,0,0),
('201710007','62201',10,NULL,'Esa Riantika','P',NULL,'0000-00-00','082320944302','',NULL,'esa.riantika998@gmail.com','Smkn 1 Cidaun',2017,'Esariantika','026aa78e1c21198da9f530f4c15411af',NULL,'2017-08-22',NULL,0,NULL,0,NULL,NULL,'201710007.jpeg','Cianjur',NULL,2,0,0,0),
('201707003','41221',7,NULL,'Fitri Ramdani','P',NULL,'0000-00-00','085294982464','',NULL,'','SMAIT Danul - Falah',2012,'Fitri ','4835949e6bc7d8dc90ef9b6a670e339b',NULL,'2017-08-28',NULL,0,NULL,0,NULL,NULL,'201707003.jpeg','Bandung',NULL,NULL,0,0,0),
('201707004','41221',7,NULL,'Rezza Durakhman','L',NULL,'1998-04-21','082216159334','082216159334',NULL,'','SMAN 21 GARUT',2016,'radurachman','477054c78baea7a1242f79d898a2ca46',NULL,'2017-09-02',NULL,0,NULL,0,NULL,NULL,'201707004.jpeg','Garut',NULL,NULL,0,0,0),
('201708008','55201',8,NULL,'Syamsudin Hamdani','L',NULL,'1996-01-25','','085329356044',NULL,'syamsudinhamdani@gmail.com','SMKIT IHSANUL FIKRI',2017,'sam','68c73b12dbe53b0dbf2ef637fe2134c4',NULL,'2017-09-04',NULL,0,NULL,0,NULL,NULL,'201708008.jpeg','Cileunyi',NULL,2,0,0,0),
('201708009','55201',8,NULL,'Yudi Herdiana','L',NULL,'2017-09-07','','081561768540',NULL,'','sma 1 bandung',2017,'yudi','52e4f794c356a9568a209e3181c253a6','2017-09-07','2017-09-07','2017-09-07',0,NULL,1,'miun',NULL,'201708009.jpeg','bandung',NULL,1,0,0,0),
('201708010','55201',8,NULL,'deden abdul holik','L',NULL,'2011-07-11','081223111348','',NULL,'','smk nurulwafa',2014,'deden','39d60018eb56c4ce652247841f9a65cd',NULL,'2017-09-08',NULL,0,NULL,0,NULL,NULL,'201708010.jpeg','tasikmalaya',NULL,2,0,0,0),
('201708011','55201',8,NULL,'Deden Abdul Holik','L',NULL,'0000-00-00','','081223111348',NULL,'deden.kholiq@gmail.com','SMK NURULWAFA',2014,'dedenholik','39d60018eb56c4ce652247841f9a65cd',NULL,'2017-09-10',NULL,0,NULL,0,NULL,NULL,'201708011.jpeg','Tasikmalaya',NULL,2,0,0,0),
('201710008','62201',10,NULL,'Desi puspita sari','P',NULL,'1997-12-17','083820852208','',NULL,'','Sman 1 cikancung',2016,'Dhesay17','858915f1d2d425959fd4da867ba6b599',NULL,'2017-09-13',NULL,0,NULL,0,NULL,NULL,'201710008.jpeg','Bandung',NULL,NULL,0,0,0),
('201708012','55201',8,NULL,'sifa fauziah','P',NULL,'0000-00-00','081222264863','081222264863',NULL,'Tehnuurul@yahoo.com','Smk Wirakarya2Ciparay',2015,'Tehnuurul@yahoo','e82e1818aa57d9b86f7498d875be646d',NULL,'2017-09-18',NULL,0,NULL,0,NULL,NULL,'201708012.jpeg','Bandung,16-09-1996',NULL,NULL,0,0,0);

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

/*Data for the table `tb_priode` */

insert  into `tb_priode`(`thn`,`awal`,`akhir`,`bank`,`an`,`rek`,`byr`,`aktif`) values 
(2018,'2018-01-01','2018-08-31','Bank Rakyat Indonesia (BRI)','Yayasan Pendidikan Bale Bandung','0895-01-001402-50-3',200000,1);

/*Table structure for table `tb_prodi` */

DROP TABLE IF EXISTS `tb_prodi`;

CREATE TABLE `tb_prodi` (
  `id_prodi` varchar(40) NOT NULL,
  `nm_prodi` varchar(50) NOT NULL,
  `fak_prodi` varchar(8) NOT NULL,
  `urut_prodi` int(11) DEFAULT '1',
  `kd_prodi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_prodi` */

insert  into `tb_prodi`(`id_prodi`,`nm_prodi`,`fak_prodi`,`urut_prodi`,`kd_prodi`) values 
('54201','Agribisnis','FAPERTA',1,6),
('54211','Agroteknologi','FAPERTA',2,5),
('62201','Akuntansi','FE',8,10),
('87202','Pendidikan Geografi','FKIP',4,1),
('55201','Teknik Informatika','FTI',10,8),
('88201','Pendidikan Bahasa Indonesia','FKIP',6,2),
('88203','Pendidikan Bahasa Inggris','FKIP',5,3),
('65201','Ilmu Pemerintahan','FISIP',9,11),
('87220','Pendidikan Ilmu Pengetahuan Sosial','FKIP',7,4),
('14201','Keperawatan','FIKES',13,13),
('44201','Matematika','FMIPA',12,12),
('57201','Sistem Informasi','FTI',11,9),
('41221','Teknologi Pangan','FAPERTA',3,7);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_name` varchar(10) NOT NULL,
  `user_pass` varchar(40) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_name`,`user_pass`,`tgl_input`) values 
('admin','ecc206f399747a5cc1a08b13fe539a00','2018-01-05 13:48:24');

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
