<?php
/**
 * ECSHOP 导出会员与订单插件
 * ============================================================================
 * 作者:  ECSHOP交易中心（http://www.7mn.net） 
 * 网站: （http://www.7mn.net
*/
define('IN_ECS', true);
require(dirname(__FILE__) . '/../../includes/init.php');
include_once(ROOT_PATH . 'languages/' .$GLOBALS['_CFG']['lang']. '/admin/users.php');


 /* 取出注册扩展字段 */
    $sql1 = 'SELECT * FROM ' . $ecs->table('reg_fields') . ' WHERE type < 2 AND display = 1 AND id != 6 ORDER BY dis_order, id';
    $extend_info_list = $db->getAll($sql1);

$sql = "SELECT u.* 	FROM ".$ecs->table('users') ." AS u ORDER BY u.user_id ASC";	

		
header("Content-type:application/vnd.ms-excel");
header("Accept-Ranges:bytes");
header("Content-Disposition:attchment;filename="."user".time().".xls");
header("Pragma: no-cache");

echo '
	<html xmlns:o="urn:schemas-microsoft-com:office:office"
	xmlns:x="urn:schemas-microsoft-com:office:excel"
	xmlns="http://www.w3.org/TR/REC-html40">
	<head>
	<meta http-equiv="expires" content="Mon, 06 Jan 1999 00:00:01 GMT">
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<!--[if gte mso 9]><xml>
	<x:ExcelWorkbook>
	<x:ExcelWorksheets>
	<x:ExcelWorksheet>
	<x:Name></x:Name>
	<x:WorksheetOptions>
	<x:DisplayGridlines/>
	</x:WorksheetOptions>
	</x:ExcelWorksheet>
	</x:ExcelWorksheets>
	</x:ExcelWorkbook>
	</xml><![endif]-->
	</head>
';

echo '<table>';
echo '<tr>';
echo '<td>会员ID</td>';
echo '<td>姓名</td>';
echo '<td>邮箱</td>';
echo '<td>性别</td>';
echo '<td>注册日期</td>';
 foreach ($extend_info_list AS $key => $val){
	echo "<td>".$val['reg_field_name']."</td>";
 }
echo '</tr>';
		
$res = $GLOBALS['db']->query($sql);
$arr[sex][0] = '保密';
$arr[sex][1] = '男';
$arr[sex][2] = '女';
while ($row = $GLOBALS['db']->fetchRow($res))
{
	$sql = 'SELECT reg_field_id, content ' .
           'FROM ' . $ecs->table('reg_extend_info') .
           " WHERE user_id = $row[user_id]";
    $extend_info_arr = $db->getAll($sql);

    $temp_arr = array();
    foreach ($extend_info_arr AS $val)
    {
        $temp_arr[$val['reg_field_id']] = $val['content'];
    }

    foreach ($extend_info_list AS $key => $val)
    {
        switch ($val['id'])
        {
            case 1:     $extend_info_list[$key]['content'] = $row['msn']; break;
            case 2:     $extend_info_list[$key]['content'] = $row['qq']; break;
            case 3:     $extend_info_list[$key]['content'] = $row['office_phone']; break;
            case 4:     $extend_info_list[$key]['content'] = $row['home_phone']; break;
            case 5:     $extend_info_list[$key]['content'] = $row['mobile_phone']; break;
            default:    $extend_info_list[$key]['content'] = empty($temp_arr[$val['id']]) ? '' : $temp_arr[$val['id']] ;
        }
    }
	echo '<tr>';
	echo "<td style='vnd.ms-excel.numberformat:@'>$row[user_id]</td>";
//	echo "<td>".date("Y-m-d H:i:s",$row['add_time'])."</td>";
	echo "<td>$row[user_name]</td>";
	echo "<td>$row[email]</td>";
	echo "<td>".$arr['sex'][$row['sex']]."</td>";
	echo "<td>".date("Y-m-d H:i:s",$row['reg_time'])."</td>";
	foreach ($extend_info_list AS $key => $val){
		echo "<td>".$val['content']."</td>";
	}
	echo '</tr>';
}

echo '</table>';
?>

