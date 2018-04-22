<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<title><?php echo $this->_var['page_title']; ?></title>





<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/xiaomi/index.css" rel="stylesheet" type="text/css" />
<link href="themes/xiaomi/lrtk.css" rel="stylesheet" type="text/css" />

<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js,jquery.js,popwin.js')); ?>
</head>
<body>

<?php echo $this->fetch('library/page_header.lbi'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'xiaomi_index.js')); ?>

<div class="home-hero-container container">
	<div class="home-hero">
    	<div class="home-hero-slider">
			
			<?php echo $this->fetch('library/index_ad.lbi'); ?>
			
        </div>
    </div>
    
    <div class="home-star-goods xm-carousel-container">
    	
<?php echo $this->fetch('library/recommend_best.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_80']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_80']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>

    </div>
</div>


<div class="page-main home-main">
	<div class="container">
	 






    </div>
</div>

<div id="J_modalVideo" class="modal modal-video fade modal-hide">
	<div class="modal-hd">
    	<h3 class="title"></h3>
        <a class="close"><i class="iconfont"></i></a>
    </div>
    <div class="modal-bd">
    	<iframe width="880" height="536" src="" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

	$("a.moquu_wmaps").on('click', function(){
		popWin.showWin("800", "475", "TTshop", "http://www.oeob.net");
	});

});
</script>

<?php echo $this->fetch('library/page_footer.lbi'); ?>





<style type="text/css">
    .tongzhi0315 {
        width: 600px;
        height: 400px;
        background: url("themes/xiaomi/images/jieshutongzhi.jpg") no-repeat center top;
        background-size: contain;
        font-size: 16px;
        color:#333;

        position: fixed;
        margin: auto;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }
</style>
<div class="tongzhi0315" id="tongzhi0315">
    <div style="padding: 16px;line-height: 24px;position: relative;">

        <p style="padding-top:20px;"></p>
        <h1 style="text-align:center;font-size:22px;padding-top: 15px;">提示</h1>
        <p style="padding-top:20px;text-align:center;line-height:2;">“请参加12月份比赛的选手，关注通知通告栏的紧急通知”</p>

 <p style="padding-top:20px;text-align:center;line-height:2;">“请登录后，进入【我的信息】页面，务必修改选手的【出生日期】、<br>【性别】、【电子邮件】三项内容，并且确认已完成邮箱验证工作”</p>


        <a id="IDtongzhi0315" href="javascript:void(0);"
           style="display: inline-block;width:60px;height: 30px;line-height: 30px;text-align: center;color:#fff;background: #C40000;position: absolute;left:50%;bottom:-40px;margin-left:-30px;">关闭</a>
    </div>
</div>
<script>
    document.getElementById('IDtongzhi0315').onclick = function () {
        document.getElementById('tongzhi0315').style.display = 'none';
    }
</script>

</body>
</html>
