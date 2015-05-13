-- MySQL dump 10.13  Distrib 5.6.21, for Linux (i686)
--
-- Host: localhost    Database: dq
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Current Database: `dq`
--


USE `bdm108519173_db`;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `creattime` varchar(32) DEFAULT NULL,
  `ext` varchar(32) DEFAULT NULL,
  `groupid` int(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'admin','a6876b80de000eeeb7c4ffe3bae726a9','1425393150','ixvn',0,'bistumtf@163.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `block` (
  `id` int(32) DEFAULT NULL,
  `content` mediumtext,
  `code` mediumtext,
  `itemid` varchar(32) DEFAULT NULL,
  `contain` varchar(256) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block`
--

LOCK TABLES `block` WRITE;
/*!40000 ALTER TABLE `block` DISABLE KEYS */;
INSERT INTO `block` VALUES (1,'									\n			<section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n			<section class=\'swipe-wrap\'>\n\n	<figure>\n	<div class=\'wrap\'>\n	<a href=\'product-detail.html\'>\n	<img alt=\'this is pic1\' src=\'http://dq/Public/Upload/20150207/36acdee1d8ef481f2d0793d245a6f390_1423299455_8662_0.jpg\' />\n	</a>\n	</div>\n	</figure>\n		</section>\n	</section> 								','									\n			<section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n			<section class=\'swipe-wrap\'>\n\n<?php\nforeach($data as $k => $v){\n?>\n	<figure>\n	<div class=\'wrap\'>\n	<a href=\'product-detail.html\'>\n	<img alt=\'this is pic1\' src=\'<?php echo $v ?>\' />\n	</a>\n	</div>\n	</figure>\n	<?php } ?>\n	</section>\n	</section> 								','6',NULL,NULL,'./Public/block/1.html',NULL),(6,'									\n			<section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n			<section class=\'swipe-wrap\'>\n\n	<figure>\n	<div class=\'wrap\'>\n	<a href=\'product-detail.html\'>\n	<img alt=\'this is pic1\' src=\'http://dq/Public/Upload/20150207/36acdee1d8ef481f2d0793d245a6f390_1423299455_8662_0.jpg\' />\n	</a>\n	</div>\n	</figure>\n		</section>\n	</section> 								\n','									\n			<section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n			<section class=\'swipe-wrap\'>\n\n<?php\nforeach($data as $k => $v){\n?>\n	<figure>\n	<div class=\'wrap\'>\n	<a href=\'product-detail.html\'>\n	<img alt=\'this is pic1\' src=\'<?php echo $v ?>\' />\n	</a>\n	</div>\n	</figure>\n	<?php } ?>\n	</section>\n	</section> 								','6',NULL,NULL,'./Public/block/6.html',NULL),(5,'									\n			<section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n			<section class=\'swipe-wrap\'>\n\n	<figure>\n	<div class=\'wrap\'>\n	<a href=\'product-detail.html\'>\n	<img alt=\'this is pic1\' src=\'http://dq/Public/Upload/20150207/36acdee1d8ef481f2d0793d245a6f390_1423299455_8662_0.jpg\' />\n	</a>\n	</div>\n	</figure>\n		<figure>\n	<div class=\'wrap\'>\n	<a href=\'product-detail.html\'>\n	<img alt=\'this is pic1\' src=\'http://dq/Public/Upload/20150207/52094dbb829151fcf1093178eea4f797_1423288954_8068_0.jpg\' />\n	</a>\n	</div>\n	</figure>\n		</section>\n	</section> 								','									\n			<section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n			<section class=\'swipe-wrap\'>\n\n<?php\nforeach($data as $k => $v){\n?>\n	<figure>\n	<div class=\'wrap\'>\n	<a href=\'product-detail.html\'>\n	<img alt=\'this is pic1\' src=\'<?php echo $v ?>\' />\n	</a>\n	</div>\n	</figure>\n	<?php } ?>\n	</section>\n	</section> 								','6,5',NULL,NULL,'./Public/block/5.html',NULL),(NULL,'																		   <section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n                        <section class=\'swipe-wrap\'>\n                        \n                      \n        <figure>        \n        <div class=\'wrap\'>\n        <a href=\'\'>                                                                                                                                                    \n        <img alt=\'好酒\' src=\'http://dq_31/Public/Upload/20150303/c716e23ed7d620fc1ecce03b00102d76_1425393982_3133_0.jpg\' />\n        </a>            \n        </div>          \n        </figure>    \n                              \n        <figure>        \n        <div class=\'wrap\'>\n        <a href=\'\'>                                                                                                                                                    \n        <img alt=\'44123123\' src=\'http://dq_31/Public/Upload/20150303/aa7d8d22d3211a6a93949a77abd2fdef_1425394135_3961_0.jpg\' />\n        </a>            \n        </div>          \n        </figure>    \n           \n        </section>   \n        </section>\n																','																		   <section id=\'slider\' class=\'swipe\' style=\'visibility: visible;\'>\n                        <section class=\'swipe-wrap\'>\n                        \n<?php                   \nforeach($data as $k => $v){\n?>                      \n        <figure>        \n        <div class=\'wrap\'>\n        <a href=\'<?php echo $v[link];?>\'>                                                                                                                                                    \n        <img alt=\'<?php echo $v[title];?>\' src=\'<?php echo $v[image_url] ?>\' />\n        </a>            \n        </div>          \n        </figure>    \n        <?php } ?>   \n        </section>   \n        </section>\n																','10,11',NULL,NULL,'/home/mtf/Application/dq_31/Public/block/homePage_1.html','homePage_1'),(NULL,'									\n\n				<ul class=\"cf data-list1\">\n					<li>\n					<a href=\"\">\n							<strong>好酒</strong>\n							<img src=\"http://dq_31/Public/Upload/20150303/c716e23ed7d620fc1ecce03b00102d76_1425393982_3133_0.jpg\"  alt=\"\" />\n						</a>\n					</li>\n										<li>\n					<a href=\"\">\n							<strong>好酒</strong>\n							<img src=\"http://dq_31/Public/Upload/20150303/c716e23ed7d620fc1ecce03b00102d76_1425393982_3133_0.jpg\"  alt=\"\" />\n						</a>\n					</li>\n									</ul>\n				<ul class=\"cf data-list2\">\n				</ul>\n								','									\n\n				<ul class=\"cf data-list1\">\n<?php \nfor($i=0;$i<2;$i++){\n$one=$data[$i];\n?>\n					<li>\n					<a href=\"<?php echo $one[link];?>\">\n							<strong><?php echo $one[\'title\'];?></strong>\n							<img src=\"<?php echo $one[image_url];?>\"  alt=\"\" />\n						</a>\n					</li>\n					<?php } ?>\n				</ul>\n				<ul class=\"cf data-list2\">\n<?php \nif(count($data)>2){\nfor($i=2;$i<count($data);$i++){\n$one=$data[$i];\n?>\n					<li>\n						<a href=\"<?php echo $one[link];?>\">\n							<strong><?php echo $one[\'title\'];?></strong>\n							<img src=\"<?php echo $one[image_url]; ?>\"  alt=\"\" />\n						</a>\n					</li>\n					<?php }}?>\n				</ul>\n								','10,10',NULL,NULL,'/home/mtf/Application/dq_31/Public/block/homePage_2.html','homePage_2');
/*!40000 ALTER TABLE `block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `channel` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) DEFAULT NULL,
  `icon` varchar(256) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `child` varchar(256) DEFAULT NULL,
  `parent` varchar(32) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `channel`
--

LOCK TABLES `channel` WRITE;
/*!40000 ALTER TABLE `channel` DISABLE KEYS */;
INSERT INTO `channel` VALUES (8,'javascript:jump(1)','icon-text-width','主页','','',NULL),(14,'javascript:jump(11)','icon-text-width','频道管理','',NULL,NULL),(15,'javascript:jump(3)','icon-text-width','土特产','35,',NULL,NULL),(35,'javascript:jump(\'__ITEM__&a=item_list&channelid=35\')','icon-text-width','甘肃','','15,','1'),(46,'javascript:jump(\'__NEWS__&a=news_list\')','icon-text-width','新闻页','',NULL,'0'),(51,'javascript:jump(\'__ITEM__&a=item_list&channelid=51\')','icon-text-width','礼品定制','',NULL,'0'),(53,'javascript:jump(\'index.php?g=Home&m=Index&a=message_list\')','icon-text-width','留言','',NULL,'0');
/*!40000 ALTER TABLE `channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gift`
--

DROP TABLE IF EXISTS `gift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gift` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `material` varchar(32) DEFAULT NULL,
  `band` varchar(32) DEFAULT NULL,
  `chara` varchar(256) DEFAULT NULL,
  `sie` varchar(256) DEFAULT NULL,
  `content` mediumtext,
  `img_url` varchar(256) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `link` varchar(256) DEFAULT NULL,
  `price` varchar(32) DEFAULT NULL,
  `total` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gift`
--

LOCK TABLES `gift` WRITE;
/*!40000 ALTER TABLE `gift` DISABLE KEYS */;
/*!40000 ALTER TABLE `gift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `creat_at` varchar(32) DEFAULT NULL,
  `price` varchar(32) DEFAULT NULL,
  `image_url` mediumtext,
  `weibo_url` varchar(256) DEFAULT NULL,
  `link` varchar(256) DEFAULT NULL,
  `content` mediumtext,
  `total` varchar(32) DEFAULT NULL,
  `detail` mediumtext,
  `channelid` int(32) DEFAULT NULL,
  `table_id` varchar(32) DEFAULT NULL,
  `table_content` mediumtext,
  `sold_total` varchar(32) DEFAULT '100',
  `status` varchar(32) DEFAULT NULL,
  `web_url` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (10,'好酒','1425393982','11','http://dq_31/Public/Upload/20150303/c716e23ed7d620fc1ecce03b00102d76_1425393982_3133_0.jpg','',NULL,'&lt;p&gt;123213&lt;br/&gt;&lt;/p&gt;','123213',NULL,35,'3','\'\'','123','1',NULL),(11,'44123123','1425394135','111','http://dq_31/Public/Upload/20150303/aa7d8d22d3211a6a93949a77abd2fdef_1425394135_3961_0.jpg,http://dq_31/Public/Upload/20150303/36acdee1d8ef481f2d0793d245a6f390_1425394135_3635_1.jpg,http://dq_31/Public/Upload/20150303/c716e23ed7d620fc1ecce03b00102d76_1425394135_5153_2.jpg','',NULL,'&lt;p&gt;3123213&lt;br/&gt;&lt;/p&gt;','121',NULL,35,'5','\'\'','222','1',NULL),(12,'1','1425479982','2','','',NULL,'','4',NULL,35,'5','array (\n  0 => \'5\',\n  1 => \'6\',\n)','3','1',NULL);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liquor`
--

DROP TABLE IF EXISTS `liquor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liquor` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `type` int(32) DEFAULT '0',
  `alcohol` varchar(32) DEFAULT '0',
  `level` varchar(32) DEFAULT '0',
  `tempera` varchar(32) DEFAULT NULL,
  `price` varchar(32) DEFAULT NULL,
  `url` mediumtext,
  `link` varchar(128) DEFAULT NULL,
  `location` varchar(32) DEFAULT NULL,
  `content` mediumtext,
  `uname` varchar(32) DEFAULT NULL,
  `total` varchar(32) DEFAULT NULL,
  `creattime` varchar(32) DEFAULT NULL,
  `changetime` varchar(32) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `province` varchar(32) DEFAULT NULL,
  `county` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liquor`
--

LOCK TABLES `liquor` WRITE;
/*!40000 ALTER TABLE `liquor` DISABLE KEYS */;
/*!40000 ALTER TABLE `liquor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `content` mediumtext,
  `creat_at` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `content` mediumtext,
  `creat_at` varchar(32) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `address_url` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_item`
--

DROP TABLE IF EXISTS `table_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_item` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `content` mediumtext,
  `title` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_item`
--

LOCK TABLES `table_item` WRITE;
/*!40000 ALTER TABLE `table_item` DISABLE KEYS */;
INSERT INTO `table_item` VALUES (5,'array (\n  0 => \'电话\',\n  1 => \'手机\',\n)',' 好东西');
/*!40000 ALTER TABLE `table_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `creattime` varchar(32) DEFAULT NULL,
  `ext` varchar(32) DEFAULT NULL,
  `groupid` int(32) DEFAULT NULL,
  `sex` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-04 22:53:52
