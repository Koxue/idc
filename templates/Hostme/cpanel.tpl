{include file="cframe.tpl" title=$lang['控制面板'] hostname=$c['网站名称'] subtitle=$lang['控制面板']}
<!--BEGIN CONTENT-->
<div class="page-content">
{include file="alert2.tpl"}
<div id="tab-general">
<div id="sum_box" class="row mbl">
<div class="col-sm-6 col-md-3">
<div class="panel profit db mbm">
<div class="panel-body">
<p class="icon">
<i class="icon fa fa-shopping-cart"></i></p>
<h4 class="value">
<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">{$ActiveService}</span>
<span>个</span></h4>
<p class="description">{$mlang['有效的服务']}</p>
<div class="progress progress-sm mbn">
<div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: {$PerService}%;" class="progress-bar progress-bar-success">
</div></div></div></div></div>
<div class="col-sm-6 col-md-3">
<div class="panel income db mbm">
<div class="panel-body">
<p class="icon">
<i class="icon fa fa-money"></i></p>
<h4 class="value">
<span>{$s['登陆预存款']}</span>
<span>{$c['交易币名称']}</span></h4>
<p class="description">{$mlang['预存款']}</p>
<div class="progress progress-sm mbn">
<div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {$s['登陆预存款']}%;" class="progress-bar progress-bar-info">
</div></div></div></div></div>
<div class="col-sm-6 col-md-3">
<div class="panel task db mbm">
<div class="panel-body">
<p class="icon">
<i class="icon fa fa-signal"></i></p>
<h4 class="value">
<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">{$OpenTicket}</span>
<span>个</span></h4>
<p class="description">{$mlang['开启的工单']}</p>
<div class="progress progress-sm mbn">
<div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {$PerTicket}%;" class="progress-bar progress-bar-danger">
</div></div></div></div></div>
<div class="col-sm-6 col-md-3">
<div class="panel visit db mbm">
<div class="panel-body">
<p class="icon">
<i class="icon fa fa-group"></i></p>
<h4 class="value">
<span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">{$Date}</span>
<span>个</span></h4>
<p class="description">{$mlang['15天内到期']}</p>
<div class="progress progress-sm mbn">
<div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {$Date/$SumService*100}%;" class="progress-bar progress-bar-warning">
</div></div></div></div></div></div>
</div>

<h4 class="box-heading">{$mlang['服务列表']}</h4>
<div class="table-container">

<table class="table table-hover table-striped table-bordered table-advanced tablesorter">
<thead>
<tr>
<th width="5%">{$mlang['序号']}
</th>
<th width="15%">{$lang['主域名']}
</th>
<th width="10%">{$lang['类型']}
</th>
<th width="10%">{$lang['周期']}
</th>
<th width="15%">{$lang['开通时间']}
</th>
<th width="15%">{$lang['到期时间']}
</th>
<th width="10%">{$lang['状态']}
</th>
<th width="20%">{$mlang['操作']}
</th>
</tr>
</thead>
<tbody>
{assign var="i" value="0"}
{foreach from=$servers item=server}
{$i=$i+1}
<tr style="text-align:center;">
<td>{$i}
</td>
<td>{if $server['域名']=='无需主域名'}{$lang['无需主域名']}{else}{$server['域名']}{/if}
</td>
<td>{$server['产品类型']}
</td>
<td>{$server['周期']}
</td>
<td>{$server['开通时间']}
</td>
<td>{$server['到期时间']}
</td>
<td>{if $server['状态']=='激活'}<span class="label label-sm label-success">{$lang['激活']}</span>{elseif $server['状态']=='等待审核'}<span class="label label-sm label-info">{$lang['等待审核']}</span>{elseif $server['状态']=='暂停'}<span class="label label-sm label-warning">{$lang['暂停']}</span>{elseif $server['状态']=='停止'}<span class="label label-sm label-danger">{$lang['停止']}</span>{elseif $server['状态']=='驳回'}<span class="label label-sm label-primary">{$lang['驳回']}</span>{elseif $server['状态']=='等待付款'}<span class="label label-sm label-default">{$lang['等待付款']}</span>{else}<span class="label label-sm label-default">{$server['状态']}</span>{/if}
</td>
<td>
<a class="btn btn-default btn-xs {if $server['状态']!='激活' and $server['状态']!='暂停'}disabled{else}active{/if}" href="{if $c['伪静态开关']=='0'}/index.php{/if}/control/detail/{$server['id']}/"><i class="fa fa-edit"></i>&nbsp;{$lang['管理']}</a>
<a class="btn btn-default btn-xs {if $server['状态']!='等待付款'}disabled{else}active{/if}" href="{if $c['伪静态开关']=='0'}/index.php{/if}/control/invoice/{$server['id']}/"><i class="fa fa-shopping-cart"></i>&nbsp;{$lang['订单']}</a>
</td>
</tr>
{/foreach}
</tbody>
</table>
</div>


<!--END CONTENT-->
</div>

{include file="client_footer.tpl"}