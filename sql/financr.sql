/*
Navicat MySQL Data Transfer

Source Server         : Hydrogen
Source Server Version : 50557
Source Host           : 10.0.0.63:3306
Source Database       : financr

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2017-10-16 00:13:20
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
-- Table structure for `menu_items`
-- ----------------------------
DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_value` varchar(60) DEFAULT NULL,
  `menu_url` varchar(128) DEFAULT NULL,
  `menu_security_role` enum('USER','ADMIN','DEVELOPER') DEFAULT 'USER',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES ('1', 'Dashboard', '?f=dashboard', 'USER');
INSERT INTO `menu_items` VALUES ('2', 'Accounts', '?f=dashboard&s=accounts', 'USER');

-- ----------------------------
-- Table structure for `sms_carriers`
-- ----------------------------
DROP TABLE IF EXISTS `sms_carriers`;
CREATE TABLE `sms_carriers` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_carrier` varchar(40) NOT NULL,
  `sms_carrier_address` varchar(60) NOT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sms_carriers
-- ----------------------------
INSERT INTO `sms_carriers` VALUES ('1', 'att', 'txt.att.net');
INSERT INTO `sms_carriers` VALUES ('2', 'tmobile', 'tmomail.net');
INSERT INTO `sms_carriers` VALUES ('3', 'verizon', 'vtext.com');
INSERT INTO `sms_carriers` VALUES ('4', 'sprint', 'messaging.sprintpcs.com');
INSERT INTO `sms_carriers` VALUES ('5', 'virgin', 'vmobl.com');
INSERT INTO `sms_carriers` VALUES ('6', 'tracfone', 'mmst5.tracfone.com');
INSERT INTO `sms_carriers` VALUES ('7', 'metropcs', 'mymetropcs.com');
INSERT INTO `sms_carriers` VALUES ('8', 'boostmobile', 'myboostmobile.com');
INSERT INTO `sms_carriers` VALUES ('9', 'cricket', 'mms.cricketwireless.net');
INSERT INTO `sms_carriers` VALUES ('10', 'ptel', 'ptel.com');
INSERT INTO `sms_carriers` VALUES ('11', 'republic', 'text.republicwireless.com');
INSERT INTO `sms_carriers` VALUES ('12', 'googlefi', 'msg.fi.google.com');
INSERT INTO `sms_carriers` VALUES ('13', 'suncom', 'tms.suncom.com');
INSERT INTO `sms_carriers` VALUES ('14', 'ting', 'message.ting.com');
INSERT INTO `sms_carriers` VALUES ('15', 'uscellular', 'email.uscc.net');
INSERT INTO `sms_carriers` VALUES ('16', 'consumercellular', 'cingularme.com');
INSERT INTO `sms_carriers` VALUES ('17', 'cspire', 'cspirel.com');
INSERT INTO `sms_carriers` VALUES ('18', 'pageplus', 'vtext.com');

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
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_key` varchar(60) DEFAULT NULL,
  `session_user_id` int(11) NOT NULL,
  `session_create_dt` datetime NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_sessions
-- ----------------------------
INSERT INTO `user_sessions` VALUES ('13', 'QxGMyeXsTPlCflyqOl1lBJP40Dfcn1Bezh08vXAp', '11', '2017-10-08 15:37:46');
INSERT INTO `user_sessions` VALUES ('14', 'VqOMb0t7z4YsigUeNkG8ytNaLjcBft0aUPW5Qqdp', '11', '2017-10-08 15:48:33');
INSERT INTO `user_sessions` VALUES ('15', '1iAs7VtswdhAdVQqjS1xrjyzPvaei7fkpPMxLgZh', '11', '2017-10-08 21:00:44');
INSERT INTO `user_sessions` VALUES ('16', 'N1f8HoGbbRXv3yKxzUroRxfiLFNWxAplCEtk3ave', '11', '2017-10-08 21:03:21');
INSERT INTO `user_sessions` VALUES ('17', 'zpIf1Dp5h8ipczxFWC1W9Bm0Mg0atrd3QWjRzJWR', '11', '2017-10-08 21:14:58');
INSERT INTO `user_sessions` VALUES ('18', '9Xj4pNFGJVAjaDgjNwsHjOGlsW7HQ180Zs4ofJ4Y', '11', '2017-10-08 21:17:04');
INSERT INTO `user_sessions` VALUES ('19', 'qbRCTu8xDl9OCgrNbjb7xRvQyYGfxPHY0yAU2IrF', '11', '2017-10-08 21:25:21');
INSERT INTO `user_sessions` VALUES ('20', 'bacOHOb0Hmq47HchIhCDTx10mvWk6uGhES5mHhmo', '11', '2017-10-08 21:28:27');
INSERT INTO `user_sessions` VALUES ('21', 'ffXsBnu7OmIUKr38x83BCXkUa6lJcZKreHUP5oXU', '11', '2017-10-09 20:35:54');
INSERT INTO `user_sessions` VALUES ('22', 'ax2lFgBwrlJjOT05Cc11hfZu6pGMUPz5nBq2R2zj', '14', '2017-10-09 22:26:53');
INSERT INTO `user_sessions` VALUES ('23', 'HUb3P0GJCwKUwMoQdZu3WXg3BI1BSR2zLdDBdkkP', '14', '2017-10-09 22:47:23');
INSERT INTO `user_sessions` VALUES ('24', 'oR8e48J84Gp8h8aT01WAM9ennyIdqOXOG62KeLTj', '14', '2017-10-10 21:59:47');
INSERT INTO `user_sessions` VALUES ('25', 'CFejs991ewDFzuH8O5rrhE5AsVUh4u6G9k0Cu9EI', '14', '2017-10-11 23:36:35');
INSERT INTO `user_sessions` VALUES ('26', 'kan3xG9vxoEB4Hm9LPNzbYdWZfkPh9pBkMFStPn1', '14', '2017-10-12 20:52:39');
INSERT INTO `user_sessions` VALUES ('27', 'yJPUJS3T8aHzZvZSD53mBHtZ3Y4vmLKVvzPfsT9A', '14', '2017-10-13 12:39:59');
INSERT INTO `user_sessions` VALUES ('28', 'YM3T2dYdUStU4rMQ7gupkVMtLa6VRUBPHEIJSHXM', '14', '2017-10-13 17:32:22');
INSERT INTO `user_sessions` VALUES ('29', 'aF05bAVq2PzDTqNWNWSNaR90yZPiNJyYpy4A8Z1b', '14', '2017-10-13 20:26:37');
INSERT INTO `user_sessions` VALUES ('30', 'QesCuyfeugZEin65L2nXdK9EpikBI5Dzj6bOEq29', '14', '2017-10-13 22:10:29');
INSERT INTO `user_sessions` VALUES ('31', 'o5tz5phbABNpgmRgHCVzc7sx46I6KQ28VwI1V0dv', '14', '2017-10-13 22:38:19');
INSERT INTO `user_sessions` VALUES ('32', '0Ktx3KdBWnlgU4EC9X9flh7cIzB3rZwsJZZMKdoG', '14', '2017-10-14 00:36:54');
INSERT INTO `user_sessions` VALUES ('33', 'QBnMk1UfTDWSPbB3faawnQ7jd8Og6APXcdJxfEM8', '14', '2017-10-14 06:48:48');
INSERT INTO `user_sessions` VALUES ('34', 'agdSmXJp6FVOGQPTmqUijh5rmvv07H7hXkajhUIn', '14', '2017-10-14 09:19:33');
INSERT INTO `user_sessions` VALUES ('35', 'jfRSyX3mCupLbrybRtg2pJbzVuox5yLpNCimAmJc', '14', '2017-10-14 10:02:13');
INSERT INTO `user_sessions` VALUES ('36', 'aNmGadNtqViH2SxZ5KJCZop8G79N2MZczmSKzGeZ', '14', '2017-10-14 12:42:46');
INSERT INTO `user_sessions` VALUES ('37', '4DsODngwTD48YbSNnJIK1JhIeSu3pTFux8javzGo', '14', '2017-10-14 13:24:59');
INSERT INTO `user_sessions` VALUES ('38', 'u19Qs48LledHJJHQqO8n8jGqdpOM202x1cnugwgB', '14', '2017-10-14 18:12:39');
INSERT INTO `user_sessions` VALUES ('39', '37PpkkrYY8RASoC52bZiobDToeEAsbGwivWCQnBO', '14', '2017-10-14 21:48:22');
INSERT INTO `user_sessions` VALUES ('40', 'YHnxPUhGjJ7JJcnnsR1CuZZAHJGBlX5kFtRvo9bI', '14', '2017-10-15 10:36:57');
INSERT INTO `user_sessions` VALUES ('41', 'j10VOE7uuwRlkQItcgQfIJtV2lLSDlZWn0SbEZF8', '14', '2017-10-15 11:30:53');
INSERT INTO `user_sessions` VALUES ('42', 'syBg2xyWzniJyeOuBgeB1N38SIvy1sju1VK3tjZ2', '14', '2017-10-15 12:40:16');
INSERT INTO `user_sessions` VALUES ('43', 'btVhOaEW31OgXnNAjqZSjOkq9ieneywq2rHQClNF', '14', '2017-10-15 20:53:55');
INSERT INTO `user_sessions` VALUES ('44', 'srdCJpqHnyJA8cpeDYeSdmbYoYo6f6NHy0khqKZN', '14', '2017-10-15 23:19:30');
INSERT INTO `user_sessions` VALUES ('45', 'kUvqoWttN3J2kWS0f8In6Mi8yisRbP6vKBW8yqCl', '14', '2017-10-16 00:09:43');

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
  `user_setup` tinyint(4) NOT NULL DEFAULT '0',
  `user_validated` tinyint(4) NOT NULL DEFAULT '0',
  `user_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('14', 'd485a7046e08176bef27b8f09e22645241d61936ead504f1be0840975b44f46b', null, null, null, null, null, 'sketarius@gmail.com', null, null, '0', '0', '1');
