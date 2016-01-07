/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : fruiter

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2016-01-07 19:02:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fruiter_auth_role`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_auth_role`;
CREATE TABLE `fruiter_auth_role` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) NOT NULL DEFAULT '0',
  `module` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '类型：1.url 2.菜单',
  `name` char(20) NOT NULL COMMENT '规则中文描述',
  `site` char(50) NOT NULL COMMENT '规则唯一标识',
  `sort` mediumint(5) DEFAULT NULL COMMENT '排序',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '级别: 0.根节点 1.二级节点 2.叶节点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_auth_role
-- ----------------------------
INSERT INTO `fruiter_auth_role` VALUES ('1', '0', 'Admin', '2', '商品管理', 'goods', null, '0');
INSERT INTO `fruiter_auth_role` VALUES ('2', '1', 'Admin', '2', '商品列表', 'goods/lists', '0', '0');

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
INSERT INTO `fruiter_session` VALUES ('1', 'qjph2kuo5v4rgo2krdidkmq441', '1452165711', '');
INSERT INTO `fruiter_session` VALUES ('3', 'qjph2kuo5v4rgo2krdidkmq441', '1452165942', '');
INSERT INTO `fruiter_session` VALUES ('2', 'qjph2kuo5v4rgo2krdidkmq441', '1452165844', '');
