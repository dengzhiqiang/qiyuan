
<div class="slidebar">
    <ul class="slide_item">

        <li class="item">
            <div class="root_node">用户中心</div>
            <ul>
                <li>
                    <a class="<?php if ($this->_var['action'] == 'order_list' || $this->_var['action'] == 'order_detail'): ?>on<?php endif; ?>" href="user.php?act=order_list"><?php echo $this->_var['lang']['label_order']; ?></a>

                     <!--<a class="<?php if ($this->_var['action'] == 'address_list'): ?>on<?php endif; ?>" href="user.php?act=address_list">用户信息</a>-->



                </li>

            </ul>
        </li>

        <li class="item">
            <div class="root_node">会员中心</div>
            <ul>
                <li>
                	<a class="<?php if ($this->_var['action'] == 'default'): ?>on<?php endif; ?>" href="user.php">我的个人中心</a>

                    <a class="<?php if ($this->_var['action'] == 'profile'): ?>on<?php endif; ?>" href="user.php?act=profile">我的信息</a>




                      <a class="<?php if ($this->_var['action'] == 'message_list'): ?>on<?php endif; ?>" href="user.php?act=message_list">提交申请</a>


                </li>

            </ul>
        </li>

         <li class="item" style="display: none;">
            <div class="root_node">账户中心</div>
            <ul>
                <li>


                     <a class="<?php if ($this->_var['action'] == 'account_log'): ?>on<?php endif; ?>" href="user.php?act=account_log"><?php echo $this->_var['lang']['label_user_surplus']; ?></a>

                </li>

            </ul>
        </li>

    </ul>

</div>



