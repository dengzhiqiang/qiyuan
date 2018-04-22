<div class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded" style="display: none;">
	
	<div class="box-hd" style="height:68px;">
        <h2 class="title"><?php echo $this->_var['goods_cat']['name']; ?></h2>
        <div class="more J_brickNav">
            <a class="more-link" href="<?php echo $this->_var['goods_cat']['url']; ?>" style=" display:inline-block;">
                查看全部<i class="iconfont"></i>
            </a>
            <ul class="tab-list J_brickTabSwitch">
                <?php $_from = $this->_var['goods_cat']['goods_level2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_level2');$this->_foreach['goods_level2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_level2']['total'] > 0):
    foreach ($_from AS $this->_var['goods_level2']):
        $this->_foreach['goods_level2']['iteration']++;
?>
                <?php if ($this->_foreach['goods_level2']['iteration'] < 5): ?>
            	<li><?php echo $this->_var['goods_level2']['name']; ?></li>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
    </div>
    
    <div class="box-bd J_brickBd">
    	<div class="row">
        	<div class="span4 span-first">
                <ul class="brick-promo-list clearfix">
                  <?php if ($this->_var['goods_cat']['sort_order'] == 1): ?>
                    <li class="brick-item brick-item-l">

                        <img src="/data/afficheimg/4234131111111114.jpg" alt="">
                    </li>
                  <?php else: ?>
                    <li class="brick-item brick-item-m">
                    <?php 
$k = array (
  'name' => 'ads_pro',
  'cat_name' => $this->_var['goods_cat']['name'],
  'type' => '分类下活动左侧广告小1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
                    </li>
                    <li class="brick-item brick-item-m">
                    <?php 
$k = array (
  'name' => 'ads_pro',
  'cat_name' => $this->_var['goods_cat']['name'],
  'type' => '分类下活动左侧广告小2',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
                    </li>
                  <?php endif; ?>
                </ul>

            </div>

            <div class="span16">

            	<?php $_from = $this->_var['goods_cat']['goods_level2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_level2');$this->_foreach['goods_level2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_level2']['total'] > 0):
    foreach ($_from AS $this->_var['goods_level2']):
        $this->_foreach['goods_level2']['iteration']++;
?>
                <?php if ($this->_foreach['goods_level2']['iteration'] < 5): ?>
            	<ul class="brick-list clearfix">
                  <?php $_from = $this->_var['goods_level2']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods']['iteration']++;
?>
                  <?php if ($this->_foreach['goods']['iteration'] < 9): ?>
                  <li class="brick-item brick-item-m">
                      <div class="figure figure-img">
                          <a href="<?php echo $this->_var['goods']['url']; ?>">
                              <img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="160" height="160" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>">
                          </a>
                      </div>
                      <h3 class="title">
                          <a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
                      </h3>
                      <p class="desc"><?php echo $this->_var['goods']['goods_brief']; ?></p>

                       
                        <p class="price">
                            <?php if ($_SESSION['user_id'] > 0): ?>
                              <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                              ''
                              <?php else: ?>
                                <?php echo $this->_var['goods']['shop_price']; ?>
                              <?php endif; ?>
                            <?php else: ?>
                            登录后查看价格
                            <?php endif; ?>
                        </p>
                        
                      <p class="price">
                      </p>


                  </li>
                  <?php endif; ?>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
        </div>
    </div>
</div>