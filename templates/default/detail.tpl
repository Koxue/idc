{include file="header.tpl" title=$lang['详细管理'] hostname=$c['网站名称']}
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
	        <a href="{$ROOT}/control/index/" class="btn">{$lang['控制面板']}</a>
			<a href="{$ROOT}/buy/" class="btn">{$lang['订购产品']}</a>
	    </div>
	<h4 class="header">{$lang['详细管理']}</h4>{include file="alert.tpl"}
{if $server['周期']!='一次性'}
{if !$goods['禁止续费']}
	<a href="#injectCatalyst" class="btn" data-toggle="modal">{$lang['续期产品']}</a>
{/if}
{if $goods['开启升级选项']}
	<a href="{$ROOT}/control/package/{$server['id']}/" class="btn">{$lang['升级/降级产品']}</a>
{/if}
{/if}
{if $goods['允许用户自己停止']}
	<a href="#Stop" class="btn" data-toggle="modal">{$lang['停止/取消服务']}</a>
{/if}
	<a href="#resetPass" class="btn" data-toggle="modal">{$lang['重置产品密码']}</a>
	<div class="btn-group">
	  <button data-toggle="dropdown" class="btn dropdown-toggle">{$lang['前往控制面板']}  <span class="caret"></span></button>
	  <ul class="dropdown-menu">
{foreach from=$logins item=login}
	    <li>{$login}</li>
{/foreach}
	  </ul>
	</div>
{foreach from=$barray key=bname item=bfunction}
	<a href="action/{$bfunction}/" class="btn">{$bname}</a>
{/foreach}
      <hr />
{$plug['产品控制面板详情']}
	<table class="table">
	  <tbody>
{if $goods['隐藏域名配置']!='1'}
	    <tr>
	      <td>{$lang['主域名(服务名)']}</td>
	      <td>{$server['域名']}</td>
	    </tr>
{/if}
{if $server['密码']!=''}
	    <tr>
	      <td>{$lang['产品登录信息']}<br>
	      </td>
	      <td>
	      	{$lang['用户名']}：{$server['用户名']}<br>
	      	{$lang['密码']}：{$server['密码']}
	      </td>
	    </tr>
{/if}
	    <tr>
	      <td>{$lang['产品名称']}</td>
	      <td>
	      	{$goods['名称']}
	      </td>
	    </tr>
{if $server['ip地址']!=''}
		<tr>
	      <td>{$lang['IP解析']}</td>
	      <td>{$server['ip地址']}</td>
	    </tr>
{/if}
{if $server['专用IP']!=''}
		<tr>
	      <td>{$lang['专用IP']}</td>
	      <td>{$server['专用IP']}</td>
	    </tr>
{/if}
{if $server['指定IP']!=''}
		<tr>
	      <td>{$lang['指定IP']}</td>
	      <td>{$server['指定IP']}</td>
	    </tr>
{/if}
{if $server['主机名']!=''}
	    <tr>
	      <td>{$lang['CNAME解析']}</td>
	      <td>{$server['主机名']}</td>
	    </tr>
{/if}
{if $server['DNS服务器1']!='' or $server['DNS服务器2']!='' or $server['DNS服务器3']!='' or $server['DNS服务器4']!='' or $server['DNS服务器5']!=''}
		<tr>
	      <td>{$lang['DNS解析(NS)']}</td>
	      <td>
	      	{if $server['DNS服务器1']!=''}{$server['DNS服务器1']}{/if}
			{if $server['DNS服务器2']!=''}<br>{$server['DNS服务器2']}{/if}
			{if $server['DNS服务器3']!=''}<br>{$server['DNS服务器3']}{/if}
			{if $server['DNS服务器4']!=''}<br>{$server['DNS服务器4']}{/if}
			{if $server['DNS服务器5']!=''}<br>{$server['DNS服务器5']}{/if}
	      </td>
	    </tr>
{/if}
	    <tr>
	      <td>{$lang['价格 / 周期']}</td>
	      <td>
			{if is_array($server['周期'])}
				{$server['周期']['名称']} {$server['周期']['价格']}{$c['交易币名称']}/{$server['周期']['时间']}天
			{else}
				{$goods['价格']}{if $goods['价格']!='免费'} {$c['交易币名称']}{/if} / {$lang[$server['周期']]}
			{/if}
		  </td>
	    </tr>
{if $server['开通时间']!=''}
	    <tr>
	      <td>{$lang['开通时间']}</td>
	      <td>{$server['开通时间']}</td>
	    </tr>

{/if}
{if $server['到期时间']!=''}
	    <tr>
	      <td>{$lang['到期时间']}</td>
	      <td>{$server['到期时间']}</td>
	    </tr>
{/if}
{foreach from=$options item=option}
		<tr>
	      <td>{$option['名称']}</td>
	      <td>{$option['值']}</td>
	    </tr>
{/foreach}
{foreach from=$configs item=config}
		<tr>
	      <td>{$config['名字']}</td>
	      <td>{$config['内容']}</td>
	    </tr>
{/foreach}
	    <tr>
	      <td>{$lang['状态']}</td>
	      <td>
	  		{if $server['状态']=='激活'}<span class="label label-success">{$lang['激活']}</span>{elseif $server['状态']=='暂停'}<span class="label label-warning">{$lang['暂停']}</span>{else}<span class="label label-info">{$server['状态']}</span>{/if}
	      </td>
	    </tr>
	  </tbody>
	</table>
	<p class="text-info text-right">{$lang['禁止一切但不限于：反动、色情、私服、挂机、采集等站点']}</p>
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
      <div id="injectCatalyst" class="modal hide fade" tabindex="-1">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" >×</button>
		<h3>{$lang['续期产品']}</h3>
		</div>
		<div class="modal-body">
		<form class="form-horizontal" action="pay/" method="post">
	      <div class="control-group">
	        <label class="control-label" for="inputDay">{$lang['续期天数']}</label>
	        <div class="controls">
{if is_array($goods['周期'])}
				<select name="cycleid">
				{foreach $goods['可续期周期'] as $num=>$row nocache}
					<option value="{$num}">{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}天</option>
				{foreachelse}
					无法续费
				{/foreach}
				</select>
				<p class="text-info">{$lang['您目前拥有预存款']} {$s['登陆预存款']} {$c['交易币名称']}</p>
{else}
	{if $goods['价格']!='免费'}
	          <input name="day" value="1" type="text" placeholder="{$lang['需要续期几天']}" id="inputDay" onkeyup="this.value=this.value.replace(/\D|^0/g,'')" />
	{else}
			  {$lang['免费产品会自动帮你续期到目前最大的时间!!']}
	{/if}
			  <span class="help-block">{$lang['请确定续期日期在预存款可以续期内,否则续期失败!']}</span>
	          <p class="text-info">{if $goods['价格']!='免费'}{$lang['您目前拥有预存款']} {$s['登陆预存款']} {$c['交易币名称']}{$lang['，最多可以激活该产品']} {$payday} /{$goods['周期']}{else}{$lang['产品为免费产品,最多可续期']}{if $goods['周期']=='日付'}{$lang['30日']}{elseif $goods['周期']=='月付'}{$lang['1月']}{elseif $goods['周期']=='年付'}{$lang['1年']}{/if}{/if}</p>
{/if}
	        </div>
	      </div>
	    </form>
		</div>
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" >{$lang['取消']}</button>
		<button class="btn btn-primary" onclick="$('#injectCatalyst').find('form').submit();$(this).button('loading');">{$lang['续期']}</button>
		</div>
	  </div>
	  <div id="resetPass" class="modal hide fade" tabindex="-1">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" >×</button>
		<h3>{$lang['重置产品密码']}</h3>
		</div>
		<div class="modal-body">
		<form class="form-horizontal" action="repass/" method="post">
	      <p>{$lang['考虑到安全问题，控制中心不提供自定义修改产品密码，您可以在产品面板自定义修改密码，如果您忘记了修改的密码，请点击重置按钮，系统将为您重置为一个10位随机密码。']}</p>
	    </form>
		</div>
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" >{$lang['取消']}</button>
		<button class="btn btn-primary" onclick="$('#resetPass').find('form').submit();$(this).button('loading');">{$lang['重置']}</button>
		</div>
	  </div>
{if $goods['允许用户自己停止']}
	  <div id="Stop" class="modal hide fade" tabindex="-1">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" >×</button>
		<h3>{$lang['停止/取消服务']}</h3>
		</div>
		<div class="modal-body">
		<form class="form-horizontal" action="stop/" method="post">
	      <p>{$lang['如果您的产品出现问题,或者不想使用服务了,可以选择停止产品并取消服务,但是这个操作不能逆转,并且将不返还任何预存款!!']}</p>
	    </form>
		</div>
		<div class="modal-footer">
		<button class="btn" data-dismiss="modal" >{$lang['取消']}</button>
		<button class="btn btn-primary" onclick="$('#Stop').find('form').submit();$(this).button('loading');">{$lang['确定']}</button>
		</div>
	  </div>
{/if}
{include file="footer.tpl"}