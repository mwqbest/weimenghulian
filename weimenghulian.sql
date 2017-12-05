/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : weimenghulian

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-12-05 22:26:15
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of weimenghulian_friend_link
-- ----------------------------
INSERT INTO `weimenghulian_friend_link` VALUES ('1', '万网', 'https://wanwang.aliyun.com', '万网', '1', '0', '0');
INSERT INTO `weimenghulian_friend_link` VALUES ('2', '网站建设', 'http://www.weimenghulian.com', 'sina', '1', '0', '1511592503');
INSERT INTO `weimenghulian_friend_link` VALUES ('3', '莱芜政府网', 'http://www.laiwu.gov.cn/', '', '1', '0', '1512460819');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='新闻表';

-- ----------------------------
-- Records of weimenghulian_news
-- ----------------------------
INSERT INTO `weimenghulian_news` VALUES ('1', '3', '怎么制作好企业网站及优化用户体验', './Uploads/News/20171205/1512457144_1740577956.jpg', '', '', '一个网站的拜访速度的快慢对网站来说十分重要，用户没有耐烦去等候一个网站渐渐的翻开。网站的速度跟我们的空间有关系，有很多站长都喜欢买不必备案的国外和香港的空间，这种空间是省掉了备案的费事但是由 于空间在国外，就会形成网站的拜访速度比国际的空间慢了许多。', '<div>第一步：在树立网站之前，要明白目的，有一个全体的框架构思，详细点说，就是建站之前首先要明白企业网站的目的是什麼，等待企业官网做什麼？希望网站给公司带来哪些利益？</div><div>第二步：要停止战略剖析，在确定网站目的后，要开端目的受众剖析，比方：客户来企业网站做什麼，兴味点是什麼。本身现状剖析，比方：品牌影响力如何？产品线如何？效劳程度如何？行业对手都在怎样做等等。</div><div>第三步：依据剖析制定详细方案，经过综合战略剖析后，需求明白我们要做什麼（需求定义），并且要明白晓得我们如何完成。第四步：方案构成当前就是项目执行，明白完成方案后，需求制定网站架构，开端创意设计、内容组织、顺序开发等任务。</div><div>第四步：网站建立当前，要不时维护和进步，发扬网站的最大作用。最初：网站上线后，还有更重要的任务：运营维护、数据监测、后果追踪。这样才干构成闭环，推进网站继续、波动、向前开展，依据实践需求确定网站功用，再做细节的筹划。<br><img alt=\"\" src=\"http://www.bjkeywordseo.com/uploads/allimg/170311/1-1F311105601Y7.png\"><br><strong>优化用户体验</strong><br><div>&nbsp;</div><div>拜访速度</div><div>一个网站的拜访速度的快慢对网站来说十分重要，用户没有耐烦去等候一个网站渐渐的翻开。网站的速度跟我们的空间有关系，有很多站长都喜欢买不必备案的国外和香港的空间，这种空间是省掉了备案的费事但是由 于空间在国外，就会形成网站的拜访速度比国际的空间慢了许多。还有很多站长喜欢在网站上添加很多的视频和FLASH动画等，这样办法的确可以添加网站的美 观度但是它带来的成绩就是严重影响了网站的拜访速度,所以我们没有必要在网站上添加少量的视频和FLASH。</div><div>颜色选择</div><div>在人们的生活中构成了一种认识形状上的看法，互联网就应该是冷色彩，假如是粉色能够就不大适宜，例如理想中大局部互联网公司网站都会选择蓝色。网络商城就应该是深色系，例如淘宝到天猫，淘宝给人的直观印象就是杂货铺，而天猫就显得很大气。</div><div>页面清洁度</div><div>网站的页面很清洁，用户就会有兴味 阅读网站的其他内容。试想假如一个网站一翻开就是一堆的广告，和乌七八糟的内容，我们还会持续阅读吗?要想进步网站的整洁度首先就需求我们在网站设计的时 候留意网站的作风搭配、颜色搭配以及页面的合理布局。其次我们还要给网站设计良好的导航零碎，让用户晓得本人在什麼中央。我团体以为京东商城的网站的清洁 度做的很好，页面清洁自然，导航零碎做的也很好。</div><div>网页导航栏</div><div>导航的陈列是个成绩，是该整划一齐陈列呢?还是随意一点呢?其实都没问 题，Pinterest的瀑布流和windows8的百叶窗不错，这是随机的美。天猫的竖列排行和腾讯的横列排行也不错，这是划一的美。但搜狐我表示看不 懂，混乱的版面让人找不着北，不知是不是想刻意营建一种复杂随意，反正我觉得到的只是混乱。而新浪和网易做的就很普通了。</div><div>网站内容与互动</div><div>用户离开我们网站的目的就是找到本人想要的东西，假如我们可以给用户提供他们想要的东西，那麼在一定水平下去说我们满足了用户需求、契合了用户体验，用户就会持续停留在我们的网站上。所以一个网站能否具有有价值的内容，关系到用户的体验度。</div></div>', '微梦互联', '1375632000', '1001', '1', '1', '1', null, '网站，用户体验', '', null, null, '0');
INSERT INTO `weimenghulian_news` VALUES ('2', '1', '关于我们', './Uploads/News/20171205/1512458630_1601435726.png', '', '', '微梦互联是一家专注于网站建设和网络整合营销及互联网品牌推广的技术服务商。自成立以来，一直专注于互联网品牌建设，我们团队集程序开发、美术设计、客服精英于一体，有着丰富的网站建设经验；', '<h2>我们是谁，我们做什么</h2><p><span>&nbsp; &nbsp; &nbsp; &nbsp;</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; 微梦互联是一家专注于网站建设和网络整合营销及互联网品牌推广的技术服务商。自成立以来，一直专注于互联网品牌建设，我们团队集程序开发、美术设计、客服精英于一体，有着丰富的网站建设经验；主要面向广大企业，政府事业单位和个人用户提供互联网应用以及配套服务，包括商业网站规划、企业网站建设、外贸网站建设、网上商城建设、行业门户网站建设、企业应用软件开发、企业内部管理系统开发、域名注册、国内外服务器、网络营销推广等。我们注重客户提出的每个要求，充分考虑每一个细节，积极的做好服务，根据客户具体情况制定系列专业和规范的客户服务和保障体系，为企业提供周到、放心的一站式服务。公司将本着以“诚信为本 持续为客户创造最优质的服务”为公司发展理念，秉承“精益求精，匠心服务”的服务宗旨，以务实创新的精神，携手广大客户，共同发展进步。&nbsp;</p><p><span>&nbsp; &nbsp; &nbsp;&nbsp;</span><span>面向优秀企业提供独具特色的高品质互联网服务应用，是国内专业提供互联网电子商务应用及增值服务的高新技术服务企业。</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp;为企业提供电子商务建设、网站建设、软件开发以及全方位提升企业互联网竞争力的精准解决方案和专业服务。<br>&nbsp; &nbsp; &nbsp; &nbsp;致力于互联网电子商务前沿技术的学习研究、开发设计和提供推动企业互联网商业价值、社会价值的提高，为客户带来一站式、全方位的综合服务体验。</p><p><span>&nbsp; &nbsp; &nbsp; &nbsp;随着网络技术的快速发展，面对中国经济迅速融入全球市场竞争的背景下，对于快速发展中的优秀企业，传统的技术服务团队已经不能满足现代企业发展的需要。电子商务、WEB2.0已经不仅仅是从简单的技术层面让更多的客户浏览你的网站，而是以市场为基础，以挖掘潜在客户需求、消费习惯的角度为诉求对象，通过互联网的纽带为客户管理信息、释放信息，更深入地主导、影响客户的消费习惯，引导消费。充分利用互联网资源提高企业综合竞争力，从而实现企业网络营销的价值体现。</span><span>&nbsp;&nbsp;</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"http://www.lanyouinfo.com/images/about.jpg\"></p><p>&nbsp; &nbsp;微梦互联的不同最终要体现在市场竞争中，我们的服务应该具备明显的性价比优势。对外，让客户以更低的价格获得有更好的服务；对内，我们的员工在拥有更多自由的同时，能够获得更高的收入。怎样才能做到呢？ 对外，我们很难直接去改变环境，我们只能通过改变自己来改变环境，通过内部的调整和优化，让客户看到我们的不同，内部调整所转化出的性价比优势，是客户选择我们的原因。</p><p>快捷、高效的服务才是我们的不同和优势，才是价格的决定性因素。实际上，客户要的不是合作模式，而是结果，结果不仅仅是最终的交付物，更重要的是过程中看得见的质量和效率。如果我们能让客户确信我们有更好的质量和效率， 我们又为什么要在意合作模式是固定价格，还是ODC呢？固定价格没有问题，只要我们以高效、优质为宗旨，积极沟通以建立信任，一样可以达到双赢。</p><p>我们有能够自我管理的程序员，能真正独立拥有安排时间和工作地的自由。优质与高效可以适应未来商业快速、小型化、定制化的特点，靠流程管理的传统开发模式，会被自管理、自组织模式逐步取代。而自管理、自组织模式存在于高度独立，又相互了解信任的个体组成的小团队。团队越小越高效，一个人独立完成效率最高，沟通协作成本为零。 这样，我们的程序员与咨询师的工作模式会很接近，咨询师在某一行业领域积累了更多经验，但对于大部分网站和信息化项目，我们的程序员应该可以单独面对客户。咨询师与程序员可以在同一个项目中开展平等的合作，不是上下游关系，他们各自利用自己的优势，合作为客户解决问题，创造价值。，但ODC更适合还没有能力独立管理质量和效率的程序员或团队。</p><p><span>&nbsp;&nbsp; &nbsp;</span></p><h3>经营理念</h3><p>微梦互联科技始终本着以人为本，以&nbsp;<font>专业</font>&nbsp;<font>诚信</font>&nbsp;<font>务实</font>&nbsp;<font>创新</font>&nbsp;<font>服务</font>&nbsp;为经 营理念，以客户的最大满意为工作准则，不断的锤炼技术技能和沉淀服务水准。</p><p>公司基于先进的互联网技术领域，秉承&nbsp;<span>科技 + 服务</span>&nbsp;的发展起点展望未来,鼎力进取和创新互联网电子商务的应用，勇于探索互联网新科技、新领域，广泛拓展互联网新技 术的合作和共同发展。</p><p><p>微梦互联科技拥有优秀的技术团队：网站策划师、程序工程师等。</p>作为专业的互联网应用服务团队是一支融整体策划、革新创意设计制作于一体的优秀专业团队，是一支年轻朝气拥有企业成功合作经验、有丰富创造力的团队。</p><br><h3>经营愿景</h3><p>&nbsp; &nbsp; 为客户创造价值、为企业创造效益、为社会创造财富、为个人创造人生是我们团队不懈追求的目标：</p><div class=\"dot-info\"><div class=\"dot-l\"><ul><li><span class=\"dottxt1\">&nbsp; &nbsp; 为客户创造价值</span><font class=\"dot dot1\">&nbsp;</font></li><li><span class=\"dottxt2\">&nbsp; &nbsp; 为企业创造效益</span><font class=\"dot dot2\">&nbsp;</font></li><li><span class=\"dottxt3\">&nbsp; &nbsp; 为社会创造财富</span><font class=\"dot dot3\">&nbsp;</font></li><li><span class=\"dottxt4\">&nbsp; &nbsp; 为个人创造人生</span><font class=\"dot dot4\">&nbsp;</font></li></ul></div><div class=\"dot-r\"><ul><li>&nbsp; &nbsp; 通过我们团队的积极努力，为客户提供合理实用的互联网应用解决方案和专业服务，为客户的发展带来直接的经济效益，全面提升客户的市场竞争力和赢得客户的惯性能力，帮助客户赢得更大的市场空间和利润。</li><li>&nbsp; &nbsp; 赢得利润是企业存在的天职，而成就伟大则是每个企业团队的梦想，实现这个梦想需要团队的凝聚力和奉献精神。凝聚力、奉献则是我们团队的优良品质，做正确的事，坚持为客户提供最为优质的服务，超越自己努力使企业 不断的壮大。</li><li>企业的发展离不开社会的良好环境，回报社会是每一个企业应有的责任。在为客户提供优质服务的同时，时刻不能忘记回报社会，造福于我们的社会。</li><li>实现员工的人生价值和梦想是我们发展的基石，努力创造良好的办公环境和企业精神文化生活，学习、进取、创新、服务、热情工作，付出努力和享受成功是我们共同的目标和愿望。</li></ul></div></div><p><br></p>', '微梦互联', '1325347200', '8659', '1', '1', '1', null, '微梦互联', '', null, null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='文章类别';

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
  `url` varchar(100) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品表';

-- ----------------------------
-- Records of weimenghulian_product
-- ----------------------------
INSERT INTO `weimenghulian_product` VALUES ('1', '1', './Uploads/Product/20171205/1512462826_1027444025.png', 'weimenghulian1512462839', '婚纱摄影', '#', '', '', '', '', '1512462839', '0', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('2', '1', './Uploads/Product/20171205/1512463023_2104618197.png', 'weimenghulian1512463027', '大峰糕点', '#', '', '', '', '', '1512463027', '1512463037', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('3', '1', './Uploads/Product/20171205/1512463314_1547765091.png', 'weimenghulian1512463315', 'futurex教育平台管理系统', 'http://futurex.net/public/login.html', '', '', '', '', '1512463315', '0', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('4', '1', './Uploads/Product/20171205/1512465306_1582843763.png', 'weimenghulian1512465309', '卡通可爱风格的甜品蛋糕店网站', '#', '', '', '', '', '1512465309', '0', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('5', '1', './Uploads/Product/20171205/1512465426_28108564.png', 'weimenghulian1512465428', '绿色的农业化肥企业站', '#', '', '', '', '', '1512465428', '0', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('6', '1', './Uploads/Product/20171205/1512465502_1331356912.png', 'weimenghulian1512465505', '机械设备公司网站', '#', '', '', '', '', '1512465505', '0', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('7', '1', './Uploads/Product/20171205/1512465593_729194053.png', 'weimenghulian1512465594', '健康医疗器械公司网站', '#', '', '', '', '', '1512465594', '0', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('8', '1', './Uploads/Product/20171205/1512465724_1010892910.png', 'weimenghulian1512465678', '食品机械科技公司网站', '#', '', '', '', '', '1512465678', '1512465727', '0', '1', '1');
INSERT INTO `weimenghulian_product` VALUES ('9', '1', './Uploads/Product/20171205/1512482840_1620935763.png', 'weimenghulian1512482846', '鲁中黑养殖合作社', '#', '', '', '', '', '1512482846', '0', '0', '1', '1');

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
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '描述',
  `add_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='角色表';

-- ----------------------------
-- Records of weimenghulian_role
-- ----------------------------
INSERT INTO `weimenghulian_role` VALUES ('1', '超级管理员', '1', '超级管理员2', '0', '1511769270');
INSERT INTO `weimenghulian_role` VALUES ('2', '运营', '1', '运营部门', '1511769315', '0');

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
INSERT INTO `weimenghulian_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '1', '1', '1', '毛毛', '', '18701311071', 'sd_mwq@163.com');
