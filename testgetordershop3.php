<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

// 查看订单信息
$sql = "select * from `ecs_goods` where goods_id = 126 ";
$res = $db->getAll($sql);


// 根据订单信息
echo '<pre>';
var_dump($res);
