/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xd_lyshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-11 21:16:01
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `xm_userinfos` VALUES ('2', '金沙', '周芷若', null, '/public/tjbITOl2jgpkvmOCRGOVGgTttiJjkYAEnkN5ce6F.png', '0', '26', '武汉市圣诞歌', null, '17483736783', '0', '1', '2019-03-06 11:23:01', '2019-03-07 11:23:06');
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
