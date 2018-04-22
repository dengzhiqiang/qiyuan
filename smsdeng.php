<?php
 //接口类型：互亿无线触发短信接口，支持发送验证码短信、订单通知短信等。
 // 账户注册：请通过该地址开通账户http://sms.ihuyi.com/register.html
 // 注意事项：
 //（1）调试期间，请用默认的模板进行测试，默认模板详见接口文档；
 //（2）请使用APIID（查看APIID请登录用户中心->验证码、通知短信->帐户及签名设置->APIID）及 APIkey来调用接口；
 //（3）该代码仅供接入互亿无线短信接口参考使用，客户可根据实际需要自行编写；
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

//请求数据到短信接口，检查环境是否 开启 curl init。
function PostSMS($curlPost,$url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
		$return_str = curl_exec($curl);
		curl_close($curl);
		return $return_str;
}

//将 xml数据转换为数组格式。
function xml_to_array_sms($xml){
	$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
	if(preg_match_all($reg, $xml, $matches)){
		$count = count($matches[0]);
		for($i = 0; $i < $count; $i++){
		$subxml= $matches[2][$i];
		$key = $matches[1][$i];
			if(preg_match( $reg, $subxml )){
				$arr[$key] = xml_to_array( $subxml );
			}else{
				$arr[$key] = $subxml;
			}
		}
	}
	return $arr;
}

//短信接口地址
$target = "http://106.ihuyi.cn/webservice/smsdeng.php?method=Submit";
$post_data = "account=C40765872&password=d036e63774a2b972bb0931d972691888&mobile="."18696729803"."&content=订单号为100";
//用户名请登录用户中心->验证码、通知短信->帐户及签名设置->APIID
//查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
$gets =  xml_to_array_sms(PostSMS($post_data, $target));
echo $gets['SubmitResult']['msg'];