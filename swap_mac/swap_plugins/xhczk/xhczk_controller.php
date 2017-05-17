<?php  defined('SWAP_ROOT') or die('非法操作'); class xhczk extends controller { function config(){ SMACSQL()->query("	CREATE TABLE IF NOT EXISTS `充值卡卡表` (  `id` int(4) NOT NULL AUTO_INCREMENT,  `密码` text,`金额` text,`使用用户uid` text,`使用时间` text,  PRIMARY KEY (`id`),  UNIQUE KEY `id` (`id`) ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"); return array('swap_no_login' => array('admin'=>'1'),'index' => '0',); } function index(){ $OSWAP_4178bd7317fb1b042e5e577919feb87e = _POST('code'); if($OSWAP_4178bd7317fb1b042e5e577919feb87e=='')exit(redirect('/index.php/user/pay/?warning='.$this->lang['充值密码不能为空'])); $this->conn->select('充值卡卡表','*',"密码='".$OSWAP_4178bd7317fb1b042e5e577919feb87e."' and 使用用户uid='0' and 使用时间='0'"); if($this->conn->db_num_rows()==0) exit(redirect('/index.php/user/pay/?warning='.$this->lang['充值卡不存在或者已经使用,请联系管理员'])); $OSWAP_65ad699854b9796ad8e3a7e95a13b71f = $this->conn->fetch_array(); $this->conn->select('用户',"*","uid='".$this->getuid()."'"); $OSWAP_1db5d79b4b6269296a54ec1558fb93cd = $this->conn->fetch_array(); $this->conn->update('用户',"预存款='".((float)$OSWAP_1db5d79b4b6269296a54ec1558fb93cd['预存款']+(float)$OSWAP_65ad699854b9796ad8e3a7e95a13b71f['金额'])."'","uid='".$this->getuid()."'"); $this->conn->update('充值卡卡表',"使用用户uid='".$this->getuid()."' , 使用时间='".date("Y-m-d H:i:s")."'","密码='".$OSWAP_4178bd7317fb1b042e5e577919feb87e."'"); exit(redirect('/index.php/user/pay/?success='.$this->lang['您成功充值了'].$OSWAP_65ad699854b9796ad8e3a7e95a13b71f['金额'].$this->lang['预存款'])); } function admin(){ need_admin(); $OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=mac_url_get(1); $id=mac_url_get(2); if($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="down"){ $this->conn->select('充值卡卡表','*',"1=1 and 使用用户uid='0' and 使用时间='0'  ORDER BY 密码 DESC"); while ($OSWAP_4178bd7317fb1b042e5e577919feb87e = $this->conn->fetch_assoc()){ $OSWAP_a694e2bc982c6b110322fba179068466.=$OSWAP_4178bd7317fb1b042e5e577919feb87e['密码'].","; $OSWAP_a694e2bc982c6b110322fba179068466.=$OSWAP_4178bd7317fb1b042e5e577919feb87e['金额']."\r\n"; } $OSWAP_a2184234d8c4b0e4243db39dbc5eccc8=date("Y-m-d H:i:s"); Header( "Content-type:   application/octet-stream "); Header( "Accept-Ranges:   bytes "); header( "Content-Disposition:   attachment;   filename=充值卡密列表_$OSWAP_a2184234d8c4b0e4243db39dbc5eccc8.txt "); header( "Expires:   0 "); header( "Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 "); header( "Pragma:   public "); print_r($OSWAP_a694e2bc982c6b110322fba179068466); exit; } if($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="del"){ $this->conn->delete('充值卡卡表',"1=1 and 使用用户uid!='0' and 使用时间!='0'"); exit('清理未使用充值卡成功'); } if($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="add"){ $OSWAP_28ec9b62cc0b368c9605f05b50b508b7=_POST("sl");$OSWAP_d14da1e1c6e4b46aa5fa79de8eb845ca=_POST("je");$OSWAP_d572833be97f00953ef562df19530850=_POST("qz");$lang=$this->lang; if($OSWAP_28ec9b62cc0b368c9605f05b50b508b7==""){die('数量不能为空');} if($OSWAP_d14da1e1c6e4b46aa5fa79de8eb845ca==""){die('金额不能为空');} for($a=0;$a<$OSWAP_28ec9b62cc0b368c9605f05b50b508b7;$a++){ $OSWAP_4178bd7317fb1b042e5e577919feb87e = $OSWAP_d572833be97f00953ef562df19530850.md5(date("Ymdis").md5(rand(10, 1000).rand(10, 1000).rand(10, 1000).rand(10, 1000))); $this->conn->insert('充值卡卡表'," 密码 , 金额 , 使用用户uid , 使用时间 "," '{$OSWAP_4178bd7317fb1b042e5e577919feb87e}' , '{$OSWAP_d14da1e1c6e4b46aa5fa79de8eb845ca}', '0', '0' "); } die('充值卡生成完成,刷新后将看到新的充值卡'); } if($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="yes"){ $this->conn->select('充值卡卡表','*',"1=1 and 使用用户uid!='0' and 使用时间!='0' ORDER BY 密码 DESC"); }elseif($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="no"){ $this->conn->select('充值卡卡表','*',"1=1 and 使用用户uid='0' and 使用时间='0'  ORDER BY 密码 DESC"); }else{ $this->conn->select('充值卡卡表','*',"1=1 ORDER BY 密码 DESC"); } $OSWAP_01ad294289fe01141d505c51bb541ccd=array(); while ($OSWAP_7e95240e84a5783462ddae95e5589b04 = $this->conn->fetch_assoc()) { if($OSWAP_7e95240e84a5783462ddae95e5589b04['使用时间']=="0"){$OSWAP_7e95240e84a5783462ddae95e5589b04['使用时间']="未使用";} if($OSWAP_7e95240e84a5783462ddae95e5589b04['使用用户uid']=="0"){$OSWAP_7e95240e84a5783462ddae95e5589b04['使用用户uid']='未使用';} $OSWAP_01ad294289fe01141d505c51bb541ccd[]=$OSWAP_7e95240e84a5783462ddae95e5589b04; } if($OSWAP_448b2256c563fdfb6346acd6aa675466=="")$OSWAP_448b2256c563fdfb6346acd6aa675466=_GET('success'); AdminT::header('充值卡管理', '<link href="/admin_assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/><link href="/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>'); AdminT::search(); ?><main class="page-content content-wrap">
		<script type="text/javascript">
function delysy(){
	$.get('/index.php/plugin/xhczk/admin/del/',function(data){swap_alert('success',data,data);});
}
</script>
		<?php
 AdminT::navbar(); AdminT::sidebar(); ?><div class="page-inner"><?php
 if($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="") $OSWAP_0ba89d2f3c5b6554fffe4b1cb2b9ceed='所有'; if($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="yes") $OSWAP_0ba89d2f3c5b6554fffe4b1cb2b9ceed='已使用'; if($OSWAP_3bfe7899cb93728ef6e0b87ddcea3e63=="no") $OSWAP_0ba89d2f3c5b6554fffe4b1cb2b9ceed='未使用'; AdminT::title('充值卡管理['.$OSWAP_0ba89d2f3c5b6554fffe4b1cb2b9ceed.']', '<li>网站设置</li>', '
		<a href="javascript:delysy();" class="btn btn-primary btn-addon btn-xs">清理已经使用卡</a>
		<a href="/index.php/plugin/xhczk/admin/down/"   target="_blank" class="btn btn-primary btn-addon btn-xs">导出未使用卡</a>
		<a href="/index.php/plugin/xhczk/admin/" class="btn btn-primary btn-addon btn-xs">所有卡</a>
		<a href="/index.php/plugin/xhczk/admin/yes/"  class="btn btn-primary btn-addon btn-xs">已使用卡</a>
		<a href="/index.php/plugin/xhczk/admin/no/" class="btn btn-primary btn-addon btn-xs">未使用卡</a>
		
		' );?>
						
		<div id="main-wrapper" class="container"><div class="row"><div class="col-md-12"><div class="panel panel-primary"><div class="panel-body">
		<form class="form-horizontal form-groups-bordered" method="post" id="addauth"><div class="form-group">
						
				<label class="control-label">数量：<input type="text" value="" name="sl" class="form-control" style="width:auto;float:right;"></label>
				<label class="control-label">金额：<input type="text" value="" name="je" class="form-control" style="width:auto;float:right;"></label>
				<label class="control-label">前缀：<input type="text" value="" name="qz" class="form-control" style="width:auto;float:right;"></label>
				<a href="javascript:void(0)" onclick="$.post('/index.php/plugin/xhczk/admin/add/',$('#addauth').serialize(),function(data){swap_alert('success',data,data);});" class="btn btn-success">生成充值卡</a>
		</form></div></div></div></div></div>

			<div class="row"><div class="col-md-12">
			
			 
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead><tr><th>充值卡密码</th><th>金额</th><th>使用用户Uid</th><th>使用时间</th></tr></thead>
	<tfoot><tr><th>充值卡密码</th><th>金额</th><th>使用用户Uid</th><th>使用时间</th></tr></tfoot>
	<tbody>
<?php foreach ($OSWAP_01ad294289fe01141d505c51bb541ccd as $cp) {echo "<tr><td>{$cp['密码']}</td><td>{$cp['金额']}</td><td>{$cp['使用用户uid']}</td><td>{$cp['使用时间']}</td></tr>"; } ?>
	</tbody>
</table>
		
		</div></div></div><?php
 AdminT::page_footer(); ?></div></main>';<?php
 AdminT::cd_nav(); AdminT::pjs(); ?><script src="/admin_assets/plugins/waypoints/jquery.waypoints.min.js"></script>
		<script src="/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
		<script src="/admin_assets/plugins/toastr/toastr.min.js"></script>
		<script src="/admin_assets/plugins/flot/jquery.flot.min.js"></script>
		<script src="/admin_assets/plugins/flot/jquery.flot.time.min.js"></script>
		<script src="/admin_assets/plugins/flot/jquery.flot.symbol.min.js"></script>
		<script src="/admin_assets/plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="/admin_assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
		<script src="/admin_assets/plugins/curvedlines/curvedLines.js"></script>
		<script src="/admin_assets/plugins/metrojs/MetroJs.min.js"></script>
		<script src="/admin_assets/plugins/morris/raphael.min.js"></script>
		<script src="/admin_assets/plugins/morris/morris.min.js"></script>
		<script src="/admin_assets/js/modern.min.js"></script>
		<script src="/admin_assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script>var extable;$(document).ready(function() {extable=$('#example').DataTable({"language":{"url":"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json"}});});</script></body></html>
		<?php
 } } 