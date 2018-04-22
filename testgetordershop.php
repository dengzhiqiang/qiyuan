<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

// 查看订单信息 这个订单信息里面有电话号码和用户名等信息
$orderinfosql = "select * from  " . $GLOBALS['ecs']->table('order_info') . "  where order_id = 134 ORDER BY order_id desc ";
$orderinfoRes = $db->getRow($orderinfosql);
echo '<pre>';
var_dump($orderinfoRes);

// （1）根据获取订单中商品的id
if ($orderinfoRes) {
    $ordergoodssql = "select * from " . $GLOBALS['ecs']->table('order_goods') . " where order_id = " . $orderinfoRes['order_id'] . " ORDER BY order_id desc ";
    $ordergoodsres = $db->getAll($ordergoodssql);

    foreach ($ordergoodsres as $k => $v) {
        // （2）获取订单中，每个商品的数量
        $good_id = $v['goods_id'];
        $number = $v['goods_number'];

        $goodsnumsql = "select goods_number from " . $GLOBALS['ecs']->table('goods') . " where goods_id=" . $good_id;

        $goodsnum = $db->getOne($goodsnumsql);

        $newnum = $goodsnum - $number;


        // （3）减少库存
        $shopsql = "UPDATE " . $GLOBALS['ecs']->table('goods') . "
            SET goods_number = $newnum
            WHERE goods_id = '$good_id'
            LIMIT 1";
        $query = $GLOBALS['db']->query($shopsql);

    }
}






