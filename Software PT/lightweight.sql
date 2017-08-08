/*
Navicat MySQL Data Transfer

Source Server         : geng
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : lightweight

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-08-08 19:30:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dairy`
-- ----------------------------
DROP TABLE IF EXISTS `dairy`;
CREATE TABLE `dairy` (
  `D_Id` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增长',
  `D_Addr` varchar(2) NOT NULL,
  `D_Opreate` varchar(14) DEFAULT NULL,
  `D_Oprtime` datetime DEFAULT NULL,
  PRIMARY KEY (`D_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dairy
-- ----------------------------

-- ----------------------------
-- Table structure for `light`
-- ----------------------------
DROP TABLE IF EXISTS `light`;
CREATE TABLE `light` (
  `L_Id` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增长',
  `L_Addr` varchar(2) NOT NULL,
  `L_Tone` int(2) NOT NULL,
  `L_Bright` int(2) NOT NULL,
  `L_Starttime` time DEFAULT NULL,
  `L_Endtime` time DEFAULT NULL,
  `L_Issmart` int(1) DEFAULT NULL,
  `L_FitBright` int(2) DEFAULT NULL,
  PRIMARY KEY (`L_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of light
-- ----------------------------
INSERT INTO `light` VALUES ('1', '10', '10', '10', null, null, null, null);
INSERT INTO `light` VALUES ('2', '20', '20', '20', null, null, null, null);
INSERT INTO `light` VALUES ('3', '30', '30', '30', null, null, null, null);

-- ----------------------------
-- Table structure for `state`
-- ----------------------------
DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `S_Addr` varchar(2) NOT NULL,
  `S_Type` char(1) NOT NULL,
  `S_Starttime` time NOT NULL,
  `S_Endtime` time NOT NULL,
  `S_Issmart` int(1) NOT NULL,
  `S_Fit` int(2) NOT NULL,
  PRIMARY KEY (`S_Addr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of state
-- ----------------------------
INSERT INTO `state` VALUES ('10', 'w', '18:31:00', '20:31:00', '1', '34');
INSERT INTO `state` VALUES ('20', 'l', '20:00:00', '22:00:00', '1', '10');
INSERT INTO `state` VALUES ('30', 'w', '19:00:00', '20:00:00', '1', '26');
INSERT INTO `state` VALUES ('40', 'l', '21:00:00', '21:30:00', '2', '7');

-- ----------------------------
-- Table structure for `wind`
-- ----------------------------
DROP TABLE IF EXISTS `wind`;
CREATE TABLE `wind` (
  `W_Id` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增长',
  `W_Addr` varchar(2) NOT NULL,
  `W_Speed` int(4) NOT NULL,
  `W_Hometemp` float(8,0) NOT NULL,
  `W_Starttime` time DEFAULT NULL,
  `W_Issmart` int(1) DEFAULT NULL,
  `W_Fittemp` float(8,0) DEFAULT NULL,
  PRIMARY KEY (`W_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wind
-- ----------------------------
INSERT INTO `wind` VALUES ('1', '10', '6', '36', null, null, null);
