/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : fruiter

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-02-14 16:30:01
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `fruiter_attr`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_attr`;
CREATE TABLE `fruiter_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` mediumint(8) NOT NULL COMMENT '模型ID',
  `type` enum('1','2','3','4') NOT NULL COMMENT '输入控件的类型,1:输入框,2:下拉,3:单选,4:复选',
  `name` varchar(20) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `sort` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`) USING BTREE,
  CONSTRAINT `fruiter_attr_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `fruiter_model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='属性表';

-- ----------------------------
-- Records of fruiter_attr
-- ----------------------------
INSERT INTO `fruiter_attr` VALUES ('1', '2', '2', '外观尺寸', '134mm*67.2mm*9.4mm', '0');
INSERT INTO `fruiter_attr` VALUES ('2', '2', '4', '屏幕分辨率', '1920*1080,1280 x 720', '1');
INSERT INTO `fruiter_attr` VALUES ('3', '2', '1', 'CPU', '', '2');
INSERT INTO `fruiter_attr` VALUES ('5', '2', '1', '无线网络与制式 ', '', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_auth_role
-- ----------------------------
INSERT INTO `fruiter_auth_role` VALUES ('1', '0', 'Admin', '2', '商品管理', 'goods', '0', '0');
INSERT INTO `fruiter_auth_role` VALUES ('2', '1', 'Admin', '2', '商品列表', 'goods/index', '0', '1');
INSERT INTO `fruiter_auth_role` VALUES ('3', '0', 'Admin', '2', '系统管理', 'system', '1', '0');
INSERT INTO `fruiter_auth_role` VALUES ('4', '3', 'Admin', '2', '权限管理', 'auth/index', '1', '1');
INSERT INTO `fruiter_auth_role` VALUES ('5', '1', 'Admin', '2', '添加商品', 'goods/add', '1', '1');
INSERT INTO `fruiter_auth_role` VALUES ('6', '1', 'Admin', '2', '商品分类', 'GoodsCategory/index', '2', '1');
INSERT INTO `fruiter_auth_role` VALUES ('7', '1', 'Admin', '2', '规格列表', 'GoodsSpec/index', '3', '1');
INSERT INTO `fruiter_auth_role` VALUES ('8', '1', 'Admin', '2', '模型列表', 'GoodsAttr/index', '4', '1');
INSERT INTO `fruiter_auth_role` VALUES ('9', '1', 'Admin', '1', '添加模型', 'GoodsAttr/add', '5', '1');
INSERT INTO `fruiter_auth_role` VALUES ('10', '1', 'Admin', '1', '编辑商品', 'Goods/edit', '6', '1');

-- ----------------------------
-- Table structure for `fruiter_goods`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods`;
CREATE TABLE `fruiter_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `name` varchar(50) NOT NULL COMMENT '商品名称',
  `goods_no` varchar(20) NOT NULL COMMENT '商品货号',
  `model_id` int(10) NOT NULL DEFAULT '0' COMMENT '模型ID',
  `sell_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '销售价格',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价格',
  `cost_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '成本价格',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品状态 0下架 1上架',
  `up_time` int(10) DEFAULT NULL COMMENT '上架时间',
  `down_time` int(10) DEFAULT NULL COMMENT '下架时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `store_nums` int(10) NOT NULL DEFAULT '0' COMMENT '库存',
  `search_words` varchar(50) DEFAULT NULL COMMENT '商品搜索词库,逗号分隔',
  `weight` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '重量',
  `unit` varchar(6) DEFAULT NULL COMMENT '计量单位',
  `visit` int(10) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `favorite` int(10) NOT NULL DEFAULT '0' COMMENT '收藏次数',
  `comments` int(10) NOT NULL DEFAULT '0' COMMENT '评论次数',
  `sale` int(10) DEFAULT NULL COMMENT '销量',
  `sort` smallint(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除 0正常 1已删除',
  PRIMARY KEY (`id`),
  KEY `is_del` (`is_del`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_goods
-- ----------------------------
INSERT INTO `fruiter_goods` VALUES ('1', '小米手机', 's0001', '0', '1800.00', '2000.00', '500.00', '1', null, null, '0', '200', '手机', '200.00', null, '0', '0', '0', null, '0', '0');

-- ----------------------------
-- Table structure for `fruiter_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods_attr`;
CREATE TABLE `fruiter_goods_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `model_id` mediumint(8) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `attr_value` varchar(255) DEFAULT NULL,
  `sort` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `attr_id` (`attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `model_id` (`model_id`),
  CONSTRAINT `fruiter_goods_attr_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `fruiter_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fruiter_goods_attr_ibfk_2` FOREIGN KEY (`attr_id`) REFERENCES `fruiter_attr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fruiter_goods_attr_ibfk_3` FOREIGN KEY (`model_id`) REFERENCES `fruiter_model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_goods_attr
-- ----------------------------
INSERT INTO `fruiter_goods_attr` VALUES ('1', '1', '2', '1', '134mm*67.2mm*9.4mm', '0');
INSERT INTO `fruiter_goods_attr` VALUES ('2', '1', '2', '2', '2', '0');
INSERT INTO `fruiter_goods_attr` VALUES ('3', '1', '2', '3', '8核', '0');
INSERT INTO `fruiter_goods_attr` VALUES ('4', '1', '2', '5', '4G', '0');

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
-- Table structure for `fruiter_goods_detail`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods_detail`;
CREATE TABLE `fruiter_goods_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `detail` longtext COMMENT '商品详情',
  PRIMARY KEY (`id`),
  UNIQUE KEY `goods_id` (`goods_id`) USING BTREE,
  CONSTRAINT `fruiter_goods_detail_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `fruiter_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='商品详情表';

-- ----------------------------
-- Records of fruiter_goods_detail
-- ----------------------------
INSERT INTO `fruiter_goods_detail` VALUES ('1', '1', '&lt;p&gt;\r\n	反应快&lt;/p&gt;\r\n');

-- ----------------------------
-- Table structure for `fruiter_goods_seo`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods_seo`;
CREATE TABLE `fruiter_goods_seo` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL COMMENT 'SEO关键词和检索关键词',
  `description` varchar(255) DEFAULT NULL COMMENT 'SEO描述',
  PRIMARY KEY (`id`),
  UNIQUE KEY `goods_id` (`goods_id`) USING BTREE,
  CONSTRAINT `商品ID` FOREIGN KEY (`goods_id`) REFERENCES `fruiter_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品SEO表';

-- ----------------------------
-- Records of fruiter_goods_seo
-- ----------------------------
INSERT INTO `fruiter_goods_seo` VALUES ('0', '1', '手机', '小米手机');

-- ----------------------------
-- Table structure for `fruiter_goods_to_category`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods_to_category`;
CREATE TABLE `fruiter_goods_to_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL COMMENT '分类ID',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `goods_id` (`goods_id`) USING BTREE,
  CONSTRAINT `fruiter_goods_to_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `fruiter_goods_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fruiter_goods_to_category_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `fruiter_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='商品分类关联表';

-- ----------------------------
-- Records of fruiter_goods_to_category
-- ----------------------------
INSERT INTO `fruiter_goods_to_category` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for `fruiter_goods_to_commend`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods_to_commend`;
CREATE TABLE `fruiter_goods_to_commend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `commend_id` tinyint(1) NOT NULL COMMENT '推荐类型ID 1:最新商品 2:特价商品 3:热卖商品 4:推荐商品',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`) USING BTREE,
  KEY `commend_id` (`commend_id`) USING BTREE,
  CONSTRAINT `goods_id` FOREIGN KEY (`goods_id`) REFERENCES `fruiter_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='推荐商品类型关联表';

-- ----------------------------
-- Records of fruiter_goods_to_commend
-- ----------------------------
INSERT INTO `fruiter_goods_to_commend` VALUES ('1', '1', '1');

-- ----------------------------
-- Table structure for `fruiter_model`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_model`;
CREATE TABLE `fruiter_model` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '模型名称',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除 0正常 1已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='商品模型表';

-- ----------------------------
-- Records of fruiter_model
-- ----------------------------
INSERT INTO `fruiter_model` VALUES ('2', '小米手机', '0');

-- ----------------------------
-- Table structure for `fruiter_products`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_products`;
CREATE TABLE `fruiter_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `products_no` varchar(20) NOT NULL COMMENT '货品的货号(以商品的货号加横线加数字组成)',
  `spec_array` text COMMENT 'json规格数据',
  `store_nums` int(10) NOT NULL DEFAULT '0',
  `market_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价格',
  `sell_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '销售价格',
  `cost_price` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '成本价格',
  `weight` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '成本价格',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除 0正常 1已删除',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`),
  KEY `products_no` (`products_no`),
  CONSTRAINT `fruiter_products_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `fruiter_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='规格商品表';

-- ----------------------------
-- Records of fruiter_products
-- ----------------------------
INSERT INTO `fruiter_products` VALUES ('1', '1', 's0001', '[{\"id\":1,\"name\":\"内存\",\"type\":1,\"value\":\"16G\"}]', '100', '2000.00', '1800.00', '500.00', '200.00', '0');
INSERT INTO `fruiter_products` VALUES ('2', '1', 's0001', '[{\"id\":1,\"name\":\"内存\",\"type\":1,\"value\":\"32G\"}]', '100', '2000.00', '1800.00', '500.00', '200.00', '0');

-- ----------------------------
-- Table structure for `fruiter_session`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_session`;
CREATE TABLE `fruiter_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL DEFAULT '',
  `session_expire` int(11) DEFAULT NULL,
  `session_data` mediumblob,
  PRIMARY KEY (`id`,`session_id`),
  KEY `session_id` (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=774 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_session
-- ----------------------------
INSERT INTO `fruiter_session` VALUES ('767', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438414', '');
INSERT INTO `fruiter_session` VALUES ('761', 'df9ksh2slnabmbrpqov0jcr8h7', '1455437953', '');
INSERT INTO `fruiter_session` VALUES ('760', 'df9ksh2slnabmbrpqov0jcr8h7', '1455437598', '');
INSERT INTO `fruiter_session` VALUES ('773', 'n9dsvtn8ra6nh1nrc5vv9o7l53', '1455438937', '');
INSERT INTO `fruiter_session` VALUES ('765', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438212', '');
INSERT INTO `fruiter_session` VALUES ('763', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438086', '');
INSERT INTO `fruiter_session` VALUES ('764', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438168', '');
INSERT INTO `fruiter_session` VALUES ('766', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438251', '');
INSERT INTO `fruiter_session` VALUES ('762', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438013', '');
INSERT INTO `fruiter_session` VALUES ('772', 'n9dsvtn8ra6nh1nrc5vv9o7l53', '1455438906', '');
INSERT INTO `fruiter_session` VALUES ('768', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438552', '');
INSERT INTO `fruiter_session` VALUES ('769', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438617', '');
INSERT INTO `fruiter_session` VALUES ('771', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438861', '');
INSERT INTO `fruiter_session` VALUES ('770', 'df9ksh2slnabmbrpqov0jcr8h7', '1455438774', '');

-- ----------------------------
-- Table structure for `fruiter_spec`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_spec`;
CREATE TABLE `fruiter_spec` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `value` text,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示方式 1.文字',
  `remark` varchar(126) DEFAULT NULL,
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除1删除',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `is_del` (`is_del`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='商品规格表';

-- ----------------------------
-- Records of fruiter_spec
-- ----------------------------
INSERT INTO `fruiter_spec` VALUES ('1', '内存', '[\"16G\",\"32G\",\"64G\"]', '1', '内存大小', '0', '0', '0');
INSERT INTO `fruiter_spec` VALUES ('2', '颜色', '[\"红色\",\"白色\"]', '1', '', '0', '0', '0');
