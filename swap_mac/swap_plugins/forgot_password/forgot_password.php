<?php  defined('SWAP_ROOT') or die('非法操作'); function forgot_password_config(){ $config['swap_plug']='忘记密码插件'; $config['swap_plug_version']='1.0'; $config['swap_plug_explain']=<<<SWAP
用于SWAPIDC的找回密码操作,以防止用户无法找回自己的帐号
SWAP;
 $config['swap_plug_author']='石蕴金'; $config['swap_plug_website']='http://www.swapidc.com/'; return $config; } function forgot_password_template(){ $lang=plug_lang_get('forgot_password','index'); echo '<a href="/index.php/plugin/forgot_password/index/">'.$lang['忘记密码? 点这里找回'].'</a><br>'; } add_swap_plug('登入页底部','forgot_password_template');