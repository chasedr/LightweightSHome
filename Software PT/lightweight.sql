/*
Navicat MySQL Data Transfer

Source Server         : geng
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : lightweight

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-07-27 20:45:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `dairy`
-- ----------------------------
DROP TABLE IF EXISTS `dairy`;
CREATE TABLE `dairy` (
  `D_Id` char(8) NOT NULL,
  `D_Object` char(8) NOT NULL,
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
  `L_Id` char(8) NOT NULL,
  `L_Addr` varchar(2) NOT NULL,
  `L_Tone` varchar(2) NOT NULL,
  `L_Bright` varchar(2) NOT NULL,
  `L_Starttime` time DEFAULT NULL,
  `L_Endtime` time DEFAULT NULL,
  `L_Issmart` int(1) DEFAULT NULL,
  `L_FitBright` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`L_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of light
-- ----------------------------

-- ----------------------------
-- Table structure for `wind`
-- ----------------------------
DROP TABLE IF EXISTS `wind`;
CREATE TABLE `wind` (
  `W_Id` char(8) NOT NULL,
  `W_Addr` varchar(2) NOT NULL,
  `W_Speed` int(4) NOT NULL,
  `W_Hometemp` float(8,0) NOT NULL,
  `W_Starttime` time DEFAULT NULL,
  `W_Issmart` int(1) DEFAULT NULL,
  `W_Fittemp` float(8,0) DEFAULT NULL,
  PRIMARY KEY (`W_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wind
-- ----------------------------
