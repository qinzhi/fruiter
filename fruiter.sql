/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : fruiter

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-01-10 17:28:18
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
  `sort` mediumint(5) NOT NULL COMMENT '排序',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '级别: 0.根节点 1.二级节点 2.叶节点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_auth_role
-- ----------------------------
INSERT INTO `fruiter_auth_role` VALUES ('1', '0', 'Admin', '2', '商品管理', 'goods', '0', '0');
INSERT INTO `fruiter_auth_role` VALUES ('2', '1', 'Admin', '2', '商品列表', 'goods/lists', '0', '1');
INSERT INTO `fruiter_auth_role` VALUES ('3', '0', 'Admin', '2', '系统管理', 'system', '1', '0');
INSERT INTO `fruiter_auth_role` VALUES ('4', '3', 'Admin', '2', '权限管理', 'auth', '1', '1');
INSERT INTO `fruiter_auth_role` VALUES ('5', '1', 'Admin', '2', '添加商品', 'goods/add', '1', '1');
INSERT INTO `fruiter_auth_role` VALUES ('6', '1', 'Admin', '2', '商品分类', 'GoodsCategory/index', '1', '1');

-- ----------------------------
-- Table structure for `fruiter_goods_category`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods_category`;
CREATE TABLE `fruiter_goods_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` int(10) NOT NULL COMMENT '父分类ID',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `level` tinyint(1) NOT NULL,
  `sort` smallint(5) NOT NULL COMMENT '排序',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除 1删除 0 没删除',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='产品分类表';

-- ----------------------------
-- Records of fruiter_goods_category
-- ----------------------------
INSERT INTO `fruiter_goods_category` VALUES ('1', '0', '水果', '0', '0', '0');

-- ----------------------------
-- Table structure for `fruiter_goods_category_seo`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods_category_seo`;
CREATE TABLE `fruiter_goods_category_seo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'SEO标题title',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'SEO关键词和检索关键词',
  `descript` varchar(255) DEFAULT NULL COMMENT 'SEO描述',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='产品分类SEO表';

-- ----------------------------
-- Records of fruiter_goods_category_seo
-- ----------------------------
INSERT INTO `fruiter_goods_category_seo` VALUES ('1', '1', '水果', '水果', '水果');

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
INSERT INTO `fruiter_session` VALUES ('3', 'v9qlhfkklabupkr5r3jb8ujm67', '1452419441', '');
INSERT INTO `fruiter_session` VALUES ('1', 'v9qlhfkklabupkr5r3jb8ujm67', '1452419404', '');
INSERT INTO `fruiter_session` VALUES ('23', 'p85t1b0q2tbm15mgannuj54ro1', '1452419351', '');
INSERT INTO `fruiter_session` VALUES ('22', 'p85t1b0q2tbm15mgannuj54ro1', '1452419328', '');
INSERT INTO `fruiter_session` VALUES ('21', 'p85t1b0q2tbm15mgannuj54ro1', '1452419276', '');
INSERT INTO `fruiter_session` VALUES ('20', 'p85t1b0q2tbm15mgannuj54ro1', '1452419251', '');
INSERT INTO `fruiter_session` VALUES ('19', 'p85t1b0q2tbm15mgannuj54ro1', '1452419212', '');
INSERT INTO `fruiter_session` VALUES ('18', 'p85t1b0q2tbm15mgannuj54ro1', '1452419148', '');
INSERT INTO `fruiter_session` VALUES ('17', 'p85t1b0q2tbm15mgannuj54ro1', '1452419077', '');
INSERT INTO `fruiter_session` VALUES ('16', 'p85t1b0q2tbm15mgannuj54ro1', '1452419035', '');
INSERT INTO `fruiter_session` VALUES ('10', 'p85t1b0q2tbm15mgannuj54ro1', '1452418692', '');
INSERT INTO `fruiter_session` VALUES ('11', 'p85t1b0q2tbm15mgannuj54ro1', '1452418907', '');
INSERT INTO `fruiter_session` VALUES ('12', 'p85t1b0q2tbm15mgannuj54ro1', '1452418927', '');
INSERT INTO `fruiter_session` VALUES ('13', 'p85t1b0q2tbm15mgannuj54ro1', '1452418965', '');
INSERT INTO `fruiter_session` VALUES ('14', 'p85t1b0q2tbm15mgannuj54ro1', '1452419002', '');
INSERT INTO `fruiter_session` VALUES ('15', 'p85t1b0q2tbm15mgannuj54ro1', '1452419024', '');
INSERT INTO `fruiter_session` VALUES ('9', 'p85t1b0q2tbm15mgannuj54ro1', '1452418671', '');
INSERT INTO `fruiter_session` VALUES ('2', 'v9qlhfkklabupkr5r3jb8ujm67', '1452419413', '');
INSERT INTO `fruiter_session` VALUES ('8', 'p85t1b0q2tbm15mgannuj54ro1', '1452418648', '');
INSERT INTO `fruiter_session` VALUES ('7', 'p85t1b0q2tbm15mgannuj54ro1', '1452418612', '');
INSERT INTO `fruiter_session` VALUES ('6', 'p85t1b0q2tbm15mgannuj54ro1', '1452418520', '');
INSERT INTO `fruiter_session` VALUES ('5', 'p85t1b0q2tbm15mgannuj54ro1', '1452418438', '');
INSERT INTO `fruiter_session` VALUES ('4', 'p85t1b0q2tbm15mgannuj54ro1', '1452418321', '');
INSERT INTO `fruiter_session` VALUES ('3', 'p85t1b0q2tbm15mgannuj54ro1', '1452418235', '');
INSERT INTO `fruiter_session` VALUES ('2', 'p85t1b0q2tbm15mgannuj54ro1', '1452418107', '');
