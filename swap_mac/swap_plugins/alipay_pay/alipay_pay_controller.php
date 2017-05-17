<?php  defined('SWAP_ROOT') or die('非法操作'); class alipay_pay extends controller { function config(){ return array( 'swap_no_login' => array( 'notify_url'=>'1', 'admin'=>'1' ), 'index' => '1', 'return_url'=>'1', 'return_url'=>'1', 'notify_url'=>'0' ); } function index(){ global $swap_mac; $OSWAP_614bd2eb7e4a26ef750c5efd0aceac00 = _POST('money'); if($OSWAP_614bd2eb7e4a26ef750c5efd0aceac00=='') exit(redirect('/index.php/user/pay/?warning='.$this->lang['金额不能为空'])); if(!preg_match("/^[0-9]+(.[0-9]{1,2})?$/",$OSWAP_614bd2eb7e4a26ef750c5efd0aceac00)) exit(redirect('/index.php/user/pay/?warning='.$this->lang['请输入一个正确金额数值'])); if($OSWAP_614bd2eb7e4a26ef750c5efd0aceac00=='0') exit(redirect('/index.php/user/pay/?warning='.$this->lang['金额不能为0'])); $this->conn->insert('支付接口日志','支付接口,时间,uid,动作',"'alipay_pay',NOW(),'".$this->getuid()."','请求存款操作,存入".$OSWAP_614bd2eb7e4a26ef750c5efd0aceac00."元'"); $this->conn->free(); $this->conn->insert('审核订单','uid,时间,总价,支付网关,状态,订单id',"'".$this->getuid()."',NOW(),'".$OSWAP_614bd2eb7e4a26ef750c5efd0aceac00."','alipay_pay','创建订单','{$OSWAP_e11994754038f9e4f1c97984d3972aa4}'"); $OSWAP_e11994754038f9e4f1c97984d3972aa4 = $this->conn->getid(); $OSWAP_bc52ac1daa7e002000e39d5961799757=$swap_mac['c']['网站名称']; $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['partner'] = plug_eva('alipay_pay','合作身份者id'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['key'] = plug_eva('alipay_pay','安全检验码'); $OSWAP_a6da2094cb0d5baf091cb483a99bcf8e = plug_eva('alipay_pay','支付宝帐户'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['sign_type'] = strtoupper('MD5'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['input_charset']= strtolower('utf-8'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['cacert'] = SWAP_PLUGINS.'alipay_pay'.SWAP_DIR_END.'cacert.pem'; $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['transport'] = 'http'; if(plug_eva('alipay_pay','使用HTTPS')){ $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['transport'] = 'https'; } $OSWAP_43996c6055881617ab1a10c3dd4ce973 = 'http://'; if ($_SERVER['HTTPS'] == "on") { $OSWAP_43996c6055881617ab1a10c3dd4ce973 = 'https://'; } $OSWAP_29342c1d926e92a0e6d682c92df74c4f=plug_eva('alipay_pay','支付接口类型'); if($OSWAP_29342c1d926e92a0e6d682c92df74c4f=='即时到帐交易'){ $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['service'] = 'create_direct_pay_by_user'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['total_fee'] = $OSWAP_614bd2eb7e4a26ef750c5efd0aceac00; }elseif($OSWAP_29342c1d926e92a0e6d682c92df74c4f=='担保交易'){ $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['service']= 'create_partner_trade_by_buyer'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['logistics_type'] = 'EXPRESS'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['logistics_fee']= "0.00"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['logistics_payment'] = 'SELLER_PAY'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['price'] = $OSWAP_614bd2eb7e4a26ef750c5efd0aceac00; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['quantity']= "1"; }elseif($OSWAP_29342c1d926e92a0e6d682c92df74c4f=='双功能交易'){ $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['service']= 'trade_create_by_buyer'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['logistics_type'] = 'EXPRESS'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['logistics_fee']= "0.00"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['logistics_payment'] = 'SELLER_PAY'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['price'] = $OSWAP_614bd2eb7e4a26ef750c5efd0aceac00; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['quantity']= "1"; } $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['partner']= trim($OSWAP_2662881b5ec6cf8a6adf42d628fc6256['partner']); $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['payment_type']= "1"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['notify_url']= $OSWAP_43996c6055881617ab1a10c3dd4ce973.$_SERVER['SERVER_NAME']."/index.php/plugin/alipay_pay/notify_url/"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['return_url']= $OSWAP_43996c6055881617ab1a10c3dd4ce973.$_SERVER['SERVER_NAME']."/index.php/plugin/alipay_pay/return_url/"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['seller_email']= $OSWAP_a6da2094cb0d5baf091cb483a99bcf8e; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['out_trade_no']= $OSWAP_e11994754038f9e4f1c97984d3972aa4; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['subject']= $OSWAP_bc52ac1daa7e002000e39d5961799757.'_充值'; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['price']= $OSWAP_614bd2eb7e4a26ef750c5efd0aceac00; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['body']= $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['subject']; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['receive_name']= $OSWAP_bc52ac1daa7e002000e39d5961799757; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['receive_address']= $OSWAP_bc52ac1daa7e002000e39d5961799757; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['receive_zip']= "123456"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['receive_phone']= "0000-00000000"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['receive_mobile']= "13333333333"; $OSWAP_98e57760c0002273d86b28deb5f4eb4ameter['_input_charset']= trim(strtolower($OSWAP_2662881b5ec6cf8a6adf42d628fc6256['input_charset'])); $OSWAP_6e50ab286503c1181bc6f57a3adf52c4 = new AlipaySubmit($OSWAP_2662881b5ec6cf8a6adf42d628fc6256); $OSWAP_07ed03f987b9a111422d3b6a9ce78390 = $OSWAP_6e50ab286503c1181bc6f57a3adf52c4->buildRequestForm($OSWAP_98e57760c0002273d86b28deb5f4eb4ameter,"get", "确认"); TEMPLATE::display('create.tpl'); echo $OSWAP_07ed03f987b9a111422d3b6a9ce78390; } function notify_url(){ $OSWAP_bc52ac1daa7e002000e39d5961799757=$swap_mac['c']['网站名称']; $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['partner'] = plug_eva('alipay_pay','合作身份者id'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['key'] = plug_eva('alipay_pay','安全检验码'); $OSWAP_a6da2094cb0d5baf091cb483a99bcf8e = plug_eva('alipay_pay','支付宝帐户'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['sign_type'] = strtoupper('MD5'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['input_charset']= strtolower('utf-8'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['cacert'] = SWAP_PLUGINS.'alipay_pay'.SWAP_DIR_END.'cacert.pem'; $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['transport'] = 'http'; if(plug_eva('alipay_pay','使用HTTPS')){ $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['transport'] = 'https'; } $OSWAP_0bc74564745608048f6c73189a61c85b = new AlipayNotify($OSWAP_2662881b5ec6cf8a6adf42d628fc6256); $OSWAP_551cbdaeaa0185f219286565ebe5f5e1 = $OSWAP_0bc74564745608048f6c73189a61c85b->verifyNotify(); if($OSWAP_551cbdaeaa0185f219286565ebe5f5e1) { $OSWAP_e11994754038f9e4f1c97984d3972aa4 = _POST('out_trade_no'); $OSWAP_520f411194719c882eb0c8729b38f6d6 = _POST('trade_no'); $OSWAP_bf1bdb01af063e4d15cac9a9874c0c5b = _POST('trade_status'); $ts = _POST('trade_status'); if($ts == 'TRADE_CLOSED') {$this->conn->update('审核订单',"状态='交易关闭',订单id='".$OSWAP_520f411194719c882eb0c8729b38f6d6."'","id='".$OSWAP_e11994754038f9e4f1c97984d3972aa4."'");die("success");} if($ts == 'WAIT_BUYER_PAY') {$this->conn->update('审核订单',"状态='等待付款',订单id='".$OSWAP_520f411194719c882eb0c8729b38f6d6."'","id='".$OSWAP_e11994754038f9e4f1c97984d3972aa4."'");die("success");} if($ts == 'WAIT_SELLER_SEND_GOODS') {if(plug_eva('alipay_pay','自动发货')=='on'){$OSWAP_98e57760c0002273d86b28deb5f4eb4ameter = array("service" => "send_goods_confirm_by_platform","partner" => trim($OSWAP_2662881b5ec6cf8a6adf42d628fc6256['partner']),"trade_no" => $OSWAP_520f411194719c882eb0c8729b38f6d6,"logistics_name" => "AILPAY","invoice_no" => $OSWAP_e11994754038f9e4f1c97984d3972aa4,"transport_type" => "EMS","_input_charset" => trim(strtolower($OSWAP_2662881b5ec6cf8a6adf42d628fc6256['input_charset'])));$OSWAP_6e50ab286503c1181bc6f57a3adf52c4 = new AlipaySubmit($OSWAP_2662881b5ec6cf8a6adf42d628fc6256);$OSWAP_07ed03f987b9a111422d3b6a9ce78390 = $OSWAP_6e50ab286503c1181bc6f57a3adf52c4->buildRequestHttp($OSWAP_98e57760c0002273d86b28deb5f4eb4ameter);}$this->conn->update('审核订单',"状态='等待发货',订单id='".$OSWAP_520f411194719c882eb0c8729b38f6d6."'","id='".$OSWAP_e11994754038f9e4f1c97984d3972aa4."'");die("success");} if($ts == 'WAIT_BUYER_CONFIRM_GOODS') {$this->conn->update('审核订单',"状态='等待收货',订单id='".$OSWAP_520f411194719c882eb0c8729b38f6d6."'","id='".$OSWAP_e11994754038f9e4f1c97984d3972aa4."'");die("success");} if($ts == 'TRADE_FINISHED' || $ts == 'TRADE_SUCCESS' || $ts == 'TRADE_PENDING') { if($ts == 'TRADE_FINISHED' )$OSWAP_95171d761c1302f700e8323af70fe2a2='0'; if($ts == 'TRADE_SUCCESS' )$OSWAP_95171d761c1302f700e8323af70fe2a2='1'; if($ts == 'TRADE_PENDING' )$OSWAP_95171d761c1302f700e8323af70fe2a2='2'; $this->conn->select('审核订单',"*","id='".$OSWAP_e11994754038f9e4f1c97984d3972aa4."'"); $OSWAP_38e31f81f6a54aa809f5674c5e773359 = $this->conn->fetch_array(); $this->conn->free(); if(strpos($OSWAP_38e31f81f6a54aa809f5674c5e773359['状态'], '充值完成') !== false){ $this->conn->update('审核订单',"状态='充值完成[{$OSWAP_95171d761c1302f700e8323af70fe2a2}]',订单id='".$OSWAP_520f411194719c882eb0c8729b38f6d6."'","id='".$OSWAP_e11994754038f9e4f1c97984d3972aa4."'"); die("success"); } $this->conn->select('用户',"*","uid='".$OSWAP_38e31f81f6a54aa809f5674c5e773359['uid']."'"); $OSWAP_0ddd9b1a544a556d54686088734b966d = $this->conn->fetch_array(); $OSWAP_419a74c37438760d4e37c1b16ba06f9f=plug_eva('alipay_pay','交易币汇率'); $this->conn->update('用户',"预存款='".((float)$OSWAP_0ddd9b1a544a556d54686088734b966d['预存款']+((float)$OSWAP_38e31f81f6a54aa809f5674c5e773359['总价']*(float)$OSWAP_419a74c37438760d4e37c1b16ba06f9f))."'","uid='".$OSWAP_38e31f81f6a54aa809f5674c5e773359['uid']."'"); $this->conn->update('审核订单',"状态='充值完成[{$OSWAP_95171d761c1302f700e8323af70fe2a2}]',订单id='".$OSWAP_520f411194719c882eb0c8729b38f6d6."'","id='".$OSWAP_e11994754038f9e4f1c97984d3972aa4."'"); die("success"); } die("success"); } else { echo "fail"; } } function return_url(){ $OSWAP_bc52ac1daa7e002000e39d5961799757=$swap_mac['c']['网站名称']; $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['partner'] = plug_eva('alipay_pay','合作身份者id'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['key'] = plug_eva('alipay_pay','安全检验码'); $OSWAP_a6da2094cb0d5baf091cb483a99bcf8e = plug_eva('alipay_pay','支付宝帐户'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['sign_type'] = strtoupper('MD5'); $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['cacert'] = SWAP_PLUGINS.'alipay_pay'.SWAP_DIR_END.'cacert.pem'; $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['transport'] = 'http'; if(plug_eva('alipay_pay','使用HTTPS')){ $OSWAP_2662881b5ec6cf8a6adf42d628fc6256['transport'] = 'https'; } $OSWAP_0bc74564745608048f6c73189a61c85b = new AlipayNotify($OSWAP_2662881b5ec6cf8a6adf42d628fc6256); $OSWAP_551cbdaeaa0185f219286565ebe5f5e1 = $OSWAP_0bc74564745608048f6c73189a61c85b->verifyReturn(); if($OSWAP_551cbdaeaa0185f219286565ebe5f5e1) { $OSWAP_e11994754038f9e4f1c97984d3972aa4 = _GET('out_trade_no'); $OSWAP_520f411194719c882eb0c8729b38f6d6 = _GET('trade_no'); $OSWAP_bf1bdb01af063e4d15cac9a9874c0c5b = _GET('trade_status'); $ts = _GET('trade_status'); if($ts == 'WAIT_SELLER_SEND_GOODS') { TEMPLATE::display('WAIT_SELLER_SEND_GOODS.tpl'); } else if($ts == 'WAIT_BUYER_CONFIRM_GOODS') { TEMPLATE::display('WAIT_BUYER_CONFIRM_GOODS.tpl'); } else if($ts == 'TRADE_FINISHED' || $ts == 'TRADE_SUCCESS' || $ts == 'TRADE_PENDING') { TEMPLATE::display('TRADE_FINISHED.tpl'); } else { TEMPLATE::assign('trade_status',_GET('trade_status')); TEMPLATE::display('other_states.tpl'); } } else { TEMPLATE::display('fail.tpl'); } } function admin() { need_admin(); $OSWAP_037417b04f4aa5fb55480d7a2b71cb25="alipay_pay"; $OSWAP_b67ddcf7a4aac650fb1af0e174f87bc3="支付宝支付接口"; $OSWAP_32efb0fe75bdaaa150697d05bea95c2d=mac_url_get(1); if($OSWAP_32efb0fe75bdaaa150697d05bea95c2d==""){$OSWAP_32efb0fe75bdaaa150697d05bea95c2d="list";} $id="";$id=mac_url_get(2); $ok="";$ok=mac_url_get(3); $OSWAP_500e953f2464ce598aa27bf7dc5f25c2 =array( array('支付接口类型','select','请选择支付接口的类型','',array('即时到帐交易','双功能交易','担保交易')), array('合作身份者id','text','请输入支付宝对接的ID'), array('安全检验码','text','请输入支付宝对接的检验码'), array('支付宝帐户','text','你支付宝的帐户'), array('使用HTTPS','yesno','是否使用使用HTTPS连接支付宝(不建议,大概)'), array('自动发货','yesno','如果使用的是担保自动发货') ); if($OSWAP_32efb0fe75bdaaa150697d05bea95c2d=="editok"){ foreach( $OSWAP_500e953f2464ce598aa27bf7dc5f25c2 as $OSWAP_9b233d8489989a065ce9a5db4ca6d112 => $OSWAP_8681fc55eda32d2985cb2a798bd66f40){plug_eva($OSWAP_037417b04f4aa5fb55480d7a2b71cb25,$OSWAP_8681fc55eda32d2985cb2a798bd66f40[0],_POST($OSWAP_8681fc55eda32d2985cb2a798bd66f40[0]));} die("修改完成ok"); } AdminT::header($OSWAP_b67ddcf7a4aac650fb1af0e174f87bc3, ''); AdminT::search(); echo '<main class="page-content content-wrap">'; AdminT::navbar(); AdminT::sidebar(); echo '<div class="page-inner">'; AdminT::title($OSWAP_b67ddcf7a4aac650fb1af0e174f87bc3, '<li>网站设置</li>'); ?>	
<div id="main-wrapper" class="container"><div class="row"><div class="col-md-12"><div class="panel panel-primary"><div class="panel-body"><form role="form" id="settingfrom" class="form-horizontal form-groups-bordered">

<?php
 foreach( $OSWAP_500e953f2464ce598aa27bf7dc5f25c2 as $OSWAP_9b233d8489989a065ce9a5db4ca6d112 => $OSWAP_ae2b5050a58def5e6182eae641a082ff){ $OSWAP_ae2b5050a58def5e6182eae641a082ff[3]=plug_eva($OSWAP_037417b04f4aa5fb55480d7a2b71cb25,$OSWAP_ae2b5050a58def5e6182eae641a082ff[0]); if($OSWAP_ae2b5050a58def5e6182eae641a082ff[1]=='text'){ $OSWAP_a3b8bb47cd8a68ece805f7bed6228c89="<input type=\"{$OSWAP_ae2b5050a58def5e6182eae641a082ff[1]}\" value=\"{$OSWAP_ae2b5050a58def5e6182eae641a082ff[3]}\" name=\"{$OSWAP_ae2b5050a58def5e6182eae641a082ff[0]}\" class=\"form-control\">"; }elseif($OSWAP_ae2b5050a58def5e6182eae641a082ff[1]=='yesno' ){ if($OSWAP_ae2b5050a58def5e6182eae641a082ff[3]=='on'){$OSWAP_ae2b5050a58def5e6182eae641a082ff['yes_yesno']='checked="checked"';} else{$OSWAP_ae2b5050a58def5e6182eae641a082ff['no_yesno']='checked="checked"';} $OSWAP_a3b8bb47cd8a68ece805f7bed6228c89="<label><input type=\"radio\" name=\"{$OSWAP_ae2b5050a58def5e6182eae641a082ff[0]}\" value=\"on\"{$OSWAP_ae2b5050a58def5e6182eae641a082ff['yes_yesno']}/ >是 </label><label><input type=\"radio\" name=\"{$OSWAP_ae2b5050a58def5e6182eae641a082ff[0]}\" value=\"off\" {$OSWAP_ae2b5050a58def5e6182eae641a082ff['no_yesno']} />否</label> "; }elseif($OSWAP_ae2b5050a58def5e6182eae641a082ff[1]=='select' ){ $OSWAP_24b438bad16f2759742efc9d71ca116c=""; $OSWAP_24b438bad16f2759742efc9d71ca116c .="<select name=\"{$OSWAP_ae2b5050a58def5e6182eae641a082ff[0]}\" class=\"form-control\"></option>"; foreach( $OSWAP_ae2b5050a58def5e6182eae641a082ff[4] AS $OSWAP_4d70926f975458bbe43ce9d5024ebbe4){ $OSWAP_a04c8e0ec32e47add31cb1b6c73894db=""; if($OSWAP_ae2b5050a58def5e6182eae641a082ff[3]==$OSWAP_4d70926f975458bbe43ce9d5024ebbe4){$OSWAP_a04c8e0ec32e47add31cb1b6c73894db=' selected="selected"';} $OSWAP_24b438bad16f2759742efc9d71ca116c .=" <option value =\"{$OSWAP_4d70926f975458bbe43ce9d5024ebbe4}\"{$OSWAP_a04c8e0ec32e47add31cb1b6c73894db}>{$OSWAP_4d70926f975458bbe43ce9d5024ebbe4}</option>"; } $OSWAP_24b438bad16f2759742efc9d71ca116c .="</select>"; $OSWAP_a3b8bb47cd8a68ece805f7bed6228c89=$OSWAP_24b438bad16f2759742efc9d71ca116c; }else{$OSWAP_a3b8bb47cd8a68ece805f7bed6228c89="{$OSWAP_ae2b5050a58def5e6182eae641a082ff[1]}-{$OSWAP_ae2b5050a58def5e6182eae641a082ff[3]}";} echo("<div class=\"form-group\"><label class=\"col-sm-3 control-label\">{$OSWAP_ae2b5050a58def5e6182eae641a082ff[0]}</label><div class=\"col-sm-5\">{$OSWAP_a3b8bb47cd8a68ece805f7bed6228c89}{$OSWAP_ae2b5050a58def5e6182eae641a082ff[2]}</div></div>"); } ?> <div class="form-group"><div class="col-sm-offset-3 col-sm-5"><a href="javascript:void(0)" onclick="$.post('/index.php/plugin/<?php echo $OSWAP_037417b04f4aa5fb55480d7a2b71cb25 ;?>/admin/editok/',$('#settingfrom').serialize(),function(data){if(data.match('ok')=='ok') swap_alert('success','保存成功',data); else swap_alert('error','保存失败',data);});" class="btn btn-success">保存更改</a></div></div></form></div></div></div></div></div></div><?php
 AdminT::page_footer(); echo '</div></main>'; AdminT::cd_nav(); AdminT::pjs(); echo '<script src="/admin_assets/plugins/waypoints/jquery.waypoints.min.js"></script><script src="/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js"></script><script src="/admin_assets/plugins/toastr/toastr.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.time.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.symbol.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.resize.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.tooltip.min.js"></script><script src="/admin_assets/plugins/curvedlines/curvedLines.js"></script><script src="/admin_assets/plugins/metrojs/MetroJs.min.js"></script><script src="/admin_assets/plugins/morris/raphael.min.js"></script><script src="/admin_assets/plugins/morris/morris.min.js"></script><script src="/admin_assets/js/modern.min.js"></script><script src="/admin_assets/plugins/datatables/js/jquery.dataTables.min.js"></script><script>var extable;$(document).ready(function() {extable=$(\'#example\').DataTable({"language":{"url":"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json"}});});</script></body></html>'; } } 