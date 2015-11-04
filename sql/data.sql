CREATE DATABASE  IF NOT EXISTS `shortcuts` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `shortcuts`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: shortcuts
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `admin_account`
--

DROP TABLE IF EXISTS `admin_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '0',
  `level` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_account`
--

LOCK TABLES `admin_account` WRITE;
/*!40000 ALTER TABLE `admin_account` DISABLE KEYS */;
INSERT INTO `admin_account` VALUES (1,'bobojin','qweasd','0','1'),(2,'test','123456','0','0');
/*!40000 ALTER TABLE `admin_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keyword_history`
--

DROP TABLE IF EXISTS `keyword_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keyword_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(45) DEFAULT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keyword_history`
--

LOCK TABLES `keyword_history` WRITE;
/*!40000 ALTER TABLE `keyword_history` DISABLE KEYS */;
INSERT INTO `keyword_history` VALUES (1,'ss','2015-10-26 02:12:36'),(2,'ss','2015-10-26 02:12:40'),(3,'ss','2015-10-26 02:12:46'),(4,'ss','2015-10-26 02:12:46'),(5,'ss','2015-10-26 02:14:55'),(6,'fdd','2015-10-26 02:15:02'),(7,'','2015-10-26 02:15:32'),(8,'ske','2015-10-26 02:17:04'),(9,'dog','2015-10-26 02:20:53'),(10,'','2015-10-26 11:14:25'),(11,'ss','2015-10-26 11:14:29'),(12,'','2015-10-26 12:29:51'),(13,'s','2015-10-26 12:29:56'),(14,'ske','2015-10-26 12:30:13'),(15,'','2015-10-26 12:30:29'),(16,'','2015-10-26 12:31:55'),(17,'','2015-10-26 12:32:18'),(18,'','2015-10-26 12:32:31'),(19,'w','2015-10-26 12:34:41'),(20,'设计师','2015-10-26 12:34:54'),(21,'s','2015-10-26 12:39:06'),(22,'','2015-10-26 14:51:42'),(23,'','2015-10-26 14:55:33'),(24,'vi','2015-10-26 17:11:11'),(25,'','2015-10-26 17:45:20'),(26,'','2015-10-26 17:45:27'),(27,'','2015-10-26 17:46:52'),(28,'','2015-10-26 18:12:01'),(29,'s','2015-10-26 18:25:22'),(30,'','2015-10-26 18:31:31'),(31,'ss','2015-10-26 18:32:10'),(32,'','2015-10-26 18:32:17'),(33,'','2015-10-26 18:32:43'),(34,'','2015-10-26 18:32:49'),(35,'','2015-10-26 18:35:16'),(36,'','2015-10-26 18:35:28'),(37,'','2015-10-26 18:35:32'),(38,'ske','2015-10-26 18:36:07'),(39,'','2015-10-26 18:36:25'),(40,'sss','2015-10-26 18:37:45'),(41,'','2015-10-26 18:37:56'),(42,'','2015-10-26 18:39:37'),(43,'','2015-10-26 18:57:27'),(44,'','2015-10-26 18:57:47'),(45,'','2015-10-26 18:58:54'),(46,'','2015-10-26 18:59:01'),(47,'','2015-10-26 18:59:08'),(48,'','2015-10-26 18:59:20'),(49,'','2015-10-26 19:00:36'),(50,'','2015-10-26 19:00:45'),(51,'','2015-10-26 19:00:48'),(52,'','2015-10-26 19:00:54'),(53,'kk','2015-10-26 19:00:59'),(54,'d','2015-10-26 19:01:05'),(55,'ske','2015-10-26 19:01:17'),(56,'','2015-10-26 19:03:16'),(57,'','2015-10-27 13:20:05'),(58,'ske','2015-10-27 13:20:13'),(59,'','2015-10-27 13:20:41'),(60,'vi','2015-10-27 13:21:18'),(61,'','2015-10-27 13:32:00'),(62,'','2015-10-27 13:32:17'),(63,'','2015-10-27 13:32:58'),(64,'','2015-10-27 13:33:01'),(65,'','2015-10-27 13:34:43'),(66,'PH','2015-10-27 13:34:54'),(67,'om','2015-10-27 14:20:16'),(68,'ske','2015-10-27 14:21:57'),(69,'key','2015-10-27 14:31:13'),(70,'win','2015-10-27 14:33:11'),(71,'','2015-10-27 14:40:43'),(72,'s?e','2015-10-27 14:45:44'),(73,'s*e','2015-10-27 14:46:01'),(74,'ee','2015-10-27 14:46:10'),(75,'','2015-10-27 14:46:26'),(76,'','2015-10-27 14:46:31'),(77,'j','2015-10-27 14:47:36'),(78,'ll','2015-10-27 14:47:56'),(79,'','2015-10-27 16:18:21'),(80,'','2015-10-27 16:18:31'),(81,'','2015-10-27 16:18:40'),(82,'ske','2015-10-27 16:18:44'),(83,'','2015-10-27 16:19:19'),(84,'','2015-10-27 16:20:32'),(85,'','2015-10-27 16:21:27'),(86,'','2015-10-27 16:27:43'),(87,'','2015-10-27 16:31:19'),(88,'','2015-10-27 16:32:21'),(89,'','2015-10-27 16:33:13'),(90,'','2015-10-27 16:33:33'),(91,'','2015-10-27 16:33:53'),(92,'','2015-10-27 16:34:50'),(93,'','2015-10-27 16:35:53'),(94,'','2015-10-27 16:37:24'),(95,'','2015-10-27 16:39:09'),(96,'','2015-10-27 16:52:35'),(97,'','2015-10-27 16:53:10'),(98,'','2015-10-27 16:58:21'),(99,'','2015-10-27 16:58:51'),(100,'','2015-10-27 16:59:07'),(101,'','2015-10-27 17:00:18'),(102,'','2015-10-27 17:01:07'),(103,'','2015-10-27 17:04:55'),(104,'','2015-10-27 17:10:31'),(105,'','2015-10-27 17:11:14'),(106,'','2015-10-27 17:11:53'),(107,'','2015-10-27 17:12:43'),(108,'dd','2015-10-27 17:15:32'),(109,'','2015-10-27 17:16:17'),(110,'','2015-10-27 17:16:24'),(111,'','2015-10-27 17:16:49'),(112,'','2015-10-27 17:47:46'),(113,'','2015-10-27 17:48:17'),(114,'ske','2015-10-27 17:57:42'),(115,'','2015-10-27 17:57:45'),(116,'ske','2015-10-27 19:05:55'),(117,'ske','2015-10-27 19:11:43'),(118,'vim','2015-10-27 19:14:25'),(119,'vi','2015-10-27 19:14:30'),(120,'ske','2015-10-28 12:58:22'),(121,'','2015-10-28 12:58:26'),(122,'','2015-10-28 12:59:14'),(123,'','2015-10-28 12:59:27'),(124,'','2015-10-28 12:59:47'),(125,'','2015-10-28 13:00:31'),(126,'','2015-10-28 13:00:56'),(127,'ske','2015-10-28 17:11:28'),(128,'','2015-10-29 17:24:58'),(129,'','2015-10-30 16:52:26'),(130,'s','2015-10-30 16:52:38'),(131,'xcode','2015-10-30 17:17:22'),(132,'photo','2015-10-30 17:40:14'),(133,'axure','2015-10-30 18:45:42'),(134,'mac','2015-10-30 18:50:19'),(135,'ske','2015-11-01 01:00:09'),(136,'','2015-11-01 01:00:12'),(137,'','2015-11-01 01:00:21'),(138,'','2015-11-01 23:32:00'),(139,'s','2015-11-01 23:32:10'),(140,'','2015-11-01 23:51:37'),(141,'','2015-11-02 00:31:46'),(142,'','2015-11-02 00:31:51'),(143,'','2015-11-02 12:39:20'),(144,'erererewrqwdf','2015-11-04 14:23:35'),(145,'today dafdsfdsf','2015-11-04 14:24:51');
/*!40000 ALTER TABLE `keyword_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shortcut_data`
--

DROP TABLE IF EXISTS `shortcut_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortcut_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shortcut_id` int(11) NOT NULL,
  `group_name` varchar(45) DEFAULT NULL,
  `key_input` varchar(45) NOT NULL,
  `key_input_extra` varchar(45) DEFAULT NULL,
  `function` varchar(90) DEFAULT NULL,
  `recom` tinyint(4) NOT NULL DEFAULT '0',
  `added_by` varchar(45) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `os` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortcut_data`
--

LOCK TABLES `shortcut_data` WRITE;
/*!40000 ALTER TABLE `shortcut_data` DISABLE KEYS */;
INSERT INTO `shortcut_data` VALUES (10,7,'Default','Esc',NULL,'正常模式',0,NULL,NULL,NULL),(11,7,'Default','i',NULL,'插入模式',0,NULL,NULL,NULL),(12,7,'Default',':wq',NULL,'保存并退出',0,NULL,NULL,NULL),(19,3,'s','s111',NULL,'s',0,'test',NULL,NULL),(24,5,'s','s',NULL,'s',0,NULL,NULL,NULL),(28,7,'tt','tt',NULL,'tt',0,NULL,NULL,NULL),(29,7,'tt','tt',NULL,'tt',0,NULL,NULL,NULL),(68,8,'wwj','j4545 66',NULL,'j',0,'bobojin',NULL,NULL),(69,7,'ss','ss',NULL,'ss',0,NULL,NULL,NULL),(77,6,'Window','command   w',NULL,'Close the window',0,NULL,NULL,NULL),(132,7,'Editor','j',NULL,'Move to next line',0,NULL,NULL,NULL),(145,1,'Insert','A',NULL,'New Artboard',0,NULL,NULL,NULL),(146,1,'Insert','S',NULL,'Slice',0,NULL,NULL,NULL),(147,1,'Insert','R',NULL,'Rectangle',0,NULL,NULL,NULL),(148,1,'Insert','U',NULL,'Rounded Rectangle',0,NULL,NULL,NULL),(149,1,'Insert','O',NULL,'Oval',0,NULL,NULL,NULL),(150,1,'Insert','L',NULL,'Line',0,NULL,NULL,NULL),(151,1,'Insert','V',NULL,'Vector Point',0,NULL,NULL,NULL),(152,1,'Insert','P',NULL,'Pencil',0,NULL,NULL,NULL),(153,1,'Insert','T',NULL,'Text',0,NULL,NULL,NULL),(154,1,'Type','Cmd + B',NULL,'Bold',0,NULL,NULL,NULL),(155,1,'Type','Cmd + I',NULL,'Italic',0,NULL,NULL,NULL),(156,1,'Type','Cmd + U',NULL,'Underline',0,NULL,NULL,NULL),(157,1,'Type','Alt + Cmd (+) +',NULL,'Increase Font Size',0,NULL,NULL,NULL),(158,1,'Type','Alt + Cmd (+) –',NULL,'Decrease Font Size',0,NULL,NULL,NULL),(159,1,'Type','Alt + Control + L',NULL,'Increase Character Spacing',0,NULL,NULL,NULL),(160,1,'Type','Alt + Control + T',NULL,'Decrease Character Spacing',0,NULL,NULL,NULL),(161,1,'Type','Cmd + T',NULL,'Change Font',0,NULL,NULL,NULL),(162,1,'Type','Shift + Cmd + O',NULL,'Convert Text to Outlines',0,NULL,NULL,NULL),(163,1,'Type','Cmd + Shift + {',NULL,'Align Left',0,NULL,NULL,NULL),(164,1,'Type','Cmd + Shift + |',NULL,'Align Center',0,NULL,NULL,NULL),(165,1,'Type','Cmd + Shift + }',NULL,'Align Right',0,NULL,NULL,NULL),(166,1,'Type','Control + Cmd + Space',NULL,'Special Characters',0,NULL,NULL,NULL),(167,1,'Canvas View','Cmd (+) +',NULL,'Zoom In',0,NULL,NULL,NULL),(168,1,'Canvas View','Cmd (+) -',NULL,'Zoom Out',0,NULL,NULL,NULL),(169,1,'Canvas View','Cmd + 0',NULL,'Actual Size',0,NULL,NULL,NULL),(170,1,'Canvas View','Cmd + 1',NULL,'Center Canvas',0,NULL,NULL,NULL),(171,1,'Canvas View','Cmd + 2',NULL,'Zoom Selection',0,NULL,NULL,NULL),(172,1,'Canvas View','Cmd + 3',NULL,'Center Selection',0,NULL,NULL,NULL),(173,1,'Canvas View','§',NULL,'Temporary Zoom to Actual Size',0,NULL,NULL,NULL),(174,1,'Canvas View','Alt + Tab',NULL,'Focus on First Input Field',0,NULL,NULL,NULL),(175,1,'Canvas View','Control + R',NULL,'Toggle Rulers',0,NULL,NULL,NULL),(176,1,'Canvas View','Control + G',NULL,'Toggle Grid',0,NULL,NULL,NULL),(177,1,'Canvas View','Control + L',NULL,'Toggle Layer Guides',0,NULL,NULL,NULL),(178,1,'Canvas View','Control + P',NULL,'Toggle Pixels',0,NULL,NULL,NULL),(179,1,'Canvas View','Control + H',NULL,'Toggle Selection Handles',0,NULL,NULL,NULL),(180,1,'Canvas View','Control + X',NULL,'Toggle Pixel Grid',0,NULL,NULL,NULL),(181,1,'Canvas View','Space + Drag',NULL,'Move canvas',0,NULL,NULL,NULL),(182,1,'Window','Cmd + ~',NULL,'Toggle between Documents',0,NULL,NULL,NULL),(183,1,'Window','Alt + Cmd + 1',NULL,'Toggle Layers List',0,NULL,NULL,NULL),(184,1,'Window','Alt + Cmd + 2',NULL,'Toggle Inspector',0,NULL,NULL,NULL),(185,1,'Window','Alt + Cmd + 3',NULL,'Toggle Layers, Inspector',0,NULL,NULL,NULL),(186,1,'Window','Alt + Cmd + T',NULL,'Toggle Toolbar',0,NULL,NULL,NULL),(187,1,'Window','Cmd + .',NULL,'Presentation Mode',0,NULL,NULL,NULL),(188,1,'Window','Control + Cmd + F',NULL,'Enter Fullscreen',0,NULL,NULL,NULL),(189,1,'Editing Shapes','Cmd + Alt',NULL,'Keep Current Selection',0,NULL,NULL,NULL),(190,1,'Editing Shapes','Control + Cmd + M',NULL,'Use as Mask span',0,NULL,NULL,NULL),(191,1,'Editing Shapes','Alt + Cmd + U',NULL,'Union',0,NULL,NULL,NULL),(192,1,'Editing Shapes','Alt + Cmd + S',NULL,'Substract',0,NULL,NULL,NULL),(193,1,'Editing Shapes','Alt + Cmd + I',NULL,'Intersect',0,NULL,NULL,NULL),(194,1,'Editing Shapes','Alt + Cmd + X',NULL,'Difference',0,NULL,NULL,NULL),(195,1,'Editing Shapes','Cmd + Arrows',NULL,'Change Object Size',0,NULL,NULL,NULL),(196,1,'Editing Shapes','Shift + Cmd + Arrows',NULL,'Change Units by 10',0,NULL,NULL,NULL),(197,1,'Editing Shapes','1, 2, 3, 4',NULL,'Change Vector Point Style',0,NULL,NULL,NULL),(198,1,'Editing Layers','Alt',NULL,'Show Distance to other Layers',0,NULL,NULL,NULL),(199,1,'Editing Layers','Alt + Cmd',NULL,'Show Distance to other Layers inside Group',0,NULL,NULL,NULL),(200,1,'Editing Layers','Alt + Drag',NULL,'Duplicate (Repeat with ⌘D)',0,NULL,NULL,NULL),(201,1,'Editing Layers','Alt + Cmd + C',NULL,'Copy Style',0,NULL,NULL,NULL),(202,1,'Editing Layers','Alt + Cmd + V',NULL,'Paste Style',0,NULL,NULL,NULL),(203,1,'Editing Layers','Control + C',NULL,'Color Picker',0,NULL,NULL,NULL),(204,1,'Editing Layers','Cmd + T',NULL,'Transform',0,NULL,NULL,NULL),(205,1,'Editing Layers','Shift + Cmd + R',NULL,'Rotate',0,NULL,NULL,NULL),(206,1,'Editing Layers','F',NULL,'Toggle Fill',0,NULL,NULL,NULL),(207,1,'Editing Layers','B',NULL,'Toggle Border',0,NULL,NULL,NULL),(208,1,'Arranging Layers, Groups and Artboards','Alt + Cmd + ↑',NULL,'Bring Forward',0,NULL,NULL,NULL),(209,1,'Arranging Layers, Groups and Artboards','Control + Alt + Cmd + ↑',NULL,'Bring to Front',0,NULL,NULL,NULL),(210,1,'Arranging Layers, Groups and Artboards','Alt + Cmd + ↓',NULL,'Send Backward',0,NULL,NULL,NULL),(211,1,'Arranging Layers, Groups and Artboards','Control + Alt + Cmd + ↓',NULL,'Sent to Back',0,NULL,NULL,NULL),(212,1,'Arranging Layers, Groups and Artboards','Shift + Cmd + H',NULL,'Hide',0,NULL,NULL,NULL),(213,1,'Arranging Layers, Groups and Artboards','Shift + Cmd + L',NULL,'Lock',0,NULL,NULL,NULL),(214,1,'Arranging Layers, Groups and Artboards','Cmd + R',NULL,'Rename',0,NULL,NULL,NULL),(215,1,'Arranging Layers, Groups and Artboards','Cmd + G',NULL,'Group Layers',0,NULL,NULL,NULL),(216,1,'Arranging Layers, Groups and Artboards','Shift + Cmd + G',NULL,'Ungroup Layers',0,NULL,NULL,NULL),(217,1,'Arranging Layers, Groups and Artboards','Shift + Tab',NULL,'Select Above Layer',0,NULL,NULL,NULL),(218,1,'Arranging Layers, Groups and Artboards','Tab',NULL,'Select Layer Below',0,NULL,NULL,NULL),(219,1,'Arranging Layers, Groups and Artboards','Esc',NULL,'Select Parent Artboard',0,NULL,NULL,NULL),(220,1,'Arranging Layers, Groups and Artboards','Cmd + F',NULL,'Find Layer by Name',0,NULL,NULL,NULL),(221,1,'Arranging Layers, Groups and Artboards','Fn + ↑',NULL,'Select Above Page',0,NULL,NULL,NULL),(222,1,'Arranging Layers, Groups and Artboards','Fn + ↓',NULL,'Select Page Below',0,NULL,NULL,NULL),(223,1,'Useful Custom Shortcuts','Alt + Cmd (+) +',NULL,'Maximize Window',0,NULL,NULL,NULL),(224,1,'Useful Custom Shortcuts','Cmd + [',NULL,'Align Vertically Center',0,NULL,NULL,NULL),(225,1,'Useful Custom Shortcuts','Cmd + ]',NULL,'Align Horizontally Center',0,NULL,NULL,NULL),(226,1,'Useful Custom Shortcuts','Alt + Cmd + C',NULL,'Collapse Artboards and Groups',0,NULL,NULL,NULL),(238,8,'1','13424324',NULL,'009-0',0,'bobojin',NULL,NULL),(284,2,'Windows system key combinations','F1',NULL,'Help',0,'bobojin',NULL,NULL),(285,2,'Windows system key combinations','CTRL+ESC',NULL,'Open Start menu',0,'bobojin',NULL,NULL),(286,2,'Windows system key combinations','ALT+TAB',NULL,'Switch between open programs',0,'bobojin',NULL,NULL),(287,2,'Windows system key combinations','ALT+F4',NULL,'Quit program',0,'bobojin',NULL,NULL),(288,2,'Windows system key combinations','SHIFT+DELETE',NULL,'Delete item permanently',0,'bobojin',NULL,NULL),(289,2,'Windows system key combinations','Windows Logo+L',NULL,'Lock the computer',0,'bobojin',NULL,NULL),(290,2,'Windows program key combinations','CTRL+C',NULL,'Copy',0,'bobojin',NULL,NULL),(291,2,'Windows program key combinations','CTRL+X',NULL,'Cut',0,'bobojin',NULL,NULL),(292,2,'Windows program key combinations','CTRL+V',NULL,'Paste',0,'bobojin',NULL,NULL),(293,2,'Windows program key combinations','CTRL+Z',NULL,'Undo',0,'bobojin',NULL,NULL),(294,2,'Windows program key combinations','CTRL+B',NULL,'Bold',0,'bobojin',NULL,NULL),(295,2,'Windows program key combinations','CTRL+U',NULL,'Underline',0,'bobojin',NULL,NULL),(296,2,'Windows program key combinations','CTRL+I',NULL,'Italic',0,'bobojin',NULL,NULL),(297,4,'文件菜单','Command + N',NULL,'新建',0,'bobojin',NULL,NULL),(298,4,'文件菜单','Shift + Command + N',NULL,'资源浏览器',0,'bobojin',NULL,NULL),(299,4,'文件菜单','Command + O',NULL,'打开',0,'bobojin',NULL,NULL),(300,4,'文件菜单','Command + W',NULL,'关闭',0,'bobojin',NULL,NULL),(301,4,'文件菜单','Alt + Command + W',NULL,'全部关闭',0,'bobojin',NULL,NULL),(302,4,'文件菜单','Command + S',NULL,'存储',0,'bobojin',NULL,NULL),(303,4,'文件菜单','Shift + Command + S',NULL,'复制',0,'bobojin',NULL,NULL),(304,4,'文件菜单','Alt + Command  + E',NULL,'输出',0,'bobojin',NULL,NULL),(305,4,'文件菜单','Shift + Command + P',NULL,'页面设置',0,'bobojin',NULL,NULL),(306,4,'文件菜单','Command + P',NULL,'打印',0,'bobojin',NULL,NULL),(311,6,'1','1222',NULL,'1',0,'bobojin',NULL,NULL);
/*!40000 ALTER TABLE `shortcut_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shortcut_list`
--

DROP TABLE IF EXISTS `shortcut_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shortcut_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `description` varchar(90) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `tags` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `source` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shortcut_list`
--

LOCK TABLES `shortcut_list` WRITE;
/*!40000 ALTER TABLE `shortcut_list` DISABLE KEYS */;
INSERT INTO `shortcut_list` VALUES (1,'Sketch',NULL,'Professional digital design for Mac',NULL,'UI, Design',NULL,NULL,'bobojin',147,'http://sketchshortcuts.com'),(2,'Windows',NULL,'微软公司研发的一套操作系统',NULL,'OS',NULL,NULL,'bobojin',232,'https://support.microsoft.com/en-us/kb/126449'),(3,'Axure RP',NULL,'一个专业的快速原型设计工具',NULL,'PM',NULL,NULL,'bobojin',75,NULL),(4,'Omnigraffle',NULL,'Omni Group制作的一款绘图软件',NULL,'PM',NULL,NULL,'bobojin',137,NULL),(5,'Photoshop',NULL,'Adobe 开发和发行的图像处理软件',NULL,'Design',NULL,NULL,'bobojin',15,NULL),(6,'Mac OS X',NULL,'苹果公司为Mac系列产品开发的专属操作系统',NULL,'OS',NULL,NULL,'bobojin',111,NULL),(7,'Vi编辑器',NULL,'功能强大、高度可定制的文本编辑器',NULL,'Terminal',NULL,NULL,'bobojin',28,NULL),(8,'Microsoft Office Word',NULL,'微软公司的一个文字处理器应用程序',NULL,'Office',NULL,NULL,'bobojin',48,NULL);
/*!40000 ALTER TABLE `shortcut_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-04 15:42:28
