<link href="/themes/xiaomi/lrtk.css" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'transport_jquery.js,utils.js,jquery.SuperSlide.js,xiaomi_common.js')); ?>
<script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script>
<div class="site-topbar">
	<div class="container">
        <div class="site-left-info" style="float:left;">北京棋院培训中心活动报名系统!!</div>
        <div class="topbar-cart" id="ECS_CARTINFO">
            <?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>
        <div class="topbar-info J_userInfo" id="ECS_MEMBERZONE">
        	<?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        </div>
    </div>
</div>



<div class="site-header" style="clear:both;">
	<div class="container">
    	<div class="header-logo">
        	<a href="index.php" title="<?php echo $this->_var['shop_name']; ?>"><img src="themes/xiaomi/images/logo.gif" /></a>
        </div>

        
        <div class="header-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a class="link" href="category.php?id=83"><span>围棋</span></a>
                </li>
                <li class="nav-item">
                    <a class="link" href="category.php?id=81"><span>象棋</span></a>
                </li>
                <li class="nav-item">
                    <a class="link" href="category.php?id=87"><span>国际象棋</span></a>
                </li>
                <li class="nav-item">
                    <a class="link" href="article_cat.php?id=5"><span>注册及报名流程</span></a>
                </li>
                <li class="nav-item">
                    <a class="link" href="article_cat.php?id=8"><span>通知通告</span></a>
                </li>
            </ul>
        </div>
        


        <div class="header-search">
        	<form action="search.php" method="get" id="searchForm" name="searchForm" onSubmit="return checkSearchForm()" class="search-form clearfix">
            	<label class="hide">站内搜索</label>
        		<input class="search-text" type="text" name="keywords" id="keyword" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" autocomplete="off">
        		<input type="hidden" value="k1" name="dataBi">
        		<button type="submit" class="search-btn iconfont"></button>
                <?php if ($this->_var['searchkeywords']): ?>
                <div class="hot-words" <?php if ($this->_var['search_keywords']): ?>style="display:none"<?php endif; ?>>
                	<?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?> <a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>" target="_blank"><?php echo $this->_var['val']; ?></a> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
                <?php endif; ?>
      		</form>
        </div>
    </div>
	<!--<div id="J_navMenu" class="header-nav-menu" style="display: none;">-->
    	<!--<div class="container"></div>-->

    <!--</div>-->
</div>

