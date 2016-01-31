/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : fruiter

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-01-31 18:50:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `fruiter_attr`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_attr`;
CREATE TABLE `fruiter_attr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL COMMENT '模型ID',
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_auth_role
-- ----------------------------
INSERT INTO `fruiter_auth_role` VALUES ('1', '0', 'Admin', '2', '商品管理', 'goods', '0', '0');
INSERT INTO `fruiter_auth_role` VALUES ('2', '1', 'Admin', '2', '商品列表', 'goods/lists', '0', '1');
INSERT INTO `fruiter_auth_role` VALUES ('3', '0', 'Admin', '2', '系统管理', 'system', '1', '0');
INSERT INTO `fruiter_auth_role` VALUES ('4', '3', 'Admin', '2', '权限管理', 'auth', '1', '1');
INSERT INTO `fruiter_auth_role` VALUES ('5', '1', 'Admin', '2', '添加商品', 'goods/add', '1', '1');
INSERT INTO `fruiter_auth_role` VALUES ('6', '1', 'Admin', '2', '商品分类', 'GoodsCategory/index', '2', '1');
INSERT INTO `fruiter_auth_role` VALUES ('7', '1', 'Admin', '2', '规格列表', 'GoodsSpec/index', '3', '1');
INSERT INTO `fruiter_auth_role` VALUES ('8', '1', 'Admin', '2', '模型列表', 'GoodsAttr/index', '4', '1');
INSERT INTO `fruiter_auth_role` VALUES ('9', '1', 'Admin', '1', '添加模型', 'GoodsAttr/add', '5', '1');

-- ----------------------------
-- Table structure for `fruiter_goods`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_goods`;
CREATE TABLE `fruiter_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `name` varchar(50) NOT NULL COMMENT '商品名称',
  `goods_no` varchar(20) NOT NULL COMMENT '商品货号',
  `model_id` int(10) NOT NULL COMMENT '模型ID',
  `sell_price` decimal(10,2) NOT NULL COMMENT '销售价格',
  `market_price` decimal(10,2) DEFAULT NULL COMMENT '市场价格',
  `cost_price` decimal(10,2) DEFAULT NULL COMMENT '成本价格',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品状态 0下架 1上架',
  `commend_type` tinyint(1) DEFAULT NULL COMMENT '商品推荐类型 :\r\n1.最新商品\r\n2.特价商品\r\n3.热卖商品\r\n4.推荐商品',
  `up_time` datetime DEFAULT NULL COMMENT '上架时间',
  `down_time` datetime DEFAULT NULL COMMENT '下架时间',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `store_nums` int(10) NOT NULL DEFAULT '0' COMMENT '库存',
  `search_words` varchar(50) DEFAULT NULL COMMENT '商品搜索词库,逗号分隔',
  `weight` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '重量',
  `unit` varchar(6) DEFAULT NULL COMMENT '计量单位',
  `visit` int(10) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `favorite` int(10) NOT NULL DEFAULT '0' COMMENT '收藏次数',
  `comments` int(10) NOT NULL DEFAULT '0' COMMENT '评论次数',
  `sale` int(10) DEFAULT NULL COMMENT '销量',
  `sort` smallint(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_del` tinyint(1) DEFAULT NULL COMMENT '删除 0正常 1已删除',
  PRIMARY KEY (`id`),
  KEY `is_del` (`is_del`),
  KEY `status` (`status`),
  KEY `commend_type` (`commend_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fruiter_goods
-- ----------------------------

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
-- Table structure for `fruiter_model`
-- ----------------------------
DROP TABLE IF EXISTS `fruiter_model`;
CREATE TABLE `fruiter_model` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '模型名称',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除 0正常 1已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='商品模型表';

-- ----------------------------
-- Records of fruiter_model
-- ----------------------------
INSERT INTO `fruiter_model` VALUES ('2', '小米手机', '0');

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
INSERT INTO `fruiter_session` VALUES ('47', 'fb1m3fmqb19m11up844lueqrn5', '1454237331', '');
INSERT INTO `fruiter_session` VALUES ('46', 'fb1m3fmqb19m11up844lueqrn5', '1454237330', '');
INSERT INTO `fruiter_session` VALUES ('45', 'fb1m3fmqb19m11up844lueqrn5', '1454237294', '');
INSERT INTO `fruiter_session` VALUES ('44', 'fb1m3fmqb19m11up844lueqrn5', '1454237293', '');
INSERT INTO `fruiter_session` VALUES ('43', 'fb1m3fmqb19m11up844lueqrn5', '1454237292', '');
INSERT INTO `fruiter_session` VALUES ('42', 'fb1m3fmqb19m11up844lueqrn5', '1454237290', '');
INSERT INTO `fruiter_session` VALUES ('41', 'fb1m3fmqb19m11up844lueqrn5', '1454237281', '');
INSERT INTO `fruiter_session` VALUES ('40', 'fb1m3fmqb19m11up844lueqrn5', '1454237280', '');
INSERT INTO `fruiter_session` VALUES ('39', 'fb1m3fmqb19m11up844lueqrn5', '1454237279', '');
INSERT INTO `fruiter_session` VALUES ('38', 'fb1m3fmqb19m11up844lueqrn5', '1454237277', '');
INSERT INTO `fruiter_session` VALUES ('37', 'fb1m3fmqb19m11up844lueqrn5', '1454237265', '');
INSERT INTO `fruiter_session` VALUES ('36', 'fb1m3fmqb19m11up844lueqrn5', '1454237264', '');
INSERT INTO `fruiter_session` VALUES ('35', 'fb1m3fmqb19m11up844lueqrn5', '1454237262', '');
INSERT INTO `fruiter_session` VALUES ('34', 'fb1m3fmqb19m11up844lueqrn5', '1454237260', '');
INSERT INTO `fruiter_session` VALUES ('33', 'fb1m3fmqb19m11up844lueqrn5', '1454237248', '');
INSERT INTO `fruiter_session` VALUES ('32', 'fb1m3fmqb19m11up844lueqrn5', '1454237247', '');
INSERT INTO `fruiter_session` VALUES ('31', 'fb1m3fmqb19m11up844lueqrn5', '1454237245', '');
INSERT INTO `fruiter_session` VALUES ('30', 'fb1m3fmqb19m11up844lueqrn5', '1454237243', '');
INSERT INTO `fruiter_session` VALUES ('29', 'fb1m3fmqb19m11up844lueqrn5', '1454237227', '');
INSERT INTO `fruiter_session` VALUES ('28', 'fb1m3fmqb19m11up844lueqrn5', '1454237226', '');
INSERT INTO `fruiter_session` VALUES ('27', 'fb1m3fmqb19m11up844lueqrn5', '1454237225', '');
INSERT INTO `fruiter_session` VALUES ('26', 'fb1m3fmqb19m11up844lueqrn5', '1454237223', '');
INSERT INTO `fruiter_session` VALUES ('28', 'bcvi06vb49v2do97qce2v4tm43', '1454238649', '');
INSERT INTO `fruiter_session` VALUES ('27', 'bcvi06vb49v2do97qce2v4tm43', '1454238648', '');
INSERT INTO `fruiter_session` VALUES ('23', 'bcvi06vb49v2do97qce2v4tm43', '1454238631', '');
INSERT INTO `fruiter_session` VALUES ('24', 'bcvi06vb49v2do97qce2v4tm43', '1454238632', '');
INSERT INTO `fruiter_session` VALUES ('25', 'bcvi06vb49v2do97qce2v4tm43', '1454238633', '');
INSERT INTO `fruiter_session` VALUES ('26', 'bcvi06vb49v2do97qce2v4tm43', '1454238647', '');
INSERT INTO `fruiter_session` VALUES ('9', 'bcvi06vb49v2do97qce2v4tm43', '1454238429', '');
INSERT INTO `fruiter_session` VALUES ('8', 'bcvi06vb49v2do97qce2v4tm43', '1454238364', '');
INSERT INTO `fruiter_session` VALUES ('7', 'bcvi06vb49v2do97qce2v4tm43', '1454238363', '');
INSERT INTO `fruiter_session` VALUES ('6', 'bcvi06vb49v2do97qce2v4tm43', '1454238363', '');
INSERT INTO `fruiter_session` VALUES ('22', 'bcvi06vb49v2do97qce2v4tm43', '1454238629', '');
INSERT INTO `fruiter_session` VALUES ('21', 'bcvi06vb49v2do97qce2v4tm43', '1454238563', '');
INSERT INTO `fruiter_session` VALUES ('20', 'bcvi06vb49v2do97qce2v4tm43', '1454238562', '');
INSERT INTO `fruiter_session` VALUES ('19', 'bcvi06vb49v2do97qce2v4tm43', '1454238561', '');
INSERT INTO `fruiter_session` VALUES ('16', 'bcvi06vb49v2do97qce2v4tm43', '1454238528', '');
INSERT INTO `fruiter_session` VALUES ('17', 'bcvi06vb49v2do97qce2v4tm43', '1454238529', '');
INSERT INTO `fruiter_session` VALUES ('18', 'bcvi06vb49v2do97qce2v4tm43', '1454238559', '');
INSERT INTO `fruiter_session` VALUES ('13', 'bcvi06vb49v2do97qce2v4tm43', '1454238434', '');
INSERT INTO `fruiter_session` VALUES ('14', 'bcvi06vb49v2do97qce2v4tm43', '1454238525', '');
INSERT INTO `fruiter_session` VALUES ('15', 'bcvi06vb49v2do97qce2v4tm43', '1454238527', '');
INSERT INTO `fruiter_session` VALUES ('12', 'bcvi06vb49v2do97qce2v4tm43', '1454238433', '');
INSERT INTO `fruiter_session` VALUES ('1', 'bcvi06vb49v2do97qce2v4tm43', '1454238324', '');
INSERT INTO `fruiter_session` VALUES ('65', 'fb1m3fmqb19m11up844lueqrn5', '1454238090', '');
INSERT INTO `fruiter_session` VALUES ('64', 'fb1m3fmqb19m11up844lueqrn5', '1454238089', '');
INSERT INTO `fruiter_session` VALUES ('63', 'fb1m3fmqb19m11up844lueqrn5', '1454238088', '');
INSERT INTO `fruiter_session` VALUES ('11', 'bcvi06vb49v2do97qce2v4tm43', '1454238433', '');
INSERT INTO `fruiter_session` VALUES ('10', 'bcvi06vb49v2do97qce2v4tm43', '1454238432', '');
INSERT INTO `fruiter_session` VALUES ('5', 'bcvi06vb49v2do97qce2v4tm43', '1454238360', '');
INSERT INTO `fruiter_session` VALUES ('4', 'bcvi06vb49v2do97qce2v4tm43', '1454238329', '');
INSERT INTO `fruiter_session` VALUES ('3', 'bcvi06vb49v2do97qce2v4tm43', '1454238328', '');
INSERT INTO `fruiter_session` VALUES ('2', 'bcvi06vb49v2do97qce2v4tm43', '1454238327', '');
INSERT INTO `fruiter_session` VALUES ('48', 'fb1m3fmqb19m11up844lueqrn5', '1454237333', '');
INSERT INTO `fruiter_session` VALUES ('49', 'fb1m3fmqb19m11up844lueqrn5', '1454237334', '');
INSERT INTO `fruiter_session` VALUES ('50', 'fb1m3fmqb19m11up844lueqrn5', '1454237378', '');
INSERT INTO `fruiter_session` VALUES ('51', 'fb1m3fmqb19m11up844lueqrn5', '1454237379', '');
INSERT INTO `fruiter_session` VALUES ('52', 'fb1m3fmqb19m11up844lueqrn5', '1454237380', '');
INSERT INTO `fruiter_session` VALUES ('53', 'fb1m3fmqb19m11up844lueqrn5', '1454237381', '');
INSERT INTO `fruiter_session` VALUES ('54', 'fb1m3fmqb19m11up844lueqrn5', '1454237606', '');
INSERT INTO `fruiter_session` VALUES ('55', 'fb1m3fmqb19m11up844lueqrn5', '1454237608', '');
INSERT INTO `fruiter_session` VALUES ('56', 'fb1m3fmqb19m11up844lueqrn5', '1454237609', '');
INSERT INTO `fruiter_session` VALUES ('57', 'fb1m3fmqb19m11up844lueqrn5', '1454237610', '');
INSERT INTO `fruiter_session` VALUES ('58', 'fb1m3fmqb19m11up844lueqrn5', '1454237655', '');
INSERT INTO `fruiter_session` VALUES ('59', 'fb1m3fmqb19m11up844lueqrn5', '1454237657', '');
INSERT INTO `fruiter_session` VALUES ('60', 'fb1m3fmqb19m11up844lueqrn5', '1454237658', '');
INSERT INTO `fruiter_session` VALUES ('61', 'fb1m3fmqb19m11up844lueqrn5', '1454237659', '');
INSERT INTO `fruiter_session` VALUES ('62', 'fb1m3fmqb19m11up844lueqrn5', '1454238083', '');

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
