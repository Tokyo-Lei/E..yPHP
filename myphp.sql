/*
Navicat MySQL Data Transfer

Source Server         : 我的数据2
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tokyo

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-22 16:36:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for easy_basic
-- ----------------------------
DROP TABLE IF EXISTS `easy_basic`;
CREATE TABLE `easy_basic` (
  `id` int(11) NOT NULL,
  `web_title` varchar(255) DEFAULT NULL,
  `web_email` varchar(255) DEFAULT NULL,
  `web_copyright` varchar(255) DEFAULT NULL,
  `seo_keyword` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_count` varchar(255) DEFAULT NULL,
  `basic_num` int(11) DEFAULT NULL,
  `basic_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_basic
-- ----------------------------
INSERT INTO `easy_basic` VALUES ('1', '小野直樹 / 记录生活', 'kyomini@qq.com', 'Copyright &copy; 2018 - 2019 www.tokyos.top By NaokiOno All Rights Reserved.', '小野直樹，记录，生活，长春，东京，上海，摄影，清新，人生，魅力，电影，画面', '努力记住人生最美丽的画面，它并不是来自电影，而是您眼神的画面。', '##', '5', 'gif, jpg,jpeg,png,bmp');

-- ----------------------------
-- Table structure for easy_category
-- ----------------------------
DROP TABLE IF EXISTS `easy_category`;
CREATE TABLE `easy_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `cate_name` varchar(255) DEFAULT NULL,
  `cate_keyword` varchar(255) DEFAULT NULL,
  `cate_description` varchar(255) DEFAULT NULL,
  `cate_url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `cate_hide` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_category
-- ----------------------------
INSERT INTO `easy_category` VALUES ('1', '0', 'Home', '记录,生活,美好,瞬间', '记录生活美好的瞬间', '#', '1');
INSERT INTO `easy_category` VALUES ('2', '0', 'CN / ChangChun', '长春，桂林路，西康咖啡，五月花', '我所在的城市，土生土长的地方。目前是正在发展中的二线城市，相比沈阳和哈尔滨， 这里显着很低调不知名的城市，它的名字叫长春。', '#', '2');
INSERT INTO `easy_category` VALUES ('3', '0', 'CN / ShangHai', '上海，五角场，徐家汇，田子坊', '上海,上海 你是一座不夜城', '#', '3');
INSERT INTO `easy_category` VALUES ('4', '0', 'JP / Tokyo', '日本，东京，京东，平成', '来到日本有一段时间了，感受到这里亚洲最发达的城市，有很多地方在努力追赶，今夜迷离，灯光闪烁，路上都是下班族，一样的世界。', '#', '4');
INSERT INTO `easy_category` VALUES ('5', '0', 'CN / BeiJing', '北京，南锣鼓巷，王府井，胡同，帝都，小镇', '南锣鼓巷是北京的一条胡同，蕴藏了北京的前世今生，既凝聚了厚重的历史，还汇集了北京最时尚的美食和观赏', '#', '5');

-- ----------------------------
-- Table structure for easy_content
-- ----------------------------
DROP TABLE IF EXISTS `easy_content`;
CREATE TABLE `easy_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_pid` int(11) DEFAULT NULL,
  `content_title` varchar(255) DEFAULT NULL,
  `content_keyword` varchar(255) DEFAULT NULL,
  `content_description` varchar(255) DEFAULT NULL,
  `content_thumbnail` varchar(255) DEFAULT NULL,
  `content_text` varchar(255) DEFAULT NULL,
  `content_time` text NOT NULL,
  `content_draft` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_content
-- ----------------------------
INSERT INTO `easy_content` VALUES ('1', '2', '「古朴和清新」人生80%的时间在这里。', '长春', '同一座城，一时古朴寂静，一时文艺清新', 'http://cdn.tokyos.top/cc5.jpg_tokyo', '古朴和清新，一时古朴寂静又一时文艺清新。那里有很多人情味的地方，临近有大学、咖啡店、酒吧、书店以及一生和梦想，就在这里神奇的西康路一条街。\r\n\r\n![](http://cdn.tokyos.top/cc10.jpg_tokyo)\r\n\r\n说起古朴，不能再古朴的古朴，而并不是西康路建筑斑驳古朴的胸襟包容了古今，而是近代伪满洲老建筑加上时尚文化。这里安静，淡雅，秋天时空气干净清新，呼吸间，耳畔传来的咖啡厅里的音乐。\r\n\r\n![TIME的西餐酒吧咖啡外景](http://cdn.tokyos.top/cc13.j', '1553240697', '0');
INSERT INTO `easy_content` VALUES ('2', '1', '「古朴和清新」人生80%的时间在这里。', '长春', '同一座城，一时古朴寂静，一时文艺清新', 'http://cdn.tokyos.top/cc5.jpg_tokyo', '古朴和清新，一时古朴寂静又一时文艺清新。那里有很多人情味的地方，临近有大学、咖啡店、酒吧、书店以及一生和梦想，就在这里神奇的西康路一条街。\r\n\r\n![](http://cdn.tokyos.top/cc10.jpg_tokyo)\r\n\r\n说起古朴，不能再古朴的古朴，而并不是西康路建筑斑驳古朴的胸襟包容了古今，而是近代伪满洲老建筑加上时尚文化。这里安静，淡雅，秋天时空气干净清新，呼吸间，耳畔传来的咖啡厅里的音乐。\r\n\r\n![TIME的西餐酒吧咖啡外景](http://cdn.tokyos.top/cc13.j', '1553243302', '0');

-- ----------------------------
-- Table structure for easy_counter
-- ----------------------------
DROP TABLE IF EXISTS `easy_counter`;
CREATE TABLE `easy_counter` (
  `counter` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_counter
-- ----------------------------
INSERT INTO `easy_counter` VALUES ('10');

-- ----------------------------
-- Table structure for easy_user
-- ----------------------------
DROP TABLE IF EXISTS `easy_user`;
CREATE TABLE `easy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_user
-- ----------------------------
INSERT INTO `easy_user` VALUES ('1', 'admin', '小野', 'c81e728d9d4c2f636f067f89cc14862c', 'kyomini@qq.com', 'https://avatars1.githubusercontent.com/u/7269988?s=460&v=4', '2');
