<?php  defined('SWAP_ROOT') or die('非法操作'); class paylog extends controller { function config(){ return array( 'swap_no_login' => array('admin'=>'1','url'=>'1',), 'log' => '1', ); } function log(){ $lang=paylog_lang('main'); $OSWAP_7e0d75263f5ae4bef22891b94b1823c1 = mac_url_get(1); $t=array(); $OSWAP_b50d4016bbe732b7901953fe006480e3=session('uid'); SMACSQL()->select('审核订单', 'count(*)', "uid='{$OSWAP_b50d4016bbe732b7901953fe006480e3}'"); $OSWAP_00a61f1d909f0d516c8041e2154abf72=array(); $OSWAP_5886312e35f5ed44ea664947f1c91cda = SMACSQL()->fetch_array(); $OSWAP_34941b8ba82145462ee84b738e7159c5 = $OSWAP_5886312e35f5ed44ea664947f1c91cda[0]; $OSWAP_18ecd1d2b1981ffc1bcfac1ec66556e4 = intval($OSWAP_34941b8ba82145462ee84b738e7159c5 / 10); if ($OSWAP_7e0d75263f5ae4bef22891b94b1823c1 != '' and !strstr($OSWAP_7e0d75263f5ae4bef22891b94b1823c1, '?')) {$OSWAP_d95d217c857759e671e26107f2e50d03 =$OSWAP_7e0d75263f5ae4bef22891b94b1823c1;}else {$OSWAP_d95d217c857759e671e26107f2e50d03=1;} $t = array();$t['总页数'] = $OSWAP_18ecd1d2b1981ffc1bcfac1ec66556e4 + 1;$t['当前页数'] = $OSWAP_d95d217c857759e671e26107f2e50d03; if ($OSWAP_d95d217c857759e671e26107f2e50d03 == 1) {$t['上一页连接'] = 'javascript:return false;';} else {$t['上一页连接'] = $this->cakurl() . '/plugin/paylog/log/' . ($OSWAP_d95d217c857759e671e26107f2e50d03 - 1) . '/';} if ($OSWAP_d95d217c857759e671e26107f2e50d03 == $OSWAP_18ecd1d2b1981ffc1bcfac1ec66556e4 + 1 or $OSWAP_18ecd1d2b1981ffc1bcfac1ec66556e4 == '0') {$t['下一页连接'] = 'javascript:return false;';} else {$t['下一页连接'] = $this->cakurl() . '/plugin/paylog/log/' . ($OSWAP_d95d217c857759e671e26107f2e50d03 + 1) . '/';} $OSWAP_b351f598043d46793afa680b98576a3d = 10 * ($OSWAP_d95d217c857759e671e26107f2e50d03 - 1); SMACSQL()->select('审核订单', '*', "uid='{$OSWAP_b50d4016bbe732b7901953fe006480e3}' order by id DESC limit {$OSWAP_b351f598043d46793afa680b98576a3d},10"); $OSWAP_6abf002669ef8a07b2d4a7ddab61ef4d=array();while ($OSWAP_5886312e35f5ed44ea664947f1c91cda = SMACSQL()->fetch_assoc()) {$OSWAP_6abf002669ef8a07b2d4a7ddab61ef4d[]=$OSWAP_5886312e35f5ed44ea664947f1c91cda;} TEMPLATE::assign('pulang', $lang); TEMPLATE::assign('list', $OSWAP_6abf002669ef8a07b2d4a7ddab61ef4d); TEMPLATE::assign('t', $t); TEMPLATE::display("index.html"); } function admin() { need_admin(); $OSWAP_0ad9f15fd2f34e43fe753da748112b96=mac_url_get(1); if($OSWAP_0ad9f15fd2f34e43fe753da748112b96==""){$OSWAP_0ad9f15fd2f34e43fe753da748112b96="list";} $id="";$id=mac_url_get(2); $ok="";$ok=mac_url_get(3); AdminT::header('充值记录', '<link href="/admin_assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/><link href="/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>'); AdminT::search(); ?><main class="page-content content-wrap">
		<?php
 AdminT::navbar(); AdminT::sidebar();?><div class="page-inner"><?php
 AdminT::title('充值记录', '<li>网站设置</li>');?>
						
		<div id="main-wrapper" class="container">

			<div class="row"><div class="col-md-12">
			
			         
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead><tr><th>id</th><th>订单id</th><th>uid</th><th>时间</th><th>总价</th><th>支付网关</th><th>状态</th></tr></thead>
	<tfoot><tr><th>id</th><th>订单id</th><th>uid</th><th>时间</th><th>总价</th><th>支付网关</th><th>状态</th></tr></tfoot>
	<tbody>
<?php $this->conn->select('审核订单','*',"1=1 ORDER BY 时间 DESC");while ($cp = $this->conn->fetch_assoc()) {echo "<tr><td>{$cp['id']}</td><td>{$cp['订单id']}</td><td>{$cp['uid']}</td><td>{$cp['时间']}</td><td>{$cp['总价']}</td><td>{$cp['支付网关']}</td><td>{$cp['状态']}</td></tr>"; } ?>	</tbody>
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
 } function eva($OSWAP_1277871885668322b616f6851901c698){ $nr=plug_eva('paylog',$OSWAP_1277871885668322b616f6851901c698); return $nr; } } 