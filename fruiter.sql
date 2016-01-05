/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : fruiter

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2016-01-05 18:50:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fruiter_auth_role`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_auth_role`;
CREATE TABLE `fruiter_auth_role` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `module` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '类型：1.url 2.菜单',
  `title` char(20) NOT NULL COMMENT '规则中文描述',
  `url` char(50) NOT NULL,
  `sort` mediumint(5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_auth_role
-- ----------------------------

-- ----------------------------
-- Table structure for `fruiter_category`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_category`;
CREATE TABLE `fruiter_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `parent_id` int(10) DEFAULT NULL COMMENT '父分类ID',
  `sort` smallint(5) DEFAULT NULL COMMENT '排序',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '是否删除 1删除 0 没删除',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品分类表';

-- ----------------------------
-- Records of fruiter_category
-- ----------------------------

-- ----------------------------
-- Table structure for `fruiter_category_seo`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_category_seo`;
CREATE TABLE `fruiter_category_seo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL COMMENT 'SEO关键词和检索关键词',
  `descript` varchar(255) DEFAULT NULL COMMENT 'SEO描述',
  `title` varchar(255) DEFAULT NULL COMMENT 'SEO标题title',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品分类SEO表';

-- ----------------------------
-- Records of fruiter_category_seo
-- ----------------------------

-- ----------------------------
-- Table structure for `fruiter_map`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_map`;
CREATE TABLE `fruiter_map` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `pid` int(8) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `site` varchar(30) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_map
-- ----------------------------
INSERT INTO `fruiter_map` VALUES ('1', '0', '商品管理', 'goods', 'fa-suitcase', '1', '0', '1451547299');
INSERT INTO `fruiter_map` VALUES ('2', '1', '商品列表', 'goods/lists', '', '2', '0', '1451549391');
INSERT INTO `fruiter_map` VALUES ('3', '1', '添加商品', 'goods/add', '', '2', '0', '1451550505');

-- ----------------------------
-- Table structure for `fruiter_session`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_session`;
CREATE TABLE `fruiter_session` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL DEFAULT '',
  `session_expire` int(11) DEFAULT NULL,
  `session_data` mediumblob,
  PRIMARY KEY (`session_id`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_session
-- ----------------------------
INSERT INTO `fruiter_session` VALUES ('13', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990377', '');
INSERT INTO `fruiter_session` VALUES ('14', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990377', '');
INSERT INTO `fruiter_session` VALUES ('15', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990413', '');
INSERT INTO `fruiter_session` VALUES ('16', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990415', '');
INSERT INTO `fruiter_session` VALUES ('17', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990416', '');
INSERT INTO `fruiter_session` VALUES ('18', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990473', '');
INSERT INTO `fruiter_session` VALUES ('19', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990474', '');
INSERT INTO `fruiter_session` VALUES ('20', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990476', '');
INSERT INTO `fruiter_session` VALUES ('21', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990494', '');
INSERT INTO `fruiter_session` VALUES ('22', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990496', '');
INSERT INTO `fruiter_session` VALUES ('23', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990497', '');
INSERT INTO `fruiter_session` VALUES ('24', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990505', '');
INSERT INTO `fruiter_session` VALUES ('25', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990507', '');
INSERT INTO `fruiter_session` VALUES ('26', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990508', '');
INSERT INTO `fruiter_session` VALUES ('27', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990545', '');
INSERT INTO `fruiter_session` VALUES ('28', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990546', '');
INSERT INTO `fruiter_session` VALUES ('29', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990547', '');
INSERT INTO `fruiter_session` VALUES ('30', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990558', '');
INSERT INTO `fruiter_session` VALUES ('31', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990560', '');
INSERT INTO `fruiter_session` VALUES ('32', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990561', '');
INSERT INTO `fruiter_session` VALUES ('1', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990692', '');
INSERT INTO `fruiter_session` VALUES ('4', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990715', '');
INSERT INTO `fruiter_session` VALUES ('5', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990717', '');
INSERT INTO `fruiter_session` VALUES ('6', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990718', '');
INSERT INTO `fruiter_session` VALUES ('7', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990731', '');
INSERT INTO `fruiter_session` VALUES ('8', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990733', '');
INSERT INTO `fruiter_session` VALUES ('9', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990734', '');
INSERT INTO `fruiter_session` VALUES ('10', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990766', '');
INSERT INTO `fruiter_session` VALUES ('11', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990767', '');
INSERT INTO `fruiter_session` VALUES ('12', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990769', '');
INSERT INTO `fruiter_session` VALUES ('13', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990798', '');
INSERT INTO `fruiter_session` VALUES ('14', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990800', '');
INSERT INTO `fruiter_session` VALUES ('15', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990801', '');
INSERT INTO `fruiter_session` VALUES ('16', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990817', '');
INSERT INTO `fruiter_session` VALUES ('17', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990819', '');
INSERT INTO `fruiter_session` VALUES ('18', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990820', '');
INSERT INTO `fruiter_session` VALUES ('19', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990920', '');
INSERT INTO `fruiter_session` VALUES ('21', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990923', '');
INSERT INTO `fruiter_session` VALUES ('22', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990983', '');
INSERT INTO `fruiter_session` VALUES ('25', 'ma87pslvcf3h0bm0ft400g2cp0', '1451991023', '');
INSERT INTO `fruiter_session` VALUES ('27', 'ma87pslvcf3h0bm0ft400g2cp0', '1451991026', '');
INSERT INTO `fruiter_session` VALUES ('28', 'ma87pslvcf3h0bm0ft400g2cp0', '1451991065', '');
INSERT INTO `fruiter_session` VALUES ('29', 'ma87pslvcf3h0bm0ft400g2cp0', '1451991067', '');
INSERT INTO `fruiter_session` VALUES ('30', 'ma87pslvcf3h0bm0ft400g2cp0', '1451991068', '');
INSERT INTO `fruiter_session` VALUES ('3', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990695', '');
INSERT INTO `fruiter_session` VALUES ('12', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990364', '');
INSERT INTO `fruiter_session` VALUES ('11', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990056', '');
INSERT INTO `fruiter_session` VALUES ('10', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990008', '');
INSERT INTO `fruiter_session` VALUES ('9', 'qs63sjvbl96mj8i8a5oqlvv576', '1451990000', '');
INSERT INTO `fruiter_session` VALUES ('8', 'qs63sjvbl96mj8i8a5oqlvv576', '1451989980', '');
INSERT INTO `fruiter_session` VALUES ('7', 'qs63sjvbl96mj8i8a5oqlvv576', '1451989696', '');
INSERT INTO `fruiter_session` VALUES ('26', 'ma87pslvcf3h0bm0ft400g2cp0', '1451991025', '');
INSERT INTO `fruiter_session` VALUES ('24', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990986', '');
INSERT INTO `fruiter_session` VALUES ('23', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990984', '');
INSERT INTO `fruiter_session` VALUES ('20', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990922', '');
INSERT INTO `fruiter_session` VALUES ('2', 'ma87pslvcf3h0bm0ft400g2cp0', '1451990694', '');
