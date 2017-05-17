{include file="header.tpl" navxz='' title=$lang['服务器状态'] hostname=$c['网站名称']}{include file="alert.tpl"}
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
  <!-- Breadcrumps -->
  <div class="breadcrumbs">
    <div class="row">
      <div class="col-sm-6">
        <h1>{$lang['服务器状态']}</h1>
      </div>
    </div>
  </div>

  <!-- End of Breadcrumps -->
	
<div class="servers-table">
    <div class="row">
      <div class="col-sm-12">
        <table data-wow-delay="0.3s" class="products-table responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
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
			        <td id="port_80_{$server['id']}"><img src="{$templatedir}/images/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
			        <td id="port_21_{$server['id']}"><img src="{$templatedir}/images/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<td id="phpver_{$server['id']}"><img src="{$templatedir}/images/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
			        <td><a href="{if $server['服务器状态地址']!=''}{$server['服务器状态地址']}?action=phpinfo{else}javascript:;{/if}" target="_blank">PHPINFO</a></td>
					<td id="mysqlver_{$server['id']}"><img src="{$templatedir}/images/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<td id="zendver_{$server['id']}"><img src="{$templatedir}/images/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
			        <td id="load_{$server['id']}"><img src="{$templatedir}/images/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<td id="uptime_{$server['id']}"><img src="{$templatedir}/images/loadingsml.gif" alt="{$lang['加载中...']}" /></td>
					<script>port({$server['id']},80);port({$server['id']},21);stats({$server['id']});</script>
		        </tr>
{/foreach}
            
          </tbody>
        </table>
      </div>
			


	
	
    </div>
  </div>


 
{include file="footer.tpl"}