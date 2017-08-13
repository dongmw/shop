/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100203
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 100203
File Encoding         : 65001

Date: 2017-04-26 22:44:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for addresses
-- ----------------------------
DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of addresses
-- ----------------------------
INSERT INTO `addresses` VALUES ('1', '62', '湖北省', '黄石市', '阳新县', '兴国镇用录组村柴林口', '2017-01-06 12:01:47', '2017-01-06 12:02:03', '15057518924', '董美伟');
INSERT INTO `addresses` VALUES ('2', '62', '湖北省', '武汉市', '江夏区', '东湖高新大邱社区11栋', '2017-01-07 16:45:52', '2017-01-07 16:45:55', '15057518924', '董美伟');
INSERT INTO `addresses` VALUES ('3', '62', '浙江省', '温州市', '柳市', '进港大道金龙控股集团', '2017-01-07 21:13:47', '2017-01-07 21:13:47', '15057518924', '董美伟');

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ad_category_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES ('1', 'SEELE游戏电脑', '0', 'https://sale.jd.com', '超强性能', '99', '2016-12-26 16:17:27', '2016-12-26 16:17:27', '1');
INSERT INTO `ads` VALUES ('2', '希捷移动硬盘', '0', 'https://www.jd.com', '希捷移动', '99', '2016-12-26 17:50:35', '2016-12-26 17:50:35', '1');
INSERT INTO `ads` VALUES ('3', '北京时尚', '0', 'https://www.jd.com', '北京旅行', '99', '2016-12-26 17:52:41', '2016-12-26 17:52:41', '2');
INSERT INTO `ads` VALUES ('4', '普吉岛时尚', '0', 'https://www.jd.com', '普吉岛旅行', '99', '2016-12-26 17:53:29', '2016-12-26 17:53:29', '2');
INSERT INTO `ads` VALUES ('5', '埃及时尚', '5', 'https://www.jd.com', '埃及旅行', '99', '2016-12-26 17:54:07', '2016-12-26 17:54:07', '2');
INSERT INTO `ads` VALUES ('6', '测试', '7', 'http://www.apple.com', '手机', '99', '2017-02-22 04:42:04', '2017-02-22 04:42:04', '1');

-- ----------------------------
-- Table structure for ad_categories
-- ----------------------------
DROP TABLE IF EXISTS `ad_categories`;
CREATE TABLE `ad_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_categories
-- ----------------------------
INSERT INTO `ad_categories` VALUES ('1', '首页焦点图', 'http://oi5rltbuz.bkt.clouddn.com/089ccf394b373a107d6dd2e8be73969a.jpeg', '首页焦点图', '99', '2016-12-26 13:54:23', '2016-12-26 13:54:23');
INSERT INTO `ad_categories` VALUES ('2', '首页banner3广告', 'http://oi5rltbuz.bkt.clouddn.com/e8ca15be5552983f97dee9f56742b8d1.jpeg', '首页banner3广告', '99', '2016-12-26 13:56:03', '2016-12-26 13:56:03');

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES ('1', '苹果', '', 'http://www.apple.com', ' ', '1', '1', null, '2017-02-20 07:10:56');
INSERT INTO `brands` VALUES ('2', '三星', '', 'http://www.sangung.com', ' ', '0', '1', null, '2017-02-14 06:38:04');
INSERT INTO `brands` VALUES ('3', '华为', '', 'http://www.huawei.com', ' ', '1', '8', null, '2016-12-21 10:37:36');
INSERT INTO `brands` VALUES ('4', '联想', ' ', 'http://www.lenovo.com', ' ', '1', '99', null, null);
INSERT INTO `brands` VALUES ('11', '小米', '', 'http://www.xiaomi.com', '', '0', '9', '2016-12-13 06:39:49', '2017-02-14 06:38:06');
INSERT INTO `brands` VALUES ('9', '魅族', '', 'http://www.meizu.com', '', '0', '6', '2016-12-13 06:25:20', '2017-02-14 06:38:05');

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `num` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES ('103', '22', '62', '2', '2017-01-02 07:45:15', '2017-02-20 08:22:43');
INSERT INTO `carts` VALUES ('104', '20', '62', '1', '2017-01-19 07:19:48', '2017-02-20 04:57:51');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 99,
  `is_show` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` tinyint(4) NOT NULL DEFAULT 99,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', '', '电子产品', '', '99', '0', '1', null, '2017-02-13 04:22:05');
INSERT INTO `categories` VALUES ('3', '1', 'http://oi5rltbuz.bkt.clouddn.com/7iubPg90XrHMy7cVcoiEouujokV0Kdkk2mRUv6rj.jpeg', '手机', '手机的分类', '99', '1', '1', null, '2017-02-20 02:19:42');
INSERT INTO `categories` VALUES ('4', '1', '', '平板', '', '99', '1', '99', null, '2016-12-15 06:14:17');
INSERT INTO `categories` VALUES ('5', '2', 'http://oi5rltbuz.bkt.clouddn.com/fadc81e34604a7a0a739102494904989.jpeg', '空调', '', '99', '1', '99', null, '2016-12-27 15:58:12');
INSERT INTO `categories` VALUES ('8', '2', 'http://oi5rltbuz.bkt.clouddn.com/34bf282a7cf293183371ef3732fbbf6b.jpeg', '冰箱', '1', '99', '1', '99', '2016-12-15 03:58:40', '2016-12-27 15:58:43');
INSERT INTO `categories` VALUES ('2', '0', 'http://oi5rltbuz.bkt.clouddn.com/8dcefc89f1e3653e900e9ca63a7da3d7.jpeg', '家电', ' ', '99', '0', '9', null, '2017-02-13 04:22:06');
INSERT INTO `categories` VALUES ('13', '12', '', '休闲', '', '99', '1', '99', '2016-12-15 07:33:51', '2016-12-15 07:33:51');
INSERT INTO `categories` VALUES ('12', '0', ' ', '长乐未央', ' ', '99', '1', '12', null, '2017-01-21 19:36:49');
INSERT INTO `categories` VALUES ('6', '1', ' ', '电脑', '  ', '99', '1', '99', null, null);
INSERT INTO `categories` VALUES ('14', '12', '', '办公', '办公类的产品', '99', '1', '99', '2016-12-26 04:18:01', '2016-12-26 04:18:01');

-- ----------------------------
-- Table structure for category_product
-- ----------------------------
DROP TABLE IF EXISTS `category_product`;
CREATE TABLE `category_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category_product
-- ----------------------------
INSERT INTO `category_product` VALUES ('14', '3', '20');
INSERT INTO `category_product` VALUES ('15', '3', '21');
INSERT INTO `category_product` VALUES ('16', '3', '22');
INSERT INTO `category_product` VALUES ('17', '3', '23');
INSERT INTO `category_product` VALUES ('18', '4', '24');
INSERT INTO `category_product` VALUES ('19', '4', '25');
INSERT INTO `category_product` VALUES ('20', '6', '25');
INSERT INTO `category_product` VALUES ('35', '6', '26');
INSERT INTO `category_product` VALUES ('34', '4', '26');
INSERT INTO `category_product` VALUES ('25', '3', '27');
INSERT INTO `category_product` VALUES ('26', '4', '27');
INSERT INTO `category_product` VALUES ('27', '6', '27');
INSERT INTO `category_product` VALUES ('28', '3', '28');
INSERT INTO `category_product` VALUES ('29', '4', '28');
INSERT INTO `category_product` VALUES ('30', '6', '28');
INSERT INTO `category_product` VALUES ('31', '3', '29');
INSERT INTO `category_product` VALUES ('32', '4', '29');
INSERT INTO `category_product` VALUES ('33', '6', '29');

-- ----------------------------
-- Table structure for chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE `chat_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(4) NOT NULL,
  `message` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of chat_messages
-- ----------------------------
INSERT INTO `chat_messages` VALUES ('1', '1', 'Howdy everyone', '2017-02-20 15:33:35', '2017-02-20 15:33:35');

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `shortcut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qq` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_phone` int(11) NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO `configs` VALUES ('1', 'SHOPPING-HOME&商城', '商城', 'welcome to here buy buy buy', '', '+++++++++++', '++++++++++++', '董美伟', '武汉*****', '943113712', '943113712@qq.com', '7350962', '+++++++', '15057518924');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(11) DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headimgurl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('11', 'ojoGDjnEi1NCwK3QtARq_FIvLZu0', '2', '深爱阳', '', '', '', '天津', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg57SJsNMItiahfKBk1ia0xpqvN0n2fY5dZCiamQ5CwdA9tGiaAibnhIQB6ZFvzkEeekKswqbPtBxjk0NYRJ14sVibbBF0/0', '2015-08-24 03:35:51', '2015-08-24 03:35:51');
INSERT INTO `customers` VALUES ('12', 'ojoGDjsQtGkWm8LntV-D0HRyML14', '2', '徐琳', '', '', '', '重庆', null, null, null, 'http://wx.qlogo.cn/mmopen/u8mbrzGDk0CXZLAWDwPy8ngZ8aUoBjQOdOK1LkuAtYbKYYSQxd8IxkzVJkCYSNDspwXUfHKQfffgDURaovtDUyFvWjic0c5Iv/0', '2015-08-25 05:30:22', '2015-08-25 05:30:22');
INSERT INTO `customers` VALUES ('13', 'ojoGDjlK7mkAqJ03B2TEBCMJGYwI', '1', 'Lei', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkYjEKQWDy2dyaWjVS5f8v8hadae7rTWfxbhC7nbqAeHITTEerYlKmg1Cd979abvv6BuxZOWkibYLGg/0', '2015-08-30 03:49:00', '2015-08-30 03:49:00');
INSERT INTO `customers` VALUES ('14', 'ojoGDjvCYx8e2bG0-SdiN0IvIP9M', '1', '拒绝融化的冰', '', '', '西安', '陕西', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkY4ElBnUOfTbRIRBp0Cib8qjuWbGfmiaHP7HicUhticuWC5Cn3TWNKHl2dlfVwEDIS1ib1ov27jibpia2UEp6JSfVNDcJE/0', '2015-08-30 06:25:46', '2015-08-30 06:25:46');
INSERT INTO `customers` VALUES ('16', 'ojoGDjkrcg1m8jVC33Kqrk9DO2Nk', '1', '蒋励睿', '', '', '咸宁', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkY4ElBnUOfTbRniauuhrztxjIZA1EWlfOThhiaTHy6GicbiapoVDdSBJaSr4icVFKnQwc5cK0Soaou9iaSr8wL8Fr8DFf/0', '2015-09-29 04:03:27', '2015-09-29 04:03:27');
INSERT INTO `customers` VALUES ('18', 'ojoGDjhjbQzTgw0aE-rtCGbPDvSo', '1', '王63', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkY4ElBnUOfTbaWffsuk3Qh8bPrIibvv5Qg6jHy1icfRNkXyA94AHiboaibhJQ5lUW70m78BpsXdZBIdpVyMzvNQyKsU/0', '2015-09-29 04:03:57', '2015-09-29 04:03:57');
INSERT INTO `customers` VALUES ('19', 'ojoGDjhB5ZsApmq6gTx8nL8wXy-g', '1', '所谓幸福、', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLDibQ0FDYR3TrZJsxwVsp1vzmuH3ZbSNphVQMPdbZ3769nicsElJE1pl0WKAkHnJuv5v6ibB2RTl3gQw/0', '2015-09-29 04:41:33', '2015-09-29 04:41:33');
INSERT INTO `customers` VALUES ('20', 'ojoGDjqJ74JbIzSGVyZ1p4OxyRbc', '1', '怨你念你', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg4R0NlUVU9J4C9U5eVI9u9ciaPAcsibcAdoF5QC9C9ZT3mV1MAKGSDGWxAppnvpOadaUCKVjY0FEeZ72PSkRSPlicX/0', '2015-09-29 04:41:59', '2015-09-29 04:41:59');
INSERT INTO `customers` VALUES ('21', 'ojoGDjr6BF2O8kqiwZ_FajSKu7y8', '1', '名字原来可以起这么长啊啊啊啊啊啊', '', '', '', '北京', null, null, null, 'http://wx.qlogo.cn/mmopen/u8mbrzGDk0DNYM1ngGAN1aFF3jIzeGYicCDP12llo07FVplmTJ3Wowo3OP00Y8ictBn3KInseFIXZYNbAaIfuAtP9j7QibVE3gg/0', '2015-09-29 04:42:08', '2015-09-29 04:42:08');
INSERT INTO `customers` VALUES ('22', 'ojoGDjlWE7xDTfmCOdpRc5us_Lpw', '1', '熊国旗', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/XzhF92tBcezG6aSeCgjsPYITB6C27QHia9uic1mrpDpETSyA5dyrOrGibdgOdjnmcSUibN6LX0C1DRwSNquTqczXsA/0', '2015-09-29 04:42:15', '2015-09-29 04:42:15');
INSERT INTO `customers` VALUES ('23', 'ojoGDjr34dsRmJilaoUeVUi6qkdk', '1', '临川，阿三', '', '', '西安', '陕西', null, null, null, 'http://wx.qlogo.cn/mmopen/XzhF92tBcexMBB3N1ibgibhV3sHicIOtgIEibJsUgfmu6Y9673SLemRE446HRiceFdFw8zK8wQNcxtic0We910zMQMWQ/0', '2015-09-30 13:19:09', '2015-09-30 13:19:09');
INSERT INTO `customers` VALUES ('24', 'ojoGDjoy02l8pSk3Llrpe10ANmZU', '1', 'HDJ', '', '12', '', '上海', null, null, null, 'http://wx.qlogo.cn/mmopen/u8mbrzGDk0BGvm0drKaaSM1esIeuFiccP5INjDdYz98YXKIkTUn4J0gg1jZvt9C5f5bGB2hMcsdnWIdCayRAasgBdNXb7ZYicD/0', '2015-11-03 10:25:40', '2016-04-23 14:20:02');
INSERT INTO `customers` VALUES ('25', 'ojoGDjpRbbk9zF3JaoT10FlB6kjM', '1', '阿兵', '', '', '荆门', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkY4ElBnUOfTbYLLiaIWHNx7hWicnB4t9ibPTvd4ibp7vPkzg9K48PgE0DGeqLb91BPyzJ98vJ82PWXLjBw62cUKAFEJ/0', '2015-11-11 16:15:48', '2015-11-11 16:15:48');
INSERT INTO `customers` VALUES ('26', 'ojoGDjgTFqPQmQNukGPV9e_-hQLI', '1', '王敬贤', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkaxrzoSqXTa2pbFtQGx8o5XCeLIDC9F6UoSP7IKATCuyu8PR6S36a3ezHHEXmOwSvXp3Yicy5Y9YHC9ga4a4FuaR/0', '2015-11-20 08:11:29', '2015-11-20 08:11:29');
INSERT INTO `customers` VALUES ('27', 'ojoGDjgMcQT-tmCi5BkijpDuVu-c', '1', '金威', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM41YYemIiaO86ZAosTicOhFKicgVv6xbmerWlv7xkWic2MRxTpgSxttzCahabrxV38n4xAHnWudG0n39Q/0', '2015-11-20 13:47:39', '2015-11-20 13:47:39');
INSERT INTO `customers` VALUES ('28', 'ojoGDjtiswvF8a_jQ17kNYueqtEU', '1', '心程', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/u8mbrzGDk0DxeVmXBvGlp26icDIfYdnI4QJnia19spvSicFYXoohByaKzjTeeQ1ssj3TLoqzO6htJm5O7to8tBYaTWd6iaOWYwsb/0', '2015-11-21 16:39:42', '2015-11-21 16:39:42');
INSERT INTO `customers` VALUES ('29', 'ojoGDjg4pi2XWHH9NsJooV1mUIWo', '1', '芒果好好吃', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkY4ElBnUOfTbSOprMiaq0znejzjiaOxjTm5M3icNPbZibxMTyphD0u9rzHAqg2L3myhWLeBCDnEDWGXBItvg2Yz4KxX/0', '2015-11-23 02:40:22', '2015-11-23 02:40:22');
INSERT INTO `customers` VALUES ('31', 'ojoGDjo9vGsCzmN9IJmH_lVLtF3A', '1', '江江', '', '10', '荆州', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg57SJsNMItiahTFYjicBdabLRpaPmicfKYiazeibssprlc8vAia1JSjaoc6jPJ62O3mV7WvTYAFv3Krc4Dm4cVU80gJAg/0', '2016-04-22 11:34:13', '2016-04-22 20:37:34');
INSERT INTO `customers` VALUES ('32', 'ojoGDjjXiLbQuvhAP0RRZGkZbZa8', '2', '牛牛', '', '8', '荆州', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/XzhF92tBcewHcbEwUyHBkhPfpB1qhYaibEWSUHzCOWWfXQWianl5lYq5Voq6HGggnzYKqtRYiaE5sBWJdDInxpGkw/0', '2016-04-22 11:34:16', '2016-04-22 12:53:22');
INSERT INTO `customers` VALUES ('33', 'ojoGDjmz5-k-7exr58rMWef8Dbco', '2', '试着，改变', '', '21', '襄阳', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg57SJsNMItiahYAqWRxsYnSbYz1IcsHh2WSXdyqppmHhVAJLAWVskuh6ScUfqmOicJ4NBVphhibSW0iapIL59jSE1Ql/0', '2016-04-22 11:34:50', '2016-04-24 13:41:44');
INSERT INTO `customers` VALUES ('34', 'ojoGDjlZytLCN7pIFvSNH8x6MxSw', '2', '皮皮', '', '9', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/XzhF92tBcezZribj8sibsXqfNgaWpt3Bb7icQApZZXbFNczCGu37c8icpsyicObU4zcsvPkSFw88vS9DSIwGHbuPb9w/0', '2016-04-22 12:51:40', '2016-04-22 12:57:14');
INSERT INTO `customers` VALUES ('35', 'ojoGDjsYl6YR0PCrNWsl-J02NqGo', '1', '流纪末', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLATHcHD3hmmzUoNumUHUiaxSmU0AuaGAvvXjUBFJUXAuOQKDex4y5bGM6TT19zze9u6SNQLPib916tZhicoekKibjyWqIyhQaZFXaQ/0', '2016-04-22 19:02:14', '2016-04-22 19:02:14');
INSERT INTO `customers` VALUES ('36', 'ojoGDjktNfh7-8WBTIQXeqgf2v-Y', '1', '风鸟', '', '', '', '河北', null, null, null, 'http://wx.qlogo.cn/mmopen/THgYXIphyQlz9hibKq3Vl0Sd41eNFkibc4CavIGdtRsRKicibrvaiabMiaBarsCdt8jDF0ocNiajkOb4AaibwX7BByUPnFarmwjicBCKo/0', '2016-04-22 20:31:00', '2016-04-22 20:31:00');
INSERT INTO `customers` VALUES ('37', 'ojoGDjiPrG-xrhItqUFlFNlyzPf8', '1', 'levitate', '', '25', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg4lYWxIyKg4ZCIoq2bmuBsAHjicicHlSNw0vCIsSZhhas0SvcAlSeaMpZlCK6YS37cBWdNNUkwYqdcg/0', '2016-04-23 14:10:17', '2016-04-29 21:11:30');
INSERT INTO `customers` VALUES ('38', 'ojoGDjnVT86omBV-zO_quxsP7g10', '1', '第四维', '', '16', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/zC0YGM2wjE6184mngbhtJeMycSrpI4zwuMpnRXlTXl2ZdmjbLPrCic8WhIjX8z8qpEp7zUKAcVBiaLW3iaXFbEcfVsUUCAGXUGM/0', '2016-04-23 15:39:15', '2016-04-23 15:41:33');
INSERT INTO `customers` VALUES ('39', 'ojoGDjr0OGoVxxSVDZN0OGwACSK4', '2', '一缕晨曦', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg605pQWBnPrup6TRrkPQaNMK9brN9GqNCAY7BeJagrScxyddju2MicFEQ8SlqbxQQLqMTxCxqib2m9x7p4A3NrxKn/0', '2016-04-25 10:57:34', '2016-04-25 10:57:34');
INSERT INTO `customers` VALUES ('40', 'ojoGDjnrzRZtcVIzlEcnXsmIofls', '2', '夏莉莉', '', '', '', '北京', null, null, null, 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEIyfJ6sKW3SfGJGQVicdK6eRflic68Oiawn1728MwszCpLEIBYsicicZmia0T2RCCzsfHN47hvYekGAOIJA/0', '2016-04-26 12:49:18', '2016-04-26 12:49:18');
INSERT INTO `customers` VALUES ('41', 'ojoGDju22lbYI7BGdcHYtH6TecBM', '1', '✿', '', '27', '', '天津', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkY4ElBnUOfTbTfsvoBWbh8yYFwOsHS36oMKAJ7HjzO0RwbdiazMmibgIIe9oYpd2bniaCjtlbuMIIz3p0FAZrJcoGz/0', '2016-04-26 12:49:26', '2016-04-27 21:27:18');
INSERT INTO `customers` VALUES ('42', 'ojoGDjumgV1cP1b7yPpnINnutCpk', '2', '于晓嘉', '', '23', '', '上海', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkaxrzoSqXTa2iawYFKqTdUSGXNu87Oay95XblHiaAvh2666Mor5nEgRoBvvOMRoLNF98DldgPDlwN0WibUrqA1jUV5/0', '2016-04-26 12:49:27', '2016-04-26 14:31:09');
INSERT INTO `customers` VALUES ('43', 'ojoGDjjgrTaQqElAi54t2CuSN1_U', '1', ' ', '', '', '', '重庆', null, null, null, 'http://wx.qlogo.cn/mmopen/THgYXIphyQlz9hibKq3Vl0bpX8iaWXypmI7j7piaDxaIsfnZqrw2LBFaLeicTXpicHPQ92tV0Sric0YVAgzcWL5bhgsUsvqyWcr5r1/0', '2016-04-26 14:16:53', '2016-04-26 14:16:53');
INSERT INTO `customers` VALUES ('44', 'ojoGDjmS1trWOpBqOX8liHIuxo4Y', '1', 'Disne', '', '30', '武汉', '湖北', null, null, null, '', '2016-04-27 12:17:51', '2016-05-10 13:01:16');
INSERT INTO `customers` VALUES ('45', 'ojoGDjmnUkgyF4_kXH11Ese4kDT8', '1', '翼龙', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/u8mbrzGDk0DNYM1ngGAN1WbcdRzvO7ULODeaSLHOoNxibUFFquRCeGftBmQibiaXFNPk00wKO04fKw1kIua8Jib26M2JhWEje6tO/0', '2016-04-28 11:06:37', '2016-04-28 11:06:37');
INSERT INTO `customers` VALUES ('46', 'ojoGDjtSU1NPZ5SqChQAh5CqEC0g', '1', '李东山', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLDjQNpzmctEVGE5VGb7jBZ4mYV6mL6QvT5AyZvl01E7GSSsP1HBDviaibevfmPaRP3Yvayq7WskNRtg/0', '2016-05-03 22:27:26', '2016-05-03 22:27:26');
INSERT INTO `customers` VALUES ('47', 'ojoGDjh2IY3OKt3UleD1qwp_lgEo', '1', 'Aaron Ryuu', '', '28', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg57SJsNMItiahX87hLKHqPyfLhojdcdo6GZmES4pib7eOicSKCuUwaNibnic9Pg5MTlCOm0H8HUYw4ibmePqbGZuswmTB/0', '2016-05-03 22:53:41', '2016-06-15 15:20:30');
INSERT INTO `customers` VALUES ('48', 'ojoGDjiJ_VsMHqGbkAKyTAys3lSU', '1', '懒得理你', '', '29', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/PiajxSqBRaELzu4F55YaM1ew6y3xUO5OzhKiacibRj1sXFJOl3nfbsSZCrIbl4bZIt86nJ0rVJH8ZTFKiaQ32CV8AQ/0', '2016-05-06 14:26:22', '2016-05-06 14:27:51');
INSERT INTO `customers` VALUES ('49', 'ojoGDjiqhwS8oMSXI5yJfuom7ig4', '2', '西子', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKvS4B2CdqiaLdZ4MeibroFpJpicX2lxALn1RqD9Zq1KAPyUojPO7XXzsFvNlBCOC7sRdUMXltOoiae7g/0', '2016-05-06 14:26:25', '2016-05-06 14:26:25');
INSERT INTO `customers` VALUES ('50', 'ojoGDjnna8WPffcub0CIHFUGMUgA', '1', '万卷皓', '', '32', '', '北京', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkbSAovDpbnwmrcfD6GtBhjpMJ8SckblGrPMOjFVv6ydVqHfBzvCFYAGv8TQEsy0CExEbcDV68cTSPsNFJpkCb1G/0', '2016-05-25 10:54:59', '2016-05-25 10:56:14');
INSERT INTO `customers` VALUES ('51', 'ojoGDjm8YXj7csf3VaGBZLEEonSY', '1', '( ͡° ͜ʖ ͡°)', '', '33', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM70ickTldycTXqMjQ9Fnpxlj28J6FKThhNfrNccXxibppW7EMtxbukRBQ5CLMLQuAM7p6dBLlgtvXaFMVHeDtgAEhia5QfXnPrdSI/0', '2016-05-30 15:48:20', '2016-05-30 15:50:22');
INSERT INTO `customers` VALUES ('52', 'ojoGDjvHyvbcD_csxiNjgTY841jk', '1', '邓权', '', '', '荆门', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/u8mbrzGDk0AH1TmC6n0ZSxFZVNnyq6UCISoMRqspicq41CNjRKuljOyaROjGqPO1aB7JOK4oJhB8yDH6yXjpyWYqkzlRcyeD4/0', '2016-06-12 22:12:34', '2016-06-12 22:12:34');
INSERT INTO `customers` VALUES ('53', 'ojoGDjl0D7i2ofFcKRr1jM4U0zXU', '1', '冯帅', '', '34', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/XzhF92tBcexI7p8K0pv578XCkcZ0ewNOPonh9Fdk73OgF5nEbU4jZuygDehaic2svOeVIib6VJ8YpicylNk65x2NlITCYoc6WxF/0', '2016-06-13 15:05:11', '2016-06-13 15:06:14');
INSERT INTO `customers` VALUES ('54', 'ojoGDjt-pbDBVFMV3bMYoTTcjnZc', '1', '未来多远', '', '35', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLDTHiak5CA3fOH844ETI25HU9OsZtvKRdicZSdXgbY5NvvzCYK9Gib8z3qxdCh4vFGcRLYzzFnr91beg/0', '2016-06-13 15:05:16', '2016-06-14 21:03:52');
INSERT INTO `customers` VALUES ('55', 'ojoGDjlmTE-mJt-i58rXdkTf4ASM', '1', 'ccs', '', '36', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/XzhF92tBcexkobRoZAnN7s2icXgjMqGsuKHBZh8STqzhrodJiboOLCN1FJ4X6mSw45yV6HCgiaRXlYssNv2TJE7YNj2jGdpJyQu/0', '2016-06-15 14:45:39', '2016-06-15 14:48:53');
INSERT INTO `customers` VALUES ('56', 'ojoGDjhZ44mDOLJQtwuC2J2YIDIM', '1', 'Forrest', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg57SJsNMItiahRzLgLyGnPkiaxYFtI4Nd7MngfdLibYJHaAY9rfdXpvnkv2Maiaxlo7CUWib6Saq3Thxd3Sibdthb5Pvic/0', '2016-06-15 15:11:57', '2016-06-15 15:11:57');
INSERT INTO `customers` VALUES ('57', 'ojoGDjuv0LFXojPCj4y4_i2iOAHk', '1', '莫忘初心', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/78l5GCicaYg57SJsNMItiahctDEdFSRgnWyf8TCetSZutwMS1k11gVFK4E6icVniaWqGSuasRlCoHhJznKDvcmYBSNskppxqycYic/0', '2016-06-15 15:12:40', '2016-06-15 15:12:40');
INSERT INTO `customers` VALUES ('58', 'ojoGDjmh3bPk2eDAIutLHoaLBqko', '2', '云', '', '', '西安', '陕西', null, null, null, 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLANr0edkxrgReBficSRdicjStOSiaEncCpXZJZAOn6lSMpTp9XpxvzamtcExlFS0AXsAbElxLREXA9CwmvMDy0nVb7yK23lVibqTlE/0', '2016-06-15 18:35:51', '2016-06-15 18:35:51');
INSERT INTO `customers` VALUES ('59', 'ojoGDjmEg9NUtrFzXI6wG5Rrbw70', '1', '如果如果。', '', '38', '鄂州', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/XzhF92tBcewHdAPW9C2dyChRUIzESADDgGQKxNW00uAWhQH7H9QftzZdwP6yULSJic6aF34SPIgmkZOute4ic8Ww/0', '2016-06-19 22:37:39', '2016-06-19 22:38:23');
INSERT INTO `customers` VALUES ('60', 'ojoGDjvIykQNT9LTIjEAMnBAPAwg', '1', '電助', '', '39', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkaxrzoSqXTa2s8HQfXlNibhDQv5qrQ7ET18DKBgEiaroux1vUnyunQQWNnlN0Dmltr5LEQ92qHmxwiaqCSUtce56DK/0', '2016-06-20 10:22:39', '2016-06-20 10:23:49');
INSERT INTO `customers` VALUES ('61', 'ojoGDjv5D0XKNoGGyAUpiBiSUiSs', '1', 'Abing', '', '', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/83cU0pcHqg6fxQovqXskDuRvFF1RVfLBsxxB8Chc9cHIIJL6wGBljxJ4I8bfFruzhI3hyCzDEaohY8ssstWdPTkbyjvtMqxD/0', '2016-06-21 10:52:46', '2016-06-21 10:52:46');
INSERT INTO `customers` VALUES ('62', 'ojoGDjlOHoXdNFy11GYHQiyf_Z-A', '1', '轻风~', '', '1', '武汉', '湖北', null, null, null, 'http://wx.qlogo.cn/mmopen/DalCoibajMkY4ElBnUOfTbeMwBnqEEcDAa3vw7IgnGcq2TOt0d17DBMvyWEYOGAhEYc2dOeov7gKSABRCEpj2WDpxtr57SRiaR/0', '2016-06-23 12:58:47', '2016-06-23 13:01:09');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('6', 'iyF779m0HPSCB3HqVRU1oDn1EnWblH1HX91oNHbf.jpeg');
INSERT INTO `images` VALUES ('7', 'w3PGpb4alw0jpdxEBdoTyBQOd6HBv5LfZNESbd5w.jpeg');

-- ----------------------------
-- Table structure for lotteries
-- ----------------------------
DROP TABLE IF EXISTS `lotteries`;
CREATE TABLE `lotteries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` char(255) CHARACTER SET utf8 NOT NULL,
  `prize` char(255) CHARACTER SET utf8 NOT NULL,
  `openid` char(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lotteries
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_12_09_112929_create_configs_table', '2');
INSERT INTO `migrations` VALUES ('4', '2016_12_12_070525_create_brands_table', '3');
INSERT INTO `migrations` VALUES ('6', '2016_12_14_121429_create_categories_table', '4');
INSERT INTO `migrations` VALUES ('8', '2016_12_19_143704_create_productes_table', '5');
INSERT INTO `migrations` VALUES ('9', '2016_12_21_160300_create_category_product_table', '6');
INSERT INTO `migrations` VALUES ('10', '2016_12_21_160753_create_product_galleries_table', '7');
INSERT INTO `migrations` VALUES ('11', '2016_12_26_073133_create_ads_table', '8');
INSERT INTO `migrations` VALUES ('12', '2016_12_26_081015_create_ad_categories_table', '9');
INSERT INTO `migrations` VALUES ('13', '2016_06_01_000001_create_oauth_auth_codes_table', '10');
INSERT INTO `migrations` VALUES ('14', '2016_06_01_000002_create_oauth_access_tokens_table', '10');
INSERT INTO `migrations` VALUES ('15', '2016_06_01_000003_create_oauth_refresh_tokens_table', '10');
INSERT INTO `migrations` VALUES ('16', '2016_06_01_000004_create_oauth_clients_table', '10');
INSERT INTO `migrations` VALUES ('17', '2016_06_01_000005_create_oauth_personal_access_clients_table', '10');
INSERT INTO `migrations` VALUES ('18', '2017_01_06_035303_create_addresses_table', '11');
INSERT INTO `migrations` VALUES ('19', '2017_01_09_033743_create_orders_table', '12');
INSERT INTO `migrations` VALUES ('20', '2017_01_09_034221_create_order_products_table', '13');
INSERT INTO `migrations` VALUES ('21', '2017_02_20_151037_create_chat_messages_table', '14');

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('9ad61710061d18846bbd2902593f44853d2fb45d535cd94102b0351c0ccbc0b7f547927f36657b65', '1', '1', 'dong', '[]', '1', '2017-01-04 07:39:39', '2017-01-04 07:39:39', '2027-01-04 07:39:39');
INSERT INTO `oauth_access_tokens` VALUES ('cdd28aadfdaf554a2caafba98266f23ab86967bcc5762ec07e39d11552d0f70f8581f6026058a96a', '1', '1', 'dong', '[]', '1', '2017-01-05 07:07:26', '2017-01-05 07:07:26', '2027-01-05 07:07:26');
INSERT INTO `oauth_access_tokens` VALUES ('f4e810f20a0e0f93d4fe724c3eb403e93d25a2a86162dc471d2170a206f73dc33f5d627af9403375', '1', '1', 'dong', '[]', '1', '2017-01-05 07:07:28', '2017-01-05 07:07:28', '2027-01-05 07:07:28');
INSERT INTO `oauth_access_tokens` VALUES ('51cfc614ea52b5fefc6c0104370cc7a350aace5e089b6966c526c16af5ab5484e56e6e2d3678ee46', '1', '1', 'dong', '[]', '1', '2017-01-07 07:52:30', '2017-01-07 07:52:30', '2027-01-07 07:52:30');
INSERT INTO `oauth_access_tokens` VALUES ('358175ad9ec9aeb1dd36e08358ae106b91b55a8bb13ff11f7f859115938b5103cb637a09ef328f58', '1', '1', 'dong', '[]', '1', '2017-01-07 07:52:32', '2017-01-07 07:52:32', '2027-01-07 07:52:32');
INSERT INTO `oauth_access_tokens` VALUES ('72bf09919050b24d9d9bd53751fca440aa1ade2961aec9c0ff2745086e6c2c0bb125b03042d4bfa5', '1', '1', 'd', '[]', '0', '2017-01-07 07:52:58', '2017-01-07 07:52:58', '2027-01-07 07:52:58');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, 'SHOPPING-HOME&商城 Personal Access Client', 'hZEV3CMop2C8eY2CnTA4rX5nIJxytJgzRPuT3Hiz', 'http://localhost', '1', '0', '0', '2017-01-03 13:32:57', '2017-01-03 13:32:57');
INSERT INTO `oauth_clients` VALUES ('2', null, 'SHOPPING-HOME&商城 Password Grant Client', 'Gw5S9Fq4KkSlOkgiXc4eGdD0n8aZlfU4UmQlWpFL', 'http://localhost', '0', '1', '0', '2017-01-03 13:32:57', '2017-01-03 13:32:57');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2017-01-03 13:32:57', '2017-01-03 13:32:57');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(4) NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for order_products
-- ----------------------------
DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` tinyint(4) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order_products
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('13164184424@163.com', 'ef72ea957bf9455a378ec1ba7005423e443b0ea1e10bfa59e4f448a81b23170c', '2016-12-06 02:17:52');
INSERT INTO `password_resets` VALUES ('15057518924@163.com', '$2y$10$bE1pIw3TbRDV3cAETTKU6.9KL71MW63ngkLRJCtvfaRiAD73vQrWi', '2017-02-14 05:17:51');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(20) NOT NULL,
  `putaway` tinyint(1) NOT NULL DEFAULT 1,
  `stick` tinyint(1) NOT NULL DEFAULT 1,
  `recommend` tinyint(1) NOT NULL DEFAULT 1,
  `hot_sale` tinyint(1) NOT NULL DEFAULT 1,
  `new_product` tinyint(1) NOT NULL DEFAULT 1,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('20', 'iphone 7plus', 'http://oi5rltbuz.bkt.clouddn.com/df46d17e8d126a0dc63b1ed85432473d.jpeg', '1', '7388', '2', '1', '0', '0', '0', '0', '', '<p>这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2016-12-24 15:28:10', '2016-12-24 15:28:10', null);
INSERT INTO `products` VALUES ('21', '小米 5', 'http://oi5rltbuz.bkt.clouddn.com/5fd7d5d125bbf1ac71a4435ce5b6247f.jpeg', '11', '1788', '3', '1', '1', '1', '1', '0', '陶瓷工艺', '<p>这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2016-12-24 15:35:06', '2016-12-24 15:35:06', null);
INSERT INTO `products` VALUES ('22', 'samsung 4c', 'http://oi5rltbuz.bkt.clouddn.com/9b46469f4def245a956dd1b0dd47ff9a.jpeg', '2', '1799', '4', '1', '0', '1', '1', '1', '时尚', '<p>这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2016-12-24 15:38:10', '2017-02-20 07:11:01', null);
INSERT INTO `products` VALUES ('23', 'note 2plus', 'http://oi5rltbuz.bkt.clouddn.com/34b35c699050a9b923e70bd2a259f827.jpeg', '9', '1299', '5', '1', '0', '0', '1', '0', '', '<p>这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2016-12-24 15:40:15', '2016-12-26 02:37:24', null);
INSERT INTO `products` VALUES ('24', 'ipad air2', 'http://oi5rltbuz.bkt.clouddn.com/95318b9bbb08544c1283dcf24c5df7f1.jpeg', '1', '3688', '6', '1', '0', '1', '1', '1', '', '<p>这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2016-12-24 15:42:04', '2017-02-15 07:13:04', null);
INSERT INTO `products` VALUES ('25', 'huawei m3', 'http://oi5rltbuz.bkt.clouddn.com/c36e408b5fb735d4bad65274e0f8a357.jpeg', '3', '1888', '7', '1', '0', '0', '0', '0', 'good look', '<p>这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2016-12-24 15:45:07', '2017-02-15 07:12:40', null);
INSERT INTO `products` VALUES ('26', 'miix5 pro', 'http://oi5rltbuz.bkt.clouddn.com/bf0f88074379487154168830d36239e6.jpeg', '4', '6999', '8', '1', '0', '0', '1', '0', '便携，时尚', '<p>这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '2016-12-24 15:48:54', '2017-02-20 07:11:02', null);

-- ----------------------------
-- Table structure for product_galleries
-- ----------------------------
DROP TABLE IF EXISTS `product_galleries`;
CREATE TABLE `product_galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_galleries
-- ----------------------------
INSERT INTO `product_galleries` VALUES ('7', '21', 'http://oi5rltbuz.bkt.clouddn.com/20161224153503_12628.jpg');
INSERT INTO `product_galleries` VALUES ('8', '22', 'http://oi5rltbuz.bkt.clouddn.com/20161224153807_75879.jpg');
INSERT INTO `product_galleries` VALUES ('9', '23', 'http://oi5rltbuz.bkt.clouddn.com/20161224154011_66961.jpg');
INSERT INTO `product_galleries` VALUES ('10', '24', 'http://oi5rltbuz.bkt.clouddn.com/20161224154200_27226.jpg');
INSERT INTO `product_galleries` VALUES ('11', '25', 'http://oi5rltbuz.bkt.clouddn.com/20161224154504_31601.jpg');
INSERT INTO `product_galleries` VALUES ('12', '26', 'http://oi5rltbuz.bkt.clouddn.com/20161224154843_34603.jpg');
INSERT INTO `product_galleries` VALUES ('13', '27', 'http://oi5rltbuz.bkt.clouddn.com/20161226024827_29165.png');
INSERT INTO `product_galleries` VALUES ('14', '28', 'http://oi5rltbuz.bkt.clouddn.com/20161226025556_82649.jpg');

-- ----------------------------
-- Table structure for raffles
-- ----------------------------
DROP TABLE IF EXISTS `raffles`;
CREATE TABLE `raffles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(255) CHARACTER SET utf8 NOT NULL,
  `second` varchar(255) CHARACTER SET utf8 NOT NULL,
  `third` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `times` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of raffles
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'HYAC', '13164184424@163.com', '$2y$10$VS1HyQN3HUQHEjwWx.tiOe52Rq/bdRAFsvJcRwlSUjn2L9SSdxfbG', 'd1YMxnGIjq7jfE7L38PemaDPxIunILXPifRV09hhurM3cA0yU0oXpc4H2Zm5', '2016-12-05 05:32:27', '2017-02-13 04:07:29');
SET FOREIGN_KEY_CHECKS=1;
