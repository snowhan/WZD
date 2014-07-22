/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : wzd2

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-06-09 00:09:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wzd_access`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_access`;
CREATE TABLE `wzd_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_access
-- ----------------------------
INSERT INTO `wzd_access` VALUES ('2', '21', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '6', '2', null);
INSERT INTO `wzd_access` VALUES ('2', '20', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '19', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '5', '2', null);
INSERT INTO `wzd_access` VALUES ('2', '18', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '17', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '16', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '15', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '4', '2', null);
INSERT INTO `wzd_access` VALUES ('2', '14', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '13', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '12', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '11', '3', null);
INSERT INTO `wzd_access` VALUES ('2', '2', '2', null);
INSERT INTO `wzd_access` VALUES ('2', '1', '1', null);
INSERT INTO `wzd_access` VALUES ('2', '22', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '30', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '29', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '28', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '27', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '26', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '25', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '24', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '23', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '10', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '9', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '8', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '7', '3', null);
INSERT INTO `wzd_access` VALUES ('1', '3', '2', null);
INSERT INTO `wzd_access` VALUES ('1', '1', '1', null);
INSERT INTO `wzd_access` VALUES ('1', '32', '3', null);

-- ----------------------------
-- Table structure for `wzd_admin`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_admin`;
CREATE TABLE `wzd_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_admin
-- ----------------------------
INSERT INTO `wzd_admin` VALUES ('1', 'admin', 'f7e47e9f97a6b982485fb64a1105e062', '1');
INSERT INTO `wzd_admin` VALUES ('2', 'ganliuzhuo', 'f7e47e9f97a6b982485fb64a1105e062', '1');
INSERT INTO `wzd_admin` VALUES ('3', 'ganliuzhuo1', 'f7e47e9f97a6b982485fb64a1105e062', '1');
INSERT INTO `wzd_admin` VALUES ('4', 'ganliuzhuo2', 'f7e47e9f97a6b982485fb64a1105e062', '0');

-- ----------------------------
-- Table structure for `wzd_answers`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_answers`;
CREATE TABLE `wzd_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `anonymous` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `createtime` datetime NOT NULL,
  `useless` int(10) unsigned NOT NULL DEFAULT '0',
  `hate` int(10) unsigned NOT NULL DEFAULT '0',
  `praise` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `ask_id` int(10) unsigned NOT NULL,
  `follows` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_answers
-- ----------------------------
INSERT INTO `wzd_answers` VALUES ('1', '0', '0', '2014-05-14 21:07:40', '3', '1', '1', '1', 'ddsddfsdfsdf', '20', '0');
INSERT INTO `wzd_answers` VALUES ('2', '0', '0', '2014-05-14 21:08:21', '1', '1', '0', '1', '非法定发v', '20', '0');
INSERT INTO `wzd_answers` VALUES ('3', '0', '1', '2014-05-15 11:36:28', '0', '0', '1', '1', 'sfwserdgef', '20', '0');
INSERT INTO `wzd_answers` VALUES ('4', '0', '0', '2014-05-15 17:11:10', '0', '0', '1', '1', '电工房到', '20', '0');
INSERT INTO `wzd_answers` VALUES ('5', '0', '0', '2014-05-15 17:11:29', '0', '0', '0', '1', 'ree太热让他', '16', '0');
INSERT INTO `wzd_answers` VALUES ('6', '0', '0', '2014-05-15 17:13:53', '0', '0', '0', '1', '狗头人讽多要寡', '16', '0');
INSERT INTO `wzd_answers` VALUES ('7', '0', '0', '2014-05-15 17:14:16', '0', '0', '0', '1', '<h1 style=\"color:red\">asdasdsd</h1>', '16', '0');
INSERT INTO `wzd_answers` VALUES ('8', '0', '0', '2014-05-15 17:28:45', '1', '0', '1', '1', '人体', '21', '0');
INSERT INTO `wzd_answers` VALUES ('9', '0', '0', '2014-05-15 17:31:10', '0', '0', '0', '1', '放到', '16', '0');
INSERT INTO `wzd_answers` VALUES ('10', '0', '0', '2014-05-15 17:32:03', '0', '0', '0', '1', '陶然亭日语4', '21', '0');
INSERT INTO `wzd_answers` VALUES ('11', '0', '0', '2014-05-15 17:32:48', '0', '0', '0', '1', 'hgjkhjkhi', '17', '0');
INSERT INTO `wzd_answers` VALUES ('12', '0', '0', '2014-05-15 18:21:38', '0', '0', '0', '1', 'rgtyr', '17', '0');
INSERT INTO `wzd_answers` VALUES ('13', '0', '0', '2014-05-16 09:02:21', '1', '11', '12', '1', 'erf', '24', '0');
INSERT INTO `wzd_answers` VALUES ('14', '0', '0', '2014-05-16 17:46:08', '0', '0', '1', '1', 'wercwe', '24', '0');

-- ----------------------------
-- Table structure for `wzd_answer_report`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_answer_report`;
CREATE TABLE `wzd_answer_report` (
  `id` int(10) unsigned NOT NULL,
  `reporterid` int(10) unsigned NOT NULL,
  `answer_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '户用未填写举报理由',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_answer_report
-- ----------------------------
INSERT INTO `wzd_answer_report` VALUES ('0', '1', '13', '户用未填写举报理由');

-- ----------------------------
-- Table structure for `wzd_asks`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_asks`;
CREATE TABLE `wzd_asks` (
  `anonymous` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `replys` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` datetime NOT NULL,
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '问题浏览次数',
  `title` varchar(120) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_asks
-- ----------------------------
INSERT INTO `wzd_asks` VALUES ('1', '1', '1', '0', '0000-00-00 00:00:00', '9', 'sdasd', '16', '<p>sadasdsadasdasdsadas<br/></p>');
INSERT INTO `wzd_asks` VALUES ('1', '1', '1', '2', '0000-00-00 00:00:00', '11', '这是一个题目', '17', '<p>这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目<img src=\"http://img.baidu.com/hi/jx2/j_0025.gif\"/><br/></p>');
INSERT INTO `wzd_asks` VALUES ('1', '1', '1', '0', '0000-00-00 00:00:00', '5', '这是一个题目', '18', '<p>这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目<br/></p>');
INSERT INTO `wzd_asks` VALUES ('1', '1', '1', '0', '0000-00-00 00:00:00', '6', '这是一个题目', '19', '<p>这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目这是一个题目<br/></p>');
INSERT INTO `wzd_asks` VALUES ('1', '1', '1', '0', '0000-00-00 00:00:00', '20', 'freeeeeeeeeeeeeef', '20', '<p>freerrrrrrrrrrrrrrrrrrrrrrrr<br/></p>');
INSERT INTO `wzd_asks` VALUES ('0', '1', '1', '1', '0000-00-00 00:00:00', '24', 'kjfnjk减肥日记非金融父路径二房了劲儿了附件二khjkj', '21', '<p>kjfnjk减肥日记非金融父路径二房了劲儿了附件二khjkj<br/></p>');
INSERT INTO `wzd_asks` VALUES ('0', '1', '1', '0', '0000-00-00 00:00:00', '11', 'rgtygtryr', '22', '<p>gtrgrgty<br/></p>');
INSERT INTO `wzd_asks` VALUES ('0', '1', '1', '0', '0000-00-00 00:00:00', '15', '大大', '23', '<p>打发士大夫<br/></p>');
INSERT INTO `wzd_asks` VALUES ('0', '1', '1', '2', '0000-00-00 00:00:00', '286', '大奋', '24', '<p>风动旛动风动旛动<br/></p>');
INSERT INTO `wzd_asks` VALUES ('0', '1', '1', '0', '0000-00-00 00:00:00', '8', 'ddd', '25', '<p>&lt;script&gt;alert(1);&lt;/script&gt;<br/></p>');

-- ----------------------------
-- Table structure for `wzd_asks_tag`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_asks_tag`;
CREATE TABLE `wzd_asks_tag` (
  `tag_id` int(10) unsigned NOT NULL,
  `ask_id` int(10) unsigned NOT NULL,
  KEY `ask_id` (`ask_id`),
  CONSTRAINT `wzd_asks_tag_ibfk_1` FOREIGN KEY (`ask_id`) REFERENCES `wzd_asks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_asks_tag
-- ----------------------------
INSERT INTO `wzd_asks_tag` VALUES ('1', '16');
INSERT INTO `wzd_asks_tag` VALUES ('2', '16');
INSERT INTO `wzd_asks_tag` VALUES ('3', '16');
INSERT INTO `wzd_asks_tag` VALUES ('1', '17');
INSERT INTO `wzd_asks_tag` VALUES ('2', '17');
INSERT INTO `wzd_asks_tag` VALUES ('3', '17');
INSERT INTO `wzd_asks_tag` VALUES ('1', '18');
INSERT INTO `wzd_asks_tag` VALUES ('2', '18');
INSERT INTO `wzd_asks_tag` VALUES ('3', '18');
INSERT INTO `wzd_asks_tag` VALUES ('1', '19');
INSERT INTO `wzd_asks_tag` VALUES ('2', '19');
INSERT INTO `wzd_asks_tag` VALUES ('3', '19');
INSERT INTO `wzd_asks_tag` VALUES ('1', '20');
INSERT INTO `wzd_asks_tag` VALUES ('2', '20');
INSERT INTO `wzd_asks_tag` VALUES ('3', '21');
INSERT INTO `wzd_asks_tag` VALUES ('3', '22');
INSERT INTO `wzd_asks_tag` VALUES ('2', '23');
INSERT INTO `wzd_asks_tag` VALUES ('3', '24');

-- ----------------------------
-- Table structure for `wzd_asks_topic`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_asks_topic`;
CREATE TABLE `wzd_asks_topic` (
  `topic_id` int(10) unsigned NOT NULL,
  `ask_id` int(10) unsigned NOT NULL,
  KEY `ask_id` (`ask_id`),
  CONSTRAINT `wzd_asks_topic_ibfk_1` FOREIGN KEY (`ask_id`) REFERENCES `wzd_asks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_asks_topic
-- ----------------------------
INSERT INTO `wzd_asks_topic` VALUES ('1', '16');
INSERT INTO `wzd_asks_topic` VALUES ('2', '16');
INSERT INTO `wzd_asks_topic` VALUES ('1', '17');
INSERT INTO `wzd_asks_topic` VALUES ('1', '18');
INSERT INTO `wzd_asks_topic` VALUES ('1', '19');
INSERT INTO `wzd_asks_topic` VALUES ('1', '20');
INSERT INTO `wzd_asks_topic` VALUES ('1', '21');
INSERT INTO `wzd_asks_topic` VALUES ('2', '21');
INSERT INTO `wzd_asks_topic` VALUES ('1', '23');
INSERT INTO `wzd_asks_topic` VALUES ('1', '24');
INSERT INTO `wzd_asks_topic` VALUES ('2', '24');
INSERT INTO `wzd_asks_topic` VALUES ('2', '25');

-- ----------------------------
-- Table structure for `wzd_ask_report`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_ask_report`;
CREATE TABLE `wzd_ask_report` (
  `id` int(10) unsigned NOT NULL,
  `reporterid` int(10) unsigned NOT NULL,
  `ask_id` int(11) unsigned NOT NULL,
  `description` varchar(255) DEFAULT '户用未填写举报理由',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_ask_report
-- ----------------------------
INSERT INTO `wzd_ask_report` VALUES ('0', '1', '20', '户用未填写举报理由');

-- ----------------------------
-- Table structure for `wzd_blacklist`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_blacklist`;
CREATE TABLE `wzd_blacklist` (
  `uid` int(11) NOT NULL,
  `blackid` int(11) NOT NULL,
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_blacklist
-- ----------------------------

-- ----------------------------
-- Table structure for `wzd_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_favorite`;
CREATE TABLE `wzd_favorite` (
  `ftitle` varchar(90) NOT NULL,
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `uid` (`uid`),
  CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `wzd_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_favorite
-- ----------------------------
INSERT INTO `wzd_favorite` VALUES ('收藏夹', '1', '1');
INSERT INTO `wzd_favorite` VALUES ('书', '2', '1');

-- ----------------------------
-- Table structure for `wzd_favorite_answer`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_favorite_answer`;
CREATE TABLE `wzd_favorite_answer` (
  `answer_id` int(10) unsigned NOT NULL,
  `fid` int(10) unsigned NOT NULL,
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `wzd_favorite_answer_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `wzd_answers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_favorite_answer
-- ----------------------------
INSERT INTO `wzd_favorite_answer` VALUES ('13', '2');
INSERT INTO `wzd_favorite_answer` VALUES ('13', '1');
INSERT INTO `wzd_favorite_answer` VALUES ('14', '2');

-- ----------------------------
-- Table structure for `wzd_focus_asklist`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_focus_asklist`;
CREATE TABLE `wzd_focus_asklist` (
  `uid` int(10) unsigned NOT NULL,
  `focusid` int(10) unsigned NOT NULL,
  KEY `utoken` (`uid`),
  KEY `focusid` (`focusid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_focus_asklist
-- ----------------------------
INSERT INTO `wzd_focus_asklist` VALUES ('1', '24');
INSERT INTO `wzd_focus_asklist` VALUES ('1', '23');

-- ----------------------------
-- Table structure for `wzd_focus_userlist`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_focus_userlist`;
CREATE TABLE `wzd_focus_userlist` (
  `uid` int(10) unsigned NOT NULL,
  `focusid` int(10) unsigned NOT NULL,
  KEY `utoken` (`uid`),
  KEY `focusid` (`focusid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_focus_userlist
-- ----------------------------

-- ----------------------------
-- Table structure for `wzd_follows`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_follows`;
CREATE TABLE `wzd_follows` (
  `hate` int(10) unsigned NOT NULL DEFAULT '0',
  `praise` int(10) unsigned NOT NULL DEFAULT '0',
  `answer_id` int(10) unsigned NOT NULL,
  `createtime` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_follows
-- ----------------------------
INSERT INTO `wzd_follows` VALUES ('0', '0', '13', '2014-05-18 16:27:48', '1', '1', '0', '方法');
INSERT INTO `wzd_follows` VALUES ('0', '0', '13', '2014-05-18 16:32:11', '1', '2', '0', '但是放到是');
INSERT INTO `wzd_follows` VALUES ('0', '0', '13', '2014-05-18 16:35:38', '1', '3', '1', 'ddd');
INSERT INTO `wzd_follows` VALUES ('0', '0', '13', '2014-05-18 16:41:46', '1', '4', '1', '999');
INSERT INTO `wzd_follows` VALUES ('0', '0', '14', '2014-05-18 17:00:47', '1', '5', '0', 'ewwe');
INSERT INTO `wzd_follows` VALUES ('0', '0', '13', '2014-05-21 19:11:15', '1', '6', '4', '45454545');

-- ----------------------------
-- Table structure for `wzd_node`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_node`;
CREATE TABLE `wzd_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_node
-- ----------------------------
INSERT INTO `wzd_node` VALUES ('1', 'Admin', '问之道后台管理', '1', '', '1', '0', '1');
INSERT INTO `wzd_node` VALUES ('2', 'Asks', '问题', '1', null, '2', '1', '2');
INSERT INTO `wzd_node` VALUES ('3', 'Rbac', 'RBAC权限控制', '1', null, '1', '1', '2');
INSERT INTO `wzd_node` VALUES ('4', 'Answers', '回答', '1', null, '3', '1', '2');
INSERT INTO `wzd_node` VALUES ('5', 'Topic', '话题', '1', null, '4', '1', '2');
INSERT INTO `wzd_node` VALUES ('6', 'Tag', '标签', '1', null, '5', '1', '2');
INSERT INTO `wzd_node` VALUES ('7', 'user_list', '前台用户列表', '1', null, '1', '3', '3');
INSERT INTO `wzd_node` VALUES ('8', 'manager_list', '后台用户列表', '1', null, '2', '3', '3');
INSERT INTO `wzd_node` VALUES ('9', 'node_list', '节点列表', '1', null, '3', '3', '3');
INSERT INTO `wzd_node` VALUES ('10', 'role_list', '角色列表', '1', null, '4', '3', '3');
INSERT INTO `wzd_node` VALUES ('11', 'asks_list', '问题列表', '1', null, '1', '2', '3');
INSERT INTO `wzd_node` VALUES ('12', 'asks_report', '问题举报列表', '1', null, '2', '2', '3');
INSERT INTO `wzd_node` VALUES ('13', 'asks_delete', '删除问题', '1', null, '3', '2', '3');
INSERT INTO `wzd_node` VALUES ('14', 'report_del', '删除被举报问题', '1', null, '4', '2', '3');
INSERT INTO `wzd_node` VALUES ('15', 'answers_list', '回答列表', '1', null, '1', '4', '3');
INSERT INTO `wzd_node` VALUES ('16', 'answers_report', '回答举报列表', '1', null, '2', '4', '3');
INSERT INTO `wzd_node` VALUES ('17', 'answers_delete', '删除回答', '1', null, '3', '4', '3');
INSERT INTO `wzd_node` VALUES ('18', 'report_del', '删除被举报回答', '1', null, '4', '4', '3');
INSERT INTO `wzd_node` VALUES ('19', 'topic_list', '话题列表', '1', null, '1', '5', '3');
INSERT INTO `wzd_node` VALUES ('20', 'topic_delete', '删除话题', '1', null, '2', '5', '3');
INSERT INTO `wzd_node` VALUES ('21', 'tag_list', '标签列表', '1', null, '1', '6', '3');
INSERT INTO `wzd_node` VALUES ('22', 'tag_delete', '删除标签', '1', null, '2', '6', '3');
INSERT INTO `wzd_node` VALUES ('23', 'accessManage', '角色权限管理', '1', null, '5', '3', '3');
INSERT INTO `wzd_node` VALUES ('24', 'addManager', '添加管理员', '1', null, '6', '3', '3');
INSERT INTO `wzd_node` VALUES ('25', 'addNode', '添加节点', '1', null, '7', '3', '3');
INSERT INTO `wzd_node` VALUES ('26', 'addRole', '添加角色', '1', null, '8', '3', '3');
INSERT INTO `wzd_node` VALUES ('27', 'user_manage', '前台用户管理', '1', null, '9', '3', '3');
INSERT INTO `wzd_node` VALUES ('28', 'manager_manage', '后台用户管理', '1', null, '10', '3', '3');
INSERT INTO `wzd_node` VALUES ('29', 'node_manage', '节点编辑', '1', null, '11', '3', '3');
INSERT INTO `wzd_node` VALUES ('30', 'role_manage', '角色管理', '1', null, '12', '3', '3');
INSERT INTO `wzd_node` VALUES ('32', 'node_delete', '删除节点', '1', null, '13', '3', '3');

-- ----------------------------
-- Table structure for `wzd_review`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_review`;
CREATE TABLE `wzd_review` (
  `uid` int(10) unsigned NOT NULL,
  `answer_id` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_review
-- ----------------------------
INSERT INTO `wzd_review` VALUES ('1', '13', '0');

-- ----------------------------
-- Table structure for `wzd_role`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_role`;
CREATE TABLE `wzd_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_role
-- ----------------------------
INSERT INTO `wzd_role` VALUES ('1', 'Manager', null, '1', '管理员');
INSERT INTO `wzd_role` VALUES ('2', 'Editor', null, '1', '编辑');

-- ----------------------------
-- Table structure for `wzd_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_role_user`;
CREATE TABLE `wzd_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_role_user
-- ----------------------------
INSERT INTO `wzd_role_user` VALUES ('1', '2');
INSERT INTO `wzd_role_user` VALUES ('2', '3');
INSERT INTO `wzd_role_user` VALUES ('2', '4');

-- ----------------------------
-- Table structure for `wzd_tags`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_tags`;
CREATE TABLE `wzd_tags` (
  `tagname` varchar(30) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_tags
-- ----------------------------
INSERT INTO `wzd_tags` VALUES ('adsad', '1', '1');
INSERT INTO `wzd_tags` VALUES ('sadads', '1', '2');
INSERT INTO `wzd_tags` VALUES ('这是一个标签', '1', '3');
INSERT INTO `wzd_tags` VALUES ('这是一个标签你好你好', '1', '4');
INSERT INTO `wzd_tags` VALUES ('这是一个标签你好你111', '1', '5');

-- ----------------------------
-- Table structure for `wzd_topic`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_topic`;
CREATE TABLE `wzd_topic` (
  `topicname` varchar(255) NOT NULL,
  `questions` int(10) unsigned DEFAULT '0' COMMENT '话题下问题数量',
  `description` text NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_topic
-- ----------------------------
INSERT INTO `wzd_topic` VALUES ('这是测试话题', '1', '这是测试话题', '1');
INSERT INTO `wzd_topic` VALUES ('新的话题', '2', '新的话题', '2');

-- ----------------------------
-- Table structure for `wzd_user`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_user`;
CREATE TABLE `wzd_user` (
  `answers` int(10) unsigned NOT NULL DEFAULT '0',
  `asks` int(10) unsigned NOT NULL DEFAULT '0',
  `signame` varchar(255) NOT NULL DEFAULT '这个家伙很懒，什么都没有留下',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lastlogintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logo` varchar(255) NOT NULL DEFAULT 'http://wzdlogo.qiniudn.com/default.jpeg',
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `thanks` int(10) unsigned NOT NULL DEFAULT '0',
  `email` varchar(40) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `realname` varchar(60) NOT NULL DEFAULT '匿名',
  `password` varchar(32) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `registertime` datetime NOT NULL,
  `praise` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_user
-- ----------------------------
INSERT INTO `wzd_user` VALUES ('3', '16', '这个家伙很懒，什么都没有留下', '1', '2014-05-23 12:53:13', 'http://wzdlogo.qiniudn.com/default.jpeg', '1', '0', '835127729@qq.com', '暨南大学', 'crazychen', 'f6fdffe48c908deb0f4c3bd36c032e72', '1', 'adminadmin', '0000-00-00 00:00:00', '13');
INSERT INTO `wzd_user` VALUES ('0', '0', '这个家伙很懒，什么都没有留下', '1', '2014-05-20 10:51:14', 'http://wzdlogo.qiniudn.com/default.jpeg', '1', '0', null, null, '匿名', 'b855f870c7312d825d5b030a60c08fa5', '2', 'ckytest', '2014-05-20 10:51:14', '0');

-- ----------------------------
-- Table structure for `wzd_user_report`
-- ----------------------------
DROP TABLE IF EXISTS `wzd_user_report`;
CREATE TABLE `wzd_user_report` (
  `id` int(10) unsigned NOT NULL,
  `reporterid` int(10) unsigned NOT NULL,
  `reportid` int(10) unsigned NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '户用未填写举报理由',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wzd_user_report
-- ----------------------------
