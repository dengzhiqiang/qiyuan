<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_admin_log`;");
E_C("CREATE TABLE `ecs_admin_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `log_info` varchar(255) NOT NULL DEFAULT '',
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`),
  KEY `log_time` (`log_time`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3747 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_admin_log` values('3697','1446663718','6','编辑商店设置: ','222.182.199.85');");
E_D("replace into `ecs_admin_log` values('3698','1446663743','6','编辑商店设置: ','222.182.199.85');");
E_D("replace into `ecs_admin_log` values('3699','1446663787','6','编辑商店设置: ','222.182.199.85');");
E_D("replace into `ecs_admin_log` values('3700','1446665861','6','编辑商店设置: ','222.182.199.85');");
E_D("replace into `ecs_admin_log` values('3701','1446665871','6','编辑商店设置: ','222.182.199.85');");
E_D("replace into `ecs_admin_log` values('3702','1447181200','1','还原数据库备份: 备份时间2015-11-05 22:51:44','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3703','1450021611','1','编辑权限管理: admin','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3704','1450021652','1','编辑权限管理: admin','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3705','1450445638','1','还原数据库备份: 备份时间2015-12-13 15:50:41','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3706','1450445736','1','编辑权限管理: admin','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3707','1450446873','1','添加友情链接: ecshop模板','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3708','1463475856','1','编辑权限管理: webmaster','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3709','1463476448','1','删除友情链接: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3710','1463476451','1','删除友情链接: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3711','1463476453','1','删除友情链接: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3712','1463476470','1','编辑友情链接: TTSHOP','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3713','1463535181','1','编辑商品: Yeelight床头灯','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3714','1463535188','1','编辑商品: Yeelight床头灯','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3715','1463535307','1','回收商品: Yeelight床头灯','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3716','1463535412','1','批量删除商品: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3717','1463535989','1','编辑权限管理: admin','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3718','1488089560','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3719','1488096178','1','编辑商品分类: 活动预报','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3720','1488096252','1','编辑商品分类: 围棋','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3721','1488096280','1','编辑商品分类: 象棋','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3722','1488096576','1','删除商品分类: 围棋','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3723','1488096598','1','编辑商品分类: 围棋','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3724','1488096762','1','删除商品分类: 围棋','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3725','1488096794','1','编辑商品分类: 围棋','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3726','1488097133','1','编辑商品分类: 活动预报','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3727','1488097331','1','编辑商品分类: 国际象棋','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3728','1488097354','1','编辑商品分类: 体育活动','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3729','1488097544','1','编辑商店设置: ','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3730','1488097723','1','添加友情链接: 技术支持：京智科技','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3731','1488100584','1','卸载支付方式: kuaiqian','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3732','1488100598','1','卸载支付方式: balance','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3733','1488100608','1','卸载支付方式: bank','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3734','1488100619','1','卸载支付方式: cod','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3735','1488100638','1','卸载支付方式: chinabank','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3736','1488197921','1','编辑会员等级: 1段','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3737','1488197923','1','编辑会员等级: vip','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3738','1488197982','1','编辑会员等级: vip','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3739','1488198007','1','编辑会员等级: 2段','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3740','1488198008','1','编辑会员等级: 代销用户','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3741','1488198027','1','编辑会员等级: 2段','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3742','1488198031','1','编辑会员等级: 1段','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3743','1488198033','1','编辑会员等级: 2段','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3744','1488198037','1','编辑会员等级: 2段','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3745','1488198056','1','编辑会员等级: 2段','127.0.0.1');");
E_D("replace into `ecs_admin_log` values('3746','1488198061','1','编辑会员等级: 2段','127.0.0.1');");

require("../../inc/footer.php");
?>