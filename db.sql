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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`caterina` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `gambar_menu` */

CREATE TABLE `gambar_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `gambar_menu` text NOT NULL,
  `status_gambar` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `gambar_menu` */

insert  into `gambar_menu`(`id`,`id_menu`,`gambar_menu`,`status_gambar`) values (1,5,'/U0GhrE7OeHiHQB0oCNBnS053D6HkjyRPmirQLgLG.jpeg',1),(2,6,'/kdUTpaxeFyBMGuNhIyoyJSo3Ic02hm6lw3zOsN01.jpeg',1),(3,7,'/3QnN8zNAQdki5Et7IimQNUmAr9z8zPASCEAd7cWu.jpeg',1),(4,8,'/Yzr7V0VcR1uxhmne0zBcqhRrClX9DBMUE1biqKXO.jpeg',1),(5,9,'/ZUsIx9wc0iNto8yZo86120o8476xUVzl3cDQp5gt.jpeg',1),(6,10,'/oNvBXrR9dnnGyoQsd4lVXZEZNMJQXzRfERm4odNo.jpeg',1),(7,11,'/TfU21fe17q3gYxZeCsNmnP0dLDUOGHO1zWGZIAAh.jpeg',1),(8,12,'/jaUdiKEnuAQFcQzahMNrx1p2hQyrLg7WjS7ldpLc.jpeg',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`id`,`id_user`,`nama_item`,`harga`,`qty`,`satuan`,`kategori`,`status_item`) values (27,11,'Nasi Putih',5000,1,'porsi',1,1),(28,11,'Ayam Goreng',2000,1,'potong',2,1),(29,11,'Mie Goreng Sayur',2000,1,'porsi',3,1),(30,11,'Cap cay',3000,1,'porsi',3,1),(31,11,'Jeruk',1500,1,'buah',4,1),(32,11,'Kerupuk',1000,1,'bungkus',2,1),(33,11,'Air Aqua',1000,1,'gelas',5,1),(34,11,'Nasi Goreng',8000,1,'porsi',1,1),(35,11,'Ayam Kecap',2000,1,'potong',2,1),(36,11,'Sate Lilit Ayam',1000,1,'tusuk',2,1),(37,11,'Udang Tempura',1000,1,'ekor',2,1),(38,11,'Bakso Ayam',3000,1,'porsi',2,1),(39,11,'Aqua Mini',2000,1,'botol',5,1),(40,11,'Sayur Paku',3000,1,'porsi',3,1),(41,11,'Plecing Kangkung',3000,1,'porsi',3,1),(42,10,'Nasi Putih',5000,1,'porsi',1,1),(43,10,'Sup',2000,1,'porsi',3,1),(44,10,'Ayam Goreng',2000,1,'porsi',2,1),(45,10,'Ikan',3000,1,'porsi',2,1),(46,10,'Kerupuk',1000,1,'bungkus',2,1),(47,10,'Jeruk',2000,1,'buah',4,1),(48,10,'Air Aqua Mini',2000,1,'botol',5,1),(49,10,'Cap cay goreng',2000,1,'porsi',3,1),(50,10,'Siomay Bandung',4000,1,'porsi',2,1),(51,10,'Sate Ayam',1500,1,'tusuk',2,1),(52,10,'Sate Kambing',2000,1,'tusuk',2,1),(53,10,'Cah Jagung Muda',2000,1,'porsi',3,1);

/*Table structure for table `kategori` */

CREATE TABLE `kategori` (
  `id` int(1) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id`,`nama_kategori`) values (1,'Nasi'),(2,'Lauk Pauk'),(3,'Sayur'),(4,'Buah'),(5,'Minum');

/*Table structure for table `menu` */

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga` int(6) NOT NULL DEFAULT '0',
  `status_menu` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nama_menu`,`id_user`,`harga`,`status_menu`) values (6,'Nasi Prasmanan Paket 1',11,0,1),(7,'Nasi Kotak',11,0,1),(8,'Nasi Prasmanan Paket 2',11,0,1),(9,'Paket Aku',10,0,1),(10,'Paket Kamu',10,0,1),(11,'Peket Kita',10,0,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

/*Data for the table `menu_item` */

insert  into `menu_item`(`id`,`id_menu`,`id_item`,`required`,`qty_default`) values (26,6,27,1,1),(27,6,28,1,1),(28,6,29,0,1),(29,6,30,1,1),(30,6,31,0,1),(31,6,32,0,1),(32,6,33,0,1),(33,7,27,0,1),(34,7,35,1,1),(35,7,36,1,1),(36,7,37,0,1),(37,7,30,0,1),(38,7,38,0,1),(39,7,32,0,1),(40,7,39,0,1),(41,7,31,0,1),(42,8,34,1,1),(43,8,35,0,1),(44,8,41,1,1),(45,8,37,0,1),(46,8,31,0,1),(47,8,33,0,1),(48,8,32,0,1),(49,9,42,1,1),(50,9,43,0,1),(51,9,44,1,1),(52,9,46,0,1),(53,9,47,0,1),(54,9,48,1,1),(55,10,42,1,1),(56,10,43,0,1),(57,10,50,1,1),(58,10,45,0,1),(59,10,46,1,1),(60,10,47,0,1),(61,10,48,1,1),(62,11,42,1,1),(63,11,43,0,1),(64,11,49,0,1),(65,11,45,0,1),(66,11,53,1,1),(67,11,46,0,1),(68,11,47,0,1),(69,11,48,1,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`id_menu`,`qty_transaksi`,`total_harga`,`id_user_pemesan`,`alamat`,`lokasi`,`tanggal_diambil`,`pesan`,`kode_transaksi`,`status_transaksi`,`timestamp`) values (9,6,6,18500,6,'Jalan Blambangan',NULL,'2017-06-14','tidak pake cabe','4dv9l0',2,'2017-06-13 14:43:15'),(10,11,20,19000,6,'rektorat udayana',NULL,'2017-06-15','tidak ada','8ex2km',2,'2017-06-13 14:55:18'),(11,9,20,20500,6,'USDI',NULL,'2017-06-15','tidak ada','wskaqj',2,'2017-06-13 15:04:13'),(12,8,40,18000,5,'Jalan Blambangan',NULL,'2017-06-15','tidak pake pedes','1f21cf',3,'2017-06-13 15:21:35'),(13,7,20,18500,5,'jalan udayana',NULL,'2017-06-23','tidak ada','ygcc0k',1,'2017-06-13 15:25:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_item` */

insert  into `transaksi_item`(`id`,`id_item`,`id_transaksi`,`qty_item`,`satuan_item`,`total_harga_item`) values (34,27,9,1,'porsi',5000),(35,28,9,1,'potong',2000),(36,32,9,1,'bungkus',1000),(37,38,9,1,'porsi',3000),(38,29,9,1,'porsi',2000),(39,30,9,1,'porsi',3000),(40,31,9,1,'buah',1500),(41,33,9,1,'gelas',1000),(42,42,10,1,'porsi',5000),(43,43,10,1,'porsi',2000),(44,49,10,1,'porsi',2000),(45,45,10,1,'porsi',3000),(46,53,10,1,'porsi',2000),(47,46,10,1,'bungkus',1000),(48,47,10,1,'buah',2000),(49,48,10,1,'botol',2000),(50,42,11,1,'porsi',5000),(51,44,11,1,'porsi',2000),(52,50,11,1,'porsi',4000),(53,51,11,1,'tusuk',1500),(54,43,11,1,'porsi',2000),(55,49,11,1,'porsi',2000),(56,47,11,1,'buah',2000),(57,48,11,1,'botol',2000),(58,34,12,1,'porsi',8000),(59,28,12,1,'potong',2000),(60,32,12,1,'bungkus',1000),(61,35,12,1,'potong',2000),(62,36,12,1,'tusuk',1000),(63,37,12,1,'ekor',1000),(64,41,12,1,'porsi',3000),(65,27,13,1,'porsi',5000),(66,32,13,1,'bungkus',1000),(67,35,13,1,'potong',2000),(68,36,13,1,'tusuk',1000),(69,30,13,1,'porsi',3000),(70,41,13,1,'porsi',3000),(71,31,13,1,'buah',1500),(72,39,13,1,'botol',2000);

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

insert  into `users`(`id`,`nama_user`,`email`,`password`,`no_telp`,`status_catering`,`nama_catering`,`deskripsi`,`foto_catering`,`no_telp_catering`,`alamat_catering`,`long_catering`,`lat_catering`,`status_user`,`updated_at`,`created_at`,`remember_token`) values (5,'Cok Yudi','cokagungyudi@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','081238738893',1,'Bali Catering Company','Bali Catering Company focuses on fine food, beverage and top quality service for weddings and events. It is the leading caterer on the island and is encompassed by the outstanding beauty of the Island of the Gods.','catering/balicatering.jpg','+623614737324','Jl. Petitenget 45 Seminyak',115.136787,-8.8120424,1,'2017-04-27 16:49:56','2017-04-24 18:35:48','okYf5V6sQ6x2E0obzYewgACn3o0FQRfXKAZ5Ni9hORJcaqvz0BAbzV0LXT17'),(6,'Ecek','ecek@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','089988998889',1,'Rayuan Bali Catering','Rayunan Bali Catering delivers a wide range of high-quality food. Not only seafood and red and white meat but also gluten free meals, normal vegetarian, Jain vegetarian food, and a children menu. All our food is pork-free. Choose among buffet solutions and box catering. We can deliver to you or have your event at our beachfront restaurant at Jimbaran Bay.','catering/rayuan.jpg','0821 4554 6474','Jalan By Pass Mumbul No.96-B',115.136787,-8.8120424,1,'2017-04-26 16:40:04','2017-04-26 16:40:04','oqRDFa1npQopwV0i7jq8kuLmzDIzn15he8bS3cOSTovSXqjXeT7PkgMSeCNe'),(7,'wira','wira@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','0817267736728',1,'Garnish Catering Bali','Kami menerima layanan catering, sesuai untuk budget dan keperluan anda.\r\nSpesialis kami di makanan Indonesia & Western, serta berbagai tapas dan canape.','catering/garnish.jpg','0812-3866-200','Jalan Pulau Kawe 14A',115.136787,-8.8120424,1,'2017-04-26 16:42:21','2017-04-26 16:42:21','cHDTsXSuAtrw7L1Fq95pORUjgBAeCbMcfULdRSWPMwsYFIWUcTPwKYBZB51z'),(8,'kim jong un','kimikimi@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','0812839829',1,'Lumbung Catering','Lumbung Catering Service  is a company of catering service in Bali. We are focuses on fine food, beverage and top quality service for weddings, events and villa services. Events to remember, that’s is our passion and keeping the homamade touch for your occasion is what we do. Lumbung Catering Service will impress you and your guests with exceptionally menu ideas, presented with style and customized for your event. We approach your special occasion not as a one-time event, but as the start of along term relationship.','catering/lumbung.jpg','+62 811 385 007','Jl. Pulau Saelus Gang IV No. 250 ',115.1867405,-8.6873396,1,'2017-04-26 16:46:32','2017-04-26 16:46:32','1ZvZLHAXNOZPoMhTIp5mohjCGa4MstmwC096LlD8pMbYorwR7e5akHDYZlN3'),(9,'kicir','kicir@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','087788999888',1,'Laela Catering','Laela Catering Adalah Perusahaan Nasional Yang Bergerak Di Bidang Catering Service & Event, Kami Hadir Ditengah – Tengah Anda Untuk Meringankan Dan Membantu Acara Yang Anda Rayakan Dan Kami Akan Menghidangkan Masakan Sesuai Selera Yang Anda Inginkan.Insya Allah, Nikmat Dan Hygenis Kepuasan Pelangan Adalah Tujuan Kami.\r\nLaela Catering Juga menerima Masakan Khas Bali & Masakan Khas Jawa , Arab , India Dan Pastinya Di Jamin 100% halal','catering/laela.jpg','081 9999 61585','Jl.Subur Gg. Mirah Pemecutan I No.5.',115.1863972,-8.6729155,1,'2017-04-26 19:01:42','2017-04-26 19:01:42',NULL),(10,'chicharito','cekcek@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','123123123',1,'Catering Kita Bali','Catering Kita menerima layanan catering prasmanan dan snack halal higienis dengan harga terjangkau untuk kegiatan Anda. Menawarkan cita rasa masakan Jawa, Bali dan Nusantara Indonesia.','catering/cateringkita.jpg','08113990188 ','Jl. Gunung Cemara No.7, Tegal Harum',115.1855388,-8.659,1,'2017-04-27 16:16:32','2017-04-27 16:16:32','lmbPy0N1SWNoKrNDJwyIsEKAF0YlktRuTSTKl9i0dO0NAKHNDK6GYgVtolYx'),(11,'Gung De Surya','gungde.avenger@gmail.com','$2y$10$GPIdeohvzvG7i32KMjNbyue32T89fXpe97wyAvFnOBlsmfTsv0i0i','081338811881',1,'Risa Catering','Risa Catering menerima pesanan jasa catering nasi kotak, nasi yasa, nasi bungkus, dan catering prasmanan untuk acara pernikahan, catering kantor, dan catering acara lainnya.','catering/risa.jpg','087860206845','Jl. Tukad Pancoran No.6A',115.1863972,-8.6729155,1,'2017-06-12 19:29:47','2017-05-07 17:15:53','uT1YkfodoHUNq4scAhRws49Vy9uWdPGUqIUpR83z7yw1Cp21mZ2fIxFvshsg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
