/*
Navicat MySQL Data Transfer

Source Server         : 我的数据2
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : myphp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-29 08:57:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for easy_basic
-- ----------------------------
DROP TABLE IF EXISTS `easy_basic`;
CREATE TABLE `easy_basic` (
  `id` int(11) NOT NULL,
  `web_title` char(255) DEFAULT NULL,
  `web_email` char(255) DEFAULT NULL,
  `web_copyright` char(255) DEFAULT NULL,
  `seo_keyword` char(255) DEFAULT NULL,
  `seo_description` char(255) DEFAULT NULL,
  `seo_count` char(255) DEFAULT NULL,
  `basic_num` int(11) DEFAULT NULL,
  `basic_image` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of easy_basic
-- ----------------------------
INSERT INTO `easy_basic` VALUES ('1', 'E..yPJP', 'kyomini@qq.com', 'Copyright &copy; 2018 - 2019 web By name All Rights Reserved.', 'E..yPJP', 'E..yPJP', '##', '5', 'gif, jpg,jpeg,png,bmp');

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of easy_category
-- ----------------------------

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
  `content_text` text,
  `content_time` varchar(255) NOT NULL,
  `content_draft` int(2) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of easy_content
-- ----------------------------

-- ----------------------------
-- Table structure for easy_counter
-- ----------------------------
DROP TABLE IF EXISTS `easy_counter`;
CREATE TABLE `easy_counter` (
  `counter` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of easy_counter
-- ----------------------------
INSERT INTO `easy_counter` VALUES ('1');

-- ----------------------------
-- Table structure for easy_fragment
-- ----------------------------
DROP TABLE IF EXISTS `easy_fragment`;
CREATE TABLE `easy_fragment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of easy_fragment
-- ----------------------------
INSERT INTO `easy_fragment` VALUES ('1', '测试', 'web_title', '测试内容');

-- ----------------------------
-- Table structure for easy_message
-- ----------------------------
DROP TABLE IF EXISTS `easy_message`;
CREATE TABLE `easy_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` char(20) DEFAULT NULL,
  `u_email` char(100) DEFAULT NULL,
  `u_content` text,
  `u_time` char(10) DEFAULT NULL,
  `u_audit` tinyint(1) DEFAULT '0',
  `reply` text,
  `reply_time` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_message
-- ----------------------------
INSERT INTO `easy_message` VALUES ('1', '小妮妮', 'nini@sina.com', '你的框架我很喜欢！', '1553818855', '0', '谢谢欣赏', '1553818855');
INSERT INTO `easy_message` VALUES ('2', '小猫猫', 'maomao@sina.com', '可以做友情链接吗？', '1553820115', '1', '', '');

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of easy_user
-- ----------------------------
INSERT INTO `easy_user` VALUES ('1', 'admin', '小野', 'c81e728d9d4c2f636f067f89cc14862c', 'kyomini@qq.com', 'https://avatars1.githubusercontent.com/u/7269988?s=460&v=4', '2');
