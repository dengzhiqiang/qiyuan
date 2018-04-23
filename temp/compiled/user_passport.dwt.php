<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="themes/xiaomi/login.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js')); ?>
<body>
<?php echo $this->fetch('library/page_header_login.lbi'); ?>
<script>
$(function(){

	//加载清空文本框
	$("input:text,input:password").val("");

	//提示文字隐藏显示效果
	//登录界面
	$(".enter-area .enter-item").focus(function(){
		if($(this).val().length==0){
			$(this).siblings(".placeholder").addClass("hide");
		}
	}).blur(function(){
		if($(this).val().length==0){
			$(this).siblings(".placeholder").removeClass("hide");
		}
	}).keyup(function(){
		if($(this).val().length>0){
			$(this).siblings(".placeholder").addClass("hide");
		}else{
			$(this).siblings(".placeholder").removeClass("hide");
		}
	});
	//注册界面
	$(".inputbg input").focus(function(){
		if($(this).val().length>0){
			$(this).parent().siblings(".t_text").addClass("hide");
		}
	}).blur(function(){
		if($(this).val().length==0){
			$(this).parent().siblings(".t_text").removeClass("hide");
		}
	}).keyup(function(){
		if($(this).val().length>0){
			$(this).parent().siblings(".t_text").addClass("hide");
		}else{
			$(this).parent().siblings(".t_text").removeClass("hide");
		}
	});

	//其它登录方式
	$("#other_method").click(function(){
		if($(".third-area").hasClass("hide")){
			$(".third-area").removeClass("hide");
		}else{
			$(".third-area").addClass("hide");
		}
	})
})
</script>


<?php if ($this->_var['action'] == 'login'): ?>

<div id="main" class="layout">
  <div class="nl-content">
  	<div class="nl-logo-area">
    	<a href="./"><img src="themes/xiaomi/images/logo.gif"  style="width:225px;height:48px;" /></a>
    </div>
    <h1 class="nl-login-title">登录系统</h1>
    <p class="nl-login-intro"><?php echo $this->_var['shop_desc']; ?></p>
    <div id="login-box" class="nl-frame-container">
        <div class="ng-form-area show-place">
            <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
            	<div class="shake-area">
                    <div class="enter-area">
                      <input name="username" type="text"  class="enter-item first-enter-item" placeholder="<?php echo $this->_var['lang']['label_username']; ?>"/>
                      <i class="placeholder"><?php echo $this->_var['lang']['label_username']; ?></i>
                    </div>
                    <div class="enter-area">
                      <input name="password" type="password" class="enter-item last-enter-item" placeholder="<?php echo $this->_var['lang']['label_password']; ?>"/>
                      <i class="placeholder"><?php echo $this->_var['lang']['label_password']; ?></i>
                    </div>
                </div>
                <div class="enter-area img-code-area">
                    <?php if ($this->_var['enabled_captcha']): ?>
                      <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" class="code-img" onClick="this.src='captcha.php?is_login=1&'+Math.random()" />
                      <input type="text" class="enter-item code-enter-item" name="captcha" maxlength="6" placeholder="<?php echo $this->_var['lang']['comment_captcha']; ?>">
                      <i class="placeholder"><?php echo $this->_var['lang']['comment_captcha']; ?></i>
                    <?php endif; ?>
                </div>
                <input type="hidden" name="act" value="act_login" />
                <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                <input type="submit" name="submit" class="button orange" value="立即登录">
                <div class="ng-foot clearfix">
                	<div class="ng-cookie-area"><label><input type="checkbox" value="1" name="remember" id="remember" class="remember-me"><?php echo $this->_var['lang']['remember']; ?></label></div>
                    <div class="ng-link-area">

                    	<span><a href="user.php?act=get_password">忘记密码?</a></span>
                        <div class="third-area hide">
                            <a class="ta-weibo" target="_blank" href="user.php?act=oath&amp;type=weibo" title="weibo">weibo</a>
                            <a class="ta-qq" target="_blank" href="user.php?act=oath&amp;type=qq" title="qq">qq</a>
                            <a class="ta-alipay" target="_blank" href="user.php?act=oath&amp;type=alipay" title="alipay">alipay</a>
                        	<em class="corner"></em>
                            <em class="corner-inner"></em>
                        </div>
                    </div>
                </div>
                <a style="display: none;" class="button" href="user.php?act=register">注册<?php echo $this->_var['shop_name']; ?>账号</a>
            </form>
        </div>
    </div>
  </div>
  <div class="nl-footer">
  	<div class="nl-f-nav">
    	<span>
        <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['link'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['link']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['link']['iteration']++;
?>
            <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>
            <?php if (! ($this->_foreach['link']['iteration'] == $this->_foreach['link']['total'])): ?>| <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </span>
    </div>
    <p class="nl-f-copyright"><?php echo $this->_var['icp_number']; ?></p>
  </div>
</div>

<?php endif; ?>



<?php if ($this->_var['action'] == 'register'): ?>
<?php if ($this->_var['shop_reg_closed'] == 1): ?>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <div class="f1 f5" align="center"><?php echo $this->_var['lang']['shop_register_closed']; ?></div>
  </div>
</div>
<?php else: ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
<div class="register_wrap">
    <div class="bugfix_ie6 dis_none">
        <div class="n-logo-area clearfix">
            <a href="./"><img src="themes/xiaomi/images/logo.gif"  style="width:225px;height:48px;" /></a>
        </div>
    </div>
    <div id="main">
      <div class="n-frame device-frame reg_frame">

        <div class="title-item dis_bot35 t_c">
          <h4 class="title-big">注册<?php echo $this->_var['shop_name']; ?>帐号 </h4>
        </div>
        <div class="regbox" id="register_box">
          <form action="user.php" method="post" name="formUser" onsubmit="return register();">
            <input type="hidden" value="C4E1AB9A7DE79D7C750E8916875E7DBE" id="validate">
            <div class="phone_step1">
              <input type="hidden" id="sendtype">
              	
                <div class="inputbg">
                  <label class="labelbox">
                      <input type="text" name="username" id="username" onblur="is_registered(this.value);" onkeyup="is_registered(this.value);" placeholder="身份证号或护照号、港澳台证件号（个人唯一帐号）">
                  </label>
                  <span class="t_text"><?php echo $this->_var['lang']['label_username']; ?></span>
                  <span class="error_icon"></span>
                </div>
                <div class="err_tip" id="username_notice"> <em></em> </div>
              	
                <div class="inputbg">
                  <label class="labelbox">
                      <input name="email" type="text" id="email" onblur="checkEmail(this.value);" onkeyup="checkEmail(this.value);" placeholder="邮箱（用于找回密码、接受提示）">
                  </label>
                  <span class="t_text"><?php echo $this->_var['lang']['label_email']; ?></span>
                  <span class="error_icon"></span>
                </div>
                <div class="err_tip" id="email_notice"><em></em> </div>
              	
                <div class="inputbg">
                  <label class="labelbox">
                  <input type="password" name="password" id="password1" onblur="check_password(this.value);" onkeyup="check_password(this.value);checkIntensity(this.value);"  placeholder="<?php echo $this->_var['lang']['label_password']; ?>">
                  </label>
                  <span class="t_text"><?php echo $this->_var['lang']['label_password']; ?></span>
                  <span class="error_icon"></span>
                </div>
                <div class="err_tip" id="password_notice"> <em></em> </div>
              	
                <div class="inputbg">
                  <label class="labelbox">
                    <input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);" onkeyup="check_conform_password(this.value);" placeholder="<?php echo $this->_var['lang']['label_confirm_password']; ?>">
                  </label>
                  <span class="t_text"><?php echo $this->_var['lang']['label_confirm_password']; ?></span>
                  <span class="error_icon"></span>
                </div>
                <div class="err_tip" id="conform_password_notice"> <em></em> </div>

                <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>

                <?php if ($this->_var['field']['id'] == 6): ?>
                密码找回问题：
                <select name='sel_question' style="margin-bottom:10px;*vertical-align:-3px;">
                  <option value='0'><?php echo $this->_var['lang']['sel_question']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['passwd_questions'])); ?></select>
                <div class="inputbg">
                	<label class="labelbox">
                  <input name="passwd_answer" type="text" placeholder="<?php echo $this->_var['lang']['passwd_answer']; ?>"/>
                  </label>
                <span class="t_text" <?php if ($this->_var['field']['is_need']): ?>id="passwd_quesetion"<?php endif; ?>><?php echo $this->_var['lang']['passwd_answer']; ?></span>
                  <span class="error_icon"></span> </div>
                <?php if ($this->_var['field']['is_need']): ?>
                <div class="err_tip"> <em></em> </div>
                <?php endif; ?>

                <?php else: ?>
                <div class="inputbg">
                  <label class="labelbox">
                      <input name="extend_field<?php echo $this->_var['field']['id']; ?>" type="text" placeholder="<?php echo $this->_var['field']['reg_field_name']; ?>"/>
                  </label>
                  <span class="t_text" <?php if ($this->_var['field']['is_need']): ?>id="extend_field<?php echo $this->_var['field']['id']; ?>i"<?php endif; ?>><?php echo $this->_var['field']['reg_field_name']; ?></span>
                  <span class="error_icon"></span></div>
                <?php if ($this->_var['field']['is_need']): ?>
                <div class="err_tip"><em></em></div>
                <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                <?php if ($this->_var['enabled_captcha']): ?>
                <div class="inputbg inputcode dis_box clearfix">
                  <label class="labelbox label-code">
                      <input type="text" class="code" name="captcha" maxlength="6" placeholder="验证码">
                  </label>
                  <span class="t_text">验证码</span>
                  <span class="error_icon"></span>
                  <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" class="icode_image code-image chkcode_img" onClick="this.src='captcha.php?'+Math.random()" />
                </div>
                <div class="err_tip"> <em></em> </div>
                <?php endif; ?>
                <div class="law">
                  <label>
                    <input name="agreement" type="checkbox" value="1" checked="checked"  tabindex="5" class="remember-me"/>
                    <?php echo $this->_var['lang']['agreement']; ?></label>
                </div>
                <div class="err_tip"> <em></em> </div>
                <div class="fixed_bot mar_phone_dis1">
                  <input name="act" type="hidden" value="act_register" >
                  <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
                  <input name="Submit" type="submit" value="同意协议并注册" class="btn332 btn_reg_1 submit-step">
                </div>
                <div class="trig">已有账号? <a href="user.php" class="trigger-box">点击登录</a> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="n-footer" style="display: none;">
    	<div class="nl-f-nav">
            <span>
            <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['link'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['link']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['link']['iteration']++;
?>
                <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>
                <?php if (! ($this->_foreach['link']['iteration'] == $this->_foreach['link']['total'])): ?>| <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </span>
        </div>
        <p class="nf-intro"><span><?php echo $this->_var['icp_number']; ?></span></p>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>



<?php if ($this->_var['action'] == 'get_password'): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
<script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="register_wrap">
	<div class="bugfix_ie6 dis_none">
        <div class="n-logo-area clearfix">
            <a href="./" class="fl-l"><img src="themes/xiaomi/images/logo.gif" width="55" /></a>
        </div>
    </div>
    <div id="main" class="">
      <div class="n-frame device-frame reg_frame">

        <div class="title-item dis_bot35 t_c">
          <h4 class="title-big"><?php echo $this->_var['lang']['username_and_email']; ?> </h4>
        </div>
        <div class="regbox">
          <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
            <div class="inputbg">
              <label class="labelbox">
                  <input name="user_name" type="text" size="30" placeholder="<?php echo $this->_var['lang']['username']; ?>"/>
              </label>
              <span class="t_text"><?php echo $this->_var['lang']['username']; ?></span>
              <span class="error_icon"></span>
            </div>
            <div class="inputbg">
              <label class="labelbox">
                  <input name="email" type="text" size="30" class="inputBg"   placeholder="<?php echo $this->_var['lang']['email']; ?>"/>
              </label>
              <span class="t_text"><?php echo $this->_var['lang']['email']; ?></span>
              <span class="error_icon"></span>
            </div>
            <div class="fixed_bot mar_phone_dis1">
              <input type="hidden" name="act" value="send_pwd_email" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="btn332 btn_reg_1 submit-step" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="button" />
            </div>
          </form>
        </div>
    </div>
     <div class="n-footer" style="display: none;">
    	<div class="nl-f-nav">
            <span>
            <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['link'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['link']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['link']['iteration']++;
?>
                <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>
                <?php if (! ($this->_foreach['link']['iteration'] == $this->_foreach['link']['total'])): ?>| <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </span>
        </div>
        <p class="nf-intro"><span><?php echo $this->_var['icp_number']; ?></span></p>
    </div>

</div>
<?php endif; ?>


<?php if ($this->_var['action'] == 'qpassword_name'): ?>

<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
      <br />
      <table width="70%" border="0" align="center">
        <tr>
          <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['get_question_username']; ?></strong></td>
        </tr>
        <tr>
          <td width="29%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
          <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="hidden" name="act" value="get_passwd_question" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
            <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" /></td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
<?php endif; ?>


<?php if ($this->_var['action'] == 'get_passwd_question'): ?>

<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
      <br />
      <table width="70%" border="0" align="center">
        <tr>
          <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['input_answer']; ?></strong></td>
        </tr>
        <tr>
          <td width="29%" align="right"><?php echo $this->_var['lang']['passwd_question']; ?>：</td>
          <td width="61%"><?php echo $this->_var['passwd_question']; ?></td>
        </tr>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['passwd_answer']; ?>：</td>
          <td><input name="passwd_answer" type="text" size="20" class="inputBg" /></td>
        </tr>
        <?php if ($this->_var['enabled_captcha']): ?>
        <tr>
          <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
          <td><input type="text" size="8" name="captcha" class="inputBg" />
            <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td></td>
          <td><input type="hidden" name="act" value="check_answer" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
            <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" /></td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
<?php endif; ?>

<?php if ($this->_var['action'] == 'reset_password'): ?>
<script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
      <br />
      <table width="80%" border="0" align="center">
        <tr>
          <td><?php echo $this->_var['lang']['new_password']; ?></td>
          <td><input name="new_password" type="password" size="25" class="inputBg" /></td>
        </tr>
        <tr>
          <td><?php echo $this->_var['lang']['confirm_password']; ?>:</td>
          <td><input name="confirm_password" type="password" size="25"  class="inputBg"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="hidden" name="act" value="act_edit_password" />
            <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
            <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" /></td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
</div>
<?php endif; ?>

<?php echo $this->fetch('library/page_footer_login.lbi'); ?>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</html>
