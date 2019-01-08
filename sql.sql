-- init database

drop database if exists nagascan;

create database pbscan;

use pbscan;

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `delete_time` varchar(30) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;



LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'26a696bdcb160b8c274b37af6b9bb625','admin','b988623f24ecc6e3d9ea5200801cf118','2461805286@qq.com',NULL,1),(9,'user','ee11cbb19052e40b07aac0ca060c23ee','user@user.com',NULL,1),(6,'test','098f6bcd4621d373cade4e832627b4f6','test@test.com',NULL,0),(10,'test1','4061863caf7f28c0b0346719e764d561','test@test1.com',NULL,1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `rid` varchar(64) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `port` varchar(40) DEFAULT NULL,
  `protocol` varchar(40) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `method` varchar(40) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `accept` varchar(255) DEFAULT NULL,
  `accept_language` varchar(255) DEFAULT NULL,
  `accept_encoding` varchar(255) DEFAULT NULL,
  `cookie` text DEFAULT NULL,
  `referer` text DEFAULT NULL,
  `content_type` varchar(255) DEFAULT NULL,
  `post_data` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `scan_xss` int(4) DEFAULT 0,
  `scan_sqli` int(4) DEFAULT 0,
  `scan_fi` int(4) DEFAULT 0,
  `result_xss` varchar(40) DEFAULT 'not scan yet',
  `result_sqli` varchar(40) DEFAULT 'not scan yet',
  `result_fi` varchar(40) DEFAULT 'not scan yet',
  `poc_xss` text DEFAULT NULL,
  `poc_sqli` text DEFAULT NULL,
  `poc_fi` text DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
CREATE TABLE `responses` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `rid` varchar(64) DEFAULT NULL,
  `response_xss` longtext DEFAULT NULL,
  `response_sqli` longtext DEFAULT NULL,
  `response_fi` longtext DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `rid` varchar(40) NOT NULL,
  `token` varchar(40) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'not scan',
  `request_num` smallint DEFAULT 0,
  `issues_num` tinyint DEFAULT 0,
  `insert_point` tinyint DEFAULT 0,
  `scanTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `rid` varchar(40) NOT NULL,
  `token` varchar(40) DEFAULT NULL,
  `issueName` varchar(100) DEFAULT NULL,
  `issueRequest` varchar(1500) DEFAULT NULL,
  `issueSeverity` varchar(20) DEFAULT NULL,
  `issueConfidence` varchar(20) DEFAULT NULL,
  `issueDetail` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

  --
  -- Table structure for table `sqlmap`
  --

  DROP TABLE IF EXISTS `sqlmap`;
  CREATE TABLE `sqlmap` (
    `id` varchar(50) not null,
    `ip` varchar(40) DEFAULT NULL,
    `port` varchar(40) DEFAULT NULL,
    `status` int(4) DEFAULT 1, -- 2: not available; 1: available
    `update_time` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'26a696bdcb160b8c274b37af6b9bb625','admin','21232f297a57a5a743894a0e4a801fc3','2461805286@qq.com',NULL,1),(9,'user','ee11cbb19052e40b07aac0ca060c23ee','user@user.com',NULL,1),(6,'test','098f6bcd4621d373cade4e832627b4f6','test@test.com',NULL,0),(10,'test1','4061863caf7f28c0b0346719e764d561','test@test1.com',NULL,1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

