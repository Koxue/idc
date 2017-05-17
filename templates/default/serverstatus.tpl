{include file="header.tpl" title=$lang['服务器状态'] hostname=$c['网站名称']}
    <div id="in-nav">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul class="pull-right">
			{if $s['是否已经登陆']=='是'}
              <li>{$lang['欢迎回来']}: {$s['登陆用户名']} / <a href="{$ROOT}/user/index/">{$lang['我的资料']}</a> / <a href="{$ROOT}/index/login/">{$lang['退出帐户']}</a></li>
            {else}
              <li><a href="{$ROOT}/index/login/">{$lang['登陆']}</a>/<a href="{$ROOT}/index/register/">{$lang['注册']}</a></li>
			{/if}
            </ul><a id="logo" href="{$ROOT}/index/index/">
              <h4>{$c['头部LOGO']}</h4></a>
          </div>
        </div>
      </div>
    </div>
    <div id="in-sub-nav">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul>
              <li><a href="{$ROOT}/index/index/" class="active"><i class="batch home"></i><br />{$lang['客户中心']}</a></li>
			  <li><a href="{$ROOT}/control/index/"><i class="batch b-database"></i><br>{$lang['控制面板']}</a></li>
              <li><a href="{$ROOT}/buy/index/"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
              <li><a href="settings.html"><i class="batch users"></i><br />{$lang['用户中心']}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<script>
function stats(num) {
    jQuery.post('stats/'+num,'/', function(data) {
        jQuery("#mysqlver_"+num).html(data.mysqlver);
		jQuery("#load_"+num).html(data.load);
        jQuery("#uptime_"+num).html(data.uptime);
		jQuery("#zendver_"+num).html(data.zendver);
		jQuery("#phpver_"+num).html(data.phpver);
    },'json');
}
function port(num,port) {
    jQuery.post('port/'+num+'/'+port+'/','', function(data) {
        jQuery("#port_"+port+"_"+num).html(data);
    });
}
</script>
    <div class="page">
      <div class="page-container">
<div class="container">
  <div class="row">
	<div class="span9">
		<h4 class="header">{$lang['服务器状态']}</h4>
        <table class="table table-striped sortable">
			<thead>
			    <tr>
			        <th>{$lang['服务器']}</th>
			        <th>HTTP</th>
			        <th>FTP</th>
			        <th>PHP {$lang['版本']}</th>
					<th>PHPINFO</th>
					<th>MYSQL {$lang['版本']}</th>
					<th>ZEND {$lang['版本']}</th>
			        <th>{$lang['服务器负载']}</th>
					<th>{$lang['正常运行时间']}</th>
			    </tr>
			</thead>
			<tbody>
{foreach from=$servers item=server}
		        <tr>
			        <td>{$server['名称']}</td>
			        <td id="port_80_{$server['id']}"><img src="{$templatedir}/img/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
			        <td id="port_21_{$server['id']}"><img src="{$templatedir}/img/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<td id="phpver_{$server['id']}"><img src="{$templatedir}/img/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
			        <td><a href="{if $server['服务器状态地址']!=''}{$server['服务器状态地址']}?action=phpinfo{else}javascript:;{/if}" target="_blank">PHPINFO</a></td>
					<td id="mysqlver_{$server['id']}"><img src="{$templatedir}/img/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<td id="zendver_{$server['id']}"><img src="{$templatedir}/img/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
			        <td id="load_{$server['id']}"><img src="{$templatedir}/img/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<td id="uptime_{$server['id']}"><img src="{$templatedir}/img/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<script>port({$server['id']},80);port({$server['id']},21);stats({$server['id']});</script>
		        </tr>
{/foreach}
		    </tbody>
		</table>
	</div>
    <div class="span3">
      <h4>{$lang['快速导航']}</h4>
        <table class="table">
           <tbody>
              <tr><td><a href="{$ROOT}/index/index/"><span class="label label-success">1</span> {$lang['客户中心']}</a></td></tr>
              <tr><td><a href="{$ROOT}/control/index/"><span class="label label-info">2</span> {$lang['控制面板']}</a></td></tr>
			  <tr><td><a href="{$ROOT}/index/announcements/"><span class="label label-warning">3</span> {$lang['公告信息']}</a></td></tr>
			  <tr><td><a href="{$ROOT}/ticket/submit/"><span class="label label-important">4</span> {$lang['提交服务单']}</a></td></tr>
			  <tr><td><a href="{$ROOT}/buy/index/"><span class="label label-info">5</span> {$lang['订购产品']}</a></td></tr>
           </tbody>
        </table>
	  <hr />
	  {if $s['是否已经登陆']=='是'}
	  <h4>{$lang['账户信息']}</h4>
        <table class="table">
           <tbody>
              <tr><td>{$s['登陆姓名']}</td></tr>
              <tr><td>{$s['登陆地址']}</td></tr>
			  <tr><td>{$s['登陆国家']}</td></tr>
			  <tr><td>{$s['登陆邮箱']}</td></tr>
           </tbody>
        </table>
	  <hr />
	  {/if}
	  <h4>{$lang['选择语言']}</h4>
		<form method="post" name="languagefrm" id="languagefrom">
			<select name="language" onchange="languagefrom.submit()">
			  {foreach from=$l item=langs}
			  <option value="{$langs}"{if $langs==$language} selected="selected"{/if}>{$langs}</option>
			  {/foreach}
			</select>
		</form>
    </div>
  </div>
</div>
      </div>
    </div>
{include file="footer.tpl"}