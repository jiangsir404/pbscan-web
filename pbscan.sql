
create database pbscan;
use pbscan;

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issues` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `rid` varchar(40) NOT NULL,
  `token` varchar(40) DEFAULT NULL,
  `issueName` varchar(100) DEFAULT NULL,
  `issueRequest` varchar(1500) DEFAULT NULL,
  `issueSeverity` varchar(20) DEFAULT NULL,
  `issueConfidence` varchar(20) DEFAULT NULL,
  `issueDetail` varchar(2000) DEFAULT NULL,
  `issueUrl` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;


--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requests` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `rid` varchar(64) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `port` varchar(40) DEFAULT NULL,
  `protocol` varchar(40) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `method` varchar(40) DEFAULT NULL,
  `user_agent` text,
  `accept` varchar(255) DEFAULT NULL,
  `accept_language` varchar(255) DEFAULT NULL,
  `accept_encoding` varchar(255) DEFAULT NULL,
  `cookie` text,
  `referer` text,
  `content_type` varchar(255) DEFAULT NULL,
  `post_data` text,
  `path` text,
  `raw` varchar(1500) DEFAULT '',
  `scan_xss` int(4) DEFAULT '0',
  `scan_sqli` int(4) DEFAULT '0',
  `scan_fi` int(4) DEFAULT '0',
  `scan_burp` tinyint(4) DEFAULT '0',
  `result_xss` varchar(40) DEFAULT 'not scan yet',
  `result_sqli` varchar(40) DEFAULT 'not scan yet',
  `result_fi` varchar(40) DEFAULT 'not scan yet',
  `result_burp` varchar(30) DEFAULT 'not scan yet',
  `poc_xss` text,
  `poc_sqli` text,
  `poc_fi` text,
  `time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=438 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responses` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `rid` varchar(64) DEFAULT NULL,
  `response_xss` longtext,
  `response_sqli` longtext,
  `response_fi` longtext,
  `update_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=430 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;



DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `rid` varchar(40) NOT NULL,
  `token` varchar(40) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'not scan',
  `hide` tinyint DEFAULT 0,
  `request_num` smallint(6) DEFAULT '0',
  `issues_num` tinyint(4) DEFAULT '0',
  `insert_point` tinyint(4) DEFAULT '0',
  `saveFile` varchar(100) DEFAULT NULL,
  `scanTime` varchar(30) DEFAULT NULL,
  `scanUrl` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;


--
-- Table structure for table `sqlmap`
--

DROP TABLE IF EXISTS `sqlmap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sqlmap` (
  `id` varchar(50) NOT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `port` varchar(40) DEFAULT NULL,
  `status` int(4) DEFAULT '1',
  `update_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `users`
--

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
INSERT INTO `admin` VALUES (1,'26a696bdcb160b8c274b37af6b9bb625','admin','b988623f24ecc6e3d9ea5200801cf118','2461805286@qq.com',NULL,1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
