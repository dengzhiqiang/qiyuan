<a class="cart-mini <?php if ($this->_var['number']): ?>cart-mini-filled<?php endif; ?>" href="flow.php">
	<i class="iconfont">&#xe60c;</i>
    报名订单
    <span class="mini-cart-num J_cartNum" id="hd_cartnum">(<?php echo $this->_var['number']; ?>)</span>
</a>
<div id="J_miniCartList" class="cart-menu">
	<?php if ($this->_var['cart_list']): ?>
    <ul>
    	<?php $_from = $this->_var['cart_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['ioo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ioo']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['ioo']['iteration']++;
?>
    	<li class="clearfix <?php if (($this->_foreach['ioo']['iteration'] <= 1)): ?>first<?php endif; ?>">
        	<div class="cart-item">
              <a class="thumb" target="_blank" href="<?php echo $this->_var['goods']['url']; ?>">
                  <img src="<?php echo $this->_var['goods']['thumb']; ?>">
              </a>
              <a class="name" target="_blank" href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['short_name']; ?></a>
              <span class="price"><?php echo $this->_var['goods']['shop_price']; ?>元 x <?php echo $this->_var['goods']['goods_number']; ?></span>
              <a class="btn-del delItem" href="javascript:deleteCartGoods(<?php echo $this->_var['goods']['rec_id']; ?>);">
                  <i class="iconfont"></i>
              </a>
            </div>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    <div class="count clearfix">
    	<span class="total">
        	共计<em id="hd_cart_count"><?php echo $this->_var['number']; ?></em>件活动
            <strong>合计：<em id="hd_cart_total"><?php echo $this->_var['amount']; ?>元</em></strong>
        </span>
        <a class="btn btn-primary" href="flow.php">去报名表结算</a>
    </div>
    <?php else: ?>
    <p class="loading">报名表中还没有活动，赶紧选购吧！</p>
    <?php endif; ?> 
</div>
<script type="text/javascript">
function deleteCartGoods(rec_id)
{
	Ajax.call('delete_cart_goods.php', 'id='+rec_id, deleteCartGoodsResponse, 'POST', 'JSON');
}

/**
 * 接收返回的信息
 */
function deleteCartGoodsResponse(res)
{
  if (res.error)
  {
    alert(res.err_msg);
  }
  else
  {
	  $("#ECS_CARTINFO").html(res.content);
  }
}
</script> 