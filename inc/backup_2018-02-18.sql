-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_disposisi`
--

DROP TABLE IF EXISTS `tb_disposisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `tujuan_disposisi` varchar(50) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `isi_disposisi` text NOT NULL,
  `sifat_disposisi` varchar(20) NOT NULL,
  `id_surat` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_disposisi`
--

LOCK TABLES `tb_disposisi` WRITE;
/*!40000 ALTER TABLE `tb_disposisi` DISABLE KEYS */;
INSERT INTO `tb_disposisi` VALUES (3,'Peterpan','2018-02-09','Cepat Buat Lagu','2',8,1),(5,'sads','2018-02-10','sadsa','1',7,1),(6,'','0000-00-00','','1',9,1),(7,'','0000-00-00','','1',10,1),(8,'','0000-00-00','','1',10,1);
/*!40000 ALTER TABLE `tb_disposisi` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `rubah_status` AFTER INSERT ON `tb_disposisi` FOR EACH ROW UPDATE tb_surat_masuk SET STATUS='1' WHERE id_surat_masuk=new.id_surat */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_instansi`
--

DROP TABLE IF EXISTS `tb_instansi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instansi_name` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_instansi`
--

LOCK TABLES `tb_instansi` WRITE;
/*!40000 ALTER TABLE `tb_instansi` DISABLE KEYS */;
INSERT INTO `tb_instansi` VALUES (1,'Garuda Indonesia','Online','Jalan Salya No.24, Denpasar Utara','garudaindonesia.co.id','Garuda.id@info.com','garuda-indonesia-logo-8A90F09D68-seeklogo.com.png');
/*!40000 ALTER TABLE `tb_instansi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_surat_keluar`
--

DROP TABLE IF EXISTS `tb_surat_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_surat_keluar` (
  `id_surat_keluar` int(3) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat_dibuat` date NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `isi_surat` text NOT NULL,
  `file_upload` varchar(50) NOT NULL,
  `id_tipe_surat` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  PRIMARY KEY (`id_surat_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_surat_keluar`
--

LOCK TABLES `tb_surat_keluar` WRITE;
/*!40000 ALTER TABLE `tb_surat_keluar` DISABLE KEYS */;
INSERT INTO `tb_surat_keluar` VALUES (3,'28.00/B123D/1333','2018-02-01','Petugas Bayaran','Viva La Vida','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','0df5472e608d027e11d8e005575964fc.png',1,1),(4,'','0000-00-00','','','','doc.pdf',1,1);
/*!40000 ALTER TABLE `tb_surat_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_surat_masuk`
--

DROP TABLE IF EXISTS `tb_surat_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_surat_masuk` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat_dibuat` date NOT NULL,
  `surat_dari` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `isi_surat` text NOT NULL,
  `status` int(5) NOT NULL,
  `file_upload` varchar(50) NOT NULL,
  `id_tipe_surat` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_surat_masuk`
--

LOCK TABLES `tb_surat_masuk` WRITE;
/*!40000 ALTER TABLE `tb_surat_masuk` DISABLE KEYS */;
INSERT INTO `tb_surat_masuk` VALUES (7,'2018-02-06','21/2121/211/22','2018-03-09','Those Shit Boys','JungRamas','Duplicate','\"Awalnya oknum karyawan PLN itu mengarahkan saya untuk mewawancarai bagian jaringan, setelah selesai wawancara saya mengambil gambar video suasana kerja kantor dan lobi, tiba-tiba ZK membentak dan terkesan menghalangi,\" kata Muhammad Roni, jurnalis TV swasta nasional kepada wartawan di Subulussalam, Kamis (1/2/2018) seperti dikutip dari Antara.',1,'doc.pdf',1,1),(9,'2018-02-08','66312/DSA/SUR-MASK','2018-02-10','Denpasar','Bapak Yang Tertera Disana','Lulul','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n',1,'anime-landscape-windy-tree-painting-clouds.jpg',2,1),(10,'0000-00-00','','0000-00-00','','','','',1,'-',1,1);
/*!40000 ALTER TABLE `tb_surat_masuk` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_surat` AFTER DELETE ON `tb_surat_masuk` FOR EACH ROW DELETE FROM tb_disposisi WHERE id_surat = old.id_surat_masuk */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_tipe_surat`
--

DROP TABLE IF EXISTS `tb_tipe_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tipe_surat` (
  `id_tipe_surat` int(2) NOT NULL AUTO_INCREMENT,
  `tipe_surat` varchar(15) NOT NULL,
  PRIMARY KEY (`id_tipe_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipe_surat`
--

LOCK TABLES `tb_tipe_surat` WRITE;
/*!40000 ALTER TABLE `tb_tipe_surat` DISABLE KEYS */;
INSERT INTO `tb_tipe_surat` VALUES (1,'Undangan'),(2,'Pemerintahan');
/*!40000 ALTER TABLE `tb_tipe_surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `foto` text NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'admin','admin','Agung Rama','Agung Rama Wijaya','asdasd.png',0),(2,'pemimpin','pemimpin','Made','Made Badung','Umaru-chan.png',2);
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_surat_disposisi`
--

DROP TABLE IF EXISTS `v_surat_disposisi`;
/*!50001 DROP VIEW IF EXISTS `v_surat_disposisi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_surat_disposisi` (
  `id_disposisi` tinyint NOT NULL,
  `tujuan_disposisi` tinyint NOT NULL,
  `tgl_disposisi` tinyint NOT NULL,
  `isi_disposisi` tinyint NOT NULL,
  `sifat_disposisi` tinyint NOT NULL,
  `id_surat` tinyint NOT NULL,
  `id_surat_masuk` tinyint NOT NULL,
  `tgl_surat_masuk` tinyint NOT NULL,
  `no_surat` tinyint NOT NULL,
  `tgl_surat_dibuat` tinyint NOT NULL,
  `surat_dari` tinyint NOT NULL,
  `kepada` tinyint NOT NULL,
  `subjek` tinyint NOT NULL,
  `isi_surat` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `file_upload` tinyint NOT NULL,
  `id_tipe_surat` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_surat_disposisi`
--

/*!50001 DROP TABLE IF EXISTS `v_surat_disposisi`*/;
/*!50001 DROP VIEW IF EXISTS `v_surat_disposisi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_surat_disposisi` AS select `a`.`id_disposisi` AS `id_disposisi`,`a`.`tujuan_disposisi` AS `tujuan_disposisi`,`a`.`tgl_disposisi` AS `tgl_disposisi`,`a`.`isi_disposisi` AS `isi_disposisi`,`a`.`sifat_disposisi` AS `sifat_disposisi`,`a`.`id_surat` AS `id_surat`,`b`.`id_surat_masuk` AS `id_surat_masuk`,`b`.`tgl_surat_masuk` AS `tgl_surat_masuk`,`b`.`no_surat` AS `no_surat`,`b`.`tgl_surat_dibuat` AS `tgl_surat_dibuat`,`b`.`surat_dari` AS `surat_dari`,`b`.`kepada` AS `kepada`,`b`.`subjek` AS `subjek`,`b`.`isi_surat` AS `isi_surat`,`b`.`status` AS `status`,`b`.`file_upload` AS `file_upload`,`b`.`id_tipe_surat` AS `id_tipe_surat` from (`tb_disposisi` `a` join `tb_surat_masuk` `b` on((`a`.`id_surat` = `b`.`id_surat_masuk`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-18 19:58:59
