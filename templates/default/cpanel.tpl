{include file="header.tpl" title=$lang['控制面板'] hostname=$c['网站名称']}
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
			  <li><a href="{$ROOT}/control/index/" class="active"><i class="batch b-database"></i><br>{$lang['控制面板']}</a></li>
              <li><a href="{$ROOT}/buy/index/"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
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
	        <a class="btn active">{$lang['控制面板']}</a>
			<a href="{$ROOT}/buy/" class="btn">{$lang['订购产品']}</a>
	    </div>
		<h4 class="header">{$lang['控制面板']}</h4>{include file="alert.tpl"}
        <table class="table table-striped sortable">
			<thead>
			    <tr>
			        <th>{$lang['主域名']}</th>
			        <th>{$lang['类型']}</th>
			        <th>{$lang['周期']}</th>
			        <th>{$lang['状态']}</th>
			        <th>{$lang['开通时间']}</th>
			        <th>{$lang['到期时间']}</th>
			    </tr>
			</thead>
			<tbody>
		        {foreach from=$servers item=server}
				<tr>
			        <td>{if $server['域名']=='无需主域名'}{$lang['无需主域名']}{else}{$server['域名']}{/if}</td>
			        <td>{$server['产品类型']}</td>
			        <td>
					{if is_array($server['周期'])}
						{$server['周期']['名称']}
					{else}
						{$lang[$server['周期']]}
					{/if}
					</td>
			        <td>{if $server['状态']=='激活'}<span class="label label-success">{$lang['激活']}</span>{elseif $server['状态']=='等待审核'}<span class="label label-info">{$lang['等待审核']}</span>{elseif $server['状态']=='暂停'}<span class="label label-warning">{$lang['暂停']}</span>{elseif $server['状态']=='停止'}<span class="label label-important">{$lang['停止']}</span>{elseif $server['状态']=='驳回'}<span class="label label-inverse">{$lang['驳回']}</span>{elseif $server['状态']=='等待付款'}<span class="label">{$lang['等待付款']}</span>{else}<span class="label label-info">{$server['状态']}</span>{/if}</td>
			        <td>{$server['开通时间']}</td>
			        <td>{$server['到期时间']}</td>
			        <td>
		        		<div class="btn-group">
			              <a href="{$ROOT}/control/detail/{$server['id']}/" class="btn{if $server['状态']!='激活' and $server['状态']!='暂停'} active{/if}">{$lang['管理']}</a>
						  <a href="{$ROOT}/control/invoice/{$server['id']}/" class="btn{if $server['状态']!='等待付款'} active{/if}">{$lang['订单']}</a>
			            </div>
			        </td>
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