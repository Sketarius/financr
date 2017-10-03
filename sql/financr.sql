/*
Navicat MySQL Data Transfer

Source Server         : Hydrogen
Source Server Version : 50557
Source Host           : 10.0.0.63:3306
Source Database       : financr

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2017-10-02 22:50:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `families`
-- ----------------------------
DROP TABLE IF EXISTS `families`;
CREATE TABLE `families` (
  `family_id` int(11) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  PRIMARY KEY (`family_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of families
-- ----------------------------

-- ----------------------------
-- Table structure for `invitations`
-- ----------------------------
DROP TABLE IF EXISTS `invitations`;
CREATE TABLE `invitations` (
  `invite_id` int(11) NOT NULL AUTO_INCREMENT,
  `invite_email` varchar(50) NOT NULL,
  `invite_code` varchar(50) NOT NULL,
  `invite_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`invite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of invitations
-- ----------------------------

-- ----------------------------
-- Table structure for `user_families`
-- ----------------------------
DROP TABLE IF EXISTS `user_families`;
CREATE TABLE `user_families` (
  `user_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_families
-- ----------------------------

-- ----------------------------
-- Table structure for `user_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `user_sessions`;
CREATE TABLE `user_sessions` (
  `session_id` int(11) NOT NULL,
  `session_key` varchar(60) DEFAULT NULL,
  `session_create_dt` datetime NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_pass` varchar(100) NOT NULL,
  `user_address1` varchar(100) DEFAULT NULL,
  `user_address2` varchar(100) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_state` varchar(50) DEFAULT NULL,
  `user_country` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_carrier` varchar(50) DEFAULT NULL,
  `user_validated` tinyint(4) NOT NULL,
  `user_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;