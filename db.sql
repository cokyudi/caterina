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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `gambar_menu` text NOT NULL,
  `status_gambar` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gambar_menu` */

/*Table structure for table `item` */

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_item` varchar(30) NOT NULL,
  `harga` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `kategori` int(1) NOT NULL,
  `status_item` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`id`,`id_user`,`nama_item`,`harga`,`qty`,`satuan`,`kategori`,`status_item`) values (1,5,'Nasi Putih',5000,1,'gr',0,1),(2,5,'Nasi Uduk',6000,1,'gr',0,1),(7,5,'Nasi kuning',12222,1,'gr',1,1),(8,5,'Nasi sela',5000,1,'gr',1,1),(9,5,'Pecel Lele',8000,1,'ekor',4,1),(10,5,'Pecel Lele',8000,2,'ekor',7,1),(11,5,'Pecel',8000,2,'ekor',9,1),(12,5,'Pecel eeeee',8000,2,'ekor',9,1),(13,11,'Nasi Goreng',3000,300,'gr',1,1),(14,11,'Nasi',5000,300,'gr',1,1),(15,11,'Ayam Goreng',2000,1,'potong',2,1),(16,11,'Sayur Kangkung',1500,100,'gr',3,1),(17,11,'Telor',2000,1,'btr',2,1),(18,11,'Aqua Gelas',1000,1,'gelas',5,1),(19,6,'Nasi',6000,300,'gr',1,1),(20,6,'Ayam Goreng',2000,1,'potong',2,1),(22,6,'Sayur Kentang',2000,100,'gr',3,1),(23,6,'Jeruk',1000,1,'buah',4,1),(24,6,'Aqua Gelas',1000,1,'buah',5,1),(25,6,'Ice Cream',2000,1,'buah',6,1),(26,11,'Mie Goreng Sayur',3000,1,'bungkus',2,1);

/*Table structure for table `kategori` */

CREATE TABLE `kategori` (
  `id` int(1) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama_kategori`) values (1,'Nasi'),(2,'Lauk Pauk'),(3,'Sayur'),(4,'Buah'),(5,'Minum'),(6,'Snack');

/*Table structure for table `menu` */

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga` int(6) NOT NULL DEFAULT '0',
  `status_menu` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nama_menu`,`id_user`,`harga`,`status_menu`) values (2,'Nasi Bungkus',11,0,1),(3,'Prasmanan',6,0,1),(4,'Nasi Kuning',6,0,1),(5,'Nasi Goreng',11,0,0);

/*Table structure for table `menu_item` */

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `required` int(1) NOT NULL,
  `qty_default` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_menu` (`id_item`),
  KEY `menu_item` (`id_menu`),
  CONSTRAINT `item_menu` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_item` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `menu_item` */

insert  into `menu_item`(`id`,`id_menu`,`id_item`,`required`,`qty_default`) values (2,2,14,0,300),(3,2,15,0,1),(4,2,16,0,100),(6,3,19,0,300),(7,3,20,0,2),(10,4,20,0,2),(17,4,19,0,300),(20,4,19,0,300),(22,2,17,1,2),(23,2,18,1,1),(24,2,16,1,100),(25,5,13,1,300);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `qty_transaksi` int(5) NOT NULL,
  `total_harga` int(6) NOT NULL,
  `id_user_pemesan` int(11) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `lokasi` varchar(300) DEFAULT NULL,
  `tanggal_diambil` date NOT NULL,
  `pesan` text NOT NULL,
  `kode_transaksi` varchar(6) NOT NULL,
  `status_transaksi` int(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`id_menu`,`qty_transaksi`,`total_harga`,`id_user_pemesan`,`alamat`,`lokasi`,`tanggal_diambil`,`pesan`,`kode_transaksi`,`status_transaksi`,`timestamp`) values (2,2,5,9500,11,'Jalan Blambangan',NULL,'2017-05-18','ashda aushdasd','0',1,'2017-05-17 05:47:02'),(3,2,5,9500,6,'jalan raya',NULL,'2017-05-27','tidak ada','123456',4,'2017-05-19 16:18:50'),(4,2,20,0,11,'rumah saya',NULL,'2017-05-26','gak pake pedes','0',1,'2017-05-20 23:22:52'),(5,2,5,12500,11,'rumah saya',NULL,'2017-05-27','asasa','1zjv13',2,'2017-05-20 23:26:48'),(6,2,9,12500,6,'dfwefwf',NULL,'2017-05-11','cabe 3','169hri',3,'2017-05-24 16:02:52'),(7,2,5,0,11,'asasa',NULL,'2017-05-05','asas','97eck8',1,'2017-05-25 23:55:42'),(8,2,5,14500,11,'asa',NULL,'2017-05-13','asas','gx8ng9',1,'2017-05-26 00:17:42');

/*Table structure for table `transaksi_item` */

CREATE TABLE `transaksi_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `qty_item` int(5) NOT NULL,
  `satuan_item` varchar(10) NOT NULL,
  `total_harga_item` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_transaksi` (`id_item`),
  CONSTRAINT `item_transaksi` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_item` */

insert  into `transaksi_item`(`id`,`id_item`,`id_transaksi`,`qty_item`,`satuan_item`,`total_harga_item`) values (2,14,2,300,'gr',5000),(3,15,2,1,'potong',2000),(4,16,2,100,'gr',1500),(5,18,2,1,'gelas',1000),(6,14,3,300,'gr',5000),(7,15,3,1,'potong',2000),(8,16,3,100,'gr',1500),(9,18,3,1,'gelas',1000),(10,13,4,0,'gr',0),(11,17,4,0,'btr',0),(12,16,4,0,'gr',0),(13,18,4,0,'gelas',0),(14,14,5,300,'gr',5000),(15,15,5,1,'potong',2000),(16,16,5,100,'gr',1500),(17,17,5,2,'btr',4000),(18,14,6,300,'gr',5000),(19,15,6,1,'potong',2000),(20,16,6,100,'gr',1500),(21,17,6,2,'btr',4000),(22,14,7,0,'gr',0),(23,15,7,0,'potong',0),(24,17,7,0,'btr',0),(25,26,7,0,'bungkus',0),(26,16,7,0,'gr',0),(27,18,7,0,'gelas',0),(28,14,8,300,'gr',5000),(29,15,8,1,'potong',2000),(30,17,8,1,'btr',2000),(31,26,8,1,'bungkus',3000),(32,16,8,100,'gr',1500),(33,18,8,1,'gelas',1000);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama_user`,`email`,`password`,`no_telp`,`status_catering`,`nama_catering`,`deskripsi`,`foto_catering`,`no_telp_catering`,`alamat_catering`,`long_catering`,`lat_catering`,`status_user`,`updated_at`,`created_at`,`remember_token`) values (5,'Cok Yudi','cokagungyudi@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','081238738893',1,'Nasjing Aget','balblablablablablblalablaabla','catering/default.jpg','0180122','Jimbaran',NULL,NULL,1,'2017-04-27 16:49:56','2017-04-24 18:35:48','lL2xD54vUF2HEEkcHii6ONMq2kxQYTwELO51quZuNsRAPKxl1dRIntWTUL0j'),(6,'Ecek','ecek@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','089988998889',1,'UBK','wkwkwkwkwkkwwkwkwkkwwk','catering/default.jpg','08120121','Kampus Unud',NULL,NULL,1,'2017-04-26 16:40:04','2017-04-26 16:40:04','xMjiKUTYO4pZfvPruInu3cjCRvaALTiqnF1GBORmwqpPyyNIjdso2HBW9wpW'),(7,'wira','wira@gmail.com','$2y$10$w28E6RgAzSc3cp0YZHWAAemFE/vICGiGDSlzLMeFJYBry13/.gY5G','0817267736728',1,'Mek Pon','nasi campur isi telor dadar','catering/default.jpg','008182012','Kampus Ilkom',NULL,NULL,1,'2017-04-26 16:42:21','2017-04-26 16:42:21','cHDTsXSuAtrw7L1Fq95pORUjgBAeCbMcfULdRSWPMwsYFIWUcTPwKYBZB51z'),(8,'kim jong un','kimikimi@gmail.com','$2y$10$.Fzz1IaMKPKuqPmTYSag7.KqaDRRcVZLrxH7jW83PfjJRRrf8wTVO','0812839829',1,'Mad Dog','nasi kuning sing misi tempe','catering/default.jpg','08121','Goa Gong',NULL,NULL,1,'2017-04-26 16:46:32','2017-04-26 16:46:32','1ZvZLHAXNOZPoMhTIp5mohjCGa4MstmwC096LlD8pMbYorwR7e5akHDYZlN3'),(9,'kicir','kicir@gmail.com','$2y$10$DFvA3TsfYD1G9t.FJraAeOpYjNRtOCntBHLcr6VhJmzfjyMlU6Zbe','087788999888',0,NULL,NULL,'catering/default.jpg',NULL,NULL,NULL,NULL,1,'2017-04-26 19:01:42','2017-04-26 19:01:42',NULL),(10,'chicharito','cekcek@gmail.com','$2y$10$P0CiftJ5Y/WJ5Hp6PV17Cu/RnirbrJhOtq6xlpZYSxawID6VgPsC2','123123123',0,NULL,NULL,'catering/default.jpg',NULL,NULL,NULL,NULL,1,'2017-04-27 16:16:32','2017-04-27 16:16:32','mGq6MV0ozH1vmKcBSbz3h1qRj1EGFTEtXGxqIZEQVpCQNysOmkIG5Olkqbpd'),(11,'Gung De Surya','gungde.avenger@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','081338811881',1,'Warungku','asjdhak ajsdha sd','catering/PF2L68RZScSKWIa8IWPm9AMhZn7xE4uIxTYPhx4E.jpeg','0812801','jalan blambangan',115.1422119140625,-7.6619973972552256,1,'2017-05-20 09:32:44','2017-05-07 17:15:53','MdjIDbC3ljg1rpmVnukOihYcfG9P2IV9NMf63BwNGPOAezYlkrfWfgd4Ci0U');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
