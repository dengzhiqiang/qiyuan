<?php if ($this->_var['user_info']): ?>
<span class="user">
	<a class="user-name" target="_blank" href="user.php"><span class="name"><?php echo $this->_var['user_info']['username']; ?></span><i class="iconfont"></i></a>
    <ul class="user-menu">
        <li><a target="_blank" href="javascript:void(0);"><?php echo $this->_var['user_info']['user_rank_name']; ?></a></li>
        <li><a target="_blank" href="user.php">个人中心</a></li>
        <li><a href="user.php?act=logout">退出登录</a></li>
    </ul>
</span> 
<span class="sep">|</span> <a href="user.php?act=order_list" class="link">我的活动</a>

<?php else: ?>
<a class="link" href="user.php" rel="nofollow">登录</a>
<span class="sep">|</span>
<a class="link" href="user.php?act=register" rel="nofollow">注册</a>
<?php endif; ?>        
            