{include file="header.tpl" title=$lang['客户中心'] hostname=$c['网站名称']}
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
              <li><a href="{$ROOT}/index/index/"><i class="batch home"></i><br />{$lang['客户中心']}</a></li>
			  <li><a href="{$ROOT}/control/index/"><i class="batch b-database"></i><br>{$lang['控制面板']}</a></li>
              <li><a href="{$ROOT}/buy/index/" class="active"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
              <li><a href="{$ROOT}/user/index/"><i class="batch users"></i><br />{$lang['用户中心']}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="page">
      <div class="page-container">
		<div class="container">
		  <div class="row">
			<div class="span9">
				<div class="btn-group pull-right">
					<a href="{$ROOT}/control/index/" class="btn">{$lang['控制面板']}</a>
					<a class="btn active">{$lang['订购产品']}</a>
				</div>
				<h4 class="header">{$lang['订购产品']}</h4>{include file="alert.tpl"}
			  <div class="stats">
				<div class="row-fluid">
				  <div class="span12">
				  <div class="widget">{$f}</div>
				  </div>
				</div>
				<div class="row-fluid">
				  <div class="span12">
				  {foreach from=$buys item=buy nocache}
				  <div class="widget">
					<table style="width:100%">
					  <tr>
						<td>
						  <div class="span4 stat inverse">{$buy['名称']}</div>
						  <div class="span2 stat info">{$lang['剩余']} {$buy['库存']} {$lang['个']}</div>
							{if is_array($buy['周期'])}
								<div class="span4">
									<select class="span12" style="min-height:40px;" onfocus="this.defOpt=this.selectedIndex" onchange="this.selectedIndex=this.defOpt;">
									{foreach $buy['周期'] as $num=>$row nocache}
										<option value="{$num}">{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}{$lang['天']}</option>
									{foreachelse}
										{$lang['无法购买']}
									{/foreach}
									</select>
								</div>
							{else}
								<div class="span2 stat success">{$lang[$buy['周期']]}</div>
								<div class="span2 stat warning">{if $buy['价格']=='免费'}{$lang['免费']}{else}{$buy['价格']} {$c['交易币名称']}{/if}</div>
							{/if}
						  <div style="cursor:pointer;" onclick="window.location.href='{$ROOT}/buy/cart/{$buy['id']}/';return false" class="span2 stat danger">{$lang['订购产品']}</div>
						</td>
					  </tr>
					  <tr>
						<td colspan="4">
{$buy['描述']}
						</td>
					  </tr>
					</table>
				  </div>
				  {/foreach}
				  </div>
				</div>
				</div>
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