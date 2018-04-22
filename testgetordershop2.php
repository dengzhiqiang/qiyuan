<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

// 查看订单信息
$sql = "select * from `ecs_order_goods` where order_id = 134 ORDER BY order_id desc ";
$res = $db->getAll($sql);
echo '<pre>';
var_dump($res);
