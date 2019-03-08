/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xd_lyshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-08 20:44:29
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
INSERT INTO `xm_admin` VALUES ('1', 'xm', '1', 'f80778cbfdf2b75408ffb1c57a7c7851', '1', '15136182065', '1031473919@qq.cim', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00', null);
INSERT INTO `xm_admin` VALUES ('2', 'xc', '1', 'f80778cbfdf2b75408ffb1c57a7c7851', '1', '15136282065', null, null, '2019-02-28 11:38:27', '2019-02-28 11:38:32', null);
INSERT INTO `xm_admin` VALUES ('3', 'three', '1', 'f80778cbfdf2b75408ffb1c57a7c7851', '1', '15136882065', null, null, '2019-02-01 12:23:45', null, null);
INSERT INTO `xm_admin` VALUES ('8', '大猫', '1', '123456', '1', '15136182065', '1031473919@qq.com', '666', '2019-02-21 12:23:52', null, null);
INSERT INTO `xm_admin` VALUES ('6', '思思', '0', '123456', '1', '15136182065', '1031473919@qq.com', '888', '2019-02-28 12:24:00', null, null);
INSERT INTO `xm_admin` VALUES ('7', '大司科伟66', '1', '123456', '1', '15136182065', '1031473919@qq.com', '不错', '2019-03-02 12:24:10', null, null);
INSERT INTO `xm_admin` VALUES ('9', '大狗子666', '1', '123456', '1', '15136182065', '1031473919@qq.com', '6666', '2019-03-01 12:24:13', null, null);
INSERT INTO `xm_admin` VALUES ('10', '大秦', '1', '123456', '1', '15136182065', '1031473919@qq.com', '888', '2019-01-01 12:24:17', null, null);
INSERT INTO `xm_admin` VALUES ('11', '大秦二号', '0', '123456', '1', '15136182065', '1031473919@qq.com', '6666', null, null, null);
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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COMMENT='规则表，存放后台菜单';

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
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COMMENT='商品表';

-- ----------------------------
-- Records of xm_product
-- ----------------------------
INSERT INTO `xm_product` VALUES ('49', '狗肉', '0', '1', '4', '5338', '0', '/uploads/products/BBuuX9zfdIQlmx8ZUiScHNDuNrbAzDtStCA2VAr2.jpeg', '55', '1', '1', '0', '0', '66', '6999', '<p>5989</p>', '0', '2019-03-08 17:22:41', '2019-03-08 17:22:41');
INSERT INTO `xm_product` VALUES ('51', '狗子在变', '0', '1', '4', '5805', '0', '/uploads/products/xHXx1B3EtwWsKDlYuqvQrmIx5wsIQl0pmf8A5hl0.ico', '99', '1', '1', '0', '0', '666', '9999', '<p>三对三</p>', '0', '2019-03-08 17:29:35', '2019-03-08 17:29:35');
INSERT INTO `xm_product` VALUES ('52', '死狗子', '0', '1', '4', '6108', '0', '/uploads/products/pstMeIrrCsqc1yD7DjjNGWDBGs6ceGdTUkWxqCjz.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '666', '<p>666</p>', '66', '2019-03-08 17:31:12', '2019-03-08 17:31:12');
INSERT INTO `xm_product` VALUES ('53', '66666', '8', '7', '4', '3102', '0', '/uploads/products/c6P4jMEEagNY28L2JJW2dQnnLAeH7tBfWnHIU3vl.ico', '小孟旗舰店', '1', '1', '0', '0', '66', null, '<p>666</p>', '0', '2019-03-08 17:35:56', '2019-03-08 17:35:56');
INSERT INTO `xm_product` VALUES ('54', '哇哈哈', '8', '1', '4', '4459', '0', '/uploads/products/kjJdIiuK9eY7lHozlxmtNr1G2FekUCC4LYXETMNu.ico', '15', '1', '1', '0', '0', '658', '68', '<p>66</p>', '0', '2019-03-08 17:37:40', '2019-03-08 17:37:40');
INSERT INTO `xm_product` VALUES ('55', '哇哈哈', '8', '8', '4', '4915', '0', '/uploads/products/kjJdIiuK9eY7lHozlxmtNr1G2FekUCC4LYXETMNu.ico', '15', '1', '1', '0', '0', '658', '68', '<p>66</p>', '0', '2019-03-08 17:37:53', '2019-03-08 17:37:53');
INSERT INTO `xm_product` VALUES ('56', '哇哈哈', '6', '6', '4', '8859', '0', '/uploads/products/kjJdIiuK9eY7lHozlxmtNr1G2FekUCC4LYXETMNu.ico', '15', '1', '1', '0', '0', '658', '68', '<p>66</p>', '16', '2019-03-08 17:38:34', '2019-03-08 17:38:34');
INSERT INTO `xm_product` VALUES ('57', '无语了', '6', '6', '4', '7521', '0', '/uploads/products/XnXdSpXb24PKkpa3pXdI1wNOVRZFfqbuxBsypf7Y.ico', '58', '1', '1', '0', '0', '66', '99', '<p>66</p>', '0', '2019-03-08 17:39:54', '2019-03-08 17:39:54');
INSERT INTO `xm_product` VALUES ('58', '好粥道', '8', '1', '4', '3277', '0', '/uploads/products/Rl9azG7qZfLYHY7NLmhfOWddacZacvQW6cWLWXIj.ico', '小孟旗舰店', '1', '1', '0', '0', '556', '2156', '<p>669</p>', '0', '2019-03-08 17:42:58', '2019-03-08 17:42:58');
INSERT INTO `xm_product` VALUES ('59', '达斯科威', '8', '1', '4', '1134', '0', '/uploads/products/rMfwVoM279ciyQJUoZnTOCLQh8HxjdVL9XHTywkP.ico', '小孟旗舰店', '1', '1', '0', '0', '589', '69', '<p>996</p>', '0', '2019-03-08 17:46:17', '2019-03-08 17:46:17');
INSERT INTO `xm_product` VALUES ('60', '狗数字', '8', '1', '4', '1610', '0', '/uploads/products/w31v3pvoL9vqz5iaEn7LCne9BooQVOje3uoNlJir.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '66', '<p>66</p>', '0', '2019-03-08 17:49:44', '2019-03-08 17:49:44');
INSERT INTO `xm_product` VALUES ('43', '测试规格商品9', '0', '1', '4', '6793', '0', '/uploads/products/sWaQE3DXG0FavinAL8zzhFfKV0MIhwQ2BWH7DOLf.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '666', '<p>666</p>', '0', '2019-03-08 16:37:30', '2019-03-08 16:37:30');
INSERT INTO `xm_product` VALUES ('20', '瓜子2', '8', '1', '0', '5633', '0', '/uploads/products/E8p2nDlM8NHByXnGXv9IFOcIaxzzsrR0GdxeEfEh.ico', '小孟旗舰店', '1', '1', '0', '0', '瓜子', '好瓜子', '<p>666</p>', '0', '2019-03-07 09:31:57', '2019-03-07 09:31:57');
INSERT INTO `xm_product` VALUES ('62', '香蕉巴拉', '8', '8', '4', '5277', '0', '/uploads/products/JYUQNz5Cr5mOYQXhmY1sdDgL55x5yTpcmx4GgDyC.ico', '小孟旗舰店', '1', '1', '0', '0', '6', '66', '<p>66</p>', '0', '2019-03-08 18:18:56', '2019-03-08 18:18:56');
INSERT INTO `xm_product` VALUES ('44', '瓜子', '8', '1', '4', '3529', '0', '/uploads/products/zUz2uiiO2uOv1ZyL3LPtAhV5thoRZg2QLc5zte6A.png', 'sds', '1', '1', '0', '0', '空壳', '即可', '<p>666</p>', '0', '2019-03-08 17:08:53', '2019-03-08 17:08:53');
INSERT INTO `xm_product` VALUES ('61', '再测试一下', '0', '1', '4', '6559', '0', '/uploads/products/fNA9EKb2rakUQ66D00zXPqw3SGDiqyW46fKFZtBC.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '66', '<p>99</p>', '0', '2019-03-08 17:53:35', '2019-03-08 17:53:35');
INSERT INTO `xm_product` VALUES ('47', '雪糕', '8', '7', '1', '6699', '0', '/uploads/products/KOBibGOhRyazUaYzasqORKZX7LFzrKDtISkeO56P.png', '小孟旗舰店', '1', '1', '0', '0', '66', '26', '<p>666</p>', '0', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product` VALUES ('46', '日了狗了', '8', '7', '4', '7304', '0', '/uploads/products/zyTAvS8GihT6XNeeCygnXDpBLROUYzUO9f2lnKKs.png', '566', '1', '1', '0', '0', '88', '三对三', '<p>99</p>', '0', '2019-03-08 17:14:19', '2019-03-08 17:14:19');
INSERT INTO `xm_product` VALUES ('48', '哈密瓜', '0', '1', '4', '8807', '0', '/uploads/products/lwi5u4vls3xJ1i03jgcpAyeyWJE9slpYGnp2CTsX.gif', '的', '1', '1', '0', '0', '66', '66', '<p>三对三</p>', '0', '2019-03-08 17:19:39', '2019-03-08 17:19:39');
INSERT INTO `xm_product` VALUES ('63', '大秦二号', '0', '1', '4', '8175', '0', '/uploads/products/IhSmbZMniyQn61zadSYrSw0CTGfDN14jg81iFEqI.png', '三对三', '1', '1', '0', '0', '456', '696', '<p>66</p>', '0', '2019-03-08 20:37:20', '2019-03-08 20:37:20');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

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

-- ----------------------------
-- Table structure for `xm_product_img`
-- ----------------------------
DROP TABLE IF EXISTS `xm_product_img`;
CREATE TABLE `xm_product_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id主键',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `img` varchar(255) DEFAULT NULL COMMENT '商品图片地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='商品图片表';

-- ----------------------------
-- Records of xm_product_img
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COMMENT='商品列表_规格名称及属性绑定表';

-- ----------------------------
-- Records of xm_product_sku
-- ----------------------------
INSERT INTO `xm_product_sku` VALUES ('25', '44', '硬度:一般,大小:小', '168.00', '496.00', '0', null, '0', '1', '2019-03-08 17:08:53', '2019-03-08 17:08:53');
INSERT INTO `xm_product_sku` VALUES ('26', '44', '硬度:超硬,大小:大', '566.00', '995.00', '0', null, '0', '1', '2019-03-08 17:08:53', '2019-03-08 17:08:53');
INSERT INTO `xm_product_sku` VALUES ('3', '20', 'default:default', '0.00', '0.00', '399', null, '0', '1', '2019-03-07 11:50:08', '2019-03-07 21:18:08');
INSERT INTO `xm_product_sku` VALUES ('24', '44', '硬度:一般,大小:大', '12.00', '16.00', '0', null, '0', '1', '2019-03-08 17:08:53', '2019-03-08 17:08:53');
INSERT INTO `xm_product_sku` VALUES ('23', '43', '硬度:超硬,大小:小', '66.00', '66.00', '0', null, '0', '1', '2019-03-08 16:37:30', '2019-03-08 16:37:30');
INSERT INTO `xm_product_sku` VALUES ('22', '43', '硬度:超硬,大小:大', '66.00', '88.00', '0', null, '0', '1', '2019-03-08 16:37:30', '2019-03-08 16:37:30');
INSERT INTO `xm_product_sku` VALUES ('20', '43', '硬度:一般,大小:大', '66.00', '456.00', '0', null, '0', '1', '2019-03-08 16:37:30', '2019-03-08 16:37:30');
INSERT INTO `xm_product_sku` VALUES ('21', '43', '硬度:一般,大小:小', '56.00', '58.00', '0', null, '0', '1', '2019-03-08 16:37:30', '2019-03-08 16:37:30');
INSERT INTO `xm_product_sku` VALUES ('31', '46', '硬度:一般,大小:小', '56.00', '85.00', '0', null, '0', '1', '2019-03-08 17:14:19', '2019-03-08 17:14:19');
INSERT INTO `xm_product_sku` VALUES ('36', '47', '型号:大,颜色:白,厚度:超厚', '56.00', '6.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('35', '47', '型号:大,颜色:黑,厚度:一般厚', '59.00', '999.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('34', '47', '型号:大,颜色:黑,厚度:超厚', '15.00', '16.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('30', '46', '硬度:一般,大小:大', '56.00', '89.00', '0', null, '0', '1', '2019-03-08 17:14:19', '2019-03-08 17:14:19');
INSERT INTO `xm_product_sku` VALUES ('32', '46', '硬度:超硬,大小:大', '69.00', '59.00', '0', null, '0', '1', '2019-03-08 17:14:19', '2019-03-08 17:14:19');
INSERT INTO `xm_product_sku` VALUES ('33', '46', '硬度:超硬,大小:小', '89.00', '669.00', '0', null, '0', '1', '2019-03-08 17:14:19', '2019-03-08 17:14:19');
INSERT INTO `xm_product_sku` VALUES ('37', '47', '型号:大,颜色:白,厚度:一般厚', '66.00', '56.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('38', '47', '型号:小,颜色:黑,厚度:超厚', '56.00', '65.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('39', '47', '型号:小,颜色:黑,厚度:一般厚', '56.00', '99.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('40', '47', '型号:小,颜色:白,厚度:超厚', '66.00', '26.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('41', '47', '型号:小,颜色:白,厚度:一般厚', '269.00', '26.00', '0', null, '0', '1', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product_sku` VALUES ('42', '48', '硬度:一般,大小:大', '166.00', '999.00', '0', null, '0', '1', '2019-03-08 17:19:39', '2019-03-08 17:19:39');
INSERT INTO `xm_product_sku` VALUES ('43', '49', '硬度:一般,大小:大', '45.00', '15.00', '0', null, '0', '1', '2019-03-08 17:22:41', '2019-03-08 17:22:41');
INSERT INTO `xm_product_sku` VALUES ('44', '49', '硬度:一般,大小:小', '54.00', '5.00', '0', null, '0', '1', '2019-03-08 17:22:41', '2019-03-08 17:22:41');
INSERT INTO `xm_product_sku` VALUES ('45', '49', '硬度:超硬,大小:大', '45.00', '56.00', '0', null, '0', '1', '2019-03-08 17:22:41', '2019-03-08 17:22:41');
INSERT INTO `xm_product_sku` VALUES ('46', '49', '硬度:超硬,大小:小', '45.00', '88.00', '0', null, '0', '1', '2019-03-08 17:22:41', '2019-03-08 17:22:41');
INSERT INTO `xm_product_sku` VALUES ('52', '53', '硬度:一般,大小:大', '666.00', '666.00', '0', null, '0', '1', '2019-03-08 17:35:56', '2019-03-08 17:35:56');
INSERT INTO `xm_product_sku` VALUES ('51', '52', '硬度:一般,大小:大', '156.00', '266.00', '0', null, '0', '1', '2019-03-08 17:31:12', '2019-03-08 17:31:12');
INSERT INTO `xm_product_sku` VALUES ('50', '51', '硬度:一般,大小:大', '666.00', '565.00', '0', null, '0', '1', '2019-03-08 17:29:35', '2019-03-08 17:29:35');
INSERT INTO `xm_product_sku` VALUES ('53', '53', '硬度:一般,大小:小', '66.00', '66.00', '0', null, '0', '1', '2019-03-08 17:35:56', '2019-03-08 17:35:56');
INSERT INTO `xm_product_sku` VALUES ('54', '53', '硬度:超硬,大小:大', '66.00', '66.00', '0', null, '0', '1', '2019-03-08 17:35:56', '2019-03-08 17:35:56');
INSERT INTO `xm_product_sku` VALUES ('55', '53', '硬度:超硬,大小:小', '99.00', '66.00', '0', null, '0', '1', '2019-03-08 17:35:56', '2019-03-08 17:35:56');
INSERT INTO `xm_product_sku` VALUES ('56', '57', '硬度:一般,大小:大', '15.00', '15.00', '0', null, '0', '1', '2019-03-08 17:39:54', '2019-03-08 17:39:54');
INSERT INTO `xm_product_sku` VALUES ('57', '57', '硬度:一般,大小:小', '156.00', '58.00', '0', null, '0', '1', '2019-03-08 17:39:54', '2019-03-08 17:39:54');
INSERT INTO `xm_product_sku` VALUES ('58', '57', '硬度:超硬,大小:大', '58.00', '88.00', '0', null, '0', '1', '2019-03-08 17:39:54', '2019-03-08 17:39:54');
INSERT INTO `xm_product_sku` VALUES ('59', '57', '硬度:超硬,大小:小', '125.00', '48.00', '0', null, '0', '1', '2019-03-08 17:39:54', '2019-03-08 17:39:54');
INSERT INTO `xm_product_sku` VALUES ('60', '58', '硬度:一般,大小:大', '156.00', '7899.00', '0', null, '0', '1', '2019-03-08 17:42:58', '2019-03-08 17:42:58');
INSERT INTO `xm_product_sku` VALUES ('61', '58', '硬度:一般,大小:小', '156.00', '789.00', '0', null, '0', '1', '2019-03-08 17:42:58', '2019-03-08 17:42:58');
INSERT INTO `xm_product_sku` VALUES ('62', '58', '硬度:超硬,大小:大', '1256.00', '789.00', '0', null, '0', '1', '2019-03-08 17:42:58', '2019-03-08 17:42:58');
INSERT INTO `xm_product_sku` VALUES ('63', '58', '硬度:超硬,大小:小', '156.00', '799.00', '0', null, '0', '1', '2019-03-08 17:42:58', '2019-03-08 17:42:58');
INSERT INTO `xm_product_sku` VALUES ('64', '59', '硬度:一般,大小:大', '12.00', '188.00', '12', '66666', '0', '1', '2019-03-08 17:46:18', '2019-03-08 17:47:19');
INSERT INTO `xm_product_sku` VALUES ('65', '59', '硬度:一般,大小:小', '199.00', '1666.00', '18', '66666', '0', '1', '2019-03-08 17:46:18', '2019-03-08 17:47:19');
INSERT INTO `xm_product_sku` VALUES ('66', '59', '硬度:超硬,大小:大', '11589.00', '16689.00', '29', '66666', '0', '1', '2019-03-08 17:46:18', '2019-03-08 17:47:19');
INSERT INTO `xm_product_sku` VALUES ('67', '59', '硬度:超硬,大小:小', '889.00', '89.00', '99', '66666', '0', '1', '2019-03-08 17:46:18', '2019-03-08 17:47:19');
INSERT INTO `xm_product_sku` VALUES ('68', '60', '硬度:一般,大小:大', '15.00', '18.00', '0', null, '0', '1', '2019-03-08 17:49:44', '2019-03-08 17:49:44');
INSERT INTO `xm_product_sku` VALUES ('69', '60', '硬度:一般,大小:小', '166.00', '258.00', '0', null, '0', '1', '2019-03-08 17:49:44', '2019-03-08 17:49:44');
INSERT INTO `xm_product_sku` VALUES ('70', '60', '硬度:超硬,大小:大', '66.00', '99.00', '0', null, '0', '1', '2019-03-08 17:49:44', '2019-03-08 17:49:44');
INSERT INTO `xm_product_sku` VALUES ('71', '60', '硬度:超硬,大小:小', '88.00', '66.00', '0', null, '0', '1', '2019-03-08 17:49:44', '2019-03-08 17:49:44');
INSERT INTO `xm_product_sku` VALUES ('72', '61', '硬度:一般,大小:大', '1.00', '855.00', '0', null, '0', '1', '2019-03-08 17:53:35', '2019-03-08 17:53:35');
INSERT INTO `xm_product_sku` VALUES ('73', '61', '硬度:一般,大小:小', '15.00', '4585.00', '0', null, '0', '1', '2019-03-08 17:53:35', '2019-03-08 17:53:35');
INSERT INTO `xm_product_sku` VALUES ('74', '61', '硬度:超硬,大小:大', '125.00', '28.00', '0', null, '0', '1', '2019-03-08 17:53:35', '2019-03-08 17:53:35');
INSERT INTO `xm_product_sku` VALUES ('75', '61', '硬度:超硬,大小:小', '588.00', '66.00', '0', null, '0', '1', '2019-03-08 17:53:35', '2019-03-08 17:53:35');
INSERT INTO `xm_product_sku` VALUES ('76', '62', '硬度:一般,大小:大', '12.00', '56.00', '0', null, '0', '1', '2019-03-08 18:18:56', '2019-03-08 18:18:56');
INSERT INTO `xm_product_sku` VALUES ('77', '62', '硬度:一般,大小:小', '78.00', '96.00', '0', null, '0', '1', '2019-03-08 18:18:56', '2019-03-08 18:18:56');
INSERT INTO `xm_product_sku` VALUES ('78', '62', '硬度:超硬,大小:大', '18.00', '69.00', '0', null, '0', '1', '2019-03-08 18:18:56', '2019-03-08 18:18:56');
INSERT INTO `xm_product_sku` VALUES ('79', '62', '硬度:超硬,大小:小', '36.00', '89.00', '0', null, '0', '1', '2019-03-08 18:18:56', '2019-03-08 18:18:56');
INSERT INTO `xm_product_sku` VALUES ('80', '63', '硬度:一般,大小:大', '16.00', '85.00', '0', null, '0', '1', '2019-03-08 20:37:21', '2019-03-08 20:37:21');
INSERT INTO `xm_product_sku` VALUES ('81', '63', '硬度:一般,大小:小', '66.00', '6.00', '0', null, '0', '1', '2019-03-08 20:37:21', '2019-03-08 20:37:21');
INSERT INTO `xm_product_sku` VALUES ('82', '63', '硬度:超硬,大小:大', '69.00', '69.00', '0', null, '0', '1', '2019-03-08 20:37:21', '2019-03-08 20:37:21');
INSERT INTO `xm_product_sku` VALUES ('83', '63', '硬度:超硬,大小:小', '99.00', '89.00', '0', null, '0', '1', '2019-03-08 20:37:21', '2019-03-08 20:37:21');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='商品规格名称表';

-- ----------------------------
-- Records of xm_property_name
-- ----------------------------
INSERT INTO `xm_property_name` VALUES ('1', '[{\"name\":\"厚度\",\"value\":\"超厚\"},{\"name\":\"厚度\",\"value\":\"一般厚\"},{\"name\":\"颜色\",\"value\":\"黑\"},{\"name\":\"颜色\",\"value\":\"白\"},{\"name\":\"型号\",\"value\":\"大\"},{\"name\":\"型号\",\"value\":\"小\"}]', '测试规格1', '测试', '0', '1', '2019-03-07 15:22:06', '2019-03-07 15:22:08');
INSERT INTO `xm_property_name` VALUES ('4', '[{\"name\":\"大小\",\"value\":\"大\"},{\"name\":\"大小\",\"value\":\"小\"},{\"name\":\"硬度\",\"value\":\"一般\"},{\"name\":\"硬度\",\"value\":\"超硬\"}]', '坚果规格模板', '好吃', '0', '1', '2019-03-07 20:19:33', '2019-03-07 20:58:38');

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
