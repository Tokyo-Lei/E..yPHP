/*
Navicat MySQL Data Transfer

Source Server         : easyphp
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : myphp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-15 16:04:54
*/

SET FOREIGN_KEY_CHECKS=0;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_category
-- ----------------------------
INSERT INTO `easy_category` VALUES ('1', '0', '北京', null, null, null, '1');
INSERT INTO `easy_category` VALUES ('2', '0', '东京', null, null, null, '2');
INSERT INTO `easy_category` VALUES ('3', '0', '长春', null, null, null, '3');
INSERT INTO `easy_category` VALUES ('5', '2', '夜景', null, null, null, '2');
INSERT INTO `easy_category` VALUES ('4', '2', '美食', null, null, null, '1');
INSERT INTO `easy_category` VALUES ('6', '0', '南京', null, null, null, '4');
INSERT INTO `easy_category` VALUES ('7', '6', '6', '6', '6', '6', '1');
INSERT INTO `easy_category` VALUES ('8', '2', '秋叶原一条街', '1', '1', '1', '3');
INSERT INTO `easy_category` VALUES ('9', '0', '小夜夜', '1', '1', '1', '5');
INSERT INTO `easy_category` VALUES ('10', '9', '弟弟', '1', '1', '1', '1');
INSERT INTO `easy_category` VALUES ('11', '0', '美国', 'usa', 'usa', '1', '7');
INSERT INTO `easy_category` VALUES ('12', '0', '6', '6', '6', '6', '6');
INSERT INTO `easy_category` VALUES ('13', '2', '4', '4', '4', '4', '4');
INSERT INTO `easy_category` VALUES ('14', '1', '1', '1', '1', '1', '1');
INSERT INTO `easy_category` VALUES ('15', '5', '南湖美景', '1', '1', '1', '1');
INSERT INTO `easy_category` VALUES ('16', '1', '南京1', '1', '1', '1', '1');
INSERT INTO `easy_category` VALUES ('17', '0', '长春2', '1', '1', '1', '1');
INSERT INTO `easy_category` VALUES ('18', '0', '长春2', '2', '2', '2', '3');
INSERT INTO `easy_category` VALUES ('19', '0', '长春4', '', '', '', '3');
INSERT INTO `easy_category` VALUES ('20', '0', '长春3', '1', '1', '1', '1');
INSERT INTO `easy_category` VALUES ('21', '0', '长春1', '1', '1', '1', '1');
INSERT INTO `easy_category` VALUES ('22', '0', '长春13', '1', '1', '1', '1');

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
INSERT INTO `easy_counter` VALUES ('23');

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
INSERT INTO `easy_user` VALUES ('1', 'admin', '小野', 'c4ca4238a0b923820dcc509a6f75849b', 'kyomini@qq.com', null, '2');
