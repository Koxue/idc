{include file="header.tpl" title=$lang['账户充值'] hostname=$c['网站名称']}
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
              <li><a href="{$ROOT}/buy/index/"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
              <li><a class="active" href="{$ROOT}/user/index/"><i class="batch users"></i><br />{$lang['用户中心']}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="page">
      <div class="page-container">
<div class="container">
  <div class="row">
<div class="span3">
	<div class="profile-sidebar">
		<h4>{$lang['UID']}:{$s['登陆UID']}</h4>
		<p class="pull-right">3.5/5</p>
		<div class="rating-star"></div>
		<div class="rating-star"></div>
		<div class="rating-star"></div>
		<div class="half-star"></div>
		<div class="no-star"></div>
		<ul>
			<li><a href="{$ROOT}/user/index/"><i class="icon-user"> </i>{$lang['个人信息']}</a></li>
			<li><a href="{$ROOT}/user/pay/"><i class="icon-signal"> </i>{$lang['账户充值']}</a></li>
			<li><a href="{$ROOT}/user/password/"><i class="icon-cog"> </i>{$lang['修改密码']}</a></li>
			{$plug['用户页面列表']}
		</ul>
	</div>
</div>
<div class="span6">
	<h4 class="header">{$lang['账户充值']}</h4>{include file="alert.tpl"}
		<div class="stats">
			<div class="row-fluid">
				<div class="span4">
					<div class="stat active">
						<h2>{$s['登陆预存款']}{$c['交易币名称']}</h2>
						<h5>{$lang['您的剩余预存款']}</h5>
					</div>
				</div>
				{$plug['预存款列表']}
			</div>
		</div>
	<h4 class="small-divide">{$lang['存款 / 支付网关']}</h4>
	{$plug['存款支付网关前端']}
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