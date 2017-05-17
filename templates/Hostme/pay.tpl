{include file="cframe.tpl" title=$lang['账户充值'] hostname=$c['网站名称'] subtitle=$lang['用户中心']}
    <div class="page-content">
{include file="alert2.tpl"}
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
<hr>
<h4 class="box-heading">{$lang['个人信息']}</h4>	
<hr>
<div class="row">
<div class="col-md-4">
		<div class="form-group">
		<div class="text-center mbl">
		<img src="{$grav_lg}" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" class="img-circle">
	             </div>
				 <h4 style="text-align:center;">UID:1</h4>
				 <h4 style="text-align:center;">{$tlang['预存款']}:{$s['登陆预存款']} {$c['交易币名称']}</h4>
				 <style>#divli li{ display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;}</style>
		<div class="form-group" id=divli>		 
		    <li class="btn"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/info/"><i class="fa fa-pencil-square-o"></i> {$tlang['修改资料']}</a></li>
			<li class="btn"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/pay/"><i class="fa fa-sellsy"></i> {$lang['账户充值']}</a></li>
			<li class="btn"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/password/"><i class="fa fa-cog"></i> {$lang['修改密码']}</a></li>
            {$plug['用户页面列表']}
</div></div>
</div>



<div class="col-md-8">
	
	
	<div class="tab-content">
	<div class="stats">
				{$plug['预存款列表']}
			</div>
	<h4 class="small-divide">{$lang['存款 / 支付网关']}</h4>
	{$plug['存款支付网关前端']}
	</div>
	
	
	
</div>

  </div>
	
</div>
{include file="client_footer.tpl"}