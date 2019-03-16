/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : xdl_shop

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-03-16 11:17:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `xm_addresses`
-- ----------------------------
DROP TABLE IF EXISTS `xm_addresses`;
CREATE TABLE `xm_addresses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `uname` varchar(10) NOT NULL COMMENT '收货人',
  `phone` char(11) NOT NULL,
  `cmbProvince` varchar(15) NOT NULL COMMENT '省',
  `cmbCity` varchar(15) NOT NULL COMMENT '市',
  `cmbArea` varchar(20) NOT NULL COMMENT '区域',
  `cmbStreet` varchar(20) DEFAULT '' COMMENT '街道',
  `default` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0:否;1是',
  `detail_addr` varchar(100) NOT NULL COMMENT '详细地址',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xm_addresses
-- ----------------------------
INSERT INTO `xm_addresses` VALUES ('1', '2', '圣诞歌', '13709245897', '西藏', '日喀则地区', '日喀则市', '骚的刚刚好', '0', '很反感黄金甲圣诞歌', '2019-03-04 12:03:03', '2019-03-07 19:57:17', null);
INSERT INTO `xm_addresses` VALUES ('6', '0', '真爱你的云', '13848753455', '广东', '珠海市', '斗门区', '', '0', '就深度国际', '2019-03-07 21:37:13', '2019-03-07 21:37:13', null);

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
INSERT INTO `xm_admin` VALUES ('1', 'zhaosi', '1', 'f80778cbfdf2b75408ffb1c57a7c7851', '1', '15984073847', 'sikeweihao@sina.com', 'sd', '2019-03-05 12:03:43', null, null);

-- ----------------------------
-- Table structure for `xm_articles`
-- ----------------------------
DROP TABLE IF EXISTS `xm_articles`;
CREATE TABLE `xm_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '规则名称',
  `source` varchar(20) NOT NULL,
  `auth` varchar(10) NOT NULL,
  `category` int(10) NOT NULL,
  `content` text NOT NULL COMMENT '状态',
  `recommend` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告位推荐状况   0:未推荐;      1:已推荐',
  `allow` smallint(50) unsigned NOT NULL DEFAULT '0' COMMENT '评论开关  0:关闭;  1:开启;',
  `keywords` varchar(25) NOT NULL COMMENT '排序',
  `reading_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阅读量',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC COMMENT='\r\n文章详情表\r\n用户编号：使用这个字段关联用户\r\n\r\n类别编号：使用这个字段关联文章所属的类别\r\n\r\n审核状态：用于标记文章是否审核，值 1 为审核通过，值 0 表示还没审核\r\n\r\n推荐状态：数值越大推荐的人就越多，用户每推荐一次数值增 1 \r\n\r\n评论开关：设置文章是否充许评论，值 1 为充许评论，值 0 则不充许评论\r\n';

-- ----------------------------
-- Records of xm_articles
-- ----------------------------
INSERT INTO `xm_articles` VALUES ('1', '时代光华', '收到货', '收到货后', '3', '<p>师弟过关<br/></p>', '0', '0', '收到货后', '0', '2019-02-28 10:52:13', null, null);
INSERT INTO `xm_articles` VALUES ('4', '冯提莫', '水电费手机关机', 'UK太科技局', '21', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0064.gif\"/>好好计划</p>', '3', '0', '和研究局', '0', '2019-02-28 14:52:38', null, null);
INSERT INTO `xm_articles` VALUES ('5', '人体写生标准平方方案', '的借记卡和多个', '几句', '13', '<p>的房交会放得开<br/></p>', '0', '0', '还记得回家', '0', '2019-02-24 07:52:47', null, null);
INSERT INTO `xm_articles` VALUES ('6', '呵呵呵', '狮吼电竞', '二军大果', '13', '<p>水电费辉煌即将<br/></p>', '1', '0', '时代光华', '0', '2019-02-26 08:52:57', null, null);
INSERT INTO `xm_articles` VALUES ('7', '时代感刚刚过过过过过', '重庆日报', '句酷', '4', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0043.gif\"/></p>', '1', '0', '和研究局', '0', null, null, null);
INSERT INTO `xm_articles` VALUES ('8', '急急如律令', '大花金鸡菊', '戴维斯', '9', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0081.gif\"/>&lt;p&gt;欢聚一堂急急急&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0040.gif&quot;/&gt;&lt;/p&gt;</p>', '0', '0', '十多个环境', '0', null, null, null);
INSERT INTO `xm_articles` VALUES ('9', '过过过过过', '重庆日报', '收到货黄金', '15', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0064.gif\"/></p>', '0', '0', '大哥', '0', null, null, null);
INSERT INTO `xm_articles` VALUES ('10', '杨洋过过', '重庆日报', '收到货黄金', '4', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0062.gif\"/></p>', '1', '0', '大哥', '0', null, null, null);
INSERT INTO `xm_articles` VALUES ('11', '升华红黑过过', '重庆日报', '收到货黄金', '15', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0028.gif\"/></p>', '0', '0', '大哥', '0', null, null, null);
INSERT INTO `xm_articles` VALUES ('12', '同样的错误不可再犯', '东方红', '水电工', '15', '<p><img src=\"http://img.baidu.com/hi/ldw/w_0031.gif\"/></p>', '2', '0', '大哥', '0', null, null, null);
INSERT INTO `xm_articles` VALUES ('13', '暴力操作节点', '东方红', '水电工', '15', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0033.gif\"/></p>', '2', '0', '大哥', '0', null, null, null);
INSERT INTO `xm_articles` VALUES ('15', 'SH', 'SDG', 'EWT', '14', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0016.gif\"/></p>', '1', '0', 'EWTY', '0', null, null, null);

-- ----------------------------
-- Table structure for `xm_articles_ratings`
-- ----------------------------
DROP TABLE IF EXISTS `xm_articles_ratings`;
CREATE TABLE `xm_articles_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL COMMENT '用户名',
  `user_id` int(11) DEFAULT NULL COMMENT '评论者user表id',
  `content` varchar(255) NOT NULL,
  `evaluate_vating` smallint(10) unsigned NOT NULL COMMENT '评价等级:   0好评;1中评;2差评',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COMMENT='文章评论表';

-- ----------------------------
-- Records of xm_articles_ratings
-- ----------------------------
INSERT INTO `xm_articles_ratings` VALUES ('1', '图如同仁堂', '1', '时代光华规划和', '2', '2019-03-02 21:52:33', '2019-03-04 17:13:44', null);
INSERT INTO `xm_articles_ratings` VALUES ('2', '第四个', '2', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0043.gif\"/></p>', '0', '2019-03-03 19:53:25', '2019-03-07 09:15:24', null);
INSERT INTO `xm_articles_ratings` VALUES ('3', '二医院', '3', '让我回电话鼓风机', '0', '2019-02-28 21:54:04', '2019-03-03 22:13:57', null);
INSERT INTO `xm_articles_ratings` VALUES ('13', '上个月', null, '<p>是的骨灰盒<br/></p>', '1', '2019-03-07 09:22:19', '2019-03-07 09:22:19', null);
INSERT INTO `xm_articles_ratings` VALUES ('6', '大商股份', '5', '第三方黄金分割司法局伤筋动骨联合会', '0', '2019-02-28 21:13:36', '2019-03-01 20:14:36', null);
INSERT INTO `xm_articles_ratings` VALUES ('9', '富商大贾', '4', '<p>第三方或电话<br/></p>', '0', '2019-03-05 23:06:00', '2019-03-06 23:06:17', null);
INSERT INTO `xm_articles_ratings` VALUES ('10', '结果收到货后好', '3', '<p>&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0016.gif&quot;/&gt;&lt;/p&gt;</p>', '0', '2019-02-26 23:06:04', '2019-03-07 09:25:08', null);
INSERT INTO `xm_articles_ratings` VALUES ('11', '戴维斯', '6', '<p>时代光华<br/></p>', '0', '2019-03-01 23:06:10', '2019-03-06 23:06:25', null);

-- ----------------------------
-- Table structure for `xm_articles_types`
-- ----------------------------
DROP TABLE IF EXISTS `xm_articles_types`;
CREATE TABLE `xm_articles_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL COMMENT '分类名称',
  `cate_keywords` varchar(120) NOT NULL,
  `cate_title` varchar(20) NOT NULL,
  `cate_descr` varchar(255) NOT NULL,
  `cate_path` varchar(20) NOT NULL DEFAULT '0',
  `cate_status` tinyint(6) DEFAULT '0',
  `cate_views` tinyint(10) NOT NULL DEFAULT '0' COMMENT '查看次数',
  `cate_order` tinyint(2) NOT NULL COMMENT '排序',
  `cate_pid` tinyint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `created_at` varchar(12) DEFAULT NULL,
  `updated_at` varchar(12) DEFAULT NULL,
  `deleted_at` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COMMENT='文章分类表';

-- ----------------------------
-- Records of xm_articles_types
-- ----------------------------
INSERT INTO `xm_articles_types` VALUES ('2', '电话反倒是更好', '时代光华', '收到刀锋市规划和', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0004.gif\"/></p>', '0', '0', '0', '0', '1', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('3', '都市生活', '是当归红花酊', '水电费是否', '<p>灯火辉煌或<br/></p>', '0', '0', '0', '0', '0', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('4', '言情', '富国基金', '苦与乐', '<p>管道符号急急急<br/></p>', '0', '0', '0', '0', '0', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('35', '魔幻电话手表', '时代光华', '收到货后', '<p>收到货后好十多个<br/></p>', '0', '0', '0', '0', '2', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('13', '艺术', '颂德歌功', '问题', '<p>时代感刚刚和<br/></p>', '0,6', '0', '0', '0', '6', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('40', '散文', '珍惜', '森马', '<p>广而告之<br/></p>', '0', '0', '0', '0', '0', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('32', '军旅生活', '圣诞歌', '三等功', '<p>&nbsp;▉&nbsp;&nbsp; 是否是个哈哈哈 ▋</p>', '0,15', '0', '0', '0', '15', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('31', '速度', '水电工', '是大法官好', '<p>时代光华h<br/></p>', '0,3,14', '0', '0', '0', '14', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('14', '卡卡西', '发生大红花', '是大法官', '<p>时代感刚刚和<br/></p>', '0,3', '0', '0', '0', '3', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('30', '颂德歌功', '收到货后', '的高规格', '<p>时代光华规划<br/></p>', '0,4', '0', '0', '0', '4', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('21', '散文', '颂德歌功', '是大法官', '<p>尽力就好<br/></p>', '0,6,13', '0', '0', '0', '13', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('22', '散文', '颂德歌功', '是大法官', '<p>尽力就好<br/></p>', '0,6,13', '0', '0', '0', '13', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('23', '散文', '颂德歌功', '是大法官', '<p>是个广告<br/></p>', '0,6,13', '0', '0', '0', '13', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('24', '散文', '颂德歌功', '是大法官', '<p>是个广告<br/></p>', '0,6,13', '0', '0', '0', '13', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('25', '散文', '颂德歌功', '是大法官', '<p>是个广告<br/></p>', '0,6,13', '0', '0', '0', '13', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('42', '申达股份', '时代光华', '发送给', '<p>股价高考<img src=\"http://img.baidu.com/hi/jx2/j_0016.gif\"/></p>', '0,15,32', '0', '0', '0', '32', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('27', '温柔', 'so  much', '是大法官', '<p>时代光华规划<br/></p>', '0,6,13', '0', '0', '0', '13', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('28', '悲剧', '人气', '朋友', '<p>服务器<br/></p>', '0,6,13', '0', '0', '0', '13', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('36', '二乎乎', '时代光华', '收到货后', '<p>111 11 1<br/></p>', '0', '0', '0', '0', '2', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('37', '魔幻电话手表电话', '时11111', '收嗯嗯嗯', '<p>哈哈哈哈哈哈 <br/></p>', '0', '0', '0', '0', '0', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('38', '111111', '11111111', '收到货后', '<p>刀锋<br/></p>', '0', '0', '0', '0', '0', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('39', '都市生活', '1111111111', '1111111111', '<p>111111<br/></p>', '0', '0', '0', '0', '0', null, null, null);
INSERT INTO `xm_articles_types` VALUES ('41', '寡妇', '告', '个', '<p>是个广告<br/></p>', '0', '0', '0', '0', '0', null, null, null);

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
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COMMENT='规则表，存放后台菜单';

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
INSERT INTO `xm_auth_rule` VALUES ('43', '/admin/order_logis', '订单管理', '1', '1', '0', null, '0', '0', '2019-03-09 12:13:03', '2019-03-09 15:28:05');
INSERT INTO `xm_auth_rule` VALUES ('44', '/admin/article', '文章管理', '1', '1', '0', null, '0', '0', '2019-03-09 12:40:29', '2019-03-09 12:40:29');
INSERT INTO `xm_auth_rule` VALUES ('45', '/admin/article_rat', '文章评论管理', '1', '1', '44', null, '0', '0,44', '2019-03-09 12:44:20', '2019-03-09 12:44:20');
INSERT INTO `xm_auth_rule` VALUES ('46', '/admin/article_types', '文章分类管理', '1', '1', '44', null, '0', '0,44', '2019-03-09 12:46:36', '2019-03-09 12:46:36');
INSERT INTO `xm_auth_rule` VALUES ('47', '/admin/article_infos', '文章详情', '1', '1', '44', null, '0', '0,44', '2019-03-09 12:48:56', '2019-03-09 12:48:56');
INSERT INTO `xm_auth_rule` VALUES ('55', '/admin/order_logis', '订单物流管理', '1', '1', '43', null, '0', '0,43', '2019-03-09 15:50:06', '2019-03-09 15:50:06');
INSERT INTO `xm_auth_rule` VALUES ('49', '/admin/expr_manages', '物流公司管理', '1', '1', '43', null, '0', '0,43', '2019-03-09 15:31:50', '2019-03-09 15:31:50');
INSERT INTO `xm_auth_rule` VALUES ('50', '/admin/friend_links', '友情链接管理', '1', '1', '0', null, '0', '0', '2019-03-09 15:37:01', '2019-03-09 15:37:01');
INSERT INTO `xm_auth_rule` VALUES ('51', '/admin/friend_links', '友情链接', '1', '1', '50', null, '0', '0,50', '2019-03-09 15:38:56', '2019-03-09 15:38:56');
INSERT INTO `xm_auth_rule` VALUES ('52', '/admin/view_pagers', '轮播管理', '1', '1', '0', null, '0', '0', '2019-03-09 15:44:25', '2019-03-09 15:44:25');
INSERT INTO `xm_auth_rule` VALUES ('53', '/admin/viewp_cates', '轮播图分类', '1', '1', '52', null, '0', '0,52', '2019-03-09 15:45:27', '2019-03-09 15:45:27');
INSERT INTO `xm_auth_rule` VALUES ('54', '/admin/view_pagers', '轮播图片管理', '1', '1', '52', null, '0', '0,52', '2019-03-09 15:48:05', '2019-03-09 15:48:05');
INSERT INTO `xm_auth_rule` VALUES ('56', '/admin/order_list', '订单数据管理', '1', '1', '43', null, '0', '0,43', '2019-03-09 19:48:16', '2019-03-09 19:48:16');

-- ----------------------------
-- Table structure for `xm_expr_manages`
-- ----------------------------
DROP TABLE IF EXISTS `xm_expr_manages`;
CREATE TABLE `xm_expr_manages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL COMMENT '收货人姓名',
  `logo` varchar(255) NOT NULL,
  `expr_code` varchar(20) NOT NULL COMMENT '物流编码',
  `descr` varchar(255) NOT NULL COMMENT '快递公司描述',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '禁用状态  0:已禁用;  1:已启用',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='专门管理物流公司的表,里面包括快递代码,  禁用状态';

-- ----------------------------
-- Records of xm_expr_manages
-- ----------------------------
INSERT INTO `xm_expr_manages` VALUES ('12', '商大歌舞厅', 'public/CHSrd3zZ2OpRQkd9RNQP5d7foQPDvBhT8itEFnvX.jpeg', 'rtjhtykjgkljhl', '十多个点发货和', '1', '2019-03-11 22:34:56', '2019-03-11 22:34:56', null);
INSERT INTO `xm_expr_manages` VALUES ('11', '青花第三个', 'public/fzG6pLqYhjpMsPj75K0yxTfkrF6lbxoUeXMtrPiG.jpeg', 'sdgghsdh', '水电费哈哈哈', '1', '2019-03-11 22:31:45', '2019-03-11 22:31:45', null);
INSERT INTO `xm_expr_manages` VALUES ('6', '百世快递', 'public/XsJXAIyz9cpxbFzRfA43QeVGgzjl8Dh9YXpdxe4V.jpeg', 'sdgdfhgjfgj', '给对方鬼地方很多和', '1', '2019-03-04 15:53:51', '2019-03-09 16:11:39', null);
INSERT INTO `xm_expr_manages` VALUES ('7', '全峰物流', 'public/6LEHtYvimiRFnbmo8jMVwtb7tZjEAK8RMraHwT2R.jpeg', 'sdgdfhgjfgj', '经过付款', '0', '2019-02-20 15:53:36', '2019-03-09 16:10:59', null);
INSERT INTO `xm_expr_manages` VALUES ('10', '特容易问题', 'public/QK9G0jJNKV0UG7LBLBzZPcNbbJV2BJKv8PHq4Uzg.png', 'wertreydfhdghsr', '是的工业化', '1', '2019-03-09 15:33:24', '2019-03-09 15:33:24', null);

-- ----------------------------
-- Table structure for `xm_friend_links`
-- ----------------------------
DROP TABLE IF EXISTS `xm_friend_links`;
CREATE TABLE `xm_friend_links` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `links_name` varchar(50) NOT NULL,
  `path` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `display` smallint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COMMENT='友情链接表';

-- ----------------------------
-- Records of xm_friend_links
-- ----------------------------
INSERT INTO `xm_friend_links` VALUES ('1', '若森数字', 'wwwrosen.com', 'public/LXelL9583tigzlfLjZGutZQbpehnJjl7n3JtxnyJ.jpeg', '0', '2019-03-01 21:43:06', '2019-03-01 21:43:10', null);
INSERT INTO `xm_friend_links` VALUES ('24', '惊世毒妃', 'https://m.huya.com/', 'public/xnMOOWMgaWOFnsnbkMoectUivMpbnVOsR25EV0CE.jpeg', '0', null, null, null);
INSERT INTO `xm_friend_links` VALUES ('4', '柔柔弱弱若若若', '分公司打工', 'public/n8W5MzW2nzC42v0LSqIEBBVMHAjapDOz53CcG2Ai.jpeg', '0', '2019-02-27 12:04:12', null, null);
INSERT INTO `xm_friend_links` VALUES ('5', '灌灌灌灌', '孤鸿寡鹄', 'public/7B5BrBXdd1OcLIiE9J8DLLJtRPse9XM0CXY15x8V.png', '0', '2019-03-01 07:04:19', null, null);
INSERT INTO `xm_friend_links` VALUES ('6', '第三个', '颂德歌功', 'public/9vX32bnRM0xUjAGXaGaLJDAcgVB5rSbRcMWVjEzz.png', '0', '2019-03-01 15:04:26', null, null);
INSERT INTO `xm_friend_links` VALUES ('8', '秦霜', 'https://www.douyu.com/', 'public/dMGUBJcQTiioX94APgJLJe1hUW6GncBMtJjkyL7n.png', '0', '2019-02-21 15:04:32', null, null);
INSERT INTO `xm_friend_links` VALUES ('9', '凡人歌', '儿童', 'public/4aco8BxS51H5BHrq7PRsyKDZ8TQuepxpRuKWrHk1.png', '0', '2019-02-18 15:04:41', null, null);
INSERT INTO `xm_friend_links` VALUES ('10', '问题', '我天天', 'public/gLLtDvkMtcBQJXS9mprmpnXJqxw4oGys1VvLXkdr.png', '0', '2019-02-24 15:04:46', null, null);
INSERT INTO `xm_friend_links` VALUES ('11', '打广告', '十多个', 'public/VCzR43Ha5ilgyxi3mDwJ9KAJmFIg7khY8ddpMv1I.png', '0', '2019-03-01 15:04:51', null, null);
INSERT INTO `xm_friend_links` VALUES ('12', '十多个打广告', '收到货', 'public/I1jv0oAMJLk4FSeE0OBClrkoyzE3Row3MiubV8bE.png', '0', '2019-03-02 12:04:55', null, null);
INSERT INTO `xm_friend_links` VALUES ('13', '广告', '收到货', 'public/I1jv0oAMJLk4FSeE0OBClrkoyzE3Row3MiubV8bE.png', '0', '2019-03-07 19:05:01', null, null);
INSERT INTO `xm_friend_links` VALUES ('17', '广告', '收到货', 'public/I1jv0oAMJLk4FSeE0OBClrkoyzE3Row3MiubV8bE.png', '0', '2019-02-08 15:05:08', null, null);
INSERT INTO `xm_friend_links` VALUES ('15', 'SHOU广告', '收到货', 'public/I1jv0oAMJLk4FSeE0OBClrkoyzE3Row3MiubV8bE.png', '0', '2019-02-28 15:05:13', null, null);
INSERT INTO `xm_friend_links` VALUES ('18', '广告', '收到货', 'public/7pkTXA2XaF1CgSWbyIAOsToQOfO9kS4D0rwaHmyg.png', '0', '2019-03-04 15:05:28', null, null);
INSERT INTO `xm_friend_links` VALUES ('21', '毛毛米亚', '收到货', 'public/kwFimMjB2r6ZMZJLXreBSdHNtqigl5txJnxt8rXB.png', '0', null, null, null);

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
-- Table structure for `xm_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `xm_order_goods`;
CREATE TABLE `xm_order_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '商品名称',
  `gpic` varchar(100) NOT NULL DEFAULT '0' COMMENT '商品图片',
  `address` varchar(55) NOT NULL COMMENT '默认收货地址',
  `order_id` int(10) NOT NULL DEFAULT '0' COMMENT '外键,值为订单总表的id',
  `nums` tinyint(10) unsigned NOT NULL DEFAULT '1' COMMENT '商品数量',
  `price` decimal(10,0) unsigned NOT NULL COMMENT 'user表里用户的id',
  `total_price` decimal(10,0) NOT NULL COMMENT '商品总价',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='订单商品详情表';

-- ----------------------------
-- Records of xm_order_goods
-- ----------------------------
INSERT INTO `xm_order_goods` VALUES ('1', 'sdgdfjh', 'public/CHSrd3zZ2OpRQkd9RNQP5d7foQPDvBhT8itEFnvX.jpeg', 'sdgdfh', '3', '2', '23', '49', '2019-03-13 17:58:53', '2019-03-13 17:58:59', null);
INSERT INTO `xm_order_goods` VALUES ('2', 'sdghdfh', 'public/fzG6pLqYhjpMsPj75K0yxTfkrF6lbxoUeXMtrPiG.jpeg', '是的观后感', '2', '1', '33', '33', '2019-03-06 17:59:55', '2019-03-11 17:59:59', null);
INSERT INTO `xm_order_goods` VALUES ('3', '水电费管道符号', 'public/XsJXAIyz9cpxbFzRfA43QeVGgzjl8Dh9YXpdxe4V.jpeg', '时代光华', '4', '2', '23', '46', '2019-03-05 18:00:43', '2019-03-11 18:00:47', null);
INSERT INTO `xm_order_goods` VALUES ('4', 'fsdghh', 'public/6LEHtYvimiRFnbmo8jMVwtb7tZjEAK8RMraHwT2R.jpeg', '傻大个', '7', '2', '20', '40', '2019-03-05 18:01:44', '2019-03-13 18:01:48', null);
INSERT INTO `xm_order_goods` VALUES ('5', '是大哥大法官', '/uploads/images/LBp5TkQxKVXq', '颂德歌功', '4', '1', '47', '47', '2019-03-12 18:03:19', '2019-03-13 18:03:23', null);
INSERT INTO `xm_order_goods` VALUES ('6', '地负海涵', '/uploads/images/1or8Gy8Bx410n7JKSUjsfn4Mw8MzEMj7krHRiu0P.ico', '对方过后会', '2', '2', '34', '68', '2019-03-11 18:04:12', '2019-03-13 18:04:16', null);

-- ----------------------------
-- Table structure for `xm_order_infos`
-- ----------------------------
DROP TABLE IF EXISTS `xm_order_infos`;
CREATE TABLE `xm_order_infos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(200) NOT NULL,
  `pay_model` varchar(30) NOT NULL DEFAULT '0' COMMENT '付款方式',
  `address` varchar(55) NOT NULL COMMENT '默认收货地址',
  `buyer_mess` varchar(200) DEFAULT NULL,
  `gid` int(10) NOT NULL,
  `user_id` int(10) unsigned NOT NULL COMMENT 'user表里用户的id',
  `pay_time` datetime NOT NULL COMMENT '支付时间',
  `logistics_fee` decimal(10,0) NOT NULL COMMENT '运费',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of xm_order_infos
-- ----------------------------

-- ----------------------------
-- Table structure for `xm_order_lists`
-- ----------------------------
DROP TABLE IF EXISTS `xm_order_lists`;
CREATE TABLE `xm_order_lists` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '用户表id',
  `aid` int(10) NOT NULL COMMENT '收货地址表id',
  `order_code` varchar(200) NOT NULL COMMENT '订单编号',
  `gd_action` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '商品操作 1退货;2退款',
  `order_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态 \n\n0,未下单,1已下单,2未发货,3已发货,4已收货,5已评价\n',
  `buyer_mess` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COMMENT='订单数据管理表';

-- ----------------------------
-- Records of xm_order_lists
-- ----------------------------
INSERT INTO `xm_order_lists` VALUES ('1', '6', '5', 'sdghdhfgjjj', '0', '2', '安东尼戴维斯', '2019-03-04 17:59:30', '2019-03-09 22:54:45', null);
INSERT INTO `xm_order_lists` VALUES ('3', '4', '2', 'fsdgdh', '0', '3', '第三方时代光华规划', '2019-03-09 18:53:51', '2019-03-14 17:55:17', null);
INSERT INTO `xm_order_lists` VALUES ('4', '3', '5', 'sdhgdtjhj', '0', '1', '首都皇宫电话有', '2019-03-09 18:54:21', '2019-03-09 18:54:21', null);
INSERT INTO `xm_order_lists` VALUES ('5', '6', '3', 'dfjhgfjhgkk', '0', '2', '时代光华hjghjf的好方法国际化', '2019-03-09 19:42:54', '2019-03-09 19:42:54', null);
INSERT INTO `xm_order_lists` VALUES ('6', '6', '7', 'fhdfjklsdjgldahjg', '0', '1', 'fhjflkytl', '2019-03-09 19:43:33', '2019-03-09 19:43:33', null);
INSERT INTO `xm_order_lists` VALUES ('7', '7', '7', 'njklhjghjkasdfjklag', '0', '2', 'fgjtyikylll', '2019-03-09 19:43:59', '2019-03-09 19:43:59', null);
INSERT INTO `xm_order_lists` VALUES ('8', '9', '7', 'ghrjkjyietykjhg', '0', '2', '大概会让大家体育课', '2019-03-09 19:44:26', '2019-03-09 19:44:26', null);
INSERT INTO `xm_order_lists` VALUES ('9', '6', '9', 'sdhgfdjyujjk', '0', '2', '发生的高科技了的萨芬交换机', '2019-03-09 19:45:07', '2019-03-09 19:45:07', null);
INSERT INTO `xm_order_lists` VALUES ('10', '6', '3', 'sdgdfhgsjhsdj', '0', '1', 'sdhgdjhj', '2019-03-09 20:24:35', '2019-03-09 20:24:35', null);
INSERT INTO `xm_order_lists` VALUES ('11', '5', '7', 'sdfgdshg', '0', '2', '发送蛋糕的好机会', '2019-03-14 16:56:44', '2019-03-14 16:56:44', null);
INSERT INTO `xm_order_lists` VALUES ('12', '3', '7', 'sdgdeehsj', '0', '2', '少打个电话和', '2019-03-14 17:54:53', '2019-03-14 17:54:53', null);

-- ----------------------------
-- Table structure for `xm_order_logistics`
-- ----------------------------
DROP TABLE IF EXISTS `xm_order_logistics`;
CREATE TABLE `xm_order_logistics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(50) NOT NULL DEFAULT '000000000000000' COMMENT '订单编号',
  `logistics_name` varchar(10) NOT NULL COMMENT '物流名称  ',
  `telephone` char(11) NOT NULL COMMENT '配送人手机号',
  `phone` char(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='订单物流表';

-- ----------------------------
-- Records of xm_order_logistics
-- ----------------------------
INSERT INTO `xm_order_logistics` VALUES ('1', '237466528236532', '京东物流', '15525659467', '18829538365', '2019-03-05 12:00:10', '2019-03-05 14:13:30', null);
INSERT INTO `xm_order_logistics` VALUES ('2', '000000000000000', '中通快递', '15523457695', '18829538987', '2019-03-05 12:00:32', '2019-03-05 12:00:32', null);
INSERT INTO `xm_order_logistics` VALUES ('5', '000000000000000', '顺风快递', '13987583763', '18792352432', '2019-03-05 12:02:09', '2019-03-05 12:02:09', null);
INSERT INTO `xm_order_logistics` VALUES ('6', '174658446736374', '邮政EMS', '13709758376', '18792344325', '2019-03-05 12:02:41', '2019-03-05 14:17:44', null);
INSERT INTO `xm_order_logistics` VALUES ('10', '000000000000000', '汇通快递', '15525657896', '15038783456', '2019-03-05 14:01:22', '2019-03-05 14:01:22', null);
INSERT INTO `xm_order_logistics` VALUES ('8', '000000000000000', '韵达快递', '13909758376', '18792382524', '2019-03-05 12:03:28', '2019-03-05 12:03:28', null);
INSERT INTO `xm_order_logistics` VALUES ('9', '000000000000000', '汇通快递', '15525657896', '15038783456', '2019-03-05 13:37:43', '2019-03-05 13:37:43', null);

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
INSERT INTO `xm_product` VALUES ('6', '狗肉', '0', '30', '4', '5338', '0', '/uploads/products/BBuuX9zfdIQlmx8ZUiScHNDuNrbAzDtStCA2VAr2.jpeg', '55', '1', '1', '0', '0', '66', '6999', '<p>5989</p>', '0', '2019-03-08 17:22:41', '2019-03-08 17:22:41');
INSERT INTO `xm_product` VALUES ('51', '潘玮柏', '0', '11', '4', '5805', '0', '/uploads/products/xHXx1B3EtwWsKDlYuqvQrmIx5wsIQl0pmf8A5hl0.ico', '99', '1', '1', '0', '0', '666', '9999', '<p>三对三</p>', '0', '2019-03-08 17:29:35', '2019-03-08 17:29:35');
INSERT INTO `xm_product` VALUES ('52', '死狗子', '0', '12', '4', '6108', '0', '/uploads/products/pstMeIrrCsqc1yD7DjjNGWDBGs6ceGdTUkWxqCjz.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '666', '<p>666</p>', '66', '2019-03-08 17:31:12', '2019-03-08 17:31:12');
INSERT INTO `xm_product` VALUES ('53', '友谊', '8', '26', '4', '3102', '0', '/uploads/products/c6P4jMEEagNY28L2JJW2dQnnLAeH7tBfWnHIU3vl.ico', '小孟旗舰店', '1', '1', '0', '0', '66', null, '<p>666</p>', '0', '2019-03-08 17:35:56', '2019-03-08 17:35:56');
INSERT INTO `xm_product` VALUES ('54', '哇哈哈', '8', '24', '4', '4459', '0', '/uploads/products/kjJdIiuK9eY7lHozlxmtNr1G2FekUCC4LYXETMNu.ico', '15', '1', '1', '0', '0', '658', '68', '<p>66</p>', '0', '2019-03-08 17:37:40', '2019-03-08 17:37:40');
INSERT INTO `xm_product` VALUES ('55', '哇哈哈', '8', '11', '4', '4915', '0', '/uploads/products/kjJdIiuK9eY7lHozlxmtNr1G2FekUCC4LYXETMNu.ico', '15', '1', '1', '0', '0', '658', '68', '<p>66</p>', '0', '2019-03-08 17:37:53', '2019-03-08 17:37:53');
INSERT INTO `xm_product` VALUES ('56', '哇哈哈', '6', '14', '4', '8859', '0', '/uploads/products/kjJdIiuK9eY7lHozlxmtNr1G2FekUCC4LYXETMNu.ico', '15', '1', '1', '0', '0', '658', '68', '<p>66</p>', '16', '2019-03-08 17:38:34', '2019-03-08 17:38:34');
INSERT INTO `xm_product` VALUES ('57', '无语了', '6', '23', '4', '7521', '0', '/uploads/products/XnXdSpXb24PKkpa3pXdI1wNOVRZFfqbuxBsypf7Y.ico', '58', '1', '1', '0', '0', '66', '99', '<p>66</p>', '0', '2019-03-08 17:39:54', '2019-03-08 17:39:54');
INSERT INTO `xm_product` VALUES ('58', '好粥道', '8', '24', '4', '3277', '0', '/uploads/products/Rl9azG7qZfLYHY7NLmhfOWddacZacvQW6cWLWXIj.ico', '小孟旗舰店', '1', '1', '0', '0', '556', '2156', '<p>669</p>', '0', '2019-03-08 17:42:58', '2019-03-08 17:42:58');
INSERT INTO `xm_product` VALUES ('59', '达斯科威', '8', '26', '4', '1134', '0', '/uploads/products/rMfwVoM279ciyQJUoZnTOCLQh8HxjdVL9XHTywkP.ico', '小孟旗舰店', '1', '1', '0', '0', '589', '69', '<p>996</p>', '0', '2019-03-08 17:46:17', '2019-03-08 17:46:17');
INSERT INTO `xm_product` VALUES ('60', '狗数字', '8', '14', '4', '1610', '0', '/uploads/products/w31v3pvoL9vqz5iaEn7LCne9BooQVOje3uoNlJir.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '66', '<p>66</p>', '0', '2019-03-08 17:49:44', '2019-03-08 17:49:44');
INSERT INTO `xm_product` VALUES ('43', '测试规格商品9', '0', '14', '4', '6793', '0', '/uploads/products/sWaQE3DXG0FavinAL8zzhFfKV0MIhwQ2BWH7DOLf.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '666', '<p>666</p>', '0', '2019-03-08 16:37:30', '2019-03-08 16:37:30');
INSERT INTO `xm_product` VALUES ('20', '瓜子2', '8', '32', '0', '5633', '0', '/uploads/products/E8p2nDlM8NHByXnGXv9IFOcIaxzzsrR0GdxeEfEh.ico', '小孟旗舰店', '1', '1', '0', '0', '瓜子', '好瓜子', '<p>666</p>', '0', '2019-03-07 09:31:57', '2019-03-07 09:31:57');
INSERT INTO `xm_product` VALUES ('62', '香蕉巴拉', '8', '33', '4', '5277', '0', '/uploads/products/JYUQNz5Cr5mOYQXhmY1sdDgL55x5yTpcmx4GgDyC.ico', '小孟旗舰店', '1', '1', '0', '0', '6', '66', '<p>66</p>', '0', '2019-03-08 18:18:56', '2019-03-08 18:18:56');
INSERT INTO `xm_product` VALUES ('44', '瓜子', '8', '29', '4', '3529', '0', '/uploads/products/zUz2uiiO2uOv1ZyL3LPtAhV5thoRZg2QLc5zte6A.png', 'sds', '1', '1', '0', '0', '空壳', '即可', '<p>666</p>', '0', '2019-03-08 17:08:53', '2019-03-08 17:08:53');
INSERT INTO `xm_product` VALUES ('61', '再测试一下', '0', '35', '8', '6559', '0', '/uploads/products/fNA9EKb2rakUQ66D00zXPqw3SGDiqyW46fKFZtBC.ico', '小孟旗舰店', '1', '1', '0', '0', '66', '66', '<p>99</p>', '0', '2019-03-08 17:53:35', '2019-03-08 17:53:35');
INSERT INTO `xm_product` VALUES ('47', '雪糕', '8', '26', '1', '6699', '0', '/uploads/products/KOBibGOhRyazUaYzasqORKZX7LFzrKDtISkeO56P.png', '小孟旗舰店', '1', '1', '0', '0', '66', '26', '<p>666</p>', '0', '2019-03-08 17:16:40', '2019-03-08 17:16:40');
INSERT INTO `xm_product` VALUES ('46', '日了狗了', '8', '37', '4', '7304', '0', '/uploads/products/zyTAvS8GihT6XNeeCygnXDpBLROUYzUO9f2lnKKs.png', '566', '1', '1', '0', '0', '88', '三对三', '<p>99</p>', '0', '2019-03-08 17:14:19', '2019-03-08 17:14:19');
INSERT INTO `xm_product` VALUES ('48', '哈密瓜', '0', '37', '4', '8807', '0', '/uploads/products/lwi5u4vls3xJ1i03jgcpAyeyWJE9slpYGnp2CTsX.gif', '的', '1', '1', '0', '0', '66', '66', '<p>三对三</p>', '0', '2019-03-08 17:19:39', '2019-03-08 17:19:39');
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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of xm_product_cates
-- ----------------------------
INSERT INTO `xm_product_cates` VALUES ('1', '坚果', '0', '0', '0', '1', null, null);
INSERT INTO `xm_product_cates` VALUES ('23', '可乐戒指', '4', '0,22,4', '0', '1', '2019-03-10 17:18:19', '2019-03-10 17:18:19');
INSERT INTO `xm_product_cates` VALUES ('3', '大坚果', '1', '0,1', '1', '1', '2019-03-04 16:48:44', '2019-03-04 16:48:44');
INSERT INTO `xm_product_cates` VALUES ('4', '可口可乐', '22', '0,22', '0', '1', '2019-03-04 17:12:17', '2019-03-10 17:15:37');
INSERT INTO `xm_product_cates` VALUES ('5', '百事可乐', '22', '0,22', '0', '1', '2019-03-04 17:14:57', '2019-03-10 17:15:54');
INSERT INTO `xm_product_cates` VALUES ('6', '小孟可乐', '5', '0,22,5', '0', '1', '2019-03-04 17:16:52', '2019-03-10 17:16:51');
INSERT INTO `xm_product_cates` VALUES ('7', '无敌大坚果', '1', '0,1', '0', '1', '2019-03-04 17:30:49', '2019-03-04 17:30:49');
INSERT INTO `xm_product_cates` VALUES ('8', '松鼠坚果', '1', '0,1', '0', '1', '2019-03-04 16:40:59', '2019-03-07 16:41:06');
INSERT INTO `xm_product_cates` VALUES ('9', '剩女坚果', '8', '0,1,8', '0', '1', '2019-03-06 16:43:02', '2019-03-08 16:43:07');
INSERT INTO `xm_product_cates` VALUES ('11', '可乐可乐', '5', '0,22,5', '0', '1', '2019-03-10 16:53:10', '2019-03-10 17:17:18');
INSERT INTO `xm_product_cates` VALUES ('12', '乐乐可可', '5', '0,22,5', '0', '1', '2019-03-10 16:53:35', '2019-03-10 17:17:40');
INSERT INTO `xm_product_cates` VALUES ('22', '饮料', '0', '0', '0', '1', '2019-03-10 17:15:15', '2019-03-10 17:15:15');
INSERT INTO `xm_product_cates` VALUES ('14', '老妹儿可乐', '4', '0,22,4', '0', '1', '2019-03-10 16:54:38', '2019-03-10 17:16:30');
INSERT INTO `xm_product_cates` VALUES ('15', '水果', '0', '0', '0', '1', '2019-03-10 17:07:43', '2019-03-10 17:07:43');
INSERT INTO `xm_product_cates` VALUES ('16', '炒货', '0', '0', '0', '1', '2019-03-10 17:08:04', '2019-03-10 17:08:04');
INSERT INTO `xm_product_cates` VALUES ('17', '苹果', '15', '0,15', '0', '1', '2019-03-10 17:08:47', '2019-03-10 17:08:47');
INSERT INTO `xm_product_cates` VALUES ('18', '香蕉', '15', '0,15', '0', '1', '2019-03-10 17:09:06', '2019-03-10 17:09:06');
INSERT INTO `xm_product_cates` VALUES ('19', '饼干', '16', '0,16', '0', '1', '2019-03-10 17:09:20', '2019-03-10 17:09:20');
INSERT INTO `xm_product_cates` VALUES ('20', '瓜子', '16', '0,16', '0', '1', '2019-03-10 17:10:10', '2019-03-10 17:10:10');
INSERT INTO `xm_product_cates` VALUES ('21', '橘子', '15', '0,15', '0', '1', '2019-03-10 17:10:25', '2019-03-10 17:10:25');
INSERT INTO `xm_product_cates` VALUES ('24', '青苹果', '17', '0,15,17', '0', '1', '2019-03-10 17:32:58', '2019-03-10 17:32:58');
INSERT INTO `xm_product_cates` VALUES ('25', '红苹果', '17', '0,15,17', '0', '1', '2019-03-10 17:33:15', '2019-03-10 17:33:15');
INSERT INTO `xm_product_cates` VALUES ('26', '猴子吃', '18', '0,15,18', '0', '1', '2019-03-10 17:34:01', '2019-03-10 17:34:01');
INSERT INTO `xm_product_cates` VALUES ('27', '人类吃', '18', '0,15,18', '0', '1', '2019-03-10 17:34:18', '2019-03-10 17:34:18');
INSERT INTO `xm_product_cates` VALUES ('28', '松鼠吃', '3', '0,1,3', '0', '1', '2019-03-10 17:35:12', '2019-03-10 17:35:12');
INSERT INTO `xm_product_cates` VALUES ('29', '考拉吃', '3', '0,1,3', '0', '1', '2019-03-10 17:35:35', '2019-03-10 17:35:35');
INSERT INTO `xm_product_cates` VALUES ('30', '雄霸天下牌', '7', '0,1,7', '0', '1', '2019-03-10 17:36:29', '2019-03-10 17:37:02');
INSERT INTO `xm_product_cates` VALUES ('31', '绝无神牌', '7', '0,1,7', '0', '1', '2019-03-10 17:36:49', '2019-03-10 17:36:49');
INSERT INTO `xm_product_cates` VALUES ('32', '棕橘', '21', '0,15,21', '0', '1', '2019-03-10 17:38:14', '2019-03-10 17:38:14');
INSERT INTO `xm_product_cates` VALUES ('33', '香橘子', '21', '0,15,21', '0', '1', '2019-03-10 17:38:40', '2019-03-10 17:38:40');
INSERT INTO `xm_product_cates` VALUES ('34', '膨化饼干', '19', '0,16,19', '0', '1', '2019-03-10 17:39:16', '2019-03-10 17:39:16');
INSERT INTO `xm_product_cates` VALUES ('35', '千层饼干', '19', '0,16,19', '0', '1', '2019-03-10 17:39:38', '2019-03-10 17:39:38');
INSERT INTO `xm_product_cates` VALUES ('36', '西瓜子', '20', '0,16,20', '0', '1', '2019-03-10 17:40:06', '2019-03-10 17:40:06');
INSERT INTO `xm_product_cates` VALUES ('37', '炒熟多味瓜子', '20', '0,16,20', '0', '1', '2019-03-10 17:40:45', '2019-03-10 17:41:19');

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

-- ----------------------------
-- Table structure for `xm_userinfos`
-- ----------------------------
DROP TABLE IF EXISTS `xm_userinfos`;
CREATE TABLE `xm_userinfos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(130) NOT NULL,
  `real_name` varchar(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `users_pic` varchar(150) DEFAULT '' COMMENT '头像',
  `sex` smallint(3) unsigned DEFAULT '0' COMMENT '0女1男2保密',
  `birthday` varchar(12) DEFAULT NULL,
  `address` varchar(60) DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `telephone` char(11) DEFAULT NULL,
  `marital_status` tinyint(5) unsigned DEFAULT '0' COMMENT '婚姻状况:0女;1男;2保密',
  `status` tinyint(1) DEFAULT '1' COMMENT '1启用0禁用',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COMMENT='用户基本信息表';

-- ----------------------------
-- Records of xm_userinfos
-- ----------------------------
INSERT INTO `xm_userinfos` VALUES ('1', '小金鱼8888', '张芷溪', 'f09b546f9a883ee08c45aa3140dec1b9', '/publicTdDlSW3wtbApxKNyNOhjABsiNclJRJCDDqTndW4N.png', '0', '22', '郑州市金水区', '1031473919@qq.com', '13709257638', '0', '1', '2019-03-05 11:13:02', '2019-03-11 16:52:14');
INSERT INTO `xm_userinfos` VALUES ('2', '金沙', '周芷若', 'f80778cbfdf2b75408ffb1c57a7c7851', '/public/tjbITOl2jgpkvmOCRGOVGgTttiJjkYAEnkN5ce6F.png', '0', '26', '武汉市圣诞歌', '1427560573@qq.com', '15038783473', '0', '1', '2019-03-06 11:23:01', '2019-03-15 22:06:46');
INSERT INTO `xm_userinfos` VALUES ('3', '金宪政', '司鴻伟', null, 'D:\\wamp64\\tmp\\php9167.tmp', '0', '2013年8月7日', '', null, '13909758376', '1', '1', '2019-03-08 10:54:49', '2019-03-08 10:54:49');
INSERT INTO `xm_userinfos` VALUES ('5', '戴维斯', '司鴻伟', null, 'D:\\wamp64\\tmp\\phpAECC.tmp', '0', '1992年6月4日', '', null, '13709758376', '0', '1', '2019-03-08 11:02:36', '2019-03-08 11:02:36');
INSERT INTO `xm_userinfos` VALUES ('6', '帅哥好帅', '胡歌', null, 'public/aUVv2l4vKgSM8Iz5KFBZ5bnyxAxUzE1zGENnwank.png', '1', '1983年7月24日', '', null, '15525659467', '0', '1', '2019-03-08 11:10:05', '2019-03-08 18:49:30');
INSERT INTO `xm_userinfos` VALUES ('8', '圣诞男神', '宋紫萱', null, 'public/taqI6fpK67SeCIAI0hVjS41IXUPuMUChOCu7TmeD.png', '1', '1991年5月0日', '', null, '15525659467', '0', '1', '2019-03-08 11:17:16', '2019-03-11 17:32:39');
INSERT INTO `xm_userinfos` VALUES ('9', '圣诞', '宋紫萱', null, 'public/WauiTPoo5RcjTmO1LMZIqSJegETPcJzDF3Vs8L25.png', '1', '1992年8月4日', '', null, '15525659467', '0', null, '2019-03-08 11:21:42', '2019-03-08 11:21:42');
INSERT INTO `xm_userinfos` VALUES ('10', '圣诞歌', '陈佳倩', null, 'public/j4baZrt07vfxSMFhL7GezrLU1Axy3CcvCWjMOFbM.png', '0', '1994年7月22日', '', null, '13909758376', '1', null, '2019-03-08 11:32:14', '2019-03-08 11:32:14');
INSERT INTO `xm_userinfos` VALUES ('11', '速度', '明月', null, 'public/X1FjoEo1m6L0OJ5r8es7ZEpjhQsKjAczCfaXOyWH.png', '0', '1992年6月23日', '', null, '15525659467', '1', null, '2019-03-08 11:36:38', '2019-03-08 11:36:38');
INSERT INTO `xm_userinfos` VALUES ('12', '傻大个', '陈倩', null, 'public/UyWHhctvKZV5NznGLhtOpnAKxOxqXvpVzaIUDUJP.png', '0', '2012年10月12日', '', null, '水电费', '1', null, '2019-03-08 11:40:48', '2019-03-08 11:40:48');
INSERT INTO `xm_userinfos` VALUES ('13', '傻大个', '陈倩', null, 'public/UyWHhctvKZV5NznGLhtOpnAKxOxqXvpVzaIUDUJP.png', '0', '2012年10月12日', '', null, '水电费', '1', null, '2019-03-08 11:44:38', '2019-03-08 11:44:38');
INSERT INTO `xm_userinfos` VALUES ('14', '完美世界', '陈家洛', null, 'public/fvgT7150cVGoksvXtiD4rP3CzxSBYuAtOiOyfNxh.png', '1', '1990年7月7日', '', null, '15525657367', '1', null, '2019-03-08 16:14:26', '2019-03-08 16:14:26');
INSERT INTO `xm_userinfos` VALUES ('15', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '2019-03-08 18:27:39', '2019-03-08 18:27:39');
INSERT INTO `xm_userinfos` VALUES ('16', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '2019-03-08 18:29:52', '2019-03-08 18:29:52');
INSERT INTO `xm_userinfos` VALUES ('17', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '2019-03-08 18:31:37', '2019-03-08 18:31:37');
INSERT INTO `xm_userinfos` VALUES ('18', '个十多个', '时代光华', null, 'public/rrYdRSDhAVDJzv3tpToEVFFYm7zihhghEM16B4f4.png', '1', '2000年7月20日', '', null, '13709758376', '1', null, '2019-03-08 18:34:04', '2019-03-08 18:34:04');
INSERT INTO `xm_userinfos` VALUES ('19', '上个月', '鞠敬伟', null, 'public/nUiiF2hGJpmzbS7zzgMTNXGML3McdRlpfrcwDmYc.png', '1', '2021年4月5日', '', null, '15525659467', '0', null, '2019-03-08 18:44:32', '2019-03-08 18:44:32');
INSERT INTO `xm_userinfos` VALUES ('20', '戴维斯', '鞠敬伟', null, 'public/N4ZOt6oItI59AUgEp4ClWKyhKfFQtU47Kp47kyUq.png', '0', '1996年8月24日', '', null, '15525659467', '2', null, '2019-03-08 18:46:07', '2019-03-08 18:46:07');
INSERT INTO `xm_userinfos` VALUES ('23', '狗子变了', null, 'f09b546f9a883ee08c45aa3140dec1b9', '', '1', null, '', '1031473919@qq.com', '15136182065', '0', '1', '2019-03-11 13:37:18', '2019-03-11 13:37:18');

-- ----------------------------
-- Table structure for `xm_viewp_cates`
-- ----------------------------
DROP TABLE IF EXISTS `xm_viewp_cates`;
CREATE TABLE `xm_viewp_cates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(10) NOT NULL COMMENT '分类名称',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COMMENT='轮播图分类表';

-- ----------------------------
-- Records of xm_viewp_cates
-- ----------------------------
INSERT INTO `xm_viewp_cates` VALUES ('3', '文章栏目', '2019-03-05 19:19:42', '2019-03-05 19:19:42', null);
INSERT INTO `xm_viewp_cates` VALUES ('4', '商品详情页左侧', '2019-03-05 19:13:39', '2019-03-05 19:13:39', null);
INSERT INTO `xm_viewp_cates` VALUES ('5', '商品圣诞坏公公', '2019-03-05 19:13:55', '2019-03-05 19:13:55', null);
INSERT INTO `xm_viewp_cates` VALUES ('6', '商品圣帅哥', '2019-03-05 19:13:59', '2019-03-05 19:13:59', null);
INSERT INTO `xm_viewp_cates` VALUES ('7', '文章列表左侧', '2019-03-05 19:14:13', '2019-03-05 19:14:13', null);
INSERT INTO `xm_viewp_cates` VALUES ('8', '用户信息页右侧', '2019-03-05 19:14:32', '2019-03-05 19:14:32', null);
INSERT INTO `xm_viewp_cates` VALUES ('9', '深度国际', '2019-03-05 19:31:48', '2019-03-05 19:31:48', null);
INSERT INTO `xm_viewp_cates` VALUES ('10', '发帅哥', '2019-03-05 19:48:08', '2019-03-05 20:09:59', null);

-- ----------------------------
-- Table structure for `xm_view_pagers`
-- ----------------------------
DROP TABLE IF EXISTS `xm_view_pagers`;
CREATE TABLE `xm_view_pagers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pictures` varchar(70) NOT NULL DEFAULT '' COMMENT '轮播图图片',
  `title` varchar(15) NOT NULL COMMENT '标题',
  `cate_id` int(11) NOT NULL COMMENT '轮播分类表的自增id',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='轮播图管理表';

-- ----------------------------
-- Records of xm_view_pagers
-- ----------------------------
INSERT INTO `xm_view_pagers` VALUES ('1', 'public/iZY0cAtveAlCyO0sgVD6PIVuN02GvynMF9laoONW.jpeg', '爱上打广告', '1', '2019-03-10 20:58:10', '2019-03-10 20:58:10', null);
INSERT INTO `xm_view_pagers` VALUES ('2', 'public/kilXPg7kGFUvRIC9favhsFbVkYt2I49hJ1LHZC3v.jpeg', '胡歌手机', '2', '2019-03-03 09:15:22', '2019-03-09 16:08:18', null);
INSERT INTO `xm_view_pagers` VALUES ('3', 'public/GElf9zI3eYyhKg6gAzfQCYj0BSHYge6qzM4uCAN9.jpeg', '步惊云', '4', '2019-03-09 16:05:37', '2019-03-09 16:05:37', null);
INSERT INTO `xm_view_pagers` VALUES ('4', 'public/nddlWlYsELJ7EV9GCoZPTjAKABmYRHVsYATzHXmj.jpeg', '聂风', '3', '2019-03-09 16:06:05', '2019-03-10 20:57:20', null);
