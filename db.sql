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

USE `caterina`;

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
  `nama_item` varchar(30) NOT NULL,
  `harga` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `wajib` int(1) NOT NULL,
  `qty_default` int(5) NOT NULL,
  `status_item` int(1) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item` */

/*Table structure for table `menu` */

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_menu` int(1) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

/*Table structure for table `transaksi` */

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
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
  `qty` int(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `total_harga_item` int(6) NOT NULL,
  PRIMARY KEY (`id_transaksi_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_item` */

/*Table structure for table `user` */

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(60) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `status_catering` int(1) NOT NULL DEFAULT '0',
  `nama_catering` varchar(60) DEFAULT NULL,
  `deskripsi` text,
  `no_telp_catering` varchar(16) DEFAULT NULL,
  `alamat_catering` varchar(200) DEFAULT NULL,
  `status_user` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
