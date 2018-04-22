<?php

/**
 * ECSHOP 会员中心
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: user.php 17217 2011-01-19 06:29:08Z liubo $
 */
set_time_limit(0);

define('IN_ECS', true);


require(dirname(__FILE__) . '/includes/init.php');

/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/user.php');


include_once(ROOT_PATH . 'includes/lib_transaction.php');

// 限制数量
//$limit = $_GET['n'] ? $_GET['n'] : 500;

// 1.先查出所有的用户id user_id

$user_ids = $db->getAll("SELECT user_id FROM " . $ecs->table('users') . " limit 5999 ,3000");

//echo '<pre>';
//var_dump($user_ids);
//die;

foreach ($user_ids as $user_id) {
    echo '用户ID:' . $user_id['user_id'] . '<br>';
    $id = $user_id['user_id'];

    /**
     * 循环所有的用户
     */

// 数量
    $record_count = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('order_info') . " WHERE user_id = '$id'");



    // 取出订单
    // 最近的20个订单
    $orders = get_user_orders($id, 20, 0);


    include_once(ROOT_PATH . 'includes/lib_order.php');

    foreach ($orders as $dengk => $dengv) {
//        var_dump($dengv['order_time']);


        // **2017-8-28 取消订单===============================
        // （1）先检查自己的订单是否超过了半个个小时，超过了自动取消
        // （2）能取消的订单 必须是处于没有取消的状态
        //  因为这里order_time是已经转换了的时间
//        if (((time() + 8 * 3600) - strtotime($dengv['order_time'])) >= (0.5 * 3600)) {
//            cancel_order($dengv['order_id'], $user_id);
//        };

        // 用于测试两分钟取消订单
        if (((time() + 8 * 3600) - strtotime($dengv['order_time'])) >= (60 * 2)) {
            cancel_order($dengv['order_id'], $id);
        };
        // **// 2017-8-28 取消订单===============================
    }

    /**
     * // 循环所有的用户
     */

}



