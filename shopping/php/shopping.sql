/*
Navicat MySQL Data Transfer

Source Server         : yima
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : shopping

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-12-20 16:13:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '管理员名称，唯一',
  `password` varchar(32) NOT NULL COMMENT '管理员密码',
  `email` varchar(60) DEFAULT NULL COMMENT '管理员邮箱',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('15', 'root', '63a9f0ea7bb98050796b649e85481845', 'root@qq.com');
INSERT INTO `admin` VALUES ('19', 'boos', 'a4545830a99a238050b460f491b39886', 'boos@qq.com');
INSERT INTO `admin` VALUES ('26', 'yima', '1f0658bc0dbddf1d7dcb81be7970f6a4', 'yima@qq.com');
INSERT INTO `admin` VALUES ('27', 'xiaoming', '97304531204ef7431330c20427d95481', 'xiaoming@qq.com');
INSERT INTO `admin` VALUES ('17', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@qq.com');
INSERT INTO `admin` VALUES ('28', 'xiaoming', '97304531204ef7431330c20427d95481', 'xiaoming@qq.com');

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pid` int(10) unsigned NOT NULL COMMENT '对应商品id',
  `albumPath` varchar(50) NOT NULL COMMENT '商品图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('43', '14', 'c4751fe414268e645fbb58fdf68b0168.jpg');
INSERT INTO `album` VALUES ('44', '14', '481bcb6ca916742b302d76015600e16b.jpg');
INSERT INTO `album` VALUES ('45', '14', 'b6c7bac47199ab39199e544dd80a0760.jpg');
INSERT INTO `album` VALUES ('46', '14', '759706b6528abb760784b28152309ddd.jpg');
INSERT INTO `album` VALUES ('47', '15', '972b9da06744de76c53f210e794879f3.jpg');
INSERT INTO `album` VALUES ('48', '15', 'a83545c8df0817f611b6761c9d2413dd.jpg');
INSERT INTO `album` VALUES ('49', '15', 'f0ef78609cac616a9d1636a397cb8a8d.jpg');
INSERT INTO `album` VALUES ('54', '17', '4e5f8ca09ad510f888d1e429b32797ab.jpg');
INSERT INTO `album` VALUES ('55', '17', '56b578bc99c672cbd6a62ed7b8cd3ee7.jpg');
INSERT INTO `album` VALUES ('56', '17', '1a0ff052b50e0ad4448847d51d3034c7.jpg');
INSERT INTO `album` VALUES ('57', '18', 'bc1e2bcea520e1e218f52ac3bdb45ee5.jpg');
INSERT INTO `album` VALUES ('58', '18', '1f633698c22f3d6cae258acbcab1a38a.jpg');
INSERT INTO `album` VALUES ('59', '18', '1b15f94c6558debbd887cc3de7af30e7.jpg');
INSERT INTO `album` VALUES ('60', '18', '11b36f252e5d2a20e25ebfc7f55a234c.jpg');
INSERT INTO `album` VALUES ('61', '19', '3235265840eb8eac2c475e9e4439c3c8.jpg');
INSERT INTO `album` VALUES ('62', '19', 'feb825a242da34b9e36613c895f9dad6.jpg');
INSERT INTO `album` VALUES ('63', '19', 'c34ff528f99f2f328519f6b7ea93791b.jpg');
INSERT INTO `album` VALUES ('64', '19', '7ab9cad0b2887f5ac600f1ad166c622d.jpg');
INSERT INTO `album` VALUES ('65', '20', '4c2481981127989a7dfbbb562d5e294f.jpg');
INSERT INTO `album` VALUES ('66', '20', '62f0e7098890f501c1afccea6fc63128.jpg');
INSERT INTO `album` VALUES ('67', '20', 'e7bbe936557ce28fb10b04eb2237dbbb.jpg');
INSERT INTO `album` VALUES ('68', '20', '9c7e401a938eb1ac5080a88ec072d81e.jpg');
INSERT INTO `album` VALUES ('69', '21', '9d582b7932569ea2e8761cebf41183cb.jpg');
INSERT INTO `album` VALUES ('70', '21', 'cdce4701d898c0b1cf148f521082fc5c.jpg');
INSERT INTO `album` VALUES ('71', '21', 'f3f4db8afcb1a0c59ad602d8c472bc7d.jpg');
INSERT INTO `album` VALUES ('72', '22', '37a329444228e6bc8af31948fca41bf1.jpg');
INSERT INTO `album` VALUES ('73', '22', 'bf33d25f590eb43c281c46c05860387f.jpg');
INSERT INTO `album` VALUES ('74', '22', 'a090db8b6cd895698ad85c6907ea5a17.jpg');
INSERT INTO `album` VALUES ('78', '24', 'eb97b1528dfb90073127d74f7aa809df.jpg');
INSERT INTO `album` VALUES ('79', '24', '59cd026c021f1ca85c1b354b75d13085.jpg');
INSERT INTO `album` VALUES ('80', '24', 'd748957de0007116f716a4706aa79dab.jpg');

-- ----------------------------
-- Table structure for cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(30) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of cate
-- ----------------------------
INSERT INTO `cate` VALUES ('1', '护肤');
INSERT INTO `cate` VALUES ('2', '面膜');
INSERT INTO `cate` VALUES ('3', '彩妆');
INSERT INTO `cate` VALUES ('4', '香水');
INSERT INTO `cate` VALUES ('5', '母婴');
INSERT INTO `cate` VALUES ('6', '家电');
INSERT INTO `cate` VALUES ('7', '鞋包');
INSERT INTO `cate` VALUES ('8', '个人洗护');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称',
  `cId` int(11) unsigned NOT NULL COMMENT '所属分类ID',
  `pSn` varchar(50) NOT NULL COMMENT '商品货号',
  `pNum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `mPrice` decimal(10,2) NOT NULL COMMENT '市场价',
  `iPrice` decimal(10,2) NOT NULL COMMENT '网站价',
  `pDesc` mediumtext NOT NULL COMMENT '商品简介',
  `pubTime` date NOT NULL COMMENT '商品上架时间',
  `isShow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '商品是否上架',
  `isHot` tinyint(1) DEFAULT '0' COMMENT '商品是否热卖',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('17', '【网红十二色动物眼影盘】完美日记xDiscovery频道探险家联名款', '3', 'YXDS0071VIP', '137', '398.00', '99.00', '<p>\r\n	<span style=\"color:#999999;font-family:微软雅黑, sans-serif;font-size:14px;\">粉质细腻 匠心配色 多种质地巧妙搭配</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#999999;font-family:微软雅黑, sans-serif;font-size:14px;\"><span style=\"color:#999999;font-family:arial, 微软雅黑;font-size:14px;\">【网红十二色动物眼影盘】完美日记xDiscovery频道探险家联名款</span><br />\r\n</span>\r\n</p>', '2019-11-29', '1', '0');
INSERT INTO `product` VALUES ('18', 'GUCCI古驰罪爱女士淡香水75ml', '4', '737052338262', '353', '1160.00', '899.00', '<span class=\"pro-title-tag\" style=\"color:#F10180;font-weight:700;font-family:微软雅黑, sans-serif;\">性感女香</span><span style=\"color:#4D4D4D;font-family:微软雅黑, sans-serif;\">&nbsp;</span><span class=\"goods-description-title\" style=\"font-size:14px;color:#999999;font-family:微软雅黑, sans-serif;\">充满着女性化的挑衅及诱惑的香氛，带给你的会是一个感叹号，而不是平直的句号形象。奢华精美的瓶身设计，令它看起来像一件艺术品般美丽。</span>', '2019-11-29', '1', '0');
INSERT INTO `product` VALUES ('19', '柔润无瑕粉底液 SPF15 30ml', '3', '085805163945 ', '3532', '486.00', '350.00', '<span class=\"pro-title-tag\" style=\"color:#F10180;font-weight:700;font-family:微软雅黑, sans-serif;\">控油补水</span><span style=\"color:#4D4D4D;font-family:微软雅黑, sans-serif;\">&nbsp;</span><span class=\"goods-description-title\" style=\"font-size:14px;color:#999999;font-family:微软雅黑, sans-serif;\">#柔润粉底液#柔润无瑕粉底液SPF1530ml,质地轻薄水润,让肌肤透亮妆容精致,轻松打造无瑕底妆更持续定妆,提亮肤色,适合瓷白肤色。</span>', '2019-11-29', '0', '0');
INSERT INTO `product` VALUES ('20', '海蓝之谜修护精华面霜传奇面霜 补水保湿滋润舒缓', '1', '747930000013', '98', '2090.00', '2550.00', '<span class=\"pro-title-tag\" style=\"color:#F10180;font-weight:700;font-family:微软雅黑, sans-serif;\">精华面霜</span><span style=\"color:#4D4D4D;font-family:微软雅黑, sans-serif;\">&nbsp;</span><span class=\"goods-description-title\" style=\"font-size:14px;color:#999999;font-family:微软雅黑, sans-serif;\">深层滋润保湿肌肤，回复柔嫩肌肤，适合偏干性肌肤使用。坚持使用，令肌肤紧致有弹性、柔嫩有光泽，肌肤宛若新生。60ml</span>', '2019-11-29', '0', '0');
INSERT INTO `product` VALUES ('21', 'SK-II 护肤面膜10片 前男友面膜 补水保湿', '2', '4979006595840', '12435', '1360.00', '1060.00', '<p class=\"pib-title-detail\" style=\"font-size:16px;color:#333333;font-weight:700;font-family:微软雅黑, sans-serif;\">\r\n	SK-II 护肤面膜10片 前男友面膜 补水保湿\r\n</p>\r\n<p style=\"color:#4D4D4D;font-family:微软雅黑, sans-serif;\">\r\n	<span class=\"pro-title-tag\" style=\"color:#F10180;font-weight:700;\">补水面膜</span><span class=\"Apple-converted-space\">&nbsp;</span><span class=\"goods-description-title\" style=\"font-size:14px;color:#999999;\">前男友面膜，贵妇爱用护肤精华贴，补水保湿，享受spa般奢宠。</span>\r\n</p>', '2019-11-29', '0', '0');
INSERT INTO `product` VALUES ('22', '李佳琦推荐爆款美容仪器脸部按摩清洁面部导出导入仪', '6', 'COLOR马卡龙粉色', '87', '299.00', '269.00', '<span style=\"color:#999999;font-family:微软雅黑, sans-serif;font-size:14px;\">法国品牌Notime源自2001年老品牌，专注美容仪研发18年，影视明星 梁洁同款，李佳琦口碑爆款推荐款，4种模式性价比超高！线上线下累计销量已突破100万件，现货速发！</span>', '2019-11-29', '1', '0');
INSERT INTO `product` VALUES ('24', '克丽丝汀迪奥小姐香水系列', '4', '3348900871977', '32', '570.00', '450.00', '<span class=\"pro-title-tag\" style=\"color:#F10180;font-weight:700;font-family:微软雅黑, sans-serif;\">迪奥小姐</span><span style=\"color:#4D4D4D;font-family:微软雅黑, sans-serif;\">&nbsp;</span><span class=\"goods-description-title\" style=\"font-size:14px;color:#999999;font-family:微软雅黑, sans-serif;\">白麝香基调柔如丝绒，注入高雅的牡丹作灵魂精华，与清甜柑橘谐美领舞香氛中调。令人沉醉于自然纯净的芳香诱惑。</span>', '2019-11-29', '1', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '会员名称',
  `password` char(32) NOT NULL COMMENT '密码',
  `sex` enum('保密','女','男') NOT NULL DEFAULT '男' COMMENT '性别',
  `email` varchar(60) DEFAULT NULL COMMENT '邮箱',
  `face` varchar(50) NOT NULL COMMENT '用户头像',
  `regTime` datetime NOT NULL COMMENT '注册时间',
  `activeFlag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
