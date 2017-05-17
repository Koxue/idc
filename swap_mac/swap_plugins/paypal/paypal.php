<?php  defined('SWAP_ROOT') or die('非法操作'); function paypal_config(){ $config['swap_plug']='PayPal支付插件'; $config['swap_plug_version']='1.0'; $config['swap_plug_explain']=<<<SWAP
用于SWAPIDC的SWAPIDC接口插件.
SWAP;
 $config['swap_plug_author']='石蕴金'; $config['swap_plug_website']='https://www.paypal.com/'; return $config; } function paypal() { $OSWAP_970d54d2a29cef30c96ea87e42c78ec0=plug_eva('paypal','货币前缀'); $OSWAP_6c8497b835d96b0d45ad347d7405bc7c=plug_eva('paypal','货币后缀'); $OSWAP_fb236ff1984974f93f2b5de316731dee=plug_eva('paypal','交易币汇率'); $lang=plug_lang_get('paypal','main'); ?>
						<form class="form-inline" action="/index.php/plugin/paypal/index/" method="post">
							<div class="input-prepend input-append">
								<span class="add-on"><?php echo $lang['PayPal支付接口']; ?></span>
								<span class="add-on"><?php echo $OSWAP_970d54d2a29cef30c96ea87e42c78ec0; ?></span>
								<input maxlength="5" class="span2" name="money" type="text" onkeyup="if(isNaN(this.value)){this.value=''}">
								<span class="add-on"><?php echo $OSWAP_6c8497b835d96b0d45ad347d7405bc7c; ?></span>
								<button class="btn" type="submit"><?php echo $lang['提交']; ?></button>
								<span class="add-on"><?php echo $lang['货币汇率']; ?>: <?php echo $lang['金额']; ?> X <?php echo $OSWAP_fb236ff1984974f93f2b5de316731dee; ?></span>
							</div>
						</form>
<?php
} function paypal_adminlb(&$OSWAP_ee191866c0f983f56784f39a87b1e5d0){ $OSWAP_ee191866c0f983f56784f39a87b1e5d0[]=array('name'=>'paypal设置','link'=>'/index.php/plugin/paypal/admin/'); } add_swap_plug('管理员菜单列表','paypal_adminlb'); add_swap_plug("存款支付网关前端","paypal"); 