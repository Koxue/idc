<?php  defined('SWAP_ROOT') or die('非法操作'); class filedown extends controller { function config(){ SMACSQL()->query("	CREATE TABLE IF NOT EXISTS `资源下载表` (  `id` int(4) NOT NULL AUTO_INCREMENT,  `名称` text,`介绍` text,`下载地址` text,  PRIMARY KEY (`id`),  UNIQUE KEY `id` (`id`) ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"); return array( 'swap_no_login' => array('admin' => 1,'sc'=>1,'edit'=>1,'add'=>1), 'index' => '1', ); } function index() { $lang=plug_lang_get('filedown','main'); $t=array(); $this->conn->query('select count(*) from 资源下载表'); $OSWAP_3822a7ae299436fb2e99715aa786fc4e = $this->conn->fetch_array(); $OSWAP_5e9755696488b7c7491f14c80dc648e8 = $OSWAP_3822a7ae299436fb2e99715aa786fc4e[0]; $OSWAP_befe21a863bd08cea2bce47e0ccbe4d8 = intval($OSWAP_5e9755696488b7c7491f14c80dc648e8 / 10); if (mac_url_get(1) != '' and !strstr(mac_url_get(1), '?')) { $OSWAP_05a1fc671498b98917c4f3458580cf7c = mac_url_get(1); } else { $OSWAP_05a1fc671498b98917c4f3458580cf7c = 1; } $t = array(); $t['总页数'] = $OSWAP_befe21a863bd08cea2bce47e0ccbe4d8 + 1; $t['当前页数'] = $OSWAP_05a1fc671498b98917c4f3458580cf7c; if ($OSWAP_05a1fc671498b98917c4f3458580cf7c == 1) { $t['上一页连接'] = 'javascript:return false;'; } else { $t['上一页连接'] = $this->cakurl() . '/plugin/filedown/index/' . ($OSWAP_05a1fc671498b98917c4f3458580cf7c - 1) . '/'; } if ($OSWAP_05a1fc671498b98917c4f3458580cf7c == $OSWAP_befe21a863bd08cea2bce47e0ccbe4d8 + 1 or $OSWAP_befe21a863bd08cea2bce47e0ccbe4d8 == '0') { $t['下一页连接'] = 'javascript:return false;'; } else { $t['下一页连接'] = $this->cakurl() . '/plugin/filedown/index/' . ($OSWAP_05a1fc671498b98917c4f3458580cf7c + 1) . '/'; } $OSWAP_ea50022192ea846a0e3a4c1864de578c = 10 * ($OSWAP_05a1fc671498b98917c4f3458580cf7c - 1); $this->conn->query("select * from 资源下载表 order by id asc limit {$OSWAP_ea50022192ea846a0e3a4c1864de578c},10"); $OSWAP_b51f9df1d1b01aa23837f254be2c7d53 = array(); while ($OSWAP_befe21a863bd08cea2bce47e0ccbe4d8 = $this->conn->fetch_assoc()) { $OSWAP_b51f9df1d1b01aa23837f254be2c7d53[] = $OSWAP_befe21a863bd08cea2bce47e0ccbe4d8; } TEMPLATE::assign('pulang', $lang); TEMPLATE::assign('putitle', $lang['资源下载']); TEMPLATE::assign('list', $OSWAP_b51f9df1d1b01aa23837f254be2c7d53); TEMPLATE::assign('t', $t); TEMPLATE::display("index.html"); } function sc() { need_admin(); $id = mac_url_get(1); if (empty($id)) { die('参数错误,请选择删除id'); } SMACSQL()->select('资源下载表', '*', "id='{$id}'"); if (SMACSQL()->db_num_rows() == 0) { die('not found'); } SMACSQL()->delete('资源下载表', "id='{$id}'"); die('ok'); } function edit() { need_admin(); $id = mac_url_get(1); $ok = mac_url_get(2); if($ok=="ok"){ if (empty($id)) { die('参数错误,请选择删除id'); } SMACSQL()->select('资源下载表', '*', "id='{$id}'"); if (SMACSQL()->db_num_rows() == 0) { die('找不到此资源'); } $OSWAP_c989d1fbc3456aebb28d920145312c26=_POST('name'); $OSWAP_947c9e7c24dbafadf9ac0267b4ea7333=_POST('js'); $OSWAP_bbeec437bf4b3274218b8950b104ca2d=_POST('xzdz'); SMACSQL()->update('资源下载表', "名称='{$OSWAP_c989d1fbc3456aebb28d920145312c26}',介绍='{$OSWAP_947c9e7c24dbafadf9ac0267b4ea7333}',下载地址='{$OSWAP_bbeec437bf4b3274218b8950b104ca2d}'", "id='{$id}'");die('ok'); } SMACSQL()->select('资源下载表', '*', "id='{$id}'"); $temp = SMACSQL()->fetch_assoc(); AdminT::header('资源下载', '<link href="/admin_assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/><link href="/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>'); AdminT::search(); echo '<main class="page-content content-wrap">'; AdminT::navbar(); AdminT::sidebar(); echo '<div class="page-inner">'; AdminT::title('修改资源', '<li>网站设置</li>'); echo '<div id="main-wrapper" class="container"><div class="row">'; echo '<div class="col-md-12">'; ?>
		<div class="panel panel-primary" data-collapsed="0">
			
			<div class="panel-body">
				<form role="form" id="settingfrom" class="form-horizontal form-groups-bordered"></br>

			
					<div class="form-group">
						<label class="col-sm-3 control-label">资源名称</label>
						<div class="col-sm-5"><input type="text" name="name" value="<?php echo $temp['名称'];?>"  class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">资源介绍</label>
						<div class="col-sm-5"><input type="text" name="js" value="<?php echo $temp['介绍'];?>" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">下载地址</label>
						<div class="col-sm-5"><input type="text" name="xzdz" value="<?php echo $temp['下载地址'];?>" class="form-control"></div>
					</div>


					<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/plugin/filedown/edit/<?php echo $temp['id'];?>/ok/',$('#settingfrom').serialize(),function(data){if(data=='ok') swap_alert('success','修改成功','成功修改此条资源'); else swap_alert('error','修改失败',data);});" class="btn btn-success">保存更改</a>
						</div>
					</div>
				</form>
			</div>
		</div>
<?php  fildownadmin_foot(); } function add() { need_admin(); $ok = mac_url_get(1); if($ok=="ok1"){ $OSWAP_c989d1fbc3456aebb28d920145312c26=_POST('name'); $OSWAP_947c9e7c24dbafadf9ac0267b4ea7333=_POST('js'); $OSWAP_bbeec437bf4b3274218b8950b104ca2d=_POST('xzdz'); SMACSQL()->insert('资源下载表', "名称,介绍,下载地址","'{$OSWAP_c989d1fbc3456aebb28d920145312c26}','{$OSWAP_947c9e7c24dbafadf9ac0267b4ea7333}','{$OSWAP_bbeec437bf4b3274218b8950b104ca2d}'");die('ok'); } if($ok=="ok2"){ $OSWAP_58208ccdfc7be290906b1069fbf7d940=explode("\r\n",_POST('texts')); $ii=0; foreach($OSWAP_58208ccdfc7be290906b1069fbf7d940 as $OSWAP_c5a1ef7047d7d0dfc4e1365f6677a248){ $ii++; $tempinfo=explode("|",$OSWAP_c5a1ef7047d7d0dfc4e1365f6677a248); SMACSQL()->insert('资源下载表', "名称,介绍,下载地址","'{$tempinfo[0]}','{$tempinfo[1]}','{$tempinfo[2]}'"); } echo '已经成功添加了'.$ii.'条资源。<br>'; die('ok'); } SMACSQL()->select('资源下载表', '*', "id='{$id}'"); $temp = SMACSQL()->fetch_assoc(); AdminT::header('资源下载', '<link href="/admin_assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/><link href="/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>'); AdminT::search(); echo '<main class="page-content content-wrap">'; AdminT::navbar(); AdminT::sidebar(); echo '<div class="page-inner">'; AdminT::title('添加资源', '<li>网站设置</li>'); echo '<div id="main-wrapper" class="container"><div class="row">'; echo '<div class="col-md-12">'; ?>
		<div class="panel panel-primary" data-collapsed="0">
			
			<div class="panel-body">
				<form role="form" id="settingfrom" class="form-horizontal form-groups-bordered"></br>

			
					<div class="form-group">
						<label class="col-sm-3 control-label">资源名称</label>
						<div class="col-sm-5"><input type="text" name="name" value="资源名称"  class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">资源介绍</label>
						<div class="col-sm-5"><input type="text" name="js" value="资源介绍" class="form-control"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">下载地址</label>
						<div class="col-sm-5"><input type="text" name="xzdz" value="下载地址" class="form-control"></div>
					</div>


					<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/plugin/filedown/add/ok1/',$('#settingfrom').serialize(),function(data){if(data=='ok') swap_alert('success','添加成功','成功添加此条资源'); else swap_alert('error','添加失败',data);});" class="btn btn-success">添加资源</a>
						</div>
					
				</form></div>
				
				
			<div class="panel-body">
				<form role="form" id="settingfrom2" class="form-horizontal form-groups-bordered"></br>

					<div class="form-group">
						<label class="col-sm-3 control-label">批量添加</label>
						<div class="col-sm-5">
						
						<textarea name="texts"  class="form-control" style="height: 150px;"></textarea>
						批量添加的格式：<br><code>标题1|介绍1|地址1<br>
						标题2|介绍2|地址2<br>
						标题3|介绍3|地址3</code>
						</div>
					</div>


					<div class="col-sm-offset-3 col-sm-5">
							<a href="javascript:void(0)" onclick="$.post('/index.php/plugin/filedown/add/ok2/',$('#settingfrom2').serialize(),function(data){if(data.match('ok')=='ok') swap_alert('success','添加成功','成功添加此批资源<br>'+data); else swap_alert('error','添加失败',data);});" class="btn btn-success">批量添加</a>
						</div>
					
				</form></div>
			</div>
				
			
		</div>
		
		</div>
<?php  fildownadmin_foot(); } function admin(){ need_admin(); SMACSQL()->select('资源下载表', '*'); $OSWAP_84155a0e149734db13d88328b41f31c5 = array(); while ($temp = SMACSQL()->fetch_assoc()) { $OSWAP_84155a0e149734db13d88328b41f31c5[] = $temp; } AdminT::header('资源下载', '<link href="/admin_assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/><link href="/admin_assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>'); AdminT::search(); echo '<main class="page-content content-wrap">'; AdminT::navbar(); AdminT::sidebar(); echo '<div class="page-inner">'; AdminT::title('资源下载', '<li>网站设置</li>', '<a href="/index.php/plugin/filedown/add/"   target="_blank" class="btn btn-primary btn-addon btn-xs"><i class="fa fa-plus"></i> 添加资源</a>'); echo '<div id="main-wrapper" class="container"><div class="row">'; echo '<div class="col-md-12">'; ?>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>资源名称</th>
			<th>资源介绍</th>
			<th>下载地址</th>
			<th>操作</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>资源名称</th>
			<th>资源介绍</th>
			<th>下载地址</th>
			<th>操作</th>
		</tr>
	</tfoot>
	<tbody>
<?php  foreach ($OSWAP_84155a0e149734db13d88328b41f31c5 as $cp) { ?>
		<tr class="usert<?php echo $cp['id'];?>">
			<td><?php echo $cp['id'];?></td>
			<td><?php echo $cp['名称'];?></td>
			<td><?php echo $cp['介绍'];?></td>
			<td><?php echo $cp['下载地址'];?></td>
			<td><a href="/index.php/plugin/filedown/edit/<?php echo $cp['id'];?>
/" target="_blank" class="btn btn-info btn-xs">编辑</a><a href="javascript:void(0)" class="btn btn-danger btn-xs delid<?php  echo $cp['id']; ?>
" disabled>删除</a>

<input type="checkbox"onclick="$('.delid<?php echo $cp['id'];?>
').attr('onclick','$.get(\'/index.php/plugin/filedown/sc/<?php echo $cp['id'];?>
/\',function(data){if(data==\'ok\'){ extable.row(\'.usert<?php echo $cp['id'];?>
\').remove().draw();  swap_alert(\'success\',\'删除成功\',\'此资源信息删除成功\');}else swap_alert(\'error\',\'删除失败\',data);});') && $('.delid<?php echo $cp['id'];?>
').attr('disabled', false) && $(this).parent().parent().remove();"/>
</td>
		</tr>
<?php  } ?>
	</tbody>
</table>
<?php  fildownadmin_foot(); } } function fildownadmin_foot(){ echo '</div>'; echo '</div></div></div>'; AdminT::page_footer(); echo '</div></main>'; AdminT::cd_nav(); AdminT::pjs(); echo '<script src="/admin_assets/plugins/waypoints/jquery.waypoints.min.js"></script><script src="/admin_assets/plugins/jquery-counterup/jquery.counterup.min.js"></script><script src="/admin_assets/plugins/toastr/toastr.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.time.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.symbol.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.resize.min.js"></script><script src="/admin_assets/plugins/flot/jquery.flot.tooltip.min.js"></script><script src="/admin_assets/plugins/curvedlines/curvedLines.js"></script><script src="/admin_assets/plugins/metrojs/MetroJs.min.js"></script><script src="/admin_assets/plugins/morris/raphael.min.js"></script><script src="/admin_assets/plugins/morris/morris.min.js"></script><script src="/admin_assets/js/modern.min.js"></script>'; echo '<script src="/admin_assets/plugins/datatables/js/jquery.dataTables.min.js"></script>'; echo '<script>var extable;$(document).ready(function() {extable=$(\'#example\').DataTable({"language":{"url":"https://cdn.datatables.net/plug-ins/e9421181788/i18n/Chinese.json"}});});</script>'; echo '</body></html>'; } 