/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xd_lyshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-16 11:16:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `xm_admin`
-- ----------------------------
DROP TABLE IF EXISTS `xm_admin`;
CREATE TABLE `xm_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id，管理员id号',
  `username` char(32) NOT NULL COMMENT '管理员用户名',
  `sex` tinyint(1) DEFAULT '1' COMMENT '性别,1男0女',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1 启用 0 禁用',
  `phone` char(11) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `commit` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(20) DEFAULT NULL COMMENT '最后登录IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';

-- ----------------------------
-- Records of xm_admin
-- ----------------------------
INSERT INTO `xm_admin` VALUES ('2', 'xm', '1', 'f80778cbfdf2b75408ffb1c57a7c7851', '1', '15136282065', null, null, '2019-02-28 11:38:27', '2019-02-28 11:38:32', null);
INSERT INTO `xm_admin` VALUES ('3', 'three', '1', 'f80778cbfdf2b75408ffb1c57a7c7851', '1', '15136882065', null, null, '2019-02-01 12:23:45', null, null);
INSERT INTO `xm_admin` VALUES ('8', '大猫', '1', '123456', '1', '15136182065', '1031473919@qq.com', '666', '2019-02-21 12:23:52', null, null);
INSERT INTO `xm_admin` VALUES ('6', '思思', '0', '123456', '1', '15136182065', '1031473919@qq.com', '888', '2019-02-28 12:24:00', null, null);
INSERT INTO `xm_admin` VALUES ('7', '大司科伟66', '1', '123456', '1', '15136182065', '1031473919@qq.com', '不错', '2019-03-02 12:24:10', null, null);
INSERT INTO `xm_admin` VALUES ('9', '大狗子666', '1', '123456', '1', '15136182065', '1031473919@qq.com', '6666', '2019-03-01 12:24:13', null, null);
INSERT INTO `xm_admin` VALUES ('10', '大秦', '1', '123456', '1', '15136182065', '1031473919@qq.com', '888', '2019-01-01 12:24:17', null, null);
INSERT INTO `xm_admin` VALUES ('13', '加成666999', '1', '123456', '1', '15136182065', '1031473919@qq.com', null, null, null, null);

-- ----------------------------
-- Table structure for `xm_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `xm_auth_group`;
CREATE TABLE `xm_auth_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL COMMENT '权限组名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1启用，0禁用',
  `rules` varchar(255) NOT NULL COMMENT '权限规则ID',
  `commit` varchar(255) DEFAULT NULL COMMENT '备注',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COMMENT='权限组表（角色表）';

-- ----------------------------
-- Records of xm_auth_group
-- ----------------------------
INSERT INTO `xm_auth_group` VALUES ('1', '超级管理员', '1', '26,29,32,33,34,35,38,39,37', '拥有至高无上的权利', '2019-02-27 21:55:58', '2019-03-01 08:55:19');
INSERT INTO `xm_auth_group` VALUES ('2', '总编', '1', '26,29,34,35,38,39,37', '6666', '2019-02-27 21:55:58', '2019-02-28 21:31:28');
INSERT INTO `xm_auth_group` VALUES ('3', '小马', '1', '26,29', '1515', '2019-02-27 21:56:44', '2019-02-27 21:56:44');
INSERT INTO `xm_auth_group` VALUES ('19', '网站编辑', '1', '26,29,32,33', '编辑', '2019-02-28 19:31:37', '2019-03-01 19:37:55');
INSERT INTO `xm_auth_group` VALUES ('20', '小伙跌', '1', '26,29,32,33,34,35,38,39,37', '666', '2019-02-28 20:44:21', '2019-02-28 20:44:21');
INSERT INTO `xm_auth_group` VALUES ('21', '乒乒乓乓', '1', '26,29,32,33', '1212', '2019-03-01 09:44:59', '2019-03-01 09:44:59');
INSERT INTO `xm_auth_group` VALUES ('22', '66666', '1', '26,29', 'ds', '2019-03-01 09:45:33', '2019-03-01 09:45:33');

-- ----------------------------
-- Table structure for `xm_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `xm_auth_rule`;
CREATE TABLE `xm_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '规则名称',
  `title` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1显示0隐藏',
  `pid` smallint(5) NOT NULL COMMENT '父级ID',
  `icon` varchar(50) DEFAULT '' COMMENT '图标',
  `sort` tinyint(40) NOT NULL COMMENT '排序',
  `path` char(100) DEFAULT '0' COMMENT '路径',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COMMENT='规则表，存放后台菜单';

-- ----------------------------
-- Records of xm_auth_rule
-- ----------------------------
INSERT INTO `xm_auth_rule` VALUES ('35', '/admin/admins', '管理员列表', '1', '1', '34', '&#xe62d;', '0', '0,34', '2019-02-27 11:36:52', '2019-02-27 15:12:47');
INSERT INTO `xm_auth_rule` VALUES ('37', '/admin/role', '角色管理', '1', '1', '34', '&#xe72c;', '11', '0,34', '2019-02-27 15:22:18', '2019-02-27 15:26:46');
INSERT INTO `xm_auth_rule` VALUES ('40', '/admin/pcates', '分类管理', '1', '1', '26', 'hui-icon', '0', '0,26', '2019-03-04 14:24:22', '2019-03-04 14:24:22');
INSERT INTO `xm_auth_rule` VALUES ('38', '/admin/admins/create', '添加', '1', '0', '35', '0', '0', '0,34,35', '2019-02-27 16:28:01', '2019-02-28 21:00:17');
INSERT INTO `xm_auth_rule` VALUES ('29', '/admin/product', '商品管理', '1', '1', '26', '&#xe616;', '1', '0,26', '2019-02-26 09:46:02', '2019-03-05 15:41:14');
INSERT INTO `xm_auth_rule` VALUES ('26', 'admin/goods', '商品管理', '1', '1', '0', '&#xe667;', '3', '0', '2019-02-26 09:29:08', '2019-02-26 09:29:08');
INSERT INTO `xm_auth_rule` VALUES ('32', 'default', '菜单管理', '1', '1', '0', '&#xe667;', '1', '0', '2019-02-26 11:08:51', '2019-02-26 11:08:51');
INSERT INTO `xm_auth_rule` VALUES ('33', '/admin/column', '后台栏目', '1', '1', '32', '1234', '3', '0,32', '2019-02-26 11:09:47', '2019-02-27 17:12:53');
INSERT INTO `xm_auth_rule` VALUES ('34', 'admin/default', '用户管理', '1', '1', '0', '&#xe62b;', '2', '0', '2019-02-27 11:29:21', '2019-02-27 11:31:14');
INSERT INTO `xm_auth_rule` VALUES ('39', '/admin/admins', '查看', '1', '0', '35', '0', '5', '0,34,35', '2019-02-27 16:45:29', '2019-02-28 21:01:00');
INSERT INTO `xm_auth_rule` VALUES ('41', '/admin/brand', '品牌管理', '1', '1', '26', 'hui-icon', '0', '0,26', '2019-03-04 18:55:28', '2019-03-04 19:01:15');
INSERT INTO `xm_auth_rule` VALUES ('42', '/admin/spec', '规格管理', '1', '1', '26', 'sds', '2', '0,26', '2019-03-05 17:34:06', '2019-03-07 15:17:08');
INSERT INTO `xm_auth_rule` VALUES ('43', '/admin/users', '普通用户', '1', '1', '34', 'hui-icon', '1', '0,34', '2019-03-11 09:28:57', '2019-03-11 09:28:57');

-- ----------------------------
-- Table structure for `xm_group_rule`
-- ----------------------------
DROP TABLE IF EXISTS `xm_group_rule`;
CREATE TABLE `xm_group_rule` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) DEFAULT NULL,
  `group_id` mediumint(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COMMENT='角色用户关系表';

-- ----------------------------
-- Records of xm_group_rule
-- ----------------------------
INSERT INTO `xm_group_rule` VALUES ('1', '1', '1', '2019-02-28 10:38:56', '2019-02-28 10:38:59');
INSERT INTO `xm_group_rule` VALUES ('2', '2', '1', '2019-02-28 11:36:21', '2019-02-28 11:36:24');
INSERT INTO `xm_group_rule` VALUES ('9', '6', '3', null, null);
INSERT INTO `xm_group_rule` VALUES ('24', '7', '19', null, null);
INSERT INTO `xm_group_rule` VALUES ('23', '7', '3', null, null);
INSERT INTO `xm_group_rule` VALUES ('22', '7', '2', null, null);
INSERT INTO `xm_group_rule` VALUES ('13', '8', '19', null, null);
INSERT INTO `xm_group_rule` VALUES ('25', '9', '2', null, null);
INSERT INTO `xm_group_rule` VALUES ('15', '10', '3', null, null);
INSERT INTO `xm_group_rule` VALUES ('16', '11', '19', null, null);
INSERT INTO `xm_group_rule` VALUES ('17', '12', '19', null, null);
INSERT INTO `xm_group_rule` VALUES ('19', '13', '2', null, null);
INSERT INTO `xm_group_rule` VALUES ('20', '13', '3', null, null);
INSERT INTO `xm_group_rule` VALUES ('21', '13', '19', null, null);

-- ----------------------------
-- Table structure for `xm_phone_code`
-- ----------------------------
DROP TABLE IF EXISTS `xm_phone_code`;
CREATE TABLE `xm_phone_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` char(11) DEFAULT NULL,
  `code` char(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COMMENT='手机验证码表';

-- ----------------------------
-- Records of xm_phone_code
-- ----------------------------

-- ----------------------------
-- Table structure for `xm_product`
-- ----------------------------
DROP TABLE IF EXISTS `xm_product`;
CREATE TABLE `xm_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '商品名称',
  `brand_id` int(11) NOT NULL DEFAULT '0' COMMENT '品牌id',
  `type_id` int(11) NOT NULL COMMENT '商品分类id',
  `spec_id` int(11) DEFAULT NULL COMMENT '规格id',
  `pro_num` varchar(255) NOT NULL DEFAULT '131555554' COMMENT '商品编号',
  `special_offer` tinyint(1) DEFAULT '0' COMMENT '优惠活动,0不优惠1优惠',
  `price` decimal(8,2) DEFAULT NULL COMMENT '商品展示价格',
  `gpic` varchar(255) NOT NULL COMMENT '商品主图',
  `company` varchar(170) DEFAULT NULL COMMENT '厂家',
  `turn` tinyint(1) DEFAULT '1' COMMENT '0不允许评论，1允许评论',
  `status` tinyint(1) DEFAULT '1' COMMENT '0已下架1已上架',
  `hot_search` tinyint(1) DEFAULT '0' COMMENT '0不热搜1热搜',
  `commend` tinyint(1) DEFAULT '0' COMMENT '0不推荐1推荐',
  `key_words` varchar(255) DEFAULT NULL COMMENT '关键词',
  `abstract` varchar(255) DEFAULT NULL COMMENT '摘要',
  `descr` varchar(255) DEFAULT NULL COMMENT '描述',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COMMENT='商品表';

-- ----------------------------
-- Records of xm_product
-- ----------------------------
INSERT INTO `xm_product` VALUES ('86', '大核桃999968', '8', '13', '5', '5350', '0', '656.00', '/uploads/products/mpNe0LIKB6ddmXARnp2hRuEqgFYDSQUdy4I5Lv6W.png', '小孟旗舰店', '1', '1', '0', '0', '66', '新疆核桃', '<p><em><strong>好吃的很</strong></em></p>', '0', '2019-03-10 14:32:07', '2019-03-15 17:16:37');
INSERT INTO `xm_product` VALUES ('87', '橘子', '8', '12', '5', '5510', '0', '12.00', '/uploads/products/FLPtO9JbNLvyNIXgFwTlJ8ttTxdtjzLepHP4zfWS.png', '小孟旗舰店', '1', '1', '0', '0', '66', '来来来', '<p>66</p>', '0', '2019-03-10 16:40:28', '2019-03-15 20:08:02');
INSERT INTO `xm_product` VALUES ('88', '可乐1', '8', '14', '5', '8096', '0', '56.00', '/uploads/products/CHAGF1QLo8Pjf3UE5gA48KqcVxqL5anihcuZkVyq.png', '小孟旗舰店', '1', '1', '0', '0', '555', '无花果好东西', '<p><strong><em>6669</em></strong></p>', '0', '2019-03-10 17:06:56', '2019-03-15 20:08:42');
INSERT INTO `xm_product` VALUES ('89', '可乐', '8', '8', '1', '1660', '0', '189.00', '/uploads/products/bSKflUkujr3TpBaJ8s9cid8peFp9Jaqzo2kZnG4U.png', '小孟旗舰店', '1', '1', '0', '0', '66', '66', '<p><strong><em><span style=\"text-decoration: underline;\">可口</span></em></strong></p>', '0', '2019-03-10 17:47:47', '2019-03-15 17:17:35');
INSERT INTO `xm_product` VALUES ('90', '小可乐', '0', '14', '0', '8761', '0', '19.00', '/uploads/products/HlzsJVBxgAg4qHAkqgdbWPcaOhouDb3GtiqOPHEz.jpeg', '小孟旗舰店', '1', '1', '0', '0', '66', '99', '<p>666</p>', '0', '2019-03-13 16:54:42', '2019-03-15 17:17:48');
INSERT INTO `xm_product` VALUES ('93', '香蕉巴拉', '0', '13', '5', '7041', '0', '659.00', '/uploads/products/jqFRNSE3sKtvPcMafk0mCRR35eIXthj01w5YOdTc.png', '66', '1', '1', '0', '0', '666', '6666', '<p>666</p>', '0', '2019-03-13 17:03:23', '2019-03-15 20:09:34');

-- ----------------------------
-- Table structure for `xm_product_brand`
-- ----------------------------
DROP TABLE IF EXISTS `xm_product_brand`;
CREATE TABLE `xm_product_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '品牌名称',
  `logo` varchar(255) DEFAULT NULL COMMENT 'logo',
  `descr` text COMMENT '描述',
  `order` int(11) NOT NULL COMMENT '排序',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='商品品牌表';

-- ----------------------------
-- Records of xm_product_brand
-- ----------------------------
INSERT INTO `xm_product_brand` VALUES ('6', '修改测试', '/uploads/images/LBp5TkQxKVXq4CkiMvy4y8omIWKVr7OejAXzfuxw.jpeg', '好吧', '0', '2019-03-05 12:04:35', '2019-03-05 12:23:31');
INSERT INTO `xm_product_brand` VALUES ('8', '花花牛', '/uploads/images/bewamg58Hwke8gots4dFVmkGTQvEprsK9AJgGq3E.ico', '好品牌', '0', '2019-03-05 13:46:14', '2019-03-05 13:46:14');
INSERT INTO `xm_product_brand` VALUES ('7', '秀牛', '/uploads/images/1or8Gy8Bx410n7JKSUjsfn4Mw8MzEMj7krHRiu0P.ico', '你好牛', '0', '2019-03-05 13:35:13', '2019-03-05 13:47:53');

-- ----------------------------
-- Table structure for `xm_product_cates`
-- ----------------------------
DROP TABLE IF EXISTS `xm_product_cates`;
CREATE TABLE `xm_product_cates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用0禁用',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of xm_product_cates
-- ----------------------------
INSERT INTO `xm_product_cates` VALUES ('1', '坚果', '0', '0', '0', '1', null, null);
INSERT INTO `xm_product_cates` VALUES ('3', '可口饮料', '0', '0', '10', '1', '2019-03-04 16:00:48', '2019-03-04 16:27:47');
INSERT INTO `xm_product_cates` VALUES ('6', '大坚果', '1', '0,1', '1', '1', '2019-03-04 16:48:44', '2019-03-04 16:48:44');
INSERT INTO `xm_product_cates` VALUES ('7', '可口可乐', '3', '0,3', '0', '1', '2019-03-04 17:12:17', '2019-03-04 17:12:17');
INSERT INTO `xm_product_cates` VALUES ('8', '百事可乐', '3', '0,3', '0', '1', '2019-03-04 17:14:57', '2019-03-04 17:14:57');
INSERT INTO `xm_product_cates` VALUES ('9', '小孟可乐', '3', '0,3', '0', '1', '2019-03-04 17:16:52', '2019-03-04 17:30:17');
INSERT INTO `xm_product_cates` VALUES ('10', '无敌大坚果', '1', '0,1', '0', '1', '2019-03-04 17:30:49', '2019-03-04 17:30:49');
INSERT INTO `xm_product_cates` VALUES ('11', '小小孟可乐', '9', '0,3,9', '0', '1', '2019-03-13 14:17:30', '2019-03-13 14:17:30');
INSERT INTO `xm_product_cates` VALUES ('12', '大大坚果', '6', '0,1,6', '0', '1', '2019-03-13 14:41:29', '2019-03-13 14:41:29');
INSERT INTO `xm_product_cates` VALUES ('13', '超级无敌大坚果', '10', '0,1,10', '0', '1', '2019-03-13 14:42:20', '2019-03-13 14:42:20');
INSERT INTO `xm_product_cates` VALUES ('14', '超级百世可乐', '8', '0,3,8', '0', '1', '2019-03-13 14:43:01', '2019-03-13 14:43:01');
INSERT INTO `xm_product_cates` VALUES ('15', '水果', '0', '0', '0', '1', '2019-03-13 14:58:54', '2019-03-13 14:58:54');
INSERT INTO `xm_product_cates` VALUES ('16', '甜点', '0', '0', '0', '1', '2019-03-13 14:59:33', '2019-03-13 14:59:33');
INSERT INTO `xm_product_cates` VALUES ('17', '热带水果', '15', '0,15', '0', '1', '2019-03-13 15:05:12', '2019-03-13 15:05:12');
INSERT INTO `xm_product_cates` VALUES ('18', '国内甜点', '16', '0,16', '0', '1', '2019-03-13 15:05:29', '2019-03-13 15:05:29');

-- ----------------------------
-- Table structure for `xm_product_img`
-- ----------------------------
DROP TABLE IF EXISTS `xm_product_img`;
CREATE TABLE `xm_product_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id主键',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `img` varchar(255) NOT NULL COMMENT '商品图片地址',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COMMENT='商品图片表';

-- ----------------------------
-- Records of xm_product_img
-- ----------------------------
INSERT INTO `xm_product_img` VALUES ('94', '88', '/uploads/products/7WkFf2xtokQKYv0VTHyeEneyIRPygZnLXFVvFFsb.png', '2019-03-15 20:08:42', '2019-03-15 20:08:42');
INSERT INTO `xm_product_img` VALUES ('92', '87', '/uploads/products/IPBJocrUCrZSkBskStfwUt61X3b5sDMJMbKYcARt.png', '2019-03-15 20:08:02', '2019-03-15 20:08:02');
INSERT INTO `xm_product_img` VALUES ('91', '87', '/uploads/products/wAax3eiXLu5ZlUwaqAhgLZxg7pUu2FyJf2Hf7FfP.png', '2019-03-15 20:08:02', '2019-03-15 20:08:02');
INSERT INTO `xm_product_img` VALUES ('82', '86', '/uploads/products/z8zy1IhC0sgF5AbpCUmvlGCHfp9jDXPKWFd4Sn2o.png', '2019-03-15 17:16:38', '2019-03-15 17:16:38');
INSERT INTO `xm_product_img` VALUES ('81', '86', '/uploads/products/HRtYnYLV4P57rZROQ1JeFyC76ueq2MeEy9YxNN6u.png', '2019-03-15 17:16:37', '2019-03-15 17:16:37');
INSERT INTO `xm_product_img` VALUES ('88', '89', '/uploads/products/LG73H2v5Md37SdeKELNaQerkfq3JsYByXcmq2t2d.png', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_img` VALUES ('87', '89', '/uploads/products/GC1fAhCmM9u03dBNee3v0VOcKdmHhMeulI84aTSa.png', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_img` VALUES ('89', '90', '/uploads/products/vdqCu6c0OyzG6qigAPXshXm0E2uUb2I2qnPFDfET.jpeg', '2019-03-15 17:17:48', '2019-03-15 17:17:48');
INSERT INTO `xm_product_img` VALUES ('95', '93', '/uploads/products/pO1S1GxzkemMztgQLSJ4tG5CfX33OQUaTQoe1yW4.ico', '2019-03-15 20:09:34', '2019-03-15 20:09:34');
INSERT INTO `xm_product_img` VALUES ('93', '88', '/uploads/products/nuThzdBO04dsF5dWEamBKRap0OYNRxkIJmQBHleS.png', '2019-03-15 20:08:42', '2019-03-15 20:08:42');

-- ----------------------------
-- Table structure for `xm_product_sku`
-- ----------------------------
DROP TABLE IF EXISTS `xm_product_sku`;
CREATE TABLE `xm_product_sku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `product_spec` varchar(255) DEFAULT NULL COMMENT '商品规格名称',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价格',
  `stock` int(11) DEFAULT '0' COMMENT '库存',
  `stock_desc` varchar(255) DEFAULT NULL COMMENT '入库描述',
  `sales` int(11) DEFAULT '0' COMMENT '销量',
  `status` tinyint(1) DEFAULT '1' COMMENT '0禁用1启用',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=249 DEFAULT CHARSET=utf8mb4 COMMENT='商品列表_规格名称及属性绑定表';

-- ----------------------------
-- Records of xm_product_sku
-- ----------------------------
INSERT INTO `xm_product_sku` VALUES ('248', '93', '大小:小,硬度:特硬', '659.00', '1656.00', '0', null, '0', '1', '2019-03-15 20:09:34', '2019-03-15 20:09:34');
INSERT INTO `xm_product_sku` VALUES ('247', '93', '大小:大,硬度:特硬', '8562.00', '499.00', '0', null, '0', '1', '2019-03-15 20:09:34', '2019-03-15 20:09:34');
INSERT INTO `xm_product_sku` VALUES ('217', '86', '大小:小,硬度:特硬', '1656.00', '65656.00', '0', null, '14', '1', '2019-03-15 17:16:38', '2019-03-15 17:16:38');
INSERT INTO `xm_product_sku` VALUES ('216', '86', '大小:大,硬度:特硬', '6569.00', '5698.00', '0', null, '220', '1', '2019-03-15 17:16:38', '2019-03-15 17:16:38');
INSERT INTO `xm_product_sku` VALUES ('233', '89', '型号:小,颜色:白,厚度:超厚', '17899.00', '166.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_sku` VALUES ('244', '88', '大小:小,硬度:特硬', '569.00', '659.00', '188', null, '160', '1', '2019-03-15 20:08:42', '2019-03-15 21:02:04');
INSERT INTO `xm_product_sku` VALUES ('240', '87', '大小:小,硬度:特硬', '689.00', '963.00', '0', null, '0', '1', '2019-03-15 20:08:02', '2019-03-15 20:08:02');
INSERT INTO `xm_product_sku` VALUES ('215', '86', '大小:小,硬度:一般', '656.00', '896.00', '0', null, '190', '1', '2019-03-15 17:16:38', '2019-03-15 17:16:38');
INSERT INTO `xm_product_sku` VALUES ('214', '86', '大小:大,硬度:一般', '1666.00', '899.00', '0', null, '120', '1', '2019-03-15 17:16:38', '2019-03-15 17:16:38');
INSERT INTO `xm_product_sku` VALUES ('232', '89', '型号:小,颜色:黑,厚度:一般厚', '1669.00', '159.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_sku` VALUES ('231', '89', '型号:小,颜色:黑,厚度:超厚', '1666.00', '156.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_sku` VALUES ('230', '89', '型号:大,颜色:白,厚度:一般厚', '1999.00', '156.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_sku` VALUES ('239', '87', '大小:大,硬度:特硬', '396.00', '96.00', '0', null, '0', '1', '2019-03-15 20:08:02', '2019-03-15 20:08:02');
INSERT INTO `xm_product_sku` VALUES ('238', '87', '大小:小,硬度:一般', '69.00', '963.00', '0', null, '0', '1', '2019-03-15 20:08:02', '2019-03-15 20:08:02');
INSERT INTO `xm_product_sku` VALUES ('237', '87', '大小:大,硬度:一般', '12.00', '56.00', '0', null, '0', '1', '2019-03-15 20:08:02', '2019-03-15 20:08:02');
INSERT INTO `xm_product_sku` VALUES ('243', '88', '大小:大,硬度:特硬', '895.00', '659.00', '2999', null, '188', '1', '2019-03-15 20:08:42', '2019-03-15 21:02:04');
INSERT INTO `xm_product_sku` VALUES ('242', '88', '大小:小,硬度:一般', '659.00', '665.00', '1899', null, '166', '1', '2019-03-15 20:08:42', '2019-03-15 21:02:04');
INSERT INTO `xm_product_sku` VALUES ('241', '88', '大小:大,硬度:一般', '56.00', '789.00', '1569', null, '120', '1', '2019-03-15 20:08:42', '2019-03-15 21:02:04');
INSERT INTO `xm_product_sku` VALUES ('234', '90', 'default:default', '19.00', '12.00', '0', null, '0', '1', '2019-03-15 17:17:48', '2019-03-15 17:17:48');
INSERT INTO `xm_product_sku` VALUES ('246', '93', '大小:小,硬度:一般', '6565.00', '852.00', '0', null, '0', '1', '2019-03-15 20:09:34', '2019-03-15 20:09:34');
INSERT INTO `xm_product_sku` VALUES ('245', '93', '大小:大,硬度:一般', '659.00', '6595.00', '0', null, '0', '1', '2019-03-15 20:09:34', '2019-03-15 20:09:34');
INSERT INTO `xm_product_sku` VALUES ('229', '89', '型号:大,颜色:黑,厚度:超厚', '199.00', '12.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_sku` VALUES ('228', '89', '型号:大,颜色:黑,厚度:一般厚', '1999.00', '166.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_sku` VALUES ('227', '89', '型号:大,颜色:白,厚度:超厚', '189.00', '156.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');
INSERT INTO `xm_product_sku` VALUES ('226', '89', '型号:小,颜色:白,厚度:一般厚', '1999.00', '126.00', '0', null, '0', '1', '2019-03-15 17:17:35', '2019-03-15 17:17:35');

-- ----------------------------
-- Table structure for `xm_property_name`
-- ----------------------------
DROP TABLE IF EXISTS `xm_property_name`;
CREATE TABLE `xm_property_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `properties` varchar(255) NOT NULL COMMENT '商品id',
  `title` varchar(255) NOT NULL COMMENT '规格名称',
  `descr` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='商品规格名称表';

-- ----------------------------
-- Records of xm_property_name
-- ----------------------------
INSERT INTO `xm_property_name` VALUES ('1', '[{\"name\":\"厚度\",\"value\":\"超厚\"},{\"name\":\"厚度\",\"value\":\"一般厚\"},{\"name\":\"颜色\",\"value\":\"黑\"},{\"name\":\"颜色\",\"value\":\"白\"},{\"name\":\"型号\",\"value\":\"大\"},{\"name\":\"型号\",\"value\":\"小\"}]', '测试规格1', '测试', '0', '1', '2019-03-07 15:22:06', '2019-03-07 15:22:08');
INSERT INTO `xm_property_name` VALUES ('5', '[{\"name\":\"大小\",\"value\":\"大\"},{\"name\":\"大小\",\"value\":\"小\"},{\"name\":\"硬度\",\"value\":\"一般\"},{\"name\":\"硬度\",\"value\":\"特硬\"}]', '坚果规格模板', '坚果规格模板', '0', '1', '2019-03-10 14:30:24', '2019-03-10 14:30:24');

-- ----------------------------
-- Table structure for `xm_system`
-- ----------------------------
DROP TABLE IF EXISTS `xm_system`;
CREATE TABLE `xm_system` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xm_system
-- ----------------------------

-- ----------------------------
-- Table structure for `xm_userinfos`
-- ----------------------------
DROP TABLE IF EXISTS `xm_userinfos`;
CREATE TABLE `xm_userinfos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(130) DEFAULT NULL,
  `real_name` varchar(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `users_pic` varchar(150) DEFAULT '' COMMENT '头像',
  `sex` smallint(3) unsigned DEFAULT '0' COMMENT '0女1男2保密',
  `birthday` varchar(12) DEFAULT NULL,
  `address` varchar(60) DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `telephone` char(11) DEFAULT NULL,
  `marital_status` tinyint(5) unsigned DEFAULT '0' COMMENT '婚姻状况:0女;1男;2保密',
  `status` tinyint(1) DEFAULT '1' COMMENT '1启用0禁用2未激活',
  `token` varchar(255) DEFAULT NULL COMMENT '安全验证令牌',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COMMENT='用户基本信息表';

-- ----------------------------
-- Records of xm_userinfos
-- ----------------------------
INSERT INTO `xm_userinfos` VALUES ('1', '小金鱼8888', '张芷溪', 'f09b546f9a883ee08c45aa3140dec1b9', '/publicTdDlSW3wtbApxKNyNOhjABsiNclJRJCDDqTndW4N.png', '0', '22', '郑州市金水区', '1031473919@qq.com', '13709257638', '0', '1', '', '2019-03-05 11:13:02', '2019-03-11 16:52:14');
INSERT INTO `xm_userinfos` VALUES ('2', '金沙', '周芷若', null, '/public/tjbITOl2jgpkvmOCRGOVGgTttiJjkYAEnkN5ce6F.png', '0', '26', '武汉市圣诞歌', null, '17483736783', '0', '1', '', '2019-03-06 11:23:01', '2019-03-07 11:23:06');
INSERT INTO `xm_userinfos` VALUES ('3', '金宪政', '司鴻伟', null, 'D:\\wamp64\\tmp\\php9167.tmp', '0', '2013年8月7日', '', null, '13909758376', '1', '1', '', '2019-03-08 10:54:49', '2019-03-08 10:54:49');
INSERT INTO `xm_userinfos` VALUES ('5', '戴维斯', '司鴻伟', null, 'D:\\wamp64\\tmp\\phpAECC.tmp', '0', '1992年6月4日', '', null, '13709758376', '0', '1', '', '2019-03-08 11:02:36', '2019-03-08 11:02:36');
INSERT INTO `xm_userinfos` VALUES ('6', '帅哥好帅', '胡歌', null, 'public/aUVv2l4vKgSM8Iz5KFBZ5bnyxAxUzE1zGENnwank.png', '1', '1983年7月24日', '', null, '15525659467', '0', '1', '', '2019-03-08 11:10:05', '2019-03-08 18:49:30');
INSERT INTO `xm_userinfos` VALUES ('8', '圣诞男神', '宋紫萱', null, 'public/taqI6fpK67SeCIAI0hVjS41IXUPuMUChOCu7TmeD.png', '1', '1991年5月0日', '', null, '15525659467', '0', '1', '', '2019-03-08 11:17:16', '2019-03-11 17:32:39');
INSERT INTO `xm_userinfos` VALUES ('9', '圣诞', '宋紫萱', null, 'public/WauiTPoo5RcjTmO1LMZIqSJegETPcJzDF3Vs8L25.png', '1', '1992年8月4日', '', null, '15525659467', '0', null, '', '2019-03-08 11:21:42', '2019-03-08 11:21:42');
INSERT INTO `xm_userinfos` VALUES ('10', '圣诞歌', '陈佳倩', null, 'public/j4baZrt07vfxSMFhL7GezrLU1Axy3CcvCWjMOFbM.png', '0', '1994年7月22日', '', null, '13909758376', '1', null, '', '2019-03-08 11:32:14', '2019-03-08 11:32:14');
INSERT INTO `xm_userinfos` VALUES ('11', '速度', '明月', null, 'public/X1FjoEo1m6L0OJ5r8es7ZEpjhQsKjAczCfaXOyWH.png', '0', '1992年6月23日', '', null, '15525659467', '1', '1', '', '2019-03-08 11:36:38', '2019-03-12 11:46:37');
INSERT INTO `xm_userinfos` VALUES ('12', '傻大个', '陈倩', null, 'public/UyWHhctvKZV5NznGLhtOpnAKxOxqXvpVzaIUDUJP.png', '0', '2012年10月12日', '', null, '水电费', '1', null, '', '2019-03-08 11:40:48', '2019-03-08 11:40:48');
INSERT INTO `xm_userinfos` VALUES ('13', '傻大个', '陈倩', null, 'public/UyWHhctvKZV5NznGLhtOpnAKxOxqXvpVzaIUDUJP.png', '0', '2012年10月12日', '', null, '水电费', '1', null, '', '2019-03-08 11:44:38', '2019-03-08 11:44:38');
INSERT INTO `xm_userinfos` VALUES ('14', '完美世界', '陈家洛', null, 'public/fvgT7150cVGoksvXtiD4rP3CzxSBYuAtOiOyfNxh.png', '1', '1990年7月7日', '', null, '15525657367', '1', null, '', '2019-03-08 16:14:26', '2019-03-08 16:14:26');
INSERT INTO `xm_userinfos` VALUES ('15', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '', '2019-03-08 18:27:39', '2019-03-08 18:27:39');
INSERT INTO `xm_userinfos` VALUES ('16', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '', '2019-03-08 18:29:52', '2019-03-08 18:29:52');
INSERT INTO `xm_userinfos` VALUES ('17', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '', '2019-03-08 18:31:37', '2019-03-08 18:31:37');
INSERT INTO `xm_userinfos` VALUES ('18', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '', '2019-03-08 18:34:04', '2019-03-08 18:34:04');
INSERT INTO `xm_userinfos` VALUES ('19', '上个月', '鞠敬伟', null, 'public/nUiiF2hGJpmzbS7zzgMTNXGML3McdRlpfrcwDmYc.png', '1', '2021年4月5日', '', null, '15525659467', '0', null, '', '2019-03-08 18:44:32', '2019-03-08 18:44:32');
INSERT INTO `xm_userinfos` VALUES ('20', '戴维斯', '鞠敬伟', null, 'public/N4ZOt6oItI59AUgEp4ClWKyhKfFQtU47Kp47kyUq.png', '0', '1996年8月24日', '', null, '15525659467', '2', null, '', '2019-03-08 18:46:07', '2019-03-08 18:46:07');
INSERT INTO `xm_userinfos` VALUES ('23', '狗子变了', null, 'f09b546f9a883ee08c45aa3140dec1b9', '', '1', null, '', '1031473919@qq.com', '15136182065', '0', '1', '', '2019-03-11 13:37:18', '2019-03-11 13:37:18');
INSERT INTO `xm_userinfos` VALUES ('24', null, null, 'f09b546f9a883ee08c45aa3140dec1b9', '', '0', null, '', '1031473919@qq.com', null, '0', '1', 'SaxPXacwrh3OzQgwPOVJZq1La2bCpM75EXDsaAE9kUDvkePqbf0O5rYTkfj7', '2019-03-12 12:14:18', '2019-03-12 12:14:53');
INSERT INTO `xm_userinfos` VALUES ('29', null, null, 'f09b546f9a883ee08c45aa3140dec1b9', '', '0', null, '', null, '15136182065', '0', '1', null, '2019-03-12 16:48:12', '2019-03-12 16:48:12');
INSERT INTO `xm_userinfos` VALUES ('30', null, null, 'f09b546f9a883ee08c45aa3140dec1b9', '', '0', null, '', null, '15136182066', '0', '1', null, '2019-03-12 16:51:23', '2019-03-12 16:51:23');
INSERT INTO `xm_userinfos` VALUES ('31', null, null, 'f09b546f9a883ee08c45aa3140dec1b9', '', '0', null, '', null, '15136182067', '0', '1', null, '2019-03-12 16:56:02', '2019-03-12 16:56:02');
