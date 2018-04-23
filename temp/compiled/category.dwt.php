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
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="themes/xiaomi/category.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,global.js,easydialog.min.js,compare.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?> 
<?php echo $this->smarty_insert_scripts(array('files'=>'xiaomi_category.js')); ?>
<?php echo $this->fetch('library/ur_here.lbi'); ?>
<?php echo $this->fetch('library/filter_attr.lbi'); ?>
<div class="content">
	<div class="container">
	<?php echo $this->fetch('library/goods_list.lbi'); ?>
    <?php echo $this->fetch('library/pages.lbi'); ?>
    </div>
    
<?php echo $this->fetch('library/recommend_hot.lbi'); ?>

</div>
<div class="add_ok" id="cart_show">
    <div class="tip">
        <i class="iconfont"> </i>活动已成功加入报名表
    </div>
    <div class="go">
        <a href="javascript:easyDialog.close();" class="back">&lt;&lt;继续购物</a>
        <a href="flow.php" class="btn">去结算</a>
    </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>


<style type="text/css">
    .tongzhi03115 {
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
        <h1 style="text-align:center;font-size:22px;padding-top: 15px;">重要提示</h1>
        <p style="padding-top:20px;text-align:center;line-height:2;">“请报名国象比赛的选手注意，报名甲乙组必须持有去年比赛名次单，”</p>

        <p style="padding-top:20px;text-align:center;line-height:2;">“其他选手请报名资格组。请看清组别后报名，报错组别将不退款！！！”</p>


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
        