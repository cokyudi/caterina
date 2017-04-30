/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.13-MariaDB : Database - caterina
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `gambar_menu` */

CREATE TABLE `gambar_menu` (
  `id_gambar_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `gambar_menu` text NOT NULL,
  `status_gambar` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_gambar_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gambar_menu` */

/*Table structure for table `item` */

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_item` varchar(30) NOT NULL,
  `harga` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `kategori` int(1) NOT NULL,
  `status_item` int(1) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item` */

/*Table structure for table `kategori` */

CREATE TABLE `kategori` (
  `id_kategori` int(1) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`) values (1,'Nasi'),(2,'Lauk Pauk'),(3,'Sayur'),(4,'Buah'),(5,'Minum'),(6,'Snack');

/*Table structure for table `menu` */

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga_menu` int(6) NOT NULL,
  `status_menu` int(1) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

/*Table structure for table `menu_item` */

CREATE TABLE `menu_item` (
  `id_menu_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `required` int(1) NOT NULL,
  `qty_default` int(4) NOT NULL,
  `jumlah_harga` int(6) NOT NULL,
  PRIMARY KEY (`id_menu_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu_item` */

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `transaksi` */

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `qty_transaksi` int(5) NOT NULL,
  `total_harga` int(6) NOT NULL,
  `id_user_pemesan` int(11) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `lokasi` varchar(300) NOT NULL,
  `tanggal_diambil` date NOT NULL,
  `pesan` text NOT NULL,
  `kode_transaksi` int(6) NOT NULL,
  `status_transaksi` int(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

/*Table structure for table `transaksi_item` */

CREATE TABLE `transaksi_item` (
  `id_transaksi_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `qty_item` int(5) NOT NULL,
  `satuan_item` varchar(10) NOT NULL,
  `total_harga_item` int(6) NOT NULL,
  PRIMARY KEY (`id_transaksi_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_item` */

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `status_catering` int(1) NOT NULL DEFAULT '0',
  `nama_catering` varchar(60) DEFAULT NULL,
  `deskripsi` text,
  `foto_catering` text,
  `no_telp_catering` varchar(16) DEFAULT NULL,
  `alamat_catering` varchar(200) DEFAULT NULL,
  `long_catering` double DEFAULT NULL,
  `lat_catering` double DEFAULT NULL,
  `status_user` int(1) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama_user`,`email`,`password`,`no_telp`,`status_catering`,`nama_catering`,`deskripsi`,`foto_catering`,`no_telp_catering`,`alamat_catering`,`long_catering`,`lat_catering`,`status_user`,`updated_at`,`created_at`,`remember_token`) values (5,'Cok Yudi','cokagungyudi@gmail.com','$2y$10$jJ/pdnBcIAhbvZAXiGlQ2ePNy/Ht0RKnNF7ltTJ87h2lFYP7t332y','081238738893',1,'Nasjing Aget','balblablablablablblalablaabla',NULL,'0180122','Jimbaran',NULL,NULL,1,'2017-04-27 16:49:56','2017-04-24 18:35:48','rQZCsDAMMhDgr8MQuaJGkuqFFuJtWGISRihooEeKYTUsUkUDnfIrwYD1kDQW'),(6,'Ecek','ecek@gmail.com','$2y$10$66o.8Xe0RZJfLsfi2dwh1.A19K2u7C9gZed5Sw.LiP.y62kALV3Sy','089988998889',1,'UBK','wkwkwkwkwkkwwkwkwkkwwk',NULL,'08120121','Kampus Unud',NULL,NULL,1,'2017-04-26 16:40:04','2017-04-26 16:40:04','r6ZVfURLnAONQTXf0gXqSCkJhFN7cKBAZZsUbe5fFeq9UF7vRne0BqpfoUIX'),(7,'wira','wira@gmail.com','$2y$10$w28E6RgAzSc3cp0YZHWAAemFE/vICGiGDSlzLMeFJYBry13/.gY5G','0817267736728',1,'Mek Pon','nasi campur isi telor dadar',NULL,'008182012','Kampus Ilkom',NULL,NULL,1,'2017-04-26 16:42:21','2017-04-26 16:42:21','SbWSWyuRHmrvRie8wbqHSM2bH4NBCZZUNkPW5d7jmlaDmrWgm2o5vnmpA2C1'),(8,'kim jong un','kimikimi@gmail.com','$2y$10$.Fzz1IaMKPKuqPmTYSag7.KqaDRRcVZLrxH7jW83PfjJRRrf8wTVO','0812839829',1,'Mad Dog','nasi kuning sing misi tempe',NULL,'08121','Goa Gong',NULL,NULL,1,'2017-04-26 16:46:32','2017-04-26 16:46:32','1ZvZLHAXNOZPoMhTIp5mohjCGa4MstmwC096LlD8pMbYorwR7e5akHDYZlN3'),(9,'kicir','kicir@gmail.com','$2y$10$DFvA3TsfYD1G9t.FJraAeOpYjNRtOCntBHLcr6VhJmzfjyMlU6Zbe','087788999888',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2017-04-26 19:01:42','2017-04-26 19:01:42',NULL),(10,'chicharito','cekcek@gmail.com','$2y$10$P0CiftJ5Y/WJ5Hp6PV17Cu/RnirbrJhOtq6xlpZYSxawID6VgPsC2','123123123',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2017-04-27 16:16:32','2017-04-27 16:16:32','mGq6MV0ozH1vmKcBSbz3h1qRj1EGFTEtXGxqIZEQVpCQNysOmkIG5Olkqbpd');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
