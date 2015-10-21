-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: ignitedb
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Current Database: `ignitedb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ignitedb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ignitedb`;

--
-- Table structure for table `app`
--

DROP TABLE IF EXISTS `app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app` (
  `appgrpid` varchar(20) NOT NULL,
  `appid` varchar(20) NOT NULL,
  `appname` varchar(50) NOT NULL,
  `menupos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appgrpid`,`appid`),
  UNIQUE KEY `app_ndx1` (`appid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app`
--

LOCK TABLES `app` WRITE;
/*!40000 ALTER TABLE `app` DISABLE KEYS */;
INSERT INTO `app` VALUES ('APPS','FPAPP','FP Apps',3),('APPS','PROTRACK','Project Tracking',1),('APPS','TIMELIME','Time Line',2),('SYSAPPS','DBLOOKUP','DB Lookup',2),('SYSAPPS','SYSTEMS','Systems',1);
/*!40000 ALTER TABLE `app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appaccess`
--

DROP TABLE IF EXISTS `appaccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appaccess` (
  `appid` varchar(20) NOT NULL,
  `usergrp` varchar(20) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `appaccess_ndx1` (`appid`,`usergrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appaccess`
--

LOCK TABLES `appaccess` WRITE;
/*!40000 ALTER TABLE `appaccess` DISABLE KEYS */;
INSERT INTO `appaccess` VALUES ('DBLOOKUP','ADMGRP',1),('DBLOOKUP','DEVGRP',0),('DBLOOKUP','PWRGRP',1),('FPAPP','ADMGRP',1),('FPAPP','DEVGRP',1),('FPAPP','PWRGRP',1),('PROTRACK','ADMGRP',1),('PROTRACK','DEVGRP',1),('PROTRACK','PWRGRP',1),('SYSTEMS','ADMGRP',1),('SYSTEMS','PWRGRP',1),('TIMELIME','ADMGRP',1),('TIMELIME','DEVGRP',1),('TIMELIME','PWRGRP',0);
/*!40000 ALTER TABLE `appaccess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appgrp`
--

DROP TABLE IF EXISTS `appgrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appgrp` (
  `appgrpid` varchar(20) NOT NULL,
  `appgrpname` varchar(50) NOT NULL,
  `menupos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appgrpid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appgrp`
--

LOCK TABLES `appgrp` WRITE;
/*!40000 ALTER TABLE `appgrp` DISABLE KEYS */;
INSERT INTO `appgrp` VALUES ('APPS','Applications',1),('SYSAPPS','Systems',2);
/*!40000 ALTER TABLE `appgrp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `moduleid` varchar(20) NOT NULL,
  `moduledesc` varchar(50) NOT NULL,
  `projectid` varchar(20) NOT NULL,
  PRIMARY KEY (`moduleid`),
  UNIQUE KEY `modules_ndx1` (`moduleid`,`projectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES ('IPC','IPC','KLSMAX'),('PROCUREMENT','Procurement','KLSMAX'),('SALES','Sales','KLSMAX');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `projectid` varchar(20) NOT NULL,
  `projectdesc` varchar(50) NOT NULL,
  `sbuid` varchar(20) NOT NULL,
  PRIMARY KEY (`projectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES ('KAS','KAS MAXIMO','KAS'),('KLSMAX','KLS MAXIMO','KLS');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sbu`
--

DROP TABLE IF EXISTS `sbu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sbu` (
  `sbuid` varchar(20) NOT NULL,
  `sbudesc` varchar(50) NOT NULL,
  PRIMARY KEY (`sbuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sbu`
--

LOCK TABLES `sbu` WRITE;
/*!40000 ALTER TABLE `sbu` DISABLE KEYS */;
INSERT INTO `sbu` VALUES ('KAS','KAS'),('KIS','KIS'),('KLS','KLS VMI'),('STS','STS');
/*!40000 ALTER TABLE `sbu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `taskid` bigint(100) NOT NULL AUTO_INCREMENT,
  `parentid` bigint(100) DEFAULT NULL,
  `sbuid` varchar(20) NOT NULL,
  `projectid` varchar(20) NOT NULL,
  `moduleid` varchar(20) DEFAULT NULL,
  `taskdesc` varchar(500) NOT NULL,
  `taskstts` varchar(50) DEFAULT NULL,
  `priority` varchar(20) DEFAULT NULL,
  `ismilestone` varchar(1) NOT NULL DEFAULT 'N',
  `userid` varchar(20) DEFAULT NULL,
  `seqno` int(11) NOT NULL DEFAULT '10',
  `startdt` datetime DEFAULT NULL,
  `enddt` datetime DEFAULT NULL,
  `esthrs` decimal(10,2) NOT NULL DEFAULT '0.00',
  `acthrs` decimal(10,2) NOT NULL DEFAULT '0.00',
  `requestedby` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`taskid`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,NULL,'KLS','KLSMAX','SALES','Cost Savings Automation','OPEN',NULL,'N','venkat',10,'2013-05-13 00:00:00','2013-05-16 00:00:00',0.00,0.00,NULL),(2,NULL,'KLS','KLSMAX','PROCUREMENT','Vendor Consignment Process Implementation','TESTING','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(3,NULL,'KLS','KLSMAX','PROCUREMENT','West Port Consignment','OPEN','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leh Huat'),(4,NULL,'KLS','KLSMAX','PROCUREMENT','Rotables Implementation','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Ignatius'),(5,NULL,'KLS','KLSMAX','WAREHOUSE','Barcode System Implementation','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leh Huat'),(6,NULL,'KLS','KLSMAX','IPC','PR Line - Item Field Validation slowness issues','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Leny'),(7,NULL,'KLS','KLSMAX','IPC','CGR Line - Item Field validation removal','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Leny'),(8,NULL,'KLS','KLSMAX','IPC','Provisioning Monitoring Report (Identifing the item which needs replenishment)','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Leny'),(9,NULL,'KLS','KLSMAX','IPC','Population of Last Purchase Cost Information in PR Lines','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Leny'),(10,NULL,'KLS','KLSMAX','IPC','Stock Aging Report - Data verification','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Leny'),(11,NULL,'KLS','KLSMAX','IPC','Consignment Inventory Utilization - Data verification','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Leny'),(12,NULL,'KLS','KLSMAX','IPC','Adding Provisioning Remarks field in Procurement Traceability Report','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Leny'),(13,NULL,'KLS','KLSMAX','IPC','MM File Interface Issue','INPROGRESS','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Sherlyn'),(14,NULL,'KLS','KLSMAX','IPC','Development of Inventory Control List Report','INPROGRESS','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Ignatious'),(15,NULL,'KLS','KLSMAX','IPC','Sales Consumption Report','OPEn','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Phua Benson'),(16,NULL,'KLS','KLSMAX','IPC','To generate new report for Daily KPI based on Dues-Out.','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Sherlyn'),(17,NULL,'KLS','KLSMAX','IPC','NRV Report for tracking items with MPL < Unit Cost','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leny'),(18,NULL,'KLS','KLSMAX','IPC','Attaching Images to Item master','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Sherlyn'),(19,NULL,'KLS','KLSMAX','IPC','Item Movement Report','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Phua Benson'),(20,NULL,'KLS','KLSMAX','IPC','Reviewing the Stock Overview Info for duesout handling','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Ignatious'),(21,NULL,'KLS','KLSMAX','IPC','To include MPL for KLSK & KLS item and LPP for PTP item in Goods Movement tracability report','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leh Huat'),(22,NULL,'KLS','KLSMAX','IPC','Tracking of Manual DN issuance in Maximo','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leh Huat'),(23,NULL,'KLS','KLSMAX','IPC','Equipment Assembly Structure for Preventative Mainance','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leh Huat'),(24,NULL,'KLS','KLSMAX','IPC','GMT Error Description mail content need format as GMT dues out mail','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Suhaila'),(25,NULL,'KLS','KLSMAX','IPC','To auto CGR for items with MPL in KLS location (Only defined line items/category to be exempted, e.g : Consumable/PM Child/Tyre/Spare Parts) for the new items','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Suhaila'),(26,NULL,'KLS','KLSMAX','IPC','Adjust lot number on stock adjustment/physical count (as per discussed)','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leny'),(27,NULL,'KLS','KLSMAX','IPC','Capturing the PR Revision Information and related changes - Review after the PR Provisioning Enhancement','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Suhaila'),(28,NULL,'KLS','KLSMAX','IPC','Reserved Stock Report. The report shall inclusive no. of days the stocks being reserved, designated Work Order Number in details.','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Phua Benson'),(29,NULL,'KLS','KLSMAX','IPC','Capturing the CGR Date for CGR Transaction (Manual CGR / Auto CGR)','OPEN','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leny'),(30,NULL,'KLS','KLSMAX','IPC','Adding the new fields in KLS Item Master(Fleet Size and QPV)','OPEN','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leny'),(31,NULL,'KLS','KLSMAX','PROCUREMENT','To enable Maximo to refresh item cost in PR for items without cost (especially for First-Time buy) -> Need to change the PR workflow and RFW Flow','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Phua Benson'),(32,NULL,'KLS','KLSMAX','PROCUREMENT','To add-in ‘revised ETA column’ in PO (maximum 2 revision)','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(33,NULL,'KLS','KLSMAX','PROCUREMENT','Maximo to allow partial PR/RFQ lines approval to cut PO - Take care in the Provisioning Model Implementation','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(34,NULL,'KLS','KLSMAX','PROCUREMENT','To add-in ‘Shelf Life’ column in PO Line Page - Need to clarify with Bala','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(35,NULL,'KLS','KLSMAX','PROCUREMENT','To enable W.O.C reason in RFQ to appear in PO remarks column - Need to check with Bala for Contractual reasons for subsequent purchase.','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Jerry'),(36,NULL,'KLS','KLSMAX','PROCUREMENT','To auto-trigger Purchasers & Suppliers for overdue PO','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(37,NULL,'KLS','KLSMAX','PROCUREMENT','To enable revision for cancelled PO line items in order to change the PO status to “CLOSED”','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(38,NULL,'KLS','KLSMAX','PROCUREMENT','To auto/manual send approved PO to suppliers ','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(39,NULL,'KLS','KLSMAX','PROCUREMENT','Auto Release PO on Contracted Items','TESTING','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(40,NULL,'KLS','KLSMAX','PROCUREMENT','To auto-trigger purchaser once stock reach ROP for Blanket PO. Maximo creation of Blanket PO for pricing agreement, currently has some issues. ','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(41,NULL,'KLS','KLSMAX','PROCUREMENT','To separate report Open POs & Overdue POs report','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(42,NULL,'KLS','KLSMAX','PROCUREMENT','Open POs – For Buyers to follow up with the Suppliers, 2 weeks before the due date','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(43,NULL,'KLS','KLSMAX','PROCUREMENT','Unapproved PR List Report','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Sherlyn'),(44,NULL,'KLS','KLSMAX','PROCUREMENT','KPI for Awaiting PO creation','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Sherlyn'),(45,NULL,'KLS','KLSMAX','PROCUREMENT','Report for monitor the Approved PR raised with no POs','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(46,NULL,'KLS','KLSMAX','PROCUREMENT','Unapproved PO List Report','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Sherlyn'),(47,NULL,'KLS','KLSMAX','PROCUREMENT','Late Delivery PO Monitoring','OPEN','LOW','N','VENKAT',10,NULL,NULL,0.00,0.00,'Bala'),(48,NULL,'KLS','KLSMAX','WAREHOUSE','Color code based daily cycle count','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Saludhin'),(49,NULL,'KLS','KLSMAX','WAREHOUSE','Customizing the DN Report for Dotmatrix printout','OPEN','HIGH','N','RAMAN',10,NULL,NULL,0.00,0.00,'Fadzlee'),(50,NULL,'KLS','KLSMAX','SALES','Automated Reporting to Management Team','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Phua Benson'),(51,NULL,'KLS','KLSMAX','SALES','Unbilled Service Income Report (Excluding Invoice created Items)','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Thomas'),(52,NULL,'KLS','KLSMAX','SALES','AR File Generation App - Multiple Invoice Line Issue','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Thomas'),(53,NULL,'KLS','KLSMAX','SALES','Adding the equipment data in sales report data','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Sherlyn'),(54,NULL,'KLS','KLSMAX','SALES','Cost Savings Report','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,''),(55,NULL,'KLS','KLSMAX','MANAGEMENT','Month End Closing - System Cleanup','OPEN','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Phua Benson'),(56,NULL,'KLS','KLSMAX','MANAGEMENT','Stock Movement Report','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Phua Benson'),(57,NULL,'KLS','KLSMAX','IPC','Stock Reconciliation based on Stock Overview file','OPEN','NORMAL','N','VENKY',10,NULL,NULL,0.00,0.00,'Thomas'),(58,NULL,'KLS','KLSMAX','PROCUREMENT','PO Traceability Report','CLOSED','NORMAL','N','VENKY',10,NULL,NULL,0.00,0.00,'Choi KL'),(59,NULL,'KLS','KLSMAX','MANAGEMENT','Consignment Process Walkthrough','INPROGRESS','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Benson'),(60,NULL,'KLS','KLSMAX','MANAGEMENT','KLS Overall Process Walkthrough','OPEN','HIGH','N','VENKAT',10,NULL,NULL,0.00,0.00,'Benson'),(61,NULL,'KLS','KLSMAX','MANAGEMENT','Revision of SOP\'s and WI\'s','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Benson'),(62,NULL,'KLS','KLSMAX','IPC','Fake CGR Implementation and Reporting to management','CLOSED','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Leny'),(63,NULL,'KLS','KLSMAX','MANAGEMENT','Maximo 7.5 Feasibilitiy Study','OPEN','NORMAL','N','VENKAT',10,NULL,NULL,0.00,0.00,'Benson');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergrp`
--

DROP TABLE IF EXISTS `usergrp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergrp` (
  `usergrp` varchar(20) NOT NULL,
  `usergrpname` varchar(50) NOT NULL,
  PRIMARY KEY (`usergrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergrp`
--

LOCK TABLES `usergrp` WRITE;
/*!40000 ALTER TABLE `usergrp` DISABLE KEYS */;
INSERT INTO `usergrp` VALUES ('ADMGRP','Admin Group'),('DEVGRP','Developer Group'),('PWRGRP','Power User Group');
/*!40000 ALTER TABLE `usergrp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(45) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `mobileno` varchar(15) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `lastlogin` datetime DEFAULT NULL,
  `loginattempt` int(11) NOT NULL DEFAULT '0',
  `usergrp` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','Admin','venkatr@stengg.com','91097494','active','2013-05-20 15:07:05',0,'ADMGRP'),('venkat','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','Venkat','venkatr@stengg.com','91097494','active','2013-04-27 23:11:36',0,'PWRGRP');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-25  1:14:29
