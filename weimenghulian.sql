/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : weimenghulian

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-11-26 21:03:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for weimenghulian_access
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_access`;
CREATE TABLE `weimenghulian_access` (
  `role_id` int(5) NOT NULL,
  `node_id` text,
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='授权表';

-- ----------------------------
-- Records of weimenghulian_access
-- ----------------------------
INSERT INTO `weimenghulian_access` VALUES ('1', 'a:154:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:2:\"25\";i:3;s:2:\"67\";i:4;s:1:\"3\";i:5;s:1:\"4\";i:6;s:1:\"5\";i:7;s:1:\"6\";i:8;s:1:\"7\";i:9;s:1:\"8\";i:10;s:1:\"9\";i:11;s:2:\"10\";i:12;s:2:\"11\";i:13;s:2:\"12\";i:14;s:2:\"13\";i:15;s:2:\"14\";i:16;s:2:\"15\";i:17;s:2:\"16\";i:18;s:2:\"17\";i:19;s:2:\"18\";i:20;s:2:\"19\";i:21;s:2:\"20\";i:22;s:2:\"21\";i:23;s:2:\"22\";i:24;s:2:\"23\";i:25;s:2:\"26\";i:26;s:2:\"27\";i:27;s:2:\"28\";i:28;s:2:\"35\";i:29;s:2:\"36\";i:30;s:2:\"41\";i:31;s:3:\"888\";i:32;s:2:\"29\";i:33;s:2:\"30\";i:34;s:2:\"33\";i:35;s:2:\"37\";i:36;s:2:\"38\";i:37;s:2:\"42\";i:38;s:2:\"43\";i:39;s:2:\"44\";i:40;s:2:\"45\";i:41;s:2:\"46\";i:42;s:2:\"68\";i:43;s:2:\"69\";i:44;s:3:\"879\";i:45;s:3:\"880\";i:46;s:3:\"881\";i:47;s:3:\"882\";i:48;s:3:\"883\";i:49;s:3:\"887\";i:50;s:3:\"889\";i:51;s:3:\"890\";i:52;s:3:\"891\";i:53;s:3:\"884\";i:54;s:3:\"885\";i:55;s:3:\"893\";i:56;s:3:\"894\";i:57;s:3:\"895\";i:58;s:3:\"903\";i:59;s:3:\"896\";i:60;s:3:\"897\";i:61;s:3:\"898\";i:62;s:3:\"899\";i:63;s:3:\"900\";i:64;s:3:\"901\";i:65;s:3:\"902\";i:66;s:3:\"904\";i:67;s:3:\"907\";i:68;s:3:\"908\";i:69;s:3:\"909\";i:70;s:3:\"910\";i:71;s:3:\"911\";i:72;s:3:\"912\";i:73;s:3:\"913\";i:74;s:3:\"914\";i:75;s:3:\"915\";i:76;s:3:\"916\";i:77;s:2:\"47\";i:78;s:2:\"48\";i:79;s:2:\"49\";i:80;s:2:\"50\";i:81;s:2:\"51\";i:82;s:2:\"52\";i:83;s:2:\"53\";i:84;s:2:\"54\";i:85;s:2:\"55\";i:86;s:2:\"56\";i:87;s:2:\"57\";i:88;s:2:\"58\";i:89;s:2:\"59\";i:90;s:2:\"60\";i:91;s:2:\"61\";i:92;s:3:\"833\";i:93;s:2:\"62\";i:94;s:2:\"63\";i:95;s:2:\"64\";i:96;s:2:\"65\";i:97;s:2:\"66\";i:98;s:3:\"877\";i:99;s:3:\"878\";i:100;s:3:\"886\";i:101;s:2:\"70\";i:102;s:2:\"73\";i:103;s:2:\"74\";i:104;s:3:\"127\";i:105;s:2:\"71\";i:106;s:2:\"72\";i:107;s:3:\"115\";i:108;s:3:\"126\";i:109;s:3:\"849\";i:110;s:3:\"850\";i:111;s:3:\"851\";i:112;s:3:\"852\";i:113;s:3:\"853\";i:114;s:3:\"854\";i:115;s:3:\"855\";i:116;s:3:\"856\";i:117;s:3:\"857\";i:118;s:3:\"858\";i:119;s:3:\"859\";i:120;s:3:\"860\";i:121;s:3:\"861\";i:122;s:3:\"871\";i:123;s:3:\"872\";i:124;s:3:\"875\";i:125;s:3:\"876\";i:126;s:3:\"116\";i:127;s:3:\"117\";i:128;s:3:\"118\";i:129;s:3:\"119\";i:130;s:3:\"120\";i:131;s:3:\"121\";i:132;s:3:\"122\";i:133;s:3:\"123\";i:134;s:3:\"124\";i:135;s:3:\"125\";i:136;s:3:\"862\";i:137;s:3:\"863\";i:138;s:3:\"864\";i:139;s:3:\"865\";i:140;s:3:\"866\";i:141;s:3:\"867\";i:142;s:3:\"868\";i:143;s:3:\"869\";i:144;s:3:\"874\";i:145;s:2:\"78\";i:146;s:2:\"79\";i:147;s:2:\"83\";i:148;s:2:\"84\";i:149;s:2:\"85\";i:150;s:2:\"86\";i:151;s:2:\"87\";i:152;s:2:\"88\";i:153;s:2:\"89\";}');

-- ----------------------------
-- Table structure for weimenghulian_friend_link
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_friend_link`;
CREATE TABLE `weimenghulian_friend_link` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `url` varchar(128) NOT NULL,
  `describe` varchar(128) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1 正常 2不显示',
  `orderby` tinyint(3) DEFAULT '0',
  `add_time` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weimenghulian_friend_link
-- ----------------------------
INSERT INTO `weimenghulian_friend_link` VALUES ('1', '百度', 'http://www.baidu.com', '百度', '1', '0', '0');
INSERT INTO `weimenghulian_friend_link` VALUES ('2', '新浪', 'http://www.sina.com', 'sina', '1', '0', '1511592503');

-- ----------------------------
-- Table structure for weimenghulian_menu
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_menu`;
CREATE TABLE `weimenghulian_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单ID，自增',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '菜单父ID',
  `module_id` int(11) NOT NULL COMMENT '模块ID',
  `name` varchar(100) NOT NULL COMMENT '菜单名称',
  `module` varchar(50) NOT NULL COMMENT '方法所属模块Controller',
  `function` varchar(1024) NOT NULL COMMENT '菜单功能的Action',
  `icon` varchar(100) DEFAULT NULL COMMENT 'icon',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '菜单状态：1、正常；0、关闭',
  `create_user` int(11) NOT NULL COMMENT '创建人',
  `menu_tag` varchar(100) NOT NULL COMMENT '标签',
  `sortby` tinyint(1) NOT NULL DEFAULT '0' COMMENT '排序',
  `isnav` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是导航',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后更新时间',
  `record_time` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='菜单';

-- ----------------------------
-- Records of weimenghulian_menu
-- ----------------------------
INSERT INTO `weimenghulian_menu` VALUES ('1', '0', '0', '后台首页', 'Public', 'main', 'icon-computer', '1', '0', '', '0', '1', '2017-11-17 14:15:59', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('2', '0', '0', '用户管理', '', '', null, '1', '0', '', '1', '1', '2017-11-17 13:24:29', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('3', '2', '0', '用户列表', 'User', 'index', null, '1', '0', '', '1', '1', '2017-11-17 14:23:13', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('4', '2', '0', '角色列表', 'Role', 'index', null, '1', '0', '', '2', '1', '2017-11-17 14:23:23', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('5', '0', '0', '文章管理', '', '', null, '1', '0', '', '2', '1', '2017-11-21 14:14:40', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('6', '5', '0', '文章列表', 'News', 'index', null, '1', '0', '', '1', '1', '2017-11-21 14:14:41', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('7', '5', '0', '文章分类', 'News', 'news_category', null, '1', '0', '', '2', '1', '2017-11-21 14:14:41', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('8', '0', '0', '友情链接', 'Friendlink', 'index', null, '1', '0', '', '3', '1', '2017-11-21 14:14:42', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('9', '0', '0', '产品管理', '', '', null, '1', '0', '', '4', '1', '2017-11-21 14:14:42', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('10', '9', '0', '产品列表', 'Product', 'index', null, '1', '0', '', '0', '1', '2017-11-21 14:14:44', '0000-00-00 00:00:00');
INSERT INTO `weimenghulian_menu` VALUES ('11', '0', '0', '系统设置', 'Systerm', 'index', null, '1', '0', '', '5', '1', '2017-11-21 14:14:46', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for weimenghulian_news
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_news`;
CREATE TABLE `weimenghulian_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cate_id` tinyint(4) unsigned NOT NULL COMMENT '类别ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `img` varchar(255) NOT NULL COMMENT '图片',
  `url` varchar(255) NOT NULL COMMENT '外链',
  `orig` varchar(50) NOT NULL COMMENT '来源',
  `abstract` varchar(255) DEFAULT NULL COMMENT '摘要',
  `content` longtext NOT NULL COMMENT '内容',
  `author` varchar(10) DEFAULT NULL,
  `add_time` varchar(10) NOT NULL COMMENT '时间',
  `view` int(10) DEFAULT '0' COMMENT '阅读人数',
  `is_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1审核 0没有审核',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-待审核 1-已审核',
  `type` tinyint(4) DEFAULT NULL COMMENT '信息类别  1  新闻  2 活动',
  `seo_key` varchar(255) NOT NULL COMMENT '关键词',
  `seo_desc` text NOT NULL COMMENT '描述',
  `start_time` varchar(100) DEFAULT NULL COMMENT '开始时间',
  `end_time` varchar(100) DEFAULT NULL COMMENT '结束时间',
  `sort` smallint(5) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `add_time` (`add_time`),
  KEY `cate_id` (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='新闻表';

-- ----------------------------
-- Records of weimenghulian_news
-- ----------------------------
INSERT INTO `weimenghulian_news` VALUES ('1', '1', 'test', '', '', '', 'test', 'test', null, '1511245305', '0', '1', '0', '0', null, '', '', '', null, '2');
INSERT INTO `weimenghulian_news` VALUES ('2', '1', 'test2', './Uploads/20171122/1511320968_795498555.jpg', '', '', 'abstract', '&lt;p&gt;contentcontentcontent&lt;/p&gt;', 'test2', '1511280000', '100', '1', '1', '1', null, 'test', '', null, null, '2');
INSERT INTO `weimenghulian_news` VALUES ('3', '1', '123', '', '', '', '', '', '11', '1511280000', '1', '0', '1', '0', null, '', '', null, null, '1');

-- ----------------------------
-- Table structure for weimenghulian_news_category
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_news_category`;
CREATE TABLE `weimenghulian_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目名称',
  `keyword` text COLLATE utf8_unicode_ci COMMENT '关键词',
  `description` text COLLATE utf8_unicode_ci,
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '栏目排序',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1显示 ',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='文章类别';

-- ----------------------------
-- Records of weimenghulian_news_category
-- ----------------------------
INSERT INTO `weimenghulian_news_category` VALUES ('1', '0', '公司新闻', '公司新闻', '公司新闻', '1', '1', '1');
INSERT INTO `weimenghulian_news_category` VALUES ('2', '0', '行业动态', '行业动态', '行业动态', '2', '1', '1');
INSERT INTO `weimenghulian_news_category` VALUES ('3', '0', '常见问题', '常见问题', '常见问题', '3', '0', '1');
INSERT INTO `weimenghulian_news_category` VALUES ('4', '0', '公司公告', '公司公告', '公司公告', '3', '1', '1');

-- ----------------------------
-- Table structure for weimenghulian_product
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_product`;
CREATE TABLE `weimenghulian_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `cate_id` int(10) NOT NULL DEFAULT '0' COMMENT '类别',
  `img` text COMMENT '产品图片',
  `product_sn` varchar(60) DEFAULT '' COMMENT '商品编号',
  `product_name` varchar(250) DEFAULT '' COMMENT '商品名称',
  `lable_list` varchar(100) NOT NULL COMMENT '标签列表',
  `content` longtext COMMENT '介绍',
  `keywords` varchar(250) DEFAULT '' COMMENT '关键词',
  `description` varchar(250) DEFAULT '' COMMENT '关键词描述',
  `add_time` int(10) DEFAULT '0' COMMENT '创建时间',
  `edit_time` int(10) unsigned DEFAULT '0' COMMENT '修改时间',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `is_hot` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否推荐 1是0 否',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 正常 2 删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品表';

-- ----------------------------
-- Records of weimenghulian_product
-- ----------------------------
INSERT INTO `weimenghulian_product` VALUES ('1', '1', './Uploads/Product/20171125/1511573966_1381586508.png', 'weimenghulian1511574027', '产品', 'test2', '产品testcontent', 'test', '产品test', '1511574027', '1511574681', '1', '1', '1');

-- ----------------------------
-- Table structure for weimenghulian_product_category
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_product_category`;
CREATE TABLE `weimenghulian_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '栏目名称',
  `keyword` text COLLATE utf8_unicode_ci COMMENT '关键词',
  `description` text COLLATE utf8_unicode_ci,
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '栏目排序',
  `status` int(5) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='文章类别';

-- ----------------------------
-- Records of weimenghulian_product_category
-- ----------------------------
INSERT INTO `weimenghulian_product_category` VALUES ('1', '0', '网站开发', '网站开发', '网站开发', '1', '1');
INSERT INTO `weimenghulian_product_category` VALUES ('2', '0', '微信开发', '微信开发', '微信开发', '2', '1');
INSERT INTO `weimenghulian_product_category` VALUES ('3', '0', '平面设计', '平面设计', '平面设计', '3', '1');

-- ----------------------------
-- Table structure for weimenghulian_role
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_role`;
CREATE TABLE `weimenghulian_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '描述',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='角色表';

-- ----------------------------
-- Records of weimenghulian_role
-- ----------------------------
INSERT INTO `weimenghulian_role` VALUES ('1', '超级管理员', '1', '超级管理员', '0', '0');

-- ----------------------------
-- Table structure for weimenghulian_user
-- ----------------------------
DROP TABLE IF EXISTS `weimenghulian_user`;
CREATE TABLE `weimenghulian_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `add_time` int(10) DEFAULT '0' COMMENT '注册时间',
  `last_time` int(10) DEFAULT '0' COMMENT '上次登录时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `role_id` int(10) NOT NULL COMMENT '角色ID',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `realname` varchar(50) DEFAULT '' COMMENT '姓名',
  `address` varchar(250) DEFAULT '' COMMENT '联系地址',
  `phone` char(20) DEFAULT '' COMMENT '手机',
  `email` varchar(50) DEFAULT '' COMMENT '邮箱',
  PRIMARY KEY (`id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

-- ----------------------------
-- Records of weimenghulian_user
-- ----------------------------
INSERT INTO `weimenghulian_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '0', '1', '1', '毛毛', '', '18701311071', 'sd_mwq@163.com');
