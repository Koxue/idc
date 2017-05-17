{include file="cframe.tpl" title=$lang['升级/降级产品'] hostname=$c['网站名称'] subtitle=$lang['控制面板']}
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
<p class="description">有效的服务</p>
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
<p class="description">预存款</p>
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
<p class="description">开启的工单</p>
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
<p class="description">15天内到期</p>
<div class="progress progress-sm mbn">
<div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: {$Date/$SumService*100}%;" class="progress-bar progress-bar-warning">
</div></div></div></div></div></div>
</div>

<h4 class="header">{$lang['升级/降级产品']}</h4>
<div class="table-container">
<form action="submit/" class="form-horizontal" method="post">
						<div class="form-group">
							<div class="col-sm-9 controls">		
{foreach from=$packages item=package}
								<label class="col-sm-3 control-label">
								  <input type="radio" name="upid" value="{$package['id']}" checked class="form-control"/>
								  {$package['名称']} <small>{$package['价格']} {$c['交易币名称']} / {$package['周期']}</small>
								  <span class="text-info"></br>{$lang['升级为该产品，您将消耗预存款']} {$package['消耗预存款']} {$c['交易币名称']}{$lang['。您共有']}{$s['登陆预存款']} {$c['交易币名称']}{$lang['，还差']}{$package['不足预存款']} {$c['交易币名称']}。</span>
								</label>
							
{/foreach}
							</div>
						</div>
						<div class="form-group mbn">
							<div class="col-sm-9 controls">
							<label class="col-sm-3 control-label"></label>
								<button type="submit" data-loading-text="{$lang['提交中...']}" class="btn">{$lang['提交']}</button>
							</div>
						</div>
					</form>



</div>


<!--END CONTENT-->
</div>
{include file="client_footer.tpl"}