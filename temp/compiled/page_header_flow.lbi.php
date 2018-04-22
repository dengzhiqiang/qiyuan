<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'transport_jquery.js,utils.js,jquery.SuperSlide.js,xiaomi_common.js')); ?>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo"><a href="index.php" class="logo"><img src="themes/xiaomi/images/logo.gif" /></a></div>
        <div class="header-title"><h2>我的报名<span id="selectedCount"><?php echo $this->_var['total']['goods_count']; ?></span></h2></div>
        <div class="topbar-info J_userInfo">
        	<?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>
    </div>
</div>