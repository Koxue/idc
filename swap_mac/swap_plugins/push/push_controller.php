<?php  defined('SWAP_ROOT') or die('非法操作'); class push extends controller { function config(){ import("swap.Mail"); SMACSQL()->query("	CREATE TABLE IF NOT EXISTS `PUSH表` (  `id` int(4) NOT NULL AUTO_INCREMENT,  `订单id` text,`原用户uid` text, `新用户uid` text,`提交时间` text, `成功时间` text,  `状态` text,  PRIMARY KEY (`id`),  UNIQUE KEY `id` (`id`) ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"); return array( 'swap_no_login' => array('admin'=>'1',),'index' => '1', ); } function index(){ $OSWAP_96bc564f937dc43f918d735733e9d7eb=mac_url_get(1); $lang=plug_lang_get('push','main'); TEMPLATE::assign('pulang', $lang); $OSWAP_435dc91f3e7e0ca883ca2c6973cea882=session('uid'); $t["允许push的产品"]=json_decode( plug_eva('push','允许push的产品')); if($OSWAP_96bc564f937dc43f918d735733e9d7eb==""){ $t['列表']=array(); $this->conn->select('服务', '*', "帐号id='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}'"); while ($OSWAP_69392a649e101baf720aab7682d02b72 = $this->conn->fetch_assoc()) { if(in_array($OSWAP_69392a649e101baf720aab7682d02b72['产品id'],$t["允许push的产品"])) $t['列表'][] = $OSWAP_69392a649e101baf720aab7682d02b72; } TEMPLATE::assign('t', $t); TEMPLATE::display("index.html"); die(); } $OSWAP_92e907f29e575fd3b7db13b04b1648b6=array(); $this->conn->findall('用户'); while ($OSWAP_27e79fa53e7a158618df2d5045b001eb = $this->conn->fetch_assoc()) { $OSWAP_92e907f29e575fd3b7db13b04b1648b6[$OSWAP_27e79fa53e7a158618df2d5045b001eb['uid']]=$OSWAP_27e79fa53e7a158618df2d5045b001eb; } $OSWAP_3d4911914402b2260b4007ff4720107b=array(); $this->conn->findall('服务'); while ($OSWAP_8c353a4c911224da41a33463ee669981 = $this->conn->fetch_assoc()) { $OSWAP_3d4911914402b2260b4007ff4720107b[$OSWAP_8c353a4c911224da41a33463ee669981['id']]=$OSWAP_8c353a4c911224da41a33463ee669981; } $OSWAP_4d7ea28e5e2920bd222d5b5db7535161 = SMACSQL()->fetch_array(); if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="alllist"){$this->conn->select('PUSH表', '*', "(原用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' or 新用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' )");$t['当前查看状态']="全部";} if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="zyzlist"){$this->conn->select('PUSH表', '*', "(原用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' or 新用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}') and 状态='等待审核' ");$t['当前查看状态']="等待审核";} if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="yeslist"){$this->conn->select('PUSH表', '*', "(原用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' or 新用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}') and 状态='转移成功' ");$t['当前查看状态']="转移成功";} if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="nolist"){$this->conn->select('PUSH表', '*', "(原用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' or 新用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}') and 状态='驳回审核' ");$t['当前查看状态']="驳回审核";} if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="qxlist"){$this->conn->select('PUSH表', '*', "(原用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' or 新用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}') and 状态='转移取消' ");$t['当前查看状态']="转移取消";} $OSWAP_5754bb1375fcea5145754b221747fffa = array(); $t['列表']=array(); while ($OSWAP_69392a649e101baf720aab7682d02b72 = $this->conn->fetch_assoc()) { $OSWAP_69392a649e101baf720aab7682d02b72['服务信息'] = $OSWAP_3d4911914402b2260b4007ff4720107b[$OSWAP_69392a649e101baf720aab7682d02b72['订单id']]; $OSWAP_69392a649e101baf720aab7682d02b72['接收方'] = $OSWAP_92e907f29e575fd3b7db13b04b1648b6[$OSWAP_69392a649e101baf720aab7682d02b72['新用户uid']]; $OSWAP_69392a649e101baf720aab7682d02b72['转移方'] = $OSWAP_92e907f29e575fd3b7db13b04b1648b6[$OSWAP_69392a649e101baf720aab7682d02b72['原用户uid']]; if($OSWAP_69392a649e101baf720aab7682d02b72['原用户uid']==$OSWAP_435dc91f3e7e0ca883ca2c6973cea882) { $OSWAP_69392a649e101baf720aab7682d02b72['类型'] =$lang['转出']; $OSWAP_69392a649e101baf720aab7682d02b72['对方用户名'] =$OSWAP_69392a649e101baf720aab7682d02b72['接收方']['用户名']; }else{ $OSWAP_69392a649e101baf720aab7682d02b72['类型'] =$lang['转入']; $OSWAP_69392a649e101baf720aab7682d02b72['对方用户名'] =$OSWAP_69392a649e101baf720aab7682d02b72['转移方']['用户名']; } $OSWAP_69392a649e101baf720aab7682d02b72['用户名'] =$OSWAP_69392a649e101baf720aab7682d02b72['服务信息']['用户名']; $t['列表'][] = $OSWAP_69392a649e101baf720aab7682d02b72; } TEMPLATE::assign('t', $t); TEMPLATE::display("list.html"); } function admin() { $lang=plug_lang_get('push','main'); $OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b="push"; $OSWAP_73e8a2d838965fc8d11c7404d69f7a19="Push设置"; $OSWAP_96bc564f937dc43f918d735733e9d7eb=mac_url_get(1); $id="";$id=mac_url_get(2); $ok="";$ok=mac_url_get(3); $OSWAP_435dc91f3e7e0ca883ca2c6973cea882=session('uid'); if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="userzy" && $OSWAP_435dc91f3e7e0ca883ca2c6973cea882!=""){ $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["订单信息"]['id']=_POST('服务id'); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["提交信息"]['对方用户名']=_POST('对方用户名'); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["提交信息"]['对方邮箱']=_POST('对方邮箱'); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["允许push的产品"]=json_decode( plug_eva('push','允许push的产品')); $this->conn->select('服务', '*', "id='{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["订单信息"]['id']}'"); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["服务信息"] = $this->conn->fetch_assoc(); if(!in_array($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["服务信息"]['产品id'],$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["允许push的产品"])) exit(redirect('/index.php/plugin/push/index/?warning='.$lang['此产品不能转移'])); $OSWAP_29c8c240c2c8ad7bfec3d419eaadb5bf= _POST('账户密码'); $OSWAP_1273ac07ad7f15b3f717a6d97268e63e= md5('swap' . $OSWAP_29c8c240c2c8ad7bfec3d419eaadb5bf); $this->conn->select('用户', '*', "uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' and (密码='{$OSWAP_1273ac07ad7f15b3f717a6d97268e63e}' or 密码=PASSWORD('{$OSWAP_29c8c240c2c8ad7bfec3d419eaadb5bf}') or 密码=OLD_PASSWORD('{$OSWAP_29c8c240c2c8ad7bfec3d419eaadb5bf}'))"); if($this->conn->db_num_rows()==0){ exit(redirect('/index.php/plugin/push/index/?warning='.$lang['密码错误'])); } else { $OSWAP_84af517988b59556e9328cd1556c531e=date("Y-m-d H:i:s"); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"] = $this->conn->fetch_array(); $this->conn->select('用户', '*', "用户名='{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["提交信息"]['对方用户名']}' and 电子邮件='{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["提交信息"]['对方邮箱']}'"); if ($this->conn->db_num_rows()==0) { exit(redirect('/index.php/plugin/push/index/?warning='.$lang['对方不存在'])); } else { $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["对方信息"] = $this->conn->fetch_array(); if(plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'是否不需要审核')=="on"){ $this->conn->update('服务',"帐号id='{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["对方信息"]['uid']}'","id='{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["订单信息"]['id']}'"); $this->conn->insert('PUSH表',"`订单id` ,`原用户uid` , `新用户uid` ,`提交时间` , `成功时间` , `状态` ","'{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["订单信息"]['id']}' ,'{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' , '{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["对方信息"]['uid']}' ,'{$OSWAP_84af517988b59556e9328cd1556c531e}' , '{$OSWAP_84af517988b59556e9328cd1556c531e}' , '转移成功' "); if(plug_eva('push','接收方邮件标题')!="" && plug_eva('push','接收方邮件内容')!=""){ SendMail($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["对方信息"]['电子邮件'],plug_eva('push','接收方邮件标题'),plug_eva('push','接收方邮件内容'),'邮件提醒'); } if(plug_eva('push','转移方邮件标题')!="" && plug_eva('push','转移方邮件内容')!=""){ SendMail($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]['电子邮件'],plug_eva('push','转移方邮件标题'),plug_eva('push','转移方邮件内容'),'邮件提醒'); } exit(redirect('/index.php/plugin/push/index/?success='.$lang['转移成功'])); }else{ $this->conn->update('服务',"帐号id='0'","id='{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["订单信息"]['id']}'"); $this->conn->insert('PUSH表',"`订单id` ,`原用户uid` , `新用户uid` ,`提交时间` , `成功时间` , `状态` ","'{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["订单信息"]['id']}' ,'{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}' , '{$OSWAP_0fb5d207a80e5557a433e63540b7cd5b["对方信息"]['uid']}' ,'{$OSWAP_84af517988b59556e9328cd1556c531e}' , '0000-00-00 00:00:00' , '等待审核' "); $this->conn->select('用户', '*', "uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}'"); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]= $this->conn->fetch_array(); if(plug_eva('push','转移方邮件标题')!="" && plug_eva('push','转移方邮件内容')!=""){ SendMail($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]['电子邮件'],plug_eva('push','转移方邮件标题'),plug_eva('push','转移方邮件内容'),'邮件提醒'); } if(plug_eva('push','通知管理员邮箱')!=""){ SendMail(plug_eva('push','通知管理员邮箱'),'在您的网站有一条push等待您的审核','在您的网站有一条push等待您的审核','邮件提醒'); } exit(redirect('/index.php/plugin/push/index/?success='.$lang['已经提交转移,请等待管理员审核'])); } } } } if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="userqx" && $OSWAP_435dc91f3e7e0ca883ca2c6973cea882!=""){ $this->conn->select('PUSH表', '*', "id='{$id}' AND 原用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}'"); $OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4 = $this->conn->fetch_assoc(); $this->conn->update('服务',"帐号id='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['原用户uid']}'","id='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['订单id']}'"); $this->conn->update('PUSH表',"状态='转移取消'","id='{$id}' AND 原用户uid='{$OSWAP_435dc91f3e7e0ca883ca2c6973cea882}'"); $this->conn->select('用户', '*', "uid='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['原用户uid']}'"); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]= $this->conn->fetch_array(); if(plug_eva('push','转移方邮件标题')!="" && plug_eva('push','转移方邮件内容')!=""){ SendMail($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]['电子邮件'],plug_eva('push','转移方邮件标题'),plug_eva('push','转移方邮件内容'),'邮件提醒'); } exit(redirect('/index.php/plugin/push/index/?warning='.$lang['转移取消成功'])); } need_admin(); if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="shyes"){ $this->conn->select('PUSH表', '*', "id='{$id}'"); $OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4 = $this->conn->fetch_array(); $this->conn->update('服务',"帐号id='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['新用户uid']}'","id='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['订单id']}'"); $this->conn->update('PUSH表',"状态='转移成功'","id='{$id}'"); $this->conn->update('PUSH表',"成功时间='".date("Y-m-d H:i:s")."'","id='{$id}'"); $this->conn->select('用户', '*', "uid='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['新用户uid']}'"); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["对方信息"] = $this->conn->fetch_array(); $this->conn->select('用户', '*', "uid='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['原用户uid']}'"); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]= $this->conn->fetch_array(); if(plug_eva('push','接收方邮件标题')!="" && plug_eva('push','接收方邮件内容')!=""){ SendMail($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["对方信息"]['电子邮件'],plug_eva('push','接收方邮件标题'),plug_eva('push','接收方邮件内容'),'邮件提醒'); } if(plug_eva('push','转移方邮件标题')!="" && plug_eva('push','转移方邮件内容')!=""){ SendMail($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]['电子邮件'],plug_eva('push','转移方邮件标题'),plug_eva('push','转移方邮件内容'),'邮件提醒'); } die('ok'); } if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="shno"){ $this->conn->select('PUSH表', '*', "id='{$id}'"); $OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4 = $this->conn->fetch_assoc(); $this->conn->update('服务',"帐号id='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['原用户uid']}'","id='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['订单id']}'"); $this->conn->update('PUSH表',"状态='驳回审核'","id='{$id}'"); $this->conn->select('用户', '*', "uid='{$OSWAP_e1f2a47b7ac058d4c5e4918ae87d4ad4['原用户uid']}'"); $OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]= $this->conn->fetch_array(); if(plug_eva('push','转移方邮件标题')!="" && plug_eva('push','转移方邮件内容')!=""){ SendMail($OSWAP_0fb5d207a80e5557a433e63540b7cd5b["用户信息"]['电子邮件'],plug_eva('push','转移方邮件标题'),plug_eva('push','转移方邮件内容'),'邮件提醒'); } die('ok'); } if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="editok"){ plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'是否不需要审核',_POST('是否不需要审核')); plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'通知管理员邮箱',_POST('通知管理员邮箱')); plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'转移方邮件标题',_POST('转移方邮件标题')); plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'接收方邮件标题',_POST('接收方邮件标题')); plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'转移方邮件内容',_POST('转移方邮件内容')); plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'接收方邮件内容',_POST('接收方邮件内容')); plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'允许push的产品',json_encode(_POST('允许push的产品'))); die('ok'); } if($OSWAP_96bc564f937dc43f918d735733e9d7eb=="list"){ $OSWAP_73e8a2d838965fc8d11c7404d69f7a19="Push列表"; AdminT::header($OSWAP_73e8a2d838965fc8d11c7404d69f7a19, '<link href="/admin_assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/><link href="/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/><link href="/admin_assets/plugins/multi-select/css/multi-select.css" rel="stylesheet" type="text/css"/>'); AdminT::search(); echo '<main class="page-content content-wrap">'; AdminT::navbar(); AdminT::sidebar(); echo '<div class="page-inner">'; AdminT::title($OSWAP_73e8a2d838965fc8d11c7404d69f7a19, '<li>网站设置</li>'); $this->conn->findall('PUSH表'); $OSWAP_3d25991e23d224d90406cd98d185afff=array(); ?>	
<div id="main-wrapper" class="container"><div class="row"><div class="col-md-12"><div class="panel panel-primary"><div class="panel-body">

<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>id</th><th>服务id</th><th>原用户uid</th><th>新用户uid</th><th>提交时间</th><th>成功时间</th><th>状态</th><th>操作</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>id</th><th>服务id</th><th>原用户uid</th><th>新用户uid</th><th>提交时间</th><th>成功时间</th><th>状态</th><th>操作</th>
		</tr>
	</tfoot>
	<tbody>
	


<?php  while ($cp = $this->conn->fetch_assoc()) { ?>

		<tr>
			<td><?php echo $cp['id'];?></td>
			<td><a href="/index.php/Admin/server_detailed/<?php echo $cp['订单id'];?>/" target="_blank">
			<?php echo $cp['订单id'];?></a></td>
			<td><a href="/index.php/Admin/User_Detailed/<?php echo $cp['原用户uid'];?>/" target="_blank"><?php echo $cp['原用户uid'];?></a></td>
			<td><a href="/index.php/Admin/User_Detailed/<?php echo $cp['新用户uid'];?>/" target="_blank"><?php echo $cp['新用户uid'];?></a></td>
			<td><?php echo $cp['提交时间'];?></td>
			<td><?php echo $cp['成功时间'];?></td>
			<td><?php echo $cp['状态'];?></td>
			<td><?php if($cp['状态']=='等待审核'){ ?>
				<a href="javascript:shtg('<?php echo $cp['id'];?>')" class="btn btn-info btn-xs">通过</a>
				<a href="javascript:shbh('<?php echo $cp['id'];?>')" class="btn btn-info btn-xs">驳回</a>
			<?php }else{ ?>
				<a href="javascript:void(0)" class="btn btn-info btn-xs" >无需操作</a>
			<?php }?>
			
			

</td>
		</tr>
	
<?php  } ?>
	</tbody>
</table>


</div></div></div></div></div></div><?php
 AdminT::page_footer(); echo '</div></main>'; AdminT::cd_nav(); AdminT::pjs(); ?>
        <script type="text/javascript">
function shtg(id){
	$.get('/index.php/plugin/push/admin/shyes/'+id+'/',function(data){swap_alert('success','操作成功',data)});
}
function shbh(id){
	$.get('/index.php/plugin/push/admin/shno/'+id+'/',function(data){swap_alert('success','操作成功',data)});
}
</script>
		<script src="/admin_assets/plugins/waypoints/jquery.waypoints.min.js"></script><script src="/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js"></script><script src="/admin_assets/plugins/toastr/toastr.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.time.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.symbol.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.resize.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.tooltip.min.js"></script><script src="/admin_assets/plugins/curvedlines/curvedLines.js"></script><script src="/admin_assets/plugins/metrojs/MetroJs.min.js"></script><script src="/admin_assets/plugins/morris/raphael.min.js"></script><script src="/admin_assets/plugins/morris/morris.min.js"></script><script src="/admin_assets/js/modern.min.js"></script><script src="/admin_assets/plugins/datatables/js/jquery.dataTables.min.js"></script><script src="/admin_assets/plugins/multi-select/js/jquery.multi-select.js"></script><script src="/admin_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script><script>
		var extable;$(document).ready(function() {$('.multi-select').each(function(){$(this).multiSelect();});extable=$('#example').DataTable({"language":{"url":"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json"}});});</script></body></html>
		<?php
 } if($OSWAP_96bc564f937dc43f918d735733e9d7eb==""){ AdminT::header($OSWAP_73e8a2d838965fc8d11c7404d69f7a19, '<link href="/admin_assets/plugins/multi-select/css/multi-select.css" rel="stylesheet" type="text/css"/>'); AdminT::search(); echo '<main class="page-content content-wrap">'; AdminT::navbar(); AdminT::sidebar(); echo '<div class="page-inner">'; AdminT::title($OSWAP_73e8a2d838965fc8d11c7404d69f7a19, '<li>网站设置</li>'); ?>	
<div id="main-wrapper" class="container"><div class="row"><div class="col-md-12"><div class="panel panel-primary"><div class="panel-body"><form role="form" id="settingfrom" class="form-horizontal form-groups-bordered">
<div class="form-group"><label class="col-sm-3 control-label">
是否不需要审核
</label><div class="col-sm-5">
<label><input type="radio" name="是否不需要审核" value="on" <?php if(plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'是否不需要审核')=='on'){echo 'checked="checked"';} ?>>是 </label><label><input type="radio" name="是否不需要审核" value="off"  <?php if(plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'是否不需要审核')!='on'){echo 'checked="checked"';} ?>>否</label>
如果选择是 则用户转移立即到对方账户上去
</div></div>
<div class="form-group"><label class="col-sm-3 control-label">
通知管理员邮箱
</label><div class="col-sm-5">
<input type="text" value="<?php echo plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'通知管理员邮箱'); ?>" name="通知管理员邮箱" class="form-control">
有订单push 您在此填写的邮箱将会收到通知
</div></div>
<div class="form-group"><label class="col-sm-3 control-label">
转移方邮件标题
</label><div class="col-sm-5">
<input type="text" value="<?php echo plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'转移方邮件标题'); ?>" name="转移方邮件标题" class="form-control">
转移者在开始转移和转移完成后收到的邮件标题
</div></div>
<div class="form-group"><label class="col-sm-3 control-label">
接收方邮件标题
</label><div class="col-sm-5">
<input type="text" value="<?php echo plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'接收方邮件标题'); ?>" name="接收方邮件标题" class="form-control">
接收者在转移完成后收到的邮件标题
</div></div>
<div class="form-group"><label class="col-sm-3 control-label">
转移方邮件内容
</label><div class="col-sm-5">
<input type="text" value="<?php echo plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'转移方邮件内容'); ?>" name="转移方邮件内容" class="form-control">
转移者在开始转移和转移完成后收到的邮件内容
</div></div>
<div class="form-group"><label class="col-sm-3 control-label">
接收方邮件内容
</label><div class="col-sm-5">
<input type="text" value="<?php echo plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'接收方邮件内容'); ?>" name="接收方邮件内容" class="form-control">
接收者在转移完成后收到的邮件内容
</div></div>



<div class="form-group"><label class="col-sm-3 control-label">
允许push的产品
</label><div class="col-sm-5">
<select multiple="multiple" name="允许push的产品[]" class="form-control multi-select">
<?php $this->conn->findall('产品'); $OSWAP_3d25991e23d224d90406cd98d185afff=array(); while ($OSWAP_da5ccaf03d6f0ac61033e26024a9ffb6 = $this->conn->fetch_assoc()) { ?>
<?php $OSWAP_23e6794ba288f847a3ada10a0a1fa963 = json_decode(plug_eva($OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b,'允许push的产品'));?>
<?php  ?>
											<option value="<?php echo $OSWAP_da5ccaf03d6f0ac61033e26024a9ffb6['id']; ?>" <?php if(in_array($OSWAP_da5ccaf03d6f0ac61033e26024a9ffb6['id'],$OSWAP_23e6794ba288f847a3ada10a0a1fa963))echo "selected"; ?>><?php echo $OSWAP_da5ccaf03d6f0ac61033e26024a9ffb6['名称']; ?></option>
<?php } ?>									
</select>

</div></div>

 <div class="form-group"><div class="col-sm-offset-3 col-sm-5"><a href="javascript:void(0)" onclick="$.post('/index.php/plugin/<?php echo $OSWAP_4fe5c50fa7275f7e1b89a0c8653a3f3b ;?>/admin/editok/',$('#settingfrom').serialize(),function(data){if(data.match('ok')=='ok') swap_alert('success','保存成功',data); else swap_alert('error','保存失败',data);});" class="btn btn-success">保存更改</a></div></div></form></div></div></div></div></div></div><?php
 AdminT::page_footer(); echo '</div></main>'; AdminT::cd_nav(); AdminT::pjs(); echo '<script src="/admin_assets/plugins/waypoints/jquery.waypoints.min.js"></script><script src="/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js"></script><script src="/admin_assets/plugins/toastr/toastr.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.time.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.symbol.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.resize.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.tooltip.min.js"></script><script src="/admin_assets/plugins/curvedlines/curvedLines.js"></script><script src="/admin_assets/plugins/metrojs/MetroJs.min.js"></script><script src="/admin_assets/plugins/morris/raphael.min.js"></script><script src="/admin_assets/plugins/morris/morris.min.js"></script><script src="/admin_assets/js/modern.min.js"></script><script src="/admin_assets/plugins/datatables/js/jquery.dataTables.min.js"></script><script src="/admin_assets/plugins/multi-select/js/jquery.multi-select.js"></script><script src="/admin_assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script><script>var extable;$(document).ready(function() {$(\'.multi-select\').each(function(){$(this).multiSelect();});extable=$(\'#example\').DataTable({"language":{"url":"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json"}});});</script></body></html>'; } } } 